<?php 

	get_header();
	
	if(isset($_GET['hash'])) {
		setSearchClick($_GET['hash']);
	} 

?>

<!-- main -->
<div id="main">
	<!-- content -->
	
	<div id="content">
	
		<div id="sm-icons">
			Share with a friend: <span class='st_facebook' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span><span class='st_twitter' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span><span class='st_email' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span><span class='st_sharethis' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span><span class='st_plusone' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' ></span>
		</div>
		
		<!-- twocolumns -->
		<?php 
		
			if(isset($_GET['t'])) {
				
				$product_id = $_GET['t'];
				
				// Motors
				$motors = array(ACMotors, DCMotors, BrushlessDCMotors);
				if(in_array($product_id, $motors)) {
					require_once "products-motors-view.php";
				}
				
				$universal = array(UniversalMotors);
				if(in_array($product_id, $universal)) {
					require_once "products-universal.php";
				}
				
				$gearmotors = array(ACGearmotors, DCGearmotors, BrushlessDCGearmotors, 947, 949, 953, 951, 1163, 1166, 1168, 1170, 246, 3726, 3729, 3732, 3735, 239);
				if(in_array($product_id, $gearmotors)) {
					require_once "products-gearmotors-view.php";
				}
				
				$gearboxes = array(NEMAGearboxes, IECGearboxes, PlanetaryGearboxes, RightAngleGearboxes);
				if(in_array($product_id, $gearboxes)) {
					require_once "products-gearboxes-view.php";
				}
					
			} else {
			
				switch(get_query_var('cat')):
					case Motors:
						require_once "products-motors.php";
						break;
					case Gearmotors:
						require_once "products-gearmotors.php";
						break;
					case GearboxesSpeedReducers:
						require_once "products-gearboxes.php";
						break;
					case MotorComponents:
						require_once "products-components.php";
						break;
					case IntegratedSolutions:
						require_once "products-solutions.php";
						break;
					case Customization:
						require_once "products-customize.php";
						break;
					default:
						require_once "products-overview.php";
				endswitch;
				
			}
			
		?>
		
	</div>
	
	<!-- sidebar -->
	<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>
