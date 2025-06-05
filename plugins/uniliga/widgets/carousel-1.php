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

    $prefix = 'carousel_1_';
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

    $repeater->add_control(
      $prefix . 'slider_bullet_text',
      [
        'label' => __('Bullet text', 'bluetide'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __('Example #1', 'bluetide'),
        'label_block' => true
      ]
    );

    $repeater->add_control(
      $prefix . 'slider_date',
      [
        'label' => __('Date', 'bluetide'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __('Example #1', 'bluetide'),
        'label_block' => true
      ]
    );

    $repeater->add_control(
      $prefix . 'slider_location',
      [
        'label' => __('Location', 'bluetide'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __('Example #1', 'bluetide'),
        'label_block' => true
      ]
    );

    $repeater->add_control(
      $prefix . 'slider_content',
      [
        'label' => __('Content', 'bluetide'),
        'type' => \Elementor\Controls_Manager::WYSIWYG,
        'default' => __('Example #1', 'bluetide'),
        'label_block' => true
      ]
    );

    $this->add_control(
      $prefix . 'slider',
      [
        'label' => __('Slider items', 'bluetide'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => $repeater->get_controls(),
        'title_field' => '{{{ carousel_1_slider_title }}}',
      ]
    );

    $this->end_controls_section();

    //Style tab
    $this->style_tab();
  }

  private function style_tab() {}

  protected function render()
  {
    $prefix = 'carousel_1_';
    $settings = $this->get_settings_for_display();
?>
    <div class="swiper swiperCarousel1">
      <div class="swiper-wrapper">
        <?php foreach ($settings[$prefix . 'slider'] as $slide) : ?>
          <div class="swiper-slide">
            <div class="w-full h-carousel1 bg-gray-400 bg-cover bg-no-repeat" style="background-image: url('<?php echo $slide[$prefix . 'slider_bg']['url']; ?>');">
              <div class="container h-full mx-auto px-4">
                <div class="w-full h-full flex items-center">
                  <div class="">
                    <div class="badge-sport">
                      <p class="font-family-roboto text-sm uppercase text-tarawera-950">
                        <?php echo $slide[$prefix . 'slider_bullet_text']; ?>
                      </p>
                    </div>
                    <h1 class="text-2xl lg:text-5xl font-family-oswald text-white uppercase max-w-[440px] mb-5">
                      <?php echo $slide[$prefix . 'slider_title']; ?>
                    </h1>
                    <?php if ($slide[$prefix . 'slider_date'] || $slide[$prefix . 'slider_location']) : ?>
                      <div class="flex items-center gap-3 md:gap-6 mb-5">
                        <div class="flex items-center gap-2">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                            <mask id="a" width="24" height="24" x="0" y="0" maskUnits="userSpaceOnUse" style="mask-type:alpha">
                              <path fill="#D9D9D9" d="M0 0h24v24H0z" />
                            </mask>
                            <g mask="url(#a)">
                              <path fill="#fff" d="M12 14a.968.968 0 0 1-.713-.287A.968.968 0 0 1 11 13c0-.283.096-.52.287-.713A.968.968 0 0 1 12 12c.283 0 .52.096.713.287.191.192.287.43.287.713s-.096.52-.287.713A.968.968 0 0 1 12 14Zm-4 0a.967.967 0 0 1-.713-.287A.968.968 0 0 1 7 13c0-.283.096-.52.287-.713A.967.967 0 0 1 8 12c.283 0 .52.096.713.287.191.192.287.43.287.713s-.096.52-.287.713A.967.967 0 0 1 8 14Zm8 0a.968.968 0 0 1-.713-.287A.968.968 0 0 1 15 13c0-.283.096-.52.287-.713A.968.968 0 0 1 16 12c.283 0 .52.096.712.287.192.192.288.43.288.713s-.096.52-.288.713A.968.968 0 0 1 16 14Zm-4 4a.968.968 0 0 1-.713-.288A.968.968 0 0 1 11 17c0-.283.096-.52.287-.712A.968.968 0 0 1 12 16c.283 0 .52.096.713.288.191.191.287.429.287.712s-.096.52-.287.712A.968.968 0 0 1 12 18Zm-4 0a.967.967 0 0 1-.713-.288A.968.968 0 0 1 7 17c0-.283.096-.52.287-.712A.967.967 0 0 1 8 16c.283 0 .52.096.713.288.191.191.287.429.287.712s-.096.52-.287.712A.967.967 0 0 1 8 18Zm8 0a.968.968 0 0 1-.713-.288A.968.968 0 0 1 15 17c0-.283.096-.52.287-.712A.968.968 0 0 1 16 16c.283 0 .52.096.712.288.192.191.288.429.288.712s-.096.52-.288.712A.968.968 0 0 1 16 18ZM5 22c-.55 0-1.02-.196-1.413-.587A1.926 1.926 0 0 1 3 20V6c0-.55.196-1.02.587-1.412A1.926 1.926 0 0 1 5 4h1V2h2v2h8V2h2v2h1c.55 0 1.02.196 1.413.588.391.391.587.862.587 1.412v14c0 .55-.196 1.02-.587 1.413A1.926 1.926 0 0 1 19 22H5Zm0-2h14V10H5v10Z" />
                            </g>
                          </svg>
                          <p class="font-family-roboto text-sm md:text-base text-white">
                            <?php echo $slide[$prefix . 'slider_date']; ?>
                          </p>
                        </div>
                        <div class="flex items-center gap-2">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                            <mask id="a" width="24" height="24" x="0" y="0" maskUnits="userSpaceOnUse" style="mask-type:alpha">
                              <path fill="#D9D9D9" d="M0 0h24v24H0z" />
                            </mask>
                            <g mask="url(#a)">
                              <path fill="#fff" d="M12 12c.55 0 1.02-.196 1.412-.588.392-.391.588-.862.588-1.412 0-.55-.196-1.02-.588-1.412A1.926 1.926 0 0 0 12 8c-.55 0-1.02.196-1.412.588A1.926 1.926 0 0 0 10 10c0 .55.196 1.02.588 1.412.391.392.862.588 1.412.588Zm0 10c-2.683-2.283-4.688-4.404-6.013-6.363C4.662 13.68 4 11.867 4 10.2c0-2.5.804-4.492 2.412-5.975C8.021 2.742 9.883 2 12 2s3.98.742 5.587 2.225C19.197 5.708 20 7.7 20 10.2c0 1.667-.663 3.48-1.988 5.438C16.688 17.595 14.683 19.716 12 22Z" />
                            </g>
                          </svg>
                          <p class="font-family-roboto text-sm md:text-base text-white">
                            <?php echo $slide[$prefix . 'slider_location']; ?>
                          </p>
                        </div>
                      </div>
                    <?php endif; ?>
                    <?php if ($slide[$prefix . 'slider_content']) : ?>
                      <?php echo $slide[$prefix . 'slider_content']; ?>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="container mx-auto px-4 relative flex justify-end">
      <div class="absolute -mt-16 z-10">
        <div class="swiperCarousel1-pagination"></div>
      </div>
    </div>
<?php
  }

  protected function content_template() {}
}

Plugin::instance()->widgets_manager->register(new BluetideElementorCarousel());
