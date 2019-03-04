<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>

<?php if ($is_admin == 'super') {  ?><!-- <div style='float:left; text-align:center;'>RUN TIME : <?php echo get_microtime()-$begin_time; ?><br></div> --><?php }  ?>

<!-- ie6,7에서 사이드뷰가 게시판 목록에서 아래 사이드뷰에 가려지는 현상 수정 -->
<!--[if lte IE 7]>
<script>
$(function() {
    var $sv_use = $(".sv_use");
    var count = $sv_use.length;

    $sv_use.each(function() {
        $(this).css("z-index", count);
        $(this).css("position", "relative");
        count = count - 1;
    });
});
</script>
<![endif]-->
<!--Imagesloaded-->
<script src="<?php echo G5_ASSETS_URL; ?>/js/imagesloaded.pkgd.min.js"></script> 
<!--Isotope-->
<script src="<?php echo G5_ASSETS_URL; ?>/js/isotope.pkgd.min.js"></script>
<!--Waypoints-->
<script src="<?php echo G5_ASSETS_URL; ?>/js/waypoints.min.js"></script>
<!--Carousel-->
<script src="<?php echo G5_ASSETS_URL; ?>/js/owl.carousel.min.js"></script>
<!--Slick Slider-->
<script src="<?php echo G5_ASSETS_URL; ?>/js/slick.min.js"></script>
<!--Meanmenu-->
<script src="<?php echo G5_ASSETS_URL; ?>/js/jquery.meanmenu.min.js"></script>
<!--Instafeed-->
<script src="<?php echo G5_ASSETS_URL; ?>/js/instafeed.min.js"></script>
<!--Countdown-->
<script src="<?php echo G5_ASSETS_URL; ?>/js/jquery.countdown.min.js"></script>
<!--Counterup-->
<script src="<?php echo G5_ASSETS_URL; ?>/js/jquery.counterup.min.js"></script>
<!--ScrollUp-->
<script src="<?php echo G5_ASSETS_URL; ?>/js/jquery.scrollUp.min.js"></script>
<!--Jquery Ui-->
<script src="<?php echo G5_ASSETS_URL; ?>/js/jquery-ui.js"></script>
<!--Nice Select-->
<script src="<?php echo G5_ASSETS_URL; ?>/js/jquery.nice-select.min.js"></script>
<!--Easy Zoom-->
<script src="<?php echo G5_ASSETS_URL; ?>/js/easyzoom.min.js"></script>
<!--Wow-->
<script src="<?php echo G5_ASSETS_URL; ?>/js/wow.min.js"></script>
<!--Venobox-->
<script src="<?php echo G5_ASSETS_URL; ?>/js/venobox.min.js"></script>
<!--Popper-->
<script src="<?php echo G5_ASSETS_URL; ?>/js/popper.min.js"></script>
<!--Bootstrap-->
<script src="<?php echo G5_ASSETS_URL; ?>/js/bootstrap.min.js"></script>
<!--Plugins-->
<script src="<?php echo G5_ASSETS_URL; ?>/js/plugins.js"></script>
<!--Main Js-->
<script src="<?php echo G5_ASSETS_URL; ?>/js/main.js"></script>
<!-- END :: Add js files -->
</body>
</html>
<?php echo html_end(); // HTML 마지막 처리 함수 : 반드시 넣어주시기 바랍니다. ?>