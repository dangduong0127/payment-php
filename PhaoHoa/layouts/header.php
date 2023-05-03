<?php
      session_start();
    require_once('utils/utility.php');
    require_once('database/dbhelper.php');

    $sql = "select * from Category";
    $menuItems = executeResult($sql);

    $sql = "select Product.*, Category.name as category_name from Product left join Category on Product.category_id = Category.id where Product.deleted = 0 order by Product.updated_at desc limit 0,5";
    $lastestItems = executeResult($sql);
    
    $urlRole = './admin/authen/login.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="img/Done.png" type="image/png" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/98638255fc.js" crossorigin="anonymous"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, 
user-scalable=no">
	
	<link rel="stylesheet" type="text/css" href="stylehome.css">
	<title>Giàn Phun Viên</title>
</head>
<body>
	<div class="header">
		<div class="category">
			<ul class="list" >
				<li>
					<a href="index.php">
						<!--<i class="fa-sharp fa-solid fa-house"></i><br>-->
						<span>Trang Chủ</span>
					</a>
				</li>
				<li>
					<a href="cart/" class="">
						<span>Giỏ Hàng</span>
					</a>
				</li>
				<div class="crt">
					<img src="img/DDlogoW.png">
				</div>
				<li>
					<a href="#" class="">
						<span>Liên Hệ</span>
					</a>
				</li>
				<li>
					<a href="#" class="">
						<span>Đăng Nhập</span>
					</a>
				</li>
			</ul>
		</div>
	</div>