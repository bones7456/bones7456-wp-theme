<?php get_header(); ?>

<div class="contentout">
	<div id="content">

	<?php if (have_posts()) : ?>
		
		<?php while (have_posts()) : the_post(); ?>
				
			<div class="post" id="post-<?php the_ID(); ?>">
				<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="到 <?php the_title(); ?> 的永久链接"><?php the_title(); ?></a></h1>
				<div class="entry">
					<?php the_content('点击查看全文 &raquo;'); ?>
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
		<p>Sorry, but you are looking for something that isn't here.</p>
				<form id="searchform" method="get" action="<?php echo get_settings('siteurl'); ?>/index.php">
			<p>Search:&nbsp; <input type="text" name="s" size="15" /></p></form>

	<?php endif; ?>

	</div>
	<?php get_footer(); ?>
</div>

<?php get_sidebar(); ?>
<div class="blank"></div>

