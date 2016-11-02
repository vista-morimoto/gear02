<?php
require_once 'simple_html_dom.php';
require 'vendor/autoload.php';

use Carbon\Carbon;

$now  = Carbon::now(); //現在の日時。操作禁止
$date = Carbon::now(); //操作用日時。
$year = $date->year;

$url  = 'https://docs.google.com/spreadsheets/d/1kPT9W95uopo5cLQ_6F64Dtzc3064JruRzpzzIo7D8tQ/pub?gid=3'; //スプレッドシートのURL
$html  = file_get_html($url);
$table = $html->find('table')[0]->outertext;
$month = [];
$weeksInMonth = [];
$trMonth = [];
$t = '';
$update = $html->find('#sheets-viewport .s2')[0]->innertext;

foreach($html->find('#sheets-viewport .s3') as $tr){
	preg_match('/^[0-9]+/', $tr->innertext, $matches);

	//その月が何週あるか
	if($matches[0] < $now->month && $matches[0] != $now->month-1 && $year == $now->year){
		//セルの月が現在よりも小さく、かつ先月でもなく、かつ$yearが現在の年と同じ年なら年を+1する。
		$year = $date->addYear()->year;
	}
	$weeksOfYear    = Carbon::parse($now->year.'-12-31')->weekOfYear;                      //今年の12/31が年間の何週目か
	$firstDayOfWeek = Carbon::parse($year.'-'.(string)($matches[0] + 1).'-1')->dayOfWeek;  //翌月1日の曜日
	$nowWeekOfYear  = Carbon::parse($year.'-'.$matches[0].'-1')->weekOfYear;               //今月1日が年間の何週目か
	$nextWeekOfYear = Carbon::parse($year.'-'.(string)($matches[0] + 1).'-1')->weekOfYear; //翌月1日が年間の何週目か
	if($nowWeekOfYear == $weeksOfYear) {
		//今年の年末時点の年間の週数と今月1日時点の週数が同じなら週数を0に調整
		$nowWeekOfYear = 0;
	}
	//次月1日の年間週数と今月1日の年間週数を引いて1を足したものがその月の週数
	$weekInMonth = $nextWeekOfYear - $nowWeekOfYear + 1;
	if($firstDayOfWeek == 1){
		//ただし、1日が月曜なら週数が+1になるので引く
		$weekInMonth = $weekInMonth - 1;
	}
	array_push($month, $matches[0]);
	if(count($weeksInMonth) >= 1){
		//+2は月名と曜日の行のぶん
		//ひとつ前の月の列数を足していく
		array_push($weeksInMonth, ($weekInMonth*3 + 2) + $weeksInMonth[count($weeksInMonth)-1]);
	} else {
		//初回月
		array_push($weeksInMonth, $weekInMonth*3 + 2);
	}
}

$count = 0;
foreach($html->find('#sheets-viewport tr') as $key => $tr){
	if($key > 2 && $key <= $weeksInMonth[$count] + 2){
		//初回月。3行目から最初の月の行数に2行目までを足した行数までを抽出
		$t .= $tr->outertext;
	} else if($count >= 1 && $key >= $weeksInMonth[$count-1] + 2 && $key <= $weeksInMonth[$count] + 2){
		//2ヶ月目以降。前月の行数に2行目までの行数を足した行数から翌月の行数に2行目までの行数を足した行数までを抽出
		$t .= $tr->outertext;
	} else if($key > 2){
		//上記に該当しない場合。2ヶ月目以降の月名の行の時。
		array_push($trMonth, $t);
		$count++;
		$t = '';
		$t .= $tr->outertext;
	}
}

$html->clear();
unset($html);

//更新日時の一文を配列の最後に追加
array_push($trMonth, $update);

//JSONにして各月のデータを配列で返す
echo json_encode($trMonth);
