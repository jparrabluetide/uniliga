<?php
add_action('cmb2_admin_init', 'bluetide_fields_highlight');
function bluetide_fields_highlight()
{

  $prefix = 'bluetide_fields_highlight_';

  $cmb = new_cmb2_box(
    array(
      'id' => $prefix . 'highlight',
      'title' => esc_html__('highlight info', 'bluetide'),
      'object_types' => array('highlight'),
      'context' => 'normal',
      'priority' => 'high',
      'show_in_rest' => true,
    )
  );

  $cmb->add_field(
    array(
      'id' => $prefix . 'icon',
      'name' => esc_html__('Image icon', 'bluetide'),
      'desc' => esc_html__('Add an image.', 'bluetide'),
      'type' => 'file',
      'attributes' => array(
        'required' => 'required',
        'accept' => 'image/*',
      ),
      'text' => array(
        'add_upload_file_text' => esc_html__('Add icon', 'bluetide'),
      ),
      'options' => array(
        'url' => false, // Hide the text input for the url
      ),
      'query_args' => array(
        'type' => 'image',
      ),
      'preview_size' => 'medium',
    )
  );

  $cmb->add_field(
    array(
      'id' => $prefix . 'youtube_id',
      'name' => esc_html__('Youtube ID', 'bluetide'),
      'desc' => esc_html__('Add a Youtube ID.', 'bluetide'),
      'type' => 'text_small',
      'attributes' => array(
        'required' => 'required',
      ),
    )
  );
}

?>
