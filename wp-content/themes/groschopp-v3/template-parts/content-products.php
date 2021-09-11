<div id="products" class="col-sm-12 col-md-9 pull-right h2-indent">
  <h1><?php the_title() ?></h1>
  
  <?php while(have_posts()): the_post() ?>
  <?php the_content() ?>
  <?php endwhile; ?>

  <?php /* $motors = new WP_Query(array('post_type' => 'product', 'post_parent' => 0)); $i = 0; ?>
  
  <?php while($motors->have_posts()): $motors->the_post() ?>
  <?php echo ($i == 0)? '<div class="row">' : ''; ?>
  
      <div class="col-sm-6">
      
          <a href="<?php the_permalink() ?>">
              <h2><?php the_title() ?></h2>
              <img src="<?php echo pods_image_url(get_post_meta(get_the_ID(), 'grid_photo', true), 'homepage-motor-image') ?>" alt="<?php echo get_the_title() ?>" />
          </a>
          
      </div>
      
  <?php echo ($i == 1)? '</div>' : ''; ?>
  <?php $i = ($i == 1)? 0 : $i + 1; ?>
  <?php endwhile; */ ?>
  
  <div class="row">
    <div class="col-sm-6">
      <h2>Electric Motors</h2>
      <ul class="prod-box min-sm">
        <li>
          <h3><a href="<?php echo get_permalink(6191) ?>">DC MOTOR</a> <span>[Permanent Magnet]</span></h3>
        </li>
        <li>
          <div>
            <img src="<?php echo get_field('field_57f3385b4bcc2') ?>" alt=""> <!-- made image size called 'product-overview' (200x200) -->
          </div>
          <div>
            <?php $dc_pages = get_field("field_57f3389559d43", get_the_ID()) ?>
            <?php foreach($dc_pages as $k => $p): ?>
            <a href="<?php echo get_permalink($p); ?>"><?php echo get_the_title($p) ?></a> 
            <?php endforeach; ?>
          </div>
        </li>
        <li>
          <h3><a href="<?php echo get_permalink(6195) ?>">AC MOTOR</a> <span>[Induction]</span></h3>
        </li>
        <li>
          <div>
            <img src="<?php echo get_field('field_57f33ba1381fc') ?>" alt=""> <!-- made image size called 'product-overview' (200x200) -->
          </div>
          <div>
            <?php $ac_pages = get_field("field_57f33bc0381fd", get_the_ID()) ?>
            <?php foreach($ac_pages as $k => $p): ?>
            <a href="<?php echo get_permalink($p); ?>"><?php echo get_the_title($p) ?></a> 
            <?php endforeach; ?>
          </div>
        </li>
        <li>
          <h3><a href="<?php echo get_permalink(6194) ?>">BRUSHLESS DC MOTOR</a></h3>
        </li>
        <li>
          <div>
            <img src="<?php echo get_field('field_586402dbb2b87') ?>" alt=""> <!-- made image size called 'product-overview' (200x200) -->
          </div>
          <div>
            <?php $brushless_dc_pages = get_field("field_58640301b2b89", get_the_ID()) ?>
            <?php foreach($brushless_dc_pages as $k => $p): ?>
            <a href="<?php echo get_permalink($p); ?>"><?php echo get_the_title($p) ?></a> 
            <?php endforeach; ?>
          </div>
        </li>
        <li>
          <h3><a href="<?php echo get_permalink(6193) ?>">UNIVERSAL MOTOR</a></h3>
        </li>
        <li>
          <div>
            <img src="<?php echo get_field('field_586402f5b2b88') ?>" alt=""> <!-- made image size called 'product-overview' (200x200) -->
          </div>
          <div>
            <?php $universal_pages = get_field("field_5864031eb2b8a", get_the_ID()) ?>
            <?php foreach($universal_pages as $k => $p): ?>
            <a href="<?php echo get_permalink($p); ?>"><?php echo get_the_title($p) ?></a> 
            <?php endforeach; ?>
          </div>
        </li>
      </ul>
    </div>
    
    <div class="col-sm-6">
      <h2>Electric Gear Motors</h2>
      <ul class="prod-box min-sm">
        <li>
          <h3><a href="<?php echo get_permalink(6694) ?>">DC GEAR MOTOR</a></h3>
        </li>
        <li>
          <div>
            <img src="<?php echo get_field('field_57f34188647de') ?>" alt=""> <!-- made image size called 'product-overview' (200x200) -->
          </div>
          <div>
            <?php $dc_gear_pages = get_field("field_57f341b0647e0", get_the_ID()) ?>
            <?php foreach($dc_gear_pages as $k => $p): ?>
            <a href="<?php echo get_permalink($p); ?>"><?php echo get_the_title($p) ?></a> 
            <?php endforeach; ?>
          </div>
        </li>
        <li>
          <h3><a href="<?php echo get_permalink(6692) ?>">AC GEAR MOTOR</a></h3>
        </li>
        <li>
          <div>
            <img src="<?php echo get_field('field_57f3419d647df') ?>" alt=""> <!-- made image size called 'product-overview' (200x200) -->
          </div>
          <div>
            <?php $ac_gear_pages = get_field("field_57f341d1647e1", get_the_ID()) ?>
            <?php foreach($ac_gear_pages as $k => $p): ?>
            <a href="<?php echo get_permalink($p); ?>"><?php echo get_the_title($p) ?></a> 
            <?php endforeach; ?>
          </div>
        </li>
        <li>
          <h3><a href="<?php echo get_permalink(6695) ?>">BRUSHLESS GEAR MOTOR</a></h3>
        </li>
        <li>
          <div>
            <img src="<?php echo get_field('field_586401e3b2b83') ?>" alt=""> <!-- made image size called 'product-overview' (200x200) -->
          </div>
          <div>
            <?php $brushless_gear_pages = get_field("field_58640219b2b85", get_the_ID()) ?>
            <?php foreach($brushless_gear_pages as $k => $p): ?>
            <a href="<?php echo get_permalink($p); ?>"><?php echo get_the_title($p) ?></a> 
            <?php endforeach; ?>
          </div>
        </li>
        <li>
          <h3><a href="<?php echo get_permalink(8055) ?>">GEARBOX REDUCER</a></h3>
        </li>
        <li>
          <div>
            <img src="<?php echo get_field('field_58640209b2b84') ?>" alt=""> <!-- made image size called 'product-overview' (200x200) -->
          </div>
          <div>
            <?php $gearbox_reducer = get_field("field_58640233b2b86", get_the_ID()) ?>
            <?php foreach($gearbox_reducer as $k => $p): ?>
            <a href="<?php echo get_permalink($p); ?>"><?php echo get_the_title($p) ?></a> 
            <?php endforeach; ?>
          </div>
        </li>
      </ul>
    </div>
  </div>
  
  <h2>Electric Motor Speed Controls</h2>
  <ul class="prod-box double indented-links">
    <li>
      <div>
        <img src="<?php echo get_field('field_57f342a99ece2') ?>" alt="">
      </div>
      <div>
        <h3><a href="<?php echo get_permalink(8037) ?>">AC Motor Speed Control</a></h3>
        <?php $ac_inverter_pages = get_field("field_57f3432a7d98e", get_the_ID()) ?>
        <?php foreach($ac_inverter_pages as $k => $p): ?>
        <a href="<?php echo get_permalink($p); ?>"><?php echo get_the_title($p) ?></a> 
        <?php endforeach; ?>
      </div>
    </li>
    <li>
      <div>
        <img src="<?php echo get_field('field_57f342c29ece3') ?>" alt="">
      </div>
      <div>
        <h3><a href="<?php echo get_permalink(8036) ?>">Brushless Speed Control</a></h3>
        <?php $brushless_dc_pages = get_field("field_57f3434c7d98f", get_the_ID()) ?>
        <?php foreach($brushless_dc_pages as $k => $p): ?>
        <a href="<?php echo get_permalink($p); ?>"><?php echo get_the_title($p) ?></a> 
        <?php endforeach; ?>        
      </div>
    </li>
  </ul>
  
  <div class="row">
    <div class="col-sm-6">
      <h2>Accessories</h2>
      <ul class="prod-box min-lg indented-links">
        <li>
          <div>
            <img src="<?php echo get_field('field_57f3445dcdf8a') ?>" alt="">
          </div>
          <div>
            <?php $motor_add_ons = get_field("field_57f34485cdf8c", get_the_ID()) ?>
            <?php foreach($motor_add_ons as $k => $p): ?>
            <a href="<?php echo get_permalink($p); ?>"><?php echo get_the_title($p) ?></a> 
            <?php endforeach; ?>
          </div>
        </li>
      </ul>
    </div>
    
    <div class="col-sm-6">
      <h2>Build Your Own</h2>
      <div class="prod-box min-lg alt">
        <p>Once you find the motor or gearmotor you want, begin modifying it directly onilne with our <strong>"customize it"</strong> tool, found on each product model page.</p>
        <img src="<?php echo get_template_directory_uri() ?>/images/build-your-own.png" alt="">
        <p><a href="<?php echo get_the_permalink(6628) ?>">Upload your specs</a> for step-by-step guidance from one of our motor experts</p>
      </div>
    </div>
  </div>
</div>