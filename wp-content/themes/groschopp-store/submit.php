<?php

require($_SERVER['DOCUMENT_ROOT'].'/wp-config.php');
$wp->init();
$wp->parse_request();
$wp->query_posts();
$wp->register_globals();

if($_POST) {
	if(wp_verify_nonce( $_POST['_wpnonce'], 'custom-motor-' . $_POST['id'] )) {

		$values = array_filter($_POST, function($value) { return $value !== ''; });
		unset($values['id']);
		unset($values['PHP_SESSION_UPLOAD_PROGRESS']);

		$name = md5(time());

		set_transient( $name, json_encode($values), 3600);

		wp_redirect(get_permalink(16910) . "?token=" . $name);
		exit;
	}
}