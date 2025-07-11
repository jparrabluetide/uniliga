<?php

if (!defined('VERSION')) {
  define('VERSION', '1.0.10');
}

function bluetide_setup()
{
  load_theme_textdomain('bluetide', get_template_directory() . '/languages');
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support(
    'html5',
    array(
      'search-form',
      //'comment-form',
      //'comment-list',
      'gallery',
      'caption',
      //'style',
      //'script',
    )
  );

  register_nav_menus(
    array(
      'menu-1' => esc_html__('Primary', 'bluetide'),
      'menu-2' => esc_html__('Menu 2', 'bluetide'),
      'menu-sport' => esc_html__('Menu sport', 'bluetide'),
    )
  );

  add_theme_support('customize-selective-refresh-widgets');

  add_theme_support(
    'custom-logo',
    array(
      'width' => 120,
      'height' => 120,
      'flex-width' => true,
      'flex-height' => true,
    )
  );
}

add_action('after_setup_theme', 'bluetide_setup');

function bluetide_widgets_init()
{

  register_sidebar(
    array(
      'name' => esc_html__('Footer About', 'bluetide'),
      'id' => 'footer-about',
      'description' => esc_html__('Add widgets here.', 'bluetide'),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget' => '</section>',
      'before_title' => '<h2 class="widget-title">',
      'after_title' => '</h2>',
    )
  );

  register_sidebar(
    array(
      'name' => esc_html__('Footer Contact', 'bluetide'),
      'id' => 'footer-contact',
      'description' => esc_html__('Add widgets here.', 'bluetide'),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget' => '</section>',
      'before_title' => '<h2 class="widget-title">',
      'after_title' => '</h2>',
    )
  );
}
add_action('widgets_init', 'bluetide_widgets_init');


/**
 * Remove the version number from the RSS feed.
 *
 * @return string Empty string
 */
function wordpress_remove_version()
{
  return '';
}
add_filter('the_generator', 'wordpress_remove_version');


/**
 * Return a generic error message instead of the default WordPress error message, which can reveal version information.
 *
 * @return string
 */
function no_wordpress_errors()
{
  return 'Something is wrong!';
}
add_filter('login_errors', 'no_wordpress_errors');


/**
 * Remove the X-Powered-By header from the HTTP response.
 *
 * @param array $headers Associative array of HTTP headers.
 * @return array The modified array of HTTP headers.
 */
function remove_x_powered_by($headers)
{
  unset($headers['X-Powered-By']);
  return $headers;
}

add_filter('wp_headers', 'remove_x_powered_by');



function bluetide_styles_scripts()
{

  wp_enqueue_style('lightbox2', 'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.5/css/lightbox.min.css', array(), '2.11.5');
  wp_enqueue_script('lightbox2', 'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.5/js/lightbox.min.js', array('jquery'), '2.11.5', true);

  wp_enqueue_style('bluetide-style', get_template_directory_uri() . '/public/css/app.css', array('swiper'), VERSION);
  wp_enqueue_script('bluetide-script', get_template_directory_uri() . '/public/js/app.js', array('jquery', 'swiper'), VERSION, true);
}

add_action('wp_enqueue_scripts', 'bluetide_styles_scripts');
