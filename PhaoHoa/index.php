<?php
	require_once('layouts/header.php');
	foreach($lastestItems as $product){}

?>
	<div class="logow">
		<img src="img/DDlogo.png">
	</div>

	<div class="single-product">
		<div class="main-frame">
			<div class="">
				<div class="slides">
					<input type="radio" name="radio-btn" id="radio1">
					<input type="radio" name="radio-btn" id="radio2">
					<input type="radio" name="radio-btn" id="radio3">
					<input type="radio" name="radio-btn" id="radio4">
					<div class="slide first">
						 <img src="img/firstimg.jpg">
					</div>
					<div class="slide">
						<img src="img/0558b4c2c3431b1d4252.jpg">
					</div>
					<div class="slide">
						<video controls>
							<source src="img/5399262182756376525.mp4" type="video/mp4">
						</video>
					</div>

					<div class="navigation-auto">
						<div class="auto-btn1"></div>
						<div class="auto-btn2"></div>
						<div class="auto-btn3"></div>
					</div>
				</div>

				<div class="navigation-manual">
					<label for="radio1" class="manual-btn"></label>
					<label for="radio2" class="manual-btn"></label>
					<label for="radio3" class="manual-btn"></label>
				</div>
			</div>
		<div class="main">
			<div class="title">
				<p><?=$product['title']?></p>
			</div>
			<div class="price">
				<p><?=number_format($product['discount'])?> VNĐ</p>
			</div>
			<div class="delivery">
				<span style="margin-right: 20px;">Vận chuyển:</span>
				<img src="img/delivery.png">
				<p>Miễn phí vận chuyển nội thành Hải Phòng</p>
				<br><br>
			</div>
			<div class="description" style="width: 600px;">
				<span style="margin-right: 20px;">Mô tả:</span>
				<?=$product['description']?>
			</div>
			<div class="phone_number" style="margin-bottom: 10px; color: red;">
					<b>Liên hệ: 0705585612</b>
			</div>
			<div class="under">
						<div class="numb">
					<span>Số lượng:</span>
					<div class="count">
						<button class="add" onclick="increaseCart(1)">+</button>
						<input id="sst" type="text" name="num" value="1" onchange="fixCartNum()">
						<button class="delete" onclick="increaseCart(-1)">-</button>
					</div>
				</div>
				<div class="footer">
					<button class="btn-buy btn-success" onclick="addCart(<?=$product['id']?>, $('[name=num]').val())">Thêm vào giỏ</button>
				</div>
			</div>
			</div>
		</div>
	</div>
	<script src="https://kit.fontawesome.com/98638255fc.js" crossorigin="anonymous"></script>
	<?php
		if(!isset($_SESSION['cart'])){
				$_SESSION['cart'] = [];
		}
		$count = 0;
		foreach($_SESSION['cart'] as $item){
			$count += $item['num'];
		}
	?>
	<span class="cart_icon">
    <span class="cart_count"><?=$count?></span>
    <a href="cart/" style="color:grey;"><i class="fa-solid fa-cart-shopping"></i></a>
  </span>
	<style type="text/css">
    .cart_icon {
      position: fixed;
      z-index: 999;
      right: 20px;
      top: 88%;
      font-size: 45px;
      
    }
    .cart_icon > .cart_count{
      background-color: red;
      border-radius: 20px;
      height: 100%;
      width: 100%;
      font-size: 15px;
      color: white;
      padding-top: 3px;
      padding-bottom: 3px;
      padding-left: 6px;
      padding-right: 6px;
      position: relative;
      bottom: 30px;
      left: 60px;
      font-weight: bold;

    }
  </style>
  
	<script type="text/javascript">
  function increaseCart(delta){
    num = parseInt($('[name = num]').val());
    num += delta;
    if(num < 1) num = 1
    $('[name = num]').val(num);
  }

  function fixCartNum(){
    $('[name = num]').val(Math.abs($('[name = num]').val()));
  }

  function addCart(productId, num) {
  	$.post('api/ajax_request.php', {
  		'action':'cart',
  		'id': productId,
  		'num': num
  	}, function(data){
  		location.reload()
  	})
  }

  var counter = 1;
  setInterval(function(){
  	document.getElementById('radio' + counter).checked = true;
  	counter++;
  	if(counter > 4){
  		counter = 1;
  	}
  }, 5500);
</script>
</body>
</html>
<?php
require_once('footer.php');
	?>