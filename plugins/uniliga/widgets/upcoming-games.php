<?php

/**
 * Plugin Name: Widget Proximos Partidos SportsPress
 * Description: Muestra los próximos partidos con fecha, hora y logos de los equipos.
 */

// Evitar acceso directo
if (!defined('ABSPATH')) {
  exit;
}

class UpcomingGamesWidget extends WP_Widget
{
  public function __construct()
  {
    parent::__construct(
      'bluetide-upcoming-games', // Base ID
      __('Upcoming Games widget', 'bluetide'),
      array(
        'description' => __('Upcoming games description', 'bluetide')
      )
    );
  }

  public function widget($args, $instance)
  {
?>
    <div class="upcomingGames">
      <div class="grid grid-cols-12 xl:grid-cols-5 gap-4 items-center justify-center">
        <?php
        switch_to_blog($instance['siteId']);

        $args = array(
          'post_type' => 'sp_event',
          'post_status' => 'future',
          'posts_per_page' => $instance['numberOfPosts'] ? $instance['numberOfPosts'] : 5,
          'order_by' => 'date',
          'order' => 'ASC',
        );

        $data = new WP_Query($args);
        ?>
        <?php if ($data->have_posts()): ?>
          <?php while ($data->have_posts()):
            $data->the_post();
            $dataId = get_the_ID();
            $teams  = array_unique(get_post_meta($dataId, 'sp_team'));
            $leagues = wp_get_post_terms($dataId, 'sp_league');
            $gameDate = get_the_time('d, M Y');
            $gameHour = get_the_time('h:i a');
          ?>
            <div class="border border-[#003B4D] col-span-12 md:col-span-6 xl:col-span-1">
              <div class="px-4 pt-2">
                <div class="flex items-center justify-between gap-4 border-b border-[#003B4D] pb-2">
                  <div class="flex items-center gap-2">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <mask id="mask0_15_522" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                        <rect width="24" height="24" fill="#D9D9D9" />
                      </mask>
                      <g mask="url(#mask0_15_522)">
                        <path d="M12 14C11.7167 14 11.4792 13.9042 11.2875 13.7125C11.0958 13.5208 11 13.2833 11 13C11 12.7167 11.0958 12.4792 11.2875 12.2875C11.4792 12.0958 11.7167 12 12 12C12.2833 12 12.5208 12.0958 12.7125 12.2875C12.9042 12.4792 13 12.7167 13 13C13 13.2833 12.9042 13.5208 12.7125 13.7125C12.5208 13.9042 12.2833 14 12 14ZM8 14C7.71667 14 7.47917 13.9042 7.2875 13.7125C7.09583 13.5208 7 13.2833 7 13C7 12.7167 7.09583 12.4792 7.2875 12.2875C7.47917 12.0958 7.71667 12 8 12C8.28333 12 8.52083 12.0958 8.7125 12.2875C8.90417 12.4792 9 12.7167 9 13C9 13.2833 8.90417 13.5208 8.7125 13.7125C8.52083 13.9042 8.28333 14 8 14ZM16 14C15.7167 14 15.4792 13.9042 15.2875 13.7125C15.0958 13.5208 15 13.2833 15 13C15 12.7167 15.0958 12.4792 15.2875 12.2875C15.4792 12.0958 15.7167 12 16 12C16.2833 12 16.5208 12.0958 16.7125 12.2875C16.9042 12.4792 17 12.7167 17 13C17 13.2833 16.9042 13.5208 16.7125 13.7125C16.5208 13.9042 16.2833 14 16 14ZM12 18C11.7167 18 11.4792 17.9042 11.2875 17.7125C11.0958 17.5208 11 17.2833 11 17C11 16.7167 11.0958 16.4792 11.2875 16.2875C11.4792 16.0958 11.7167 16 12 16C12.2833 16 12.5208 16.0958 12.7125 16.2875C12.9042 16.4792 13 16.7167 13 17C13 17.2833 12.9042 17.5208 12.7125 17.7125C12.5208 17.9042 12.2833 18 12 18ZM8 18C7.71667 18 7.47917 17.9042 7.2875 17.7125C7.09583 17.5208 7 17.2833 7 17C7 16.7167 7.09583 16.4792 7.2875 16.2875C7.47917 16.0958 7.71667 16 8 16C8.28333 16 8.52083 16.0958 8.7125 16.2875C8.90417 16.4792 9 16.7167 9 17C9 17.2833 8.90417 17.5208 8.7125 17.7125C8.52083 17.9042 8.28333 18 8 18ZM16 18C15.7167 18 15.4792 17.9042 15.2875 17.7125C15.0958 17.5208 15 17.2833 15 17C15 16.7167 15.0958 16.4792 15.2875 16.2875C15.4792 16.0958 15.7167 16 16 16C16.2833 16 16.5208 16.0958 16.7125 16.2875C16.9042 16.4792 17 16.7167 17 17C17 17.2833 16.9042 17.5208 16.7125 17.7125C16.5208 17.9042 16.2833 18 16 18ZM5 22C4.45 22 3.97917 21.8042 3.5875 21.4125C3.19583 21.0208 3 20.55 3 20V6C3 5.45 3.19583 4.97917 3.5875 4.5875C3.97917 4.19583 4.45 4 5 4H6V2H8V4H16V2H18V4H19C19.55 4 20.0208 4.19583 20.4125 4.5875C20.8042 4.97917 21 5.45 21 6V20C21 20.55 20.8042 21.0208 20.4125 21.4125C20.0208 21.8042 19.55 22 19 22H5ZM5 20H19V10H5V20Z" fill="#003B4D" />
                      </g>
                    </svg>
                    <p class="!mb-0 text-sm"><?php echo $gameDate; ?></p>
                  </div>
                  <div class="flex items-center gap-2">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <mask id="mask0_15_523" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                        <rect width="24" height="24" fill="#D9D9D9" />
                      </mask>
                      <g mask="url(#mask0_15_523)">
                        <path d="M15.3 16.7L16.7 15.3L13 11.6V7H11V12.4L15.3 16.7ZM12 22C10.6167 22 9.31667 21.7375 8.1 21.2125C6.88333 20.6875 5.825 19.975 4.925 19.075C4.025 18.175 3.3125 17.1167 2.7875 15.9C2.2625 14.6833 2 13.3833 2 12C2 10.6167 2.2625 9.31667 2.7875 8.1C3.3125 6.88333 4.025 5.825 4.925 4.925C5.825 4.025 6.88333 3.3125 8.1 2.7875C9.31667 2.2625 10.6167 2 12 2C13.3833 2 14.6833 2.2625 15.9 2.7875C17.1167 3.3125 18.175 4.025 19.075 4.925C19.975 5.825 20.6875 6.88333 21.2125 8.1C21.7375 9.31667 22 10.6167 22 12C22 13.3833 21.7375 14.6833 21.2125 15.9C20.6875 17.1167 19.975 18.175 19.075 19.075C18.175 19.975 17.1167 20.6875 15.9 21.2125C14.6833 21.7375 13.3833 22 12 22ZM12 20C14.2167 20 16.1042 19.2208 17.6625 17.6625C19.2208 16.1042 20 14.2167 20 12C20 9.78333 19.2208 7.89583 17.6625 6.3375C16.1042 4.77917 14.2167 4 12 4C9.78333 4 7.89583 4.77917 6.3375 6.3375C4.77917 7.89583 4 9.78333 4 12C4 14.2167 4.77917 16.1042 6.3375 17.6625C7.89583 19.2208 9.78333 20 12 20Z" fill="#003B4D" />
                      </g>
                    </svg>
                    <p class="!mb-0 text-sm"><?php echo $gameHour; ?></p>
                  </div>
                </div>
              </div>
              <div class="flex items-center justify-between gap-4 px-4 py-4">
                <div class="w-24 h-24 rounded-full bg-gray-300 flex items-center justify-center [&>img]:aspect-square [&>img]:w-16 [&>img]:object-contain">
                  <?php echo get_the_post_thumbnail($teams[0], 'sportspress-fit-icon', array('itemprop' => 'logo')); ?>
                </div>
                <p class="!mb-0 text-base md:text-xl font-bold font-family-oswald">VS</p>
                <div class="w-24 h-24 rounded-full bg-gray-300 flex items-center justify-center [&>img]:aspect-square [&>img]:w-16 [&>img]:object-contain">
                  <?php echo get_the_post_thumbnail($teams[1], 'sportspress-fit-icon', array('itemprop' => 'logo')); ?>
                </div>
              </div>
              <div class="bg-[#003B4D] py-3">
                <p class="text-center text-sm text-white uppercase font-bold !mb-0 font-family-oswald">
                  <?php echo $leagues[0]->name; ?>
                </p>
              </div>
            </div>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>

        <?php else: ?>
          <div class="col-span-12">
            <p>
              <?php _e('No hay próximos partidos programados.', 'bluetide'); ?>
            </p>
          </div>
        <?php endif; ?>
        <?php restore_current_blog(); ?>
      </div>
    </div>
  <?php
  }

