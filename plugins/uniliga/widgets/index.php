<?php
function bluetide_widgets()
{
  require_once dirname(__FILE__) . '/sponsors.php';
  require_once dirname(__FILE__) . '/news.php';
  require_once dirname(__FILE__) . '/news-2.php';
  require_once dirname(__FILE__) . '/upcoming-games.php';
  require_once dirname(__FILE__) . '/gallery1.php';
  require_once dirname(__FILE__) . '/hightlights.php';
  require_once dirname(__FILE__) . '/newsletter-footer.php';
  require_once dirname(__FILE__) . '/next-game.php';
}

add_action('widgets_init', 'bluetide_widgets');
