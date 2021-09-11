<?php

require($_SERVER['DOCUMENT_ROOT'].'/wp-config.php');  
$wp->init();  
$wp->parse_request();  
$wp->query_posts();  
$wp->register_globals();

$row = 1;
if (($handle = fopen("related_items.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
    	if($row == 1) {
    		$row++;
    		continue;
    	}

    	echo "<pre>".print_r($data, true)."</pre>";

        $num = count($data);

        for ($c=1; $c < $num; $c++) {
        	if($data[$c] != "") {
	            $wpdb->insert('product_items', array(
	            	'product_id' => $data[0],
	            	'related_item_id' => $c,
	            	'value' => strtolower($data[$c])
	            ));
        	}
        }

        $row++;
    }
    fclose($handle);
}