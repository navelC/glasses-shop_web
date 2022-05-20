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
						<li>Favourite Product</li>
					</ul>
				</div>
			</div>

		</div>
		<!--//banner -->
    </div>
<div class="container">

<div class="row" style="margin-top: 50px; margin-bottom: 50px">
	<!-- /womens -->
	<?php $name = 'name';
	$stt=0;
	// $class = 'product-favourite';
	// foreach ($dataFavourite as $i){
	// 	if($item->id == $i->product_id){
	// 		$class.='-active' ;
	// 		break;
	// 	} 
	// }
	foreach ($product as $row) {
		?>

		<div class="col-md-3 product-men women_two shop-gd">
			<div class="product-googles-info googles">
				<div class="men-pro-item">
					<div class="men-thumb-item">
						<img src="Public/client/images/<?php echo $row['images'] ?>" class="img-fluid" alt="'.$row[$name].'">
						<div class="men-cart-pro">
							<div class="inner-men-cart-pro">
								<a href="?controller=detail&id=<?php echo $row['id'] ?>" class="link-product-add-cart">Quick View</a>
							</div>
						</div>
						<span class="product-new-top">New</span>
					</div>
					<div class="item-info-product">
						<div class="info-product-price">
							<div class="grid_meta">
								<div class="product_price">
									<h4>
										<a href="?controller=detail&id=<?php echo $row['name'] ?>"><?php echo $row['name'] ?></a>
									</h4>
									<div class="grid-price mt-2">
										<span class="money ">$<?php echo $row['price'] ?></span>
									</div>
								</div>
								<ul class="stars">
									<?php $star=1; while ($star <= $row['rate']) { ?>
									<li><a href="?controller=detail&id=<?=$row['id']?>"><i class="fa fa-star active" aria-hidden="true"></i></a></li>
									<?php $star++;} ?>
									<?php  while ($star <= 5) { ?>
									<li><a href="?controller=detail&id=<?=$row['id']?>"><i class="fa fa-star" aria-hidden="true"></i></a></li>
									<?php $star++;} ?>
								</ul>
							</div>
							<div class="googles single-item hvr-outline-out">
								<a href="javascript:addcart(<?php echo $row['id']; ?>);">
									<button type="submit" class="googles-cart pgoogles-cart">
										<i class="fas fa-cart-plus"></i>
									</button>
								</a>
								<?php if (isset($_SESSION['user'])): ?>
								<div id="product-favourite" class="<?php if(!is_null($row['favourite'])) echo 'product-favourite-active' ?>" data-id="<?=$stt?>">
                                    <a href="javascript:favourite(<?=$stt?>,<?=$row['id']?>);" ><i class="fas fa-heart"></i></a>
                                </div>
                            <?php endif ?>

							</div>
							
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
	<?php $stt++;}
	?>		
	<!--//product right-->
</div>

</div>



