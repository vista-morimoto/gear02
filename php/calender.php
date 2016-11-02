<?php
//日付処理用にCarbon使用
require 'vendor/autoload.php';
use Carbon\Carbon;

//javascriptから受け取る値 data: {'item': 'hogehoge'} の部分。
//何も設定がなければ空文字
$label = (isset($_POST['item']))? $_POST['item']: '';

//最終的に返す配列
$data = array();

/* -----------------------------------------------------------------------
## 必要なJSONを取得 ######################################################
----------------------------------------------------------------------- */
//スケジュールのJSONを取得
//スケジュールのJSONはカスタム投稿タイプとカスタムフィールドを使用しているため、
//functions.phpにて出力するように設定している。
//?filter[order]=ASC => 記事の古い順に並べ替え
// $scheduleUrl  = 'http://localhost.www.gear.ac-wp/wp-json/wp/v2/calenders?filter[order]=ASC';
$scheduleUrl  = 'http://111.89.132.125/wp-json/wp/v2/calender?filter[order]=ASC';
//$scheduleUrl  = 'http://www.gear.ac/wp-json/wp/v2/calender?filter[order]=ASC';
$scheduleJSON = json_decode(file_get_contents($scheduleUrl));

/* -----------------------------------------------------------------------
## slugのリストを取得 ####################################################
----------------------------------------------------------------------- */
//slug = 現在公開されているWordPressのスラッグの部分の値を配列で取得。
$data['slugs'] = getSlugList($scheduleJSON);
//追加：calList = カレンダー表示用（過去分を取り除いた分）
$data['calList'] = getcalList($scheduleJSON);

/* -----------------------------------------------------------------------
## 年月のリストを取得 ####################################################
----------------------------------------------------------------------- */
$yearMonth = getYearMonth($data['slugs']);

$data['year']  = $yearMonth['year'];  //特に使用していない
$data['month'] = $yearMonth['month']; //カレンダーのタイトル表示に使用

/* -----------------------------------------------------------------------
## スケジュールを取得 ####################################################
----------------------------------------------------------------------- */
//$data['slugs'](年月の配列)のインデックス数がJSONにセットされている年月のデータ数になるので、
//それをforeachで回し、各月のデータを$data['scheduleList']['年月']という形式でセットする。
foreach ($data['slugs'] as $key => $value) {

//日付チェック（今日より前月は取得しない）
$today = date('Ym');
$yearMonth['year']-> $value;
if(strtotime($today) <= strtotime($value)){
  
  $scheduleFields = $scheduleJSON[$key]->fields;
  $value = preg_replace('/([0-9]{4})([0-9]{2})/', '$1'.'.'.'$2', $value);
  $data['scheduleList'][$value] = getSchedules($scheduleFields);
	
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
    //抽出した値からcal-を削除したもの(ex.201606)で配列を作り、返す。

		$slug = preg_replace('/cal-/', '', $value->slug);
		array_push($slugArr, $slug);

  } 
  return $slugArr;
}
/* ################# calListのリストを取得 ################# */
function getcalList($json){
  $calListArr = array();
  foreach ($json as $key => $value) {
    //JSONをforeachで回し、$value->slugでスラッグ部分だけを抽出。
    //抽出した値からcal-を削除したもの(ex.201606)で配列を作り、返す。
	
	$today = date('Ym');
	$yearMonth = preg_replace('/cal-/', '', $value->slug);
	if(strtotime($today) <= strtotime($yearMonth)){
		$slug = preg_replace('/cal-/', '', $value->slug);
		$slug = preg_replace('/([0-9]{4})([0-9]{2})/', '$1'.'.'.'$2', $slug);
		array_push($calListArr, $slug);
	}
  } 
  return $calListArr;
}


/* ################# slugのリストを取得 ################# */
function getYearMonth($ymList){
  //$ymList(=$data['slugs'])をforeachで回し、正規表現を使って西暦部分と月部分をそれぞれ配列としてまとめ、返す。
  //月の頭ゼロをとるためにintval()を使用。

  $yearMonth = array();
  $yearMonth['year']  = array();
  $yearMonth['month'] = array();
  foreach ($ymList as $value) {	  
  
  //日付チェック（今日より前月は取得しない）
  $today = date('Ym');
  $yearMonth['year']-> $value;

  if(strtotime($today) <= strtotime($value)){

    array_push($yearMonth['year'], intval(preg_replace('/([0-9]{4})([0-9]{2})/', '$1', $value), 10));
    array_push($yearMonth['month'], intval(preg_replace('/([0-9]{4})([0-9]{2})/', '$2', $value), 10));
  }
  }
  return $yearMonth;

}


