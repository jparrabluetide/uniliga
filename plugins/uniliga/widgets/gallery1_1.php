<?php

class Gallery1_1Widget extends WP_Widget
{

  public function __construct()
  {
    parent::__construct(
      'gallery1_1_widget', // Base ID
      __('Gallery link widget', 'bluetide'),
      array(
        'description' => __('gallery widget description', 'bluetide')
      ) // Args
    );
  }

  public function widget($args, $instance)
  {
    if (empty($instance['spLeagues'])) {
      $args = array(
        'post_type' => 'gallery1',
        'posts_status' => 'publish',
        'order_by' => 'date',
        'order' => 'DESC',
        'posts_per_page' => $instance['numberPost'] ?? 4,
      );
    } else {
      $args = array(
        'post_type' => 'gallery1',
        'posts_status' => 'publish',
        'order_by' => 'date',
        'order' => 'DESC',
        'tax_query' => array(
          array(
            'taxonomy' => 'sp_league',
            'field' => 'id',
            'terms' => $instance['spLeagues'],
            'operator' => 'IN'
          )
        ),
        'posts_per_page' => $instance['numberPost'] ?? 4,
      );
    }

    $data = new WP_Query($args);
?>

    <div class="gallery-1_1">
      <div class="grid grid-cols-4 gap-4">
        <?php if ($data->have_posts()): ?>
          <?php while ($data->have_posts()):
          $data->the_post();
          $dataId = get_the_ID();
          $galleryUrl = get_post_meta($dataId, 'bluetide_fields_gallery1_url', true);
          ?>
          <div class="col-span-4 md:col-span-1">
            <a href="<?php echo $galleryUrl; ?>" target="_blank" rel="noopener noreferrer" class="h-[150px]">
              <img src="<?php echo get_the_post_thumbnail_url($dataId, 'large'); ?>" class="w-full object-cover !h-[150px] !rounded-xl" alt="<?php the_title(); ?>" />
            </a>
          </div>
          <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
        <?php else: ?>
          <div class="col-span-3">
            <p class="text-center text-xl text-black"><?php _e('No posts found', 'bluetide'); ?></p>
          </div>
        <?php endif; ?>
      </div>
    </div>
  <?php
  }

  public function update($new_instance, $old_instance)
  {
    // Update widget options
    $instance['numberPost'] = strip_tags($new_instance['numberPost']);
    if (isset($new_instance['spLeagues']) && is_array($new_instance['spLeagues'])) {
      $instance['spLeagues'] = array_map('strip_tags', $new_instance['spLeagues']);
    } else {
      $instance['spLeagues'] = array(); // or some other default value
    }
    return $instance;
  }


  public function form($instance)
  {
    // Retrieve widget options from $instance
    $numberPost = isset($instance['numberPost']) ? $instance['numberPost'] : 4;
    $spLeagues = isset($instance['spLeagues']) ? $instance['spLeagues'] : array();
    // Display widget settings form
  ?>
    <p>
      <label for="<?php echo $this->get_field_id('numberPost'); ?>">
        <?php _e('Number of posts'); ?>:
      </label>
      <input class="widefat" id="<?php echo $this->get_field_id('numberPost'); ?>"
        name="<?php echo $this->get_field_name('numberPost'); ?>" type="number" min="1" max="8"
        value="<?php echo esc_attr($numberPost); ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('spLeagues'); ?>"><?php _e('Leagues:', 'bluetide'); ?></label>
      <select class="widefat" id="<?php echo $this->get_field_id('spLeagues'); ?>" name="<?php echo $this->get_field_name('spLeagues'); ?>[]" multiple>
        <?php
        $leagues = get_terms(
          array(
            'taxonomy' => 'sp_league',
            'hide_empty' => false, // Para incluir ligas sin eventos asociados (opcional)
          )
        );
        foreach ($leagues as $league) :
          $selected = in_array($league->term_id, $spLeagues) ? 'selected' : '';
        ?>
          <option value="<?php echo $league->term_id; ?>" <?php echo $selected; ?>><?php echo $league->name; ?></option>
        <?php endforeach; ?>
      </select>
    </p>
<?php
  }
}

register_widget('Gallery1_1Widget');
