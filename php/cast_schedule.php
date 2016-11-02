<?php
//日付処理用にCarbon使用
require 'vendor/autoload.php';
use Carbon\Carbon;

//javascriptから受け取る値 data: {'item': 'hogehoge', 'sub': 'fugafuga'} の部分。
//何もなければ空文字
$label = (isset($_POST['item']))? $_POST['item']: '';
$sub   = (isset($_POST['sub']))? $_POST['sub']: '';

//最終的に返す配列
$data = array(
  'slugs'        => null,
  'calList'      => null,//追加
  'castList'     => null,
  'scheduleList' => null,
  'nextStage'    => null
);

/* -----------------------------------------------------------------------
## 必要なJSONを取得 ######################################################
----------------------------------------------------------------------- */
//キャスト一覧のJSONを取得
//キャスト一覧のJSONはカスタム投稿タイプとカスタムフィールドを使用しているため、
//functions.phpにて出力するように設定している。
// $castUrl  = 'http://localhost.www.gear.ac-wp/wp-json/wp/v2/castlist';
$castUrl  = 'http://111.89.132.125/wp-json/wp/v2/castlist';
//$castUrl  = 'http://www.gear.ac/wp-json/wp/v2/castlist';
$castJSON = json_decode(file_get_contents($castUrl));

//スケジュールのJSONを取得
//スケジュールのJSONはカスタム投稿タイプとカスタムフィールドを使用しているため、
//functions.phpにて出力するように設定している。
//?filter[order]=ASC => 記事の古い順に並べ替え
// $scheduleUrl  = 'http://localhost.www.gear.ac-wp/wp-json/wp/v2/schedules?filter[order]=ASC';
$scheduleUrl  = 'http://111.89.132.125/wp-json/wp/v2/schedules?filter[order]=ASC';
//$scheduleUrl  = 'http://www.gear.ac/wp-json/wp/v2/schedules?filter[order]=ASC';
$scheduleJSON = json_decode(file_get_contents($scheduleUrl));


/* -----------------------------------------------------------------------
## slugのリストを取得 ####################################################
----------------------------------------------------------------------- */
//slug = 現在公開されているWordPressのスラッグの部分の値を配列で取得。
$data['slugs'] = getSlugList($scheduleJSON);
//追加：calList = カレンダー表示用（過去分を取り除いた分）
$data['calList'] = getcalList($scheduleJSON);

/* -----------------------------------------------------------------------
## キャスト一覧を取得 ####################################################
----------------------------------------------------------------------- */
//$castJSONの内容をそのまま返す。
$castList = getCastList($castJSON);
$data['castList'] = $castList;


/* -----------------------------------------------------------------------
## キャストスケジュールを取得 ############################################
----------------------------------------------------------------------- */
//$data['slugs'](年月の配列)のインデックス数がJSONにセットされている年月のデータ数になるので、
//それをforeachで回し、各月のデータを$data['scheduleList']['年月']という形式でセットする。
foreach ($data['slugs'] as $key => $value) {
	
	//日付チェック（今日より前月は取得しない）
	$today = date('Ym');
	$data['date']-> $value;
	if(strtotime($today) <= strtotime($value)){
	
		$scheduleFields = $scheduleJSON[$key]->fields;
		$value = preg_replace('/([0-9]{4})([0-9]{2})/', '$1'.'.'.'$2', $value);
		$data['scheduleList'][$value] = getCastSchedules($castList, $scheduleFields);
  
	}
}


/* -----------------------------------------------------------------------
## Functions # 以下は上記データを取得するための関数群 ####################
----------------------------------------------------------------------- */
/* ################# slugのリストを取得 ################# */
function getSlugList($json){
  $slugArr = array();
  foreach ($json as $key => $value) { 
    //JSONをforeachで回し、$value->slugでスラッグ部分だけを抽出。
    //抽出した値からsche-を削除したもの(ex.201606)で配列を作り、返す。
    $slug = preg_replace('/sche-/', '', $value->slug);
    array_push($slugArr, $slug);
  }
  return $slugArr;
}

/* ################# calListのリストを取得（追加） ################# */
function getcalList($json){
  $calArr = array();
  foreach ($json as $key => $value) {

	//日付チェック（今日より前月は取得しない）
	$today = date('Ym');
	$cdate = preg_replace('/sche-/', '', $value->slug);

	if(strtotime($today) <= strtotime($cdate)){
	  
    //JSONをforeachで回し、$value->slugでスラッグ部分だけを抽出。
    //抽出した値からsche-を削除したもの(ex.201606)で配列を作り、返す。
    $slug = preg_replace('/sche-/', '', $value->slug);
	//$slug = preg_replace('/([0-9]{4})([0-9]{2})/', '$1'.'年'.'$2'.'月', $slug);	
	$slug = preg_replace('/([0-9]{4})([0-9]{2})/', '$1'.'.'.'$2', $slug);
    array_push($calArr, $slug);
  }
  }
  return $calArr;
}


