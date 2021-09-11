<?php

	ini_set('display_errors', true);
	
	require($_SERVER['DOCUMENT_ROOT'].'/wp-config.php');  
	$wp->init();  
	$wp->parse_request();  
	$wp->query_posts();  
	$wp->register_globals();
	
	global $wpdb;

	// Variables
	$file = "http://www.groschopp.com/data/STP/STP_setup.exe";
	$filename = "STP_setup.exe";

	// Update download log
	$wpdb->query("INSERT INTO download_log VALUES(null, NOW())");
	
	// Output file
	// header('Content-type: application/force-download');
	// header('Content-Disposition: attachment; filename="'.$filename.'"');
	// readfile($file);
	
	header('Content-Description: File Transfer');
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename="'.$filename.'"');
	header('Content-Transfer-Encoding: binary');
	header('Expires: 0');
	header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	header('Pragma: public');
	header('Content-Length: ' . filesize($file));
	@ flush();
	readfile($file);