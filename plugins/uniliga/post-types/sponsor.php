<?php

$labels = array(
  'name' => _x('Sponsor', 'General name', 'bluetide'),
  'singular_name' => _x('Sponsor', 'Singular name', 'bluetide'),
  'menu_name' => __('Sponsors', 'bluetide'),
  'name_admin_bar' => __('Sponsor', 'bluetide'),
  'archives' => __('Item Archives', 'bluetide'),
  'attributes' => __('Item Attributes', 'bluetide'),
  'parent_item_colon' => __('Parent Item:', 'bluetide'),
  'all_items' => __('All sponsors', 'bluetide'),
  'add_new_item' => __('Add new sponsor', 'bluetide'),
  'add_new' => __('Add new', 'bluetide'),
  'new_item' => __('new sponsor', 'bluetide'),
  'edit_item' => __('Edit sponsor', 'bluetide'),
  'update_item' => __('Update sponsor', 'bluetide'),
  'view_item' => __('View sponsor', 'bluetide'),
  'view_items' => __('View sponsors', 'bluetide'),
  'search_items' => __('Search sponsors', 'bluetide'),
  'not_found' => __('No sponsors found', 'bluetide'),
  'not_found_in_trash' => __('No sponsors found in the trash', 'bluetide'),
  'featured_image' => __('Featured image', 'bluetide'),
  'set_featured_image' => __('Add featured image', 'bluetide'),
  'remove_featured_image' => __('Remove featured image', 'bluetide'),
  'use_featured_image' => __('Use as featured image', 'bluetide'),
  'insert_into_item' => __('Insert to sponsors', 'bluetide'),
  'uploaded_to_this_item' => __('Upload to sponsor', 'bluetide'),
  'items_list' => __('List of sponsors', 'bluetide'),
  'items_list_navigation' => __('Navigate to list of sponsors', 'bluetide'),
  'filter_items_list' => __('Filter list of sponsors', 'bluetide'),
);
$args = array(
  'label' => __('Sponsor', 'bluetide'),
  'description' => __('Sponsor description', 'bluetide'),
  'labels' => $labels,
  'supports' => array('title'),
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
  'rewrite' => array('slug' => 'sponsor'),
  'menu_icon' => 'dashicons-businessman',
  'show_in_rest' => false,
  'rest_base' => 'sponsor'
);
register_post_type('sponsor', $args);

/**
 * Images
 */

add_image_size('sponsor-card', 300, 230, true);
