<?php
add_action('cmb2_admin_init', 'bluetide_fields_gallery1');

function bluetide_fields_gallery1()
{
  $prefix = 'bluetide_fields_gallery1_';

  $cmb = new_cmb2_box(
    array(
      'id' => $prefix . 'gallery1',
      'title' => esc_html__('Gallery info', 'bluetide'),
      'object_types' => array('gallery1'),
      'context' => 'normal',
      'priority' => 'high',
      'show_in_rest' => true,
    )
  );

  $cmb->add_field(
    array(
      'id' => $prefix . 'sp_leagues',
      'name' => esc_html__('Leagues', 'bluetide'),
      'desc' => esc_html__('Check the leagues', 'bluetide'),
      'type' => 'taxonomy_multicheck',
      'taxonomy' => 'sp_league',
      'multi_select' => true
    )
  );
}

?>
