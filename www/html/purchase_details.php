<?php
//ファイル読み込み
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'purchase_details.php';

//セッション開始
session_start();

//iframe読み込み禁止設定
header("X-FRAME-OPTIONS: DENY");

//トークンの作成
$token = get_csrf_token();

//ログイン確認
if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

//DB接続
$db = get_db_connect();

//ユーザ情報取得
$user = get_login_user($db);

//POST値チェック
$order_number = get_post('order_number');

//購入明細データ取得
$purchase_details = get_purchase_details($db, $order_number);

//購入金額の合計値取得
$purchase_sum_price = get_purchase_sum_prices($db, $order_number);

//Viewファイル読み込み
include_once VIEW_PATH . '/purchase_details_view.php';