<?php
include_once('./_common.php');
$wish_process = $_POST['wish_process'];
$mb_id = $_POST['mb_id'];
$it_id = $_POST['it_id'];
$wi_ip = getRealIpAddr();
$images = array();
$sql = "SELECT
			it_id, ca_id, ca_id2, ca_id3, 
			it_skin, it_mobile_skin, it_nameIndex, it_maker, 
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
		$images[] = $row['it_img'.$i];
	}
}
// 기본 배열 89개
$res_row = array(
	'it_id' => $row['it_id'],
	'ca_id' => $row['ca_id'], 
	'ca_id' => $row['ca_id2'], 
	'ca_id' => $row['ca_id3'], 
	'it_skin' => $row['it_skin'], 
	'it_mobile_skin' => $row['it_mobile_skin'], 
	'it_nameIndex' => $row[''], 
	'it_maker' => $row[''], 
	'it_origin' => $row[''], 
	'it_brand' => $row[''], 
	'it_model' => $row[''], 
	'it_option_subject' => $row[''], 
	'it_supply_subject' => $row[''], 
	'it_type1' => $row[''], 
	'it_type2' => $row[''], 
	'it_type3' => $row[''], 
	'it_type4' => $row[''], 
	'it_type5' => $row[''], 
	'it_basic' => $row[''], 
	'it_explan' => $row[''], 
	'it_explan2' => $row[''], 
	'it_mobile_explan' => $row[''], 
	'it_cust_price' => $row[''], 
	'it_price' => $row[''], 
	'it_point' => $row[''], 
	'it_point_type' => $row[''], 
	'it_supply_point' => $row[''], 
	'it_notax' => $row[''], 
	'it_sell_email' => $row[''], 
	'it_use' => $row[''], 
	'it_nocoupon' => $row[''], 
	'it_soldout' => $row[''], 
	'it_stock_qty' => $row[''], 
	'it_stock_sms' => $row[''], 
	'it_noti_qty' => $row[''], 
	'it_sc_type' => $row[''], 
	'it_sc_method' => $row[''], 
	'it_sc_price' => $row[''], 
	'it_sc_minimum' => $row[''], 
	'it_sc_qty' => $row[''], 
	'it_buy_min_qty' => $row[''], 
	'it_buy_max_qty' => $row[''], 
	'it_head_html' => $row[''], 
	'it_tail_html' => $row[''], 
	'it_mobile_head_html' => $row[''], 
	'it_mobile_tail_html' => $row[''], 
	'it_hit' => $row[''], 
	'it_time' => $row[''], 
	'it_update_time' => $row[''], 
	'it_ip' => $row[''], 
	'it_order' => $row[''], 
	'it_tel_inq' => $row[''], 
	'it_info_gubun' => $row[''], 
	'it_info_value' => $row[''], 
	'it_sum_qty' => $row[''], 
	'it_use_cnt' => $row[''], 
	'it_use_avg' => $row[''], 
	'it_shop_memo' => $row[''], 
	'ec_mall_pid' => $row[''], 
	'images' => $images
);

echo json_encode($row,JSON_UNESCAPED_UNICODE);
?>

