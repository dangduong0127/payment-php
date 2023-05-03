
<?php
      session_start();
    require_once('../utils/utility.php');
    require_once('../database/dbhelper.php');

    $sql = "select * from Category";
    $menuItems = executeResult($sql);

    $sql = "select Product.*, Category.name as category_name from Product left join Category on Product.category_id = Category.id where Product.deleted = 0 order by Product.updated_at desc limit 0,5";
    $lastestItems = executeResult($sql);
    foreach($lastestItems as $product){}
  
    $urlRole = './admin/authen/login.php';

?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Giỏ hàng</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>

<meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="wrap cf">
  <h1 class="projTitle"><span></span> Chi Tiết Giỏ Hàng</h1>
  <div class="heading cf">
    <h1>Giỏ hàng của tôi</h1>
    <a href="../index.php" class="continue">Tiếp tục mua sắm</a>
  </div>
  
  <?php
    if(!isset($_SESSION['cart'])){
      $_SESSION['cart'] = [];
    }
    $index= 0;
    foreach($_SESSION['cart'] as $items){
      echo'<div class="cart">

    <ul class="cartWrap">
      <li class="items odd">
        
    <div class="infoWrap"> 
        <div class="cartSection">
        <img src="http://lorempixel.com/output/technics-q-c-300-300-4.jpg" alt="" class="itemImg" />
          <p class="itemNumber"></p>
          <h3>'.$items['title'].'</h3>
        
           <p> <button class="add" onclick="increaseCart('.$items['id'].',1)">+</button>
            <input id="num_'.$items['id'].'" style="width: 45px; text-align:center;" id="sst" type="text" name="num" value="'.$items['num'].'" onchange="fixCartNum('.$items['id'].')">
            <button class="delete" onclick="increaseCart('.$items['id'].',-1)">-</button></p>
        
          <p class="stockStatus">x '.number_format($items['discount']).' VNĐ</p>
        </div>  
    
        
        <div class="prodTotal cartSection">
          <p>'.number_format($items['num'] * $items['discount']).' VNĐ</p>
        </div>
              <div class="cartSection removeWrap">
           <button onclick="updateCart('.$items['id'].', 0)" class="aspect-ratio-169">xóa</button>
        </div>
      </div>
      </li>

      <!--<li class="items even">Item 2</li>-->
 
    </ul>
  </div>';
    }
  ?>
<?php
  if($_SESSION['cart'] == null){
    ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_WARNING);
      ini_set('display_errors', 1);
  }
?>
  <div class="subtotal cf">
    <ul>
      <li class="totalRow"><span class="label">Subtotal</span><span class="value"><?=number_format($items['num'] * $items['discount'])?></span></li>
      
          <li class="totalRow"><span class="label">Shipping</span><span class="value">free</span></li>
      
            <li class="totalRow"><span class="label">Tax</span><span class="value">$0</span></li>
            <li class="totalRow final"><span class="label">Total</span><span class="value"><?=number_format($items['num'] * $items['discount'])?> VNĐ</span></li>
      <li class="totalRow"><a href="../checkout.php" class="btn continue">Checkout</a></li>
    </ul>
  </div>
</div>
<!-- partial -->
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./script.js"></script>
<script type="text/javascript">
  function increaseCart(id, delta){
    num = parseInt($('#num_' + id).val());
    num += delta;
    if(num < 1) num = 1
    $('#num_' + id).val(num);
  updateCart(id ,num)
  }

  function fixCartNum(id){
    $('#num_' + id).val(Math.abs($('#num_' + id).val()));
    updateCart(id ,num)
  }

  function addCart(productId, num) {
    $.post('../api/ajax_request.php', {
      'action':'cart',
      'id': productId,
      'num': num
    }, function(data){
      location.reload()
    })
  }
  function updateCart(productId, num){
    $.post('../api/ajax_request.php', {
      'action':'update_cart',
      'id': productId,
      'num': num
    }, function(data){
      location.reload()
    })
  }
</script>
</body>
</html>
