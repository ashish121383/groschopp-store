<?php

    require($_SERVER['DOCUMENT_ROOT'].'/wp-config.php');  
    $wp->init();  
    $wp->parse_request();  
    $wp->query_posts();  
    $wp->register_globals();

    global $wpdb;

    if(isset($_GET['product'])) {
    	remove_product($_GET['product']);
    }

    if(isset($_GET['gearbox'])) {
    	unset($_SESSION["quote"]['gearbox'][$_GET['gearbox']]);
    }

    if(isset($_GET['control'])) {
    	unset($_SESSION["quote"]['control'][$_GET['control']]);
    }

    if(isset($_GET['accessory'])) {
    	unset($_SESSION["quote"]['accessory'][$_GET['accessory']]);
    }

    if($_SESSION['quote']['count'] > 0) {
        $_SESSION['quote']['count'] = $_SESSION['quote']['count'] - 1;
    }
    
    //header('location: /quote/');

?>