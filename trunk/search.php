<?php get_header(); ?>

<?php get_sidebar(); ?>

	<div id="content">

	<?php if (have_posts()) : ?>

		<h2 class="pagetitle">搜索结果：</h2>
		
		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; 前一页') ?></div>
			<div class="alignright"><?php previous_posts_link('下一页 &raquo;') ?></div>
		</div>

		<?php while (have_posts()) : the_post(); ?>
				
			<div class="post">
				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>
		
				<p class="postmetadata">发表于：<?php the_time('Y年m月d日 H:i') ?> | 分类: <?php the_category(', ') ?> | <?php edit_post_link('编辑', '', ' | '); ?>  <?php comments_popup_link('没有评论 &#187;', '1 个评论 &#187;', '% 个评论 &#187;'); ?></p>
			</div>
	
		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; 前一页') ?></div>
			<div class="alignright"><?php previous_posts_link('下一页 &raquo;') ?></div>
		</div>
	
	<?php else : ?>

		<h2>没找到相关的结果，试试其他的关键字？</h2>
		<form id="searchform" method="get" action="<?php echo get_settings('siteurl'); ?>/index.php">
			<p>搜索:&nbsp; <input type="text" name="s" size="15" /></p></form>

	<?php endif; ?>
		
	</div>

<?php get_footer(); ?>
