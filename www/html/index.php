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

//並び替え処理
if(get_get('menu')){
  //GET値取得
  $menu = get_get('menu');
  //新着順が選択された時の処理
  if ($menu === 'new_order') {
    $items = get_items_order_by_created($db);
    set_message('新着順に並び替えました');
  //価格高い順に並び替え
  } else if ($menu === 'high_price') {
    $items = get_items_order_by_price_desc($db);
    set_message('価格が高い順に並び替えました');
  //価格低い順に並び替え
  } else if ($menu === 'low_price') {
    $items = get_items_order_by_price($db);
    set_message('価格が低い順に並び替えました');
  } else {
    set_error('並び替え処理に失敗しました。管理者に問い合わせて下さい');
  }
}

include_once VIEW_PATH . 'index_view.php';