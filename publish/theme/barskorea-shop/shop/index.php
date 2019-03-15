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
<!-- BIGIN :: Featured Products Area -->
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
							$sql = "SELECT a.*, (SELECT b.it_id FROM {$g5['g5_shop_wish_table']} AS b WHERE a.it_id = b.it_id AND b.mb_id = '$mb_id') AS wish FROM {$g5['g5_shop_item_table']} AS a WHERE a.ca_id = '$main_tabs_arr[$i]' AND a.it_type5 = 1";
							$res = sql_query($sql);
					?>
					<div class="tab-pane fade <?php if($i == 0) echo ' show active'; ?>" id="<?php echo $main_tabs_id_arr[$i]; ?>">
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
												<a href="<?php echo G5_SHOP_URL . '/item.php?it_id=' . $row['it_id']; ?>">
													<img src="<?php echo G5_DATA_URL.'/item/'.$row['it_img1']; ?>" alt="" />
												</a>
												<span class="onsale">
													<span>Sale!</span>
												</span>
												<div class="product-action">
													<ul>
														<li>
															<a href="<?php echo G5_SHOP_URL; ?>/quick.view.php" class="btn-list-cart btn-quick-view" data-toggle="tooltip" data-id="<?php echo $row['it_id']; ?>" title="Add To Cart">
																<i class="fa fa-shopping-cart"></i>
															</a>
														</li>
														<li>
															<a href="#" class="btn-list-wishlist<?php echo $row['wish'] != '' ? ' active' : ''; ?>" data-toggle="tooltip" data-id="<?php echo $row['it_id']; ?>" title="Add To Wishlist">
																<i class="fa fa-heart-o"></i>
															</a>
														</li>
														<li>
															<a href="#" class="btn-list-compare" data-toggle="tooltip" data-id="<?php echo $row['it_id']; ?>" data-placement="top" title="Compare">
																<i class="fa fa-refresh"></i>
															</a>
														</li>
													</ul>
													<div class="quickviewbtn">
														<a href="#open-modal" data-toggle="modal" class="btn-list-quick-view" data-id="<?php echo $row['it_id']; ?>" title="Quick view">
															<i class="fa fa-search"></i>
															Quick View
														</a>
													</div>
												</div>
											</div>
											<div class="product-content">
												<h4><a href="<?php echo G5_SHOP_URL . '/item.php?it_id=' . $row['it_id']; ?>"><?php echo $row['it_name']; ?></a></h4>
												<div class="product-reviews">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
											</div>
											<div class="product-price">
												<span class="price">
													<?php echo "&#8361;" . number_format($row['it_price']); ?><!-- $66.00 -->
												</span>
												<span class="regular-price">
													<?php echo "&#8361;" . number_format($row['it_cust_price']); ?><!-- $77.00 -->
												</span>
											</div>
										</div>
										<!--Single Product End-->
									</div>
									<?php
										}
									?>
								  </div>
							 </div>
						</div>
						<!--Product End-->
					</div>
					<?php
						}
					?>
				</div>
				<!-- END :: Featured Tab Content -->
			</div>
		</div>
	</div>
</div>
<!-- END :: Featured Products Area -->
<!-- BIGIN :: Sale Banner Area -->
<div class="sale-banner-area mb-85">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="banner-content">
                    <h3>Sale!</h3>
                    <p><em>10% off on all products</em></p>
                    <a class="banner-btn" href="#">Shop now</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END :: Sale Banner Area -->
<!-- BIGIN :: Product Area -->
<?php
	$best_item = array();
	$trand_item = array();
	$new_item = array();
	$sql = "SELECT * FROM {$g5['g5_shop_item_table']} WHERE it_type2 = 1";
	$res = sql_query($sql);
	while ($row = sql_fetch_array($res)) {
		$trand_item[] = $row;
	}
	$sql = "SELECT * FROM {$g5['g5_shop_item_table']} WHERE it_type3 = 1";
	$res = sql_query($sql);
	while ($row = sql_fetch_array($res)) {
		$new_item[] = $row;
	}
	$sql = "SELECT * FROM {$g5['g5_shop_item_table']} WHERE it_type4 = 1";
	$res = sql_query($sql);
	while ($row = sql_fetch_array($res)) {
		$best_item[] = $row;
	}
