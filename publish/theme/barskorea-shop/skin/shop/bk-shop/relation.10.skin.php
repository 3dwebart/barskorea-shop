<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.G5_SHOP_CSS_URL.'/style.css">', 0);
add_javascript('<script src="'.G5_JS_URL.'/jquery.bxslider.js"></script>', 10);
?>
<!-- 상품진열 10 시작 { -->
<?php
for ($i=1; $row=sql_fetch_array($result); $i++) {
	echo "<div class=\"col-md-4 col-lg-3\">\n";
	echo "<div class=\"single-product mb-40\">\n";
	/* BIGIN :: Single Product  */
	
	echo "<div class=\"product-img\">\n";
	if ($this->href) {
		
		echo "<a href=\"{$this->href}{$row['it_id']}\">\n";
	}

	if ($this->view_it_img) {
		echo get_it_image($row['it_id'], $this->img_width, $this->img_height, '', '', stripslashes($row['it_name']))."\n";
	}

	if ($this->href) {
		echo "</a>\n";
	}

	$is_score = array();
	$is_score_sum = array();
	$star1 = array();
	$star2 = array();
	$star3 = array();
	$star4 = array();
	$star5 = array();
	$cnt = array();

	$is_score[$i] = 0;
	$is_score_sum[$i] = 0;
	$it_id = $row['it_id'];

	$sql2 = "SELECT count(it_id) AS cnt FROM {$g5['g5_shop_item_use_table']} WHERE it_id = '$it_id'";
	$row2 = sql_fetch($sql2);
	$cnt[$i] = $row2['cnt'];

	$sql3 = "SELECT is_score FROM {$g5['g5_shop_item_use_table']} WHERE it_id = '$it_id'";
	$res3 = sql_query($sql3);
	while ($row3 = sql_fetch_array($res3)) {
		$is_score_sum[$i] += $row3['is_score'];
	}

	$is_score[$i] = (int)ceil($is_score_sum[$i] / $cnt[$i]);

	if($is_score[$i] < 1) {
		$star1[$i] = '-o';
	} else {
		$star1[$i] = '';
	}

	if($is_score[$i] < 2) {
		$star2[$i] = '-o';
	} else {
		$star2[$i] = '';
	}

	if($is_score[$i] < 3) {
		$star3[$i] = '-o';
	} else {
		$star3[$i] = '';
	}

	if($is_score[$i] < 4) {
		$star4[$i] = '-o';
	} else {
		$star4[$i] = '';
	}

	if($is_score[$i] < 5) {
		$star5[$i] = '-o';
	} else {
		$star5[$i] = '';
	}
	$tmplete1 = '';
	$tmplete1 .= '<span class="onsale">'.PHP_EOL;
	$tmplete1 .= '<span>Sale!</span>';
	$tmplete1 .= '</span>';
	$tmplete1 .= '<div class="product-action">';
    $tmplete1 .= '<ul>';
    $tmplete1 .= '<li><a href="#" data-toggle="tooltip" title="Add To Cart" class="btn-list-cart"><i class="fa fa-shopping-cart"></i></a></li>';
    $tmplete1 .= '<li><a href="#" data-toggle="tooltip" title="Add To Wishlist" class="btn-list-wishlist"><i class="fa fa-heart-o"></i></a></li>';
    $tmplete1 .= '<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare" class="btn-list-compare"><i class="fa fa-refresh"></i></a></li>';
    $tmplete1 .= '</ul>';
	$tmplete1 .= '<div class="quickviewbtn">';
	$tmplete1 .= '<a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i>Quick View</a>';
	$tmplete1 .= '</div>';
	$tmplete1 .= '</div>';
	$tmplete1 .= '</div>';

	echo $tmplete1;

	$tmplete2 = '';
	$tmplete2 .= '<div class="product-content">'.PHP_EOL;
	$tmplete2 .= '<h4>'.PHP_EOL;
	if ($this->href) {
		$tmplete2 .= "<a href=\"{$this->href}{$row['it_id']}\">".PHP_EOL;
	}
	if ($this->view_it_name) {
		$tmplete2 .= stripslashes($row['it_name']).PHP_EOL;
	}
	if ($this->href) {
		$tmplete2 .= '</a>'.PHP_EOL;
	}
	$tmplete2 .= '</h4>'.PHP_EOL;
	$tmplete2 .= '<div class="product-reviews">'.PHP_EOL;
	$tmplete2 .= '<i class="fa fa-star'.$star1[$i].'"></i>'.PHP_EOL;
	$tmplete2 .= '<i class="fa fa-star'.$star2[$i].'"></i>'.PHP_EOL;
	$tmplete2 .= '<i class="fa fa-star'.$star3[$i].'"></i>'.PHP_EOL;
	$tmplete2 .= '<i class="fa fa-star'.$star4[$i].'"></i>'.PHP_EOL;
	$tmplete2 .= '<i class="fa fa-star'.$star5[$i].'"></i>'.PHP_EOL;
	$tmplete2 .= '</div>'.PHP_EOL;
	$tmplete2 .= '</div>'.PHP_EOL;
	$tmplete2 .= '<div class="product-price">'.PHP_EOL;
	if ($this->view_it_cust_price || $this->view_it_price) {
		if ($this->view_it_price) {
			$tmplete2 .= '<span class="price">'.PHP_EOL;
			$tmplete2 .= display_price(get_price($row), $row['it_tel_inq']).PHP_EOL;
			$tmplete2 .= '</span>'.PHP_EOL;
		}
		$tmplete2 .= '<span class="regular-price">'.PHP_EOL;
		$tmplete2 .= '<strike>'.display_price($row['it_cust_price']).'</strike>'.PHP_EOL;
		$tmplete2 .= '</span>'.PHP_EOL;
	}
	$tmplete2 .= '</div>';

	echo $tmplete2;

	/* END :: Single Product  */
	echo "</div>\n";
	echo "</div>\n";
}

if($i == 1) echo "<p class=\"sct_noitem\">등록된 상품이 없습니다.</p>\n";
?>
<!-- } 상품진열 10 끝 -->
<script>
$(document).ready(function() {
	$('.scr_10').bxSlider({
		slideWidth: 160,
		minSlides: 5,
		maxSlides: 5,
		slideMargin: 20,
		pager:false
	});
});
</script>