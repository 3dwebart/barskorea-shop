<?php
include_once('./_common.php');
define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
$email = $_POST['email'];
$url   = $_POST['url'];

$set_table = $g5['newsletter_apply_table'];

$sql = "INSERT INTO $set_table SET email = '$email'";
sql_query($sql);
sql_insert_id();
goto_url($url);
?>
