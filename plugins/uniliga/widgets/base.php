<?php

namespace Elementor;

if (!defined('ABSPATH'))
  exit();

class BluetideElementorCarousel extends Widget_Base
{
  public function get_name()
  {
    return 'bluetide-carousel-1';
  }

  public function get_title()
  {
    return __('Carousel 1', 'bluetide');
  }

  public function get_icon()
  {
    return 'eicon-slider';
  }

  public function get_categories()
  {
    return ['bluetide-widgets'];
  }

  public function register_controls()
  {

    //Style tab
    $this->style_tab();
  }

  private function style_tab() {}

  protected function render() {}

  protected function content_template() {}

}

Plugin::instance()->widgets_manager->register(new BluetideElementorCarousel());
