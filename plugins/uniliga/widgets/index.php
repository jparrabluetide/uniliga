<?php
function bluetide_widgets()
{
  require_once dirname(__FILE__) . '/sponsors.php';
  require_once dirname(__FILE__) . '/news.php';
}

add_action('widgets_init', 'bluetide_widgets');
