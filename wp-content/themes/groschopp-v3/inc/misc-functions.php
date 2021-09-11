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

// add_filter('acf/fields/relationship/query/key=field_57f33bc0381fd', 'only_product_children', 10, 3);
// add_filter('acf/fields/relationship/query/key=field_57f3389559d43', 'only_product_children', 10, 3);
// add_filter('acf/fields/relationship/query/key=field_57f341b0647e0', 'only_product_children', 10, 3);
// add_filter('acf/fields/relationship/query/key=field_57f341d1647e1', 'only_product_children', 10, 3);
// add_filter('acf/fields/relationship/query/key=field_57f3432a7d98e', 'only_product_children', 10, 3);
// add_filter('acf/fields/relationship/query/key=field_57f3434c7d98f', 'only_product_children', 10, 3);
// add_filter('acf/fields/relationship/query/key=field_57f34485cdf8c', 'only_product_children', 10, 3);
// add_filter('acf/fields/relationship/query/key=field_57f344a2cdf8d', 'only_product_children', 10, 3);

function only_product_children ( $args, $field, $post ) {
  $args['post_type'] = 'page';
  $args['post_parent'] = 4873;

  return $args;
}

function custom_excerpt_length( $length ) {
        return 40;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function is_related_item($product, $related_item_id) {
  global $wpdb;
  $product_id = $product->type_id;
  
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

function has_children($post_ID = null, $post_type) {
    if ($post_ID === null) {
        global $post;
        $post_ID = $post->ID;
    }
    $query = new WP_Query(array('post_parent' => $post_ID, 'post_type' => $post_type));

    return $query->have_posts();
}

