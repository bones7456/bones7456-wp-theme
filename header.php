<?php get_template_part('additional'); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="profile" href="https://gmpg.org/xfn/11" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="wrap">
    <!-- 这里可以加 position: relative; 或者在style.css里针对 #wrap 做其他适配 -->
    <div style="width:100%; position: relative;">
        <span style="margin:0px 0 0 5px;letter-spacing: 0.1em;font:normal 42px bonesapa,Agency FB, Sans-Serif, Trebuchet MS, Arial;">
            <a title="返回首页" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
        </span>
		<br class="mobile-break" />
        <span style="margin:10px;letter-spacing: 0.1em;font:normal 16px bonesapa,Agency FB, Sans-Serif, Trebuchet MS, Arial;">
            <a title="写新文章" href="<?php echo esc_url(home_url('/wp-admin/post-new.php')); ?>"><?php bloginfo('description'); ?></a>
        </span>

        <!-- 新增：移动端显示的“菜单”按钮，点击后切换右侧边栏 -->
        <button id="sidebar-toggle" onclick="toggleSidebar()">&laquo;</button>
    </div>
