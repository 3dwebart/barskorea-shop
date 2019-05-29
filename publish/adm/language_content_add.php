<?php
$sub_menu = "600200";
include_once('./_common.php');
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
$g5['title'] = '언어팩 컨텐츠 추가';
include_once('./admin.head.php');
$sql = " SELECT * FROM `{$g5['g5_language_code_table']}` ORDER BY `use` DESC, sort ASC , lang_code ASC ";
$res = sql_query($sql);
?>
<link rel="stylesheet" href="./language_set.css">
<div class="large-btn-group">
	<a href="./language_content_set.php" class="btn-back">
		back
	</a>
	<button type="button" class="add-variable">변수 추가</button>
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
<form method="post" action="./language_content_update.php" id="myForm">
	<input type="hidden" id="var_count" value="">
	<div class="lang-key"></div>
	<input type="hidden" name="w" value="">
	<div class="tab-content">
		<?php for ($i = 0; $i < count($language_set); $i++) { ?>
		<div class="content<?php echo $i == 0 ? ' active' : ''; ?>" id="<?php echo $language_set[$i]['lang_code']; ?>">
			<input type="hidden" class="lang_code" val>
			<div class="language-set" id="<?php echo $language_set[$i]['lang_code']; ?>">
				<div class="lang-var language-header">변수</div>
				<div class="lang-con language-header">내용</div>
			</div>
		</div>
		<?php } ?>
	</div>
	<button type="submit" class="btn-ok"><span class="ui-button-icon ui-icon ui-icon-check"></span>Submit</button>
</form>
<div id="var-add-window" title="추가할 변수를 입력하세요.">
	<form action="" id="add-language-form">
		<div class="add-form">
			<input type="text" name="trans_var" class="trans_var tbl_input bo_subject full_input" style="width: 100%; height: 28px; line-height: 28px; padding: 0 10px;" />
		</div>
	    <p class="you-must-read-it">
	    	<strong>* 변수명 작성시 유의사항</strong>
	    	<span>* 특수문자는 _ 외에 사용하시면 안됩니다.</span>
	    	<span>* 공백은 사용하시면 안됩니다.</span>
	    	<span>* 직관적인 단어를 사용하십시오.</span>
	    	<span>* 영문 또는 숫자로 입력하시되 첫 글자는 영문으로 작성하십시오.</span>
	    	<span style="margin-top: 1rem;">예) 표현할 텍스트 : member login</span>
	    	<span>예) 변수명 : memberLogin (O)</span>
	    	<span>예) 변수명 : member_login (O)</span>
	    	<span>예) 변수명 : member login (X) - 공백사용</span>
	    	<span>예) 변수명 : member-login (X) - 특수문자 - 사용</span>
	    </p>
	    <div class="add-form-buttons">
	    	<button type="button" class="form-add-ok"><span class="ui-button-icon ui-icon ui-icon-plusthick"></span>추가</button>
	    	<button type="button" class="form-add-cancel"><span class="ui-button-icon ui-icon ui-icon-closethick"></span>닫기</button>
	    </div>
	</form>
</div>
<script>
(function($) {
	var key = '<?php echo $langKey; ?>';
	var compareVar = 0;
	function inputHtml(v) {
		var html = '';
		html += '<div class="lang-var-div">';
		html += '<div class="mask"></div>';
		html += '<input type="text" name="lang_var[]" class="lang_var tbl_input bo_subject full_input" readonly="" value="' + v + '" />';
		html += '</div>';
		html += '<div>';
		html += '<input type="text" name="lang_con[]" class="lang_con tbl_input bo_subject full_input" />';
		html += '</div>';

		return html;
	}

	jQuery('.tab-nav').on('click', 'a', function() {
		var linkTab = jQuery(this).attr('href');
		jQuery(this).siblings().removeClass('active');
		jQuery(this).addClass('active');
		jQuery('.tab-content').find(linkTab).siblings().removeClass('active');
		jQuery('.tab-content').find(linkTab).addClass('active');

		return false;
	});
	jQuery(document).on('click', '.add-variable', function() {
		/********** BIGIN :: 폼 추가 팝업창(jquery UI) **********/
		jQuery("#var-add-window").dialog({
    		modal: true,
    		resizable: false,
    		width: 500,
		});
		/********** END :: 폼 추가 팝업창(jquery UI) **********/
	});

	jQuery(document).on('click', '.form-add-cancel', function() {
		/********** BIGIN :: jquery UI Close **********/
		jQuery("#var-add-window").dialog('close');
		/********** END :: jquery UI Close **********/
	});

	jQuery(document).on('click', '.form-add-ok', function(e) {
		/********** BIGIN :: 추가 버튼을 눌렀을 때 폼 추가 됨 **********/
		var formVal = jQuery(this).closest('#var-add-window').find('.trans_var').val();
		console.log('formVal : ' + formVal);
		var chkVar = 0;
		jQuery('.lang_var').each(function() {
			if(jQuery(this).val() == formVal) {
				chkVar = 1;
			}
		});
		if(formVal == '' || formVal === 'undefined') {
			alert('변수값을 입력해 주세요.');
			jQuery(this).closest('#var-add-window').find('.trans_var').focus();
			return false;
		} else {
			/* 
				BIGIN :
				DB 에 저장된 키(변수)가 있는지 체크함.
				있다면 해당 키와 같은 값이 있는지 체크함.
			*/
			$.ajax({
				url: "<?php echo G5_ADMIN_URL; ?>/language.content.ajax.check.php",
				type: "post",
				data: 
					{
						lang_key : formVal
					},
				dataType: "json",
				cache: false,
				timeout: 30000,
				success: function(data) {
					//debugger;
					console.log(data);
					var varCnt = data.varCnt;
					if(varCnt == 1) {
						alert('변수명이 이미 사용중 입니다.');
					} else {
						/* 
							END :
							DB 에 저장된 키(변수)가 있는지 체크함.
							있다면 해당 키와 같은 값이 있는지 체크함.
						*/
						// BIGIN :: 각 언어별로 추가
						if(chkVar == 0) {
							jQuery('.lang-key').append('<input type="hidden" name="lang_key[]" value="' + formVal + '" />');
							jQuery('.language-set').each(function() {
								jQuery(this).append(inputHtml(formVal));
								jQuery('.tab-content .content').each(function() {
									var contentName = 'lang_' + jQuery(this).attr('id');
									jQuery(this).find('input.lang_con').attr('name', contentName + '[]');
								});
							});
							var countVar = jQuery('.content .language-set .lang_var').length / jQuery('.tab-nav a').length;
							jQuery('#var_count').val(countVar);
						} else {
							alert('사용된 변수명 입니다.');
						}
						// END :: 각 언어별로 추가
					}
				},
				error: function(xhr, textStatus, errorThrown) {
					$("div").html("<div>" + textStatus + " (HTTP-" + xhr.status + " / " + errorThrown + ")</div>" );
				}
			});
			// BIGIN :: 추가 완료 후 폼 Clear
			jQuery(this).closest('form').each(function() {
				this.reset();
			});
			jQuery(this).closest('#var-add-window').find('.trans_var').focus();
			// END :: 추가 완료 후 폼 Clear
		}
		/********** END :: 추가 버튼을 눌렀을 때 폼 추가 됨 **********/
		// var formLen = jQuery('input[name^="lang_var"]').length;
	});
})(jQuery);
</script>
<?php
include_once('./admin.tail.php');
?>