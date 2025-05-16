<?php

$labels = array(
  'name' => _x('Highlight', 'General name', 'bluetide'),
  'singular_name' => _x('Highlight', 'Singular name', 'bluetide'),
  'menu_name' => __('Highlights', 'bluetide'),
  'name_admin_bar' => __('Highlight', 'bluetide'),
  'archives' => __('Item Archives', 'bluetide'),
  'attributes' => __('Item Attributes', 'bluetide'),
  'parent_item_colon' => __('Parent Item:', 'bluetide'),
  'all_items' => __('All highlights', 'bluetide'),
  'add_new_item' => __('Add new highlight', 'bluetide'),
  'add_new' => __('Add new', 'bluetide'),
  'new_item' => __('new highlight', 'bluetide'),
  'edit_item' => __('Edit highlight', 'bluetide'),
  'update_item' => __('Update highlight', 'bluetide'),
  'view_item' => __('View highlight', 'bluetide'),
  'view_items' => __('View highlights', 'bluetide'),
  'search_items' => __('Search highlights', 'bluetide'),
  'not_found' => __('No highlights found', 'bluetide'),
  'not_found_in_trash' => __('No highlights found in the trash', 'bluetide'),
  'featured_image' => __('Featured image', 'bluetide'),
  'set_featured_image' => __('Add featured image', 'bluetide'),
  'remove_featured_image' => __('Remove featured image', 'bluetide'),
  'use_featured_image' => __('Use as featured image', 'bluetide'),
  'insert_into_item' => __('Insert to highlights', 'bluetide'),
  'uploaded_to_this_item' => __('Upload to highlight', 'bluetide'),
  'items_list' => __('List of highlights', 'bluetide'),
  'items_list_navigation' => __('Navigate to list of highlights', 'bluetide'),
  'filter_items_list' => __('Filter list of highlights', 'bluetide'),
);
$args = array(
  'label' => __('Highlight', 'bluetide'),
  'description' => __('Highlight description', 'bluetide'),
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
  'rewrite' => array('slug' => 'highlight'),
  'menu_icon' => 'dashicons-video-alt',
  'show_in_rest' => false,
  'rest_base' => 'highlight',
  'capability_type' => 'post',
  'taxonomies' => array('category'),
);
register_post_type('highlight', $args);

/**
 * Images
 */

add_image_size('highlight-card', 500, 500, true);
