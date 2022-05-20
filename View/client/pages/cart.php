<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Goggles Ecommerce Category Bootstrap responsive Web Template | Checkout :: w3layouts</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Goggles a Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<script src="Public/client/js/jquery-2.2.3.min.js"></script>
	<script type="text/javascript">
		var count = <?php echo $count ?>;
		function add(id){	
			var quantity = $('#quantity'+id).val();
			quantity++;
			$('#quantity'+id).val(quantity);	
			var amount = document.getElementById('amount'+id);
			var price = document.getElementById('price'+id);
			var total = document.getElementById('total');
			amount = amount.innerText;
			price = price.innerText;
			total = total.innerText;
			price = parseFloat(price.replace('$', ''));
			amount = parseFloat(amount.replace('$', ''));
			total = parseFloat(total.replace('$', ''));
			amount = (amount*10000 + price*10000)/10000;
			total = (total*10000 + price*10000)/10000;
			document.getElementById('amount'+id).innerHTML = '$'+amount;
			document.getElementById('total').innerHTML = '$'+total;
			$.post("Ajax/addcart.php", {id:id}, function(result){
			});
		}
		function minus(id, stt){
			var quantity = $('#quantity'+id).val();
			if (quantity == 1) {
				if(confirm('do you want to delete this product')){
					delcart(id,stt);
				}
			}
			else {
				quantity--;
				$('#quantity'+id).val(quantity);
				var amount = document.getElementById('amount'+id);
				var price = document.getElementById('price'+id);
				var total = document.getElementById('total');
				amount = amount.innerText;
				price = price.innerText;
				total = total.innerText;
				price = parseFloat(price.replace('$', ''));
				amount = parseFloat(amount.replace('$', ''));
				total = parseFloat(total.replace('$', ''));
				amount = (amount*10000 - price*10000)/10000;
				total = (total*10000 - price*10000)/10000;
				document.getElementById('amount'+id).innerHTML = '$'+amount;
				document.getElementById('total').innerHTML = '$'+total;
				$.post('Ajax/addcart.php', {id:id, quantity:quantity});
			}

		}
		function delcart(id,stt){
			count--;
			var amount = document.getElementById('amount'+id);
			var total = document.getElementById('total');
			amount = amount.innerText;
			total = total.innerText;
			amount = parseFloat(amount.replace('$', ''));
			total = parseFloat(total.replace('$', ''));
			total = (total*10000 - amount*10000)/10000;
			document.getElementById('total').innerHTML = '$'+total;
			if(count==0) document.getElementById('cart').innerHTML ='<h4>cart is empty</h4>';
			else document.getElementById('count').innerHTML =count;
			$.post('Ajax/delcart.php', {id:id});
			$('.rem'+stt).remove();
		}
	</script> 
	<!-- <script type="text/javascript">
		$(document).ready(function(){
			$("#guibinhluan").click(function(){
				var url_string = window.location.href;
				var url = new URL(url_string);
				var id = url.searchParams.get("id");
				var txt = $("#noidungbinhluan").val();
				$.post("xulybinhluan.php", {content: txt, idproduct: id, iduser: iduser}, function(result){
					;
				});
			});
		});
	</script> -->
	<link href="Public/client/css/easy-responsive-tabs.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" type="text/css" href="Public/client/css/checkout.css">
	<style type="text/css">
		input[type=button]{
			box-sizing: border-box;
			border: 1px solid #ccc;
			outline: none;
		}
		input[type=button] {
			cursor: pointer;
		}
		input[type=text]:focus {
			border: 1px solid #ccc;
		}
		.width-110{
			width: 110px;
		}
		.width-80{
			width: 80px;
		}
	</style>
</head>

