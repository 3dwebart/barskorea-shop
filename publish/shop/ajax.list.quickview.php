<?php
include_once('./_common.php');
$wish_process = $_POST['wish_process'];
$mb_id = $_POST['mb_id'];
$it_id = $_POST['it_id'];
$wi_ip = getRealIpAddr();
$imgs = array();
$sql = "SELECT
			it_id, ca_id, ca_id2, ca_id3, 
			it_skin, it_mobile_skin, it_name, it_maker, 
			it_origin, it_brand, it_model, it_option_subject, it_supply_subject, 
			it_type1, it_type2, it_type3, it_type4, it_type5, 
			it_basic, it_explan, it_explan2, it_mobile_explan, 
			it_cust_price, it_price, it_point, it_point_type, 
			it_supply_point, it_notax, it_sell_email, it_use, 
			it_nocoupon, it_soldout, it_stock_qty, it_stock_sms, it_noti_qty, 
			it_sc_type, it_sc_method, it_sc_price, it_sc_minimum, 
			it_sc_qty, it_buy_min_qty, it_buy_max_qty, 
			it_head_html, it_tail_html, it_mobile_head_html, it_mobile_tail_html, 
			it_hit, it_time, it_update_time, 
			it_ip, it_order, it_tel_inq , it_info_gubun, it_info_value, it_sum_qty, it_use_cnt, 
			it_use_avg, it_shop_memo, ec_mall_pid, 
			it_img1, it_img2, it_img3, it_img4, it_img5, it_img6, it_img7, it_img8, it_img9, it_img10, 
			it_1_subj, it_2_subj, it_3_subj, it_4_subj, it_5_subj, it_6_subj, it_7_subj, it_8_subj, it_9_subj, it_10_subj, 
			it_1, it_2, it_3, it_4, it_5, it_6, it_7, it_8, it_9, it_10
		FROM {$g5['g5_shop_item_table']} 
		WHERE it_id = '{$it_id}'";
$row = sql_fetch($sql, FALSE);
for ($i=1; $i < 11; $i++) { 
	if(!empty($row['it_img'.$i])) {
		$imgs[] = $row['it_img'.$i];
	}
}

$option_item = get_item_options($row['it_id'], $row['it_option_subject'], 'div');
$supply_item = get_item_supply($row['it_id'], $row['it_supply_subject'], 'div');

// 상품품절체크
if(G5_SOLDOUT_CHECK) {
    $is_soldout = is_soldout($row['it_id']);
}

