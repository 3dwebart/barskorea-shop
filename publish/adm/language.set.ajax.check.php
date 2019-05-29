<?php
include_once('./_common.php');
$lang_code  = $_POST['lang_code'];
$lang2_code = $_POST['lang2_code'];
$lang_chk1  = 0;
$lang_chk2  = 0;
$lang1      = '';
$lang2      = '';
$sql = "SELECT `lang_code`, `lang2_code`, `text`, `use`, `sort` FROM `{$g5['g5_language_code_table']}`";
$res = sql_query($sql);
while ($row = sql_fetch_array($res)) {
	if($row['lang_code'] == $lang_code) {
		$lang_chk1  = 1;
		$lang1 = $row['lang_code'];
	}
	if($row['lang2_code'] == $lang2_code) {
		$lang_chk2  = 1;
		$lang2 = $row['lang2_code'];
	}
}
$natch = array(
	'chk1' => $lang_chk1,
	'lang1' => $lang1,
	'chk2' => $lang_chk2,
	'lang2' => $lang2
);
echo json_encode($natch,JSON_UNESCAPED_UNICODE);
?>