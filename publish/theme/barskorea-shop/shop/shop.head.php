<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

if(G5_IS_MOBILE) {
	include_once(G5_THEME_MSHOP_PATH.'/shop.head.php');
	return;
}

include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
$lang = $_COOKIE['language'];
if(empty($lang)) {
	$lang = 'eng';
}

$language = array(
	/*
	array(
		'code' => 'eng',
		'text' => 'english',
		'lang2code' => 'en'
	),
	*/
	array(
		'code' => 'usa',
		'text' => 'english',
		'lang2Code' => 'us'
	),
	array(
		'code' => 'kor',
		'text' => 'korean',
		'lang2Code' => 'ko'
	)
);
include_once(G5_PATH.'/language/'.$lang.'.php');
?>
<!-- DIGIN :: warpper -->
<div class="wrapper">
	<header>
		<div class="header-container">
			<!-- BIGIN :: Header Top Area -->
			<div class="header-top-area">
				<div class="container">
					<div class="row">
						<!-- BIGIN :: Language select -->
						<div class="col-md-6">
							<div class="header-top-left">
								<div class="header-top-language">
									<ul>
										<li>
											<a href="#" data-lang="<?php echo $langStr['langCode']; ?>">
												<img src="<?php echo G5_ASSETS_URL; ?>/img/language/<?php echo $langStr['lang2Code']; ?>.png" alt=""> 
												<span><?php echo $langStr['language']; ?></span>
											</a>
											<!--Header Top Dropdown-->
											<ul class="ht-dropdown">
												<?php
												for ($i=0; $i < count($language); $i++) {
													$code = $language[$i]['code'];
													if($lang != $code) {
												?>
												<li>
													<a href="#" data-lang="<?php echo $code; ?>">
														<img src="<?php echo G5_ASSETS_URL; ?>/img/language/<?php echo $language[$i]['lang2Code']; ?>.png" alt=""> 
														<span><?php echo $langStr[$code]; ?></span>
													</a>
												</li>
												<?php
													}
												}
												?>
											</ul>
											<!--Header Top Dropdown-->
										</li>
									</ul>
								</div>
							</div>
						</div>
						<!-- END :: Language select -->
						<!-- BIGIN :: Member menu -->
						<div class="col-md-6">
							<div class="header-top-right text-right">
								<div class="menu-my-account">
									<ul>
										<li><a href="my-account.html"><?php echo $langStr['MyAccount']; ?></a>
										   <!--Header Top Dropdown-->
											<ul class="ht-dropdown account-menu">
												<?php if(G5_COMMUNITY_USE) { ?>
												<li class="tnb_left tnb_shop">
													<a href="<?php echo G5_SHOP_URL; ?>/">
														<i class="fa fa-shopping-bag" aria-hidden="true"></i>
														쇼핑몰
													</a>
												</li>
												<li class="tnb_left tnb_community">
													<a href="<?php echo G5_URL; ?>/">
														<i class="fa fa-home" aria-hidden="true"></i>
														커뮤니티
													</a>
												</li>
												<?php } ?>
												<li class="tnb_cart">
													<a href="<?php echo G5_SHOP_URL; ?>/cart.php">
														<i class="fa fa-shopping-cart" aria-hidden="true"></i>
														<?php echo $langStr['basket']; ?>
													</a>
												</li>
												<li class="tnb_left tnb_shop">
													<a href="<?php echo G5_SHOP_URL; ?>/wishlist.php">
														<i class="fa fa-shopping-basket" aria-hidden="true"></i>
														<?php echo $langStr['wish']; ?>
													</a>
												</li>
												<li>
													<a href="<?php echo G5_SHOP_URL; ?>/mypage.php">
														<i class="fa fa-user-o" aria-hidden="true"></i>
														<?php echo $langStr['MyPage']; ?>
													</a>
												</li>
												<?php if ($is_member) { ?>
												<li>
													<a href="<?php echo G5_BBS_URL; ?>/member_confirm.php?url=register_form.php">
														<i class="fa fa-address-card-o" aria-hidden="true"></i>
														<?php echo $langStr['EditMyInformation']; ?>
													</a>
												</li>
												<li>
													<a href="<?php echo G5_BBS_URL; ?>/logout.php?url=shop">
														<i class="fa fa-sign-out" aria-hidden="true"></i>
														<?php echo $langStr['SignOut']; ?>
													</a>
												</li>
												<?php if ($is_admin) {  ?>
												<li class="tnb_admin">
													<a href="<?php echo G5_ADMIN_URL; ?>/shop_admin/">
														<i class="fa fa-cog" aria-hidden="true"></i>
														<b><?php echo $langStr['Administrator']; ?></b>
													</a>
												</li>
												<?php }  ?>
												<?php } else { ?>
												<li>
													<a href="<?php echo G5_BBS_URL; ?>/register.php">
														<i class="fa fa-user-plus" aria-hidden="true"></i>
														회원가입
													</a>
												</li>
												<li>
													<a href="<?php echo G5_BBS_URL; ?>/login.php?url=<?php echo $urlencode; ?>">
														<i class="fa fa-sign-in" aria-hidden="true"></i>
														<b>로그인</b>
													</a>
												</li>
												<?php } ?>
												<!--
												<li><a href="login-register.html">Login Register</a></li>
												<li><a href="my-account.html">My Account</a></li>
												<li><a href="cart.html">Shopping cart</a></li>
												<li><a href="wishlist.html">wishlist</a></li>
												<li><a href="checkout.html">Checkout</a></li>
												-->
											</ul>
											<!--Header Top Dropdown--> 
										</li>
										<li>
											<a href="<?php echo G5_SHOP_URL; ?>/wishlist.php">
												<i class="fa fa-heart-o"></i>
											</a>
										</li>
										<li>
											<a href="checkout.html">
												<i class="fa fa-check-square-o"></i>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<!-- END :: Member menu -->
					</div>
				</div>
			</div>
			<!-- END :: Header Top Area -->
			<!-- BIGIN :: Header Middle Area -->
			<div class="header-middle-area pt-55 pb-55">
				<div class="container">
					<div class="row">
						<div class="col-md-4 text-center text-md-left">
							<div class="header-search">
								<form name="frmsearch1" action="<?php echo G5_SHOP_URL; ?>/search.php" onsubmit="return search_submit(this);">
									<div class="form-input">
										<input name="q" id="search" placeholder="Search product..." value="<?php echo stripslashes(get_text(get_search_string($q))); ?>" onblur="if(this.value==''){this.value='Search product...'}" onfocus="if(this.value=='Search product...'){this.value=''}" type="text">
										<button type="submit" class="header-search-btn"></button>
									</div>
								</form>
								<script>
								function search_submit(f) {
									if (f.q.value.length < 2) {
										alert("검색어는 두글자 이상 입력하십시오.");
										f.q.select();
										f.q.focus();
										return false;
									}
									return true;
								}
								</script>
							</div>
						</div>
						<div class="col-md-4">
							<!--Logo Start-->
							<div class="logo text-center">
								<a href="<?php echo G5_URL; ?>"><img src="<?php echo G5_ASSETS_URL; ?>/img/logo/logo.png" alt=""></a>
							</div>
							<!--Logo Start-->
						</div>
						<div class="col-md-4">
							<!--Mini Cart Start-->
							<form method="" action="" enctype="multipart/form-data">
								<div class="mini-cart text-lg-right">
									<ul>
										<li>
											<?php
												// 보관기간이 지난 상품 삭제
												cart_item_clean();
												// cart id 설정
												set_cart_id($sw_direct);
												$s_cart_id = get_session('ss_cart_id');

												$cart_cnt = 0;
												$cart_item = array();
												$total_ct_price = 0;
												$cart_sql = "SELECT c.ct_id, c.od_id, c.it_id, c.ct_qty, c.ct_price, c.it_name,
																(SELECT i.it_img1 FROM {$g5['g5_shop_item_table']} i WHERE i.it_id = c.it_id) AS thumb
															FROM {$g5['g5_shop_cart_table']} AS c
															WHERE c.ct_direct = 0 
															AND c.ct_select = 0
															AND c.ct_status = '쇼핑'
															AND c.mb_id = '$mb_id'";
												$cart_res = sql_query($cart_sql);
												for ($i=0; $i < $cart_row = sql_fetch_array($cart_res); $i++) {
													$cart_cnt++;
													$cart_item[$i] = $cart_row;
													$total_ct_price += $cart_row['ct_price'];
												}
												//get_it_thumbnail
											?>
											<a href="#">
												<span class="cart-icon"></span>
												<span class="cart-quantity"><?php echo $cart_cnt; ?> items</span>
												<span class="cart-seraparate">-</span>
												<span class="cart-total"><?php echo number_format($total_ct_price); ?></span>
											</a>
											<!--Cart Dropdown Start-->
											
											<ul class="cart-dropdown">
												<?php for ($i=0; $i < count($cart_item); $i++) { ?>
												<li class="single-cart-item">
													<div class="cart-img">
														<a href="single-product.html">
															<?php echo get_it_thumbnail($cart_item[$i]['thumb'], 90, 113); ?>
														</a>
													</div>
													<div class="cart-content">
														<h5 class="product-name"><a href="<?php echo G5_SHOP_URL.'/item.php?it_id='.$cart_item[$i]['it_id']; ?>"><?php echo $cart_item[$i]['it_name']; ?></a></h5>
														<span class="quantity">Qty: <?php echo $cart_item[$i]['ct_qty']; ?></span>
														<span class="cart-price"><?php echo number_format($cart_item[$i]['ct_price']); ?></span>
													</div>
													<div class="cart-remove">
														<a title="Remove" href="#"><i class="fa fa-times"></i></a>
													</div>
												</li>
												<?php } ?>
											  <!--
											  <li class="single-cart-item">
												  <div class="cart-img">
													  <a href="single-product.html"><img src="<?php echo G5_ASSETS_URL; ?>/img/cart/cart1.jpg" alt=""></a>
												  </div>
												  <div class="cart-content">
													  <h5 class="product-name"><a href="single-product.html">Aliquam lobortis est</a></h5>
													  <span class="quantity">Qty: 1</span>
													  <span class="cart-price">$70.00</span>
												  </div>
												  <div class="cart-remove">
													  <a title="Remove" href="#"><i class="fa fa-times"></i></a>
												  </div>
											  </li>

											  <li class="single-cart-item">
												  <div class="cart-img">
													  <a href="single-product.html"><img src="<?php echo G5_ASSETS_URL; ?>/img/cart/cart2.jpg" alt=""></a>
												  </div>
												  <div class="cart-content">
													  <h5 class="product-name"><a href="single-product.html">Cras neque metus</a></h5>
													  <span class="quantity">Qty: 1</span>
													  <span class="cart-price">$60.00</span>
												  </div>
												  <div class="cart-remove">
													  <a title="Remove" href="#"><i class="fa fa-times"></i></a>
												  </div>
											  </li>
												-->
											  <li>
												  <p class="cart-subtotal"><strong>Subtotal:</strong> <span class="float-right"><?php echo number_format($total_ct_price); ?></span></p> 
												  <p class="cart-btn">
													  <a href="<?php echo G5_SHOP_URL ?>/cart.php">View cart</a>
													  <a href="checkout.html">Checkout</a>
												  </p>
											  </li>
										   </ul> 
										   <!--Cart Dropdown End-->
										</li>
									</ul>
								</div>
							</form>
							<!--Mini Cart End-->
						</div>
					</div>
				</div>
			</div>
			<!-- END :: Header Middle Area -->
			<!-- BIGIN :: Header Bottom Area -->
			<div class="header-bottom-area header-sticky">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<!--Logo Sticky Start-->
							<div class="logo-sticky">
								<a href="<?php echo G5_URL; ?>"><img src="<?php echo G5_ASSETS_URL; ?>/img/logo/logo.png" alt=""></a>
							</div>
							<!--Logo Sticky End-->
							<!--Header Menu Start-->
							<div class="header-menu-area text-center">
								<nav>
									<ul class="main-menu">
										<li>
											<a href="<?php echo G5_URL ?>">Home</a>
										</li>
										<li>
											<a href="<?php echo G5_SHOP_URL.'/mypage.php' ?>">My shopping</a>
											<!--Dropdown Menu Start-->
											<ul class="dropdown">
												<li>
													<a href="<?php echo G5_SHOP_URL; ?>/listtype.php?type=1">
														<?php echo $langStr['Hit']; ?>
													</a>
												</li>
												<li>
													<a href="<?php echo G5_SHOP_URL; ?>/listtype.php?type=2">
														<?php echo $langStr['Recommended']; ?>
													</a>
												</li>
												<li>
													<a href="<?php echo G5_SHOP_URL; ?>/listtype.php?type=3"><?php echo $langStr['new']; ?></a></li>
												<li>
													<a href="<?php echo G5_SHOP_URL; ?>/listtype.php?type=4"><?php echo $langStr['best']; ?></a></li>
												<li>
													<a href="<?php echo G5_SHOP_URL; ?>/listtype.php?type=5"><?php echo $langStr['sale']; ?></a>
												</li>
												<li class="hd_menu_right">
													<a href="<?php echo G5_BBS_URL; ?>/faq.php">
														<?php echo $langStr['FAQ']; ?>
													</a>
												</li>
												<li class="hd_menu_right">
													<a href="<?php echo G5_BBS_URL; ?>/qalist.php">
														<?php echo $langStr['1by1Contact']; ?>
													</a>
												</li>
												<li class="hd_menu_right">
													<a href="<?php echo G5_SHOP_URL; ?>/personalpay.php">
														<?php echo $langStr['PersonalPayment']; ?>
													</a>
												</li>
												<li class="hd_menu_right">
													<a href="<?php echo G5_SHOP_URL; ?>/itemuselist.php">
														<?php echo $langStr['Reviews']; ?>
													</a>
												</li>
												<li class="hd_menu_right">
													<a href="<?php echo G5_SHOP_URL; ?>/couponzone.php">
														<?php echo $langStr['CouponZone']; ?>
													</a>
												</li>
											</ul>
											<!--Dropdown Menu End-->
										</li>
										<li><a href="<?php echo G5_SHOP_URL.'/search.php' ?>">Shop</a></li>
										<li><a href="blog.html">Blog</a></li>
										<li><a href="about.html">About Us</a></li>
										<li><a href="contact.html">Contact Us</a></li>
										<li><a href="#">Features</a>
											<div class="row mega-menu">
												<div class="col-3">
													<a href="#" class="item-link">Pages</a>
													<ul>
														<li><a href="about-2.html">About Us 02</a></li>
														<li><a href="contact-2.html">Contact 02</a></li>
														<li><a href="service.html">Services</a></li>
														<li><a href="service-2.html">Services 02</a></li>
														<li><a href="faq.html">Frequently Questions</a></li>
														<li><a href="404.html">Error 404</a></li>
													</ul>
												</div>
												<div class="col-3">
													<a href="#" class="item-link">Blog</a>
													<ul>
														<li><a href="blog-nosidebar.html">None Sidebar</a></li>
														<li><a href="blog-left-sidebar.html">Sidebar Left</a></li>
														<li><a href="single-blog.html">Gallery Format</a></li>
														<li><a href="single-blog.html">Audio Format</a></li>
														<li><a href="single-blog.html">Video Format</a></li>
													</ul>
												</div>
												<div class="col-3">
													<a href="#" class="item-link">Shop</a>
													<ul>
														<li><a href="shop-full-width.html">Full Width</a></li>
														<li><a href="shop-right-sidebar.html">Sidebar Right</a></li>
														<li><a href="shop-list.html">List View</a></li>
														<li><a href="single-product.html">Single Product</a></li>
														<li><a href="single-product.html">Variable Product</a></li>
														<li><a href="single-product.html">Simple Product</a></li>
													</ul>
												</div>
												<div class="col-3">
													<a href="#" class="item-link">Portfolio</a>
													<ul>
														<li><a href="portfolio.html">Portfolio</a></li>
														<li><a href="portfolio-three-column.html">Portfolio 3 Columns</a></li>
														<li><a href="portfolio-five-column.html">Portfolio 5 Columns</a></li>
													</ul>
												</div>
											</div>
											<!--Mega Menu Start-->
											<!--
											<ul class="mega-menu">
												<li>
													<a href="#" class="item-link">Pages</a>
													<ul>
														<li><a href="about-2.html">About Us 02</a></li>
														<li><a href="contact-2.html">Contact 02</a></li>
														<li><a href="service.html">Services</a></li>
														<li><a href="service-2.html">Services 02</a></li>
														<li><a href="faq.html">Frequently Questions</a></li>
														<li><a href="404.html">Error 404</a></li>
													</ul>
												</li>
												<li>
													<a href="#" class="item-link">Blog</a>
													<ul>
														<li><a href="blog-nosidebar.html">None Sidebar</a></li>
														<li><a href="blog-left-sidebar.html">Sidebar Left</a></li>
														<li><a href="single-blog.html">Gallery Format</a></li>
														<li><a href="single-blog.html">Audio Format</a></li>
														<li><a href="single-blog.html">Video Format</a></li>
													</ul>
												</li>
												<li>
													<a href="#" class="item-link">Shop</a>
													<ul>
														<li><a href="shop-full-width.html">Full Width</a></li>
														<li><a href="shop-right-sidebar.html">Sidebar Right</a></li>
														<li><a href="shop-list.html">List View</a></li>
														<li><a href="single-product.html">Single Product</a></li>
														<li><a href="single-product.html">Variable Product</a></li>
														<li><a href="single-product.html">Simple Product</a></li>
													</ul>
												</li>
												<li>
													<a href="#" class="item-link">Portfolio</a>
													<ul>
														<li><a href="portfolio.html">Portfolio</a></li>
														<li><a href="portfolio-three-column.html">Portfolio 3 Columns</a></li>
														<li><a href="portfolio-five-column.html">Portfolio 5 Columns</a></li>
													</ul>
												</li>
											</ul>
											-->
											<!--Mega Menu End-->
										</li>
									</ul>
								</nav>
							</div>
							<!--Header Menu End--> 
						</div>
					</div>
					<div class="row">
						<div class="col-12"> 
							<!--Mobile Menu Area Start-->
							<div class="mobile-menu d-lg-none"></div>
							<!--Mobile Menu Area End-->
						</div>
					</div>
				</div>
			</div>
			<!-- END :: Header Bottom Area -->
		</div>
	</header>
	<?php if(defined('_INDEX_')) { ?>
	<!-- BIGIN :: Main Slider -->
	<div class="slider-area mb-90">
		<div class="hero-slider owl-carousel">
			<div class="single-slider" data-no="1">
				<div class="container">
					<div class="slider-content">
						<h5>Sale up to 70% off</h5>
						<h1>2 PIECES BOTTLE GRINDER SET ONLY PRICE <span>$69.95</span></h1>
						<a class="shop-btn" href="#">SHOP NOW</a>
					</div>
				</div>
			</div>
			<div class="single-slider" data-no="2">
				<div class="container">
					<div class="slider-content">
						<h5>Sale up to 70% off</h5>
						<h1>Classical Men’s Hat Collection </h1>
						<a class="shop-btn" href="#">SHOP NOW</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END :: Main Slider -->
	<?php } ?>
