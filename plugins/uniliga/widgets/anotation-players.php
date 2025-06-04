<?php

class AnotationPayersWidget extends WP_Widget
{

  public function __construct()
  {
    parent::__construct(
      'anotation_players_widget', // Base ID
      __('Anotation players widget', 'bluetide'),
      array(
        'description' => __('Anotation players widget description', 'bluetide')
      ) // Args
    );
  }

  public function widget($args, $instance)
  {

    $args = array(
      'post_type'      => 'sp_player',
      'post_status'    => 'publish',
      'orderby'        => 'date',
      'order'          => 'DESC',
      'posts_per_page' => $instance['numberPost'] ?? 5,
    );

    // Solo añadir tax_query si leagueId tiene valor y no es -1
    if (!empty($instance['leagueId']) && $instance['leagueId'] != -1) {
      $args['tax_query'] = array(
        array(
          'taxonomy' => 'sp_league',
          'field'    => 'id',
          'terms'    => $instance['leagueId']
        )
      );
    }

    $data = new WP_Query($args);
?>
    <div class="w-full">
      <?php if ($data->have_posts()): ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-4">
          <?php while ($data->have_posts()):
            $data->the_post();
            $dataId = get_the_ID();
            $teams  = array_unique(get_post_meta($dataId, 'sp_team'));
            $teamName = get_the_title($teams[0]);
          ?>
            <div class="col-span-1">
              <div class="w-full bg-gray-300 h-[340px] md:h-[280px]">
                <img src="<?php echo get_the_post_thumbnail_url($dataId, 'large'); ?>" alt="<?php the_title(); ?>" class="w-full !h-full object-cover object-top" />
              </div>
              <div class="bg-gradient-to-b from-[#00BED6] to-[#003B4D] py-4 px-4">
                <h4 class="text-lg font-family-oswald text-white"><?php the_title(); ?></h4>
                <p class="text-sm font-family-roboto text-scooter-500">
                  <?php echo $teamName; ?>
                </p>
              </div>
            </div>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        </div>
      <?php else: ?>
        <div class="col-span-5">
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
    $instance['leagueId'] = strip_tags($new_instance['leagueId']) ? strip_tags($new_instance['leagueId']) : 2;
    return $instance;
  }


  public function form($instance)
  {
    // Retrieve widget options from $instance
    $numberPost = isset($instance['numberPost']) ? $instance['numberPost'] : 5;
    $leagueId = !empty($instance['leagueId']) ? $instance['leagueId'] : -1;
    // Display widget settings form

    $leagues = get_terms(
      array(
        'taxonomy' => 'sp_league',
        'hide_empty' => false, // Para incluir ligas sin eventos asociados (opcional)
      )
    );
  ?>
    <p>
      <label for="<?php echo $this->get_field_id('numberPost'); ?>">
        <?php _e('Number of posts'); ?>:
      </label>
      <input class="widefat" id="<?php echo $this->get_field_id('numberPost'); ?>"
        name="<?php echo $this->get_field_name('numberPost'); ?>" type="number" min="1" max="5"
        value="<?php echo esc_attr($numberPost); ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('leagueId'); ?>"><?php _e('Leagues:', 'bluetide'); ?></label>
      <select class="widefat" id="<?php echo $this->get_field_id('leagueId'); ?>" name="<?php echo $this->get_field_name('leagueId'); ?>">
        <option value="-1" <?php echo ($leagueId == -1) ? 'selected' : ''; ?>><?php _e('All', 'bluetide'); ?></option>
        <?php foreach ($leagues as $league) : $selected = ($league->term_id == $leagueId) ? 'selected' : ''; ?>
          <option value="<?php echo $league->term_id; ?>" <?php echo $selected; ?>><?php echo $league->name; ?></option>
        <?php endforeach; ?>
      </select>
    </p>
<?php
  }
}

register_widget('AnotationPayersWidget');
