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

    $args_all_players = array(
      'post_type' => 'sp_player',
      'post_status' => 'publish',
      'posts_per_page' => -1,
    );
    if (!empty($instance['leagueId']) && $instance['leagueId'] != -1) {
      $args_all_players['tax_query'] = array(
        array(
          'taxonomy' => 'sp_league',
          'field' => 'id',
          'terms' => $instance['leagueId']
        )
      );
    }
    $all_players_query = new WP_Query($args_all_players);

    $players_with_stats = array();

    if ($all_players_query->have_posts()) {
      while ($all_players_query->have_posts()) {
        $all_players_query->the_post();

        // Obtener el array de estadísticas del jugador
        $player_stats = get_post_meta(get_the_ID(), 'sp_statistics', true);

        // NAVEGAMOS EN EL ARRAY PARA ENCONTRAR LOS PUNTOS
        $player_points = 0; // Inicializamos los puntos a 0 por si no se encuentran
        if (is_array($player_stats) && !empty($player_stats)) {

          foreach ($player_stats as $stat_group) {
            if (is_array($stat_group)) {
              foreach ($stat_group as $stats_array) {
                if (is_array($stats_array) && isset($stats_array['points'])) {
                  // Sumamos los puntos si se encuentran
                  $player_points += (float) $stats_array['points'];
                }
              }
            }
          }
        }

        $players_with_stats[] = array(
          'post_id' => get_the_ID(),
          'points' => $player_points,
        );
      }
      wp_reset_postdata();
    }

    // Ordenar el nuevo array por puntos (de mayor a menor)
    usort($players_with_stats, function ($a, $b) {
      return $b['points'] <=> $a['points'];
    });

    //Limitar el resultado a 5, según tu configuración original
    $top_players = array_slice($players_with_stats, 0, $instance['numberPost'] ?? 5);

    ?>
    <div class="w-full">
      <?php if (!empty($top_players)): ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-4">
          <?php foreach ($top_players as $player):
            $player_post = get_post($player['post_id']);
            $dataId = $player_post->ID;
            $team_id = get_post_meta($dataId, 'sp_team', true);
            $teamName = get_the_title($team_id);
            ?>
            <div class="col-span-1">
              <div class="w-full bg-gray-300 h-[340px] md:h-[280px]">
                <img src="<?php echo get_the_post_thumbnail_url($dataId, 'large'); ?>" alt="<?php echo get_the_title($dataId); ?>"
                  class="w-full !h-full object-cover object-top" />
              </div>
              <div class="bg-gradient-to-b-mainColor py-4 px-4">
                <h4 class="text-lg font-family-oswald text-white"><?php echo get_the_title($dataId); ?></h4>
                <p class="text-sm font-family-roboto text-white">
                  <?php echo $teamName; ?>
                </p>
              </div>
            </div>
          <?php endforeach; ?>
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
      <select class="widefat" id="<?php echo $this->get_field_id('leagueId'); ?>"
        name="<?php echo $this->get_field_name('leagueId'); ?>">
        <option value="-1" <?php echo ($leagueId == -1) ? 'selected' : ''; ?>><?php _e('All', 'bluetide'); ?></option>
        <?php foreach ($leagues as $league):
          $selected = ($league->term_id == $leagueId) ? 'selected' : ''; ?>
          <option value="<?php echo $league->term_id; ?>" <?php echo $selected; ?>><?php echo $league->name; ?></option>
        <?php endforeach; ?>
      </select>
    </p>
    <?php
  }
}

register_widget('AnotationPayersWidget');
