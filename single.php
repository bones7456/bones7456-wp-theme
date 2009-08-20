<?php get_header(); ?>

<?php get_sidebar(); ?>

	<div id="content">
				
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		<div class="navigation">
			<div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
			<div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
		</div>
	
		<div class="post" id="post-<?php the_ID(); ?>">
			<h1><a href="<?php echo get_permalink() ?>" rel="bookmark" title="永久链接: <?php the_title(); ?>"><?php the_title(); ?></a></h1>
	
			<div class="entry">
				<?php the_content(); ?>
	
				<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
	
				<p class="postmetadatasingle">
					<h3>最后修改时间: <?php last_modified('Y年m月d日 H:i'); ?></h3>
						<small>本文章发表于：
						<?php the_time('Y年m月d日 H:i') ?>
						| 所属分类：<?php the_category(', ') ?><?php the_tags(' | 标签: ',', '); ?>.
						| 您可以<?php comments_rss_link('在此'); ?>订阅本文章的所有评论. | 
						
						<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Both Comments and Pings are open ?>
							您也可以<a href="#respond">发表评论</a>, 或从您的网站<a href="<?php trackback_url(true); ?>" rel="trackback">trackback</a>.
						
						<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Only Pings are Open ?>
							本文章不允许发表评论, 但是你可以从您的网站<a href="<?php trackback_url(true); ?> " rel="trackback">trackback</a>.
						
						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Comments are open, Pings are not ?>
							您可以<a href="#respond">发表评论</a>.
			
						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Neither Comments, nor Pings are open ?>
							本文章不允许发表评论和trackback.			
						
						<?php } edit_post_link('编辑.','',''); ?>
						
					</small>
				</p>
	
			</div>
		</div>
		
	<?php comments_template(); ?>
	
	<?php endwhile; else: ?>
	
		<p>抱歉,找不到页面...</p>
	
<?php endif; ?>
	
	</div>

<?php get_footer(); ?>
