<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.G5_SHOP_CSS_URL.'/style.css">', 0);
?>
<script src="<?php echo G5_JS_URL; ?>/viewimageresize.js"></script>

					<!--Review And Description Tab Content Start-->
					<div class="tab-content product-review-content-tab" id="myTabContent-4">
						<!-- 상품 정보 시작 { -->
						<div class="tab-pane fade active show" id="description">
							<div class="single-product-description">
								<h2>상품 정보</h2>
								<?php // echo pg_anchor('inf'); ?>

								<?php if ($it['it_basic']) { // 상품 기본설명 ?>
								<h3>상품 기본설명</h3>
								<div id="sit_inf_basic">
									 <?php echo $it['it_basic']; ?>
								</div>
								<?php } ?>

								<?php if ($it['it_explan']) { // 상품 상세설명 ?>
								<h3>상품 상세설명</h3>
								<div id="sit_inf_explan">
									<?php echo conv_content($it['it_explan'], 1); ?>
								</div>
								<?php } ?>
								<?php
								if ($it['it_info_value']) { // 상품 정보 고시
									$info_data = unserialize(stripslashes($it['it_info_value']));
									if(is_array($info_data)) {
										$gubun = $it['it_info_gubun'];
										$info_array = $item_info[$gubun]['article'];
								?>
								<h3>상품 정보 고시</h3>
								<table id="sit_inf_open">
								<colgroup>
									<col class="grid_4">
									<col>
								</colgroup>
								<tbody>
								<?php
								foreach($info_data as $key=>$val) {
									$ii_title = $info_array[$key][0];
									$ii_value = $val;
								?>
								<tr>
									<th scope="row"><?php echo $ii_title; ?></th>
									<td><?php echo $ii_value; ?></td>
								</tr>
								<?php } //foreach?>
								</tbody>
								</table>
								<!-- 상품정보고시 end -->
								<?php
									} else {
										if($is_admin) {
											echo '<p>상품 정보 고시 정보가 올바르게 저장되지 않았습니다.<br>config.php 파일의 G5_ESCAPE_FUNCTION 설정을 addslashes 로<br>변경하신 후 관리자 &gt; 상품정보 수정에서 상품 정보를 다시 저장해주세요. </p>';
										}
									}
								} //if
								?>
							</div>
						</div>
						<!-- } 상품 정보 끝 -->
						<!-- 사용후기 시작 { -->
						<div class="tab-pane fade" id="reviews">
							<div class="review-page-comment">
								<h2><?php echo $cnt; ?> review for Sit voluptatem</h2>
								<div id="itemuse"><?php include_once(G5_SHOP_PATH.'/itemuse.php'); ?></div>
							</div>
						</div>
						<!-- } 사용후기 끝 -->
						<!-- 상품문의 시작 { -->
						<div class="tab-pane fade" id="qa">
							<div class="qa-page-comment">
								<h2>상품문의</h2>
								<div id="itemqa"><?php include_once(G5_SHOP_PATH.'/itemqa.php'); ?></div>
							</div>
						</div>
						<!-- } 상품문의 끝 -->
						<!-- 배송정보 시작 { -->
						<?php if ($default['de_baesong_content']) { // 배송정보 내용이 있다면 ?>
						<div class="tab-pane fade" id="di">
							<h2>배송정보</h2>
							<?php echo conv_content($default['de_baesong_content'], 1); ?>
						</div>
						<?php } ?>
						<!-- } 배송정보 끝 -->
						<!-- 교환/반품 시작 { -->
						<?php if ($default['de_change_content']) { // 교환/반품 내용이 있다면 ?>
						<div class="tab-pane fade" id="eri">
							<h2>교환/반품</h2>
							<?php echo conv_content($default['de_change_content'], 1); ?>
						</div>
						<?php } ?>
						<!-- } 교환/반품 끝 -->
					</div>
					<!--Review And Description Tab Content End-->
				</div>
			</div>
		</div>
	</div>
</div>
<?php if ($default['de_rel_list_use']) { ?>
<!-- 관련상품 시작 { -->
<!--Related Product Start-->
<div class="related-product-area mb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!--Section Title Start-->
                <div class="section-title text-center">
                    <h3>Related Products</h3>
                </div>
                <!--Section Title End-->
            </div>
        </div>
        <div class="all-related-product">
        	<div class="row">
				<?php
				$rel_skin_file = $skin_dir.'/'.$default['de_rel_list_skin'];
				if(!is_file($rel_skin_file))
					$rel_skin_file = G5_SHOP_SKIN_PATH.'/'.$default['de_rel_list_skin'];

				$sql = " SELECT b.* FROM {$g5['g5_shop_item_relation_table']} a LEFT JOIN {$g5['g5_shop_item_table']} b ON (a.it_id2=b.it_id) WHERE a.it_id = '{$it['it_id']}' AND b.it_use='1' ";
				$list = new item_list($rel_skin_file, $default['de_rel_list_mod'], 0, $default['de_rel_img_width'], $default['de_rel_img_height']);
				$list->set_query($sql);
				echo $list->run();
				?>
			</div>
		</div>
	</div>
</div>
<!-- } 관련상품 끝 -->
<?php } ?>
<script>
$(window).on("load", function() {
	$("#sit_inf_explan").viewimageresize2();
});
</script>
