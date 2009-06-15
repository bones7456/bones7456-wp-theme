<?php 
/* this quote comment function is based on Quote Comment plugin by Viper007Bond [http://www.viper007bond.com/wordpress-plugins/quote-comment/] */
function quote_comment($text = 'quote', $aftername = '', $displaywhen = TRUE, $beforedate = ' / ', $beforetime = ', ', $commentformanchor = 'commentform', $commentareaid = 'comment') {
	global $comment;

	// Make sure $comment is set, i.e. we're within the comment loop
	if (!isset($comment)) {
		echo 'The quote comment function must be used within the comment loop!';
		return;
	}

	// Strip off the # in front of the anchor if it's inputted
	if (substr($commentformanchor, 0, 1) == '#') $commentformanchor = substr($commentformanchor, 1);

	// Create the byline for the quoted comment
	$byline = $comment->comment_author;
	if ($displaywhen) $byline .= $beforedate . get_comment_date('mdY') . $beforetime . get_comment_time('G:i');
	$byline .= $aftername;

	// If "WordPress should correct invalidly nested XHTML automatically" is on, we need to strip nested blockquotes to make the quote turn up right
	// This is due to a bug that doesn't allow nested blockquotes as described here: http://trac.wordpress.org/ticket/1170
	// This bit of code isn't perfect though as it'll strip all blockquotes including those inside of <code> and such tags, but oh well, it's good enough
	// Oh, and I'm assuming this auto-correction bug will be fixed in version 1.6, so hence version test
	if (get_option('use_balanceTags') == '1' && get_bloginfo('version') <= '1.6') {
		$commentcontent = $comment->comment_content;
		while (strpos($commentcontent, '<blockquote>') !== FALSE) {
			$startpos = strpos($commentcontent, '<blockquote>');
			$endpos = strpos($commentcontent, '</blockquote>');
			$commentcontent = substr_replace($commentcontent, ' [blockquote removed] ', $startpos, $endpos-$startpos+13); // 13 = strlen('</blockquote>');
		}
	} else {
		$commentcontent = $comment->comment_content;
	}
	
	// Output the quote/reply link
	echo "<a href='#" . $commentformanchor . "' title='Quote this comment and reply to it' onclick=\"document.getElementById('" . $commentareaid . "').value += '&lt;blockquote&gt;" . htmlspecialchars(str_replace(array("\r\n", "'"), array('\n', "\'"), '<a href="#comment-' . $comment->comment_ID . '" title="View the original comment">' . $byline . ':</a>\n\n' . $commentcontent), ENT_QUOTES) . '&lt;/blockquote&gt;\n\'">' . $text . "</a>";
}
?>

<?php
/* this last modified function is based on Last Modified plugin by Nick Momrik
[http://mtdewvirus.com/code/wordpress-plugins/], [http://dev.wp-plugins.org/browser/last-modified/]*/
	function last_modified($format='') {
	global $wpdb, $id;

	$post_mod_date = $wpdb->get_var("SELECT post_modified FROM $wpdb->posts WHERE id = $id");

	if (empty($format))
		$format = get_settings('date_format') . ' @ ' . get_settings('time_format');

	echo mysql2date($format, $post_mod_date);
}
?>

<?php 
/* this highlight comment function is based on Lucid Options by Matt Read
[http://www.mattread.com/gravelbox/lucid/], small fixs by Sparanoid */
function highlight_comment ()
{
	global $comment, $user_email, $comment_author_email, $posts;
	$authordata = get_userdata($posts[0]->post_author);
	get_currentuserinfo();

	if ( ($comment->comment_author_email) AND (get_comment_type() == 'comment') )
	{
		if ( $comment->comment_author_email == $authordata->user_email ) //highlight author
			echo 'class="author-comment"';

		elseif ( $comment->comment_author_email == $user_email ) //highlight user if not author
			echo 'class="user-comment"';

		elseif ( $comment->comment_author_email == $comment_author_email ) //highlight commenter if not user
			echo 'class="user-comment"';
	}

	if (get_comment_type() != 'comment')
		echo 'class="ping-comment"';
}
?>

<?php
/* this counts the number of total (puslished) posts function is based on MsgCount plugin by Anders Holte Nielsen, [http://andersdrengen.dk/projects] */
function MsgCount() {
global $wpdb;
$s = "SELECT COUNT(*) FROM $wpdb->posts WHERE post_status = 'publish'";
print $wpdb->get_var($s);
}
?>

<?php
/* this counts the number of comments function is based on ComCount plugin by Anders Holte Nielsen, [http://andersdrengen.dk/projects] */
function ComCount($a=false) {
global $wpdb;
$s = "SELECT COUNT(*) FROM $wpdb->comments WHERE comment_approved = '1'";
 if ($a)
   { $s .= " AND comment_post_ID=$a"; }
print $wpdb->get_var($s);
}
?>