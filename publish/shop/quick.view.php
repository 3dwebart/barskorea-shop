<?php
include_once('./_common.php');
error_reporting(E_ALL);

ini_set("display_errors", 1);

include_once(G5_LIB_PATH.'/shop.lib.php');
include_once(G5_LIB_PATH.'/json.lib.php');
include_once(G5_LIB_PATH.'/iteminfo.lib.php');
include_once(G5_SHOP_PATH.'/settle_naverpay.inc.php');
$it_id = $_POST['it_id'];
$sql = "SELECT 
			a.it_id, a.ca_id, a.ca_id2, a.ca_id3, 
			a.it_skin, a.it_mobile_skin, a.it_name, a.it_maker, 
			a.it_origin, a.it_brand, a.it_model, a.it_option_subject, a.it_supply_subject, 
			a.it_type1, a.it_type2, a.it_type3, a.it_type4, a.it_type5, 
			a.it_basic, a.it_explan, a.it_explan2, a.it_mobile_explan, 
			a.it_cust_price, a.it_price, a.it_point, a.it_point_type, 
			a.it_supply_point, a.it_notax, a.it_sell_email, a.it_use, 
			a.it_nocoupon, a.it_soldout, a.it_stock_qty, a.it_stock_sms, a.it_noti_qty, 
			a.it_sc_type, a.it_sc_method, a.it_sc_price, a.it_sc_minimum, 
			a.it_sc_qty, a.it_buy_min_qty, a.it_buy_max_qty, 
			a.it_head_html, a.it_tail_html, a.it_mobile_head_html, a.it_mobile_tail_html, 
			a.it_hit, a.it_time, a.it_update_time, 
			a.it_ip, a.it_order, a.it_tel_inq , a.it_info_gubun, a.it_info_value, a.it_sum_qty, a.it_use_cnt, 
			a.it_use_avg, a.it_shop_memo, a.ec_mall_pid, 
			a.it_img1, a.it_img2, a.it_img3, a.it_img4, a.it_img5, a.it_img6, a.it_img7, a.it_img8, a.it_img9, a.it_img10, 
			a.it_1_subj, a.it_2_subj, a.it_3_subj, a.it_4_subj, a.it_5_subj, a.it_6_subj, a.it_7_subj, a.it_8_subj, a.it_9_subj, a.it_10_subj, 
			a.it_1, a.it_2, a.it_3, a.it_4, a.it_5, a.it_6, a.it_7, a.it_8, a.it_9, a.it_10,
			b.ca_name, b.ca_use
		FROM {$g5['g5_shop_item_table']} a, {$g5['g5_shop_category_table']} b
		WHERE a.it_id = '{$it_id}' AND a.ca_id = b.ca_id";
$item = sql_fetch($sql);

for ($i=1; $i < 11; $i++) {
	if(!empty($item['it_img'.$i])) {
		$imgs[] = $item['it_img'.$i];
	}
}

$option_item = get_item_options($item['it_id'], $item['it_option_subject'], 'div');
$supply_item = get_item_supply($item['it_id'], $item['it_supply_subject'], 'div');

// 상품품절체크
if(G5_SOLDOUT_CHECK) {
    $is_soldout = is_soldout($item['it_id']);
}

