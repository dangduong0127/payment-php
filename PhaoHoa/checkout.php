<?php
  require_once('layouts/header.php');

?>

<!--================Home Banner Area =================-->
    <section class="banner_area">
      <div class="banner_inner d-flex align-items-center">
        <div class="container">
          <div
            class="banner_content d-md-flex justify-content-between align-items-center"
          >
            <div class="mb-3 mb-md-0">
              <h2 style="font-weight: bold;">Thanh toán</h2>
              <p></p>
            </div>
            
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Checkout Area =================-->
    <section class="checkout_area section_gap">
      <div class="container">
        <div class="billing_details">
          <div class="row">
            <form
                name="form-complete"
                class="row contact_form"
                action="#"
                method="post"
                novalidate="novalidate"
                onsubmit="return completeCheckout();"
                
              >
            <div class="col-lg-7">
              <h3 >Thông tin khách hàng</h3>
              
                
                
                <div class="col-md-12 form-group">
                  <input
                    type="text"
                    class="form-control"
                    id="company"
                    name="fullname"
                    placeholder="Họ và tên"
                    style="width: 400px;"
                  />
                </div>
                <div class="col-md-6 form-group p_star">
                  <input
                    required="true"
                    type="tel"
                    class="form-control"
                    id="phone"
                    name="phone"
                    style="width: 400px;"
                    placeholder="Số điện thoại"
                  />
                  <span
                    class="placeholder"
                    data-placeholder="Phone number"
                  ></span>
                </div>
                <div class="col-md-8 form-group p_star">
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    style="width: 400px;"
                    name="email"
                    placeholder="Email"
                  />
                  <span
                    class="placeholder"
                    data-placeholder="Email Address"
                  ></span>
                </div>
                <!--<div class="col-md-12 form-group p_star">
                  <select class="country_select">
                    <option value="1">Hải Phòng</option>
                    <option value="2">Hà Nội</option>
                    <option value="4">Hồ Chí Minh</option>
                  </select>
                </div>-->
                <div class="col-md-10 form-group p_star">
                  <input
                    required="true"
                    type="text"
                    class="form-control"
                    id="address"
                    name="address"
                    style="width: 400px;"
                    placeholder="Địa chỉ"
                  />
                  <span
                    class="placeholder"
                    data-placeholder="Address"

                  ></span>
                </div>
              
                <div class="col-md-12 form-group">
                  <textarea
                    class="form-control"
                    name="note"
                    id="message"
                    rows="3"
                    style="width: 400px;"S
                    placeholder="Nội dung ghi chú"
                  ></textarea>
                </div>
              
            </div>
            <div class="col-lg-5">
              <div class="order_box">
                <h2>Đơn hàng của bạn</h2>
                <ul class="list">
                  <li>
                    <a href="#"
                      >Sản phẩm
                      <span>Tổng </span>
                    </a>
                  </li>
                <?php
                if($_SESSION['cart'] == null){
                    ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_WARNING);
                    ini_set('display_errors', 1);
                }
                if(!isset($_SESSION['cart'])) {
                    $_SESSION['cart'] = [];
                  }$index = 0;
                  foreach($_SESSION['cart'] as $item) {
                    echo'
              
                  <li>
                    <a href="#"
                      >'.$item['title'].'
                      <span class="middle">x'.$item['num'].'</span>
                      <span class="last">'.number_format($item['discount'] * $item['num']).' VNĐ</span>
                    </a>
                  </li>
                
            ';
          }
                ?>
                </ul>
                <ul class="list list_2">
                  
                  <li>
                    <a href="#">Tổng
                      <span><?=number_format($item['discount'] * $item['num'])?> VNĐ</span>
                    </a>
                  </li>
                </ul>
                
              
                <button class=" btn-success" style=" width: 250px;position: relative;">Thanh toán</button>
              </div>
            </div>
            </form>
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
    <!--================End Checkout Area =================-->
<script type="text/javascript">
  function completeCheckout() {
    let x = document.forms["form-complete"]["fullname"].value;
    let y = document.forms["form-complete"]["phone"].value;
    let z = document.forms["form-complete"]["address"].value;
   
    if(x == "" ||y == "" ||z == ""){
      alert("Bạn chưa nhập đủ thông tin, vui lòng ktra lại!!!");
      return false;
    }
    $.post('api/ajax_request.php', {
      'action': 'checkout',
      'fullname': $('[name=fullname]').val(),
      'email': $('[name=email]').val(),
      'phone_number': $('[name=phone]').val(),
      'address': $('[name=address]').val(),
      'note': $('[name=note]').val()
    }, function(){
      window.open('complete.php', '_self')
    })

    return false;
  }

  function validateForm(){
    
  }
</script>
