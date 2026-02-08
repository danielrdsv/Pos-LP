<?php
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Theme Options',
        'menu_title' => 'Theme Options',
        'menu_slug' => 'theme-options',
        'capability' => 'edit_posts',
        'redirect' => false
    ));
}
/**
 * Positivus Theme Functions
 *
 * @package Positivus
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

define('POSITIVUS_VERSION', '1.0.0');
define('POSITIVUS_DIR', get_template_directory());
define('POSITIVUS_URI', get_template_directory_uri());

/**
 * Theme Setup
 */
function positivus_setup()
{
    // Add title tag support
    add_theme_support('title-tag');

    // Add custom logo support
    add_theme_support('custom-logo', array(
        'height' => 50,
        'width' => 200,
        'flex-height' => true,
        'flex-width' => true,
    ));

    // Add post thumbnails support
    add_theme_support('post-thumbnails');

    // Add HTML5 support
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // Add editor styles support
    add_theme_support('editor-styles');

    // Add wide alignment support for Gutenberg
    add_theme_support('align-wide');

    // Register Navigation Menus
    register_nav_menus(array(
        'primary' => __('Primary Menu (Header)', 'positivus'),
        'footer' => __('Footer Menu', 'positivus'),
    ));
}
add_action('after_setup_theme', 'positivus_setup');

/**
 * Register Widget Areas
 */
function positivus_widgets_init()
{
    register_sidebar(array(
        'name' => __('Footer - Contact Info', 'positivus'),
        'id' => 'footer-contact',
        'description' => __('Widgets in this area will appear in the footer contact section.', 'positivus'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<span class="headline">',
        'after_title' => '</span>',
    ));

    register_sidebar(array(
        'name' => __('Footer - Subscribe', 'positivus'),
        'id' => 'footer-subscribe',
        'description' => __('Widgets in this area will appear in the footer subscribe section.', 'positivus'),
        'before_widget' => '<div id="%1$s" class="widget subscribe-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => __('Footer - Social Icons', 'positivus'),
        'id' => 'footer-social',
        'description' => __('Add social icons or links for the footer.', 'positivus'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<span class="screen-reader-text">',
        'after_title' => '</span>',
    ));
}
add_action('widgets_init', 'positivus_widgets_init');

/**
 * Register "Service" Custom Post Type
 */
function positivus_register_service_cpt()
{
    $labels = array(
        'name' => __('Services', 'positivus'),
        'singular_name' => __('Service', 'positivus'),
        'add_new' => __('Add New', 'positivus'),
        'add_new_item' => __('Add New Service', 'positivus'),
        'edit_item' => __('Edit Service', 'positivus'),
        'new_item' => __('New Service', 'positivus'),
        'view_item' => __('View Service', 'positivus'),
        'search_items' => __('Search Services', 'positivus'),
        'not_found' => __('No services found', 'positivus'),
        'not_found_in_trash' => __('No services found in Trash', 'positivus'),
        'all_items' => __('All Services', 'positivus'),
        'menu_name' => __('Services', 'positivus'),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true, // enable Gutenberg editor support
        'has_archive' => false,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'page-attributes'),
        'menu_position' => 20,
        'menu_icon' => 'dashicons-admin-tools',
    );

    register_post_type('service', $args);
}
add_action('init', 'positivus_register_service_cpt');

/**
 * Register post meta for service variant (expose to REST)
 */
function positivus_register_service_meta()
{
    register_post_meta('service', 'service_variant', array(
        'show_in_rest' => true,
        'single' => true,
        'type' => 'string',
    ));
}
add_action('init', 'positivus_register_service_meta');

/**
 * Add meta box for Service variant (light/green/dark)
 */
function positivus_add_service_meta_box()
{
    add_meta_box(
        'positivus_service_options',
        __('Service Options', 'positivus'),
        'positivus_service_meta_box_callback',
        'service',
        'side',
        'default'
    );
}
add_action('add_meta_boxes', 'positivus_add_service_meta_box');

function positivus_service_meta_box_callback($post)
{
    wp_nonce_field('positivus_save_service_meta', 'positivus_service_meta_nonce');
    $value = get_post_meta($post->ID, 'service_variant', true);
    if (!$value) {
        $value = 'light';
    }
    ?>
    <p>
        <label for="positivus_service_variant"><?php esc_html_e('Color variant', 'positivus'); ?></label>
        <select name="positivus_service_variant" id="positivus_service_variant" style="width:100%;">
            <option value="light" <?php selected($value, 'light'); ?>><?php esc_html_e('Light', 'positivus'); ?>
            </option>
            <option value="green" <?php selected($value, 'green'); ?>><?php esc_html_e('Green', 'positivus'); ?>
            </option>
            <option value="dark" <?php selected($value, 'dark'); ?>><?php esc_html_e('Dark', 'positivus'); ?></option>
        </select>
    </p>
    <?php
}

function positivus_save_service_meta($post_id)
{
    if (!isset($_POST['positivus_service_meta_nonce'])) {
        return;
    }
    if (!wp_verify_nonce($_POST['positivus_service_meta_nonce'], 'positivus_save_service_meta')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (isset($_POST['post_type']) && 'service' === $_POST['post_type']) {
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }
    }

    if (isset($_POST['positivus_service_variant'])) {
        $variant = sanitize_text_field(wp_unslash($_POST['positivus_service_variant']));
        if (in_array($variant, array('light', 'green', 'dark'), true)) {
            update_post_meta($post_id, 'service_variant', $variant);
        } else {
            delete_post_meta($post_id, 'service_variant');
        }
    }
}
add_action('save_post', 'positivus_save_service_meta');


function positivus_enqueue_scripts()
{
    // Styles
    wp_enqueue_style('positivus-main', POSITIVUS_URI . '/css/style.css', array(), POSITIVUS_VERSION);
    wp_enqueue_style('positivus-icomoon', POSITIVUS_URI . '/fonts/icomoon/style.css', array(), POSITIVUS_VERSION);
    wp_enqueue_style('swiper', 'https://unpkg.com/swiper@9/swiper-bundle.min.css', array(), '9.0');

    // Scripts
    wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js', array(), '3.12.5', true);
    wp_enqueue_script('gsap-scrolltrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js', array('gsap'), '3.12.5', true);
    wp_enqueue_script('lenis', 'https://unpkg.com/lenis@1.1.18/dist/lenis.min.js', array(), '1.1.18', true);
    wp_enqueue_script('swiper', 'https://unpkg.com/swiper@9/swiper-bundle.min.js', array(), '9.0', true);
    wp_enqueue_script('positivus-main', POSITIVUS_URI . '/js/main.js', array('gsap', 'gsap-scrolltrigger', 'lenis', 'swiper'), POSITIVUS_VERSION, true);
}
add_action('wp_enqueue_scripts', 'positivus_enqueue_scripts');


class Positivus_Nav_Walker extends Walker_Nav_Menu
{
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $output .= '<li>';
        $attributes = !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
        $attributes .= ' class="nav-link"';
        $attributes .= !empty($item->title) ? ' title="' . esc_attr($item->title) . '"' : '';
        $output .= '<a' . $attributes . '>';
        $output .= esc_html($item->title);
        $output .= '</a>';
    }
}


class Positivus_Footer_Nav_Walker extends Walker_Nav_Menu
{
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $output .= '<li>';
        $attributes = !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
        $attributes .= ' class="footer-link"';
        $attributes .= !empty($item->title) ? ' title="' . esc_attr($item->title) . '"' : '';
        $output .= '<a' . $attributes . '>';
        $output .= esc_html($item->title);
        $output .= '</a>';
    }
}
