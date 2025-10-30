<?php get_header(); ?>

<div class="contentout">
	<div id="content">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<h1><?php the_title(); ?></h1>
			<div class="entry">
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
	
				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'link_before' => '', 'link_after' => '')); ?>
	
			</div>
		</div>
	  <?php endwhile; endif; ?>
	<?php edit_post_link('编辑本页.', '<p>', '</p>'); ?>
	</div>
	<?php get_footer(); ?>
</div>

<?php get_sidebar(); ?>
<div class="blank"></div>
