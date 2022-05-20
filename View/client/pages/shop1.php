
<div class="row">
	<div class="col-md-6 shop_left">
		<img src="Public/client/images/banner3.jpg" alt="">
		<h6>40% off</h6>
	</div>
	<div class="col-md-6 shop_right">
		<img src="Public/client/images/banner4.jpg" alt="">
		<h6>50% off</h6>
	</div>
</div>

<form action="?controller=product" method="POST">
	<input type="text" name="limit" class="margin-bot" placeholder="số sản phẩm mỗi trang">
	<button type="submit">ok</button>
</form>
<div class="row" >
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
	foreach ($products[$current_page] as $row) {
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
<nav aria-label="Page navigation example">
	<ul class="pagination justify-content-center">
		<?php
		$tail = '';
		if($id != '' && $id != 0) {
			$tail = '&id='.$id;
		}
		if ($current_page > 1 && $page > 1) {
			echo '<li class="page-item"><a class="page-link" href="?controller=product&page='.($current_page-1).$tail.'" tabindex="-1" aria-disabled="true"><</a>
			</li>	';
		}


		for ($i=1; $i <= $page; $i++) { 
			if ($current_page == $i) 
				echo '<li class="page-item active"><a class="page-link" href="?controller=product&page='.$i.$tail.'">'.$i.'</a></li>';
			else
				echo '<li class="page-item"><a class="page-link" href="?controller=product&page='.$i.$tail.'">'.$i.'</a></li>';

		}
		if($current_page < $page && $page > 1)	
			echo 	'<li class="page-item">
		<a class="page-link" href="?controller=product&page='.($current_page+1).$tail.'">></a>
		</li>	';
		?>	    
	</ul>
</nav>