  public function update($new_instance, $old_instance)
  {
    switch_to_blog($new_instance['siteId']);

    $instance = array();

    $instance['siteId'] = strip_tags($new_instance['siteId']);
    $instance['numberOfPosts'] = strip_tags($new_instance['numberOfPosts']);

    restore_current_blog();
    return $instance;
  }

  public function form($instance)
  {
    $siteId = !empty($instance['siteId']) ? $instance['siteId'] : get_current_blog_id();
    switch_to_blog($siteId);
    $sites = wp_get_sites();

    $numberOfPosts = !empty($instance['numberOfPosts']) ? $instance['numberOfPosts'] : 5;
  ?>
    <p>
      <label for="<?php echo $this->get_field_id('siteId'); ?>"><?php _e('Site:', 'bluetide'); ?></label>
      <select class="widefat" id="<?php echo $this->get_field_id('siteId'); ?>" name="<?php echo $this->get_field_name('siteId'); ?>">
        <?php
        foreach ($sites as $site) :
          $blog_id = $site['blog_id'];
          //$domain = $site['domain'];
          //$path = $site['path'];
          $site_name = get_blog_details($blog_id)->blogname; // Obtener el nombre del sitio
          //$site_url = network_site_url($path, $domain); // Generar la URL del sitio
          $selected = ($blog_id == $siteId) ? 'selected' : '';

          echo '<option value="' . esc_attr($blog_id) . '" ' . $selected . ' >' . esc_html($site_name) . '</option>';
        endforeach;
        ?>
      </select>
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('numberOfPosts'); ?>"><?php _e('Number of posts:', 'bluetide'); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id('numberOfPosts'); ?>" name="<?php echo $this->get_field_name('numberOfPosts'); ?>" type="text" value="<?php echo $numberOfPosts; ?>">
    </p>
<?php
    restore_current_blog();
  }
}

register_widget('UpcomingGamesWidget');
