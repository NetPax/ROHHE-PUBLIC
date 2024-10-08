<div class="search">
	<button class="search-toggle js-search-toggle" aria-label="<?php echo get_acf_option('aria_search_show_hide'); ?>">
		<?php get_template_part('resources/img/search.svg'); ?>
		<?php get_template_part('resources/img/close.svg'); ?>
	</button>
	<div class="search-panel js-search-panel">
		<form action="/" method="get">
			<input type="text" name="s" class="search-phrase" aria-label="<?php echo get_acf_option('aria_search_enter_phrase'); ?>">
			<button class="search-submit" aria-label="<?php echo get_acf_option('aria_search_submit'); ?>">
				<?php get_template_part('resources/img/search.svg'); ?>
			</button>
		</form>
	</div>
</div>