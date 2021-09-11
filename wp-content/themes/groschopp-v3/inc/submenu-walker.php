<?php 

class UL_Submenu_Walker extends Walker_Nav_Menu {

  var $found_parents = array();

    function start_el(&$output, $item, $depth, $args) {

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
          || (is_singular( 'product' ) && (strpos($class_names, 'menu-item-object-product')))
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

    function end_el(&$output, $item, $depth) {
      // Closes only the opened li
      if ( is_array($this->found_parents) && in_array( $item->ID, $this->found_parents ) ) {
        $output .= "</li>\n";
      }
    }

    function end_lvl(&$output, $depth) {
      // $indent = str_repeat("\t", $depth);
      // // If the sub-menu is empty, strip the opening tag, else closes it
      // if (substr($output, -22)=="<ul class=\"sub-menu\">\n") {
      //   $output = substr($output, 0, strlen($output)-23);
      // } else {
      //   $output .= "$indent</ul>\n";
      // }
    }

}