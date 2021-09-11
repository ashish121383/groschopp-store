<?php

require($_SERVER['DOCUMENT_ROOT'].'/wp-config.php');  
$wp->init();  
$wp->parse_request();  
$wp->query_posts();  
$wp->register_globals();

global $wpdb;

$product = get_product($_GET['id']);
set_product($product->id);


//print_r($_COOKIE);

?>

<html>
	<head>
		<title></title>
	</head>
	
	<body>
		<div class="popup">
			<h2>The following item has been added to your quote cart.</h2>
			<h3><?php echo $product->model?></h3>
			

			<p><a href="/category/products/">Continue shopping</a> or complete the "<a href="/quote">Quote Cart</a>" form.</p>
		</div>
	</body>
</html>