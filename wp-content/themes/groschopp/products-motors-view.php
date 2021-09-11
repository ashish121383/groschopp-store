		<?php $voltage = (isset($_GET['voltage']))? $_GET['voltage'] : false ; ?>
		<?php $orderby = (isset($_GET['orderby']))? $_GET['orderby'] : "voltage" ; ?>
		
		<?php if(isset($_GET['id'])): ?>
      <?php $product = get_product($_GET['id']) ?>
      <?php query_posts('cat='.Motors.'&posts_per_page=1&p='.$_GET['t']); ?>
      <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); $more=0; ?>

      <!-- product-box -->
      <div class="product-box">
        <!-- visual -->
        <div class="visual">
          <?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/ProductImages/'.$product->cadfile.'.jpg')): ?>
          <img src="<?php get_bloginfo('url') ?>/data/ProductImages/<?php echo $product->cadfile ?>.jpg" style="width:281px;" />
          <?php endif; ?>

          <?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/ProductImages/'.$product->cadfile.'.JPG')): ?>
          <img src="<?php get_bloginfo('url') ?>/data/ProductImages/<?php echo $product->cadfile ?>.JPG" style="width:281px;" />
          <?php endif; ?>
        </div>
        <!-- description -->
        <div class="description">
          <?php $category=get_the_category(); ?>
          <?php /*<a href="javascript:{}" onclick="window.history.back()" class="back">&lt; Return to Previous Page</a>*/ ?>
          <h2><?php the_title() ?></h2>
          <?php /*
          <h3><?php echo $product->model ?></h3>
          */ ?>
          <!-- features -->
          <ul class="features">
            <li>
              <span class="title">Product Number:</span>
              <strong><?php echo $product->ordering_number ?></strong>
              <div class="po-message">Please refer to this number when speaking with a Groschopp team member</div>
            </li>
            <li>
              <span class="title">Model Number:</span>
              <strong><?php echo $product->model ?></strong>
            </li>
            <li>
              <span class="title2">Description:</span>
              <strong><span><?php echo $product->voltage ?> v <?php echo $product->phase ?></span>  <span><?php echo $product->system_hp ?> hp</span>  <span><?php echo $product->output_speed ?> rpm</span></strong>
            </li>
          </ul>
          <div class="link-area">
            <a class="btn modal" href="<?php bloginfo('template_url'); ?>/quote-add.php?id=<?php echo $product->id ?>"><span>Add to Quote</span><em>&nbsp;</em></a>
          </div>
        </div>
      </div>

      <?php endwhile; endif; wp_reset_query(); ?>

      <!-- details-box -->
      <div class="details-box">
        <div class="column">
          <h4>Features:</h4>
          <ul>
            <?php if(in_array($product->type_id, array(1,6,11,12,18))): ?>
            <li>AC Motors are constructed with class "H" insulation components allowing for running temperatures up to 180 degrees C</li>
            <?php else: ?>
            </li>DC Motors are constructed with class "B" insulation components allowing for running temperatures up to 130 degrees C</li>
            <?php endif; ?>

            <?php if($product->type_id == 1): ?>
            <li>Die-cast aluminum endbells</li>
            <li>Ball-bearing construction</li>
            <li>Tough, all-aluminum frame</li>
            <li>Durable powder coating paint</li>
            <li>Innovative cooling channels inside the frame to eliminate lint, dust and other debris build up in the fins</li>
            <li>Available in both TEFC (totally enclosed fan-cooled) and TENV (totally enclosed non-vented) designs.</li>
            <?php endif; ?>

            <?php if($product->type_id == 23): ?>
            <li>Impregnated windings</li>
            <li>Durable, powder coating paint</li>
            <li>All aluminum frame</li>
            <li>Ball bearing construction</li>
            <li>Flying lead wires- color coded</li>
            <li>Foot or face mounting options</li>
            <?php endif; ?>

            <?php if($product->type_id == 2): ?>
            <li>Steel housing with powder coating</li>
            <li>High efficiency synthetic oil lubricant</li>
            <li>Ball bearing construction</li>
            <li>Industry-wide compatibility</li>
            <li>Low noise, long life</li>
            <li>12-inch standard leads</li>
            <?php endif; ?>
          </ul>
        </div>
        <div class="column">
          <h4>Options:</h4>
          <ul>
            <?php if(in_array($product->type_id, array(1,6,11,12,18)) && strpos($product->model, "FC") == false): ?>
            <li><a href="<?php get_bloginfo('url') ?>/data/ProductOption_Pdf/AC_MOTOR_W_BRAKES.pdf" target="_blank">Holding Brake</a></li>
            <?php endif; ?>

            <?php if(in_array($product->type_id, array(1,6,11,12,18)) && strpos($product->model, "FC") == false): ?>
            <li><a href="<?php get_bloginfo('url') ?>/data/ProductOption_Pdf/AC_MOTOR_W_OPTICAL_ENCODER.pdf" target="_blank">Optical Encoder</a></li>
            <?php endif; ?>

            <?php if(in_array($product->type_id, array(23))): ?>
            <li><a href="<?php get_bloginfo('url') ?>/data/ProductOption_Pdf/BL_MOTOR_W_BRAKES.pdf" target="_blank">Holding Brake</a></li>
            <?php endif; ?>

            <?php if(in_array($product->type_id, array(23))): ?>
            <li><a href="<?php get_bloginfo('url') ?>/data/ProductOption_Pdf/BL_MOTOR_W_OPTICAL_ENCODER.pdf" target="_blank">Optical Encoder</a></li>
            <?php endif; ?>

            <?php if(in_array($product->type_id, array(2,3,7,8,14))): ?>
            <li><a href="<?php get_bloginfo('url') ?>/data/ProductOption_Pdf/PM_MOTOR_W_BRAKES.pdf" target="_blank">Holding Brake</a></li>
            <?php endif; ?>

            <?php if(in_array($product->type_id, array(2,3,7,8,14))): ?>
            <li><a href="<?php get_bloginfo('url') ?>/data/ProductOption_Pdf/PM_MOTOR_W_OPTICAL_ENCODER.pdf" target="_blank">Optical Encoder</a></li>
            <?php endif; ?>

            <?php if(in_array($product->type_id, array(2,3,7,8,15))): ?>
            <li><a href="<?php get_bloginfo('url') ?>/data/ProductOption_Pdf/PM_MOTOR_W_JUNCTION_BOX.pdf" target="_blank">Junction Box</a></li>
            <?php endif; ?>

            <?php if(in_array($product->type_id, array(2,3,7,8,16))): ?>
            <li><a href="<?php get_bloginfo('url') ?>/data/ProductOption_Pdf/BRIDGE_RECTIFIERS.pdf" target="_blank">Full Wave Rectifier</a></li>
            <?php endif; ?>

            <?php if(in_array($product->type_id, array(3,12))): ?>
            <li>Output Shaft, NEMA or IEC</li>
            <?php endif; ?>

            <?php if(in_array($product->type_id, array(3,12))): ?>
            <li>Torque Arms</li>
            <?php endif; ?>

            <?php if(in_array($product->type_id, array(3,12))): ?>
            <li>Plastic Covers</li>
            <?php endif; ?>

            <?php if(in_array($product->type_id, array(3,12))): ?>
            <li>Flanges (Contact Groschopp)</li>
            <?php endif; ?>

            <li>Foot Mount (See outline drawing)</li>
            <li>IP66</li>
          </ul>
        </div>
      </div>
      <!-- links-box -->
      <div class="links-box">
        <div class="holder">
          <div class="frame">
            <div class="column">
              <h5>Product Resources:</h5>
              <ul>
                <?php if(strlen($product->ordering_number) == 4): ?>
                <?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/Performance/0'.$product->ordering_number.'.pdf')): ?>
                <li><a href="<?php get_bloginfo('url') ?>/data/Performance/0<?php echo $product->ordering_number ?>.pdf" target="_blank">Performance Data</a></li>
                <?php endif; ?>
                <?php else: ?>
                <?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/Performance/'.$product->ordering_number.'.pdf')): ?>
                <li><a href="<?php get_bloginfo('url') ?>/data/Performance/<?php echo $product->ordering_number ?>.pdf" target="_blank">Performance Data</a></li>
                <?php endif; ?>
                <?php endif; ?>

                <?php if(in_array($product->type_id, array(1,6,11,12,18))): ?>
                <li><a href="<?php get_bloginfo('url') ?>/data/AC-Motor-Connection-Diagram.pdf" target="_blank">AC Connection Diagram</a></li>
                <?php endif; ?>

                <?php if(in_array($product->type_id, array(2,3,7,8,14,16))): ?>
                <li><a href="<?php get_bloginfo('url') ?>/data/DC-Motor-Connection-Diagram.pdf" target="_blank">PM Connection Diagram</a></li>
                <?php endif; ?>

                <?php if(in_array($product->type_id, array(23,24,25,26,27))): ?>
                <li><a href="<?php get_bloginfo('url') ?>/data/brushless-dc-motor-connection-diagram.pdf" target="_blank">Brushless Connection Diagram</a></li>
                <?php endif; ?>
              </ul>
            </div>
            <div class="column">
              <h5>CAD Files:</h5>
              <ul>
                <?php $nofiles = true; ?>

                <?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/Cad_Pdf/'.$product->cadfile.'.pdf')): ?>
                <li><a href="<?php get_bloginfo('url') ?>/data/Cad_Pdf/<?php echo $product->cadfile ?>.pdf" target="_blank">Cad_Pdf</a></li>
                <?php $nofiles = false; ?>
                <?php endif; ?>
                <?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/Cad_Pdf/'.$product->cadfile.'.PDF')): ?>
                <li><a href="<?php get_bloginfo('url') ?>/data/Cad_Pdf/<?php echo $product->cadfile ?>.PDF" target="_blank">Cad_Pdf</a></li>
                <?php $nofiles = false; ?>
                <?php endif; ?>

                <?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/3DCad_IGES/'.$product->cadfile.'.zip')): ?>
                <li><a href="<?php get_bloginfo('url') ?>/data/3DCad_IGES/<?php echo $product->cadfile ?>.zip">3DCad_IGES</a></li>
                <?php $nofiles = false; ?>
                <?php endif; ?>
                <?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/3DCad_STEP/'.$product->cadfile.'.zip')): ?>
                <li><a href="<?php get_bloginfo('url') ?>/data/3DCad_STEP/<?php echo $product->cadfile ?>.zip">3DCad_STEP</a></li>
                <?php $nofiles = false; ?>
                <?php endif; ?>
                <?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/Cad_Dwg/'.$product->cadfile.'.zip')): ?>
                <li><a href="<?php get_bloginfo('url') ?>/data/Cad_Dwg/<?php echo $product->cadfile ?>.zip">Cad_Dwg</a></li>
                <?php $nofiles = false; ?>
                <?php endif; ?>
                <?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/Cad_Dxf/'.$product->cadfile.'.zip')): ?>
                <li><a href="<?php get_bloginfo('url') ?>/data/Cad_Dxf/<?php echo $product->cadfile ?>.zip">Cad_Dxf</a></li>
                <?php $nofiles = false; ?>
                <?php endif; ?>

                <?php if($nofiles == true): ?>
                <li>Not applicable to this application</li>
                <?php endif; ?>
              </ul>
            </div>
            <div class="column">
              <h5>Brush Card CAD Files:</h5>
              <ul>
                <?php $nofiles = true; ?>

                <?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/BrushCard_Pdf/'.$product->brush_card.'.pdf')): ?>
                <li><a href="<?php get_bloginfo('url') ?>/data/BrushCard_Pdf/<?php echo $product->brush_card ?>.pdf" target="_blank">BrushCard_Pdf</a></li>
                <?php $nofiles = false; ?>
                <?php endif; ?>
                <?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/BrushCard_Pdf/'.$product->brush_card.'.PDF')): ?>
                <li><a href="<?php get_bloginfo('url') ?>/data/BrushCard_Pdf/<?php echo $product->brush_card ?>.PDF" target="_blank">BrushCard_Pdf</a></li>
                <?php $nofiles = false; ?>
                <?php endif; ?>

                <?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/3DBrushCard_IGES/'.$product->brush_card.'.zip')): ?>
                <li><a href="<?php get_bloginfo('url') ?>/data/3DBrushCard_IGES/<?php echo $product->brush_card ?>.zip">3DCBrushcard_IGES</a></li>
                <?php $nofiles = false; ?>
                <?php endif; ?>
                <?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/3DBrushCard_STEP/'.$product->brush_card.'.zip')): ?>
                <li><a href="<?php get_bloginfo('url') ?>/data/3DBrushCard_STEP/<?php echo $product->brush_card ?>.zip">3DBrushcard_STEP</a></li>
                <?php $nofiles = false; ?>
                <?php endif; ?>
                <?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/BrushCard_Dwg/'.$product->brush_card.'.zip')): ?>
                <li><a href="<?php get_bloginfo('url') ?>/data/BrushCard_Dwg/<?php echo $product->brush_card ?>.zip">BrushCard_Dwg</a></li>
                <?php $nofiles = false; ?>
                <?php endif; ?>
                <?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/data/BrushCard_Dxf/'.$product->brush_card.'.zip')): ?>
                <li><a href="<?php get_bloginfo('url') ?>/data/BrushCard_Dxf/<?php echo $product->brush_card ?>.zip">BrushCard_Dxf</a></li>
                <?php $nofiles = false; ?>
                <?php endif; ?>

                <?php if($nofiles == true): ?>
                <li>Not applicable to this application</li>
                <?php endif; ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
		
		<?php else : ?>	
      <?php query_posts('posts_per_page=1&p='.$_GET['t']); ?>

      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); $more=0; ?>

        <!-- product-box -->
        <div class="product-box">
          <!-- visual -->
          <div class="visual">
            <?php if($_GET['t'] == 213): ?>
            <img src="<?php bloginfo('template_url'); ?>/images/products/motors_ac_1.jpg" alt="image description" width="320"  />
            <?php endif; ?>

            <?php if($_GET['t'] == 230): ?>
            <img src="<?php bloginfo('template_url'); ?>/images/products/motors_brushless_2.jpg" alt="image description" width="320"  />
            <?php endif; ?>

            <?php if($_GET['t'] == 215): ?>
            <img src="<?php bloginfo('template_url'); ?>/images/products/motors_dc_1.jpg" alt="image description" width="320"  />
            <?php endif; ?>

            <?php if($_GET['t'] == 235): ?>
            <img src="<?php bloginfo('template_url'); ?>/images/products/motors_universal_1.jpg" alt="image description" width="320"  />
            <p>For prints, 2d or 3d models call Groschopp <br/>1-800-829-4135 / 712-722-4135</p>
            <?php endif; ?>
          </div>
          <!-- description -->
          <div class="description">
            <?php $category=get_the_category(); ?>
            <?php /*<a href="javascript:{}" onclick="window.history.back()" class="back">&lt; Return to Previous Page</a>*/ ?>
            <h2><?php the_title() ?></h2>
            <?php the_content() ?>
          </div>
        </div>

        <?php $product_count = get_products_count(get_field('product_type_id'), $voltage) ?>
        <?php $page = isset( $_GET['cpage'] ) ? abs( (int) $_GET['cpage'] ) : 1; ?>
        <?php $products_per_page = 50; ?>
        <?php $offset = ($page - 1) * $products_per_page ?>

        <?php if($products = get_products(get_field('product_type_id'), $voltage, $orderby, $products_per_page, $offset)): ?>
          <ul class="menu">
            <li>Results <?php echo $product_count[0]->count ?></li>

            <?php if(get_the_ID() == ACMotors): ?>
              <li><strong class="option">Voltage Options</strong></li>
              <li><a href="?t=<?php the_ID() ?>&voltage=115">115V</a></li>
              <li><a href="?t=<?php the_ID() ?>&voltage=230">230V</a></li>
            <?php endif; ?>

            <?php if(get_the_ID() == BrushlessDCMotors): ?>
              <li><strong class="option">Voltage Options</strong></li>
              <li><a href="?t=<?php the_ID() ?>&voltage=24">24V</a></li>
              <li><a href="?t=<?php the_ID() ?>&voltage=163">163VDC / 115VAC</a></li>
            <?php endif; ?>

            <?php if(get_the_ID() == DCMotors): ?>
              <li><strong class="option">Voltage Options</strong></li>
              <li><a href="?t=<?php the_ID() ?>&voltage=12">12V</a></li>
              <li><a href="?t=<?php the_ID() ?>&voltage=24">24V</a></li>
              <li><a href="?t=<?php the_ID() ?>&voltage=90">90V</a></li>
              <li><a href="?t=<?php the_ID() ?>&voltage=115">115FWR</a></li>
              <li><a href="?t=<?php the_ID() ?>&voltage=130">130V</a></li>
              <li><a href="?t=<?php the_ID() ?>&voltage=180">180V</a></li>
            <?php endif; ?>
          </ul>

          <div id="result-list">
            <table>
              <thead>
                <tr>
                  <th><a href="?t=<?php the_ID() ?>&orderby=voltage">Voltage</a></th>
                  <th><a href="?t=<?php the_ID() ?>&orderby=ordering_number" nowrap>Product #</a></th>
                  <th><a href="?t=<?php the_ID() ?>&orderby=model" nowrap>Model #</a></th>
                  <th><a href="?t=<?php the_ID() ?>&orderby=output_speed">Speed <br/>(RPM)</a></th>
                  <th><a href="?t=<?php the_ID() ?>&orderby=torqk">Torque <br/>(in-lb)</a></th>
                  <th><a href="?t=<?php the_ID() ?>&orderby=system_hp">Motor Power <br/>(HP)</a></th>
                  <th><a href="?t=<?php the_ID() ?>&orderby=phase">Phases</a></th>
                  <th></th>
                <tr>
              </thead>
              <tbody>
            <?php $alt = false; ?>
            <?php foreach($products as $product): ?>
              <?php $alt = ($alt)? "alt" : "" ; ?>
                  <tr>
                    <td class="<?php echo $alt ?>"><?php echo $product->voltage ?></td>
                    <td class="<?php echo $alt ?>"><a href="?t=<?php the_ID() ?>&id=<?php echo $product->id ?>"><?php echo $product->ordering_number ?></a></td>
                    <td class="<?php echo $alt ?>"><?php echo $product->model ?></td>
                    <td class="<?php echo $alt ?>"><?php echo $product->output_speed ?></td>
                    <td class="<?php echo $alt ?>"><?php echo $product->torqk ?></td>
                    <td class="<?php echo $alt ?>"><?php echo $product->system_hp ?></td>
                    <td class="<?php echo $alt ?>"><?php echo $product->phase ?></td>
                    <td class="<?php echo $alt ?>"><a class="modal" href="<?php bloginfo('template_url'); ?>/quote-add.php?id=<?php echo $product->id ?>"><img src="<?php bloginfo('template_url'); ?>/images/btn_Add-to-Quote_sm.jpg" alt="Add to Quote button" width="91" height="23" border="0" style="margin-top:4px; margin-bottom:-2px;"/></a></td>
                  </tr>
              <?php $alt = !$alt ?>
            <?php endforeach; ?>
                <tr>
                  <td colspan="8">
                  <?php echo paginate_links( array(
                    'base' => add_query_arg( 'cpage', '%#%' ),
                      'format' => '',
                      'prev_text' => __('&laquo;'),
                      'next_text' => __('&raquo;'),
                      'total' => ceil($product_count[0]->count / $products_per_page),
                      'current' => $page
                  )); ?>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <?php endif; ?>
        <?php endwhile; ?>
      <?php endif; wp_reset_query(); ?>
		
		<?php endif; ?>
		
		<div class="popup-wrap">
			<div class="popup-overlay"></div>
			<div class="vertical-offset">
				<div id="<?php echo $product->id ?>" class="popup">
					<a class="close" href="javascript: void(0);">Close [x]</a>
					<h2>The following item has been added to your quote cart.</h2>
					<h3><?php echo $product->model?></h3>
					<p>Done looking? Complete the "<a href="/quote/" target="_parent">Quote Cart</a>" form.</p>
				</div>
			</div>
		</div>