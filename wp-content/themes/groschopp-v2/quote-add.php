<?php

require($_SERVER['DOCUMENT_ROOT'].'/wp-config.php');  
$wp->init();  
$wp->parse_request();  
$wp->query_posts();  
$wp->register_globals();

global $wpdb;

$product = get_product($_REQUEST['id']);

if($_COOKIE['quote']) {
	$count = count($_COOKIE['quote']) + 1;
	setcookie("quote[$count]", base64_encode(json_encode($_REQUEST)), time()+259200, "/", str_replace('http://','',get_bloginfo('url')) );
} else {
	setcookie("quote[1]", base64_encode(json_encode($_REQUEST)), time()+259200, "/", str_replace('http://','',get_bloginfo('url')) );
}

$url = parse_url($_SERVER['HTTP_REFERER']);

if(isset($url['query'])){
	header('location: '.$_SERVER['HTTP_REFERER']."&added=true");
} else {
	header('location: '.$_SERVER['HTTP_REFERER']."?added=true");
}