<?php
$sub_menu = "600200";
include_once('./_common.php');
$w = $_POST['w'];
$lang_key = $_POST['lang_key'];

$lang_con = array();
if($w == 'u') {
	/********** BIGIN :: Edit contents **********/
	/*
	$sql = "SELECT * FROM `{$g5['g5_language_content_table']}`";
	$res = sql_query($sql);
	while ($row = sql_fetch_array($res)) {
		//$update_sql = "UPDATE `{$g5['g5_language_content_table']}` SET ";
	}
	*/
	/********** END :: Edit contents **********/
} else {
	/********** BIGIN :: Create contents **********/
	/***** BIGIN :: Key 안겹치게 체크함 *****/
	$key_check = 0;
	for ($i=0; $i < count($lang_key); $i++) {
		$sql = "SELECT count(`variable`) AS cnt FROM `{$g5['g5_language_content_table']}` WHERE `variable` = '{$lang_key}'";
		$row = sql_fetch($sql);
		if($row['cnt'] > 0) {
			$key_check = 1;
		}
	}
	if($key_check == 1) {
		$sql = "SELECT `variable` FROM `{$g5['g5_language_content_table']}` WHERE `variable` = '{$lang_key}'";
		$row = sql_fetch($sql);
		alert("등록된 변수명을 사용하셨습니다 확인해 주세요.", G5_ADNIN_URL.'/kanguage_content_set.php?key='.$row['variable']);
	}
	/***** END :: Key 안겹치게 체크함 *****/

	// 설정된 언어 수
	$sql = "SELECT count(lang_code) AS cnt FROM `{$g5['g5_language_code_table']}`";
	$row = sql_fetch($sql);
	$cnt = $row['cnt'];
	/***** BIGIN :: Key 부분 생성(나머지 부분 비워둠.) *****/
	for($i = 0; $i < count($lang_key); $i++) {
		$insert_sql = "INSERT INTO `{$g5['g5_language_content_table']}` (`variable`) VALUES('{$lang_key[$i]}')";
		sql_query($insert_sql);
	}
	/***** END :: Key 부분 생성(나머지 부분 비워둠.) *****/
	/***** BIGIN :: Key 별로 각 언어별 내용 채우기 *****/
	$sql = "SELECT * FROM {$g5['g5_language_code_table']}";
	$res = sql_query($sql);

	while ($row = sql_fetch_array($res)) {
		$lang = $row['lang_code'];
		$lang_column =  'lang_'.$lang;
		$lang_con[$lang] = $_POST['lang_'.$lang];
		for($i = 0; $i < count($lang_con[$lang]); $i++) {
			$update_sql = "UPDATE `{$g5['g5_language_content_table']}` SET {$lang_column} = '{$lang_con[$lang][$i]}' WHERE `variable` = '{$lang_key[$i]}'";
			sql_query($update_sql);
		}
	}
	/***** BIGIN :: Key 별로 각 언어별 내용 채우기 *****/
	/********** END :: Create contents **********/
}
?>