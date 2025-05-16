<?php

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
    <div class="grid grid-cols-3 gap-4">
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
          <div class="col-span-3 lg:col-span-1">
            <div class="p-7 bg-gray-300 w-full h-[350px] md:h-[500px] bg-cover bg-no-repeat" style="background-image: url('<?php echo get_the_post_thumbnail_url($dataId, 'highlight-card'); ?>')">
              <div class="flex flex-col justify-between h-full">
                <div class="bg-tarawera-950 w-14 h-14 flex items-center justify-center">
                  <img src="<?php echo $imageCardSrc[0]; ?>" alt="icon" class="w-10 h-10" />
                </div>
                <div class="">
                  <p class="bg-yellow-400 w-max px-2 py-1 mb-5 block">
                    <span class="font-family-roboto text-sm uppercase text-tarawera-950">
                      <?php echo $categoriesPost[0]->name; ?>
                    </span>
                  </p>
                  <h4 class="text-lg md:text-2xl lg:text-3xl font-family-oswald text-tarawera-950 uppercase max-w-[320px] mb-5">
                    <?php the_title(); ?>
                  </h4>
                  <button data-title="<?php the_title(); ?>" data-modal="modal-highlights" data-videoid="<?php echo $videoId; ?>" class="btn-modal cursor-pointer font-family-oswald uppercase text-tarawera-950 text-sm md:text-base flex items-center gap-2 border-b border-tarawera-950 w-max px-3 pb-2">
                    Ver highlights
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                      <mask id="a" width="24" height="24" x="0" y="0" maskUnits="userSpaceOnUse" style="mask-type:alpha">
                        <path fill="#D9D9D9" d="M0 0h24v24H0z" />
                      </mask>
                      <g mask="url(#a)">
                        <path fill="#003B4D" d="M6.4 18 5 16.6 14.6 7H6V5h12v12h-2V8.4L6.4 18Z" />
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
            <div class="w-full min-w-[80vw] md:min-w-[600px] bg-gray-200 p-1 rounded-sm">
              <div class="w-full lg:w-[760px] aspect-video modal__video">
              </div>
            </div>
          </main>
          <footer class="modal__footer">
            <div class="mt-2 flex gap-4 justify-between">
              <p class="font-family-roboto text-sm text-white modal__title">Lorem ipsum dolor sit amet consectetur</p>
              <button class="modal__close text-white text-3xl cursor-pointer focus:outline-0" aria-label="Close modal" data-micromodal-close></button>
            </div>
          </footer>
        </div>
      </div>
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

register_widget('HighlightsWidget');
