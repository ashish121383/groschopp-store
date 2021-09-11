<?php

require($_SERVER['DOCUMENT_ROOT'].'/wp-config.php');  
$wp->init();  
$wp->parse_request();  
$wp->query_posts();  
$wp->register_globals();

?>

<html>
	<head>
		<title></title>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	</head>

	<body>
		<div class="container">
			<h1>Related Item Tester</h1>

			<form method="POST" action="./related_product_tester.php">
				<div class="input-group">
					<input type="text" class="form-control" name="product_ordering_number" placeholder="Product Ordering Number">
					<span class="input-group-btn">
						<button class="btn btn-default" type="submit">Find!</button>
					</span>
				</div>
			</form>

			<hr/>

			<?php if($_POST): ?>
			<?php $product = $wpdb->get_results("SELECT * FROM product WHERE ordering_number = " . $_POST['product_ordering_number'] . " LIMIT 1"); ?>
			<?php if($product): ?>
			<div class="col-md-6">
				<h2><?php echo $product[0]->ordering_number ?> ( <?php echo $product[0]->model ?> )</h2>
				<p><strong>Product Type ID</strong> <?php echo $product[0]->type_id ?></p>
				<p><strong>Voltage</strong> <?php echo $product[0]->voltage ?></p>
				<p><strong>Phase</strong> <?php echo $product[0]->phase ?></p>
				<p><strong>Horse Power</strong> <?php echo $product[0]->horse_power ?></p>
				<p><strong>Ratio</strong> <?php echo $product[0]->ratio ?></p>
				<p><strong>Watts</strong> <?php echo $product[0]->watts ?></p>
				<p><strong>Output Speed</strong> <?php echo $product[0]->output_speed ?></p>
				<p><strong>Torqk</strong> <?php echo $product[0]->torqk ?></p>
				<p><strong>Full Load Amps</strong> <?php echo $product[0]->full_load_amps ?></p>

				<br/><br/>
				<h2>DEBUG DATA</h2>
				Phase String Prefix : <?php echo substr( $product[0]->phase, 0, 3 ) ?><br/>
				Model String Suffix : <?php echo substr($product[0]->model, -2) ?>
			</div>
			<div class="col-md-6">
				<h2>Related Items</h2>
				<?php $related_items = $wpdb->get_results("SELECT * FROM product_related_items"); ?>
				<table class="table table-striped">
				<?php foreach($related_items as $k => $ri): ?>
					<tr>
						<td><strong><?php echo $ri->label ?></strong></td>
						<td>
							<?php if(is_related_item($product, $ri->id)): ?>
							<p class="text-success">YES</p>
							<?php else: ?>
							<p class="text-danger">NO <?php echo var_dump(is_related_item($product, $ri->id)) ?></p>
							<?php endif; ?>					
						</td>
					</tr>
				<?php endforeach; ?>
				</table>
			</div>
			<?php else: ?>
			<div class="col-md-12">No results found.  Please try again.</div>
			<?php endif; ?>
			<?php endif; ?>
		</div>
	</body>	
</html>