// 주문가능체크
$is_orderable = true;
if(!$item['it_use'] || $item['it_tel_inq'] || $is_soldout) {
    $is_orderable = false;
}
?>
<style>
.magnific-popup-wrap {
	margin: 5% auto;
    min-height: 300px;
    width: 1024px;
    max-width: 100%;
}
.magnific-popup-content {
	padding: 20px;
	background-color: #fff;
}
</style>
<script src="<?php echo G5_JS_URL ?>/shop.js"></script>
<script id="shop_override" src="<?php echo G5_JS_URL ?>/shop.override.js"></script>
<div class="magnific-popup-wrap">
	<div class="magnific-popup-content">
		<div class="row">
			<!--Modal Img-->
			<div class="col-md-5">
				<!--Modal Tab Content Start-->
				<div class="tab-content product-details-large" id="myTabContent">
					<div class="tab-pane fade show active" id="single-slide1" role="tabpanel" aria-labelledby="single-slide-tab-1">
						<!--Single Product Image Start-->
						<div class="single-product-img img-full">
							<img src="<?php echo G5_ASSETS_URL; ?>/img/single-product/single-product1.jpg" alt="">
						</div>
						<!--Single Product Image End-->
					</div>
					<div class="tab-pane fade" id="single-slide2" role="tabpanel" aria-labelledby="single-slide-tab-2">
						<!--Single Product Image Start-->
						<div class="single-product-img img-full">
							<img src="<?php echo G5_ASSETS_URL; ?>/img/single-product/single-product2.jpg" alt="">
						</div>
						<!--Single Product Image End-->
					</div>
					<div class="tab-pane fade" id="single-slide3" role="tabpanel" aria-labelledby="single-slide-tab-3">
						<!--Single Product Image Start-->
						<div class="single-product-img img-full">
							<img src="<?php echo G5_ASSETS_URL; ?>/img/single-product/single-product3.jpg" alt="">
						</div>
						<!--Single Product Image End-->
					</div>
					<div class="tab-pane fade" id="single-slide4" role="tabpanel" aria-labelledby="single-slide-tab-4">
						<!--Single Product Image Start-->
						<div class="single-product-img img-full">
							<img src="<?php echo G5_ASSETS_URL; ?>/img/single-product/single-product4.jpg" alt="">
						</div>
						<!--Single Product Image End-->
					</div>
					<div class="tab-pane fade" id="single-slide5" role="tabpanel" aria-labelledby="single-slide-tab-4">
						<!--Single Product Image Start-->
						<div class="single-product-img img-full">
							<img src="<?php echo G5_ASSETS_URL; ?>/img/single-product/single-product5.jpg" alt="">
						</div>
						<!--Single Product Image End-->
					</div>
					<div class="tab-pane fade" id="single-slide6" role="tabpanel" aria-labelledby="single-slide-tab-4">
						<!--Single Product Image Start-->
						<div class="single-product-img img-full">
							<img src="<?php echo G5_ASSETS_URL; ?>/img/single-product/single-product6.jpg" alt="">
						</div>
						<!--Single Product Image End-->
					</div>

					<div class="tab-pane fade" id="single-slide7" role="tabpanel" aria-labelledby="single-slide-tab-2">
						<!--Single Product Image Start-->
						<div class="single-product-img img-full">
							<img src="<?php echo G5_ASSETS_URL; ?>/img/single-product/single-product2.jpg" alt="">
						</div>
						<!--Single Product Image End-->
					</div>
					<div class="tab-pane fade" id="single-slide8" role="tabpanel" aria-labelledby="single-slide-tab-4">
						<!--Single Product Image Start-->
						<div class="single-product-img img-full">
							<img src="<?php echo G5_ASSETS_URL; ?>/img/single-product/single-product5.jpg" alt="">
						</div>
						<!--Single Product Image End-->
					</div>
				</div>
				<!--Modal Content End-->
				<!--Modal Tab Menu Start-->
				<div class="single-product-menu">
					<div class="nav single-slide-menu owl-carousel" role="tablist">
						<div class="single-tab-menu img-full">
							<a class="active" data-toggle="tab" id="single-slide-tab-1" href="#single-slide1"><img src="<?php echo G5_ASSETS_URL; ?>/img/single-product/small/single-product1.jpg" alt=""></a>
						</div>
						<div class="single-tab-menu img-full">
							<a data-toggle="tab" id="single-slide-tab-2" href="#single-slide2"><img src="<?php echo G5_ASSETS_URL; ?>/img/single-product/small/single-product2.jpg" alt=""></a>
						</div>
						<div class="single-tab-menu img-full">
							<a data-toggle="tab" id="single-slide-tab-3" href="#single-slide3"><img src="<?php echo G5_ASSETS_URL; ?>/img/single-product/small/single-product3.jpg" alt=""></a>
						</div>
						<div class="single-tab-menu img-full">
							<a data-toggle="tab" id="single-slide-tab-4" href="#single-slide4"><img src="<?php echo G5_ASSETS_URL; ?>/img/single-product/small/single-product4.jpg" alt=""></a>
						</div>
						<div class="single-tab-menu img-full">
							<a data-toggle="tab" id="single-slide-tab-5" href="#single-slide5"><img src="<?php echo G5_ASSETS_URL; ?>/img/single-product/small/single-product5.jpg" alt=""></a>
						</div>
						<div class="single-tab-menu img-full">
							<a data-toggle="tab" id="single-slide-tab-6" href="#single-slide6"><img src="<?php echo G5_ASSETS_URL; ?>/img/single-product/small/single-product6.jpg" alt=""></a>
						</div>

						<div class="single-tab-menu img-full">
							<a data-toggle="tab" id="single-slide-tab-7" href="#single-slide7"><img src="<?php echo G5_ASSETS_URL; ?>/img/single-product/small/single-product2.jpg" alt=""></a>
						</div>
						<div class="single-tab-menu img-full">
							<a data-toggle="tab" id="single-slide-tab-8" href="#single-slide8"><img src="<?php echo G5_ASSETS_URL; ?>/img/single-product/small/single-product5.jpg" alt=""></a>
						</div>
					</div>
				</div>
				<!--Modal Tab Menu End-->
			</div>
			<!--Modal Img-->
			<!--Modal Content-->
			<div class="col-md-7 2017_renewal_itemform">
				<form name="fitem" method="post" action="<?php echo $action_url; ?>" onsubmit="return fitem_list_submit(this);" id="fitem">
					<input type="hidden" name="it_id[]" value="<?php echo $it_id; ?>">
					<input type="hidden" name="sw_direct">
					<input type="hidden" name="url">
					<input type="hidden" id="it_price" value="<?php echo $item['it_price']; ?>">
					<input type="hidden" id="it_buy_min_qty" value="<?php echo $item['it_buy_min_qty']; ?>">
					<input type="hidden" id="it_buy_max_qty" value="<?php echo $item['it_buy_max_qty']; ?>">
					<div class="modal-product-info">
						<?php
							/* BIGIN :: Specifying Variables */
							$is_score = 0;
							$is_score_sum = 0;
							$cust_price = '';
							/* END :: Specifying Variables */
							/* BIGIN :: Number of product reviews */
							$sql = "SELECT count(it_id) AS cnt FROM {$g5['g5_shop_item_use_table']} WHERE it_id = '$it_id'";
							$row = sql_fetch($sql);
							$cnt = $row['cnt'];
							if($cnt == 0) {
								$reviewCnt = '(There are no customer reviews yet.)';
							} else {
								$reviewCnt = '(' . $cnt . ' customer review)';
							}
							/* END :: Number of product reviews */
							$sql2 = "SELECT is_score FROM {$g5['g5_shop_item_use_table']} WHERE it_id = '$it_id'";
							$res2 = sql_query($sql2);
							while ($row2 = sql_fetch_array($res2)) {
								$is_score_sum += $row2['is_score'];
							}
							if($cnt > 0) {
								$is_score = ceil($is_score_sum / $cnt);
							}

							if($is_score < 1) {
								$star1 = '-o';
							} else {
								$star1 = '';
							}

							if($is_score < 2) {
								$star2 = '-o';
							} else {
								$star2 = '';
							}

							if($is_score < 3) {
								$star3 = '-o';
							} else {
								$star3 = '';
							}

							if($is_score < 4) {
								$star4 = '-o';
							} else {
								$star4 = '';
							}

							if($is_score < 5) {
								$star5 = '-o';
							} else {
								$star5 = '';
							}

							if (!$item['it_use']) { // 판매가능이 아닐 경우
								$price_str1 = "";
								$price_str2 = "판매중지";
							} else if ($item['it_tel_inq']) { // 전화문의일 경우
								$price_str1 = "";
								$price_str2 = "전화문의";
							} else { // 전화문의가 아닐 경우
								if ($item['it_cust_price']) {
									$cust_price = "&#8361;" . number_format($item['it_cust_price']);
								}
								/*
								시중가격 Original code : 
								echo display_price($item['it_cust_price']);
								판매가격 Original code :
								echo display_price(get_price($item));
								*/
							}
							$price = "&#8361;" . number_format($item['it_price']);
						?>
						<h1 class="subject"><?php echo $item['it_name']; ?></h1>
						<div class="modal-product-price">
							<span class="old-price"><?php echo $cust_price; ?></span>
							<span class="new-price"><?php echo $price; ?></span>
						</div>
						<?php if(!empty($item['it_basic'])) { ?>
						<div class="it_basic">
							<p>
								<?php echo $item['it_basic']; ?>
							</p>
						</div>
						<?php } ?>
						<!-- BIGIN :: Point -->
						<?php if ($config['cf_use_point']) { // 포인트 사용한다면 ?>
						<div class="row-3 point">
							<div class="col-6 col-md-5 col-lg-4">
								<strong>포인트</strong>
							</div>
							<div class="col-6 col-md-7 col-lg-8">
								<?php
								if($item['it_point_type'] == 2) {
									echo '구매금액(추가옵션 제외)의 '.$item['it_point'].'%';
								} else {
									$it_point = get_item_point($item);
									echo number_format($it_point).'점';
								}
								?>
							</div>
						</div>
						<?php } ?>
						<!-- END :: Point -->
						<!-- BIGIN :: Maker -->
						<?php if ($item['it_maker']) { ?>
						<div class="row-3 maker">
							<div class="col-6 col-md-5 col-lg-4">
								<strong>제조사</strong>
							</div>
							<div class="col-6 col-md-7 col-lg-8"><?php echo $item['it_maker']; ?></div>
						</div>
						<?php } ?>
						<!-- END :: Maker -->
						<!-- BIGIN :: Origin -->
						<?php if ($item['it_origin']) { ?>
						<div class="row-3 origin">
							<div class="col-6 col-md-5 col-lg-4">
								<strong>원산지</strong>
							</div>
							<div class="col-6 col-md-7 col-lg-8"><?php echo $item['it_origin']; ?></div>
						</div>
						<?php } ?>
						<!-- END :: Origin -->
						<!-- BIGIN :: Braand -->
						<?php if ($item['it_brand']) { ?>
						<div class="row-3 brand">
							<div class="col-6 col-md-5 col-lg-4">
								<strong>브랜드</strong>
							</div>
							<div class="col-6 col-md-7 col-lg-8"><?php echo $item['it_brand']; ?></div>
						</div>
						<?php } ?>
						<!-- END :: Brand -->
						<!-- BIGIN :: Model -->
						<?php if ($item['it_model']) { ?>
						<div class="row-3 model">
							<div class="col-6 col-md-5 col-lg-4">
								<strong>모델</strong>
							</div>
							<div class="col-6 col-md-7 col-lg-8"><?php echo $item['it_model']; ?></div>
						</div>
						<?php } ?>
						<!-- END :: Model -->
						<?php
						$ct_send_cost_label = 'Payment for shipping';

						if($item['it_sc_type'] == 1)
							$sc_method = '무료배송';
						else {
							if($item['it_sc_method'] == 1)
								$sc_method = '수령후 지불';
							else if($item['it_sc_method'] == 2) {
								$ct_send_cost_label = '<label for="ct_send_cost">배송비결제</label>';
								$sc_method = '<select name="ct_send_cost" id="ct_send_cost">
												  <option value="0">주문시 결제</option>
												  <option value="1">수령후 지불</option>
											  </select>';
							}
							else
								$sc_method = '주문시 결제';
						}
						?>
						<div class="row-3 payment-shipping">
							<div class="col-6 col-md-5 col-lg-4"><?php echo $ct_send_cost_label; ?></div>
							<div class="col-6 col-md-7 col-lg-8"><?php echo $sc_method; ?></div>
						</div>
						<?php
						/* 재고 표시하는 경우 주석 해제
						<div class="row-3">
							<div class="col-6 col-md-5 col-lg-4">재고수량</div>
							<div class="col-6 col-md-7 col-lg-8"><?php echo number_format(get_it_stock_qty($it_id)); ?> 개</div>
						</tr>
						*/
						?>
						<div class="product-meta">
							<span class="posted-in">
								Categories: 
								<a href="#">Accessories</a>,
								<a href="#">Electronics</a>
							</span>
						</div>
						<?php if($item['it_buy_min_qty']) { ?>
						<div class="row-3">
							<div class="col-6 col-md-5 col-lg-4">최소구매수량</div>
							<div class="col-6 col-md-7 col-lg-8"><?php echo number_format($item['it_buy_min_qty']); ?> 개</div>
						</div>
						<?php } ?>
						<?php if($item['it_buy_max_qty']) { ?>
						<div class="row-3">
							<div class="col-6 col-md-5 col-lg-4">최대구매수량</div>
							<div class="col-6 col-md-7 col-lg-8"><?php echo number_format($item['it_buy_max_qty']); ?> 개</div>
						</div>
						<?php } ?>
						<?php
							if($option_item) {
						?>
						<!-- 선택옵션 시작 { -->
						<section class="sit_option">
							<h3 class="sound_only">선택옵션</h3>
				 
							<?php // 선택옵션
							echo $option_item;
							?>
						</section>
						<!-- } 선택옵션 끝 -->
						<?php
							}
						?>

						<?php
							if($supply_item) {
						?>
						<!-- 추가옵션 시작 { -->
						<section  class="sit_option">
							<h3>추가옵션</h3>
							<?php // 추가옵션
							echo $supply_item;
							?>
						</section>
						<!-- } 추가옵션 끝 -->
						<?php
							}
						?>
						<?php if ($is_orderable) { ?>
						<!-- 선택된 옵션 시작 { -->
						<section id="sit_sel_option">
							<h3>선택된 옵션</h3>
							<?php
							if(!$option_item) {
								if(!$item['it_buy_min_qty']) {
									$item['it_buy_min_qty'] = 1;
								}
							?>
							<ul id="sit_opt_added">
								<li class="sit_opt_list">
									<input type="hidden" name="io_type[<?php echo $it_id; ?>][]" value="0">
									<input type="hidden" name="io_id[<?php echo $it_id; ?>][]" value="">
									<input type="hidden" name="io_value[<?php echo $it_id; ?>][]" value="<?php echo $item['it_name']; ?>">
									<input type="hidden" class="io_price" value="0">
									<input type="hidden" class="io_stock" value="<?php echo $item['it_stock_qty']; ?>">
									<div class="opt_name">
										<span class="sit_opt_subj"><?php echo $item['it_name']; ?></span>
									</div>
									<div class="opt_count form-group">
										<label for="ct_qty_<?php echo $i; ?>" class="sound_only">수량</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<button type="button" class="sit_qty_minus btn btn-outline-danger"><i class="fa fa-minus" aria-hidden="true"></i><span class="sound_only">감소</span></button>
											</div>
											<input type="text" name="ct_qty[<?php echo $it_id; ?>][]" value="<?php echo $item['it_buy_min_qty']; ?>" id="ct_qty_<?php echo $i; ?>" class="num_input form-control" size="5">
											<div class="input-group-prepend">
												<button type="button" class="sit_qty_plus btn btn-outline-primary"><i class="fa fa-plus" aria-hidden="true"></i><span class="sound_only">증가</span></button>
											</div>
											<?php if(!empty($option_item) || !empty($supply_item)) { ?>
											<div class="input-group-prepend">
												<span class="sit_opt_prc">+0원</span>
											</div>
											<?php } ?>
										</div>
									</div>
								</li>
							</ul>
							<script>
							$(function() {
								price_calculate();
							});
							</script>
							<?php } ?>
						</section>
						<!-- } 선택된 옵션 끝 -->
						<!-- 총 구매액 -->
						<div id="sit_tot_price"></div>
						<?php } ?>

						<?php if($is_soldout) { ?>
						<p id="sit_ov_soldout">상품의 재고가 부족하여 구매할 수 없습니다.</p>
						<?php } ?>
						<a href="<?php echo G5_SHOP_URL.'/list.php?ca_id='.$item['ca_id']; ?>" class="see-all">See all features</a>
						<div class="opt-box"></div>
						<!-- BIGIN :: Buttons -->
						<div class="wishlist-compare-btn">
							<?php if ($is_orderable) { ?>
							<button type="submit" class="product-btn" data-text="Buy now" onclick="document.pressed=this.value;" value="바로구매">
								<i class="fa fa-credit-card"></i>
								Buy now
							</button>
							<button type="submit" class="add-compare" onclick="document.pressed=this.value;" value="장바구니">
								<i class="fa fa-shopping-cart"></i>
								Add to cart
							</button>
							<?php } ?>
							<?php if(!$is_orderable && $it['it_soldout'] && $it['it_stock_sms']) { ?>
							<a href="javascript:popup_stocksms('<?php echo $it['it_id']; ?>');" id="sit_btn_alm"><i class="fa fa-bell-o" aria-hidden="true"></i> 재입고알림</a>
							<?php } ?>
							
							<a href="javascript:item_wish(document.fitem, '<?php echo $it['it_id']; ?>');" class="wishlist-btn">Add to Wishlist</a>
							<?php if (!empty($naverpay_button_js)) { ?>
							<div class="itemform-naverpay"><?php echo $naverpay_request_js.$naverpay_button_js; ?></div>
							<?php } ?>
						</div>
						<!-- END :: Buttons -->
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
						   <p>
							   Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco,Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus.
							</p>
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
				</form>
			</div>
			<!--Modal Content-->
		</div>
	</div>
