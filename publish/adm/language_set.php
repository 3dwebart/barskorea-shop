<?php
$sub_menu = "600100";
include_once('./_common.php');
auth_check($auth[$sub_menu], 'r');

$sql = " SELECT count(*) AS cnt FROM {$g5['g5_language_code_table']} ";
$row = sql_fetch($sql);
$total_count = $row['cnt'];

$orderBy = "sort";
$sort = "ASC";
$sql = " SELECT * FROM `{$g5['g5_language_code_table']}` ORDER BY `use` DESC, sort ASC , lang_code ASC ";
$result = sql_query($sql);

$listall = '<a href="'.$_SERVER['SCRIPT_NAME'].'" class="ov_listall">전체목록</a>';

$langType = array();

$g5['title'] = '언어팩관리';
include_once('./admin.head.php');

$colspan = 15;
?>

<div class="local_ov01 local_ov">
	<?php echo $listall ?>
	<span class="btn_ov01"><span class="ov_txt">생성 및 사용 언어수</span><span class="ov_num"> <?php echo number_format($total_count) ?>개</span></span>
</div>

<form name="fsearch" id="fsearch" class="local_sch01 local_sch" method="get">
	<label for="sfl" class="sound_only">검색대상</label>
	<select name="sfl" id="sfl">
		<option value="bo_table"<?php echo get_selected($_GET['sfl'], "bo_table", true); ?>>TABLE</option>
		<option value="bo_subject"<?php echo get_selected($_GET['sfl'], "bo_subject"); ?>>제목</option>
		<option value="a.gr_id"<?php echo get_selected($_GET['sfl'], "a.gr_id"); ?>>그룹ID</option>
	</select>
	<label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
	<input type="text" name="stx" value="<?php echo $stx ?>" id="stx" required class="required frm_input">
	<input type="submit" value="검색" class="btn_submit">
</form>

<form name="fboardlist" id="fboardlist" action="./board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
	<input type="hidden" name="w" value="">
	<input type="hidden" name="sst" value="<?php echo $sst; ?>">
	<input type="hidden" name="sod" value="<?php echo $sod; ?>">
	<input type="hidden" name="sfl" value="<?php echo $sfl; ?>">
	<input type="hidden" name="stx" value="<?php echo $stx; ?>">
	<input type="hidden" name="page" value="<?php echo $page; ?>">
	<input type="hidden" name="token" value="<?php echo $token; ?>">

	<div class="tbl_head01 tbl_wrap">
		<table>
		<caption><?php echo $g5['title']; ?> 목록</caption>
		<thead>
		<tr>
			<th scope="col">
				<label for="chkall" class="sound_only">언어팩 전체</label>
				<input type="checkbox" name="chkall" value="1" id="chkall" onclick="check_all(this.form)">
			</th>
			<th scope="col"><?php echo subject_sort_link('lang_code', '', 'desc') ?>국제표준 국가3자리 코드</a></th>
			<th scope="col"><?php echo subject_sort_link('lang2_code', '', 'desc') ?>국제표준 국가2자리 코드</a></th>
			<th scope="col"><?php echo subject_sort_link('text') ?>text</a></th>
			<th scope="col"><?php echo subject_sort_link('use') ?>시용여부</a></th>
			<th scope="col"><?php echo subject_sort_link('sort') ?>정렬순서</a></th>
		</tr>
		</thead>
		<tbody>
		<?php
		for ($i=0; $row=sql_fetch_array($result); $i++) {
			$langType[$i] = $row;
			$one_update = '<a href="./board_form.php?w=u&amp;bo_table='.$row['bo_table'].'&amp;'.$qstr.'" class="btn btn_03">수정</a>';
			$one_copy = '<a href="./board_copy.php?bo_table='.$row['bo_table'].'" class="board_copy btn btn_02" target="win_board_copy">복사</a>';

			$bg = 'bg'.($i%2);
		?>

		<tr class="<?php echo $bg; ?>">
			<td class="td_chk">
				<label for="chk_<?php echo $i; ?>" class="sound_only"><?php echo get_text($row['text']) ?></label>
				<input type="checkbox" name="chk[]" value="<?php echo $row['lang_code']; ?>" id="chk_<?php echo $i ?>">
			</td>
			<td>
				<label for="lang_code<?php echo $i; ?>" class="sound_only">국제표준 국가3자리 코드</label>
				<input type="text" name="lang_code[]" value="<?php echo $row['lang_code']; ?>" class="tbl_input bo_subject full_input" id="lang_code<?php echo $i; ?>">
			</td>
			<td>
				<label for="lang2_code<?php echo $i; ?>" class="sound_only">국제표준 국가2자리 코드</label>
				<input type="text" name="lang2_code[]" value="<?php echo $row['lang2_code'] ?>" class="tbl_input bo_subject full_input" id="lang2_code<?php echo $i; ?>">
			</td>
			<td>
				<label for="text_<?php echo $i; ?>" class="sound_only">Full language name</label>
				<input type="text" name="text[]" value="<?php echo $row['text'] ?>" class="tbl_input bo_subject full_input" id="text_<?php echo $i; ?>">
			</td>
			<td>
				<label for="use_<?php echo $i; ?>" class="sound_only">사용여부</label>
				<select name="use[]">
					<option value="0"<?php if ($row['use'] == 0) { echo " selected"; } ?>>비사용</option>
					<option value="1"<?php if ($row['use'] == 1) { echo " selected"; } ?>>사용</option>
				</select>
			</td>
			<td>
				<label for="sort_<?php echo $i; ?>" class="sound_only">정렬순서<strong class="sound_only"> 필수</strong></label>
				<input type="text" name="sort[]" value="<?php echo get_text($row['sort']) ?>" id="sort_<?php echo $i ?>" class="required tbl_input bo_subject full_input" size="10">
			</td>
		</tr>
		<?php
		}
		if ($i == 0) {
			echo '<tr><td colspan="'.$colspan.'" class="empty_table">자료가 없습니다.</td></tr>';
		}
		$tmp = json_encode($langType,JSON_UNESCAPED_UNICODE);
		?>
		</tbody>
		</table>
	</div>

	<div class="btn_fixed_top">
		<input type="submit" name="act_button" value="선택수정" onclick="document.pressed=this.value" class="btn_02 btn">
		<?php if ($is_admin == 'super') { ?>
		<input type="submit" name="act_button" value="선택삭제" onclick="document.pressed=this.value" class="btn_02 btn">
		<?php } ?>
		<?php if ($is_admin == 'super') { ?>
		<a href="./language_set_add.php" id="bo_add" class="btn_01 btn add-btn">언어 추가</a>
		<?php } ?>
	</div>