/* ################# キャスト一覧を取得 ################# */
function getCastList($json){
  //WP REST APIのキャスト一覧JSONをジャンル別にまとめる。
  $castlist = array();
  foreach ($json as $key => $value) {
    //$genreにWPのキャスト一覧のページのスラッグを入れる。
    $genre = $value->slug;
    if(isset($castlist[$genre])){
      //$castlistのキー名にジャンルがすでにセットされていれば、そのままfieldsを挿入。
      $castlist[$genre] = $value->fields;
    } else {
      //$castlistのキー名にジャンルがまだセットされていなければ、$castlist[$genre]の箱を用意して、fieldsを挿入。
      $castlist[$genre] = array();
      $castlist[$genre] = $value->fields;
    }
  }
  //ジャンルごとにまとめたキャスト一覧を返す。
  //各ジャンルごとに「キャスト名」「キャスト名(クラス名)」「キャスト画像パス」を返す。
  return $castlist;
}


/* ################# キャストスケジュールを取得 ################# */
function getCastSchedules($castData, $scheduleData){
  //キャストスケジュール用のデータを纏める
  //キャスト一覧データに依存しています
  global $data;
  $schedules = array();
  foreach ($scheduleData as $key => $value) {
    //$scheduleDataのデータをひとつひとつforeachで回す。
	
	//日付チェック（今日より前日は取得しない）
	$today = date('Ymd');
	$cdate = preg_replace('/\./', '', $value->date);

	if(strtotime($today) <= strtotime($cdate)){
		
    if(($value->matinee != '' || $value->soiree != '') || getSuspend($value->suspend)){
      //マチネ、ソワレ、それぞれどちらかに値が入ってるか、suspendの値がtrueの(=休演日が設定されいる)場合、下記データを集める。
      //マチネとソワレどちらにも値が入っておらず、休演日でもない場合(=何もない日)はスキップする。

      //キャストデータからそれぞれのジャンルの人物データを取得する。
      $mimeData     = getCastData($castData, $value->mime, 'mime');
      $breakinData  = getCastData($castData, $value->breakin, 'breakin');
      $magicData    = getCastData($castData, $value->magic, 'magic');
      $jagglingData = getCastData($castData, $value->jaggling, 'jaggling');
      $dallData     = getCastData($castData, $value->dall, 'dall');

      //スケジュールデータ(一日分)をまとめる
      $schedules[$key]['suspend']        = getSuspend($value->suspend);
      $schedules[$key]['date']           = $value->date;
      $schedules[$key]['weeks']          = $value->weeks;
	  
	  //土日祝判定
	  if($value->weeks == '土'){
		$schedules[$key]['holiday'] = 'sat';
	  }
	  if($value->weeks == '日' || $value->holiday == '祝日'){
		$schedules[$key]['holiday'] = 'sun';
	  }	  
	  
      $schedules[$key]['matinee']        = $value->matinee;
      $schedules[$key]['soiree']         = $value->soiree;
      $schedules[$key]['mime']           = $value->mime;
      $schedules[$key]['mime_class']     = $mimeData['cast_class'];
      $schedules[$key]['mime_img']       = $mimeData['img'];
      $schedules[$key]['breakin']        = $value->breakin;
      $schedules[$key]['breakin_class']  = $breakinData['cast_class'];
      $schedules[$key]['breakin_img']    = $breakinData['img'];
      $schedules[$key]['magic']          = $value->magic;
      $schedules[$key]['magic_class']    = $magicData['cast_class'];
      $schedules[$key]['magic_img']      = $magicData['img'];
      $schedules[$key]['jaggling']       = $value->jaggling;
      $schedules[$key]['jaggling_class'] = $jagglingData['cast_class'];
      $schedules[$key]['jaggling_img']   = $jagglingData['img'];
      $schedules[$key]['dall']           = $value->dall;
      $schedules[$key]['dall_class']     = $dallData['cast_class'];
      $schedules[$key]['dall_img']       = $dallData['img'];
      $schedules[$key]['etc']            = $value->etc;
      if(is_null($data['nextStage'])){
        //$data['nextStage']が空だったら次回の公演かをチェックして、次回公演なら値を入れる。
        //値が入ったらis_null($data['nextStage']はfalseになるので、以降は実行されない。
        $data['nextStage'] = setNextStage(getSuspend($value->suspend), $value->date, $value->matinee, $value->soiree, $schedules[$key]);
      }
	}
	}
  }
  return $schedules;
}

