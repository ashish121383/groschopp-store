<?php if(is_search()): ?>

	<div class="post">
		<div class="title">
			<h2>No posts found.</h2>
		</div>
	</div>
	
<?php else: ?>

	<div class="post">
		<div class="title">
			<h1>Oops! We can't find the page you requested</h1>
		</div>
		<div class="content">
			<p>Bad link? Mistyped address? We're not sure.</p>
			<p>Here are some useful pages:</p>
			
			<div class="reroute-btns">
				<a href="/">Homepage</a>
				<a href="/category/products">Products</a>
				<a href="<?php echo get_permalink(2451) ?>">Blog</a>
				<a href="<?php echo get_permalink(3575) ?>">Tech Tips</a>
			</div>
			
			<p>If you think something is wrong, please <a href="<?php echo get_permalink(11) ?>">contact us</a> so we can correct the issue</p>
		</div>
	</div>

<?php endif; ?>
	