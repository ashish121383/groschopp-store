<?php if(is_single()) : ?>

	<div class="navigation">
	
		<?php if(get_adjacent_post('', '', false)) : ?><div class="next"><?php next_post_link() ?></div><?php endif; ?>
		<?php if(get_adjacent_post('', '', true)) : ?><div class="prev"><?php previous_post_link() ?></div><?php endif; ?>
		
	</div>
	
<?php else : ?>

	<?php if ( $wp_query->max_num_pages > 1 ) : ?>
	
		<div class="navigation">
		
			<?php if(get_next_posts_link()) : ?><div class="next"><?php next_posts_link('Older Entries &raquo;') ?></div><?php endif; ?>
			<?php if(get_previous_posts_link()) : ?><div class="prev"><?php previous_posts_link('&laquo; Newer Entries') ?></div><?php endif; ?>
			
		</div>
		
	<?php endif; ?>

<?php endif; ?>
	