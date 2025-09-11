<?php

$labels = array(
  'name' => _x('Bluetide Layouts', 'General name', 'bluetide'),
  'singular_name' => _x('Template Elementor', 'Singular name', 'bluetide'),
  'menu_name' => __('Templates', 'bluetide'),
  'name_admin_bar' => __('Template', 'bluetide'),
  'archives' => __('Item Archives', 'bluetide'),
  'attributes' => __('Item Attributes', 'bluetide'),
  'parent_item_colon' => __('Parent Item:', 'bluetide'),
  'all_items' => __('All templates', 'bluetide'),
  'add_new_item' => __('Add new template', 'bluetide'),
  'add_new' => __('Add new', 'bluetide'),
  'new_item' => __('New template', 'bluetide'),
  'edit_item' => __('Edit template', 'bluetide'),
  'update_item' => __('Update template', 'bluetide'),
  'view_item' => __('View template', 'bluetide'),
  'view_items' => __('View templates', 'bluetide'),
  'search_items' => __('Search templates', 'bluetide'),
  'not_found' => __('No template found', 'bluetide'),
  'not_found_in_trash' => __('No templates found in the trash', 'bluetide'),
  'featured_image' => __('Featured image', 'bluetide'),
  'set_featured_image' => __('Add featured image', 'bluetide'),
  'remove_featured_image' => __('Remove featured image', 'bluetide'),
  'use_featured_image' => __('Use as featured image', 'bluetide'),
  'insert_into_item' => __('Insert to template', 'bluetide'),
  'uploaded_to_this_item' => __('Upload to template', 'bluetide'),
  'items_list' => __('List of templates', 'bluetide'),
  'items_list_navigation' => __('Navigate to list of templates', 'bluetide'),
  'filter_items_list' => __('Filter list of templates', 'bluetide'),
);
$args = array(
  'labels' => $labels,
  'public' => true, // Permite la interacción pública (necesario para Elementor)
  'menu_icon' => 'dashicons-welcome-widgets-menus', // Icono para el menú
  'publicly_queryable' => true, // Crucial para la vista previa de Elementor
  'exclude_from_search' => true, // Evita que aparezca en los resultados de búsqueda
  'show_ui' => true, // Muestra la interfaz de usuario en el panel de administración
  'show_in_menu' => true, // Muestra el CPT en el menú
  'show_in_nav_menus' => false, // Importante: no muestra este CPT en el editor de menús
  'show_in_admin_bar' => false, // No muestra el enlace en la barra superior
  'supports' => ['title', 'editor', 'elementor'],
  'rewrite' => false, // No tiene una URL pública, por lo que no necesita reescritura
  'show_in_rest' => true, // Permite el acceso vía REST API (útil para Gutenberg)
);
register_post_type('bluetide_template', $args);
