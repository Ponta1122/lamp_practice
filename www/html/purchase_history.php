<?php
//ファイル読み込み
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'purchase_history.php';

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

//(一般ユーザ)購入履歴データ取得
if(is_admin($user) === false){
    //ログインユーザに該当するデータのみ取得
    $purchase_history = get_purchase_history($db, $user['user_id']);
//(adminユーザ)購入履歴データ取得
} else {
    //全ユーザのデータ取得
    $purchase_history = get_all_purchase_history($db);
    var_dump($purchase_history);
}

//Viewファイル読み込み
include_once VIEW_PATH . '/purchase_history_view.php';