/* ################# スケジュールを取得 ################# */
function getSchedules($scheduleData){
  //各月のfields(=$scheduleData)からスケジュールデータをまとめる。
  $schedules = array();
  $days = count($scheduleData); //その月が何日あるか数える。
  foreach ($scheduleData as $key => $value) {
    //$scheduleData(=各日のデータ)をforeachで回し、$schedules[インデックス]に順番にセットする。
    $schedules[$key] = array();
    

	//日付のチェック処理	
	//$today = date('Y-m-d');	
	//$ar_target_day = preg_split("/[\.]/", $value->date);
	//$target_day = $ar_target_day[0]."-".$ar_target_day[1]."-".$ar_target_day[2];

	//if(strtotime($today) < strtotime($target_day)){
	
	foreach ($value as $k => $v) {
      //$value(=各日のデータの詳細)をforeachで回し、$schedules[インデックス][項目名]にセットする。
      //その際に特定のキーに関しては文字列の変換を行う。
      if($k == 'date'){
        //キーがdateであれば、日付から正規表現を使って日にちだけを取得して$schedules[$key]['day']に入れる。
        $day = intval(preg_replace('/([0-9]{4})\.([0-9]{2})\.([0-9]{2})/', '$3', $value->date));
        $schedules[$key][$k] = $v;
		$schedules[$key]['day'] = $day;	

      } elseif($k == 'weeks'){
        //土日判定
        if($v == '土'){
		  $schedules[$key]['holiday'] = 'sat';
		  $schedules[$key]['weeks'] = $v;	
        } elseif($v == '日' ){
          $schedules[$key]['holiday'] = 'sun';	
		  $schedules[$key]['weeks'] = $v;
        } else {
          $schedules[$key]['weeks'] = $v;	
        }

      } elseif($k == 'holiday'){
        //祝日判定
        if($v == '祝日'){
		  $schedules[$key]['holiday'] = 'sun';	
        }

      } elseif($k == 'matinee_unsold'){
        //キーがmatinee_unsoldであれば、それぞれの記号をCSSで使う用のclass名に変換して$schedules[$key]['matinee_unsold']に入れる。
        if($v == '○'){
          $schedules[$key]['matinee_unsold'] = 'haveToSpace';
        } elseif($v == '△'){
          $schedules[$key]['matinee_unsold'] = 'noRoom';
        } elseif($v == '▼'){
          $schedules[$key]['matinee_unsold'] = 'few';
        } elseif($v == '×'){
          $schedules[$key]['matinee_unsold'] = 'full';
        } else {
          $schedules[$key][$k] = $v;
        }
      } elseif($k == 'soiree_unsold'){
        //キーがsoiree_unsoldであれば、それぞれの記号をCSSで使う用のclass名に変換して$schedules[$key]['soiree_unsold']に入れる。
        if($v == '○'){
          $schedules[$key]['soiree_unsold'] = 'haveToSpace';
        } elseif($v == '△'){
          $schedules[$key]['soiree_unsold'] = 'noRoom';
        } elseif($v == '▼'){
          $schedules[$key]['soiree_unsold'] = 'few';
        } elseif($v == '×'){
          $schedules[$key]['soiree_unsold'] = 'full';
        } else {
          $schedules[$key][$k] = $v;
        }
      } elseif($k == 'service'){
        //キーがserviceであれば、それぞれの文字列をCSSで使う用のclass名に変換して$schedules[$key]['service']に入れる。
        if($v == 'ギアの日割'){
          $schedules[$key]['service'] = 'discount';
        } elseif($v == 'キッズ'){
          $schedules[$key]['service'] = 'kids';
        } else {
          $schedules[$key][$k] = $v;
        }
      } else {
        //特定のキー以外は普通に$schedules[インデックス][項目名]に入れる。
        $schedules[$key][$k] = $v;
      }
    }
  }
  
  
  
  //}

  
  //$schedulesにパディングを挿入し、$schedulesを返す。
  $schedules = setPadding($schedules, $scheduleData[0]->weeks, $scheduleData[$days-1]->weeks);
  return $schedules;
}

function setPadding($arr, $start, $end){
  //$arr(=各月のスケジュールデータ。配列), $start(=月の1日の曜日), $end(=月の最終日の曜日)
  $paddingObj = array(
    'padding' => '&nbsp;'
  );
  $week  = array('月','火','水','木','金','土','日');
  //startPadding()、endPadding()によりその月の頭と終わりに空白セルの挿入数を取得。
  $start = startPadding($week, $start);
  $end   = endPadding($week, $end);
  for($i = 0; $i < $start; $i++){
    //$startは配列の先頭に$paddingObjを追加。
    array_unshift($arr, $paddingObj);
  }
  for($j = 0; $j < $end; $j++){
    //$endは配列の最後に$paddingObjを追加。
    array_push($arr, $paddingObj);
  }
  return $arr;
}

function startPadding($week, $start){
  //$week  = array('月','火','水','木','金','土','日');から曜日をマッチングさせ、
  //マッチングしたインデックスの値が挿入する空白セルの数になる。
  //ex.$startが水なら$week[2]とマッチングするため、挿入する空白セルの数は2(月･火の分)になる。
  foreach ($week as $key => $value) {
    if($value == $start){
      $padding = $key;
    }
  }
  return $padding;
}

function endPadding($week, $end){
  //$week  = array('月','火','水','木','金','土','日');から曜日をマッチングさせ、
  //6からマッチングしたインデックスの値を引いたものが挿入する空白セルの数になる。
  //ex.$startが水なら$week[2]とマッチングするため、挿入する空白セルの数は6-2で4(木･金･土･日の分)になる。
  foreach ($week as $key => $value) {
    if($value == $end){
      $padding = 6 - $key;
    }
  }
  return $padding;
}


/* -----------------------------------------------------------------------
## 出力 ##################################################################
----------------------------------------------------------------------- */
//$labelに値をセットすることで、必要な分だけのデータを返す。
//何もセットされてなければ全データを返す。
if($label){
  echo json_encode($data[$label]);
} else {
  echo json_encode($data);
}