<?php
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'db.php';

//(一般ユーザ)購入履歴データ取得
function get_purchase_history($db, $user_id){
    return get_one_purchase_history($db, $user_id);
}

//(一般ユーザ)購入履歴データ取得処理関数
function get_one_purchase_history($db, $user_id) {
    $sql = "
    SELECT
        purchase_history.order_number,
        user_id,
        purchase_date,
        price,
        amount
    FROM
        purchase_history
    INNER JOIN 
        purchase_details
    ON 
        purchase_history.order_number = purchase_details.order_number
    WHERE
        user_id = ?
    ORDER BY 
        purchase_date desc    
    ";

    return fetch_all_query($db, $sql, array($user_id));
}

//(adminユーザ)購入履歴データ取得
function get_all_purchase_history($db){
    return get_purchase_historys($db);
}

//(adminユーザ)購入履歴データ取得関数
function get_purchase_historys($db) {
    $sql = "
    SELECT
        purchase_history.order_number,
        user_id,
        purchase_date,
        price,
        amount
    FROM
        purchase_history
    INNER JOIN 
        purchase_details
    ON 
        purchase_history.order_number = purchase_details.order_number
    ORDER BY 
        purchase_date desc";

return fetch_all_query($db, $sql);
}