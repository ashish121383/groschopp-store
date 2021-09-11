<?php get_header(); ?>

<?php $product = get_product($_GET['id']) ?>
<?php $category = pods('product', get_the_ID()); ?>
<?php $headers = get_product_headers($product->type_id) ?>

<!-- main -->
<div id="main">
	<form method="post" id="modal" class="clearfix" action="<?php echo get_bloginfo('template_url') ?>/quote-add.php" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?php echo $_GET['id'] ?>" />
		<input type="hidden" name="<?php echo ini_get("session.upload_progress.name"); ?>" value="123" />
		
		<div class="left-col">
			<h2>
				Model #<?php echo $product->ordering_number ?>
				<small>Use the menu below to configure the most common modifications available in 48 hours for the motor you have selected. Can't find the modification you need? Send us a note or upload your print and one of our in-house experts will help you create the solution that's just right for you.</small>
			</h2>
		</div>
		<div class="right-col centered">
			<img src="<?php bloginfo('template_url') ?>/images/phone-cta.png" alt="Questions? Ask an expert. 800.829.4135" />
		</div>
		
		<hr>
		
		<div class="left-col">

			<a href="javascript:;" id="expandAll">Expand All</a> / <a href="javascript:;" id="collapseAll">Collapse All</a>

			<div class="accordion">
				<?php foreach($headers as $header): ?>
				<?php $options = get_product_options($header->id, $product->type_id); $count = 0; ?>

				<?php foreach($options as $option): ?>

					<?php $exception[] = ($option->value == 1 && $product->volage != 115)? true : false ; ?>
					<?php $exception[] = ($option->value == 2 && strpos($product->model, "FC") !== false)? true : false; ?>
					<?php $exception[] = ($option->value == 3 && strpos($product->model, "PM108") !== false)? true : false; ?>
					<?php $exception[] = ($option->value == 4 && substr($product->model, -1) == "i")? true : false ;  ?>
					<?php $exception[] = ($option->value == 5 && strpos($product->model, "PM8") === false)? true : false; ?>

					<?php $count = (!in_array(1, $exception))? $count + 1 : $count; ?>

				<?php unset($exception); endforeach ?>

				<?php if($count > 0): ?>
				<section class="options">
					<header data-product-id="<?php echo $product->type_id ?>" data-image="<?php echo $header->custom_image ?>">
						<span><?php echo $header->label ?></span>
						<div class="tooltip-2">
							<div class="bubble">
								<?php echo $header->description ?>
							</div>
						</div>
					</header>
					<div class="option-content" style="display: none;">
						<?php foreach(get_product_options($header->id, $product->type_id) as $option): ?>

						<?php $exception[] = ($option->value == 1 && $product->volage != 115)? true : false ; ?>
						<?php $exception[] = ($option->value == 2 && strpos($product->model, "FC") !== false)? true : false; ?>
						<?php $exception[] = ($option->value == 3 && strpos($product->model, "PM108") !== false)? true : false; ?>
						<?php $exception[] = ($option->value == 4 && substr($product->model, -1) == "i")? true : false ;  ?>
						<?php $exception[] = ($option->value == 5 && strpos($product->model, "PM8") === false)? true : false; ?>
						
						<?php if(!in_array(1, $exception)): ?>
						<?php if(in_array($option->id, array(33, 34, 36))): ?>
						<input type="<?php echo ($option->form_element === 'R')? "radio" : "checkbox" ; ?>" name="<?php echo $header->label ?>" value="<?php echo $option->label ?>"> <?php echo $option->label ?> <input type="text" name="<?php echo $option->label ?>_temp" />
						<?php else: ?>
						<input type="<?php echo ($option->form_element === 'R')? "radio" : "checkbox" ; ?>" name="<?php echo $header->label ?>" value="<?php echo $option->label ?>"> <?php echo $option->label ?><br/>
						
						<?php endif; endif; unset($exception); endforeach ?>
					</div>
				</section>
				<?php endif; endforeach ?>

			</div>
		</div>
		<div class="right-col custom-images">
			<img src="<?php echo get_bloginfo('url') ?>/data/customize/<?php echo $product->type_id ?>/Motor.jpg" alt="" />
			
			<h3>Submit your own motor print.</h3>
			<p>We'll work with you to create the perfect solution.</p>
			
			<div id="filelist">Your browser doesn't have Flash, Silverlight or HTML5 support.</div>
			<a id="pickfiles" href="javascript:;">
				<img src="<?php bloginfo('template_url') ?>/images/Upload-Print.png" />
			</a>
			
			<h3>Do you have special options not offered here?</h3>
			<p>Send us a note, our in house experts can customize beyond the options offered here, tell us about us your challenge.</p>
			<textarea name="special_options" id="special-options"></textarea>
		</div>
		
		<footer class="modal-controls">
			<input class="text-btn" type="button" value="Cancel" onclick="history.go(-1); return false;" />
			<input class="text-btn green" id="uploadfiles" type="submit" value="Add to Quote" />
		</footer>
		
		<small>Our 48 Hour Customization program is based on the standard modifications listed above. Additional modifications may be available within 48 hours, however, typically require a longer lead time. Additionally, quantities greater than 10 pieces per order are not eligible for the 48 Hour Customization program. (Note: quantities over 10 can be customized, but require standard lead times.) </small>
	
	</form>
	
</div>

<script type="text/javascript">
// Custom example logic

var uploader = new plupload.Uploader({
	runtimes : 'html5,flash,silverlight,html4',
	browse_button : 'pickfiles', // you can pass in id...
	container: document.getElementById('container'), // ... or DOM Element itself
	url : '<?php echo get_bloginfo('template_url') ?>/upload-form.php',
	flash_swf_url : '../js/Moxie.swf',
	silverlight_xap_url : '../js/Moxie.xap',
	
	filters : {
		max_file_size : '10mb',
		mime_types: [
			{title : "PDF Files", extensions : "pdf"}
		]
	},

	init: {
		PostInit: function() {
			document.getElementById('filelist').innerHTML = '';

			document.getElementById('uploadfiles').onclick = function() {
				//document.getElementById('pickfiles').style.visibility = 'hidden';
				uploader.start();

				return false;
			};
		},

		FilesAdded: function(up, files) {
			plupload.each(files, function(file) {
				document.getElementById('filelist').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b><input type="hidden" name="files[]" value="' + file.name + '" /></div>';
			});
		},

		UploadProgress: function(up, file) {
			document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
		},

		Error: function(up, err) {
			document.getElementById('console').innerHTML += "\nError #" + err.code + ": " + err.message;
		},

		UploadComplete: function() {
			$('#modal').submit();
		}
	}
});

uploader.init();

</script>

<?php get_footer(); ?>