<!doctype html>
<html <?php language_attributes(); ?>>
<?php 
require_once('uniligaConfig.php');
$uniliga = new Uniliga();
?>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Roboto:wght@500&display=swap" rel="stylesheet">
  <script type="module" src="https://cdn.jsdelivr.net/npm/@justinribeiro/lite-youtube@1/lite-youtube.min.js"></script>
  <?php wp_head(); ?>
  <?php
  $blog_id = get_current_blog_id();
  ?>
  <script>
    var siteConfig = {
      ajaxurl: '<?php echo admin_url('admin-ajax.php'); ?>',
      homeurl: '<?php echo esc_url(home_url('/')); ?>',
      nonce: '<?php echo wp_create_nonce('wp_rest'); ?>',
      lang: '<?php echo get_locale(); ?>',
      blogId: '<?php echo $blog_id; ?>',
      blogName: '<?php echo sanitize_title($uniliga->getSiteName()); ?>'
    }
  </script>
</head>


<body <?php body_class(sanitize_title($uniliga->getSiteName())); ?> data-blogId="<?php echo $blog_id; ?>">
  <?php wp_body_open(); ?>

  <?php get_template_part('templates/mobileMainMenu', null); ?>
  <?php if ($blog_id == 1): ?>
    <?php get_template_part('templates/mainMenu', null); ?>
  <?php else:; ?>
    <?php get_template_part('templates/mainMenuSport', null); ?>
  <?php endif; ?>
