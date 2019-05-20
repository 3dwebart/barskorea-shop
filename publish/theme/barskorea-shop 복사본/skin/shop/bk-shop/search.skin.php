<?php
	if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

	if ($is_admin) {  //관리자이면
?>
	<div class="sit_admin">
		<a href="<?php echo G5_ADMIN_URL; ?>/shop_admin/configform.php#anc_scf_etc" class="btn_admin">검색 설정</a>
	</div>
<?php
}
?>
<!-- 검색 시작 { -->
<div id="ssch">
	<div class="container">
		<!-- 상세검색 항목 시작 { -->
		<div id="ssch_frm">
			<h2>
				<span><strong><?php echo $q; ?></strong> <?php echo $langStr['SearchResults']; ?></span> 
				(<?php echo $langStr['SearchTotal']; ?> <strong><?php echo $total_count; ?></strong> <?php echo $langStr['SearchEA']; ?> )
			</h2>
			<form name="frmdetailsearch">
				<input type="hidden" name="qsort" id="qsort" value="<?php echo $qsort ?>">
				<input type="hidden" name="qorder" id="qorder" value="<?php echo $qorder ?>">
				<input type="hidden" name="qcaid" id="qcaid" value="<?php echo $qcaid ?>">
				<div class="row-5">
					<div class="col-5">
						<div class="input-group">
							<label for="ssch_q" class="sound_only" ><?php echo $langStr['SearchWord']; ?></label>
							<input type="text" name="q" value="<?php echo $q; ?>" id="ssch_q" class="ssch_input form-control" size="40" maxlength="30" placeholder="<?php echo $langStr['SearchWord']; ?>">
							<div class="input-group-prepend">
								<input type="submit" value="<?php echo $langStr['Search']; ?>" class="btn_submit btn btn-warning">
							</div>
						</div>
					</div>
					<div class="col-7">
						<div class="input-group align-items-center">
							<div class="input-group-prepend search-area">
								<strong class="sound_only"><?php echo $langStr['SearchScope']; ?></strong>
								<label for="ssch_qname" class="custom-checkbox">
									<input type="checkbox" name="qname" id="ssch_qname" value="1" <?php echo $qname_check?'checked="checked"':'';?>>
									<span class="box"></span>
									<span class="text"><?php echo $langStr['ProductName']; ?></span>
								</label>
								<label for="ssch_qexplan" class="custom-checkbox">
									<input type="checkbox" name="qexplan" id="ssch_qexplan" value="1" <?php echo $qexplan_check?'checked="checked"':'';?>>
									<span class="box"></span>
									<span class="text"><?php echo $langStr['ProductDescription']; ?></span>
								</label>
								<label for="ssch_qbasic" class="custom-checkbox">
									<input type="checkbox" name="qbasic" id="ssch_qbasic" value="1" <?php echo $qbasic_check?'checked="checked"':'';?>>
									<span class="box"></span>
									<span class="text"><?php echo $langStr['BasicDescription']; ?></span>
								</label>
								<label for="ssch_qid" class="custom-checkbox">
									<input type="checkbox" name="qid" id="ssch_qid" value="1" <?php echo $qid_check?'checked="checked"':'';?>>
									<span class="box"></span>
									<span class="text"><?php echo $langStr['ProductCode']; ?></span>
								</label>
							</div>
							<strong class="sound_only">상품가격 (원)</strong>
							<label for="ssch_qfrom" class="sound_only">최소 가격</label>
							<input type="text" name="qfrom" value="<?php echo $qfrom; ?>" id="ssch_qfrom" class="ssch_input form-control" size="10">
							<div class="input-group-prepend">
								 <span class="px-2">원 ~ </span>
							</div>
							<label for="ssch_qto" class="sound_only">최대 가격</label>
							<input type="text" name="qto" value="<?php echo $qto; ?>" id="ssch_qto" class="ssch_input form-control" size="10">
							<div class="input-group-prepend">
								<span class="px-2">원</span>
							</div>
						</div>
					</div>
				</div>
				<div class="ssch_scharea">
					<div class="ssch_right">
						
					</div>
					<div class="ssch_left">
						
					</div>
				</div>
				<p>
					상세검색을 선택하지 않거나, 상품가격을 입력하지 않으면 전체에서 검색합니다.<br>
					검색어는 최대 30글자까지, 여러개의 검색어를 공백으로 구분하여 입력 할수 있습니다.
				</p>
			</form>
		</div>
		<!-- } 상세검색 항목 끝 -->
		<!-- 검색된 분류 시작 { -->
		<div id="ssch_cate" class="sct_ct">
			<ul>
			<?php
			$sql = " SELECT b.ca_id, b.ca_name, count(*) AS cnt $sql_common $sql_where GROUP BY b.ca_id ORDER BY b.ca_id ";
			$result = sql_query($sql);
			$total_cnt = 0;
			for ($i=0; $row=sql_fetch_array($result); $i++) {
				echo "<li><a href=\"#\" onclick=\"set_ca_id('{$row['ca_id']}'); return false;\">{$row['ca_name']} (".$row['cnt'].")</a></li>\n";
				$total_cnt += $row['cnt'];
			}
			echo '<li><a href="#" onclick="set_ca_id(\'\'); return false;">전체분류 <span>('.$total_cnt.')</span></a></li>'.PHP_EOL;
			?>
			</ul>
		</div>
		<!-- } 검색된 분류 끝 -->
		<div id="sct_sortlst">
			<ul id="ssch_sort">
				<li><a href="#" onclick="set_sort('it_sum_qty', 'desc'); return false;">판매많은순</a></li>
				<li><a href="#" onclick="set_sort('it_price', 'asc'); return false;">낮은가격순</a></li>
				<li><a href="#" onclick="set_sort('it_price', 'desc'); return false;">높은가격순</a></li>
				<li><a href="#" onclick="set_sort('it_use_avg', 'desc'); return false;">평점높은순</a></li>
				<li><a href="#" onclick="set_sort('it_use_cnt', 'desc'); return false;">후기많은순</a></li>
				<li><a href="#" onclick="set_sort('it_update_time', 'desc'); return false;">최근등록순</a></li>
			</ul>
		</div>
		<!-- 검색결과 시작 { -->
		<div>
			<?php
			// 리스트 유형별로 출력
			$list_file = G5_SHOP_SKIN_PATH.'/'.$default['de_search_list_skin'];
			if (file_exists($list_file)) {
				define('G5_SHOP_CSS_URL', G5_SHOP_SKIN_URL);
				$list = new item_list($list_file, $default['de_search_list_mod'], $default['de_search_list_row'], $default['de_search_img_width'], $default['de_search_img_height']);
				$list->set_query(" select * $sql_common $sql_where {$order_by} limit $from_record, $items ");
				$list->set_is_page(true);
				$list->set_view('it_img', true);
				$list->set_view('it_id', true);
				$list->set_view('it_name', true);
				$list->set_view('it_basic', true);
				$list->set_view('it_cust_price', false);
				$list->set_view('it_price', true);
				$list->set_view('it_icon', true);
				$list->set_view('sns', true);
				echo $list->run();
			}
			else {
				$i = 0;
				$error = '<p class="sct_nofile">'.$list_file.' 파일을 찾을 수 없습니다.<br>관리자에게 알려주시면 감사하겠습니다.</p>';
			}

			if ($i==0) {
				//echo '<div>'.$error.'</div>';
				echo "<div></div>";
			}

			$query_string = 'qname='.$qname.'&amp;qexplan='.$qexplan.'&amp;qid='.$qid;
			if($qfrom && $qto) $query_string .= '&amp;qfrom='.$qfrom.'&amp;qto='.$qto;
			$query_string .= '&amp;qcaid='.$qcaid.'&amp;q='.urlencode($q);
			$query_string .='&amp;qsort='.$qsort.'&amp;qorder='.$qorder;
			echo get_paging($config['cf_write_pages'], $page, $total_page, $_SERVER['SCRIPT_NAME'].'?'.$query_string.'&amp;page=');
			?>
		</div>
		<!-- } 검색결과 끝 -->
	</div>
</div>
<!-- } 검색 끝 -->

<script>
function set_sort(qsort, qorder) {
	var f = document.frmdetailsearch;
	f.qsort.value = qsort;
	f.qorder.value = qorder;
	f.submit();
}

function set_ca_id(qcaid) {
	var f = document.frmdetailsearch;
	f.qcaid.value = qcaid;
	f.submit();
}
</script>
