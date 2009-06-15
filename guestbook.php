<?php
/*
Template Name: GuestBook
*/
?>

<?php get_header(); ?>
<?php get_sidebar(); ?>

<div id="content">
  
  <?php if (have_posts()) : the_post(); ?>
	
    <div class="post" id="post-<?php the_ID(); ?>">

        <h2><?php the_title(); ?></h2>

        <div class="post-content">
			<?php the_content('Read the rest of this page &raquo;'); ?>
            <?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
        </div>

		<?php comments_template(); // Get wp-comments.php template ?>

    </div><!-- [post] -->
	
  <?php else: ?>
    <p><?php _e('No Entries found.'); ?></p>
  <?php endif; ?>

</div><!--/content -->

<?php get_footer(); ?>
