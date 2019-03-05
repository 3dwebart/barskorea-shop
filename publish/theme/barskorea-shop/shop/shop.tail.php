<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MSHOP_PATH.'/shop.tail.php');
    return;
}

$admin = get_admin("super");

// 사용자 화면 우측과 하단을 담당하는 페이지입니다.
// 우측, 하단 화면을 꾸미려면 이 파일을 수정합니다.
?>

    <!-- </div> -->
    <!-- } 콘텐츠 끝 -->
<!-- </div> -->

<!-- 하단 시작 { -->
<!--Footer Area Start-->
<footer>
    <div class="footer-container">
        <!--Footer Top Area Start-->
        <div class="footer-top-area black-bg pt-85 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12">
                        <!--Single Footer Widget Start-->
                        <div class="single-footer-widget mb-35">
                            <div class="footer-title">
                                <h3>Shop Location</h3>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dignissim erat ut laoreet pharetra....</p>
                            <div class="contact-info">
                                <ul>
                                    <li><i class="fa fa-home"></i> No. 96, Jecica City, NJ 07305, New York, USA</li>
                                    <li><i class="fa fa-phone"></i> <a href="#"> +1 222 3333</a></li>
                                    <li><i class="fa fa-envelope-o"></i> <a href="#"> info@example.com</a></li>
                                </ul>
                            </div>
                        </div>
                        <!--Single Footer Widget End-->
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!--Single Footer Widget Start-->
                        <div class="single-footer-widget mb-35">
                            <div class="footer-title">
                                <h3>Demo Links</h3>
                            </div>
                            <ul class="link-widget">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Our Office</a></li>
                                <li><a href="#">Delivery</a></li>
                                <li><a href="#">Our Store</a></li>
                                <li><a href="#">Guarantee</a></li>
                                <li><a href="#">Buy Gift Card</a></li>
                                <li><a href="#">Return Policy</a></li>
                            </ul>
                        </div>
                        <!--Single Footer Widget End-->
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!--Single Footer Widget Start-->
                        <div class="single-footer-widget mb-35">
                            <div class="footer-title">
                                <h3>More Links</h3>
                                <ul class="link-widget">
                                <li><a href="#">Tracking Your Order</a></li>
                                <li><a href="#">Terms & Condition</a></li>
                                <li><a href="#">Contact us</a></li>
                                <li><a href="#">Manufactureres</a></li>
                                <li><a href="#">New Brands</a></li>
                                <li><a href="#">News & Blog</a></li>
                                <li><a href="#">Trending Products</a></li>
                            </ul>
                            </div>
                        </div>
                        <!--Single Footer Widget End-->
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!--Single Footer Widget Start-->
                        <div class="single-footer-widget mb-35">
                            <div class="footer-title">
                                <h3>Newsletter</h3>
                            </div>
                            <div class="footer-mailchimp">
                                <form action="<?php echo G5_URL; ?>/newsletter_apply.php" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="popup-subscribe-form validate" novalidate>
                                    <?php $url = G5_URL . $_SERVER['REQUEST_URI']; ?>
                                    <input type="hidden" name="url" value="<?php echo $url; ?>">
                                   <div id="mc_embed_signup_scroll">
                                      <div id="mc-form" class="mc-form subscribe-form" >
                                        <input id="mc-email" name="email" type="email" autocomplete="off" placeholder="Enter your email here" />
                                        <span class="icon"><i class="fa fa-angle-right"></i></span>
                                        <button type="submit" id="mc-submit">Subscribe</button>
                                      </div>
                                   </div>
                               </form>
                            </div> 
                            <div class="footer-title">
                                <h3>Stay Connected</h3>
                            </div>
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-rss"></i></a></li>
                            </ul>
                        </div>
                        <!--Single Footer Widget End-->
                    </div>
                </div>
            </div>
        </div> 
        <!--Footer Top Area End--> 
        <!--Footer Middle Area Start--> 
        <div class="footer-middle-area black-bg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="footer-payments-image">
                            <img src="<?php echo G5_ASSETS_URL; ?>/img/payment/payment-icon.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Footer Middle Area End--> 
        <!--Footer Bottom Area Start-->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="footer-copyright">
                            <p>Copyright &copy; <a href="#">ANADI.</a> All Rights Reserved</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="footer-design-by text-right">
                            <p>Designed by HasTech.company</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <!--Footer Bottom Area End--> 
    </div>
</footer>
<!--Footer Area End-->
<?php /*
<div id="ft">
    <div class="ft_wr">
        <ul class="ft_ul">
            <li><a href="<?php echo G5_BBS_URL; ?>/content.php?co_id=company">회사소개</a></li>
            <li><a href="<?php echo G5_BBS_URL; ?>/content.php?co_id=provision">서비스이용약관</a></li>
            <li><a href="<?php echo G5_BBS_URL; ?>/content.php?co_id=privacy">개인정보처리방침</a></li>
            <li><a href="<?php echo get_device_change_url(); ?>">모바일버전</a></li>
        </ul>
        
        <a href="<?php echo G5_SHOP_URL; ?>/" id="ft_logo"><img src="<?php echo G5_DATA_URL; ?>/common/logo_img2" alt="처음으로"></a>

        <div class="ft_info">
            <span><b>회사명</b> <?php echo $default['de_admin_company_name']; ?></span>
            <span><b>주소</b> <?php echo $default['de_admin_company_addr']; ?></span><br>
            <span><b>사업자 등록번호</b> <?php echo $default['de_admin_company_saupja_no']; ?></span>
            <span><b>대표</b> <?php echo $default['de_admin_company_owner']; ?></span>
            <span><b>전화</b> <?php echo $default['de_admin_company_tel']; ?></span>
            <span><b>팩스</b> <?php echo $default['de_admin_company_fax']; ?></span><br>
            <!-- <span><b>운영자</b> <?php echo $admin['mb_name']; ?></span><br> -->
            <span><b>통신판매업신고번호</b> <?php echo $default['de_admin_tongsin_no']; ?></span>
            <span><b>개인정보 보호책임자</b> <?php echo $default['de_admin_info_name']; ?></span>

            <?php if ($default['de_admin_buga_no']) echo '<span><b>부가통신사업신고번호</b> '.$default['de_admin_buga_no'].'</span>'; ?><br>
            Copyright &copy; 2001-2013 <?php echo $default['de_admin_company_name']; ?>. All Rights Reserved.
        </div>

        <div class="ft_cs">
            <h2>고객센터</h2>
            <strong>02-123-1234</strong>
            <p>월-금 am 9:00 - pm 05:00<br>점심시간 : am 12:00 - pm 01:00</p>
        </div>
        <button type="button" id="top_btn"><i class="fa fa-arrow-up" aria-hidden="true"></i><span class="sound_only">상단으로</span></button>
        <script>
        
        $(function() {
            $("#top_btn").on("click", function() {
                $("html, body").animate({scrollTop:0}, '500');
                return false;
            });
        });
        </script>
    </div>
</div>
*/ ?>
<!-- } 하단 끝 -->
<?php
$sec = get_microtime() - $begin_time;
$file = $_SERVER['SCRIPT_NAME'];

if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
?>
</div>
<!-- END :: wrapper -->
<script src="<?php echo G5_JS_URL; ?>/sns.js"></script>
<?php
include_once(G5_THEME_PATH.'/tail.sub.php');
?>
