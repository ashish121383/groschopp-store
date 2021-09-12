<?php

function add_query_vars_filter( $vars ){

	$vars[] = "ids";
	$vars[] = "phase";
	$vars[] = "voltage";
	$vars[] = "orderby";
	$vars[] = "speed_to";
	$vars[] = "speed_from";
	$vars[] = "torque_to";
	$vars[] = "torque_from";
	$vars[] = "power_to";
	$vars[] = "power_from";

	return $vars;
}
add_filter( 'query_vars', 'add_query_vars_filter' );

function construct_url($array1, $array2) {

	$result = array_merge($array1, $array2);

	return http_build_query($result);
}

function stp_calculator( $atts ){
	ob_start();
	include( TEMPLATEPATH . '/template-parts/content-stp-calc.php' );
	$sc = ob_get_contents();
	ob_end_clean();
	return $sc;
}
add_shortcode( 'stp_calculator', 'stp_calculator' );

function is_related_item($product, $related_item_id) {
	global $wpdb;
	$product_id = get_field('type', $product);

	$sql = "SELECT value FROM product_items WHERE product_id = " . $product_id . " AND related_item_id = " . $related_item_id . " LIMIT 1";
	$result = $wpdb->get_results($sql);
	$value = $result[0]->value;

	if($value == "x") {
		return true;
	} elseif((int)$value == 1) {
		if(substr( $product->phase, 0, 3 ) == "3ph" && ((float)$product->full_load_amps > 1 && (float)$product->full_load_amps < 2.4)) {
			return true;
		}
	} elseif((int)$value == 2) {
		if(substr( $product->phase, 0, 3 ) == "3ph" && ((float)$product->full_load_amps > 2.4 && (float)$product->full_load_amps < 4)) {
			return true;
		}
	} elseif((int)$value == 3) {
		if(substr( $product->phase, 0, 3 ) == "3ph" && ((float)$product->full_load_amps > 0 && (float)$product->full_load_amps < 3.6)) {
			return true;
		}
	} elseif((int)$value == 4) {
		if(substr( $product->phase, 0, 3 ) == "3ph" && ((float)$product->full_load_amps > 0 && (float)$product->full_load_amps < 1)) {
			return true;
		}
	} elseif((int)$value == 5) {
		if($product->voltage == 163 && ((float)$product->full_load_amps > 0 && (float)$product->full_load_amps < 3.1)) {
			return true;
		}
	} elseif((int)$value == 6) {
		if($product->voltage <= 48 && ((float)$product->full_load_amps > 0 && (float)$product->full_load_amps < 7.5)) {
			return true;
		}
	} elseif((int)$value == 7) {
		if($product->voltage <= 48 && ((float)$product->full_load_amps > 7.5 && (float)$product->full_load_amps < 20)) {
			return true;
		}
	} elseif((int)$value == 8) {
		if (substr($product->model, -2) == 'NV') {
			return true;
		}
	} elseif((int)$value == 9) {
		if($product->voltage == 115) {
			return true;
		}
	} else {
		return false;
	}

	return false;
}

function get_related_items($product)
{
	global $wpdb;
	$related_item_ids = array();
	$results = $wpdb->get_results("SELECT id, label, page_id FROM product_related_items");

	foreach($results as $k => $result) {
		if(is_related_item($product, $result->id)) {
			$related_item_ids[$result->page_id] = $result->id;
		}
	}

	return array_rand($related_item_ids, 2);
}

add_filter('wpseo_title', 'filter_wpseo_title');
function filter_wpseo_title($title) {
	if(  is_singular( 'product')) {
		global $post;

		$title = get_field('voltage', $post->ID) ."v ". get_field('model', $post->ID) ." ". get_the_title() ." | Groschopp";
	}

	return $title;
}

add_filter('wp_nav_menu_objects', 'wp_nav_menu_filter_groschopp', 10, 2);
function wp_nav_menu_filter_groschopp ($items, $args) {
	// Check $wp_obj  for array
	$wp_obj = $args->submenu;
	if (!isset($wp_obj) || empty($wp_obj))
		return $items;
	if (is_string($wp_obj))
		$wp_obj = explode("/", $wp_obj);
	if (empty($wp_obj))
		return $items;

	// Create a slug string for each individual item
	foreach ($items as $item) {
		if (empty($item->slug))
			$item->slug = sanitize_title_with_dashes($item->title);
	}

	//  find the selected parent item ID(s)
	$cursor = 0;
	foreach ($wp_obj as $slug) {
		if (ctype_digit($slug)) $passedID = (int)$slug; else $passedID = null;
		$slug = sanitize_title_with_dashes($slug);

		if ($passedID != null) {
			foreach ($items as $item) { //Function was passed a Page ID

				//We have the menu ID (Ex: 134), but we need to convert it to the actual page ID (Ex: 22)
				$sub_objid = $item->object_id;
				$theRelevantPage = get_post($sub_objid);

				if ($theRelevantPage->ID == $slug) {
					$cursor = $item->ID;
					continue 2;
				}
			}
		}
		else { //Standard Pagename Passed
			foreach ($items as $item) {
				if ($cursor == $item->menu_item_parent && $slug == $item->slug) {
					$cursor = $item->ID;
					continue 2;
				}
			}

		}
		return array();
	}

	//  walk finding items until all levels are exhausted
	$parents = array($cursor);
	$out = array();
	while (!empty($parents)) {
		$newparents = array();

		foreach ($items as $item) {
			if (in_array($item->menu_item_parent, $parents)) {
				if ($item->menu_item_parent == $cursor)
					$item->menu_item_parent = 0;
				$out[] = $item;
				$newparents[] = $item->ID;
			}
		}

		$parents = $newparents;
	}

	return $out;
}

function has_children($post_ID = null, $post_type) {
	if ($post_ID === null) {
		global $post;
		$post_ID = $post->ID;
	}
	$query = new WP_Query(array('post_parent' => $post_ID, 'post_type' => $post_type));

	return $query->have_posts();
}