<?php

if (!defined('VERSION')) {
  define('VERSION', '2.0.8');
}


//wp search-replace '<cadena-a-buscar>' '<cadena-de-reemplazo>' --dry-run
//wp search-replace 'http://sitioviejo.com' 'https://sitionuevo.com'

function bluetide_setup()
{
  load_theme_textdomain('bluetide', get_template_directory() . '/languages');
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('woocommerce');
  add_theme_support(
    'html5',
    array(
      'search-form',
      //'comment-form',
      //'comment-list',
      //'gallery',
      'caption',
      //'style',
      //'script',
    )
  );

  register_nav_menus(
    array(
      'menu-1' => esc_html__('Menu 1', 'bluetide'),
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

/*Upload SVG*/
if (!function_exists('a_mime_types')) {

  function a_mime_types($mimes)
  {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
  }

  add_filter('upload_mimes', 'a_mime_types');
}

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


/**
 * Agrega Google Analytics 4 al sitio WordPress
 */
function add_google_analytics()
{
  $gtag_id = 'G-HLEFNC1CN4'; // Reemplaza con tu ID de medición
  // Solo si no es el admin y el ID no está vacío
  if (!is_admin() && !empty($gtag_id)) {
    ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo esc_js($gtag_id); ?>"></script>
    <script>window.dataLayer = window.dataLayer || []; function gtag() { dataLayer.push(arguments); } gtag('js', new Date()); gtag('config', '<?php echo esc_js($gtag_id); ?>');
      <?php
      // Opcional: Desactivar en modo previsualización
      if (is_preview()) {
        echo "gtag('config', '" . esc_js($gtag_id) . "', { 'send_page_view': false });";
      }
      ?>
    </script>
    <?php
  }
}
add_action('wp_head', 'add_google_analytics', 10);


/**
 * Agregar headers de seguridad HTTP en WordPress
 */
function add_security_headers()
{
  // Solo si no es el administrador
  if (is_admin()) {
    return;
  }

  // 1. HTTP Strict Transport Security (HSTS)
  header('Strict-Transport-Security: max-age=63072000; includeSubDomains; preload');

  // 2. Content Security Policy (CSP) - Configuración básica
  // IMPORTANTE: Personaliza según los recursos que uses
  $csp = [
    "default-src 'self'",
    "img-src * data:",
    "media-src * data:",
    "script-src 'self' 'unsafe-eval' 'unsafe-inline' https: ;worker-src 'self' blob: *.googletagmanager.com *.google-analytics.com",
    "style-src 'self' 'unsafe-inline' https:",
    "font-src 'self' https: data:",
    "connect-src 'self' https: *.google-analytics.com *.googletagmanager.com",
    "frame-src 'self' https:",
    "object-src 'none'",
    "base-uri 'self'",
    "form-action 'self'",
    "frame-ancestors 'self'",
    "upgrade-insecure-requests"
  ];
  header("Content-Security-Policy: " . implode("; ", $csp));

  // 3. X-Frame-Options
  header('X-Frame-Options: SAMEORIGIN');

  // 4. Referrer-Policy
  header('Referrer-Policy: strict-origin-when-cross-origin');

  // 5. Permissions-Policy
  $permissions = [
    "accelerometer=()",
    "autoplay=()",
    "camera=()",
    "cross-origin-isolated=()",
    "display-capture=(self)",
    "encrypted-media=()",
    "fullscreen=*",
    "geolocation=(self)",
    "gyroscope=()",
    "keyboard-map=()",
    "magnetometer=()",
    "microphone=()",
    "midi=()",
    "payment=*",
    "picture-in-picture=*",
    "publickey-credentials-get=()",
    "screen-wake-lock=()",
    "sync-xhr=*",
    "usb=()",
    "xr-spatial-tracking=()",
    "gamepad=()",
    "serial=()",
  ];
  header("Permissions-Policy: " . implode(", ", $permissions));

  // 6. Headers adicionales recomendados
  header('X-Content-Type-Options: nosniff');
  header('X-XSS-Protection: 1; mode=block');
  header('Cross-Origin-Opener-Policy: same-origin');
}
//add_action('send_headers', 'add_security_headers');

function bluetide_styles_scripts()
{
  require_once('uniligaConfig.php');
  $uniliga = new Uniliga();

  wp_enqueue_style(
    'owl-carousel-css',
    'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css',
    [],
    '2.3.4'
  );

  wp_enqueue_script(
    'owl-carousel-js',
    'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js',
    ['jquery'], // Depende de jQuery
    '2.3.4',
    true
  );


  wp_enqueue_style('bluetide-style', get_template_directory_uri() . '/public/css/app.css', array('owl-carousel-css'), VERSION);
  wp_enqueue_script('bluetide-script', get_template_directory_uri() . '/public/js/app.js', array('jquery', 'owl-carousel-js'), VERSION, true);

  // Creamos un array con las variables que queremos pasar a JS.
  // Aquí generamos el nonce para la acción 'bluetide_ajax_nonce'.
  // Usamos 'bluetide_ajax_nonce' como nombre de la acción.
  $script_data = array(
    'ajaxUrl' => admin_url('admin-ajax.php'), // URL por defecto de WordPress para AJAX
    'restUrl' => get_rest_url(), // Opcional: para usar la REST API de WordPress
    'nonce' => wp_create_nonce('bluetide_ajax_nonce'), // Generamos un nonce
    'homeurl' => esc_url(home_url('/')),
    'lang' => get_locale(),
    'blogId' => get_current_blog_id(),
    'blogName' => sanitize_title($uniliga->getSiteName())
  );

  // Localizamos el script. Esto crea un objeto global en JavaScript
  // llamado `bluetideScriptData` con las variables definidas arriba.
  wp_localize_script(
    'bluetide-script', // Handle del script al que estamos localizando
    'bluetideScriptData', // Nombre del objeto global en JS
    $script_data         // El array de datos que queremos pasar
  );
}

add_action('wp_enqueue_scripts', 'bluetide_styles_scripts');
