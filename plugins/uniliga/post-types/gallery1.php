<?php

$labels = array(
  'name' => _x('Gallery', 'General name', 'bluetide'),
  'singular_name' => _x('Gallery', 'Singular name', 'bluetide'),
  'menu_name' => __('Galleries', 'bluetide'),
  'name_admin_bar' => __('Gallery', 'bluetide'),
  'archives' => __('Item Archives', 'bluetide'),
  'attributes' => __('Item Attributes', 'bluetide'),
  'parent_item_colon' => __('Parent Item:', 'bluetide'),
  'all_items' => __('All gallerys', 'bluetide'),
  'add_new_item' => __('Add new gallery', 'bluetide'),
  'add_new' => __('Add new', 'bluetide'),
  'new_item' => __('new gallery', 'bluetide'),
  'edit_item' => __('Edit gallery', 'bluetide'),
  'update_item' => __('Update gallery', 'bluetide'),
  'view_item' => __('View gallery', 'bluetide'),
  'view_items' => __('View gallerys', 'bluetide'),
  'search_items' => __('Search gallerys', 'bluetide'),
  'not_found' => __('No gallerys found', 'bluetide'),
  'not_found_in_trash' => __('No gallerys found in the trash', 'bluetide'),
  'featured_image' => __('Featured image', 'bluetide'),
  'set_featured_image' => __('Add featured image', 'bluetide'),
  'remove_featured_image' => __('Remove featured image', 'bluetide'),
  'use_featured_image' => __('Use as featured image', 'bluetide'),
  'insert_into_item' => __('Insert to gallerys', 'bluetide'),
  'uploaded_to_this_item' => __('Upload to gallery', 'bluetide'),
  'items_list' => __('List of gallerys', 'bluetide'),
  'items_list_navigation' => __('Navigate to list of gallerys', 'bluetide'),
  'filter_items_list' => __('Filter list of gallerys', 'bluetide'),
);
$args = array(
  'label' => __('Gallery', 'bluetide'),
  'description' => __('gallery description', 'bluetide'),
  'labels' => $labels,
  'supports' => array('title', 'editor', 'thumbnail'),
  'hierarchical' => false,
  'public' => false,
  'show_ui' => true,
  'show_in_menu' => true,
  'menu_position' => 5,
  'can_export' => true,
  'has_archive' => true,
  'exclude_from_search' => false,
  'publicly_queryable' => true,
  'map_meta_cap' => true,
  'query_var' => true,
  'rewrite' => array('slug' => 'gallery1'),
  'menu_icon' => 'dashicons-format-image',
  'show_in_rest' => false,
  'rest_base' => 'gallery1',
  'capability_type' => 'post',
  'taxonomies' => array('category'),
);
register_post_type('gallery1', $args);

/**
 * Images
 */

add_image_size('gallery1-card', 84, 84, true);

/**
 * Impor CSV
 */

add_action('admin_menu', function () {
  add_submenu_page(
    'edit.php?post_type=gallery1',
    'Importar Gallery',
    'Importar CSV',
    'manage_options',
    'gallery1-config',
    'gallery1_importer_page'
  );
});

function gallery1_importer_page()
{
  if (isset($_FILES['gallery_csv'])) {
    $results = handle_gallery_csv_upload();

    if (is_wp_error($results)) {
      echo '<div class="notice notice-error"><p>' . $results->get_error_message() . '</p></div>';
    } else {
      echo '<div class="notice notice-success"><p>';
      printf(
        'Importación completada: %d éxitos, %d errores de %d totales',
        $results['success'],
        count($results['errors']),
        $results['total']
      );
      echo '</p></div>';

      if (!empty($results['errors'])) {
        echo '<div class="notice notice-warning"><ul>';
        foreach ($results['errors'] as $error) {
          echo '<li>' . esc_html($error) . '</li>';
        }
        echo '</ul></div>';
      }
    }
  }

  // Mostrar formulario HTML
?>
  <div class="form-wrap">
    <h2>Importar información para Galería</h2>
    <form method="post" enctype="multipart/form-data">
      <div class="form-field form-required term-name-wrap">
        <label for="csv_file">Importar CSV</label>
        <input type="file" name="gallery_csv" id="gallery_csv" accept=".csv" class="widefat" required />
        <p id="name-description">Seleccione un archivo CSV para importar la información de la galería.</p>
      </div>
      <button type="submit" class="button button-primary button-large">Importar</button>
    </form>
  </div>
<?php
}



/**
 * Procesar archivo CSV para importación masiva
 */
