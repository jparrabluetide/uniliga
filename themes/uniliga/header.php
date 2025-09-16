<!doctype html>
<html <?php language_attributes(); ?>>

<?php
require_once('uniligaConfig.php');
$uniliga = new Uniliga();
?>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>

<body <?php body_class(sanitize_title($uniliga->getSiteName())); ?> id="<?php echo 'page-'.get_post_field( 'post_name', get_the_ID() ) ?>">
  <?php wp_body_open(); ?>
  <?php get_template_part('templates/header-menu', null); ?>

