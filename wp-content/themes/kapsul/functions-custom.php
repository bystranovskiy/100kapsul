<?php

/**
 * Definition of global variables
 */

defined('THEME_URI') || define('THEME_URI', get_template_directory_uri());
defined('THEME_DIR') || define('THEME_DIR', get_template_directory());


/**
 * Enqueue theme global css and js
 */

function enqueue_theme_build()
{
    wp_enqueue_style('main-styles', THEME_URI . '/build/main.min.css', array());
    wp_enqueue_script('main-script', THEME_URI . '/build/main.min.js', array('jquery'));

    wp_localize_script('main-script', 'ajaxMeta', array(
        'ajaxurl' => admin_url('admin-ajax.php')
    ));
}

add_action('wp_enqueue_scripts', 'enqueue_theme_build');


/**
 * Enqueue sections css and js
 */

function enqueue_sections_build($layouts)
{
    foreach ($layouts as $layout) {
        $css_file_path = '/build/section-' . $layout . '.min.css';
        $css_file_path_url = THEME_URI . $css_file_path;
        $css_file_path_dir = THEME_DIR . $css_file_path;
        if (file_exists($css_file_path_dir) && file_get_contents($css_file_path_dir)) {
            wp_enqueue_style('section-' . $layout, $css_file_path_url, array());
        }

        $js_file_path = '/build/section-' . $layout . '.min.js';
        $js_file_path_url = THEME_URI . $js_file_path;
        $js_file_path_dir = THEME_DIR . $js_file_path;
        if (file_exists($js_file_path_dir) && file_get_contents($js_file_path_dir)) {
            wp_enqueue_script('section-' . $layout, $js_file_path_url, array('jquery'));
        }
    }
}


/**
 * Init ACF theme option page
 */

function init_acf_option()
{
    if (function_exists('acf_add_options_page')) {

        // Add parent.
        $parent = acf_add_options_page(array(
            'page_title' => __('Загальні опції', 'kapsul'),
            // 'menu_title' => 'Theme Settings',
            'menu_slug' => 'theme-general-settings',
            'capability' => 'edit_posts',
            'redirect' => false,
        ));

        // Add sub pages.
        acf_add_options_page(array(
            'page_title' => __('Квартири та приміщення', 'kapsul'),
            'menu_slug' => 'apartments-and-rooms',
            'parent_slug' => $parent['menu_slug'],
        ));
        acf_add_options_page(array(
            'page_title' => __('Попапи', 'kapsul'),
            'menu_slug' => 'popups',
            'parent_slug' => $parent['menu_slug'],
        ));

    }
}

add_action('acf/init', 'init_acf_option');


/**
 * Register widget area using for loop
 */

function widget_area()
{
    for ($i = 2, $n = 4; $i <= $n; $i++) {
        register_sidebar(
            array(
                'name' => esc_html__('Footer Area #', 'kapsul') . $i,
                'id' => 'footer-' . $i,
                'description' => sprintf(esc_html__('The #%s column in footer area', 'kapsul'), $i),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h3 class="widget-title">',
                'after_title' => '</h3>',
            )
        );
    }
}

add_action('widgets_init', 'widget_area');


add_action('admin_head', 'custom_styles');
function custom_styles()
{
    echo '
<style>
    .acf-admin-single-field-group .acf-field-object-flexible-content .acf-is-subfields .acf-field-object .acf-label, 
    .acf-admin-single-field-group .acf-field-object-flexible-content .acf-is-subfields .acf-field-object .acf-input, 
    .post-type-acf-field-group .metabox-holder.columns-1 #acf-field-group-fields, 
    .post-type-acf-field-group .metabox-holder.columns-1 #acf-field-group-options, 
    .post-type-acf-field-group .metabox-holder.columns-1 .meta-box-sortables.ui-sortable, 
    .post-type-acf-field-group .metabox-holder.columns-1 .notice, 
    .post-type-acf-field-group.columns-1 .notice {
        max-width: 100%;
    }
    .post-type-acf-field-group .acf-field-setting-name .acf-tip {
        left: auto;
        right: 0;
    }
</style>
';
}

function in_array_any($needles, $haystack): bool
{
    return (bool)array_intersect($needles, $haystack);
}


require_once(__DIR__ . '/template-parts/general/ajax-choosing-another-room.php');
require_once(__DIR__ . '/template-parts/general/ajax-load-more-posts.php');

add_filter('wpseo_breadcrumb_links', 'wpseo_override_yoast_breadcrumb_trail');
function wpseo_override_yoast_breadcrumb_trail($links)
{
    global $post;
    if (is_singular('post')) {
        $breadcrumb[] = array(
            'url' => get_permalink(get_option('page_for_posts')),
            'text' => get_the_title(get_option('page_for_posts'))
        );
        array_splice($links, 1, -2, $breadcrumb);
    }
    return $links;
}