?>
<div class="product-area mb-55">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-4 col-12">
                <div class="product-title">
                    <h3>Best Sellers</h3>
                </div>
                <div class="product-cat-list owl-carousel">
                    <?php
                    	for ($i=0; $i < count($best_item); $i++) {
                    		if($i % 2 == 0) {
                    ?>
                    <div class="product-list-group">
	                    <?php
	                    	}
	                    ?>
                        <!--Single List Product Start-->
                        <div class="single-product product-list mb-35">
                            <div class="list-col-4">
                                <div class="product-img">
                                    <a href="<?php echo G5_SHOP_URL . '/item.php?it_id=' . $best_item[$i]['it_id']; ?>"><img src="<?php echo G5_DATA_URL . '/item/' . $best_item[$i]['it_img1']; ?>" alt=""></a>
                                    <span class="onsale">
                                        <span>Sale!</span>
                                    </span>
                                </div>
                            </div>
                            <div class="list-col-8">
                                <div class="product-content">
                                    <h4><a href="<?php echo G5_SHOP_URL . '/item.php?it_id=' . $best_item[$i]['it_id']; ?>"><?php echo $best_item[$i]['it_name']; ?></a></h4>
                                    <div class="product-reviews">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="product-price">
                                        <span class="price"><?php echo "&#8361;" . number_format($best_item[$i]['it_price']); ?></span>
                                        <?php if (!empty($best_item[$i]['it_cust_price'])) { ?>
                                        <span class="regular-price"><?php echo "&#8361;" . number_format($best_item[$i]['it_cust_price']); ?></span>
                                    	<?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Single List Product End-->
                        <?php
                        	if (($i + 1) % 2 == 0) {
                        ?>
                    </div>
                	<?php
                			}
                		}
                	?>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-12">
                <div class="product-title">
                    <h3>Top Rate</h3>
                </div>
                <div class="product-cat-list owl-carousel">
                    <?php
                    	for ($i=0; $i < count($trand_item); $i++) {
                    		if($i % 2 == 0) {
                    ?>
                    <div class="product-list-group">
	                    <?php
	                    	}
	                    ?>
                        <!--Single List Product Start-->
                        <div class="single-product product-list mb-35">
                            <div class="list-col-4">
                                <div class="product-img">
                                    <a href="<?php echo G5_SHOP_URL . '/item.php?it_id=' . $trand_item[$i]['it_id']; ?>"><img src="<?php echo G5_DATA_URL . '/item/' . $trand_item[$i]['it_img1']; ?>" alt=""></a>
                                    <span class="onsale">
                                        <span>Sale!</span>
                                    </span>
                                </div>
                            </div>
                            <div class="list-col-8">
                                <div class="product-content">
                                    <h4><a href="<?php echo G5_SHOP_URL . '/item.php?it_id=' . $trand_item[$i]['it_id']; ?>"><?php echo $trand_item[$i]['it_name']; ?></a></h4>
                                    <div class="product-reviews">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="product-price">
                                        <span class="price"><?php echo "&#8361;" . number_format($trand_item[$i]['it_price']); ?></span>
                                        <?php if (!empty($trand_item[$i]['it_cust_price'])) { ?>
                                        <span class="regular-price"><?php echo "&#8361;" . number_format($trand_item[$i]['it_cust_price']); ?></span>
                                    	<?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Single List Product End-->
                        <?php
                        	if (($i + 1) % 2 == 0) {
                        ?>
                    </div>
                	<?php
                			}
                		}
                	?>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-12">
                <div class="product-title">
                    <h3>New Arrivals</h3>
                </div>
                <div class="product-cat-list owl-carousel">
                    <?php
                    	for ($i=0; $i < count($new_item); $i++) {
                    		if($i % 2 == 0) {
                    ?>
                    <div class="product-list-group">
	                    <?php
	                    	}
	                    ?>
                        <!--Single List Product Start-->
                        <div class="single-product product-list mb-35">
                            <div class="list-col-4">
                                <div class="product-img">
                                    <a href="<?php echo G5_SHOP_URL . '/item.php?it_id=' . $new_item[$i]['it_id']; ?>"><img src="<?php echo G5_DATA_URL . '/item/' . $new_item[$i]['it_img1']; ?>" alt=""></a>
                                    <span class="onsale">
                                        <span>Sale!</span>
                                    </span>
                                </div>
                            </div>
                            <div class="list-col-8">
                                <div class="product-content">
                                    <h4><a href="<?php echo G5_SHOP_URL . '/item.php?it_id=' . $new_item[$i]['it_id']; ?>"><?php echo $new_item[$i]['it_name']; ?></a></h4>
                                    <div class="product-reviews">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="product-price">
                                        <span class="price"><?php echo "&#8361;" . number_format($new_item[$i]['it_price']); ?></span>
                                        <?php if (!empty($new_item[$i]['it_cust_price'])) { ?>
                                        <span class="regular-price"><?php echo "&#8361;" . number_format($new_item[$i]['it_cust_price']); ?></span>
                                    	<?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Single List Product End-->
                        <?php
                        	if (($i + 1) % 2 == 0) {
                        ?>
                    </div>
                	<?php
                			}
                		}
                	?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END :: Product Area -->
<?php /*

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
</div>
*/ ?>
<!-- BIGIN :: Blog Area -->
<div class="blog-area mb-70">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!--Section Title Start-->
                <div class="section-title text-center">
                    <h3>Latest News</h3>
                </div>
                <!--Section Title End-->
            </div>
        </div>
        <div class="row blog-slider owl-carousel">
            <div class="col-12">
                <!--Single Blog Start-->
                <div class="single-blog">
                    <div class="blog-img img-full">
                        <a href="single-blog.html">
                            <img src="<?php echo G5_ASSETS_URL; ?>/img/blog/blog1.jpg" alt="">
                        </a>
                    </div>
                    <div class="blog-content">
                        <h3 class="blog-title"><a href="single-blog.html">Blog image post</a></h3>
                        <ul class="blog-meta">
                            <li>By<a href="#">admin</a></li>
                            <li>on <span>01 Dec 2018</span></li>
                        </ul>
                        <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Praesent</p>
                    </div>
                </div>
                <!--Single Blog Start-->
            </div>
            <div class="col-12">
                <!--Single Blog Start-->
                <div class="single-blog">
                    <div class="blog-img img-full">
                        <a href="single-blog.html">
                            <img src="<?php echo G5_ASSETS_URL; ?>/img/blog/blog2.jpg" alt="">
                        </a>
                    </div>
                    <div class="blog-content">
                        <h3 class="blog-title"><a href="single-blog.html">Post with Gallery</a></h3>
                        <ul class="blog-meta">
                            <li>By<a href="#">admin</a></li>
                            <li>on <span>15 Dec 2018</span></li>
                        </ul>
                        <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Praesent</p>
                    </div>
                </div>
                <!--Single Blog Start-->
            </div>
            <div class="col-12">
                <!--Single Blog Start-->
                <div class="single-blog">
                    <div class="blog-img img-full">
                        <a href="single-blog.html">
                            <img src="<?php echo G5_ASSETS_URL; ?>/img/blog/blog3.jpg" alt="">
                        </a>
                    </div>
                    <div class="blog-content">
                        <h3 class="blog-title"><a href="single-blog.html">Post with Audio</a></h3>
                        <ul class="blog-meta">
                            <li>By<a href="#">admin</a></li>
                            <li>on <span>01 Dec 2018</span></li>
                        </ul>
                        <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Praesent</p>
                    </div>
                </div>
                <!--Single Blog Start-->
            </div>
            <div class="col-12">
                <!--Single Blog Start-->
                <div class="single-blog">
                    <div class="blog-img img-full">
                        <a href="single-blog.html">
                            <img src="<?php echo G5_ASSETS_URL; ?>/img/blog/blog4.jpg" alt="">
                        </a>
                    </div>
                    <div class="blog-content">
                        <h3 class="blog-title"><a href="single-blog.html">Post with Video</a></h3>
                        <ul class="blog-meta">
                            <li>By<a href="#">admin</a></li>
                            <li>on <span>05 Dec 2018</span></li>
                        </ul>
                        <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Praesent</p>
                    </div>
                </div>
                <!--Single Blog Start-->
            </div>
            <div class="col-12">
                <!--Single Blog Start-->
                <div class="single-blog">
                    <div class="blog-img img-full">
                        <a href="single-blog.html">
                            <img src="<?php echo G5_ASSETS_URL; ?>/img/blog/blog5.jpg" alt="">
                        </a>
                    </div>
                    <div class="blog-content">
                        <h3 class="blog-title"><a href="single-blog.html">Maecenas ultricies</a></h3>
                        <ul class="blog-meta">
                            <li>By<a href="#">admin</a></li>
                            <li>on <span>10 Dec 2018</span></li>
                        </ul>
                        <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Praesent</p>
                    </div>
                </div>
                <!--Single Blog Start-->
            </div>
            <div class="col-12">
                <!--Single Blog Start-->
                <div class="single-blog">
                    <div class="blog-img img-full">
                        <a href="single-blog.html">
                            <img src="<?php echo G5_ASSETS_URL; ?>/img/blog/blog6.jpg" alt="">
                        </a>
                    </div>
                    <div class="blog-content">
                        <h3 class="blog-title"><a href="single-blog.html">Etiam magna</a></h3>
                        <ul class="blog-meta">
                            <li>By<a href="#">admin</a></li>
                            <li>on <span>01 Dec 2018</span></li>
                        </ul>
                        <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Praesent</p>
                    </div>
                </div>
                <!--Single Blog Start-->
            </div>
            <div class="col-12">
                <!--Single Blog Start-->
                <div class="single-blog">
                    <div class="blog-img img-full">
                        <a href="single-blog.html">
                            <img src="<?php echo G5_ASSETS_URL; ?>/img/blog/blog7.jpg" alt="">
                        </a>
                    </div>
                    <div class="blog-content">
                        <h3 class="blog-title"><a href="single-blog.html">Praesent imperdiet</a></h3>
                        <ul class="blog-meta">
                            <li>By<a href="#">admin</a></li>
                            <li>on <span>20 Dec 2018</span></li>
                        </ul>
                        <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Praesent</p>
                    </div>
                </div>
                <!--Single Blog Start-->
            </div>
        </div>
    </div>
</div>
<!-- END :: Blog Area -->
<!-- BIGIN :: Feature Area -->
<div class="feature-area mb-90">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-4 white-bg">
                <!--Single Feature Start-->
                <div class="single-feature">
                    <div class="feature-icon">
                        <img src="<?php echo G5_ASSETS_URL; ?>/img/icon/feature1.png" alt="">
                    </div>
                    <div class="feature-content">
                        <h3>100% Money Back Guarantee</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit auctor nibh.</p>
                    </div>
                </div>
                <!--Single Feature End-->
            </div>
            <div class="col-md-4 white-bg">
                <!--Single Feature Start-->
                <div class="single-feature">
                    <div class="feature-icon">
                        <img src="<?php echo G5_ASSETS_URL; ?>/img/icon/feature2.png" alt="">
                    </div>
                    <div class="feature-content">
                        <h3>Free Shipping On Order Over 500$</h3>
                        <p>Duis luctus libero in quam convallis, idpla cerat tellus convallis</p>
                    </div>
                </div>
                <!--Single Feature End-->
            </div>
            <div class="col-md-4 white-bg">
                <!--Single Feature Start-->
                <div class="single-feature">
                    <div class="feature-icon">
                        <img src="<?php echo G5_ASSETS_URL; ?>/img/icon/feature3.png" alt="">
                    </div>
                    <div class="feature-content">
                        <h3>Online Support 24/7</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit auctor nibh.</p>
                    </div>
                </div>
                <!--Single Feature End-->
            </div>
        </div>
    </div>
</div>
<!-- END :: Feature Area -->
<!-- BIGIN :: Testimonial Area -->
<div class="testimonial-area mb-85">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!--Section Title Start-->
                <div class="section-title text-center">
                    <h3>What They Say About Us</h3>
                </div>
                <!--Section Title End-->
            </div>
        </div>
        <div class="testimonial-slider">
            <div class="row testimonial-active owl-carousel">
                <div class="col-lg-8 col-12 ml-auto mr-auto">
                    <!--Single Testimonial Start-->
                    <div class="single-testimonial text-center">
                        <div class="testimonial-img">
                            <img src="<?php echo G5_ASSETS_URL; ?>/img/testimonial/testimonial1.jpg" alt="">
                        </div>
                        <div class="testimonial-content">
                            <p>Perfect Themes and the best of all that you have many options to choose! Best Support team ever! Very fast responding! Thank you very much! I highly recommend this theme and these people!</p>
                            <div class="testimonial-author">
                                <h6>Katherine Sullivan <span>Customer</span></h6>
                            </div>
                        </div>
                    </div>
                    <!--Single Testimonial End-->
                </div>
                <div class="col-lg-8 col-12 ml-auto mr-auto">
                    <!--Single Testimonial Start-->
                    <div class="single-testimonial text-center">
                        <div class="testimonial-img">
                            <img src="<?php echo G5_ASSETS_URL; ?>/img/testimonial/testimonial2.jpg" alt="">
                        </div>
                        <div class="testimonial-content">
                            <p>Perfect Themes and the best of all that you have many options to choose! Best Support team ever! Very fast responding! Thank you very much! I highly recommend this theme and these people!</p>
                            <div class="testimonial-author">
                                <h6>Md Shohel <span>Manager of AZ</span></h6>
                            </div>
                        </div>
                    </div>
                    <!--Single Testimonial End-->
                </div>
                <div class="col-lg-8 col-12 ml-auto mr-auto">
                    <!--Single Testimonial Start-->
                    <div class="single-testimonial text-center">
                        <div class="testimonial-img">
                            <img src="<?php echo G5_ASSETS_URL; ?>/img/testimonial/testimonial3.jpg" alt="">
                        </div>
                        <div class="testimonial-content">
                            <p>Perfect Themes and the best of all that you have many options to choose! Best Support team ever! Very fast responding! Thank you very much! I highly recommend this theme and these people!</p>
                            <div class="testimonial-author">
                                <h6>Kathy Young <span>CEO of SunPark</span></h6>
                            </div>
                        </div>
                    </div>
                    <!--Single Testimonial End-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END :: Testimonial Area -->
<?php
include_once(G5_THEME_SHOP_PATH.'/shop.tail.php');
?>