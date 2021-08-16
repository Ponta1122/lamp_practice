<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';

session_start();

if(is_logined() === true){
  redirect_to(HOME_URL);
}

//トークンチェック
if(is_valid_csrf_token($_POST['token']) === false){
  redirect_to(LOGIN_URL);
}

$name = get_post('name');
$password = get_post('password');

$db = get_db_connect();


$user = login_as($db, $name, $password);
if( $user === false){
  set_error('ログインに失敗しました。');
  //トークン削除
  delete_session();
  redirect_to(LOGIN_URL);
}

set_message('ログインしました。');
if ($user['type'] === USER_TYPE_ADMIN){
  //トークン削除
  delete_session();
  redirect_to(ADMIN_URL);
}

//トークン削除
delete_session();

redirect_to(HOME_URL);