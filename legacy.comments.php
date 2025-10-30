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

<?php if ($comments) : ?>
	<h3 id="comments"><?php comments_number('没有评论', '一个评论', '% 个评论' );?> 关于： &#8220;<?php the_title(); ?>&#8221;</h3> 

	<ol class="commentlist">

	<?php foreach ($comments as $comment) : ?>

		<li id="comment-<?php comment_ID() ?>">
			<div id="commentinfo"><p <?php if(function_exists('highlight_comment')) highlight_comment(); ?>><cite><?php comment_author_link() ?></cite> 在
			<?php if ($comment->comment_approved == '0') : ?>
			<em>评论正在审核中。</em>
			<?php endif; ?>
			
			<small class="commentmetadata"> <a href="#comment-<?php comment_ID() ?>"> <?php comment_date('Y年m月d日 H:i') ?> </a></small> 说： 【 <?php edit_comment_link('编辑','',''); ?> <?php if (function_exists('quote_comment')) { quote_comment('引用'); } ?> 】</p></div>

			<?php comment_text() ?>

		</li>



	<?php endforeach; /* end for each comment */ ?>

	</ol>

 <?php else : // this is displayed if there are no comments so far ?>

  <?php if ('open' == $post->comment_status) : ?> 
		<!-- If comments are open, but there are no comments. -->
		
	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Comments are closed.</p>
		
	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

<h3 id="respond">发表评论</h3>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>您必须 <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">登录</a> 才能发表评论.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p>已登录： <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">登出 &raquo;</a></p>

<?php else : ?>

<p><label for="author"><small>姓名 <?php if ($req) _e('(必须)', 'bones7456'); ?>:</small></label><br /><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="40" tabindex="1" /></p>
<p><label for="email"><small>邮件地址 (不会公开) <?php if ($req) _e('(必须)', 'bones7456'); ?>:</small></label><br /><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="40" tabindex="2" /></p>
<p><label for="url"><small>个人主页:</small></label><br /><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="40" tabindex="3" /></p>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> You can use these tags: <?php echo allowed_tags(); ?></small></p>-->

<p><textarea name="comment" id="comment" cols="37" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="提交" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>
