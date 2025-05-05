<?php

if (!defined('VERSION')) {
  define('VERSION', '1.0.0');
}

function bluetide_setup()
{
  load_theme_textdomain('bluetide', get_template_directory() . '/languages');
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support(
    'html5',
    array(
      //'search-form',
      //'comment-form',
      //'comment-list',
      //'gallery',
      //'caption',
      //'style',
      //'script',
    )
  );

  register_nav_menus(
    array(
      'menu-1' => esc_html__('Primary', 'bluetide'),
    )
  );


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
      'name' => esc_html__('Footer', 'bluetide'),
      'id' => 'footer',
      'description' => esc_html__('Add widgets here.', 'bluetide'),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget' => '</section>',
      'before_title' => '<h2 class="widget-title">',
      'after_title' => '</h2>',
    )
  );
}
add_action('widgets_init', 'bluetide_widgets_init');

function bluetide_styles_scripts()
{
  wp_enqueue_style('bluetide-style', get_template_directory_uri() . '/public/css/app.css', array(), VERSION);
  wp_enqueue_script('bluetide-script', get_template_directory_uri() . '/public/js/app.js', array('jquery'), VERSION, true);
}

add_action('wp_enqueue_scripts', 'bluetide_styles_scripts');
