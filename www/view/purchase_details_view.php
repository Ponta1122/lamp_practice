<!DOCTYPE html>
<html lang="ja">
<head>
    <?php include VIEW_PATH . 'templates/head.php'; ?>
    <title>購入明細</title>
</head>
<body>
    <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
    
    <div class="container">
        <span class="mr-5">注文番号：<?php print(htmlspecialchars($purchase_details[0]['order_number'], ENT_QUOTES, 'UTF-8')); ?>番</span>
        <span class="mr-5">購入日時：<?php print(htmlspecialchars($purchase_details[0]['purchase_date'], ENT_QUOTES, 'UTF-8')); ?></span>
        <span>合計金額：<?php print(htmlspecialchars($purchase_sum_price['sum'], ENT_QUOTES, 'UTF-8')); ?>円</span>
        <h1 class="mt-3">購入明細</h1>

        <?php include VIEW_PATH . 'templates/messages.php'; ?>
            
        <table class="table table-bordered text-center">
            <thead class="thead-light">
                <tr>
                    <th>商品名</th>
                    <th>商品価格</th>
                    <th>購入数</th>
                    <th>小計</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($purchase_details as $purchase_details){ ?>
                    <tr>
                        <!--商品名表示-->
                        <td><?php print(htmlspecialchars($purchase_details['name'], ENT_QUOTES, 'UTF-8')); ?></td>
                        <!--商品価格-->
                        <td><?php print(htmlspecialchars($purchase_details['price'], ENT_QUOTES, 'UTF-8')); ?>円</td>
                        <!--購入数表示-->
                        <td><?php print(htmlspecialchars($purchase_details['amount'], ENT_QUOTES, 'UTF-8')); ?></td>
                        <!--小計表示-->
                        <td><?php print(htmlspecialchars($purchase_details['price'] * $purchase_details['amount'], ENT_QUOTES, 'UTF-8')); ?>円</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>