// 주문가능체크
$is_orderable = true;
if(!$row['it_use'] || $row['it_tel_inq'] || $is_soldout) {
    $is_orderable = false;
}
$scripts = '<script id="shop_override" src="/js/shop.js"></script>';
$scripts .= '<script id="shop_override" src="/js/shop.override.js"></script>';
$html = '';
$html .= '<div class="price-wrap">';
$html .= '<input type="hidden" name="it_id[]" value="'.$it_id.'">';
$html .= '<input type="hidden" name="sw_direct">';
$html .= '<input type="hidden" name="url">';
$html .= '<input type="hidden" id="it_price" value="'.get_price($row).'">';
$html .= '<!-- 선택된 옵션 시작 { -->';
$html .= '<section id="sit_sel_option">';
$html .= '<h3>선택된 옵션</h3>';
if(!$option_item) {
	if(!$row['it_buy_min_qty']) {
		$row['it_buy_min_qty'] = 1;
	}
	$html .= '<ul id="sit_opt_added">';
	$html .= '<li class="sit_opt_list">';
	$html .= '<input type="hidden" name="io_type['.$row['it_id'].'][]" value="0">';
	$html .= '<input type="hidden" name="io_id['.$row['it_id'].'][]" value="">';
	$html .= '<input type="hidden" name="io_value['.$row['it_id'].'][]" value="'.$row['it_name'].'">';
	$html .= '<input type="hidden" class="io_price" value="0">';
	$html .= '<input type="hidden" class="io_stock" value="'.$row['it_stock_qty'].'">';
	$html .= '<div class="opt_name">';
	$html .= '<span class="sit_opt_subj">'.$row['it_name'].'</span>';
	$html .= '</div>';
	$html .= '<div class="opt_count form-group">';
	$html .= '<label for="ct_qty_'.$i.'" class="sound_only">수량</label>';
	$html .= '<div class="input-group">';
	$html .= '<div class="input-group-prepend">';
	$html .= '<button type="button" class="sit_qty_minus btn btn-outline-danger"><i class="fa fa-minus" aria-hidden="true"></i><span class="sound_only">감소</span></button>';
	$html .= '</div>';
	$html .= '<input type="text" name="ct_qty['.$row['it_id'].'][]" value="'.$row['it_buy_min_qty'].'" id="ct_qty_'.$i.'" class="num_input form-control" size="5">';
	$html .= '<div class="input-group-prepend">';
	$html .= '<button type="button" class="sit_qty_plus btn btn-outline-primary"><i class="fa fa-plus" aria-hidden="true"></i><span class="sound_only">증가</span></button>';
	$html .= '</div>';
	if(!empty($option_item) || !empty($supply_item)) {
		$html .= '<div class="input-group-prepend">';
		$html .= '<span class="sit_opt_prc">+0원</span>';
		$html .= '</div>';
	}
	$html .= '</div>';
	$html .= '</div>';
	$html .= '</li>';
	$html .= '</ul>';
	$html .= '</section>';
	$html .= '<!-- } 선택된 옵션 끝 -->';
	$html .= '<!-- 총 구매액 -->';
	$html .= '<div id="sit_tot_price2"></div>';
	$html .= '</div>';
	//$html .= '<div id="sit_tot_price2"></div>';
}
// 기본 배열 89개
$res_row = array(
	'it_id' => $row['it_id'],
	'ca_id' => $row['ca_id'], 
	'ca_id' => $row['ca_id2'], 
	'ca_id' => $row['ca_id3'], 
	'it_skin' => $row['it_skin'], 
	'it_mobile_skin' => $row['it_mobile_skin'], 
	'it_name' => $row['it_name'], 
	'it_maker' => $row['it_maker'], 
	'it_origin' => $row['it_origin'], 
	'it_brand' => $row['it_brand'], 
	'it_model' => $row['it_model'], 
	'it_option_subject' => $row['it_option_subject'], 
	'it_supply_subject' => $row['it_supply_subject'], 
	'it_type1' => $row['it_type1'], 
	'it_type2' => $row['it_type2'], 
	'it_type3' => $row['it_type3'], 
	'it_type4' => $row['it_type4'], 
	'it_type5' => $row['it_type5'], 
	'it_basic' => $row['it_basic'], 
	'it_explan' => $row['it_explan'], 
	'it_explan2' => $row['it_explan2'], 
	'it_mobile_explan' => $row['it_mobile_explan'], 
	'it_cust_price' => $row['it_cust_price'], 
	'it_price' => $row['it_price'], 
	'it_point' => $row['it_point'], 
	'it_point_type' => $row['it_point_type'], 
	'it_supply_point' => $row['it_supply_point'], 
	'it_notax' => $row['it_notax'], 
	'it_sell_email' => $row['it_sell_email'], 
	'it_use' => $row['it_use'], 
	'it_nocoupon' => $row['it_nocoupon'], 
	'it_soldout' => $row['it_soldout'], 
	'it_stock_qty' => $row['it_stock_qty'], 
	'it_stock_sms' => $row['it_stock_sms'], 
	'it_noti_qty' => $row['it_noti_qty'], 
	'it_sc_type' => $row['it_sc_type'], 
	'it_sc_method' => $row['it_sc_method'], 
	'it_sc_price' => $row['it_sc_price'], 
	'it_sc_minimum' => $row['it_sc_minimum'], 
	'it_sc_qty' => $row['it_sc_qty'], 
	'it_buy_min_qty' => $row['it_buy_min_qty'], 
	'it_buy_max_qty' => $row['it_buy_max_qty'], 
	'it_head_html' => $row['it_head_html'], 
	'it_tail_html' => $row['it_tail_html'], 
	'it_mobile_head_html' => $row['it_mobile_head_html'], 
	'it_mobile_tail_html' => $row['it_mobile_tail_html'], 
	'it_hit' => $row['it_hit'], 
	'it_time' => $row['it_time'], 
	'it_update_time' => $row['it_update_time'], 
	'it_ip' => $row['it_ip'], 
	'it_order' => $row['it_order'], 
	'it_tel_inq' => $row['it_tel_inq'], 
	'it_info_gubun' => $row['it_info_gubun'], 
	'it_info_value' => $row['it_info_value'], 
	'it_sum_qty' => $row['it_sum_qty'], 
	'it_use_cnt' => $row['it_use_cnt'], 
	'it_use_avg' => $row['it_use_avg'], 
	'it_shop_memo' => $row['it_shop_memo'], 
	'ec_mall_pid' => $row['ec_mall_pid'], 
	'it_img1' => $row['it_img1'], 
	'imgs' => $imgs, 
	'it_option' => $option_item, 
	'it_supply' => $supply_item, 
	'is_orderable' => $is_orderable, 
	'opt_box' => $html,
	'scripts' => $scripts
);

echo json_encode($res_row,JSON_UNESCAPED_UNICODE);
?>

