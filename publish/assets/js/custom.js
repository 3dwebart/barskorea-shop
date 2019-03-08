(function($) {
    // 위시리스트 버튼 클릭시 회원이 아니면 로그인 유도함
    jQuery(document).on('click', '.btn-list-wishlist', function() {
        if(mb_id == '') {
        	alert('회원 전용 서비스 입니다.');
        	return false;
        }
    });
})(jQuery);

