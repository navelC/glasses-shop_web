<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Goggles Ecommerce Category Bootstrap responsive Web Template | Single :: w3layouts</title>
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
	<style type="text/css">
		.active {
		    color: #ff4e00 !important;
			}
	</style>
	<link rel="stylesheet" type="text/css" href="Public/client/css/jquery-ui1.css">
	<link href="Public/client/css/easy-responsive-tabs.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="Public/client/css/flexslider.css" type="text/css" media="screen" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("input[type=button]").click(function(){
				var quantity = $("#quantity").val();
				if ($(this).val() == '-') {
					quantity--;
				}
				if ($(this).val() == '+') {
					quantity++;
				}
				$("#quantity").val(quantity);
			});
		});
	</script> 
	<script type="text/javascript">
		function rate(star) {
			for (var i = 1; i <= 5; i++) {
				$('#star'+i).css("color", "#cecbcb");
			}
			for (var i = 1; i <= star; i++) {
				$('#star'+i).css("color", "#ff4e00");
			}
			$("#star").val(star);
		}
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#guibinhluan").click(function(){
				var url_string = window.location.href;
				var url = new URL(url_string);
				var id = url.searchParams.get("id");
				var iduser = '<?=$_SESSION['user']['id'];?>';
				var name = '<?=$_SESSION['user']['name'];?>';
				var txt = $("#noidungbinhluan").val();
				var star = $("#star").val();
				$.post("Ajax/index.php?controller=comment", {content: txt, idproduct: id, iduser: iduser, star:star}, function(result){
					document.getElementById("comment").innerHTML += '<div class="bootstrap-tab-text-grid">'+
					'<div class="bootstrap-tab-text-grid-left">'+
					'<img src="Public/client/images/no-image-icon-md.png" alt=" " class="img-fluid">'+
					'</div>'+
					'<div class="bootstrap-tab-text-grid-right">'+
					'<ul>'+
					'<li><a href="#">'+name+'</a></li>'+
					result+
					'</ul>'
					+'<p>'+txt+'</p>'
					+'</div>'
					+	'<div class="clearfix"> </div>'
					+'</div>'
					;
				});
			});
		});
	</script>
	<style type="text/css">
		.bootstrap-tab-text-grid{
			margin-top: 15px;
		}
		input[type=text], input[type=button]{
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
	</style>
</head>

<body>
	<div class="banner-top container-fluid" id="home">
		<!-- banner -->
		<div class="banner_inner">
			<div class="services-breadcrumb">
				<div class="inner_breadcrumb">

					<ul class="short">
						<li>
							<a href="./">Home</a>
							<i>|</i>
						</li>
						<li>Detail</li>
					</ul>
				</div>
			</div>

		</div>
		
	</div>
	<!--//banner -->
	<!--/shop-->
	<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
		<div class="container">
			<div class="inner-sec-shop pt-lg-4 pt-3">
				<div class="row">
					<div class="col-lg-4 single-right-left ">
						<div class="grid images_3_of_2">
							<div class="flexslider1">
								<div class="thumb-image"> <img src="Public/client/images/<?php echo $row['images'] ?>" data-imagezoom="true" class="img-fluid" alt=" "> </div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
					<div class="col-lg-8 single-right-left simpleCart_shelfItem">
						<h3><?php echo $row['name']; ?></h3>
						<p><span class="item_price"><?php echo $row['price']; ?>$</span>
							<!--<del>1,199$</del>-->
						</p>
						<div class="rating1">
							<ul class="stars">
								<?php $star=1; while ($star <= $rate) { ?>
								<li><a href="#"><i class="fa fa-star active" aria-hidden="true"></i></a></li>
								<?php $star++;} ?>
								<?php  while ($star <= 5) { ?>
								<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
								<?php $star++;} ?>
							</ul>
						</div>
						<div style="font-size: 14px; padding-bottom: 20px">(<?php if($countrate==0) echo "sản phẩm chưa được đánh giá"; else
						echo $countrate." người đã đánh giá"; ?>)</div>
						<div class="color-quality">
							<div class="color-quality-right">
								<h5>Quantity :</h5>
								<div class="quantity">
									<div class="quantity-select">
										<form method="POST" action="?controller=cart">
											<input type="button"  name="" value="-" >
											<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
											<input type="text" name="quantity" value="1" size="1" maxlength="3" id="quantity">  
											<input type="button"  name="" value="+">
											<div class="googles single-item singlepage">
												<button type="submit" class="googles-cart pgoogles-cart">
													Add to Cart
												</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>

						<ul class="footer-social text-left mt-lg-4 mt-3">
							<li>Share On : </li>
							<li class="mx-2">
								<a href="#">
									<span class="fab fa-facebook-f"></span>
								</a>
							</li>
							<li class="mx-2">
								<a href="#">
									<span class="fab fa-twitter"></span>
								</a>
							</li>
							<li class="mx-2">
								<a href="#">
									<span class="fab fa-google-plus-g"></span>
								</a>
							</li>
							<li class="mx-2">
								<a href="#">
									<span class="fab fa-linkedin-in"></span>
								</a>
							</li>
							<li class="mx-2">
								<a href="#">
									<span class="fas fa-rss"></span>
								</a>
							</li>

						</ul>

					</div>
					<div class="clearfix"> </div>
					<!--/tabs-->
					<div class="responsive_tabs">
						<div id="horizontalTab">
							<ul class="resp-tabs-list">
								<li>Description</li>
								<li>Reviews</li>
							</ul>
							<div class="resp-tabs-container">
								<!--/tab_one-->
								<div class="tab1">

									<div class="single_page">
										<p><?php echo $row['description']; ?></p>
									</div>
								</div>
								<!--//tab_one-->
								<div class="tab2">

									<div class="single_page">
										<div class="bootstrap-tab-text-grids">
											<div id="comment">
												<?php
												$lock = 0;
												foreach ($comment as $row) {
													$rate = 1;
													if(!isset($_SESSION['user']) ||$row['id'] == $_SESSION['user']['id']) $lock=1;
													?>
													<div class="bootstrap-tab-text-grid">
														<div class="bootstrap-tab-text-grid-left">
															<img src="Public/client/images/<?php echo $row['images']; ?>" alt=" " class="img-fluid">
														</div>
														<div class="bootstrap-tab-text-grid-right">
															<ul>
																<li><a href="#"><?php echo $row['name'] ?></a></li>
																<div class="rating1" >
																	<ul class="stars">
																		<?php while ($rate  <= $row['rate']) { ?>
																		<li><a href="javascript:;"><i  class="fa fa-star active" aria-hidden="true"></i></a></li>
																		<?php $rate++;}  ?>
																	</ul>
																</div>
																<li style="font-size: 12px;"><i><?=$row['date'] ?></i></li>
															</ul>
															<p><?php echo $row['content'] ?></p>
														</div>
														<div class="clearfix"> </div>
													</div>
												<?php } ?>
											</div>
											<?php if($lock==0){ ?>
											<div class="add-review">
												<h4>add a review</h4>
												<div class="rating1">
													<ul class="stars">
														<li><a href="javascript:rate(1);"><i id="star1" class="fa fa-star" aria-hidden="true"></i></a></li>
														<li><a href="javascript:rate(2);"><i id="star2" class="fa fa-star" aria-hidden="true"></i></a></li>
														<li><a href="javascript:rate(3);"><i id="star3" class="fa fa-star" aria-hidden="true"></i></a></li>
														<li><a href="javascript:rate(4);"><i id="star4" class="fa fa-star" aria-hidden="true"></i></a></li>
														<li><a href="javascript:rate(5);"><i id="star5" class="fa fa-star" aria-hidden="true"></i></a></li>
													</ul>
												</div>
												<input type="hidden" id="star" value="0">
												<textarea name="Message" id="noidungbinhluan" required=""></textarea>
												<input type="submit" value="SEND" id="guibinhluan">

											</div>
											<?php } ?>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
					<!--//tabs-->
					
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<!--/slide-->
			<div class="slider-img mid-sec mt-lg-5 mt-2 px-lg-5 px-3">
				<!--//banner-sec-->
				<h3 class="tittle-w3layouts text-left my-lg-4 my-3">Featured Products</h3>
				<div class="mid-slider">
					<div class="owl-carousel owl-theme row">
						<div class="item">
							<div class="gd-box-info text-center">
								<div class="product-men women_two bot-gd">
									<div class="product-googles-info slide-img googles">
										<div class="men-pro-item">
											<div class="men-thumb-item">
												<img src="Public/client/images/s5.jpg" class="img-fluid" alt="">
												<div class="men-cart-pro">
													<div class="inner-men-cart-pro">
														<a href="single.html" class="link-product-add-cart">Quick View</a>
													</div>
												</div>
												<span class="product-new-top">New</span>
											</div>
											<div class="item-info-product">

												<div class="info-product-price">
													<div class="grid_meta">
														<div class="product_price">
															<h4>
																<a href="single.html">Fastrack Aviator </a>
															</h4>
															<div class="grid-price mt-2">
																<span class="money ">$325.00</span>
															</div>
														</div>
														<ul class="stars">
															<li>
																<a href="#">
																	<i class="fa fa-star" aria-hidden="true"></i>
																</a>
															</li>
															<li>
																<a href="#">
																	<i class="fa fa-star" aria-hidden="true"></i>
																</a>
															</li>
															<li>
																<a href="#">
																	<i class="fa fa-star" aria-hidden="true"></i>
																</a>
															</li>
															<li>
																<a href="#">
																	<i class="fa fa-star-half-o" aria-hidden="true"></i>
																</a>
															</li>
															<li>
																<a href="#">
																	<i class="fa fa-star-o" aria-hidden="true"></i>
																</a>
															</li>
														</ul>
													</div>
													<div class="googles single-item hvr-outline-out">
														<form action="#" method="post">
															<input type="hidden" name="cmd" value="_cart">
															<input type="hidden" name="add" value="1">
															<input type="hidden" name="googles_item" value="Fastrack Aviator">
															<input type="hidden" name="amount" value="325.00">
															<button type="submit" class="googles-cart pgoogles-cart">
																<i class="fas fa-cart-plus"></i>
															</button>
														</form>

													</div>
												</div>

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="gd-box-info text-center">
								<div class="product-men women_two bot-gd">
									<div class="product-googles-info slide-img googles">
										<div class="men-pro-item">
											<div class="men-thumb-item">
												<img src="Public/client/images/s6.jpg" class="img-fluid" alt="">
												<div class="men-cart-pro">
													<div class="inner-men-cart-pro">
														<a href="single.html" class="link-product-add-cart">Quick View</a>
													</div>
												</div>
												<span class="product-new-top">New</span>
											</div>
											<div class="item-info-product">

												<div class="info-product-price">
													<div class="grid_meta">
														<div class="product_price">
															<h4>
																<a href="single.html">MARTIN Aviator </a>
															</h4>
															<div class="grid-price mt-2">
																<span class="money ">$425.00</span>
															</div>
														</div>
														<ul class="stars">
															<li>
																<a href="#">
																	<i class="fa fa-star" aria-hidden="true"></i>
																</a>
															</li>
															<li>
																<a href="#">
																	<i class="fa fa-star" aria-hidden="true"></i>
																</a>
															</li>
															<li>
																<a href="#">
																	<i class="fa fa-star" aria-hidden="true"></i>
																</a>
															</li>
															<li>
																<a href="#">
																	<i class="fa fa-star-half-o" aria-hidden="true"></i>
																</a>
															</li>
															<li>
																<a href="#">
																	<i class="fa fa-star-o" aria-hidden="true"></i>
																</a>
															</li>
														</ul>
													</div>
													<div class="googles single-item hvr-outline-out">
														<form action="#" method="post">
															<input type="hidden" name="cmd" value="_cart">
															<input type="hidden" name="add" value="1">
															<input type="hidden" name="googles_item" value="MARTIN Aviator">
															<input type="hidden" name="amount" value="425.00">
															<button type="submit" class="googles-cart pgoogles-cart">
																<i class="fas fa-cart-plus"></i>
															</button>
														</form>

													</div>
												</div>

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="gd-box-info text-center">
								<div class="product-men women_two bot-gd">
									<div class="product-googles-info slide-img googles">
										<div class="men-pro-item">
											<div class="men-thumb-item">
												<img src="Public/client/images/s7.jpg" class="img-fluid" alt="">
												<div class="men-cart-pro">
													<div class="inner-men-cart-pro">
														<a href="single.html" class="link-product-add-cart">Quick View</a>
													</div>
												</div>
												<span class="product-new-top">New</span>
											</div>
											<div class="item-info-product">

												<div class="info-product-price">
													<div class="grid_meta">
														<div class="product_price">
															<h4>
																<a href="single.html">Royal Son Aviator </a>
															</h4>
															<div class="grid-price mt-2">
																<span class="money ">$425.00</span>
															</div>
														</div>
														<ul class="stars">
															<li>
																<a href="#">
																	<i class="fa fa-star" aria-hidden="true"></i>
																</a>
															</li>
															<li>
																<a href="#">
																	<i class="fa fa-star" aria-hidden="true"></i>
																</a>
															</li>
															<li>
																<a href="#">
																	<i class="fa fa-star" aria-hidden="true"></i>
																</a>
															</li>
															<li>
																<a href="#">
																	<i class="fa fa-star-half-o" aria-hidden="true"></i>
																</a>
															</li>
															<li>
																<a href="#">
																	<i class="fa fa-star-o" aria-hidden="true"></i>
																</a>
															</li>
														</ul>
													</div>
													<div class="googles single-item hvr-outline-out">
														<form action="#" method="post">
															<input type="hidden" name="cmd" value="_cart">
															<input type="hidden" name="add" value="1">
															<input type="hidden" name="googles_item" value="Royal Son Aviator">
															<input type="hidden" name="amount" value="425.00">
															<button type="submit" class="googles-cart pgoogles-cart">
																<i class="fas fa-cart-plus"></i>
															</button>
														</form>

													</div>
												</div>

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="gd-box-info text-center">
								<div class="product-men women_two bot-gd">
									<div class="product-googles-info slide-img googles">
										<div class="men-pro-item">
											<div class="men-thumb-item">
												<img src="Public/client/images/s8.jpg" class="img-fluid" alt="">
												<div class="men-cart-pro">
													<div class="inner-men-cart-pro">
														<a href="single.html" class="link-product-add-cart">Quick View</a>
													</div>
												</div>
												<span class="product-new-top">New</span>
											</div>
											<div class="item-info-product">

												<div class="info-product-price">
													<div class="grid_meta">
														<div class="product_price">
															<h4>
																<a href="single.html">Irayz Butterfly </a>
															</h4>
															<div class="grid-price mt-2">
																<span class="money ">$281.00</span>
															</div>
														</div>
														<ul class="stars">
															<li>
																<a href="#">
																	<i class="fa fa-star" aria-hidden="true"></i>
																</a>
															</li>
															<li>
																<a href="#">
																	<i class="fa fa-star" aria-hidden="true"></i>
																</a>
															</li>
															<li>
																<a href="#">
																	<i class="fa fa-star" aria-hidden="true"></i>
																</a>
															</li>
															<li>
																<a href="#">
																	<i class="fa fa-star-half-o" aria-hidden="true"></i>
																</a>
															</li>
															<li>
																<a href="#">
																	<i class="fa fa-star-o" aria-hidden="true"></i>
																</a>
															</li>
														</ul>
													</div>
													<div class="googles single-item hvr-outline-out">
														<form action="#" method="post">
															<input type="hidden" name="cmd" value="_cart">
															<input type="hidden" name="add" value="1">
															<input type="hidden" name="googles_item" value="Irayz Butterfly">
															<input type="hidden" name="amount" value="281.00">
															<button type="submit" class="googles-cart pgoogles-cart">
																<i class="fas fa-cart-plus"></i>
															</button>
														</form>

													</div>
												</div>

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="gd-box-info text-center">
								<div class="product-men women_two bot-gd">
									<div class="product-googles-info slide-img googles">
										<div class="men-pro-item">
											<div class="men-thumb-item">
												<img src="Public/client/images/s9.jpg" class="img-fluid" alt="">
												<div class="men-cart-pro">
													<div class="inner-men-cart-pro">
														<a href="single.html" class="link-product-add-cart">Quick View</a>
													</div>
												</div>
												<span class="product-new-top">New</span>
											</div>
											<div class="item-info-product">

												<div class="info-product-price">
													<div class="grid_meta">
														<div class="product_price">
															<h4>
																<a href="single.html">Jerry Rectangular </a>
															</h4>
															<div class="grid-price mt-2">
																<span class="money ">$525.00</span>
															</div>
														</div>
														<ul class="stars">
															<li>
																<a href="#">
																	<i class="fa fa-star" aria-hidden="true"></i>
																</a>
															</li>
															<li>
																<a href="#">
																	<i class="fa fa-star" aria-hidden="true"></i>
																</a>
															</li>
															<li>
																<a href="#">
																	<i class="fa fa-star" aria-hidden="true"></i>
																</a>
															</li>
															<li>
																<a href="#">
																	<i class="fa fa-star-half-o" aria-hidden="true"></i>
																</a>
															</li>
															<li>
																<a href="#">
																	<i class="fa fa-star-o" aria-hidden="true"></i>
																</a>
															</li>
														</ul>
													</div>
													<div class="googles single-item hvr-outline-out">
														<form action="#" method="post">
															<input type="hidden" name="cmd" value="_cart">
															<input type="hidden" name="add" value="1">
															<input type="hidden" name="googles_item" value="Jerry Rectangular ">
															<input type="hidden" name="amount" value="525.00">
															<button type="submit" class="googles-cart pgoogles-cart">
																<i class="fas fa-cart-plus"></i>
															</button>
														</form>

													</div>
												</div>

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="gd-box-info text-center">
								<div class="product-men women_two bot-gd">
									<div class="product-googles-info slide-img googles">
										<div class="men-pro-item">
											<div class="men-thumb-item">
												<img src="Public/client/images/s10.jpg" class="img-fluid" alt="">
												<div class="men-cart-pro">
													<div class="inner-men-cart-pro">
														<a href="single.html" class="link-product-add-cart">Quick View</a>
													</div>
												</div>
												<span class="product-new-top">New</span>
											</div>
											<div class="item-info-product">

												<div class="info-product-price">
													<div class="grid_meta">
														<div class="product_price">
															<h4>
																<a href="single.html">Herdy Wayfarer </a>
															</h4>
															<div class="grid-price mt-2">
																<span class="money ">$325.00</span>
															</div>
														</div>
														<ul class="stars">
															<li>
																<a href="#">
																	<i class="fa fa-star" aria-hidden="true"></i>
																</a>
															</li>
															<li>
																<a href="#">
																	<i class="fa fa-star" aria-hidden="true"></i>
																</a>
															</li>
															<li>
																<a href="#">
																	<i class="fa fa-star" aria-hidden="true"></i>
																</a>
															</li>
															<li>
																<a href="#">
																	<i class="fa fa-star-half-o" aria-hidden="true"></i>
																</a>
															</li>
															<li>
																<a href="#">
																	<i class="fa fa-star-o" aria-hidden="true"></i>
																</a>
															</li>
														</ul>
													</div>
													<div class="googles single-item hvr-outline-out">
														<form action="#" method="post">
															<input type="hidden" name="cmd" value="_cart">
															<input type="hidden" name="add" value="1">
															<input type="hidden" name="googles_item" value="Royal Son Aviator">
															<input type="hidden" name="amount" value="425.00">
															<button type="submit" class="googles-cart pgoogles-cart">
																<i class="fas fa-cart-plus"></i>
															</button>
														</form>

													</div>
												</div>

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--//slider-->
		</div>
	</section>

	<!--jQuery-->
	<script src="Public/client/js/jquery-2.2.3.min.js"></script>
	<!-- newsletter modal -->
	<!--search jQuery-->
	<script src="Public/client/js/modernizr-2.6.2.min.js"></script>
	<script src="Public/client/js/classie-search.js"></script>
	<script src="Public/client/js/demo1-search.js"></script>
	<!--//search jQuery-->
	<!-- cart-js -->
	<script src="Public/client/js/minicart.js"></script>
	<script>
		googles.render();

		googles.cart.on('googles_checkout', function (evt) {
			var items, len, i;

			if (this.subtotal() > 0) {
				items = this.items();

				for (i = 0, len = items.length; i < len; i++) {}
			}
	});
</script>
<!-- //cart-js -->
<script>
	$(document).ready(function () {
		$(".button-log a").click(function () {
			$(".overlay-login").fadeToggle(200);
			$(this).toggleClass('btn-open').toggleClass('btn-close');
		});
	});
	$('.overlay-close1').on('click', function () {
		$(".overlay-login").fadeToggle(200);
		$(".button-log a").toggleClass('btn-open').toggleClass('btn-close');
		open = false;
	});
</script>
<!-- carousel -->
<!-- price range (top products) -->
<script src="Public/client/js/jquery-ui.js"></script>
<!-- //price range (top products) -->

<script src="Public/client/js/owl.carousel.js"></script>
<script>
	$(document).ready(function () {
		$('.owl-carousel').owlCarousel({
			loop: true,
			margin: 10,
			responsiveClass: true,
			responsive: {
				0: {
					items: 1,
					nav: true
				},
				600: {
					items: 2,
					nav: false
				},
				900: {
					items: 3,
					nav: false
				},
				1000: {
					items: 4,
					nav: true,
					loop: false,
					margin: 20
				}
			}
		})
	})
</script>

<!-- //end-smooth-scrolling -->

<!-- single -->
<script src="Public/client/js/imagezoom.js"></script>
<!-- single -->
<!-- script for responsive tabs -->
<script src="Public/client/js/easy-responsive-tabs.js"></script>

<script>
	$(document).ready(function () {
		$('#horizontalTab').easyResponsiveTabs({
					type: 'default', //Types: default, vertical, accordion           
					width: 'auto', //auto or any width like 600px
					fit: true, // 100% fit in a container
					closed: 'accordion', // Start closed if in accordion view
					activate: function (event) { // Callback function if tab is switched
						var $tab = $(this);
						var $info = $('#tabInfo');
						var $name = $('span', $info);
						$name.text($tab.text());
						$info.show();
					}
				});
		$('#verticalTab').easyResponsiveTabs({
			type: 'vertical',
			width: 'auto',
			fit: true
		});
	});
</script>
<!-- FlexSlider -->
<script src="Public/client/js/jquery.flexslider.js"></script>
<script>
			// Can also be used with $(document).ready()
	$(window).load(function () {
				$('.flexslider1').flexslider({
					animation: "slide",
					controlNav: "thumbnails"
				});
			});
		</script>
		<!-- //FlexSlider-->

		<!-- dropdown nav -->
		<script>
			$(document).ready(function () {
				$(".dropdown").hover(
					function () {
						$('.dropdown-menu', this).stop(true, true).slideDown("fast");
						$(this).toggleClass('open');
					},
					function () {
						$('.dropdown-menu', this).stop(true, true).slideUp("fast");
						$(this).toggleClass('open');
					}
					);
			});
		</script>
		<!-- //dropdown nav -->
		<script src="Public/client/js/move-top.js"></script>
		<script src="Public/client/js/easing.js"></script>
		<script>
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event) {
					event.preventDefault();
					$('html,body').animate({
						scrollTop: $(this.hash).offset().top
					}, 900);
				});
			});
		</script>
		<script>
			$(document).ready(function() {
            /*
            						var defaults = {
            							  containerID: 'toTop', // fading element id
            							containerHoverID: 'toTopHover', // fading element hover id
            							scrollSpeed: 1200,
            							easingType: 'linear' 
            						 };
            						 */

            						 $().UItoTop({
            						 	easingType: 'easeOutQuart'
            						 });

            						});
            					</script>
            					<!--// end-smoth-scrolling -->


            					<script src="Public/client/js/bootstrap.js"></script>
            					<!-- js file -->
</body>

</html>