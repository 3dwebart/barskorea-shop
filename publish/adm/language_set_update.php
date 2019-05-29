<?php
include_once('./_common.php');
$w          = $_POST['w'];
$lang_code  = $_POST['lang_code'];
$lang2_code = $_POST['lang2_code'];
$text       = $_POST['text'];
$use        = $_POST['use'];
$sort       = $_POST['sort'];
$lang1 = array();
$lang2 = array();
$sql = "SELECT `lang_code`, `lang2_code`, `text`, `use`, `sort` FROM `{$g5['language_code_table']}`";
$res = sql_query($sql);

while ($row = sql_fetch_array($res)) {
	$lang1[] = $row['lang_code'];
	$lang2[] = $row['lang2_code'];
}

$chk1 = 0;
$chk2 = 0;

for ($i=0; $i < count($lang1); $i++) { 
	if($lang1[$i] == $lang_code) {
		$chk1 = 1;
	}
	if($lang2[$i] == $lang2_code) {
		$chk2 = 1;
	}
}

if($w = 'u') {
	$url = './language_set.php';
} else {
	$url = './language_set.php';
}

if($chk1 == 1) {
	alert("이미 사용중인 국가코드(3자리) 입니다.", $url);
}

if($chk2 == 1) {
	alert("이미 사용중인 국가코드(2자리) 입니다.", $url);
}
if($w = 'u') {
	for($i = 0; $i < count($lang_code); $i++) {
		$sql = "UPDATE `{$g5['g5_language_code_table']}` SET `lang_code` = '{$lang_code[$i]}', `lang2_code` = '{$lang2_code[$i]}', `text` = '{$text[$i]}', `use` = '{$use[$i]}', `sort` = '{$sort[$i]}'";
		sql_query($sql);
	}
} else if($w = 'd') {
	$del_id = $_POST['chk'];
	for($i = 0; $i < count($del_id); $i++) {
		$sql = "DELETE FROM `{$g5['g5_language_code_table']}` WHERE `lang_code` IN '{$del_id[$i]}'";
		sql_query($sql);
	}
} else {
	$sql = " INSERT INTO `{$g5['g5_language_code_table']}` (`lang_code`, `lang2_code`, `text`, `use`, `sort`) VALUES ('{$lang_code}','{$lang2_code},'{$text}','{$use}', '{$sort}') ";
	sql_query($sql);
}
?>