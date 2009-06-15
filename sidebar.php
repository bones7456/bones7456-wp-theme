<div id="sidebar">

<ul>
	
	<li>
		<h2>导航</h2>
			<ul>
				<li><a title="Home" href="<?php bloginfo('url'); ?>">Home</a></li>
				<?php wp_list_pages('title_li=&depth=1' ); ?>
			</ul>
	</li>
	<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar() ) : else : ?>
	<li>
		<h2>Categories</h2>
			<ul>
				<?php wp_list_cats('sort_column=name&optioncount=1&hierarchical=0'); ?>
			</ul>
	</li>

	<li>
		<h2>Archives</h2>
			<ul>
				<?php wp_get_archives('type=monthly'); ?>
			</ul>

	<li>
		<h2>Meta</h2>
			<ul>
				<?php wp_register(); ?>
				<li><?php wp_loginout(); ?></li>
				<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Strict">Valid XHTML</a></li>
				<li><a href="http://gmpg.org/xfn/" title="XHTML Friends Network">XFN</a></li>
				<?php wp_meta(); ?>
			</ul>
	</li>

	<li>
		<h2>Links</h2>
			<ul>
				<?php get_links('-1', '<li>', '</li>', '<br />', FALSE, 'id', TRUE, TRUE, -1, TRUE); ?>
    		</ul>	
	</li>
	<?php endif; ?>
</ul>

</div>