<body>
	<div class="banner-top container-fluid" id="home">
		<div class="banner_inner">
			<div class="services-breadcrumb">
				<div class="inner_breadcrumb">

					<ul class="short">
						<li>
							<a href="index.php">Home</a>
							<i>|</i>
						</li>
						<li>Cart </li>
					</ul>
				</div>
			</div>

		</div>
		<!--//banner -->
	</div>
	<!--// header_top -->
	<!--checkout-->
	<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
		<div class="container">
			<div class="inner-sec-shop px-lg-4 px-3" id="cart">
				<h3 class="tittle-w3layouts my-lg-4 mt-3">Cart </h3>
				<?php if($count>0){ ?>
				<div class="checkout-right">
					<h4>Your shopping cart contains:
						<span id="count"><?php echo $count; ?> Products</span>
					</h4>
					<table class="timetable_sub">
						<thead>
							<colgroup>
						       <col span="1" style="width: 10%;">
						       <col span="1" style="width: 30%;">
						       <col span="1" style="width: 20%;">
						       <col span="1" style="width: 10%;">
						       <col span="1" style="width: 15%;">
						       <col span="1" style="width: 10%;">
						       <col span="1" style="width: 5%;">
						    </colgroup>
							<tr>
								<th>SL No.</th>
								<th>Product</th>
								<th>Product Name</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Amount</th>
								<th>Remove</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$stt = 0;
							foreach ($product as $row) {
								$stt++;
								?>
								<tr class="rem<?php echo $stt; ?>">
									<td class="invert"><?php echo "$stt"; ?></td>
									<td class="invert-image">
										<a href="detail.php?id=<?php echo $row['id']; ?>">
											<img src="Public/client/images/<?php echo $row['images']; ?>" alt=" " class="img-responsive">
										</a>
									</td>
									<td class="invert"><?php echo $row['name']; ?></td>
									<td class="invert width-80" id="price<?php echo $row['id']; ?>">$<?php echo $row['price']; ?></td>
									<td class="invert">
										<div class="quantity">
											<div class="quantity-select">
												<input type="button"  name="" value="-" onclick="minus(<?php echo $row['id'].','.$stt; ?>)">
												<input type="text" name="" min='0' max='100' disabled id="quantity<?php echo $row['id'] ?>" size="1" maxlength="3" value="<?php echo $_SESSION['cart'][$row['id']] ?> ">
												<input type="button"  name="" value="+" onclick="add(<?php echo $row['id']; ?>)">
											</div>
										</div>
									</td>
									<td class="invert width-110" id="amount<?php echo $row['id']; ?>">$<?php echo $row['price']*$_SESSION['cart'][$row['id']]; ?></td>
									<td class="invert">
										<div class="rem">
											<input type="button" name="" value="x" onclick="delcart(<?php echo $row['id'].','.$stt; ?>)">
										</div>
									</td>
								</tr>
								<?php $total+=$_SESSION['cart'][$row['id']]*$row['price'];} ?>
							</tbody>
						</table>
					</div>
					<div class="checkout-left row">
						<div class="col-md-10"></div>
						<div class="col-md-2 checkout-left-basket">
							<li>Total
								<i>-</i>
								<span id="total">$<?php echo $total ?></span>
							</li>

						</div>

						<div class="clearfix"> </div>
						<?php
							$disabled ='';
							$alert = '';
							if (!isset($_SESSION['user'])) {
								$disabled = 'disabled';
								$alert = '<div class="text-danger">(You must <a href="?controller=signin">login</a> to do this)</div>';
							}
						?>
					</div>
					<div class="row">
						<div class="col-md-6"></div>
						<div class="col-md-6"><button type="button" class="btn btn-primary" <?php echo $disabled ?> onclick="location.href ='?controller=checkout'">Mua hàng</button><?php echo $alert ?></div>
					</div>

					<?php 
						}
						else  echo '<h4>cart is empty</h4>';
					?>


			</div>

		</div>
	</section>
	<!--//checkout-->
	<!--jQuery-->


	<script src="Public/client/js/bootstrap.js"></script>
	<!-- js file -->
</body>

</html>