<!-- 상단 시작 { -->
<?php /*
<div id="hd">
	<h1 id="hd_h1"><?php echo $g5['title'] ?></h1>

	<div id="skip_to_container"><a href="#container">본문 바로가기</a></div>

	<?php
	if(defined('_INDEX_')) { // index에서만 실행
		include G5_BBS_PATH.'/newwin.inc.php'; // 팝업레이어
	 }
	 ?>
	<!-- 쇼핑몰 배너 시작 { -->
	<?php // echo display_banner('왼쪽'); ?>
	<!-- } 쇼핑몰 배너 끝 -->
	<div id="hd_menu">
		<ul>
			<li><a href="<?php echo G5_SHOP_URL; ?>/listtype.php?type=1">히트상품</a></li>
			<li><a href="<?php echo G5_SHOP_URL; ?>/listtype.php?type=2">추천상품</a></li>
			<li><a href="<?php echo G5_SHOP_URL; ?>/listtype.php?type=3">최신상품</a></li>
			<li><a href="<?php echo G5_SHOP_URL; ?>/listtype.php?type=4">인기상품</a></li>
			<li><a href="<?php echo G5_SHOP_URL; ?>/listtype.php?type=5">할인상품</a></li>
			<li class="hd_menu_right"><a href="<?php echo G5_BBS_URL; ?>/faq.php">FAQ</a></li>
			<li class="hd_menu_right"><a href="<?php echo G5_BBS_URL; ?>/qalist.php">1:1문의</a></li>
			<li class="hd_menu_right"><a href="<?php echo G5_SHOP_URL; ?>/personalpay.php">개인결제</a></li>
			<li class="hd_menu_right"><a href="<?php echo G5_SHOP_URL; ?>/itemuselist.php">사용후기</a></li>
			<li class="hd_menu_right"><a href="<?php echo G5_SHOP_URL; ?>/couponzone.php">쿠폰존</a></li>

		</ul>
	</div>
</div>
*/ ?>
<!-- } 상단 끝 -->
<div id="side_menu">
	<button type="button" id="btn_sidemenu" class="btn_sidemenu_cl"><i class="fa fa-outdent" aria-hidden="true"></i><span class="sound_only">사이드메뉴버튼</span></button>
	<div class="side_menu_wr">
		<?php echo outlogin('theme/shop_basic'); // 아웃로그인 ?>
		<div class="side_menu_shop">
			<button type="button" class="btn_side_shop">오늘본상품<span class="count"><?php echo get_view_today_items_count(); ?></span></button>
			<?php include(G5_SHOP_SKIN_PATH.'/boxtodayview.skin.php'); // 오늘 본 상품 ?>
			<button type="button" class="btn_side_shop">장바구니<span class="count"><?php echo get_boxcart_datas_count(); ?></span></button>
			<?php include_once(G5_SHOP_SKIN_PATH.'/boxcart.skin.php'); // 장바구니 ?>
			<button type="button" class="btn_side_shop">위시리스트<span class="count"><?php echo get_wishlist_datas_count(); ?></span></button>
			<?php include_once(G5_SHOP_SKIN_PATH.'/boxwish.skin.php'); // 위시리스트 ?>
		</div>
		<?php include_once(G5_SHOP_SKIN_PATH.'/boxcommunity.skin.php'); // 커뮤니티 ?>

	</div>
