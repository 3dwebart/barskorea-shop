<?php
include_once('./_common.php');

if (G5_IS_MOBILE) {
	include_once(G5_THEME_MSHOP_PATH.'/index.php');
	return;
}

define("_INDEX_", TRUE);

include_once(G5_THEME_SHOP_PATH.'/shop.head.php');
?>

<!-- 메인이미지 시작 { -->
<?php echo display_banner('메인', 'mainbanner.10.skin.php'); ?>
<!-- } 메인이미지 끝 -->
<!-- BIGIN :: Banner Area -->
<div class="banner-area mb-60">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<!--Anadi Single banner Start-->
				<div class="anadi-single-banner mb-30">
					<div class="banner-img">
						<a href="#"><img src="<?php echo G5_ASSETS_URL ?>/img/banner/banner1.jpg" alt="banner1"></a>
					</div>
				</div>
				<!--Anadi Single banner End-->
			</div>
			<div class="col-md-4">
				<!--Anadi Single banner Start-->
				<div class="anadi-single-banner mb-30">
					<div class="banner-img">
						<a href="#"><img src="<?php echo G5_ASSETS_URL ?>/img/banner/banner2.jpg" alt="banner2"></a>
					</div>
				</div>
				<!--Anadi Single banner End-->
			</div>
		</div>
	</div>
</div>
<!-- END :: Banner Area -->
<!--Featured Products Area Start-->
<?php
$sql = "SELECT main_tabs, main_tabs_id, main_tabs_item_count FROM {$g5['g5_shop_default_table']}";
$row = sql_fetch($sql);
$main_tabs_arr = explode(',', $row['main_tabs']);
$main_tabs_id_arr = explode(',', $row['main_tabs_id']);

$main_tabs_item_count = $row['main_tabs_item_count'];
$main_tabs_name_arr = array();
$sql = "SELECT ca_id, ca_name FROM {$g5['g5_shop_category_table']}";
$res = sql_query($sql);
while ($row = sql_fetch_array($res)) {
	for($i = 0; $i < count($main_tabs_arr); $i++) {
		if($row['ca_id'] == $main_tabs_arr[$i]) {
			$main_tabs_name_arr[] = $row['ca_name'];
		}
	}
}
?>