</div>

<script>
// 상품보관
function item_wish(f, it_id) {
	f.url.value = "<?php echo G5_SHOP_URL; ?>/wishupdate.php?it_id="+it_id;
	f.action = "<?php echo G5_SHOP_URL; ?>/wishupdate.php";
	f.submit();
}

// 추천메일
function popup_item_recommend(it_id) {
	if (!g5_is_member) {
		if (confirm("회원만 추천하실 수 있습니다.")) {
			document.location.href = "<?php echo G5_BBS_URL; ?>/login.php?url=<?php echo urlencode(G5_SHOP_URL."/item.php?it_id=$it_id"); ?>";
		}
	} else {
		url = "./itemrecommend.php?it_id=" + it_id;
		opt = "scrollbars=yes,width=616,height=420,top=10,left=10";
		popup_window(url, "itemrecommend", opt);
	}
}

// 재입고SMS 알림
function popup_stocksms(it_id) {
	url = "<?php echo G5_SHOP_URL; ?>/itemstocksms.php?it_id=" + it_id;
	opt = "scrollbars=yes,width=616,height=420,top=10,left=10";
	popup_window(url, "itemstocksms", opt);
}

$(function() {
	// 상품이미지 첫번째 링크
	$("#sit_pvi_big a:first").addClass("visible");

	// 상품이미지 미리보기 (썸네일에 마우스 오버시)
	$("#sit_pvi .img_thumb").bind("mouseover focus", function(){
		var idx = $("#sit_pvi .img_thumb").index($(this));
		$("#sit_pvi_big a.visible").removeClass("visible");
		$("#sit_pvi_big a:eq("+idx+")").addClass("visible");
	});

	// 상품이미지 크게보기
	$(".popup_item_image").click(function() {
		var url = $(this).attr("href");
		var top = 10;
		var left = 10;
		var opt = 'scrollbars=yes,top='+top+',left='+left;
		popup_window(url, "largeimage", opt);

		return false;
	});

	var sit_inf_open_table = 'hide';
	$('table#sit_inf_open tbody tr td').each(function() {
		var Compare = '상품페이지 참고';
		if($(this).text() != Compare) {
			sit_inf_open_table = 'show';
		}
	});
	console.log(sit_inf_open_table);
	if(sit_inf_open_table == 'hide') {
		$('table#sit_inf_open').hide();
	}
});

