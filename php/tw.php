<?php
// require 'TwistOAuth.phar';
require 'TwistException.php';
require 'TwistMedia.php';
require 'TwistOAuth.php';

// 参考
// http://qiita.com/tcyyky/items/9d81169adf627aa9d793

//TwitterアカウントのCONSUMER_KEY、CONSUMER_SECRET、ACCESS_TOKEN、ACCESS_TOKEN_SECRETをセットしてください。
$CONSUMER_KEY = 'CF7lC6lX3dwBKr3CWN0cEo7G3';
$CONSUMER_SECRET = 'onWsqUw0cY8tJsjEbS0brvSWH6fFG01QLCFmDwwHhsvcBL6Xkm';
$ACCESS_TOKEN = '259159058-mgJai2ULcl7Qsm8UAU0QMXDDD0w8USeQ8bwnHZQj';
$ACCESS_TOKEN_SECRET = 'R2B0hsnPoLyyI1LmOewRe8U2IBOBI0wyJMqF0UhAoGn2o';

//最終的に出力する用の空の配列
$tweet = array();

$screen_name = 'pinion_gear';

try {
	$connection = new TwistOAuth($CONSUMER_KEY, $CONSUMER_SECRET, $ACCESS_TOKEN, $ACCESS_TOKEN_SECRET); //認証処理
	$user_params = array('screen_name' => $screen_name,'count' => '10'); //取得するデータの条件。10件取得する。
	$user = $connection->get('statuses/user_timeline', $user_params); //ユーザーのタイムラインから、設定したパラメータの条件でツイートを取得。
	foreach($user as $val){
		array_push($tweet, htmlspecialchars($val->text, ENT_QUOTES, 'UTF-8', false)); //1件ずつ配列に入れる。
	}
} catch(TwistException $e) {
	$error = $e->getMessage();
}
echo json_encode($tweet);