<?php include_once('additional.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<!-- 新增：让移动设备正确缩放 -->
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title><?php bloginfo('name'); ?><?php wp_title(':'); ?></title>
<!-- 加载我们修改后的JS（保持路径不变即可） -->
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
    <!-- 这里可以加 position: relative; 或者在style.css里针对 #wrap 做其他适配 -->
    <div style="width:100%; position: relative;">
        <span style="margin:0px 0 0 5px;letter-spacing: 0.1em;font:normal 42px bonesapa,Agency FB, Sans-Serif, Trebuchet MS, Arial;">
            <a title="返回首页" href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
        </span>
		<br class="mobile-break" />
        <span style="margin:10px;letter-spacing: 0.1em;font:normal 16px bonesapa,Agency FB, Sans-Serif, Trebuchet MS, Arial;">
            <a title="写新文章" href="<?php bloginfo('url'); ?>/wp-admin/post-new.php"><?php bloginfo('description'); ?></a>
        </span>

        <!-- 新增：移动端显示的“菜单”按钮，点击后切换右侧边栏 -->
        <button id="sidebar-toggle" onclick="toggleSidebar()">&laquo;</button>
    </div>
