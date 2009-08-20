<?php get_header(); ?>

<?php get_sidebar(); ?>

	<div id="content" class="entry">

		<?php if (have_posts()) : ?>

		 <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
<?php /* If this is a category archive */ if (is_category()) { ?>				
		<h2 class="pagetitle">分类： '<?php echo single_cat_title(); ?>' 的归档</h2>
		
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2 class="pagetitle"><?php the_time('Y年 m月 d日'); ?> 的归档</h2>
		
	 <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 class="pagetitle"><?php the_time('Y年 m月'); ?> 的归档</h2>

		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 class="pagetitle"><?php the_time('Y年'); ?> 的归档</h2>
		
	  <?php /* If this is a search */ } elseif (is_search()) { ?>
		<h2 class="pagetitle">搜索结果：</h2>
		
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 class="pagetitle">作者归档</h2>

		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="pagetitle">Blog 归档</h2>

		<?php } ?>


		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; 前一页') ?></div>
			<div class="alignright"><?php previous_posts_link('下一页 &raquo;') ?></div>
		</div>

		<?php while (have_posts()) : the_post(); ?>
		<div class="post">
				<h1 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="到 <?php the_title(); ?> 的永久链接"><?php the_title(); ?></a></h1>
				
				<div class="entry">
					<?php the_content('<p class="serif">点击查看全文 &raquo;</p>'); ?>
				</div>
		
				<p class="postmetadata">发表于：<?php the_time('Y年m月d日 H:i') ?> | 分类: <?php the_category(', ') ?><?php the_tags(' | 标签: ',', '); ?> | <?php edit_post_link('编辑', '', ' | '); ?>  <?php comments_popup_link('没有评论 &#187;', '1 个评论 &#187;', '% 个评论 &#187;'); ?></p>

			</div>
	
		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; 前一页') ?></div>
			<div class="alignright"><?php previous_posts_link('下一页 &raquo;') ?></div>
		</div>
	
	<?php else : ?>

		<h2>Not Found</h2>
			<form id="searchform" method="get" action="<?php echo get_settings('siteurl'); ?>/index.php">
			<p>Search:&nbsp; <input type="text" name="s" size="15" /></p></form>
	<?php endif; ?>
		
	</div>

<?php get_footer(); ?>
