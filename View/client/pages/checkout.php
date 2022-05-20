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
	<link href="Public/client/css/easy-responsive-tabs.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" type="text/css" href="Public/client/css/checkout.css">
	<link rel="stylesheet" type="text/css" href="Public/client/css/boostrap.css">
	
</head>

<body>
	<div class="banner-top container-fluid" id="home">		<!-- banner -->
		<div class="banner_inner">
			<div class="services-breadcrumb">
				<div class="inner_breadcrumb">

					<ul class="short">
						<li>
							<a href="index.php">Home</a>
							<i>|</i>
						</li>
						<li>Check out</li>
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
			<div class="inner-sec-shop px-lg-4 px-3">
				<h3 class="tittle-w3layouts my-lg-4 mt-3">Cart </h3>
				<div class="checkout-right">
					<h4>Your shopping cart contains:
						<span><?php echo $count; ?> Products</span>
					</h4>
					<table class="timetable_sub">
						<thead>
							<tr>
								<th>SL No.</th>
								<th>Product</th>
								<th>Product Name</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Total</th>
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
								<td class="invert"><?php echo $row['price']; ?>$</td>
								<td class="invert">
									<div class="quantity">
										<div class="quantity-select">
											<div class="entry value">
												<span><?php echo $_SESSION['cart'][$row['id']]; ?></span>
											</div>
										</div>
									</div>
								</td>
								<td class="invert">$<?php echo $row['price']*$_SESSION['cart'][$row['id']]; ?></td>
							</tr>
								<?php $total+=$_SESSION['cart'][$row['id']]*$row['price'];} ?>
						</tbody>
					</table>
				</div>
				<div class="checkout-left row">
					<div class="col-md-4 checkout-left-basket">
						<h4>Continue to basket</h4>
						<ul>
							<?php  foreach($product as $row){?>
							<li><?php echo $row['name'].' ('.$_SESSION['cart'][$row['id']].' product)' ?>
								<i>-</i>
								<span>$<?php echo  $row['price']*$_SESSION['cart'][$row['id']];?> </span>
							</li>
							<?php } ?>
							<li>Total Service Charges
								<i>-</i>
								<span>free</span>
							</li>
							<li>Total
								<i>-</i>
								<span>$<?php echo $total ?></span>
							</li>
						</ul>
					</div>
					<div class="col-md-8 address_form">
						<h4>Add a new Details</h4>
						<form action="?controller=payment" method="post" class="creditly-card-form agileinfo_form">
							<section class="creditly-wrapper wrapper">
								<div class="information-wrapper">
									<div class="first-row form-group">
										<input type="hidden" name="price" value="<?php echo $total ?> ">
										<div class="controls">
											<label class="control-label">Full name: </label>
											<input class="billing-address-name form-control" type="text" name="name" placeholder="Full name">
										</div>
										<div class="card_number_grids">
											<div class="card_number_grid_left">
												<div class="controls">
													<label class="control-label">Mobile number:</label>
													<input class="form-control" type="text" name="phone" placeholder="Mobile number">
												</div>
											</div>
											<div class="card_number_grid_right">
												<div class="controls">
													<label class="control-label">Address: </label>
													<input class="form-control" type="text" name="address" placeholder="Address">
												</div>
											</div>
											<div class="clear"> </div>
										</div>
										<div class="controls">
											<label class="control-label">Town/City: </label>
											<input class="form-control" type="text" placeholder="Town/City">
										</div>
										<input type="hidden" name="total" value="<?php echo $total ?>">
									</div>
								</div>
								<div class="checkout-right-basket">
									<button type="submit" class="btn btn-primary">Make a Payment</button>
								</div>
							</section>
						</form>
						
					</div>

					<div class="clearfix"> </div>

				</div>
				

			</div>


		</div>
	</section>

</body>

</html>