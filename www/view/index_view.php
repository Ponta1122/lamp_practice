<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  
  <title>商品一覧</title>
  <link rel="stylesheet" href="<?php print(htmlspecialchars(STYLESHEET_PATH . 'index.css', ENT_QUOTES, 'UTF-8')); ?>">
</head>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
  
  
  <div class="container">
    <h1>商品一覧</h1>
    <?php include VIEW_PATH . 'templates/messages.php'; ?>

    <div class="card-deck">
      <div class="row">
      <?php foreach($items as $item){ ?>
        <div class="col-6 item">
          <div class="card h-100 text-center">
            <div class="card-header">
              <?php print(htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8')); ?>
            </div>
            <figure class="card-body">
              <img class="card-img" src="<?php print(htmlspecialchars(IMAGE_PATH . $item['image'], ENT_QUOTES, 'UTF-8')); ?>">
              <figcaption>
                <?php print(htmlspecialchars(number_format($item['price']), ENT_QUOTES, 'UTF-8')); ?>円
                <?php if($item['stock'] > 0){ ?>
                  <form action="index_add_cart.php" method="post">
                    <input type="submit" value="カートに追加" class="btn btn-primary btn-block">
                    <input type="hidden" name="item_id" value="<?php print(htmlspecialchars($item['item_id'], ENT_QUOTES, 'UTF-8')); ?>">
                    <!--トークンを隠しフィールドで送信-->
                    <input type="hidden" name="token" value=$token>
                  </form>
                <?php } else { ?>
                  <p class="text-danger">現在売り切れです。</p>
                <?php } ?>
              </figcaption>
            </figure>
          </div>
        </div>
      <?php } ?>
      </div>
    </div>
  </div>
  
</body>
</html>
