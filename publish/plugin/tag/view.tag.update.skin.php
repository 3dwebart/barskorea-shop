<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (!$board['bo_use_tag']) return;

if( $wr_id && $_POST['tags'] ){
	$tags = $_POST['tags'];

	$que	=	"UPDATE ".$write_table." SET tags = '".$tags."' WHERE wr_id = '".$wr_id."'";

	sql_query( $que , false );	
	
	$arrtag = explode(",", $tags);

	foreach( $arrtag as $key => $val ){ 
		$val = trim($val);
		$que	=	"INSERT INTO ".COMP_TAG." SET bo_table = '$bo_table', wr_id = '$wr_id', ct_tag = '".$val."', ct_ip = '".$_SERVER['REMOTE_ADDR']."', ct_regdate = now()";
		sql_query( $que , false );	
	}
}
?>
