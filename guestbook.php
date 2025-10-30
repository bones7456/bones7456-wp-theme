<?php
/*
Template Name: GuestBook
*/
?>

<?php get_header(); ?>
<div class="contentout">
<div id="content">
  
  <?php if (have_posts()) : the_post(); ?>
	
    <div class="post" id="post-<?php the_ID(); ?>">

        <h2><?php the_title(); ?></h2>

        <div class="post-content">
			<?php the_content('Read the rest of this page &raquo;'); ?>
            <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'link_before' => '', 'link_after' => '')); ?>
        </div>

		<?php comments_template(); // Get wp-comments.php template ?>

    </div><!-- [post] -->
	
  <?php else: ?>
    <p><?php _e('No Entries found.', 'bones7456'); ?></p>
  <?php endif; ?>

</div>
<?php get_footer(); ?>
</div>

<?php get_sidebar(); ?>
<div class="blank"></div>
