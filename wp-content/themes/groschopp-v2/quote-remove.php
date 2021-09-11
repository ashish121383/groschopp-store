<?php

	require($_SERVER['DOCUMENT_ROOT'].'/wp-config.php');  
	$wp->init();  
	$wp->parse_request();  
	$wp->query_posts();  
	$wp->register_globals();

	global $wpdb;

	remove_product($_GET['product']);
	
	header('location: /quote/');

?>