</form>

<?php echo get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, $_SERVER['SCRIPT_NAME'].'?'.$qstr.'&amp;page='); ?>
<style>
.iso-3166 {
	position: relative;
	padding-right: 15px;
}
.iso-3166:after {
	content: "";
	right: 0;
	top: 25%;
	transform: translateY(-25%);
	position: absolute;
	border-left: 5px solid #333;
	border-top: 5px solid transparent;
	border-bottom: 5px solid transparent;
	border-right: 5px solid transparent;
}
</style>
<link rel="stylesheet" href="./language_set.css">
<a href="https://ko.wikipedia.org/wiki/ISO_3166-1" target="_blank" class="iso-3166">국가코드 참고 자료</a>
<div id="lang-add-window" title="추가할 국가코드 및 정보를 입력하세요.">
	<form action="" id="add-language-form">
		<div class="row">
			<label for="lang_code" class="label-form col-30 pb-1">언어코드(3자리)</label>
			<div class="col-70 pb-1">
				<input type="text" name="lang_code" class="form-control" id="lang_code" maxlength="3" />
			</div>
			<div class="err-msg lang_code_err">언어코드(3자리)에 이미 사용된 코드를 입력하셨습니다.</div>
			<label for="lang2_code" class="label-form col-30 pb-1">언어코드(2자리)</label>
			<div class="col-70 pb-1">
				<input type="text" name="lang2_code" class="form-control" id="lang2_code" maxlength="2" />
			</div>
			<div class="err-msg lang2_code_err">언어코드(2자리)에 이미 사용된 코드를 입력하셨습니다.</div>
			<label for="text" class="label-form col-30 pb-1">사용 언어명(영문)</label>
			<div class="col-70 pb-1">
				<input type="text" name="text" class="form-control" id="text">
			</div>
			<label for="use" class="label-form col-30 pb-1">사용여부</label>
			<div class="col-70 pb-1">
				<select name="use" class="form-control" id="use">
					<option value="0">비사용</option>
					<option value="1">사용</option>
				</select>
			</div>
			<label for="sort" class="label-form col-30 pb-1">정렬순서</label>
			<div class="col-70 pb-1">
				<input type="text" name="sort" class="form-control" id="sort">
			</div>
		</div>
		<!--
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
		-->
	    <div class="add-form-buttons">
	    	<button type="button" class="form-add-ok"><span class="ui-button-icon ui-icon ui-icon-plusthick"></span>추가</button>
	    	<button type="button" class="form-add-cancel"><span class="ui-button-icon ui-icon ui-icon-closethick"></span>닫기</button>
	    </div>
	</form>
