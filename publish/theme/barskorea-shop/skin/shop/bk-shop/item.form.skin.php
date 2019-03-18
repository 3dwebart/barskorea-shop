<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.G5_SHOP_CSS_URL.'/style.css">', 0);
?>
<!-- BIGIN :: Breadcrumb -->
<div class="breadcrumb-Area">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="breadcrumb-content">
					<ul>
						<li><a href="<?php echo G5_URL ?>">Home</a></li>
						<li class="active"><a href="<?php echo G5_SHOP_URL . '/item.php?it_id=' . $it_id ?>">Single Product</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END :: Breadcrumb -->
<!-- BIGIN :: Product info Area -->
<div class="single-product-area mb-75">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-6">
				<div class="product-details-img-tab">
					<!-- BIGIN :: Product Tab Menu - Thumbnail -->
					<?php
					$big_img_count = 0;
					$largeImg = array();
					$thumbnails = array();
					for($i=1; $i<=10; $i++) {
						if(!$it['it_img'.$i]) {
							continue;
						}

						$img = get_it_thumbnail($it['it_img'.$i], $default['de_mimg_width'], $default['de_mimg_height']);
						$largeImg[] = $img;

						if($img) {
							// 썸네일
							$thumb = get_it_thumbnail($it['it_img'.$i], 90, 113);
							$thumbnails[] = $thumb;
							$big_img_count++;
						}
					}

					if($big_img_count == 0) {
						echo '<img src="'.G5_SHOP_URL.'/img/no_image.gif" alt="">';
					}


					// 썸네일
					$thumb1 = true;
					$thumb_count = 0;
					$total_count = count($thumbnails);
					if($total_count > 0) {
						/*
						//echo '<ul id="sit_pvi_thumb">';
						foreach($thumbnails as $val) {
							$thumb_count++;
							$sit_pvi_last ='';
							if ($thumb_count % 5 == 0) $sit_pvi_last = 'class="li_last"';
								//echo '<li '.$sit_pvi_last.'>';
								//echo '<a href="'.G5_SHOP_URL.'/largeimage.php?it_id='.$it['it_id'].'&amp;no='.$thumb_count.'" target="_blank" class="popup_item_image img_thumb">'.$val.'<span class="sound_only"> '.$thumb_count.'번째 이미지 새창</span></a>';
								//echo '</li>';
						}
						//echo '</ul>';
						*/
					}
					?>
					<div class="product-menu">
						<div class="nav product-tab-menu">
							<?php
								for ($i=0; $i < count($thumbnails); $i++) {
									$x = $i + 1;
							?>
							<div class="product-details-img">
								<a<?php echo $i == 0 ? ' class="active"' : ''; ?> data-toggle="tab" href="#product<?php echo $x; ?>">
									<?php echo $thumbnails[$i]; ?>
								</a>
							</div>
							<?php
								}
							?>
						</div>
					</div>
					<!-- END :: Product Tab Menu - Thumbnail-->
					<!-- BIGIN :: Product Tab Content - Large image -->
					<div class="tab-content single-product-img">
						<?php
							for ($i=0; $i < count($largeImg); $i++) {
								$x = $i + 1;
						?>
						<div class="tab-pane fade<?php echo $i == 0 ? ' show active' : ''; ?>" id="product<?php echo $x; ?>">
							<div class="product-large-thumb img-full">
								<div class="easyzoom easyzoom--overlay">
									<a href="<?php echo G5_DATA_URL . '/item/' . $it['it_img'. $x]; ?>">
										<?php echo $largeImg[$i]; ?>
									</a>
									<a href="<?php echo G5_DATA_URL . '/item/' . $it['it_img'. $x]; ?>" class="popup-img venobox" data-gall="myGallery">
										<i class="fa fa-expand"></i>
									</a>
								</div>
							</div>
						</div>
						<?php
							}
						?>
					</div>
					<!-- END :: Product Tab Content - Large image -->
				</div>
			</div>
			<div class="col-md-12 col-lg-6 2017_renewal_itemform">
				<form name="fitem" method="post" action="<?php echo $action_url; ?>" onsubmit="return fitem_submit(this);">
					<input type="hidden" name="it_id[]" value="<?php echo $it_id; ?>">
					<input type="hidden" name="sw_direct">
					<input type="hidden" name="url">
					<input type="hidden" id="it_price" value="<?php echo get_price($it); ?>">
					<!--Product Details Content Start-->
					<div class="product-details-content">
						<!--Product Nav Start-->
						<div class="product-nav">
							<a href="#"><i class="fa fa-angle-left"></i></a>
							<a href="#"><i class="fa fa-angle-right"></i></a>
						</div>
						<!--Product Nav End-->
						<h2><?php echo $it['it_name']; ?></h2>
						<?php if($is_orderable) { ?>
						<p id="sit_opt_info">
							상품 선택옵션 <?php echo $option_count; ?> 개, 추가옵션 <?php echo $supply_count; ?> 개
						</p>
						<?php } ?>
						<?php
							$sql = "SELECT count(it_id) AS cnt FROM {$g5['g5_shop_item_use_table']} WHERE it_id = '$it_id'";
							$row = sql_fetch($sql);
							$cnt = $row['cnt'];
							if($cnt == 0) {
								$reviewCnt = '(There are no customer reviews yet.)';
							} else {
								$reviewCnt = '(' . $cnt . ' customer review)';
							}
							$is_score = 0;
							$is_score_sum = 0;
							$sql = "SELECT is_score FROM {$g5['g5_shop_item_use_table']} WHERE it_id = '$it_id'";
							$res = sql_query($sql);
							while ($row = sql_fetch_array($res)) {
								$is_score_sum += $row['is_score'];
							}
							$is_score = ceil($is_score_sum / $cnt);

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
						?>
						<div class="single-product-reviews">
							<i class="fa fa-star<?php echo $star1; ?>"></i>
							<i class="fa fa-star<?php echo $star2; ?>"></i>
							<i class="fa fa-star<?php echo $star3; ?>"></i>
							<i class="fa fa-star<?php echo $star4; ?>"></i>
							<i class="fa fa-star<?php echo $star5; ?>"></i>
							<a class="review-link" href="#"><?php echo $reviewCnt; ?></a>
						</div>
						<!-- BIGIN :: Price -->

						<?php
							if (!$it['it_use']) { // 판매가능이 아닐 경우
								$price_str1 = "";
								$price_str2 = "판매중지";
							} else if ($it['it_tel_inq']) { // 전화문의일 경우
								$price_str1 = "";
								$price_str2 = "전화문의";
							} else { // 전화문의가 아닐 경우
								if ($it['it_cust_price']) {
									$cust_price = "&#8361;" . number_format($it['it_cust_price']);
								}
								/*
								시중가격 Original code : 
								echo display_price($it['it_cust_price']);
								판매가격 Original code :
								echo display_price(get_price($it));
								*/
							}
							$price = "&#8361;" . number_format($it['it_price']);
						?>

						<div class="single-product-price">
							<span class="price new-price"><?php echo $price; ?></span>
							<?php if ($it['it_cust_price']) { ?>
							<span class="regular-price"><?php echo $cust_price; ?></span>
							<?php } ?>
						</div>
						<!-- END :: Price -->
						<!-- BIGIN :: Point -->
						<?php if ($config['cf_use_point']) { // 포인트 사용한다면 ?>
						<div class="row-3 point">
							<div class="col-6 col-md-5 col-lg-4">
								<strong>포인트</strong>
							</div>
							<div class="col-6 col-md-7 col-lg-8">
								<?php
								if($it['it_point_type'] == 2) {
									echo '구매금액(추가옵션 제외)의 '.$it['it_point'].'%';
								} else {
									$it_point = get_item_point($it);
									echo number_format($it_point).'점';
								}
								?>
							</div>
						</div>
						<?php } ?>
						<!-- END :: Point -->
						<!-- BIGIN :: Maker -->
						<?php if ($it['it_maker']) { ?>
						<div class="row-3 maker">
							<div class="col-6 col-md-5 col-lg-4">
								<strong>제조사</strong>
							</div>
							<div class="col-6 col-md-7 col-lg-8"><?php echo $it['it_maker']; ?></div>
						</div>
						<?php } ?>
						<!-- END :: Maker -->
						<!-- BIGIN :: Origin -->
						<?php if ($it['it_origin']) { ?>
						<div class="row-3 origin">
							<div class="col-6 col-md-5 col-lg-4">
								<strong>원산지</strong>
							</div>
							<div class="col-6 col-md-7 col-lg-8"><?php echo $it['it_origin']; ?></div>
						</div>
						<?php } ?>
						<!-- END :: Origin -->
						<!-- BIGIN :: Braand -->
						<?php if ($it['it_brand']) { ?>
						<div class="row-3 brand">
							<div class="col-6 col-md-5 col-lg-4">
								<strong>브랜드</strong>
							</div>
							<div class="col-6 col-md-7 col-lg-8"><?php echo $it['it_brand']; ?></div>
						</div>
						<?php } ?>
						<!-- END :: Brand -->
						<!-- BIGIN :: Model -->
						<?php if ($it['it_model']) { ?>
						<div class="row-3 model">
							<div class="col-6 col-md-5 col-lg-4">
								<strong>모델</strong>
							</div>
							<div class="col-6 col-md-7 col-lg-8"><?php echo $it['it_model']; ?></div>
						</div>
						<?php } ?>
						<!-- END :: Model -->
						<?php
						$ct_send_cost_label = 'Payment for shipping';

						if($it['it_sc_type'] == 1)
							$sc_method = '무료배송';
						else {
							if($it['it_sc_method'] == 1)
								$sc_method = '수령후 지불';
							else if($it['it_sc_method'] == 2) {
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
						<?php if(!empty($it['it_basic'])) { ?>
						<div class="product-description">
							<p>
								<?php echo $it['it_basic']; ?>
							</p>
						</div>
						<?php } ?>
						<div class="product-meta">
							<span class="posted-in">
								Categories: 
								<a href="#">Accessories</a>,
								<a href="#">Electronics</a>
							</span>
						</div>
						<?php if($it['it_buy_min_qty']) { ?>
						<div class="row-3">
							<div class="col-6 col-md-5 col-lg-4">최소구매수량</div>
							<div class="col-6 col-md-7 col-lg-8"><?php echo number_format($it['it_buy_min_qty']); ?> 개</div>
						</div>
						<?php } ?>
						<?php if($it['it_buy_max_qty']) { ?>
						<div class="row-3">
							<div class="col-6 col-md-5 col-lg-4">최대구매수량</div>
							<div class="col-6 col-md-7 col-lg-8"><?php echo number_format($it['it_buy_max_qty']); ?> 개</div>
						</div>
						<?php } ?>
						<!--  -->
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
								if(!$it['it_buy_min_qty']) {
									$it['it_buy_min_qty'] = 1;
								}
							?>
							<ul id="sit_opt_added">
								<li class="sit_opt_list">
									
									<input type="hidden" name="io_type[<?php echo $it_id; ?>][]" value="0">
									<input type="hidden" name="io_id[<?php echo $it_id; ?>][]" value="">
									<input type="hidden" name="io_value[<?php echo $it_id; ?>][]" value="<?php echo $it['it_name']; ?>">
									<input type="hidden" class="io_price" value="0">
									<input type="hidden" class="io_stock" value="<?php echo $it['it_stock_qty']; ?>">
									<div class="opt_name">
										<span class="sit_opt_subj"><?php echo $it['it_name']; ?></span>
									</div>
									<div class="opt_count form-group">
										<label for="ct_qty_<?php echo $i; ?>" class="sound_only">수량</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<button type="button" class="sit_qty_minus btn btn-outline-danger"><i class="fa fa-minus" aria-hidden="true"></i><span class="sound_only">감소</span></button>
											</div>
											<input type="text" name="ct_qty[<?php echo $it_id; ?>][]" value="<?php echo $it['it_buy_min_qty']; ?>" id="ct_qty_<?php echo $i; ?>" class="num_input form-control" size="5">
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
							<?php if ($naverpay_button_js) { ?>
							<div class="itemform-naverpay">
								<?php echo $naverpay_request_js.$naverpay_button_js; ?>
							</div>
							<?php } ?>
						</div>
						<!-- END :: Buttons -->
						<div class="single-product-sharing">
							<h3>Share this product</h3>
							<ul>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><?php echo $sns_share_links; ?></li>
								<li>
									<a href="javascript:popup_item_recommend('<?php echo $it['it_id']; ?>');" id="sit_btn_rec">
										<i class="fa fa-envelope-o" aria-hidden="true"></i>
										<span class="sound_only">추천하기</span>
									</a>
								</li>
								
							</ul>
						</div>
					</div>
					<!--Product Details Content End-->
				</form>
			</div>
		</div>
	</div>
</div>
<!-- END :: Product info Area -->
<!--Product Description Review Area Start-->
<div class="product-description-review-area mb-85">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="product-review-tab">
					<!--Review And Description Tab Menu Start-->
					<ul class="nav dec-and-review-menu">
						<li>
							<a class="active" data-toggle="tab" href="#description">Description</a>
						</li>
						<li>
							<a data-toggle="tab" href="#reviews">Reviews <?php echo $cnt > 0 ? '('.$cnt.')' : ''; ?></a>
						</li>
						<li>
							<a data-toggle="tab" href="#qa">Product QA</a>
						</li>
						<li>
							<a data-toggle="tab" href="#di">Delevery info</a>
						</li>
						<li>
							<a data-toggle="tab" href="#eri">Exhange & Refund info</a>
						</li>
					</ul>
					<!--Review And Description Tab Menu End-->
					<?php /*
					<!--Review And Description Tab Content Start-->
					<div class="tab-content product-review-content-tab" id="myTabContent-4">
						<div class="tab-pane fade active show" id="description">
							<div class="single-product-description">
								<h2>Description</h2>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.
								</p>
								<p>
									Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi. Cras neque metus, consequat et blandit et, luctus a nunc. Etiam gravida vehicula tellus, in imperdiet ligula euismod eget.
								</p>
							</div>
						</div>
						<div class="tab-pane fade" id="reviews">
							<div class="review-page-comment">
								<h2><?php echo $cnt; ?> review for Sit voluptatem</h2>
								<ul>
									<li>
										<div class="product-comment">
											<img src="img/icon/author.png" alt="">
											<div class="product-comment-content">
												<div class="product-reviews">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
												<p class="meta">
													<strong>admin</strong> - <span>November 22, 2016</span>
												<div class="description">
													<p>Good Product</p>
												</div>
											</div>
										</div>
									</li>
								</ul>
								<div class="review-form-wrapper">
									<div class="review-form">
										<span class="comment-reply-title">Add a review </span>
										<form action="#">
											<p class="comment-notes">
												<span id="email-notes">Your email address will not be published.</span>
												 Required fields are marked
												 <span class="required">*</span>
											</p>
											<div class="comment-form-rating">
												<label>Your rating</label>
												<div class="rating">
													<i class="fa fa-star-o"></i>
													<i class="fa fa-star-o"></i>
													<i class="fa fa-star-o"></i>
													<i class="fa fa-star-o"></i>
													<i class="fa fa-star-o"></i>
												</div>
											</div>
											<div class="input-element">
												<div class="comment-form-comment">
													<label>Comment</label>
													<textarea name="message" cols="40" rows="8"></textarea>
												</div>
												<div class="review-comment-form-author">
													<label>Name </label>
													<input required="required" type="text">
												</div>
												<div class="review-comment-form-email">
													<label>Email </label>
													<input required="required" type="text">
												</div>
												<div class="comment-submit">
													<button type="submit" class="form-button">Submit</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--Review And Description Tab Content End-->
					*/ ?>
				<!-- Close div 5ea : item.info.skin.php -->
<!--Product Description Review Area Start-->

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
<?php /* 2017 리뉴얼한 테마 적용 스크립트입니다. 기존 스크립트를 오버라이드 합니다. */ ?>
<script src="<?php echo G5_JS_URL; ?>/shop.override.js"></script>