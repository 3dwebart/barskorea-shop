<?php
$sub_menu = "600200";
include_once('./_common.php');
$langKey = $_GET['key'];
if(empty($langKey)) {
	$langKey = '';
}
$db = G5_MYSQL_DB;
$table = $g5['g5_language_content_table'];
$language_set = array();
$sql = " SELECT * FROM `{$g5['g5_language_code_table']}` ORDER BY `use` DESC, sort ASC , lang_code ASC ";
$res = sql_query($sql);
echo $table;
while ($row = sql_fetch_array($res)) {
	$lang_column = 'lang_'.$row['lang_code'];
	$lang_name = $row['text'];
	/* BIGIN :: A query statement that searches for the language */
	$compare = "SELECT EXISTS (
		SELECT 1 FROM Information_schema.columns
		WHERE table_schema = '{$db}' 
		AND table_name = '{$table}' 
		AND column_name = '{$lang_column}'
	) AS flag";
	$compare_row = sql_fetch($compare);
	/* END :: A query statement that searches for the language */
	/* BIGIN :: If no such language exists, create */
	if($compare_row['flag'] == 0) {
		$add_column = "ALTER TABLE {$g5['g5_language_content_table']} ADD `{$lang_column}` VARCHAR(255) NOT NULL COMMENT '{$lang_name}'";
		sql_query($add_column);
	}
	/* END :: If no such language exists, create */
}
$g5['title'] = '언어팩 컨텐츠 관리';
include_once('./admin.head.php');
$sql = " SELECT * FROM `{$g5['g5_language_code_table']}` ORDER BY `use` DESC, sort ASC , lang_code ASC ";
$res = sql_query($sql);
?>
<link rel="stylesheet" href="./language_set.css">
<div class="d-flex justify-content-flex-end">
	<a href="./language_content_add.php" class="add-variable">언어팩 추가</a>
</div>
<?php
	while ($row = sql_fetch_array($res)) {
		$language_set[] = $row;
	}
?>
<div class="tab-nav">
<?php for ($i = 0; $i < count($language_set); $i++) { ?>
<a href="#<?php echo $language_set[$i]['lang_code'] ?>"<?php echo ($i == 0) ? ' class="active"' : ''; ?>><?php echo $language_set[$i]['lang_code'] ?></a>
<?php } ?>
</div>
<form method="post" action="./language_content_update.php">
	<div class="key-hidden-form">
	<?php
		$sql = "SELECT `variable` AS `key` FROM `{$g5['g5_language_content_table']}`";
		$res = sql_query($sql);
		$tmp_key = array();
		while ($row = sql_fetch_array($res)) {
			echo "<input type=\"hidden\" name=\"lang_key[]\" value=\"".$row['key']."\" />\n";
			$tmp_key[] = $row['key'];
		}
	?>
	</div>
	<div class="origin-key-hidden-form">
		<?php
			for ($i=0; $i < count($tmp_key); $i++) { 
				echo "<input type=\"hidden\" name=\"lang_key_origin[]\" value=\"".$tmp_key[$i]."\" />\n";
			}
		?>
	</div>
	<input type="hidden" name="w" value="u">
	<div class="tab-content">
		<?php for ($i = 0; $i < count($language_set); $i++) { ?>
		<div class="content<?php echo $i == 0 ? ' active' : ''; ?>" id="<?php echo $language_set[$i]['lang_code']; ?>">
			<div class="language-set">
				<div class="lang-var language-header">변수</div>
				<div class="lang-con language-header">내용</div>
				<?php
					$lang_con = 'lang_'.$language_set[$i]['lang_code'];
					$lang_sql = "SELECT `variable`, `{$lang_con}` FROM `{$g5['g5_language_content_table']}`";
					$lang_res = sql_query($lang_sql);
					//$lang_cnt = sql_num_rows($lang_res);
					while ($lang_row = sql_fetch_array($lang_res)) {
				?>
				<div class="">
					<input type="text" name="lang_var[]" class="tbl_input bo_subject full_input" value="<?php echo $lang_row['variable']; ?>">
				</div>
				<div class="">
					<input type="text" name="lang_<?php echo $language_set[$i]['lang_code']; ?>[]" class="tbl_input bo_subject full_input" value="<?php echo $lang_row['lang_'.$language_set[$i]['lang_code']]; ?>">
				</div>
				<?php
					}
				?>
			</div>
		</div>
		<?php } ?>
	</div>
	<?php if(count($language_set) > 0) { ?>
	<button type="submit" class="btn-ok"><span class="ui-button-icon ui-icon ui-icon-check"></span> 일괄 수정</button>
	<?php } ?>
</form>
<script>
(function($) {
	var EleVarArr = Array();
	jQuery('.language-set > div').on('click', function() {
		var EleIndex = jQuery(this).index() / 2 - 1;
		jQuery(this).find('input[name^="lang_var"]').on('change keyup paste', function() {
			var EleVar = jQuery(this).val();
			jQuery('.key-hidden-form input[type="hidden"]').eq(EleIndex).val(EleVar);
			/*
			console.log('============' + EleIndex + '============');
			console.log(EleVar);
			console.log('====================================');
			*/
		});
	});
	/* BIGIN :: 키값이 있어서 리턴되어 돌아 왔을때 처리 */
	var key = '<?php echo $langKey; ?>';
	if(key != '') {
		jQuery('.lang_var').parent().find('.mask').addClass('checking');
	}
	/* END :: 키값이 있어서 리턴되어 돌아 왔을때 처리 */

	jQuery('.tab-nav').on('click', 'a', function() {
		var linkTab = jQuery(this).attr('href');
		jQuery(this).siblings().removeClass('active');
		jQuery(this).addClass('active');
		jQuery('.tab-content').find(linkTab).siblings().removeClass('active');
		jQuery('.tab-content').find(linkTab).addClass('active');

		return false;
	});
})(jQuery);
</script>
<?php
include_once('./admin.tail.php');
?>