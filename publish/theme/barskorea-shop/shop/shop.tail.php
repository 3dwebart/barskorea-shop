<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
	include_once(G5_THEME_MSHOP_PATH.'/shop.tail.php');
	return;
}

$admin = get_admin("super");

// 사용자 화면 우측과 하단을 담당하는 페이지입니다.
// 우측, 하단 화면을 꾸미려면 이 파일을 수정합니다.
?>

	<!-- </div> -->
	<!-- } 콘텐츠 끝 -->
<!-- </div> -->

<!-- 하단 시작 { -->
<!--Brand Area Start-->
<div class="brand-area">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="brand-active owl-carousel">
					<!--Single Brand Start-->
					<div class="single-brand">
					  <a href="#"><img src="<?php echo G5_ASSETS_URL; ?>/img/brand/brand1.png" alt=""></a>
					</div>
					<!--Single Brand End-->
					<!--Single Brand Start-->
					<div class="single-brand">
					  <a href="#"><img src="<?php echo G5_ASSETS_URL; ?>/img/brand/brand2.png" alt=""></a>
					</div>
					<!--Single Brand End-->
					<!--Single Brand Start-->
					<div class="single-brand">
					  <a href="#"><img src="<?php echo G5_ASSETS_URL; ?>/img/brand/brand3.png" alt=""></a>
					</div>
					<!--Single Brand End-->
					<!--Single Brand Start-->
					<div class="single-brand">
					  <a href="#"><img src="<?php echo G5_ASSETS_URL; ?>/img/brand/brand4.png" alt=""></a>
					</div>
					<!--Single Brand End-->
					<!--Single Brand Start-->
					<div class="single-brand">
					  <a href="#"><img src="<?php echo G5_ASSETS_URL; ?>/img/brand/brand5.png" alt=""></a>
					</div>
					<!--Single Brand End-->
					<!--Single Brand Start-->
					<div class="single-brand">
					  <a href="#"><img src="<?php echo G5_ASSETS_URL; ?>/img/brand/brand3.png" alt=""></a>
					</div>
					<!--Single Brand End-->
					<!--Single Brand Start-->
					<div class="single-brand">
					  <a href="#"><img src="<?php echo G5_ASSETS_URL; ?>/img/brand/brand4.png" alt=""></a>
					</div>
					<!--Single Brand End-->
					<!--Single Brand Start-->
					<div class="single-brand">
					  <a href="#"><img src="<?php echo G5_ASSETS_URL; ?>/img/brand/brand5.png" alt=""></a>
					</div>
					<!--Single Brand End-->
				</div>
			</div>
		</div>
	</div>
</div>
<!--Brand Area End-->
<!-- BIGIN :: Footer Area -->
<footer>
	<div class="footer-container">
		<!--Footer Top Area Start-->
		<div class="footer-top-area black-bg pt-85 pb-50">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-6 col-12">
						<!--Single Footer Widget Start-->
						<div class="single-footer-widget mb-35">
							<div class="footer-title">
								<h3>Shop Location</h3>
							</div>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dignissim erat ut laoreet pharetra....</p>
							<div class="contact-info">
								<ul>
									<li><i class="fa fa-home"></i> No. 96, Jecica City, NJ 07305, New York, USA</li>
									<li><i class="fa fa-phone"></i> <a href="#"> +1 222 3333</a></li>
									<li><i class="fa fa-envelope-o"></i> <a href="#"> info@example.com</a></li>
								</ul>
							</div>
						</div>
						<!--Single Footer Widget End-->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!--Single Footer Widget Start-->
						<div class="single-footer-widget mb-35">
							<div class="footer-title">
								<h3>Demo Links</h3>
							</div>
							<ul class="link-widget">
								<li><a href="#">About Us</a></li>
								<li><a href="#">Our Office</a></li>
								<li><a href="#">Delivery</a></li>
								<li><a href="#">Our Store</a></li>
								<li><a href="#">Guarantee</a></li>
								<li><a href="#">Buy Gift Card</a></li>
								<li><a href="#">Return Policy</a></li>
							</ul>
						</div>
						<!--Single Footer Widget End-->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!--Single Footer Widget Start-->
						<div class="single-footer-widget mb-35">
							<div class="footer-title">
								<h3>More Links</h3>
								<ul class="link-widget">
								<li><a href="#">Tracking Your Order</a></li>
								<li><a href="#">Terms & Condition</a></li>
								<li><a href="#">Contact us</a></li>
								<li><a href="#">Manufactureres</a></li>
								<li><a href="#">New Brands</a></li>
								<li><a href="#">News & Blog</a></li>
								<li><a href="#">Trending Products</a></li>
							</ul>
							</div>
						</div>
						<!--Single Footer Widget End-->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!--Single Footer Widget Start-->
						<div class="single-footer-widget mb-35">
							<div class="footer-title">
								<h3>Newsletter</h3>
							</div>
							<div class="footer-mailchimp">
								<form action="<?php echo G5_URL; ?>/newsletter_apply.php" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="popup-subscribe-form validate" novalidate>
									<?php $url = G5_URL . $_SERVER['REQUEST_URI']; ?>
									<input type="hidden" name="url" value="<?php echo $url; ?>">
								   <div id="mc_embed_signup_scroll">
									  <div id="mc-form" class="mc-form subscribe-form" >
										<input id="mc-email" name="email" type="email" autocomplete="off" placeholder="Enter your email here" />
										<span class="icon"><i class="fa fa-angle-right"></i></span>
										<button type="submit" id="mc-submit">Subscribe</button>
									  </div>
								   </div>
							   </form>
							</div> 
							<div class="footer-title">
								<h3>Stay Connected</h3>
							</div>
							<ul class="social-icons">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-rss"></i></a></li>
							</ul>
						</div>
						<!--Single Footer Widget End-->
					</div>
				</div>
			</div>
		</div> 
		<!--Footer Top Area End--> 
		<!--Footer Middle Area Start--> 
		<div class="footer-middle-area black-bg">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="footer-payments-image">
							<img src="<?php echo G5_ASSETS_URL; ?>/img/payment/payment-icon.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--Footer Middle Area End--> 
		<!--Footer Bottom Area Start-->
		<div class="footer-bottom-area">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="footer-copyright">
							<p>Copyright &copy; <a href="#">ANADI.</a> All Rights Reserved</p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="footer-design-by text-right">
							<p>Designed by HasTech.company</p>
						</div>
					</div>
				</div>
			</div>
		</div> 
		<!--Footer Bottom Area End--> 
	</div>
</footer>
<!-- END :: Footer Area -->
<!-- Modal Area Strat -->
<div class="modal fade" id="open-modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<!--Modal Img-->
					<div class="col-md-5">
						<!--Modal Tab Content Start-->
						<div class="tab-content product-details-large" id="myTabContent">
							<div class="tab-pane fade show active" id="single-slide1" role="tabpanel" aria-labelledby="single-slide-tab-1">
								<!--Single Product Image Start-->
								<div class="single-product-img img-full">
									<img src="img/single-product/single-product1.jpg" alt="">
								</div>
								<!--Single Product Image End-->
							</div>
							<div class="tab-pane fade" id="single-slide2" role="tabpanel" aria-labelledby="single-slide-tab-2">
								<!--Single Product Image Start-->
								<div class="single-product-img img-full">
									<img src="img/single-product/single-product2.jpg" alt="">
								</div>
								<!--Single Product Image End-->
							</div>
							<div class="tab-pane fade" id="single-slide3" role="tabpanel" aria-labelledby="single-slide-tab-3">
								<!--Single Product Image Start-->
								<div class="single-product-img img-full">
									<img src="img/single-product/single-product3.jpg" alt="">
								</div>
								<!--Single Product Image End-->
							</div>
							<div class="tab-pane fade" id="single-slide4" role="tabpanel" aria-labelledby="single-slide-tab-4">
								<!--Single Product Image Start-->
								<div class="single-product-img img-full">
									<img src="img/single-product/single-product4.jpg" alt="">
								</div>
								<!--Single Product Image End-->
							</div>
							<div class="tab-pane fade" id="single-slide5" role="tabpanel" aria-labelledby="single-slide-tab-4">
								<!--Single Product Image Start-->
								<div class="single-product-img img-full">
									<img src="img/single-product/single-product5.jpg" alt="">
								</div>
								<!--Single Product Image End-->
							</div>
							<div class="tab-pane fade" id="single-slide6" role="tabpanel" aria-labelledby="single-slide-tab-4">
								<!--Single Product Image Start-->
								<div class="single-product-img img-full">
									<img src="img/single-product/single-product6.jpg" alt="">
								</div>
								<!--Single Product Image End-->
							</div>
						</div>
						<!--Modal Content End-->
						<!--Modal Tab Menu Start-->
						<div class="single-product-menu">
							<div class="nav single-slide-menu owl-carousel" role="tablist">
								<div class="single-tab-menu img-full">
									<a class="active" data-toggle="tab" id="single-slide-tab-1" href="#single-slide1"><img src="img/single-product/small/single-product1.jpg" alt=""></a>
								</div>
								<div class="single-tab-menu img-full">
									<a data-toggle="tab" id="single-slide-tab-2" href="#single-slide2"><img src="img/single-product/small/single-product2.jpg" alt=""></a>
								</div>
								<div class="single-tab-menu img-full">
									<a data-toggle="tab" id="single-slide-tab-3" href="#single-slide3"><img src="img/single-product/small/single-product3.jpg" alt=""></a>
								</div>
								<div class="single-tab-menu img-full">
									<a data-toggle="tab" id="single-slide-tab-4" href="#single-slide4"><img src="img/single-product/small/single-product4.jpg" alt=""></a>
								</div>
								<div class="single-tab-menu img-full">
									<a data-toggle="tab" id="single-slide-tab-5" href="#single-slide5"><img src="img/single-product/small/single-product5.jpg" alt=""></a>
								</div>
								<div class="single-tab-menu img-full">
									<a data-toggle="tab" id="single-slide-tab-6" href="#single-slide6"><img src="img/single-product/small/single-product6.jpg" alt=""></a>
								</div>
							</div>
						</div>
						<!--Modal Tab Menu End-->
					</div>
					<!--Modal Img-->
					<!--Modal Content-->
					<div class="col-md-7">
						<div class="modal-product-info">
							<h1>Sit voluptatem</h1>
							<div class="modal-product-price">
							   <span class="old-price">$74.00</span>
							   <span class="new-price">$69.00</span>
						   </div>
						   <a href="single-product.html" class="see-all">See all features</a>
						   <div class="add-to-cart quantity">
								<form class="add-quantity" action="#">
									 <div class="modal-quantity">
										 <input type="number" value="1">
									 </div>
									<div class="add-to-link">
										<button class="form-button" data-text="add to cart">add to cart</button>
									</div>
								</form>
						   </div>
						   <div class="cart-description">
							   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco,Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus.</p>
						   </div>
							<div class="social-share">
							   <h3>Share this product</h3>
							   <ul class="socil-icon2">
								   <li><a href=""><i class="fa fa-facebook"></i></a></li>
								   <li><a href=""><i class="fa fa-twitter"></i></a></li>
								   <li><a href=""><i class="fa fa-pinterest"></i></a></li>
								   <li><a href=""><i class="fa fa-google-plus"></i></a></li>
								   <li><a href=""><i class="fa fa-linkedin"></i></a></li>
							   </ul>
							</div>
						</div>
					</div>
					<!--Modal Content-->
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal Area End -->
<?php
	/*
	<div id="ft">
		<div class="ft_wr">
			<ul class="ft_ul">
				<li><a href="<?php echo G5_BBS_URL; ?>/content.php?co_id=company">회사소개</a></li>
				<li><a href="<?php echo G5_BBS_URL; ?>/content.php?co_id=provision">서비스이용약관</a></li>
				<li><a href="<?php echo G5_BBS_URL; ?>/content.php?co_id=privacy">개인정보처리방침</a></li>
				<li><a href="<?php echo get_device_change_url(); ?>">모바일버전</a></li>
			</ul>
			
			<a href="<?php echo G5_SHOP_URL; ?>/" id="ft_logo"><img src="<?php echo G5_DATA_URL; ?>/common/logo_img2" alt="처음으로"></a>

			<div class="ft_info">
				<span><b>회사명</b> <?php echo $default['de_admin_company_name']; ?></span>
				<span><b>주소</b> <?php echo $default['de_admin_company_addr']; ?></span><br>
				<span><b>사업자 등록번호</b> <?php echo $default['de_admin_company_saupja_no']; ?></span>
				<span><b>대표</b> <?php echo $default['de_admin_company_owner']; ?></span>
				<span><b>전화</b> <?php echo $default['de_admin_company_tel']; ?></span>
				<span><b>팩스</b> <?php echo $default['de_admin_company_fax']; ?></span><br>
				<!-- <span><b>운영자</b> <?php echo $admin['mb_name']; ?></span><br> -->
				<span><b>통신판매업신고번호</b> <?php echo $default['de_admin_tongsin_no']; ?></span>
				<span><b>개인정보 보호책임자</b> <?php echo $default['de_admin_info_name']; ?></span>

				<?php if ($default['de_admin_buga_no']) echo '<span><b>부가통신사업신고번호</b> '.$default['de_admin_buga_no'].'</span>'; ?><br>
				Copyright &copy; 2001-2013 <?php echo $default['de_admin_company_name']; ?>. All Rights Reserved.
			</div>

			<div class="ft_cs">
				<h2>고객센터</h2>
				<strong>02-123-1234</strong>
				<p>월-금 am 9:00 - pm 05:00<br>점심시간 : am 12:00 - pm 01:00</p>
			</div>
			<button type="button" id="top_btn"><i class="fa fa-arrow-up" aria-hidden="true"></i><span class="sound_only">상단으로</span></button>
			<script>
			
			$(function() {
				$("#top_btn").on("click", function() {
					$("html, body").animate({scrollTop:0}, '500');
					return false;
				});
			});
			</script>
		</div>
	</div>
	*/
?>
<!-- } 하단 끝 -->
<?php
$sec = get_microtime() - $begin_time;
$file = $_SERVER['SCRIPT_NAME'];

if ($config['cf_analytics']) {
	echo $config['cf_analytics'];
}
?>
</div>
<!-- END :: wrapper -->
<script src="<?php echo G5_JS_URL; ?>/sns.js"></script>
<?php
include_once(G5_THEME_PATH.'/tail.sub.php');
?>
