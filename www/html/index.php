<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'item.php';

session_start();

//iframe読み込み禁止設定
header("X-FRAME-OPTIONS: DENY");
//トークンの作成
$token = get_csrf_token();

if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

$db = get_db_connect();
$user = get_login_user($db);

//商品一覧初期表示(新着順)
$items = get_items_order_by_created($db);

//並び替え
$menu = $_GET['menu'];


echo json_encode($menu);



include_once VIEW_PATH . 'index_view.php';