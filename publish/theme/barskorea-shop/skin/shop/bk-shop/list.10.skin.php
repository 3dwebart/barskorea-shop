<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.G5_SHOP_SKIN_URL.'/style.css">', 0);

error_reporting(E_ALL);

ini_set("display_errors", 1);

?>
<!--Shop Product Start-->
<div class="shop-product">
	<div id="myTabContent-2" class="tab-content">
		<div id="grid" class="tab-pane fade show active">
			<div class="product-grid-view">
				<div class="row">
					<!-- 상품진열 10 시작 { -->
					<?php
						for ($i=1; $row=sql_fetch_array($result); $i++) {
							echo "<div class=\"col-lg-4 col-xl-3 col-md-4\">\n";
							echo "<div class=\"single-product mb-40\">\n";
							/*
							if ($this->list_mod >= 2) { // 1줄 이미지 : 2개 이상
								if ($i%$this->list_mod == 0) $sct_last = 'sct_last'; // 줄 마지막
								else if ($i%$this->list_mod == 1) $sct_last = 'sct_clear'; // 줄 첫번째
								else $sct_last = '';
							} else { // 1줄 이미지 : 1개
								$sct_last = 'sct_clear';
							}
							*/

							echo "<div class=\"product-img\">\n";
							// BIGIN :: Image
							if ($this->href) {
								echo "<a href=\"{$this->href}{$row['it_id']}\">\n";
							}
							if ($this->view_it_img) {
								echo get_it_image_responsive($row['it_id'], $this->img_width, $this->img_height, '', '', stripslashes($row['it_name']))."\n";
							}
							if ($this->href) {
								echo "</a>\n";
							}
							// END Image
							// BIGIN Ribon
							echo "<span class=\"onsale\">\n";
							echo "<span>Sale!</span>\n";
							echo "</span>\n";
							// END :: Ribon
							// BIGIN :: Product hover action button
							echo "<div class=\"product-action\">\n";
							// Buttons
							echo "<ul>\n";
							echo "<li>\n";
							echo "<a href=\"#\" class=\"btn-list-cart btn-quick-view\" data-toggle=\"tooltip\" title=\"Add To Cart\">\n";
							echo "<i class=\"fa fa-shopping-cart\"></i>";
							echo "</a>\n";
							echo "</li>\n";
							echo "<li>\n";
							echo "<a href=\"#\" data-toggle=\"tooltip\" title=\"Add To Wishlist\">\n";
							echo "<i class=\"fa fa-heart-o\"></i>";
							echo "</a>\n";
							echo "</li>\n";
							echo "<li>\n";
							echo "<a href=\"#\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Compare\">\n";
							echo "<i class=\"fa fa-refresh\"></i>\n";
							echo "</a>\n";
							echo "</li>\n";
							echo "</ul>\n";
							echo "<div class=\"quickviewbtn\">\n";
							echo "<a href=\"#open-modal\" data-toggle=\"modal\" title=\"Quick view\">\n";
							echo "<i class=\"fa fa-search\"></i>\n";
							echo "Quick View\n";
							echo "</a>\n";
							echo "</div>\n";
							echo "</div>\n";
							// END  :: Product hover action button
							echo "</div>\n"; // END product-img
							// BIGIN :: product-content
							echo "<div class=\"product-content\">\n";
							echo "<h4>\n";
							if ($this->href) {
								echo "<a href=\"{$this->href}{$row['it_id']}\">\n";
							}
							if ($this->view_it_name) {
								echo stripslashes($row['it_name'])."\n";
							}

							if ($this->href) {
								echo "</a>\n";
							}
							echo "</h4>\n";
							echo "<div class=\"product-reviews\">\n";
							echo "<i class=\"fa fa-star\"></i>\n";
							echo "<i class=\"fa fa-star\"></i>\n";
							echo "<i class=\"fa fa-star\"></i>\n";
							echo "<i class=\"fa fa-star\"></i>\n";
							echo "<i class=\"fa fa-star-o\"></i>\n";
							echo "</div>\n";
							echo "</div>\n";
							// END :: product-content
							// BIGIN :: product-price
							if ($this->view_it_cust_price || $this->view_it_price) {
								echo "<div class=\"product-price\">\n";

								if ($this->view_it_price) {
									echo "<span class=\"price\">".display_price(get_price($row), $row['it_tel_inq'])."</span>\n";
								}

								if ($this->view_it_cust_price && $row['it_cust_price']) {
									echo "<span class=\"regular-price\">".display_price($row['it_cust_price'])."</span>\n";
								}

								echo "</div>\n";
							}
							// END :: product-price
							/*
							if ($this->view_sns) {
								$sns_top = $this->img_height + 10;
								$sns_url  = G5_SHOP_URL.'/item.php?it_id='.$row['it_id'];
								$sns_title = get_text($row['it_name']).' | '.get_text($config['cf_title']);
								echo "<div class=\"sct_sns\">";
								echo get_sns_share_link('facebook', $sns_url, $sns_title, G5_SHOP_SKIN_URL.'/img/facebook.png');
								echo get_sns_share_link('twitter', $sns_url, $sns_title, G5_SHOP_SKIN_URL.'/img/twitter.png');
								echo get_sns_share_link('googleplus', $sns_url, $sns_title, G5_SHOP_SKIN_URL.'/img/gplus.png');
								echo "</div>\n";
							}
							*/
							echo "</div>\n";
							echo "</div>\n";
						} // END for
					?>
					<!-- } 상품진열 10 끝 -->
				</div>
			</div>
		</div>
	</div>
</div>
