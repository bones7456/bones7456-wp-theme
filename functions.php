<?php
if ( function_exists('register_sidebars') )
    register_sidebars();

add_filter('comments_template', 'legacy_comments');
function legacy_comments($file) {
	if(!function_exists('wp_list_comments')) : // WP 2.7-only check
		$file = TEMPLATEPATH . '/legacy.comments.php';
	endif;
	return $file;
}

function bones7456_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
     <div id="div-comment-<?php comment_ID(); ?>">
      <p <?php if(function_exists('highlight_comment')) highlight_comment(); ?>>
         <?php echo get_avatar($comment,$size='48',$default='<path_to_url>' ); ?>

         <?php printf(__('<cite class="fn">%s</cite> <span class="says">在 %s 说：</span>'), get_comment_author_link(), get_comment_date('Y年m月d日 H:i') ); ?>【 <?php edit_comment_link(__('编辑'),'',' | ') ?><?php comment_reply_link(array_merge( $args, array('add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => '回复'))) ?> 】 
      </p>
      <?php if ($comment->comment_approved == '0') : ?>
         <em><?php _e('评论正在审核中。') ?></em>
         <br />
      <?php endif; ?>
      <?php comment_text() ?>
     </div>
<?php
}
?>
