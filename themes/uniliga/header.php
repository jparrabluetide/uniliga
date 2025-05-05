<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
  </script>
  <?php wp_head(); ?>
  <script>
    var siteConfig = {
      ajaxurl: '<?php echo admin_url('admin-ajax.php'); ?>',
      homeurl: '<?php echo esc_url(home_url('/')); ?>',
      nonce: '<?php echo wp_create_nonce('wp_rest'); ?>',
      lang: '<?php echo get_locale(); ?>',
    }
  </script>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
