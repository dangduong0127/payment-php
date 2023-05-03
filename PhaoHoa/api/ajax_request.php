<?php
      session_start();
    require_once('../utils/utility.php');
    require_once('../database/dbhelper.php');

  

    $action = getPost('action');

    switch ($action) {
          case 'cart':
                // code...
                  addToCart();
                break;
            case 'update_cart':
                // code...
                  updateCart();
                break;
            case 'checkout':
                  require_once('../sendmail.php');
                  checkout();
                  break;
    }
    
    function checkout() {
      
      if(!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0)
            {
                  return;
            }
      $fullname = getPost("fullname");
      $email = getPost("email");
      $phone_number = getPost("phone_number");
      $address = getPost("address");
      $note = getPost("note");
      
      foreach($_SESSION['cart'] as $item) {
            $product_id = $item['id'];
            $price = $item['discount'];
            $num = $item['num'];
            $productn = $item['title'];
            $count = number_format($price*$num);
      }
      $title = "Có Đơn Hàng Mới Từ $fullname";
      $content= "<p>Tên: $fullname</p><p>Email: $email</p><p>Phone: $phone_number</p><p>Địa chỉ: $address</p><p>Ghi chú: $note</p><p>Đơn hàng: $productn </p>
      <p>Số lượng: $num</p> <p>Tổng tiền: $count VNĐ</p>";
      $client_title = "Thông báo đặt hàng thành công!!!";
      $client_content = "<h3>Cảm ơn $fullname đã mua hàng từ ddshop</h3>
                        <p>Chi tiết đơn hàng:</p>
                        <tr>
                              <td>Tên: $fullname</td>
                        </tr>
                        <tr>
                              <td>Sđt: $phone_number</td>
                        </tr>
                        <tr>
                              <td>địa chỉ: $address</td>
                        </tr>
                        <tr>
                              <td>Tên sản phẩm: $productn</td>
                        </tr>
                        <tr>
                              <td>Số lượng: $num</td>
                              <td>Tổng tiền: $count VNĐ</td>
                        </tr>
                        ";
      $mail = new Mailer();
      $mail->dathangmail($title,$content);
      $mail->dathangmailcomplete($email,$fullname,$client_title,$client_content);

      unset($_SESSION['cart']);
    }

    function updateCart(){
      $id = getPost('id');
      $num = getPost('num');
      if(!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
      }
      for($i=0;$i<count($_SESSION['cart']);$i++){
            if($_SESSION['cart'][$i]['id'] == $id){
                  $_SESSION['cart'][$i]['num'] = $num;
                  if($num == 0){
                        array_splice($_SESSION['cart'], $i, 1);
                  }
                  break;
            }
      }

    }

    function addToCart() {
      $id = getPost('id');
      $num = getPost('num');

      if(!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
      }

      $isFind = false;
      for($i=0;$i<count($_SESSION['cart']);$i++){
            if($_SESSION['cart'][$i]['id'] == $id){
                  $_SESSION['cart'][$i]['num'] += $num;
                  $isFind = true;
                  break;
            }
      }

      if(!$isFind) {
            $sql = "select product.*, category.name as category_name from product left join category on product.category_id = category.id where product.id = $id";
            $product = executeResult($sql, true);
            $product['num'] = $num;
            $_SESSION['cart'][] = $product;
      }
    }
?>