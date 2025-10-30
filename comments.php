<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('请勿直接打开此页，谢谢！');

        if (!empty($post->post_password)) { // if there's a password
            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
				?>
				
				<p class="nocomments">此页已被密码保护，请输入密码<p>
				
				<?php
				return;
            }
        }
?>

<!-- You can start editing here. -->

<?php if (have_comments()) : ?>
	<h3 id="comments"><?php comments_number('没有评论', '一个评论', '% 个评论' );?> 关于： &#8220;<?php the_title(); ?>&#8221;</h3> 

	<ol class="commentlist"><?php wp_list_comments('callback=bones7456_comment'); ?></ol>

<div class="navigation">
<div class="alignleft"><?php previous_comments_link() ?></div>
<div class="alignright"><?php next_comments_link('回到评论顶端 △ ') ?></div>
</div>

<?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?> 
		<!-- If comments are open, but there are no comments. -->
		
		<?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">已关闭评论.</p>
		
	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>
	<?php comment_form(); ?>
<?php endif; ?>
