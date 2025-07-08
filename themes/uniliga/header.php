<!doctype html>
<html <?php language_attributes(); ?>>
<?php
require_once('uniligaConfig.php');
$uniliga = new Uniliga();
?>

<head>
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-HLEFNC1CN4"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-HLEFNC1CN4');
  </script>
  <!-- Google Tag Manager -->
  <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-TGJXFBQS');
  </script>
  <!-- End Google Tag Manager -->
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Roboto:wght@500&display=swap" rel="stylesheet">
  <script type="module" src="https://cdn.jsdelivr.net/npm/@justinribeiro/lite-youtube@1/lite-youtube.min.js" rel="modulepreload" as="script" crossorigin="anonymous"></script>
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
  <meta name="google-site-verification" content="rdd_u5v7EZRqBMUS7A65emzqX4CqvJZxQy9g_ZDWJkg" />
</head>


<body <?php body_class(sanitize_title($uniliga->getSiteName())); ?> data-blogId="<?php echo $blog_id; ?>">
  <?php wp_body_open(); ?>

  <?php get_template_part('templates/mobileMainMenu', null); ?>
  <?php if ($blog_id == 1): ?>
    <?php get_template_part('templates/mainMenu', null); ?>
  <?php else:; ?>
    <?php get_template_part('templates/mainMenuSport', null); ?>
  <?php endif; ?>
