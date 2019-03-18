(function($) {
	// 위시리스트 버튼 클릭시 회원이 아니면 로그인 유도함
	jQuery(document).on('click', '.btn-list-wishlist', function() {
		var onThis = jQuery(this);
		if(mb_id == '') {
			alert('회원 전용 서비스 입니다.');
			return false;
		} else {
			// console.log('mb_id = ' + mb_id);
			// console.log('it_id = ' + jQuery(this).data('id'));
			if($(this).hasClass('active') == true) {
				wish_process = 1;
			} else {
				wish_process = 0;
			}
			$.ajax({
				url: g5_shop_url + "/ajax.wish.process.php",
				type: "post",
				data: 
					{
						wish_process: wish_process,
						mb_id : mb_id,
						it_id : jQuery(this).data('id')
					},
				dataType: "json",
				cache: false,
				timeout: 30000,
				success: function(data) {
					//debugger;
					console.log('data.switch :: ' + data.switch);
					if(data.switch == 0) {
						onThis.removeClass('active');
					} else if(data.switch == 1) {
						console.log('html :: ' + jQuery(this).html());
						onThis.addClass('active');
					}
				},
				error: function(xhr, textStatus, errorThrown) {
					$("div").html("<div>" + textStatus + " (HTTP-" + xhr.status + " / " + errorThrown + ")</div>" );
				}
			});
			return false;
		}
	});
	/*
		성품 List, 
		main 페이지 상품 리스트, 
		상세페이지 관련상품 리스트에서 Quick view 또는 카트 아이콘 클릭시 이벤트
	*/
	jQuery(document).on('click', '.btn-list-quick-view', function() {
		var onThis = jQuery(this);
		$.ajax({
			url: g5_shop_url + "/ajax.list.quickview.php",
			type: "post",
			data: 
				{
					mb_id : mb_id,
					it_id : jQuery(this).data('id')
				},
			dataType: "json",
			cache: false,
			timeout: 30000,
			success: function(data) {
				//debugger;
				jQuery('.modal-product-info .subject').text(data.it_name);
				jQuery('.modal-product-info .modal-product-price .old-price').html('&#8361;' + data.it_cust_price.format());
				jQuery('.modal-product-info .modal-product-price .new-price').html('&#8361;' + data.it_price.format());
				jQuery('.modal-product-info .see-all').attr('href', g5_shop_url + '/list.php?ca_id=' + data.ca_id);
				jQuery('.modal-product-info .cart-description > p').html(data.it_explan);
				if(data.is_orderable == true) {
					jQuery('#shop_override').remove();
					jQuery('.modal-product-info .price-wrap').remove();
					jQuery('.modal-product-info').before(data.scripts);
					jQuery('.modal-product-info .see-all').after(data.opt_box);
				}
				var it_opt = '';
				if(data.it_option != '') {
					jQuery('.sit_option.it-opt').remove();
					it_opt += '<section class="sit_option it-opt">';
					it_opt += '<h3 class="sound_only">선택옵션</h3>';
					it_opt += data.it_option;
					it_opt += '</section>';
					jQuery('.modal-product-info .see-all').after(it_opt);
				} else {
					jQuery('.sit_option.it-opt').remove();
				}
				// console.log('===================================');
				// console.log(data.imgs);
				// console.log(data.it_option);
				// console.log(data.it_supply);
				// console.log('===================================');
			},
			error: function(xhr, textStatus, errorThrown) {
				$("div").html("<div>" + textStatus + " (HTTP-" + xhr.status + " / " + errorThrown + ")</div>" );
			}
		});
		return false;
	});
})(jQuery);
// 숫자 타입에서 쓸 수 있도록 format() 함수 추가
Number.prototype.format = function() {
    if(this==0) return 0;
 
    var reg = /(^[+-]?\d+)(\d{3})/;
    var n = (this + '');
 
    while (reg.test(n)) n = n.replace(reg, '$1' + ',' + '$2');
 
    return n;
};
 
// 문자열 타입에서 쓸 수 있도록 format() 함수 추가
String.prototype.format = function() {
    var num = parseFloat(this);
    if( isNaN(num) ) return "0";
 
    return num.format();
};