function getSuspend($suspend){
  //休演日チェック
  //休演日が指定されていればtrueを返し、そうでなければfalseを返す。
  if(!empty($suspend)){
    return true;
  } else {
    return false;
  }
}

//キャスト名とマッチングして必要なデータを返す
function getCastData($castlist, $name, $genre){
  //$castlist=キャスト一覧データ, $name=キャスト名, $genre=ジャンル
  $cast_class = '';
  $img = '';
  foreach ($castlist[$genre] as $key => $value) {
    //キャスト一覧データの中から指定したジャンルのデータを一つ一つforeachで回す。
    if($value->name == $name){
      //キャスト一覧のキャスト名とキャストスケジュールから渡されたキャスト名(=$name)が一致したら
      $cast_class = $value->class;
      $img        = $value->img;
    }
  }
  //配列にクラス名と画像パスを入れて返す。
  return array('cast_class'=>$cast_class, 'img'=>$img);
}

function setNextStage($suspend, $date, $matinee, $soiree, $schedule){
  //次回公演のデータをセットする。
  //$suspend=休演日かどうか, $date=日付, $matinee=マチネの時間, $soiree=ソワレの時間, $schedule=キャストスケジュールのgetCastSchedules()でまとめた1日分のデータ
  global $data;
  $date = preg_replace('/\./', '', $date); //日付からドットを除いて8桁の数字にする。
  if(!$suspend){
    //休演日ではない場合
    if(checkTime($matinee)){
      //マチネに時間がセットされている場合
      $matineeSerial = strtotime($date.$matinee); //セットされている時間をシリアル値に変換
      if(checkPast($matineeSerial)){
        //シリアル値を現在時間のシリアル値と比べてチェックし、未来ならスケジュールデータを返す。
        return getNextStage($matinee, $schedule);
      }
    }
    if(checkTime($soiree)){
      //ソワレに時間がセットされている場合
      $soireeSerial  = strtotime($date.$soiree); //セットされている時間をシリアル値に変換
      if(checkPast($soireeSerial)){
        //シリアル値を現在時間のシリアル値と比べてチェックし、未来ならスケジュールデータを返す。
        return getNextStage($soiree, $schedule);
      }
    }
  }
}

function checkTime($time){
  //入力値が時間かどうかをチェック(時間の欄には「貸切」もあるため)
  if(preg_match('/[0-9]+:[0-9]+/', $time) > 0){
    $h = explode(':', $time);
    $m = explode(':', $time);
    $flagH = ($h[0] >= 0 && $h[0] < 24)? true: false;
    $flagM = ($m[1] >= 0 && $m[1] < 60)? true: false;
    if($flagH && $flagM){
      return true; //時間ならtrueを返す。
    } else {
      return false; //時間でないならtrueを返す。
    }
  } else {
    return false; //時間でないならtrueを返す。
  }
}

function checkPast($serial){
  //シリアル値を現在時間のシリアル値と比べる
  $now = Carbon::now('Asia/Tokyo');
  $nowSerial = strtotime($now->format('YmdHis'));
  if($nowSerial > $serial){
    //現在値のほうが大きい = 過去の公演
    return false;
  } else {
    //現在値のほうが小さい = 未来の公演
    return true;
  }
}

function getNextStage($time, $schedule){
  //次回の公演データをまとめる
  //$next = array();
  $next['date']           = $schedule['date'];
  $next['weeks']          = $schedule['weeks'];
  $next['time']           = $time;
  $next['mime']           = $schedule['mime'];
  $next['mime_class']     = $schedule['mime_class'];
  $next['mime_img']       = $schedule['mime_img'];
  $next['breakin']        = $schedule['breakin'];
  $next['breakin_class']  = $schedule['breakin_class'];
  $next['breakin_img']    = $schedule['breakin_img'];
  $next['magic']          = $schedule['magic'];
  $next['magic_class']    = $schedule['magic_class'];
  $next['magic_img']      = $schedule['magic_img'];
  $next['jaggling']       = $schedule['jaggling'];
  $next['jaggling_class'] = $schedule['jaggling_class'];
  $next['jaggling_img']   = $schedule['jaggling_img'];
  $next['dall']           = $schedule['dall'];
  $next['dall_class']     = $schedule['dall_class'];
  $next['dall_img']       = $schedule['dall_img'];
  return $next;
}

/* -----------------------------------------------------------------------
## 出力 ##################################################################
----------------------------------------------------------------------- */
//$labelや$subに値をセットすることで、必要な分だけのデータを返す。
//何もセットされてなければ全データを返す。
if($label){
  if($sub){
    echo json_encode($data[$label][$sub]);
  } else {
    echo json_encode($data[$label]);
  }
} else {
  echo json_encode($data);
}