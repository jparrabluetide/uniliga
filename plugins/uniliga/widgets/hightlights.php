<?php

// Evitar acceso directo
if (!defined('ABSPATH')) {
  exit;
}

class HighlightsWidget extends WP_Widget
{

  public function __construct()
  {
    parent::__construct(
      'highlights_widget', // Base ID
      __('Highlights widget', 'bluetide'),
      array(
        'description' => __('Highlights widget description', 'bluetide')
      ) // Args
    );
  }

  public function widget($args, $instance)
  {
    switch_to_blog($instance['siteId']);

    $data = new WP_Query(
      array(
        'post_type' => 'highlight',
        'posts_status' => 'publish',
        'order_by' => 'date',
        'order' => 'DESC',
        'posts_per_page' => $instance['numberPost'] ?? 3,
      )
    );

?>
    <div class="highlights-widget">
      <?php if ($data->have_posts()): ?>
        <?php while ($data->have_posts()):
          $data->the_post();
          $dataId = get_the_ID();

          $imageCardId = get_post_meta($dataId, 'bluetide_fields_highlight_icon_id', true);
          $imageCardSize = 'highlight-card';
          $imageCardSrc = wp_get_attachment_image_src($imageCardId, $imageCardSize);

          $categoriesPost = get_the_category($dataId);
          $videoId = get_post_meta($dataId, 'bluetide_fields_highlight_youtube_id', true);
        ?>
          <div class="highlight-card">
            <div class="highlight-bg-image" style="background-image: url('<?php echo get_the_post_thumbnail_url($dataId, 'highlight-card'); ?>')">
              <div class="highlight-content">
                <div class="highlight-icon">
                  <img src="<?php echo $imageCardSrc[0]; ?>" alt="icon" class="w-10 h-10" />
                </div>
                <div class="highlight-contentText bg-gradient-to-t-mainColor">
                  <p class="badge-sport">
                    <span class="">
                      <?php echo $categoriesPost[0]->name; ?>
                    </span>
                  </p>
                  <h4 class="highlight-title">
                    <?php the_title(); ?>
                  </h4>
                  <button data-title="<?php the_title(); ?>" data-modal="modal-highlights" data-videoid="<?php echo $videoId; ?>" class="btn-modal highlight-button">
                    Ver highlights
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                      <mask id="a" width="24" height="24" x="0" y="0" maskUnits="userSpaceOnUse" style="mask-type:alpha">
                        <path fill="#D9D9D9" d="M0 0h24v24H0z" />
                      </mask>
                      <g mask="url(#a)">
                        <path fill="currentColor" d="M6.4 18 5 16.6 14.6 7H6V5h12v12h-2V8.4L6.4 18Z" />
                      </g>
                    </svg>
                  </button>
                </div>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php else: ?>
        <div class="col-span-3">
          <p class="text-center text-xl text-black"><?php _e('No posts found', 'bluetide'); ?></p>
        </div>
      <?php endif; ?>
    </div>

    <!-- Modal -->
    <div class="modal micromodal-slide" id="modal-highlights" aria-hidden="true">
      <div class="modal__overlay" tabindex="-1" data-micromodal-close>
        <div class="modal__container" role="dialog" aria-modal="true">
          <main class="modal__content">
            <div class="modal_videoContainer">
              <div class="modal__video">
              </div>
            </div>
          </main>
          <footer class="modal__footer">
            <div class="modal__footerContainer">
              <p class="modal__title">Lorem ipsum dolor sit amet consectetur</p>
              <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
            </div>
          </footer>
        </div>
      </div>
    </div>
    <?php restore_current_blog(); ?>
  <?php
  }

  public function update($new_instance, $old_instance)
  {
    switch_to_blog($new_instance['siteId']);

    // Update widget options
    $instance['siteId'] = strip_tags($new_instance['siteId']);
    $instance['numberPost'] = strip_tags($new_instance['numberPost']);

    restore_current_blog();
    return $instance;
  }


  public function form($instance)
  {
    $siteId = !empty($instance['siteId']) ? $instance['siteId'] : get_current_blog_id();
    switch_to_blog($siteId);
    $sites = wp_get_sites();

    // Retrieve widget options from $instance
    $numberPost = isset($instance['numberPost']) ? $instance['numberPost'] : 5;

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
      <label for="<?php echo $this->get_field_id('numberPost'); ?>">
        <?php _e('Number of posts'); ?>:
      </label>
      <input class="widefat" id="<?php echo $this->get_field_id('numberPost'); ?>"
        name="<?php echo $this->get_field_name('numberPost'); ?>" type="number" min="1" max="5"
        value="<?php echo esc_attr($numberPost); ?>" />
    </p>
<?php
    restore_current_blog();
  }
}

register_widget('HighlightsWidget');

?>
