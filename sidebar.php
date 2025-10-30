<div id="sidebar">
<button id="close-sidebar" onclick="toggleSidebar()">&times;</button>
<ul>
    <li>
        <h2>导航</h2>
        <ul>
            <li><a title="Home" href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
            <?php wp_list_pages('title_li=&depth=1' ); ?>
        </ul>
    </li>
    <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar() ) : else : ?>
    <li>
        <h2>Categories</h2>
            <ul>
                <?php wp_list_categories('sort_column=name&optioncount=1&hierarchical=0'); ?>
            </ul>
    </li>

    <li>
        <h2>Archives</h2>
            <ul>
                <?php wp_get_archives('type=monthly'); ?>
            </ul>

    <li>
        <h2>Meta</h2>
            <ul>
                <?php wp_register(); ?>
                <li><?php wp_loginout(); ?></li>
                <li><a href="https://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Strict">Valid XHTML</a></li>
                <li><a href="https://gmpg.org/xfn/" title="XHTML Friends Network">XFN</a></li>
                <?php wp_meta(); ?>
            </ul>
    </li>

    <li>
        <h2>Links</h2>
            <ul>
                <?php wp_list_bookmarks('title_li=&categorize=0&show_description=1'); ?>
            </ul>
    </li>
    <?php endif; ?>

    <!-- 原有的comment_style.js可保持引入，也可视情况移动到footer等。 -->
    <script type="text/javascript" src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/js/comment_style.js"></script>
</ul>

</div>