<div class="featured-products mb-85">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<!--Section Title Start-->
				<div class="section-title text-center">
					<span>Made The Hard Way</span>
					<h3>Featured Products</h3>
				</div>
				<!--Section Title End-->
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<!--Featured Tab Menu Start-->
				<div class="featured-product-menu">
					<ul class="nav justify-content-center mb-45">
						<?php
							for ($i=0; $i < count($main_tabs_arr); $i++) {
						?>
						<li><a data-toggle="tab" <?php if($i == 0) { echo ' class="active"'; } ?> href="#<?php echo $main_tabs_id_arr[$i]; ?>"><?php echo $main_tabs_name_arr[$i]; ?></a></li>
						<?php
							}
						?>
					</ul>
				</div>
				<!--Featured Tab Menu End-->
			</div>
			<div class="col-12">
				<!-- BIGIN :: Featured Tab Content -->
				<div class="tab-content">
					<?php
						for ($i=0; $i < count($main_tabs_arr); $i++) {
							$sql = "SELECT * FROM {$g5['g5_shop_item_table']} WHERE ca_id = '$main_tabs_arr[$i]'";
							$res = sql_query($sql);
					?>
					<div class="tab-pane fade <?php if($i == 0) echo ' show active'; ?>" id="<?php echo $main_tabs_id_arr[$i]; ?>">
						<h1><?php echo $main_tabs_arr[$i]; ?></h1>
						<!--Product Start-->
						<div class="all-sinlgle-product">
							 <div class="product-slider-wrap">
								 <div class="row product-slider owl-carousel">
								 	<?php
										while ($row = sql_fetch_array($res)) {
									?>

									<div class="col-md-12">
										<!--Single Product Start-->
										<div class="single-product">
											<div class="product-img">
												<a href="single-product.html">
													<img src="<?php echo G5_DATA_URL.'/item/'.$row['it_img1']; ?>" alt="" />
												</a>
												<span class="onsale">
													<span>Sale!</span>
												</span>
												<div class="product-action">
													<ul>
														<li><a href="#" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a></li>
														<li><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
														<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
													</ul>
													<div class="quickviewbtn">
														<a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i>Quick View</a>
													</div>
												</div>
											</div>
											<div class="product-content">
												<h4><a href="single-product.html"><?php echo $row['it_name']; ?></a></h4>
												<div class="product-reviews">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
											</div>
											<div class="product-price">
												<span class="price">$66.00</span>
												<span class="regular-price">$77.00</span>
											</div>
										</div>
										<!--Single Product End-->
									</div>
									<?php
										}
									?>
									<? /*
									<div class="col-md-12">
										<!--Single Product Start-->
										<div class="single-product">
											<div class="product-img">
												<a href="single-product.html">
													<img src="<?php echo G5_ASSETS_URL; ?>/img/product/product1.jpg" alt="">
												</a>
												<span class="onsale">
													<span>Sale!</span>
												</span>
												<div class="product-action">
													<ul>
														<li><a href="#" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a></li>
														<li><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
														<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
													</ul>
													<div class="quickviewbtn">
														<a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i>Quick View</a>
													</div>
												</div>
											</div>
											<div class="product-content">
												<h4><a href="single-product.html">Sit voluptatem</a></h4>
												<div class="product-reviews">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
											</div>
											<div class="product-price">
												<span class="price">$66.00</span>
												<span class="regular-price">$77.00</span>
											</div>
										</div>
										<!--Single Product End-->
									</div>
									<div class="col-md-12">
										<!--Single Product Start-->
										<div class="single-product">
											<div class="product-img">
												<a href="single-product.html">
													<img src="<?php echo G5_ASSETS_URL; ?>/img/product/product2.jpg" alt="">
												</a>
												<span class="onsale">
													<span>Sale!</span>
												</span>
												<div class="product-action">
													<ul>
														<li><a href="#" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a></li>
														<li><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
														<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
													</ul>
													<div class="quickviewbtn">
														<a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i>Quick View</a>
													</div>
												</div>
											</div>
											<div class="product-content">
												<h4><a href="single-product.html">Porro quisquam</a></h4>
												<div class="product-reviews">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
											</div>
											<div class="product-price">
												<span class="price">$60.00</span>
												<span class="regular-price">$68.00</span>
											</div>
										</div>
										<!--Single Product End-->
									</div>
									<div class="col-md-12">
										<!--Single Product Start-->
										<div class="single-product">
											<div class="product-img">
												<a href="single-product.html">
													<img src="<?php echo G5_ASSETS_URL; ?>/img/product/product3.jpg" alt="">
												</a>
												<span class="onsale">
													<span>Sale!</span>
												</span>
												<div class="product-action">
													<ul>
														<li><a href="#" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a></li>
														<li><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
														<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
													</ul>
													<div class="quickviewbtn">
														<a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i>Quick View</a>
													</div>
												</div>
											</div>
											<div class="product-content">
												<h4><a href="single-product.html">Officiis debitis</a></h4>
												<div class="product-reviews">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
											</div>
											<div class="product-price">
												<span class="price">$85.00</span>
												<span class="regular-price">$90.00</span>
											</div>
										</div>
										<!--Single Product End-->
									</div>
									<div class="col-md-12">
										<!--Single Product Start-->
										<div class="single-product">
											<div class="product-img">
												<a href="single-product.html">
													<img src="<?php echo G5_ASSETS_URL; ?>/img/product/product4.jpg" alt="">
												</a>
												<span class="onsale">
													<span>Sale!</span>
												</span>
												<div class="product-action">
													<ul>
														<li><a href="#" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a></li>
														<li><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
														<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
													</ul>
													<div class="quickviewbtn">
														<a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i>Quick View</a>
													</div>
												</div>
											</div>
											<div class="product-content">
												<h4><a href="single-product.html">Nullam maximus</a></h4>
												<div class="product-reviews">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
											</div>
											<div class="product-price">
												<span class="price">$64.00</span>
												<span class="regular-price">$78.00</span>
											</div>
										</div>
										<!--Single Product End-->
									</div>
									<div class="col-md-12">
										<!--Single Product Start-->
										<div class="single-product">
											<div class="product-img">
												<a href="single-product.html">
													<img src="<?php echo G5_ASSETS_URL; ?>/img/product/product5.jpg" alt="">
												</a>
												<span class="onsale">
													<span>Sale!</span>
												</span>
												<div class="product-action">
													<ul>
														<li><a href="#" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a></li>
														<li><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
														<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
													</ul>
													<div class="quickviewbtn">
														<a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i>Quick View</a>
													</div>
												</div>
											</div>
											<div class="product-content">
												<h4><a href="single-product.html">Nostrum exercitationem</a></h4>
												<div class="product-reviews">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
											</div>
											<div class="product-price">
												<span class="price">$79.00</span>
												<span class="regular-price">$86.00</span>
											</div>
										</div>
										<!--Single Product End-->
									</div>
									<div class="col-md-12">
										<!--Single Product Start-->
										<div class="single-product">
											<div class="product-img">
												<a href="single-product.html">
													<img src="<?php echo G5_ASSETS_URL; ?>/img/product/product6.jpg" alt="">
												</a>
												<span class="onsale">
													<span>Sale!</span>
												</span>
												<div class="product-action">
													<ul>
														<li><a href="#" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a></li>
														<li><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
														<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
													</ul>
													<div class="quickviewbtn">
														<a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i>Quick View</a>
													</div>
												</div>
											</div>
											<div class="product-content">
												<h4><a href="single-product.html">Nemo enim</a></h4>
												<div class="product-reviews">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
											</div>
											<div class="product-price">
												<span class="price">$65.00</span>
												<span class="regular-price">$68.00</span>
											</div>
										</div>
										<!--Single Product End-->
									</div>
									<div class="col-md-12">
										<!--Single Product Start-->
										<div class="single-product">
											<div class="product-img">
												<a href="single-product.html">
													<img src="<?php echo G5_ASSETS_URL; ?>/img/product/product7.jpg" alt="">
												</a>
												<span class="onsale">
													<span>Sale!</span>
												</span>
												<div class="product-action">
													<ul>
														<li><a href="#" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a></li>
														<li><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
														<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
													</ul>
													<div class="quickviewbtn">
														<a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i>Quick View</a>
													</div>
												</div>
											</div>
											<div class="product-content">
												<h4><a href="single-product.html">Natus erro</a></h4>
												<div class="product-reviews">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
											</div>
											<div class="product-price">
												<span class="price">$81.00</span>
												<span class="regular-price">$85.00</span>
											</div>
										</div>
										<!--Single Product End-->
									</div>
									<div class="col-md-12">
										<!--Single Product Start-->
										<div class="single-product">
											<div class="product-img">
												<a href="single-product.html">
													<img src="<?php echo G5_ASSETS_URL; ?>/img/product/product8.jpg" alt="">
												</a>
												<span class="onsale">
													<span>Sale!</span>
												</span>
												<div class="product-action">
													<ul>
														<li><a href="#" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a></li>
														<li><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
														<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
													</ul>
													<div class="quickviewbtn">
														<a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i>Quick View</a>
													</div>
												</div>
											</div>
											<div class="product-content">
												<h4><a href="single-product.html">Laudantium</a></h4>
												<div class="product-reviews">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
											</div>
											<div class="product-price">
												<span class="price">$79.00</span>
												<span class="regular-price">$86.00</span>
											</div>
										</div>
										<!--Single Product End-->
									</div>
									<div class="col-md-12">
										<!--Single Product Start-->
										<div class="single-product">
											<div class="product-img">
												<a href="single-product.html">
													<img src="<?php echo G5_ASSETS_URL; ?>/img/product/product9.jpg" alt="">
												</a>
												<span class="onsale">
													<span>Sale!</span>
												</span>
												<div class="product-action">
													<ul>
														<li><a href="#" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a></li>
														<li><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
														<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
													</ul>
													<div class="quickviewbtn">
														<a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i>Quick View</a>
													</div>
												</div>
											</div>
											<div class="product-content">
												<h4><a href="single-product.html">Itaque earum</a></h4>
												<div class="product-reviews">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
											</div>
											<div class="product-price">
												<span class="price">$72.00</span>
												<span class="regular-price">$76.00</span>
											</div>
										</div>
										<!--Single Product End-->
									</div>
									<div class="col-md-12">
										<!--Single Product Start-->
										<div class="single-product">
											<div class="product-img">
												<a href="single-product.html">
													<img src="<?php echo G5_ASSETS_URL; ?>/img/product/product10.jpg" alt="">
												</a>
												<span class="onsale">
													<span>Sale!</span>
												</span>
												<div class="product-action">
													<ul>
														<li><a href="#" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a></li>
														<li><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
														<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
													</ul>
													<div class="quickviewbtn">
														<a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i>Quick View</a>
													</div>
												</div>
											</div>
											<div class="product-content">
												<h4><a href="single-product.html">Nullam maximus</a></h4>
												<div class="product-reviews">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
											</div>
											<div class="product-price">
												<span class="price">$62.00</span>
												<span class="regular-price">$78.00</span>
											</div>
										</div>
										<!--Single Product End-->
									</div>
									*/ ?>
								  </div>
							 </div>
						</div>
						<!--Product End-->
					</div>
					<?php
						}
					?>
					<? /*
					<div class="tab-pane fade show active" id="bag">
						<!--Product Start-->
						<div class="all-sinlgle-product">
							 <div class="product-slider-wrap">
								 <div class="row product-slider owl-carousel">
									<div class="col-md-12">
										<!--Single Product Start-->
										<div class="single-product">
											<div class="product-img">
												<a href="single-product.html">
													<img src="<?php echo G5_ASSETS_URL; ?>/img/product/product1.jpg" alt="">
												</a>
												<span class="onsale">
													<span>Sale!</span>
												</span>
												<div class="product-action">
													<ul>
														<li><a href="#" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a></li>
														<li><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
														<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
													</ul>
													<div class="quickviewbtn">
														<a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i>Quick View</a>
													</div>
												</div>
											</div>
											<div class="product-content">
												<h4><a href="single-product.html">Sit voluptatem</a></h4>
												<div class="product-reviews">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
											</div>
											<div class="product-price">
												<span class="price">$66.00</span>
												<span class="regular-price">$77.00</span>
											</div>
										</div>
										<!--Single Product End-->
									</div>
									<div class="col-md-12">
										<!--Single Product Start-->
										<div class="single-product">
											<div class="product-img">
												<a href="single-product.html">
													<img src="<?php echo G5_ASSETS_URL; ?>/img/product/product2.jpg" alt="">
												</a>
												<span class="onsale">
													<span>Sale!</span>
												</span>
												<div class="product-action">
													<ul>
														<li><a href="#" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a></li>
														<li><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
														<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
													</ul>
													<div class="quickviewbtn">
														<a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i>Quick View</a>
													</div>
												</div>
											</div>
											<div class="product-content">
												<h4><a href="single-product.html">Porro quisquam</a></h4>
												<div class="product-reviews">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
											</div>
											<div class="product-price">
												<span class="price">$60.00</span>
												<span class="regular-price">$68.00</span>
											</div>
										</div>
										<!--Single Product End-->
									</div>
									<div class="col-md-12">
										<!--Single Product Start-->
										<div class="single-product">
											<div class="product-img">
												<a href="single-product.html">
													<img src="<?php echo G5_ASSETS_URL; ?>/img/product/product3.jpg" alt="">
												</a>
												<span class="onsale">
													<span>Sale!</span>
												</span>
												<div class="product-action">
													<ul>
														<li><a href="#" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a></li>
														<li><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
														<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
													</ul>
													<div class="quickviewbtn">
														<a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i>Quick View</a>
													</div>
												</div>
											</div>
											<div class="product-content">
												<h4><a href="single-product.html">Officiis debitis</a></h4>
												<div class="product-reviews">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
											</div>
											<div class="product-price">
												<span class="price">$85.00</span>
												<span class="regular-price">$90.00</span>
											</div>
										</div>
										<!--Single Product End-->
									</div>
									<div class="col-md-12">
										<!--Single Product Start-->
										<div class="single-product">
											<div class="product-img">
												<a href="single-product.html">
													<img src="<?php echo G5_ASSETS_URL; ?>/img/product/product4.jpg" alt="">
												</a>
												<span class="onsale">
													<span>Sale!</span>
												</span>
												<div class="product-action">
													<ul>
														<li><a href="#" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a></li>
														<li><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
														<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
													</ul>
													<div class="quickviewbtn">
														<a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i>Quick View</a>
													</div>
												</div>
											</div>
											<div class="product-content">
												<h4><a href="single-product.html">Nullam maximus</a></h4>
												<div class="product-reviews">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
											</div>
											<div class="product-price">
												<span class="price">$64.00</span>
												<span class="regular-price">$78.00</span>
											</div>
										</div>
										<!--Single Product End-->
									</div>
									<div class="col-md-12">
										<!--Single Product Start-->
										<div class="single-product">
											<div class="product-img">
												<a href="single-product.html">
													<img src="<?php echo G5_ASSETS_URL; ?>/img/product/product5.jpg" alt="">
												</a>
												<span class="onsale">
													<span>Sale!</span>
												</span>
												<div class="product-action">
													<ul>
														<li><a href="#" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a></li>
														<li><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
														<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
													</ul>
													<div class="quickviewbtn">
														<a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i>Quick View</a>
													</div>
												</div>
											</div>
											<div class="product-content">
												<h4><a href="single-product.html">Nostrum exercitationem</a></h4>
												<div class="product-reviews">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
											</div>
											<div class="product-price">
												<span class="price">$79.00</span>
												<span class="regular-price">$86.00</span>
											</div>
										</div>
										<!--Single Product End-->
									</div>
									<div class="col-md-12">
										<!--Single Product Start-->
										<div class="single-product">
											<div class="product-img">
												<a href="single-product.html">
													<img src="<?php echo G5_ASSETS_URL; ?>/img/product/product6.jpg" alt="">
												</a>
												<span class="onsale">
													<span>Sale!</span>
												</span>
												<div class="product-action">
													<ul>
														<li><a href="#" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a></li>
														<li><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
														<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
													</ul>
													<div class="quickviewbtn">
														<a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i>Quick View</a>
													</div>
												</div>
											</div>
											<div class="product-content">
												<h4><a href="single-product.html">Nemo enim</a></h4>
												<div class="product-reviews">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
											</div>
											<div class="product-price">
												<span class="price">$65.00</span>
												<span class="regular-price">$68.00</span>
											</div>
										</div>
										<!--Single Product End-->
									</div>
									<div class="col-md-12">
										<!--Single Product Start-->
										<div class="single-product">
											<div class="product-img">
												<a href="single-product.html">
													<img src="<?php echo G5_ASSETS_URL; ?>/img/product/product7.jpg" alt="">
												</a>
												<span class="onsale">
													<span>Sale!</span>
												</span>
												<div class="product-action">
													<ul>
														<li><a href="#" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a></li>
														<li><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
														<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
													</ul>
													<div class="quickviewbtn">
														<a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i>Quick View</a>
													</div>
												</div>
											</div>
											<div class="product-content">
												<h4><a href="single-product.html">Natus erro</a></h4>
												<div class="product-reviews">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
											</div>
											<div class="product-price">
												<span class="price">$81.00</span>
												<span class="regular-price">$85.00</span>
											</div>
										</div>
										<!--Single Product End-->
									</div>
									<div class="col-md-12">
										<!--Single Product Start-->
										<div class="single-product">
											<div class="product-img">
												<a href="single-product.html">
													<img src="<?php echo G5_ASSETS_URL; ?>/img/product/product8.jpg" alt="">
												</a>
												<span class="onsale">
													<span>Sale!</span>
												</span>
												<div class="product-action">
													<ul>
														<li><a href="#" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a></li>
														<li><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
														<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
													</ul>
													<div class="quickviewbtn">
														<a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i>Quick View</a>
													</div>
												</div>
											</div>
											<div class="product-content">
												<h4><a href="single-product.html">Laudantium</a></h4>
												<div class="product-reviews">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
											</div>
											<div class="product-price">
												<span class="price">$79.00</span>
												<span class="regular-price">$86.00</span>
											</div>
										</div>
										<!--Single Product End-->
									</div>
									<div class="col-md-12">
										<!--Single Product Start-->
										<div class="single-product">
											<div class="product-img">
												<a href="single-product.html">
													<img src="<?php echo G5_ASSETS_URL; ?>/img/product/product9.jpg" alt="">
												</a>
												<span class="onsale">
													<span>Sale!</span>
												</span>
												<div class="product-action">
													<ul>
														<li><a href="#" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a></li>
														<li><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
														<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
													</ul>
													<div class="quickviewbtn">
														<a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i>Quick View</a>
													</div>
												</div>
											</div>
											<div class="product-content">
												<h4><a href="single-product.html">Itaque earum</a></h4>
												<div class="product-reviews">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
											</div>
											<div class="product-price">
												<span class="price">$72.00</span>
												<span class="regular-price">$76.00</span>
											</div>
										</div>
										<!--Single Product End-->
									</div>
									<div class="col-md-12">
										<!--Single Product Start-->
										<div class="single-product">
											<div class="product-img">
												<a href="single-product.html">
													<img src="<?php echo G5_ASSETS_URL; ?>/img/product/product10.jpg" alt="">
												</a>
												<span class="onsale">
													<span>Sale!</span>
												</span>
												<div class="product-action">
													<ul>
														<li><a href="#" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a></li>
														<li><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
														<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
													</ul>
													<div class="quickviewbtn">
														<a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i>Quick View</a>
													</div>
												</div>
											</div>
											<div class="product-content">
												<h4><a href="single-product.html">Nullam maximus</a></h4>
												<div class="product-reviews">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
											</div>
											<div class="product-price">
												<span class="price">$62.00</span>
												<span class="regular-price">$78.00</span>
											</div>
										</div>
										<!--Single Product End-->
									</div>
								  </div>
							 </div>
						</div>
						<!--Product End-->
					</div>
					<div class="tab-pane fade" id="decoration">
						<!--Product Start-->
						<div class="all-sinlgle-product">
							<div class="product-slider-wrap">
								<div class="row product-slider owl-carousel">
									<div class="col-md-12">
										<!--Single Product Start-->
										<div class="single-product">
											<div class="product-img">
												<a href="single-product.html">
													<img src="<?php echo G5_ASSETS_URL; ?>/img/product/product6.jpg" alt="">
												</a>
												<span class="onsale">
													<span>Sale!</span>
												</span>
												<div class="product-action">
													<ul>
														<li><a href="#" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a></li>
														<li><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
														<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
													</ul>
													<div class="quickviewbtn">
														<a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i>Quick View</a>
													</div>
												</div>
											</div>
											<div class="product-content">
												<h4><a href="single-product.html">Nemo enim</a></h4>
												<div class="product-reviews">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
											</div>
											<div class="product-price">
												<span class="price">$65.00</span>
												<span class="regular-price">$68.00</span>
											</div>
										</div>
										<!--Single Product End-->
									</div>
									<div class="col-md-12">
										<!--Single Product Start-->
										<div class="single-product">
											<div class="product-img">
												<a href="single-product.html">
													<img src="<?php echo G5_ASSETS_URL; ?>/img/product/product7.jpg" alt="">
												</a>
												<span class="onsale">
													<span>Sale!</span>
												</span>
												<div class="product-action">
													<ul>
														<li><a href="#" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a></li>
														<li><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
														<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
													</ul>
													<div class="quickviewbtn">
														<a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i>Quick View</a>
													</div>
												</div>
											</div>
											<div class="product-content">
												<h4><a href="single-product.html">Natus erro</a></h4>
												<div class="product-reviews">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
											</div>
											<div class="product-price">
												<span class="price">$81.00</span>
												<span class="regular-price">$85.00</span>
											</div>
										</div>
										<!--Single Product End-->
									</div>
									<div class="col-md-12">
										<!--Single Product Start-->
										<div class="single-product">
											<div class="product-img">
												<a href="single-product.html">
													<img src="<?php echo G5_ASSETS_URL; ?>/img/product/product8.jpg" alt="">
												</a>
												<span class="onsale">
													<span>Sale!</span>
												</span>
												<div class="product-action">
													<ul>
														<li><a href="#" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a></li>
														<li><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
														<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
													</ul>
													<div class="quickviewbtn">
														<a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i>Quick View</a>
													</div>
												</div>
											</div>
											<div class="product-content">
												<h4><a href="single-product.html">Laudantium</a></h4>
												<div class="product-reviews">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
											</div>
											<div class="product-price">
												<span class="price">$79.00</span>
												<span class="regular-price">$86.00</span>
											</div>
										</div>
										<!--Single Product End-->
									</div>
									<div class="col-md-12">
										<!--Single Product Start-->
										<div class="single-product">
											<div class="product-img">
												<a href="single-product.html">
													<img src="<?php echo G5_ASSETS_URL; ?>/img/product/product9.jpg" alt="">
												</a>
												<span class="onsale">
													<span>Sale!</span>
												</span>
												<div class="product-action">
													<ul>
														<li><a href="#" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a></li>
														<li><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
														<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
													</ul>
													<div class="quickviewbtn">
														<a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i>Quick View</a>
													</div>
												</div>
											</div>
											<div class="product-content">
												<h4><a href="single-product.html">Itaque earum</a></h4>
												<div class="product-reviews">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
											</div>
											<div class="product-price">
												<span class="price">$72.00</span>
												<span class="regular-price">$76.00</span>
											</div>
										</div>
										<!--Single Product End-->
									</div>
									<div class="col-md-12">
										<!--Single Product Start-->
										<div class="single-product">
											<div class="product-img">
												<a href="single-product.html">
													<img src="<?php echo G5_ASSETS_URL; ?>/img/product/product10.jpg" alt="">
												</a>
												<span class="onsale">
													<span>Sale!</span>
												</span>
												<div class="product-action">
													<ul>
														<li><a href="#" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a></li>
														<li><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
														<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
													</ul>
													<div class="quickviewbtn">
														<a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i>Quick View</a>
													</div>
												</div>
											</div>
											<div class="product-content">
												<h4><a href="single-product.html">Nullam maximus</a></h4>
												<div class="product-reviews">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
											</div>
											<div class="product-price">
												<span class="price">$62.00</span>
												<span class="regular-price">$78.00</span>
											</div>
										</div>
										<!--Single Product End-->
									</div>
									<div class="col-md-12">
										<!--Single Product Start-->
										<div class="single-product">
											<div class="product-img">
												<a href="single-product.html">
													<img src="<?php echo G5_ASSETS_URL; ?>/img/product/product1.jpg" alt="">
												</a>
												<span class="onsale">
													<span>Sale!</span>
												</span>
												<div class="product-action">
													<ul>
														<li><a href="#" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a></li>
														<li><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
														<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
													</ul>
													<div class="quickviewbtn">
														<a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i>Quick View</a>
													</div>
												</div>
											</div>
											<div class="product-content">
												<h4><a href="single-product.html">Sit voluptatem</a></h4>
												<div class="product-reviews">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
											</div>
											<div class="product-price">
												<span class="price">$66.00</span>
												<span class="regular-price">$77.00</span>
											</div>
										</div>
										<!--Single Product End-->
									</div>
									<div class="col-md-12">
										<!--Single Product Start-->
										<div class="single-product">
											<div class="product-img">
												<a href="single-product.html">
													<img src="<?php echo G5_ASSETS_URL; ?>/img/product/product2.jpg" alt="">
												</a>
												<span class="onsale">
													<span>Sale!</span>
												</span>
												<div class="product-action">
													<ul>
														<li><a href="#" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a></li>
														<li><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
														<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
													</ul>
													<div class="quickviewbtn">
														<a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i>Quick View</a>
													</div>
												</div>
											</div>
											<div class="product-content">
												<h4><a href="single-product.html">Porro quisquam</a></h4>
												<div class="product-reviews">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
											</div>
											<div class="product-price">
												<span class="price">$60.00</span>
												<span class="regular-price">$68.00</span>
											</div>
										</div>
										<!--Single Product End-->
									</div>
									<div class="col-md-12">
										<!--Single Product Start-->
										<div class="single-product">
											<div class="product-img">
												<a href="single-product.html">
													<img src="<?php echo G5_ASSETS_URL; ?>/img/product/product3.jpg" alt="">
												</a>
												<span class="onsale">
													<span>Sale!</span>
												</span>
												<div class="product-action">
													<ul>
														<li><a href="#" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a></li>
														<li><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
														<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
													</ul>
													<div class="quickviewbtn">
														<a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i>Quick View</a>
													</div>
												</div>
											</div>
											<div class="product-content">
												<h4><a href="single-product.html">Officiis debitis</a></h4>
												<div class="product-reviews">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
											</div>
											<div class="product-price">
												<span class="price">$85.00</span>
												<span class="regular-price">$90.00</span>
											</div>
										</div>
										<!--Single Product End-->
									</div>
									<div class="col-md-12">
										<!--Single Product Start-->
										<div class="single-product">
											<div class="product-img">
												<a href="single-product.html">
													<img src="<?php echo G5_ASSETS_URL; ?>/img/product/product4.jpg" alt="">
												</a>
												<span class="onsale">
													<span>Sale!</span>
												</span>
												<div class="product-action">
													<ul>
														<li><a href="#" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a></li>
														<li><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
														<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
													</ul>
													<div class="quickviewbtn">
														<a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i>Quick View</a>
													</div>
												</div>
											</div>
											<div class="product-content">
												<h4><a href="single-product.html">Nullam maximus</a></h4>
												<div class="product-reviews">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
											</div>
											<div class="product-price">
												<span class="price">$64.00</span>
												<span class="regular-price">$78.00</span>
											</div>
										</div>
										<!--Single Product End-->
									</div>
									<div class="col-md-12">
										<!--Single Product Start-->
										<div class="single-product">
											<div class="product-img">
												<a href="single-product.html">
													<img src="<?php echo G5_ASSETS_URL; ?>/img/product/product5.jpg" alt="">
												</a>
												<span class="onsale">
													<span>Sale!</span>
												</span>
												<div class="product-action">
													<ul>
														<li><a href="#" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a></li>
														<li><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
														<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
													</ul>
													<div class="quickviewbtn">
														<a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i>Quick View</a>
													</div>
												</div>
											</div>
											<div class="product-content">
												<h4><a href="single-product.html">Nostrum exercitationem</a></h4>
												<div class="product-reviews">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
											</div>
											<div class="product-price">
												<span class="price">$79.00</span>
												<span class="regular-price">$86.00</span>
											</div>
										</div>
										<!--Single Product End-->
									</div>
								</div>
							</div>
						</div>
						<!--Product End-->
					</div>
					<div class="tab-pane fade" id="essentials">
					  <!--Product Start-->
					  <div class="all-sinlgle-product">
						 <div class="product-slider-wrap">
							 <div class="row product-slider owl-carousel">
								<div class="col-md-12">
									<!--Single Product Start-->
									<div class="single-product">
										<div class="product-img">
											<a href="single-product.html">
												<img src="<?php echo G5_ASSETS_URL; ?>/img/product/product11.jpg" alt="">
											</a>
											<span class="onsale">
												<span>Sale!</span>
											</span>
											<div class="product-action">
												<ul>
													<li><a href="#" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a></li>
													<li><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
													<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
												</ul>
												<div class="quickviewbtn">
													<a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i>Quick View</a>
												</div>
											</div>
										</div>
										<div class="product-content">
											<h4><a href="single-product.html">Sit voluptatem</a></h4>
											<div class="product-reviews">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-price">
											<span class="price">$66.00</span>
											<span class="regular-price">$77.00</span>
										</div>
									</div>
									<!--Single Product End-->
								</div>
								<div class="col-md-12">
									<!--Single Product Start-->
									<div class="single-product">
										<div class="product-img">
											<a href="single-product.html">
												<img src="<?php echo G5_ASSETS_URL; ?>/img/product/product12.jpg" alt="">
											</a>
											<span class="onsale">
												<span>Sale!</span>
											</span>
											<div class="product-action">
												<ul>
													<li><a href="#" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a></li>
													<li><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
													<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
												</ul>
												<div class="quickviewbtn">
													<a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i>Quick View</a>
												</div>
											</div>
										</div>
										<div class="product-content">
											<h4><a href="single-product.html">Porro quisquam</a></h4>
											<div class="product-reviews">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-price">
											<span class="price">$60.00</span>
											<span class="regular-price">$68.00</span>
										</div>
									</div>
									<!--Single Product End-->
								</div>
								<div class="col-md-12">
									<!--Single Product Start-->
									<div class="single-product">
										<div class="product-img">
											<a href="single-product.html">
												<img src="<?php echo G5_ASSETS_URL; ?>/img/product/product13.jpg" alt="">
											</a>
											<span class="onsale">
												<span>Sale!</span>
											</span>
											<div class="product-action">
												<ul>
													<li><a href="#" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a></li>
													<li><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
													<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
												</ul>
												<div class="quickviewbtn">
													<a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i>Quick View</a>
												</div>
											</div>
										</div>
										<div class="product-content">
											<h4><a href="single-product.html">Officiis debitis</a></h4>
											<div class="product-reviews">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-price">
											<span class="price">$85.00</span>
											<span class="regular-price">$90.00</span>
										</div>
									</div>
									<!--Single Product End-->
								</div>
								<div class="col-md-12">
									<!--Single Product Start-->
									<div class="single-product">
										<div class="product-img">
											<a href="single-product.html">
												<img src="<?php echo G5_ASSETS_URL; ?>/img/product/product14.jpg" alt="">
											</a>
											<span class="onsale">
												<span>Sale!</span>
											</span>
											<div class="product-action">
												<ul>
													<li><a href="#" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a></li>
													<li><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
													<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
												</ul>
												<div class="quickviewbtn">
													<a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i>Quick View</a>
												</div>
											</div>
										</div>
										<div class="product-content">
											<h4><a href="single-product.html">Nullam maximus</a></h4>
											<div class="product-reviews">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-price">
											<span class="price">$64.00</span>
											<span class="regular-price">$78.00</span>
										</div>
									</div>
									<!--Single Product End-->
								</div>
								<div class="col-md-12">
									<!--Single Product Start-->
									<div class="single-product">
										<div class="product-img">
											<a href="single-product.html">
												<img src="<?php echo G5_ASSETS_URL; ?>/img/product/product15.jpg" alt="">
											</a>
											<span class="onsale">
												<span>Sale!</span>
											</span>
											<div class="product-action">
												<ul>
													<li><a href="#" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a></li>
													<li><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
													<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
												</ul>
												<div class="quickviewbtn">
													<a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i>Quick View</a>
												</div>
											</div>
										</div>
										<div class="product-content">
											<h4><a href="single-product.html">Nostrum exercitationem</a></h4>
											<div class="product-reviews">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-price">
											<span class="price">$79.00</span>
											<span class="regular-price">$86.00</span>
										</div>
									</div>
									<!--Single Product End-->
								</div>
								<div class="col-md-12">
									<!--Single Product Start-->
									<div class="single-product">
										<div class="product-img">
											<a href="single-product.html">
												<img src="<?php echo G5_ASSETS_URL; ?>/img/product/product6.jpg" alt="">
											</a>
											<span class="onsale">
												<span>Sale!</span>
											</span>
											<div class="product-action">
												<ul>
													<li><a href="#" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a></li>
													<li><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
													<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
												</ul>
												<div class="quickviewbtn">
													<a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i>Quick View</a>
												</div>
											</div>
										</div>
										<div class="product-content">
											<h4><a href="single-product.html">Nemo enim</a></h4>
											<div class="product-reviews">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-price">
											<span class="price">$65.00</span>
											<span class="regular-price">$68.00</span>
										</div>
									</div>
									<!--Single Product End-->
								</div>
								<div class="col-md-12">
									<!--Single Product Start-->
									<div class="single-product">
										<div class="product-img">
											<a href="single-product.html">
												<img src="<?php echo G5_ASSETS_URL; ?>/img/product/product17.jpg" alt="">
											</a>
											<span class="onsale">
												<span>Sale!</span>
											</span>
											<div class="product-action">
												<ul>
													<li><a href="#" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a></li>
													<li><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
													<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
												</ul>
												<div class="quickviewbtn">
													<a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i>Quick View</a>
												</div>
											</div>
										</div>
										<div class="product-content">
											<h4><a href="single-product.html">Natus erro</a></h4>
											<div class="product-reviews">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-price">
											<span class="price">$81.00</span>
											<span class="regular-price">$85.00</span>
										</div>
									</div>
									<!--Single Product End-->
								</div>
								<div class="col-md-12">
									<!--Single Product Start-->
									<div class="single-product">
										<div class="product-img">
											<a href="single-product.html">
												<img src="<?php echo G5_ASSETS_URL; ?>/img/product/product8.jpg" alt="">
											</a>
											<span class="onsale">
												<span>Sale!</span>
											</span>
											<div class="product-action">
												<ul>
													<li><a href="#" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a></li>
													<li><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
													<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
												</ul>
												<div class="quickviewbtn">
													<a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i>Quick View</a>
												</div>
											</div>
										</div>
										<div class="product-content">
											<h4><a href="single-product.html">Laudantium</a></h4>
											<div class="product-reviews">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-price">
											<span class="price">$79.00</span>
											<span class="regular-price">$86.00</span>
										</div>
									</div>
									<!--Single Product End-->
								</div>
								<div class="col-md-12">
									<!--Single Product Start-->
									<div class="single-product">
										<div class="product-img">
											<a href="single-product.html">
												<img src="<?php echo G5_ASSETS_URL; ?>/img/product/product9.jpg" alt="">
											</a>
											<span class="onsale">
												<span>Sale!</span>
											</span>
											<div class="product-action">
												<ul>
													<li><a href="#" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a></li>
													<li><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
													<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
												</ul>
												<div class="quickviewbtn">
													<a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i>Quick View</a>
												</div>
											</div>
										</div>
										<div class="product-content">
											<h4><a href="single-product.html">Itaque earum</a></h4>
											<div class="product-reviews">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-price">
											<span class="price">$72.00</span>
											<span class="regular-price">$76.00</span>
										</div>
									</div>
									<!--Single Product End-->
								</div>
								<div class="col-md-12">
									<!--Single Product Start-->
									<div class="single-product">
										<div class="product-img">
											<a href="single-product.html">
												<img src="<?php echo G5_ASSETS_URL; ?>/img/product/product10.jpg" alt="">
											</a>
											<span class="onsale">
												<span>Sale!</span>
											</span>
											<div class="product-action">
												<ul>
													<li><a href="#" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a></li>
													<li><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
													<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
												</ul>
												<div class="quickviewbtn">
													<a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i>Quick View</a>
												</div>
											</div>
										</div>
										<div class="product-content">
											<h4><a href="single-product.html">Nullam maximus</a></h4>
											<div class="product-reviews">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-price">
											<span class="price">$62.00</span>
											<span class="regular-price">$78.00</span>
										</div>
									</div>
									<!--Single Product End-->
								</div>
							  </div>
						 </div>
					  </div>
					  <!--Product End-->
					</div>
					<div class="tab-pane fade" id="interior">
					  <!--Product Start-->
					  <div class="all-sinlgle-product">
						 <div class="product-slider-wrap">
							 <div class="row product-slider owl-carousel">
								<div class="col-md-12">
									<!--Single Product Start-->
									<div class="single-product">
										<div class="product-img">
											<a href="single-product.html">
												<img src="<?php echo G5_ASSETS_URL; ?>/img/product/product15.jpg" alt="">
											</a>
											<span class="onsale">
												<span>Sale!</span>
											</span>
											<div class="product-action">
												<ul>
													<li><a href="#" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a></li>
													<li><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
													<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
												</ul>
												<div class="quickviewbtn">
													<a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i>Quick View</a>
												</div>
											</div>
										</div>
										<div class="product-content">
											<h4><a href="single-product.html">Sit voluptatem</a></h4>
											<div class="product-reviews">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-price">
											<span class="price">$66.00</span>
											<span class="regular-price">$77.00</span>
										</div>
									</div>
									<!--Single Product End-->
								</div>
								<div class="col-md-12">
									<!--Single Product Start-->
									<div class="single-product">
										<div class="product-img">
											<a href="single-product.html">
												<img src="<?php echo G5_ASSETS_URL; ?>/img/product/product16.jpg" alt="">
											</a>
											<span class="onsale">
												<span>Sale!</span>
											</span>
											<div class="product-action">
												<ul>
													<li><a href="#" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a></li>
													<li><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
													<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
												</ul>
												<div class="quickviewbtn">
													<a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i>Quick View</a>
												</div>
											</div>
										</div>
										<div class="product-content">
											<h4><a href="single-product.html">Porro quisquam</a></h4>
											<div class="product-reviews">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-price">
											<span class="price">$60.00</span>
											<span class="regular-price">$68.00</span>
										</div>
									</div>
									<!--Single Product End-->
								</div>
								<div class="col-md-12">
									<!--Single Product Start-->
									<div class="single-product">
										<div class="product-img">
											<a href="single-product.html">
												<img src="<?php echo G5_ASSETS_URL; ?>/img/product/product17.jpg" alt="">
											</a>
											<span class="onsale">
												<span>Sale!</span>
											</span>
											<div class="product-action">
												<ul>
													<li><a href="#" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a></li>
													<li><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
													<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
												</ul>
												<div class="quickviewbtn">
													<a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i>Quick View</a>
												</div>
											</div>
										</div>
										<div class="product-content">
											<h4><a href="single-product.html">Officiis debitis</a></h4>
											<div class="product-reviews">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-price">
											<span class="price">$85.00</span>
											<span class="regular-price">$90.00</span>
										</div>
									</div>
									<!--Single Product End-->
								</div>
								<div class="col-md-12">
									<!--Single Product Start-->
									<div class="single-product">
										<div class="product-img">
											<a href="single-product.html">
												<img src="<?php echo G5_ASSETS_URL; ?>/img/product/product18.jpg" alt="">
											</a>
											<span class="onsale">
												<span>Sale!</span>
											</span>
											<div class="product-action">
												<ul>
													<li><a href="#" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a></li>
													<li><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
													<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
												</ul>
												<div class="quickviewbtn">
													<a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i>Quick View</a>
												</div>
											</div>
										</div>
										<div class="product-content">
											<h4><a href="single-product.html">Nullam maximus</a></h4>
											<div class="product-reviews">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-price">
											<span class="price">$64.00</span>
											<span class="regular-price">$78.00</span>
										</div>
									</div>
									<!--Single Product End-->
								</div>
								<div class="col-md-12">
									<!--Single Product Start-->
									<div class="single-product">
										<div class="product-img">
											<a href="single-product.html">
												<img src="<?php echo G5_ASSETS_URL; ?>/img/product/product5.jpg" alt="">
											</a>
											<span class="onsale">
												<span>Sale!</span>
											</span>
											<div class="product-action">
												<ul>
													<li><a href="#" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a></li>
													<li><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
													<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
												</ul>
												<div class="quickviewbtn">
													<a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i>Quick View</a>
												</div>
											</div>
										</div>
										<div class="product-content">
											<h4><a href="single-product.html">Nostrum exercitationem</a></h4>
											<div class="product-reviews">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-price">
											<span class="price">$79.00</span>
											<span class="regular-price">$86.00</span>
										</div>
									</div>
									<!--Single Product End-->
								</div>
								<div class="col-md-12">
									<!--Single Product Start-->
									<div class="single-product">
										<div class="product-img">
											<a href="single-product.html">
												<img src="<?php echo G5_ASSETS_URL; ?>/img/product/product19.jpg" alt="">
											</a>
											<span class="onsale">
												<span>Sale!</span>
											</span>
											<div class="product-action">
												<ul>
													<li><a href="#" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a></li>
													<li><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
													<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
												</ul>
												<div class="quickviewbtn">
													<a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i>Quick View</a>
												</div>
											</div>
										</div>
										<div class="product-content">
											<h4><a href="single-product.html">Nemo enim</a></h4>
											<div class="product-reviews">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-price">
											<span class="price">$65.00</span>
											<span class="regular-price">$68.00</span>
										</div>
									</div>
									<!--Single Product End-->
								</div>
								<div class="col-md-12">
									<!--Single Product Start-->
									<div class="single-product">
										<div class="product-img">
											<a href="single-product.html">
												<img src="<?php echo G5_ASSETS_URL; ?>/img/product/product20.jpg" alt="">
											</a>
											<span class="onsale">
												<span>Sale!</span>
											</span>
											<div class="product-action">
												<ul>
													<li><a href="#" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a></li>
													<li><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
													<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
												</ul>
												<div class="quickviewbtn">
													<a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i>Quick View</a>
												</div>
											</div>
										</div>
										<div class="product-content">
											<h4><a href="single-product.html">Natus erro</a></h4>
											<div class="product-reviews">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-price">
											<span class="price">$81.00</span>
											<span class="regular-price">$85.00</span>
										</div>
									</div>
									<!--Single Product End-->
								</div>
								<div class="col-md-12">
									<!--Single Product Start-->
									<div class="single-product">
										<div class="product-img">
											<a href="single-product.html">
												<img src="<?php echo G5_ASSETS_URL; ?>/img/product/product7.jpg" alt="">
											</a>
											<span class="onsale">
												<span>Sale!</span>
											</span>
											<div class="product-action">
												<ul>
													<li><a href="#" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a></li>
													<li><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
													<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
												</ul>
												<div class="quickviewbtn">
													<a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i>Quick View</a>
												</div>
											</div>
										</div>
										<div class="product-content">
											<h4><a href="single-product.html">Laudantium</a></h4>
											<div class="product-reviews">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-price">
											<span class="price">$79.00</span>
											<span class="regular-price">$86.00</span>
										</div>
									</div>
									<!--Single Product End-->
								</div>
								<div class="col-md-12">
									<!--Single Product Start-->
									<div class="single-product">
										<div class="product-img">
											<a href="single-product.html">
												<img src="<?php echo G5_ASSETS_URL; ?>/img/product/product13.jpg" alt="">
											</a>
											<span class="onsale">
												<span>Sale!</span>
											</span>
											<div class="product-action">
												<ul>
													<li><a href="#" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a></li>
													<li><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
													<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
												</ul>
												<div class="quickviewbtn">
													<a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i>Quick View</a>
												</div>
											</div>
										</div>
										<div class="product-content">
											<h4><a href="single-product.html">Itaque earum</a></h4>
											<div class="product-reviews">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-price">
											<span class="price">$72.00</span>
											<span class="regular-price">$76.00</span>
										</div>
									</div>
									<!--Single Product End-->
								</div>
								<div class="col-md-12">
									<!--Single Product Start-->
									<div class="single-product">
										<div class="product-img">
											<a href="single-product.html">
												<img src="<?php echo G5_ASSETS_URL; ?>/img/product/product14.jpg" alt="">
											</a>
											<span class="onsale">
												<span>Sale!</span>
											</span>
											<div class="product-action">
												<ul>
													<li><a href="#" data-toggle="tooltip" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a></li>
													<li><a href="#" data-toggle="tooltip" title="Add To Wishlist"><i class="fa fa-heart-o"></i></a></li>
													<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i></a></li>
												</ul>
												<div class="quickviewbtn">
													<a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i>Quick View</a>
												</div>
											</div>
										</div>
										<div class="product-content">
											<h4><a href="single-product.html">Nullam maximus</a></h4>
											<div class="product-reviews">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-price">
											<span class="price">$62.00</span>
											<span class="regular-price">$78.00</span>
										</div>
									</div>
									<!--Single Product End-->
								</div>
							  </div>
						 </div>
					  </div>
					  <!--Product End-->
					</div>
					*/ ?>
				</div>
				<!-- END :: Featured Tab Content -->
			</div>
		</div>
	</div>
