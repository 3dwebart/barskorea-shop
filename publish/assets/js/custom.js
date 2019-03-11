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
})(jQuery);

