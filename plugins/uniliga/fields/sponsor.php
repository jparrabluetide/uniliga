<?php
add_action('cmb2_admin_init', 'bluetide_fields_sponsor');
function bluetide_fields_sponsor()
{

  $prefix = 'bluetide_fields_sponsor_';

  $cmb = new_cmb2_box(
    array(
      'id' => $prefix . 'sponsor',
      'title' => esc_html__('Sponsor info', 'bluetide'),
      'object_types' => array('sponsor'),
      'context' => 'normal',
      'priority' => 'high',
      'show_in_rest' => true,
    )
  );

  $cmb->add_field(
    array(
      'id' => $prefix . 'photo',
      'name' => esc_html__('Image photo', 'bluetide'),
      'desc' => esc_html__('Add an image.', 'bluetide'),
      'type' => 'file',
      'attributes' => array(
        'required' => 'required',
        'accept' => 'image/*',
      ),
      'text' => array(
        'add_upload_file_text' => esc_html__('Add image', 'bluetide'),
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
      'id' => $prefix . 'url',
      'name' => esc_html__('URL', 'bluetide'),
      'desc' => esc_html__('Add a URL.', 'bluetide'),
      'type' => 'text_url',
      'attributes' => array(
        'required' => 'required',
      ),
    )
  );
}
