<!DOCTYPE html>
<html lang="ja">
<head>
    <?php include VIEW_PATH . 'templates/head.php'; ?>
    <title>購入履歴</title>
</head>
<body>
    <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
    
    <div class="container">
        <h1>購入履歴一覧</h1>

        <?php include VIEW_PATH . 'templates/messages.php'; ?>
            
        <table class="table table-bordered text-center">
            <thead class="thead-light">
                <tr>
                    <th>注文番号</th>
                    <th>購入日時</th>
                    <th>合計金額</th>
                    <th>購入明細</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($purchase_history as $purchase_history){ ?>
                    <tr>
                        <!--注文番号表示-->
                        <td><?php print(htmlspecialchars($purchase_history['order_number'], ENT_QUOTES, 'UTF-8')); ?></td>
                        <!--購入日時表示-->
                        <td><?php print(htmlspecialchars($purchase_history['purchase_date'], ENT_QUOTES, 'UTF-8')); ?></td>
                        <!--合計金額表示-->
                        <td><?php print(htmlspecialchars($purchase_history['sum'], ENT_QUOTES, 'UTF-8')); ?>円</td>
                        <!--購入明細表示ボタン表示-->
                        <td>
                            <form action="purchase_details.php" method="post">
                                <input type="hidden" name="order_number" value="<?php print $purchase_history['order_number']; ?>">
                                <input type="submit" value="購入明細">
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>

