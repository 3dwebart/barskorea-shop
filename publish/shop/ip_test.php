 <?php
function getRealIpAddr() {
	if(!empty($_SERVER['HTTP_CLIENT_IP']) && getenv('HTTP_CLIENT_IP')) {
		return $_SERVER['HTTP_CLIENT_IP'];
	}
	elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR']) && getenv('HTTP_X_FORWARDED_FOR')) {
		return $_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	elseif(!empty($_SERVER['REMOTE_HOST']) && getenv('REMOTE_HOST')) {
		return $_SERVER['REMOTE_HOST'];
	}
	elseif(!empty($_SERVER['REMOTE_ADDR']) && getenv('REMOTE_ADDR')) {
		return $_SERVER['REMOTE_ADDR'];
	}
	return false;
}

$ip = getRealIpAddr();
echo $ip;
?>