</div>
<script>
(function($) {
	jQuery(document).on('click', '.add-btn', function() {
		/********** BIGIN :: 폼 추가 팝업창(jquery UI) **********/
		jQuery("#lang-add-window").dialog({
    		modal: true,
    		resizable: false,
    		width: 500,
		});
		/********** END :: 폼 추가 팝업창(jquery UI) **********/
		return false;
	});
	jQuery('#lang_code').on('change keyup paste', function() {
		var len = jQuery(this).val().length;
		if(len == 3) {
			jQuery('#lang2_code').focus();
		}
	});
	jQuery('#lang2_code').on('change keyup paste', function() {
		var len = jQuery(this).val().length;
		if(len == 2) {
			jQuery('#text').focus();
		}
	});
	jQuery(document).on('click', '.form-add-ok', function() {
		var saveThis = jQuery(this);
		if(jQuery('#lang_code').val() == '') {
			alert('언어코드(3자리)는 필수 입력 입니다.');
			jQuery('#lang_code').focus();
			return false;
		}
		if(jQuery('#lang2_code').val() == '') {
			alert('언어코드(2자리)는 필수 입력 입니다.');
			jQuery('#lang2_code').focus();
			return false;
		}
		if(jQuery('#text').val() == '') {
			alert('사용 언어명(영문)은 필수 입력 입니다.');
			jQuery('#text').focus();
			return false;
		}
		/********** BIGIN :: 같은 국가 코드가 있는지 확인 **********/
		$.ajax({
			url: "<?php echo G5_ADMIN_URL; ?>/language.set.ajax.check.php",
			type: "post",
			data: 
				{
					lang_code : jQuery('#lang_code').val(),
					lang2_code : jQuery('#lang2_code').val()
				},
			dataType: "json",
			cache: false,
			timeout: 30000,
			success: function(data) {
				//debugger;
				if(data.chk1 == 1) {
					jQuery('#lang_code').addClass('err');
					jQuery('.lang_code_err').addClass('err');
				} else {
					jQuery('#lang_code').removeClass('err');
					jQuery('.lang_code_err').removeClass('err');
				}

				if(data.chk2 == 1) {
					jQuery('#lang2_code').addClass('err');
					jQuery('.lang2_code_err').addClass('err');
				} else {
					jQuery('#lang2_code').removeClass('err');
					jQuery('.lang2_code_err').removeClass('err');
				}
				if(data.chk1 == 0 && data.chk2 == 0) {
					jQuery('#w').val('');
					saveThis.closest('form').attr('method', 'post');
					saveThis.closest('form').attr('action', './language_set_update.php');
					saveThis.closest('form').submit();
				}
			},
			error: function(xhr, textStatus, errorThrown) {
				$("div").html("<div>" + textStatus + " (HTTP-" + xhr.status + " / " + errorThrown + ")</div>" );
			}
		});
		/********** END :: 같은 국가 코드가 있는지 확인 **********/
		return false;
	});
	
})(jQuery);
function fboardlist_submit(f)
{
	if (!is_checked("chk[]")) {
		alert(document.pressed+" 하실 항목을 하나 이상 선택하세요.");
		return false;
	}

	if(document.pressed == "선택삭제") {
		if(!confirm("선택한 자료를 정말 삭제하시겠습니까?")) {
			jQuery('#w').val('d');
			return false;
		}
	} else if(document.pressed == "선택수정") {
		jQuery('#w').val('u');
	}

	return true;
}

$(function(){
	$(".board_copy").click(function(){
		window.open(this.href, "win_board_copy", "left=100,top=100,width=550,height=450");
		return false;
	});
});
</script>

<?php
include_once('./admin.tail.php');
?>
