<?php

namespace Elementor;

if (!defined('ABSPATH'))
  exit();

class BluetideElementorCarousel2 extends Widget_Base
{
  public function get_name()
  {
    return 'bluetide-carousel-2';
  }

  public function get_title()
  {
    return __('Carousel 2', 'bluetide');
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

    $prefix = 'carousel_2_';
    // Content Settings
    $this->start_controls_section(
      'content_settings',
      [
        'label' => __('Configuration', 'bluetide'),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );

    // Slider Repeater
    $repeater = new \Elementor\Repeater();

    $repeater->add_control(
      $prefix . 'slider_title',
      [
        'label' => __('Title', 'bluetide'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __('Example #1', 'bluetide'),
        'label_block' => true
      ]
    );

    $repeater->add_control(
      $prefix . 'slider_bg',
      [
        'label' => __('Background image', 'bluetide'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
          'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
      ],
    );

    $this->add_control(
      $prefix . 'slider',
      [
        'label' => __('Slider items', 'bluetide'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => $repeater->get_controls(),
        'title_field' => '{{{ carousel_2_slider_title }}}',
      ]
    );

    $this->end_controls_section();

    //Style tab
    $this->style_tab();
  }

  private function style_tab() {}

  protected function render()
  {
    global $post;
    $prefix = 'carousel_2_';
    $settings = $this->get_settings_for_display();
?>

    <div class="swiper swiperCarousel2">
      <div class="swiper-wrapper">
        <?php foreach ($settings[$prefix . 'slider'] as $slide) : ?>
          <div class="swiper-slide">
            <div class="w-full h-[250px] md:h-[420px] bg-gray-400 bg-cover bg-no-repeat" style="background-image: url('<?php echo $slide[$prefix . 'slider_bg']['url']; ?>');">
              <div class="container mx-auto px-4 h-full">
                <div class="flex flex-col h-full justify-end pb-12 md:pb-24">
                  <div class="flex items-center gap-2 text-tarawera-950 text-xs md:text-sm uppercase font-family-roboto font-medium mb-2">
                    <a href="<?php echo home_url(); ?>">
                      <?php echo __('Home', 'bluetide') ?>
                    </a>
                    <p>></p>
                    <p><?php echo get_the_title($post->ID); ?></p>
                  </div>
                  <h1 class="font-family-oswald text-lg md:text-4xl lg:text-5xl text-white uppercase font-medium">
                    <?php echo $slide[$prefix . 'slider_title']; ?>
                  </h1>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="container mx-auto px-4 relative flex justify-end">
      <div class="absolute -mt-16 z-10">
        <div class="swiperCarousel2-pagination"></div>
      </div>
    </div>
<?php
  }

  protected function content_template() {}
}

Plugin::instance()->widgets_manager->register(new BluetideElementorCarousel2());
