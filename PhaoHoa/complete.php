<?php
  require_once('layouts/header.php');
?>

<section class="cart_area">
      <div class="container">
        <div class="cart_inner">
          <div class="table-responsive">
            <table class="table" style="text-align: center;">
                <tr class="bottom_button" >
                  <h1 style="text-align: center; color: green;">ĐƠN HÀNG CỦA BẠN ĐÃ ĐƯỢC TẠO THÀNH CÔNG!!!</h1>
                </tr>

                <td>
                	<h3>Cảm ơn quý khách đã đặt mua sản phẩm của chúng tôi!</h3>
                	<h3>Đơn hàng của quý khách sẽ được nhân viên kiểm tra và giao hàng trong thời gian sớm nhất.</h3>
                	
                    <div class="checkout_btn_inner">
                      <a class="btn btn-success" href="index.php">Tiếp tục mua sắm</a>
                    </div>
                  </td>
                <tr> 
                </tr>
            </table>
          </div>
        </div>
      </div>
    </section>

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
</script>
</html>