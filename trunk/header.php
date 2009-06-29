<?php include_once('additional.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php bloginfo('name'); ?><?php wp_title(':'); ?></title>
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/float_fix.js"></script>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/atom+xml" title="Atom" href="<?php bloginfo('atom_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
</head>
<body>
<div id="wrap">
	<div style="width:100%">
	<span style="margin:0px 0 0 5px;letter-spacing: 0.1em;font:normal 35px Agency FB, Sans-Serif, Trebuchet MS, Arial;">
		<a title="返回首页" href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
	</span>
	<span style="margin:10px;letter-spacing: 0.1em;font:normal 14px Agency FB, Sans-Serif, Trebuchet MS, Arial;">
		<a title="写新文章" href="<?php bloginfo('url'); ?>/wp-admin/post-new.php"><?php bloginfo('description'); ?></a>
	</span>
	</div>