function process_gallery_csv_import($file_path)
{

  if (!file_exists($file_path)) {
    return new WP_Error('file_not_found', 'El archivo CSV no existe');
  }

  $results = [
    'success' => 0,
    'errors' => [],
    'total' => 0
  ];

  // Abrir el archivo CSV
  if (($handle = fopen($file_path, "r")) !== FALSE) {
    $headers = clean_csv_headers(fgetcsv($handle));

    // Mapeo de columnas esperadas (ajusta según tu CSV)
    $expected_columns = [
      'post_title',
      'post_content',
      'post_date',
      'featured_image',
      'post_categories',
      'post_status',
      'sp_leagues'
    ];

    // Verificar cabeceras
    if (count(array_intersect($expected_columns, $headers)) != count($expected_columns)) {
      fclose($handle);
      return new WP_Error('invalid_csv', 'El archivo CSV no tiene las columnas esperadas');
    }

    // Procesar cada línea
    while (($data = fgetcsv($handle)) !== FALSE) {
      $results['total']++;

      // Verificar que los arrays tengan el mismo número de elementos
      if (count($headers) != count($data)) {
        $results['errors'][] = sprintf(
          'Línea %d: Error al procesar la línea. Los arrays no tienen el mismo número de elementos.',
          $results['total']
        );
        continue;
      }

      // Asociar datos con cabeceras
      $row = array_combine($headers, $data);

      // Procesar categorías (formato: term1,term2)
      $categoriesCsv = !empty($row['post_categories']) ? array_map('trim', explode(',', $row['post_categories'])) : [];
      $categories = [
        'category' => $categoriesCsv
      ];
      
      // Procesar ligas (formato: term1,term2)
      $leagues = !empty($row['sp_leagues']) ? array_map('trim', explode(',', $row['sp_leagues'])) : [];

      $image_id = attachment_url_to_postid($row['featured_image']);

      // Insertar post
      $result = insertGallery(
        $row['post_title'],
        $row['post_content'],
        $image_id,
        $categories,
        $leagues
      );

      if (is_wp_error($result)) {
        $results['errors'][] = sprintf(
          'Línea %d: %s - %s',
          $results['total'],
          $row['post_title'],
          $result->get_error_message()
        );
      } else {
        $results['success']++;
      }
    }
    fclose($handle);
  }

  return $results;
}

/**
 * Función para manejar la subida y procesamiento del CSV desde un formulario
 */
function handle_gallery_csv_upload()
{
  if (!isset($_FILES['gallery_csv']) || !current_user_can('edit_posts')) {
    return new WP_Error('invalid_request', 'Solicitud no válida');
  }

  // Verificar tipo de archivo
  $file_type = wp_check_filetype($_FILES['gallery_csv']['name']);
  if ($file_type['ext'] !== 'csv') {
    return new WP_Error('invalid_file', 'Solo se permiten archivos CSV');
  }

  // Subir archivo
  $upload = wp_handle_upload($_FILES['gallery_csv'], ['test_form' => false]);
  if (isset($upload['error'])) {
    return new WP_Error('upload_error', $upload['error']);
  }
  // Procesar CSV
  $import_results = process_gallery_csv_import($upload['file']);

  // Eliminar archivo temporal
  @unlink($upload['file']);

  return $import_results;
}

function clean_csv_headers($headers)
{
  return array_map(function ($header) {
    // Eliminar BOM y caracteres especiales
    $header = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $header);
    // Eliminar espacios y caracteres invisibles
    $header = trim($header);
    // Convertir a lowercase para comparación insensible a mayúsculas
    return strtolower($header);
  }, $headers);
}

function insertGallery($title, $content, $image_id, $categories, $leagues)
{

  if (empty($title)) {
    return new WP_Error('empty_title', 'El título no puede estar vacío');
  }

  global $wpdb;

  // Iniciar transacción para consistencia
  $wpdb->query('START TRANSACTION');


  try {
    $post_data = [
      'post_title'   => sanitize_text_field($title),
      'post_content' => wp_kses_post($content),
      'post_type'    => 'gallery1',
      'post_status'  => 'publish',
      'meta_input'   => [] // Inicializar meta_input para campos adicionales
    ];

    $post_id = wp_insert_post($post_data, true);

    if (is_wp_error($post_id)) {
      throw new Exception($post_id->get_error_message());
    }

    // 2. Asignar categorías/taxonomías
    if (!empty($categories)) {
      foreach ($categories as $taxonomy => $terms) {
        $terms = array_filter((array)$terms);
        if (!empty($terms)) {
          $result = wp_set_object_terms(
            $post_id,
            $terms,
            sanitize_key($taxonomy)
          );

          if (is_wp_error($result)) {
            throw new Exception($result->get_error_message());
          }
        }
      }
    }

    // 3. Asignar imagen destacada
    if (!empty($image_id)) {
      if (!wp_attachment_is_image($image_id)) {
        throw new Exception('El ID proporcionado no corresponde a una imagen válida');
      }

      $thumb_result = set_post_thumbnail($post_id, $image_id);

      if (false === $thumb_result) {
        throw new Exception('Error al asignar la imagen destacada');
      }
    }

    // 4. Asignar ligas (sp_league)
    if (!empty($leagues)) {
      $sanitized_leagues = array_map('sanitize_text_field', (array)$leagues);
      $result = wp_set_object_terms(
        $post_id,
        $sanitized_leagues,
        'sp_league'
      );

      if (is_wp_error($result)) {
        throw new Exception($result->get_error_message());
      }
    }

    $wpdb->query('COMMIT');
    return $post_id;
  } catch (Exception $e) {
    $wpdb->query('ROLLBACK');
    return new WP_Error('insert_error', $e->getMessage());
  }
}