</div>


<script>
$(function (){

	$(".btn_sidemenu_cl").on("click", function() {
		$(".side_menu_wr").toggle();
		$(".fa-outdent").toggleClass("fa-indent")
	});

	$(".btn_side_shop").on("click", function() {
		$(this).next(".op_area").slideToggle(300).siblings(".op_area").slideUp();
	});
});
</script>


<!-- <div id="wrapper"> -->
	<?php /* cate menus
	<div id="aside">
		<?php include_once(G5_SHOP_SKIN_PATH.'/boxcategory.skin.php'); // 상품분류 ?>
		<?php include_once(G5_THEME_SHOP_PATH.'/category.php'); // 분류 ?>
		<?php if($default['de_type4_list_use']) { ?>
		<!-- 인기상품 시작 { -->
		<section class="sale_prd">
			<h2><a href="<?php echo G5_SHOP_URL; ?>/listtype.php?type=4">인기상품</a></h2>
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

		<!-- 커뮤니티 최신글 시작 { -->
		<section id="sidx_lat">
			<h2>커뮤니티 최신글</h2>
			<?php echo latest('theme/shop_basic', 'notice', 5, 30); ?>
		</section>
		<!-- } 커뮤니티 최신글 끝 -->

		<?php echo poll('theme/shop_basic'); // 설문조사 ?>

		<?php echo visit('theme/shop_basic'); // 접속자 ?>
	</div>
	*/ ?>


	<!-- 콘텐츠 시작 { -->
	<!-- <div id="container"> -->
		<?php /*
		<?php if ((!$bo_table || $w == 's' ) && !defined('_INDEX_')) { ?><div id="wrapper_title"><?php echo $g5['title'] ?></div><?php } ?>
		<!-- 글자크기 조정 display:none 되어 있음 시작 { -->
		<div id="text_size">
			<button class="no_text_resize" onclick="font_resize('container', 'decrease');">작게</button>
			<button class="no_text_resize" onclick="font_default('container');">기본</button>
			<button class="no_text_resize" onclick="font_resize('container', 'increase');">크게</button>
		</div>
		*/ ?>
		<!-- } 글자크기 조정 display:none 되어 있음 끝 -->