<?php

class Walker_Navigation_Menus extends Walker {
	/**
	 * @see Walker::$tree_type
	 * @since 3.0.0
	 * @var string
	 */
	var $tree_type = array( 'post_type', 'taxonomy', 'custom' );

	/**
	 * @see Walker::$db_fields
	 * @since 3.0.0
	 * @todo Decouple this.
	 * @var array
	 */
	var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );

	/**
	 * @see Walker::start_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of page. Used for padding.
	 */
	function start_lvl(&$output, $depth = 0, $args = array()) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"sub-menu\">\n";
	}

	/**
	 * @see Walker::end_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of page. Used for padding.
	 */
	function end_lvl(&$output, $depth = 0, $args = array()) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul>\n";
	}

	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param int $current_page Menu item ID.
	 * @param object $args
	 */
	function start_el(&$output, $item, $depth = 0, $args = array(), $current_object_id = 0) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names .'>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		$item_output = $args->before;
		if($item->title == "Cart") {
			$item_output .= '<a'. $attributes .'>';
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . ' ( '.WC()->cart->get_cart_contents_count().' )' . $args->link_after;
		} else {
			$item_output .= '<a'. $attributes .'>';
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		}
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	/**
	 * @see Walker::end_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Page data object. Not used.
	 * @param int $depth Depth of page. Not Used.
	 */
	function end_el(&$output, $object, $depth = 0, $args = array()) {
		$output .= "</li>\n";
	}
}

class Walker_Sidebar_Menus extends Walker {
	/**
	 * @see Walker::$tree_type
	 * @since 3.0.0
	 * @var string
	 */
	var $tree_type = array( 'post_type', 'taxonomy', 'custom' );

	/**
	 * @see Walker::$db_fields
	 * @since 3.0.0
	 * @todo Decouple this.
	 * @var array
	 */
	var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );

	/**
	 * @see Walker::start_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of page. Used for padding.
	 */
	function start_lvl(&$output, $depth = 0, $args = Array()) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class='side-nav'>\n";
	}

	/**
	 * @see Walker::end_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of page. Used for padding.
	 */
	function end_lvl(&$output, $depth = 0, $args = Array()) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul>\n";
	}

	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param int $current_page Menu item ID.
	 * @param object $args
	 */
	function start_el(&$output, $item, $depth = 0, $args = Array(), $current_object_id = 0) {
		global $wp_query;

		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names .'>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	/**
	 * @see Walker::end_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Page data object. Not used.
	 * @param int $depth Depth of page. Not Used.
	 */
	function end_el(&$output, $object, $depth = 0, $args = Array()) {
		$output .= "</li>\n";
	}
}

class UL_Submenu_Walker extends Walker_Nav_Menu {

	var $found_parents = array();

	function start_el(&$output, $item, $depth = 0, $args = Array(), $current_object_id = 0) {

		global $wp_query;

		//this only works for second level sub navigations
		$parent_item_id = 0;

		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		if(is_singular( 'gearbox' ) && in_array('gearbox', $classes)) {
			$classes[] = "current-menu-item";
		}

		if(is_singular( 'control' ) && in_array('control', $classes)) {
			$classes[] = "current-menu-item";
		}

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';


		if ( ($item->menu_item_parent==0) && (strpos($class_names, 'current-menu-parent')) ) {
			$output.= '<li>';
		}

		//echo "<pre>".$item->title." ".print_r($item)."</pre><br/>";

		// Checks if the current element is in the current selection
		if ((strpos($class_names, 'current-menu-item')
		     || strpos($class_names, 'current-menu-parent')
		     || strpos($class_names, 'current-menu-ancestor')
		     || (is_array($this->found_parents) && in_array( $item->menu_item_parent, $this->found_parents )))
		    || (is_singular( 'case_study' ) && (strpos($class_names, 'menu-item-object-case_study_category')))
		    || (is_singular( 'product' ) && (strpos($class_names, 'product-parent-page')))
		    || (is_singular( 'gearbox' ) && (strpos($class_names, 'product-parent-page')))
		    || (is_singular( 'accessory' ) && (strpos($class_names, 'product-parent-page')))
		    || (is_singular( 'control' ) && (strpos($class_names, 'product-parent-page')))
		    || (is_singular( 'post' ) && (strpos($class_names, 'menu-item-object-category')))
		) {

			// Keep track of all selected parents
			$this->found_parents[] = $item->ID;

			//check if the item_parent matches the current item_parent
			if($item->menu_item_parent!=$parent_item_id){

				$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

				$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
				$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
				$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
				$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

				$item_output = $args->before;
				$item_output .= '<a'. $attributes .'>';
				$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
				$item_output .= '</a>';
				$item_output .= $args->after;

				$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
			}
		}
	}

	function end_el(&$output, $object, $depth = 0, $args = Array()) {
		// Closes only the opened li
		if ( is_array($this->found_parents) && in_array( $object->ID, $this->found_parents ) ) {
			$output .= "</li>\n";
		}
	}

	function end_lvl(&$output, $depth = 0, $args = Array()) {
		// $indent = str_repeat("\t", $depth);
		// // If the sub-menu is empty, strip the opening tag, else closes it
		// if (substr($output, -22)=="<ul class=\"sub-menu\">\n") {
		//   $output = substr($output, 0, strlen($output)-23);
		// } else {
		//   $output .= "$indent</ul>\n";
		// }
	}

}

?>