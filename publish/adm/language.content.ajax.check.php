<?php
include_once('./_common.php');
$trans_var = $_POST['lang_key'];
$key = array();
$sql = "SELECT count(`variable`) AS cnt FROM `{$g5['g5_language_content_table']}`";
$row = sql_fetch($sql);
$cnt = $row['cnt'];
if($cnt == 0) {
	$key = array('varCnt' => 0);
} else {
	$tmp_key = 0;

	$sql = "SELECT `variable` FROM `{$g5['g5_language_content_table']}` WHERE `variable` = '{$trans_var}'";
	$row = sql_fetch($sql);
	$test = $row['variable'];
	if($row['variable'] != '') {
		$tmp_key = 1;
	}

	$key = array('varCnt' => $tmp_key, 'cnt' => $cnt, 'test' => $test, 'var' => $trans_var);
}
//$key = array('varCnt' => $tmp_key);
echo json_encode($key,JSON_UNESCAPED_UNICODE);
?>