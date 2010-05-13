<?php
/*
Template Name: Archives
*/
?>
<?php get_header(); ?>

<div class="contentout">
<div id="content">

	<div class="entry">
		<h2>Archives / RSS - <?php MsgCount(); ?> Posts and <?php ComCount(); ?>  Comments</h2>
		<p><a href="<?php bloginfo('rdf_url'); ?>">XML</a> | <a href="<?php bloginfo('rss2_url'); ?>">RSS 2.0</a> | <a href="<?php bloginfo('rss_url'); ?>">RSS .92</a> | <a href="<?php bloginfo('atom_url'); ?>">Atom 0.3</a></p>	

	<h3>Last 100 Articles</h3>
		<ul>
		<?php get_archives('postbypost', '100', 'custom', '<li>', '</li>'); ?></ul>
	</div>

	<div class="entry">
		<h3>Whole Articles</h3>
		<ul>
			<?php get_archives('monthly', '', 'html', '', '', true); ?></ul>
	</div>

</div>
<?php get_footer(); ?>
</div>

<?php get_sidebar(); ?>
<div class="blank"></div>