</div>
<!--Featured Products Area End-->
<div class="container">
	<?php if($default['de_type1_list_use']) { ?>
	<!-- 히트상품 시작 { -->
	<section class="sct_wrap">
		<header>
			<h2><a href="<?php echo G5_SHOP_URL; ?>/listtype.php?type=1">히트상품</a></h2>
		</header>
		<?php
		$list = new item_list();
		$list->set_type(1);
		$list->set_view('it_img', true);
		$list->set_view('it_id', false);
		$list->set_view('it_name', true);
		$list->set_view('it_basic', true);
		$list->set_view('it_cust_price', true);
		$list->set_view('it_price', true);
		$list->set_view('it_icon', true);
		$list->set_view('sns', true);
		echo $list->run();
		?>
	</section>
	<!-- } 히트상품 끝 -->
	<?php } ?>
	<?php if($default['de_type2_list_use']) { ?>
	<!-- 추천상품 시작 { -->
	<section class="sct_wrap">
		<header>
			<h2><a href="<?php echo G5_SHOP_URL; ?>/listtype.php?type=2">추천상품</a></h2>
		</header>
		<?php
		$list = new item_list();
		$list->set_type(2);
		$list->set_view('it_id', false);
		$list->set_view('it_name', true);
		$list->set_view('it_basic', true);
		$list->set_view('it_cust_price', true);
		$list->set_view('it_price', true);
		$list->set_view('it_icon', true);
		$list->set_view('sns', true);
		echo $list->run();
		?>
	</section>
	<!-- } 추천상품 끝 -->
	<?php } ?>
	<?php include_once(G5_SHOP_SKIN_PATH.'/boxevent.skin.php'); // 이벤트 ?>
	<?php if($default['de_type3_list_use']) { ?>
	<!-- 최신상품 시작 { -->
	<section class="sct_wrap">
		<header>
			<h2><a href="<?php echo G5_SHOP_URL; ?>/listtype.php?type=3">최신상품</a></h2>
		</header>
		<?php
		$list = new item_list();
		$list->set_type(3);
		$list->set_view('it_id', false);
		$list->set_view('it_name', true);
		$list->set_view('it_basic', true);
		$list->set_view('it_cust_price', true);
		$list->set_view('it_price', true);
		$list->set_view('it_icon', true);
		$list->set_view('sns', true);
		echo $list->run();
		?>
	</section>
	<!-- } 최신상품 끝 -->
	<?php } ?>
	<?php if($default['de_type4_list_use']) { ?>
	<!-- 인기상품 시작 { -->
	<section class="sct_wrap">
		<header>
			<h2><a href="<?php echo G5_SHOP_URL; ?>/listtype.php?type=4">인기상품</a></h2>
		</header>
		<?php
		$list = new item_list();
		$list->set_type(4);
		$list->set_view('it_id', false);
		$list->set_view('it_name', true);
		$list->set_view('it_basic', false);
		$list->set_view('it_cust_price', false);
		$list->set_view('it_price', true);
		$list->set_view('it_icon', false);
		$list->set_view('sns', false);
		echo $list->run();
		?>
	</section>
	<!-- } 인기상품 끝 -->
	<?php } ?>
	<?php if($default['de_type5_list_use']) { ?>
	<!-- 할인상품 시작 { -->
	<section class="sct_wrap">
		<header>
			<h2><a href="<?php echo G5_SHOP_URL; ?>/listtype.php?type=5">할인상품</a></h2>
		</header>
		<?php
		$list = new item_list();
		$list->set_type(5);
		$list->set_view('it_id', false);
		$list->set_view('it_name', true);
		$list->set_view('it_basic', true);
		$list->set_view('it_cust_price', true);
		$list->set_view('it_price', true);
		$list->set_view('it_icon', true);
		$list->set_view('sns', true);
		echo $list->run();
		?>
	</section>
	<!-- } 할인상품 끝 -->
	<?php } ?>
</div>
<?php
include_once(G5_THEME_SHOP_PATH.'/shop.tail.php');
?>