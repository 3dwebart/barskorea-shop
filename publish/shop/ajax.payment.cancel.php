<?php
include_once('./_common.php');
$mb_id = $_POST['mb_id'];
$tmp_cart_id = $_POST['tmp_cart_id'];
$sql = "UPDATE {$g5['g5_shop_cart_table']} 
		SET ct_select = 0 
		WHERE mb_id = '$mb_id' 
		AND od_id = '$tmp_cart_id' 
		AND ct_status = '쇼핑' 
		AND ct_select = 1";
sql_query($sql);
?>