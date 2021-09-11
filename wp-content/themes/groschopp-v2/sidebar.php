<div id="sidebar">  
<?php

    global $_ancess,$_parent,$_active;
    $menu = wp_get_nav_menu_object('Main'); 
    $menu_items = wp_get_nav_menu_items($menu->term_id);        
    _wp_menu_item_classes_by_context($menu_items);

    $ancestor = reset($menu_items);
    
    foreach($menu_items as $item):
        if((!in_array('current-menu-parent',$item->classes))&&in_array('current-menu-ancestor',$item->classes)){$_ancess = $item;}
        if(in_array('current-menu-parent',$item->classes)){$_parent = $item;}
        if(in_array('current-menu-item',$item->classes)){$_active = $item;}
    endforeach;
    
    if(!$_ancess){if(!$_parent){$_ancess = $_active; }else{$_ancess = $_parent;}}if($_ancess){
    echo '<ul class="subnav">';
        foreach($menu_items as $item):
        if($item->menu_item_parent == $_ancess->ID):
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter($item->classes), $item ) );
        echo '<li class="'.$class_names.'"><a href="'.$item->url.'">'.$item->title.'</a></li>';
        endif;
        endforeach;
    echo '</ul>';
    }
    
    global $_ancess,$_parent,$_active;
    $menu = wp_get_nav_menu_object('Top'); 
    $menu_items = wp_get_nav_menu_items($menu->term_id);        
    _wp_menu_item_classes_by_context($menu_items);

    foreach($menu_items as $item):
        if((!in_array('current-menu-parent',$item->classes))&&in_array('current-menu-ancestor',$item->classes)){$_ancess = $item;}
        if(in_array('current-menu-parent',$item->classes)){$_parent = $item;}
        if(in_array('current-menu-item',$item->classes)){$_active = $item;}
    endforeach;

    if(!$_ancess){
        if(!$_parent){
            $_ancess = $_active; 
        }else{
            $_ancess = $_parent;
        }
    }

    if($_ancess){   
    echo '<ul class="subnav">';
        foreach($menu_items as $item):
        if($item->menu_item_parent == $_ancess->ID):
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter($item->classes), $item ) );
        echo '<li class="'.$class_names.'"><a href="'.$item->url.'">'.$item->title.'</a></li>';
        endif;
        endforeach;
    echo '</ul>';
    }

?>

    <div class="adv-box">   
        <a href="<?php echo get_permalink(606) ?>"><img src="<?php bloginfo('template_url'); ?>/images/gear-motor-match-gray.png" alt="Groschopp's Motor Search" width="205" border="0" /></a>
    </div>
    <div class="adv-box">
        <a href="/contact/"><img src="<?php bloginfo('template_url'); ?>/images/here4you.png" alt="Contact Groschopp" width="205" border="0" /></a>
    </div>
</div>