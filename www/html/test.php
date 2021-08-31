<!DOCTYPE html>
<html lang="ja">
<head>
  <title>商品一覧</title>
  <link rel="stylesheet" href="<?php print(htmlspecialchars(STYLESHEET_PATH . 'index.css', ENT_QUOTES, 'UTF-8')); ?>">
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
  addEventListener('change', function(){
    $.ajax({
        url: "index.php",
        type: "get",
        dataType: "json",
        data:{'menu':$('#menu').val()}
    }).done(function (response) {
        alert("successa");
    }).fail(function (xhr,textStatus,errorThrown) {
        alert('error');
    });
});
</script>
<body>
  <div class="container">
    <?php var_dump($_GET['menu']); ?>
    <h1>商品一覧</h1>
    <form action="test.php" class="text-right" method=“GET”>
      <select name="menu" size="1">
        <option value="new_order" selected>新着順</option>
        <option value="high_price">価格が高い順</option>
        <option value="low_price">価格が低い順</option>
      </select>
    </form>
    <div class="card-deck">
      <div class="row">

      </div>
    </div>
  </div>
</body>
</html>

