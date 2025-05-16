<?php

function bluetide_post_types()
{
  require_once dirname(__FILE__) . '/sponsor.php';
  require_once dirname(__FILE__) . '/news.php';
  require_once dirname(__FILE__) . '/gallery1.php';
  require_once dirname(__FILE__) . '/highlight.php';
}

add_action('init', 'bluetide_post_types');
