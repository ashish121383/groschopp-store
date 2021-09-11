<?php

require($_SERVER['DOCUMENT_ROOT'].'/wp-config.php');  
$wp->init();  
$wp->parse_request();  
$wp->query_posts();  
$wp->register_globals();

global $wpdb;

if(isset($_REQUEST['id'])) {
	$product = get_product($_REQUEST['id']);
	$_SESSION["quote"]['product'][] = base64_encode(json_encode($_REQUEST));
} elseif($_REQUEST['accessory']) {
	$product = $_REQUEST['accessory'];
	$_SESSION["quote"]['accessory'][] = base64_encode(json_encode($_REQUEST));
} elseif($_REQUEST['gearbox']) {
	$product = $_REQUEST['gearbox'];
	$_SESSION["quote"]['gearbox'][] = base64_encode(json_encode($_REQUEST));
} elseif($_REQUEST['control']) {
	$product = $_REQUEST['control'];
	$_SESSION["quote"]['control'][] = base64_encode(json_encode($_REQUEST));
} 

$_SESSION['quote']['count'] = $_SESSION['quote']['count'] + 1;

if($_REQUEST['resetquote']) {
	$_SESSION['quote']['count'] = 0;
	echo var_dump($_SESSION['quote']);
}

$url = parse_url($_SERVER['HTTP_REFERER']);