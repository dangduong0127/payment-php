
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/98638255fc.js" crossorigin="anonymous"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, 
user-scalable=no">
	<link rel="stylesheet" type="text/css" href="style.css">
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
					<a href="cart.php" class="">
						<span>Giỏ Hàng</span>
					</a>
				</li>
				<div class="crt">
					<img src="img/DDlogoW.png">
				</div>
				<li>
					<a href="contact.php" class="">
						<span>Liên Hệ</span>
					</a>
				</li>
				<li>
					<a href="login.php" class="">
						<span>Đăng Nhập</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="logow">
		<img src="img/DDlogo.png">
	</div>

	<div class="single-product">
		<div class="main-frame">
			<div class="slider">
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
				<p>Giàn phun viên</p>
			</div>
			<div class="price">
				<p>550.000 VNĐ</p>
			</div>
			<div class="delivery">
				<span style="margin-right: 20px;">Vận chuyển:</span>
				<img src="img/delivery.png">
				<p>Miễn phí vận chuyển nội thành Hải Phòng</p>
				<br><br>
			</div>
			<div class="description" style="width: 600px;">
				<span style="margin-right: 20px;">Mô tả:</span>
				<p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Sử dụng an toàn và hợp pháp
				chuẩn hàng bộ quốc phòng z121
				Tầm cao 25m đến 30m
				Sản phẩm nằm trong danh mục các sản phẩm được phép sử dụng của Nghị định số 137/2020/NĐ-CP của Chính phủ.</p>
				<p style="margin-top: -15px">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp *Điều 17, Nghị định 137 quy định: Cơ quan, tổ chức, doanh nghiệp, cá nhân đủ 18 tuổi trở lên có năng lực hành vi dân sự đầy đủ được sử dụng phao' hoa trong các trường hợp: lễ, tết, sinh nhật, cưới hỏi, hội nghị, khai trương, ngày kỷ niệm và trong hoạt động văn hóa, nghệ thuật.</p>
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
					<button class="btn-buy btn-success">Mua hàng</button>
				</div>
			</div>
			</div>
		</div>
	</div>
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
</script>
</body>
</html>