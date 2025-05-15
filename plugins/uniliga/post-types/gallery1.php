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

//add_image_size('gallery1-card', 300, 230, true);