function fsubmit_check(f) {
	// 판매가격이 0 보다 작다면
	if (document.getElementById("it_price").value < 0) {
		alert("전화로 문의해 주시면 감사하겠습니다.");
		return false;
	}

	if($(".sit_opt_list").size() < 1) {
		alert("상품의 선택옵션을 선택해 주십시오.");
		return false;
	}

	var val, io_type, result = true;
	var sum_qty = 0;
	var min_qty = parseInt(<?php echo $it['it_buy_min_qty']; ?>);
	var max_qty = parseInt(<?php echo $it['it_buy_max_qty']; ?>);
	var $el_type = $("input[name^=io_type]");

	$("input[name^=ct_qty]").each(function(index) {
		val = $(this).val();

		if(val.length < 1) {
			alert("수량을 입력해 주십시오.");
			result = false;
			return false;
		}

		if(val.replace(/[0-9]/g, "").length > 0) {
			alert("수량은 숫자로 입력해 주십시오.");
			result = false;
			return false;
		}

		if(parseInt(val.replace(/[^0-9]/g, "")) < 1) {
			alert("수량은 1이상 입력해 주십시오.");
			result = false;
			return false;
		}

		io_type = $el_type.eq(index).val();
		if(io_type == "0")
			sum_qty += parseInt(val);
	});

	if(!result) {
		return false;
	}

	if(min_qty > 0 && sum_qty < min_qty) {
		alert("선택옵션 개수 총합 "+number_format(String(min_qty))+"개 이상 주문해 주십시오.");
		return false;
	}

	if(max_qty > 0 && sum_qty > max_qty) {
		alert("선택옵션 개수 총합 "+number_format(String(max_qty))+"개 이하로 주문해 주십시오.");
		return false;
	}

	return true;
}

