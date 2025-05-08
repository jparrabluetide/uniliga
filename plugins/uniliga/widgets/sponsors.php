<?php

class SponsorsWidget extends WP_Widget
{

  public function __construct()
  {
    parent::__construct(
      'sponsors_widget', // Base ID
      __('Sponsors widget', 'bluetide'),
      array(
        'description' => __('Sponsor widget description', 'bluetide')
      ) // Args
    );
  }

  public function widget($args, $instance)
  {
    $data = new WP_Query(
      array(
        'post_type' => 'sponsor',
        'posts_status' => 'publish',
        'order_by' => 'date',
        'order' => 'DESC',
        'posts_per_page' => $instance['numberPost'] ?? 5,
      )
    );
?>

    <div class="container mx-auto px-4 my-8 md:my-24">

      <h3 class="text-2xl md:text-4xl font-family-oswald uppercase text-tarawera-950 mb-7">Patrocinadores</h3>
      <?php if ($data->have_posts()): ?>
        <div class="grid grid-cols-5 gap-4">
          <?php while ($data->have_posts()):
            $data->the_post();
            $dataId = get_the_ID();

            $imageCardId = get_post_meta($dataId, 'bluetide_fields_sponsor_photo_id', true);
            $imageCardSize = 'sponsor-card';
            $imageCardSrc = wp_get_attachment_image_src($imageCardId, $imageCardSize);
          ?>
            <div class="col-span-5 sm:col-span-2 lg:col-span-1 min-h-[220px] md:min-h-[140px] bg-gray-300">
              <a href="<?php echo get_post_meta($dataId, 'bluetide_fields_sponsor_url', true) ?>">
                <img src="<?php echo $imageCardSrc[0]; ?>" class="w-full h-auto object-cover" alt="<?php the_title(); ?>" />
              </a>
            </div>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        </div>
      <?php else: ?>
        <div class="col-span-12">
          <p class="text-center text-xl text-black"><?php _e('No posts found', 'bluetide'); ?></p>
        </div>
      <?php endif; ?>
    </div>
  <?php
  }

  public function update($new_instance, $old_instance)
  {
    // Update widget options
    $instance['numberPost'] = strip_tags($new_instance['numberPost']);
    return $instance;
  }


  public function form($instance)
  {
    // Retrieve widget options from $instance
    $numberPost = isset($instance['numberPost']) ? $instance['numberPost'] : 5;
    // Display widget settings form
  ?>
    <p>
      <label for="<?php echo $this->get_field_id('numberPost'); ?>">
        <?php _e('Number of posts'); ?>:
      </label>
      <input class="widefat" id="<?php echo $this->get_field_id('numberPost'); ?>"
        name="<?php echo $this->get_field_name('numberPost'); ?>" type="number" min="1" max="5"
        value="<?php echo esc_attr($numberPost); ?>" />
    </p>
<?php
  }
}

register_widget('SponsorsWidget');
