<?php

class NewsletterFooterWidget extends WP_Widget
{

  public function __construct()
  {
    parent::__construct(
      'newsletter_footer_widget', // Base ID
      __('Newsletters widget', 'bluetide'),
      array(
        'description' => __('Newsletter widget description', 'bluetide')
      ) // Args
    );
  }

  public function widget($args, $instance)
  {
?>

    <div class="container mx-auto px-4 relative" id="newsletterFooter">
      <div class="bg-white w-full p-5 rounded-br-md md:absolute bottom-0 md:-bottom-28">
        <div class="grid grid-cols-2 gap-4">
          <div class="col-span-2 lg:col-span-1 items-center">
            <div class="flex flex-col md:flex-row items-center gap-0 md:gap-5">
              <div class="md:w-[120px] md:h-[120px] w-[80px] h-[80px]">
                <img src="<?php echo get_template_directory_uri(); ?>/images/icono-uniliga-128x128.png" alt="uniliga logo" />
              </div>
              <p class="font-family-oswald text-xl text-tarawera-950 uppercase mt-5 md:mt-0">
                <?php echo $instance['title']; ?>
              </p>
            </div>
          </div>
          <div class="col-span-2 lg:col-span-1 flex items-center w-full">
            <?php
            switch_to_blog(1);
            echo do_shortcode(wp_kses_post('[gravityform id="1" title="false"]'));
            restore_current_blog();
            ?>
          </div>
        </div>
      </div>
    </div>
  <?php
  }

  public function update($new_instance, $old_instance)
  {
    // Update widget options
    $instance['title'] = strip_tags($new_instance['title']);
    return $instance;
  }


  public function form($instance)
  {
    // Retrieve widget options from $instance
    $title = isset($instance['title']) ? $instance['title'] : '';
    // Display widget settings form
  ?>
    <p>
      <label for="<?php echo $this->get_field_id('title'); ?>">
        <?php _e('Title'); ?>:
      </label>
      <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
        name="<?php echo $this->get_field_name('title'); ?>" type="text"
        value="<?php echo esc_attr($title); ?>" />
    </p>
<?php
  }
}

register_widget('NewsletterFooterWidget');