// 바로구매, 장바구니 폼 전송
function fitem_submit(f) {
	f.action = "<?php echo $action_url; ?>";
	f.target = "";

	if (document.pressed == "장바구니") {
		f.sw_direct.value = 0;
	} else { // 바로구매
		f.sw_direct.value = 1;
	}

	// 판매가격이 0 보다 작다면
	if (document.getElementById("it_price").value < 0) {
		alert("전화로 문의해 주시면 감사하겠습니다.");
		return false;
	}

	if($(".sit_opt_list").size() < 1) {
		alert("상품의 선택옵션을 선택해 주십시오.");
		return false;
	}

	var val, io_type, result = true;
	var sum_qty = 0;
	var min_qty = parseInt(<?php echo $it['it_buy_min_qty']; ?>);
	var max_qty = parseInt(<?php echo $it['it_buy_max_qty']; ?>);
	var $el_type = $("input[name^=io_type]");

	$("input[name^=ct_qty]").each(function(index) {
		val = $(this).val();

		if(val.length < 1) {
			alert("수량을 입력해 주십시오.");
			result = false;
			return false;
		}

		if(val.replace(/[0-9]/g, "").length > 0) {
			alert("수량은 숫자로 입력해 주십시오.");
			result = false;
			return false;
		}

		if(parseInt(val.replace(/[^0-9]/g, "")) < 1) {
			alert("수량은 1이상 입력해 주십시오.");
			result = false;
			return false;
		}

		io_type = $el_type.eq(index).val();
		if(io_type == "0")
			sum_qty += parseInt(val);
	});

	if(!result) {
		return false;
	}

	if(min_qty > 0 && sum_qty < min_qty) {
		alert("선택옵션 개수 총합 "+number_format(String(min_qty))+"개 이상 주문해 주십시오.");
		return false;
	}

	if(max_qty > 0 && sum_qty > max_qty) {
		alert("선택옵션 개수 총합 "+number_format(String(max_qty))+"개 이하로 주문해 주십시오.");
		return false;
	}

	return true;
}
</script>