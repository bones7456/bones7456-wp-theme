<?php
/**
 * Bones7456 Theme Functions
 *
 * @package Bones7456
 * @since 1.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Theme setup
function bones7456_setup() {
    // Add theme support for various features
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-background');
    add_theme_support('custom-header');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    add_theme_support('wp-block-styles');
    add_theme_support('responsive-embeds');
    add_theme_support('custom-logo');
    add_theme_support('align-wide');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'bones7456'),
    ));
    
    // Load theme textdomain
    load_theme_textdomain('bones7456', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'bones7456_setup');

// Register sidebars
function bones7456_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar', 'bones7456'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here to appear in your sidebar.', 'bones7456'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'bones7456_widgets_init');

// Enqueue scripts and styles
function bones7456_scripts() {
    wp_enqueue_style('bones7456-style', get_stylesheet_uri(), array(), '1.36');
    wp_enqueue_script('bones7456-script', get_template_directory_uri() . '/js/float_fix.js', array(), '1.36', true);
    
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'bones7456_scripts');

// Add editor styles
function bones7456_editor_styles() {
    add_editor_style();
}
add_action('after_setup_theme', 'bones7456_editor_styles');

// Register block styles
function bones7456_register_block_styles() {
    // Register button block style
    register_block_style(
        'core/button',
        array(
            'name'  => 'bones7456-button',
            'label' => __('Bones7456 Style', 'bones7456'),
        )
    );
    
    // Register quote block style
    register_block_style(
        'core/quote',
        array(
            'name'  => 'bones7456-quote',
            'label' => __('Bones7456 Quote', 'bones7456'),
        )
    );
}
add_action('init', 'bones7456_register_block_styles');

// Register block patterns
function bones7456_register_block_patterns() {
    register_block_pattern(
        'bones7456/hero-section',
        array(
            'title'       => __('Hero Section', 'bones7456'),
            'description' => __('A hero section with title and description', 'bones7456'),
            'content'     => '<!-- wp:group {"backgroundColor":"#202020","textColor":"#bbb","style":{"spacing":{"padding":{"top":"2rem","bottom":"2rem","left":"1rem","right":"1rem"}}}} -->
<div class="wp-block-group has-bones7456-text-color has-bones7456-background-color" style="padding-top:2rem;padding-right:1rem;padding-bottom:2rem;padding-left:1rem"><!-- wp:heading {"textAlign":"center","style":{"typography":{"fontSize":"2.5rem"}}} -->
<h2 class="wp-block-heading has-text-align-center" style="font-size:2.5rem">Welcome to Bones7456</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1.2rem"}}} -->
<p class="has-text-align-center" style="font-size:1.2rem">A modern WordPress theme optimized for Chinese content</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->',
            'categories'  => array('featured'),
        )
    );
}
add_action('init', 'bones7456_register_block_patterns');

// Legacy comments support
add_filter('comments_template', 'bones7456_legacy_comments');
function bones7456_legacy_comments($file) {
    if (!function_exists('wp_list_comments')) {
        $file = get_template_directory() . '/legacy.comments.php';
    }
    return $file;
}

// Custom comment callback
function bones7456_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment; ?>
    <li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
        <div id="div-comment-<?php comment_ID(); ?>">
            <p <?php if(function_exists('highlight_comment')) highlight_comment(); ?>>
                <?php echo get_avatar($comment, $size='48', $default=''); ?>
                <?php printf(__('<cite class="fn">%s</cite> <span class="says">在 %s 说：</span>', 'bones7456'), get_comment_author_link(), get_comment_date('Y年m月d日 H:i')); ?>【 <?php edit_comment_link(__('编辑', 'bones7456'),'',' | ') ?><?php comment_reply_link(array_merge( $args, array('add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => __('回复', 'bones7456')))) ?> 】
            </p>
            <?php if ($comment->comment_approved == '0') : ?>
                <em><?php _e('评论正在审核中。', 'bones7456') ?></em>
                <br />
            <?php endif; ?>
            <?php comment_text() ?>
        </div>
<?php
}

// 移除不必要的图片尺寸
add_filter('big_image_size_threshold', '__return_false');
add_filter('intermediate_image_sizes_advanced', function ($sizes) {
    foreach (['medium_large', '1536x1536', '2048x2048'] as $s) {
        unset($sizes[$s]);
    }
    return $sizes;
});
