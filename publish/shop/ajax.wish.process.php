<?php
include_once('./_common.php');
$wish_process = $_POST['wish_process'];
$mb_id = $_POST['mb_id'];
$it_id = $_POST['it_id'];
$wi_ip = getRealIpAddr();
$active_switch = array();
if($wish_process == 0) {
	$sql = "INSERT INTO {$g5['g5_shop_wish_table']} 
				(mb_id, it_id, wi_time, wi_ip) 
			VALUES 
				('{$mb_id}', '{$it_id}', now(),'{$wi_ip}')";
	$active_switch = ['switch' => 1, 'mb_id' => $mb_id, 'it_id' => $it_id];
} else {
	$sql = "DELETE FROM {$g5['g5_shop_wish_table']} 
			WHERE it_id = '$it_id' AND mb_id = '$mb_id'";
	$active_switch = ['switch' => 0, 'mb_id' => $mb_id, 'it_id' => $it_id];
}
sql_query($sql, FALSE);
echo json_encode($active_switch,JSON_UNESCAPED_UNICODE);
?>