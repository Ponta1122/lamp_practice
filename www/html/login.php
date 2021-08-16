<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';

session_start();

//iframe読み込み禁止設定
header("X-FRAME-OPTIONS: DENY");
//トークンの作成
$token = get_csrf_token();

if(is_logined() === true){
  redirect_to(HOME_URL);
}

include_once VIEW_PATH . 'login_view.php';