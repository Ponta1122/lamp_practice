<?php 
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'db.php';

//注文詳細データ取得関数
function get_purchase_details($db, $order_number){
    return get_purchase_detail($db, $order_number);
}

//注文詳細データ取得処理関数
function get_purchase_detail($db, $order_number) {
    $sql = "
        SELECT
            items.item_id,
            name,
            purchase_details.order_number,
            purchase_details.price,
            amount,
            purchase_date
        FROM
            items
        INNER JOIN
            purchase_details
        ON
            items.item_id = purchase_details.item_id
        INNER JOIN
            purchase_history
        ON
            purchase_details.order_number = purchase_history.order_number
        WHERE
            purchase_details.order_number = ?
    ";

    return fetch_all_query($db, $sql, array($order_number));
}