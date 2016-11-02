<?php
//require 'php/vendor/autoload.php';
//use Carbon\Carbon;

$url  = 'https://docs.google.com/spreadsheets/d/1_4WKocacmAc5sk4ToA0ZcIuWebD3Sr6Lo8xTRuoh_V8/pub?gid=641050115&single=true&output=csv'; //スプレッドシートのURL
$file = new NoRewindIterator(new SplFileObject($url));
$file->setFlags(SplFileObject::READ_CSV);
foreach ($file as $line) {
	$ret[] = $line;
}

$length = count($ret);
$data = [];
$data['update'] = $ret[0][0];

//各月用の箱を作る
$month = [];
$firstMonth = $ret[1][0];
$endMonth   = $ret[$length-1][0];
if($firstMonth <= $endMonth){
	for($i = 0; $i <= ($endMonth - $firstMonth); $i++){
		$month[$i] = [];
	}
} else {
	for($i = 0; $i <= (12 - $firstMonth); $i++){
		$month[$i] = [];
	}
	for($j = 0; $j <= $endMonth; $j++){
		$month[$i+$j-1] = [];
	}
}

//各月ごとにデータを纏める
$m = $ret[1][0];
$count = 0;
$days = 1;
foreach ($ret as $key=>$value) {
	if($key > 0){
		if($m == $value[0]){
			$month[$count]['month'] = $value[0];
			$month[$count]['day'.$days] = $value;
		} else {
			$m++;
			$count++;
			$days = 1;
			$month[$count]['month'] = $value[0];
			$month[$count]['day'.$days] = $value;
		}
		$days++;
	}
}

//各月の日数、初日、最終日を取得
$c = 0;
foreach($month as $key=>$value){
	$dayInMonth = count($value)-1;
	$firstDay = $value['day1'];
	$endDay = $value['day'.$dayInMonth];
	$month[$c]['dayInMonth'] = $dayInMonth;
	$month[$c]['firstDay'] = $firstDay;
	$month[$c]['endDay'] = $endDay;
	$c++;
}

$d = 1;
$html = '';
foreach($month as $key=>$value){
	for($j = 0; $j < $value['dayInMonth']; $j++){
		if($d == 1){
			$bfPad = bfPad($value['day'.$d][2]);
			$html = '<tr>'.$bfPad;
		}
		if($value['day'.$d][2] == '月') $html .= '<tr>';
		$matinee = matinee($value['day'.$d][3], $value['day'.$d][4], $value['day'.$d][5]);
		$soiree  = soiree($value['day'.$d][3], $value['day'.$d][4], $value['day'.$d][5]);
		$html .= '<td><div class="day">'.$value['day'.$d][1].'</div><div class="matinee">'.$matinee.'</div><div class="soiree">'.$soiree.'</div></td>';
		if($value['day'.$d][2] == '日') $html .= '</tr>';
		if($d == $value['dayInMonth']){
			$afPad = afPad($value['day'.$d][2]);
			$html .= $afPad.'</tr>';
			$month[$key]['html'] = $html;
			$d = 1;
			$html = '';
		} else {
			$d++;
		}
	}
}
$data['month'] = $month;

function matinee($time, $status, $flag){
	$t = $time;
	if($status == '○') {
		$t = '<span class="haveToSpace">'.$t.'</span>';
	} else if($status == '△') {
		$t = '<span class="few">'.$t.'</span>';
	} else if($status == '▼') {
		$t = '<span class="noRoom">'.$t.'</span>';
	} else if($status == '×') {
		$t = '<span class="full">'.$t.'</span>';
	}
	if($flag == '昼割') {
		$t = '<span class="discount">'.$t.'</.span>';
	} else if($flag == 'キッズ') {
		$t = '<span class="kids">'.$t.'</.span>';
	} else {
		$t = '<span class="inner">'.$t.'</.span>';
	}
	return $t;
}

function soiree($time, $status, $flag){
	$t = $time;
	if($status == '○') {
		$t = '<span class="haveToSpace">'.$time.'</span>';
	} else if($status == '△') {
		$t = '<span class="few">'.$time.'</span>';
	} else if($status == '▼') {
		$t = '<span class="noRoom">'.$time.'</span>';
	} else if($status == '×') {
		$t = '<span class="full">'.$time.'</span>';
	}
	$t = '<span class="inner">'.$t.'</.span>';
	return $t;
}

function bfPad($week){
	if($week == '月') {
		$pad = '';
	} else if($week == '火') {
		$pad = '<td>&nbsp;</td>';
	} else if($week == '水') {
		$pad = '<td>&nbsp;</td><td>&nbsp;</td>';
	} else if($week == '木') {
		$pad = '<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>';
	} else if($week == '金') {
		$pad = '<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>';
	} else if($week == '土') {
		$pad = '<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>';
	} else if($week == '日') {
		$pad = '<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>';
	}
	return $pad;
}

function afPad($week){
	if($week == '月') {
		$pad = '<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>';
	} else if($week == '火') {
		$pad = '<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>';
	} else if($week == '水') {
		$pad = '<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>';
	} else if($week == '木') {
		$pad = '<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>';
	} else if($week == '金') {
		$pad = '<td>&nbsp;</td><td>&nbsp;</td>';
	} else if($week == '土') {
		$pad = '<td>&nbsp;</td>';
	} else if($week == '日') {
		$pad = '';
	}
	return $pad;
}


echo json_encode($data);