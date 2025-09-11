<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="<?php echo 'page-'.get_post_field( 'post_name', get_the_ID() ) ?>">
  <?php wp_body_open(); ?>
  <?php //get_template_part('templates/mainMenu', null); ?>
  <?php
  //Header
  //echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display(88);
  //Main menu
  //echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display(92);
  ?>
