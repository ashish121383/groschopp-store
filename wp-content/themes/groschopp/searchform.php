<?php $sq = get_search_query() ? get_search_query() : 'Product # / Keyword'; ?>
<form method="get" class="search" id="searchform" action="<?php echo get_category_link(Products) ?>" >
	<fieldset>
	<label for="search"> Search:</label>
		<span class="text"><input class="txt" id="search" name="s" value="<?php echo $sq; ?>" onfocus="if(this.defaultValue==this.value) {this.value = '';}" onblur="if (this.value == '') {this.value = this.defaultValue;}" /></span>
		<input type="image" src="<?php bloginfo('template_url'); ?>/images/btn-go.gif" value="Search" class="btn-search" alt="go" />
	</fieldset>
</form>