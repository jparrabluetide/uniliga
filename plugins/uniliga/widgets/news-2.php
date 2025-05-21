<?php

class NewsWidget2 extends WP_Widget
{

  public function __construct()
  {
    parent::__construct(
      'news_widget_2', // Base ID
      __('News widget', 'bluetide'),
      array(
        'description' => __('news widget description', 'bluetide')
      ) // Args
    );
  }

  public function widget($args, $instance)
  {
    $data = new WP_Query(
      array(
        'post_type' => 'new',
        'posts_status' => 'publish',
        'order_by' => 'date',
        'order' => 'DESC',
        'posts_per_page' => $instance['numberPost'] ?? 3,
      )
    );
?>

    <div class="news">
      <?php if ($data->have_posts()): ?>
        <div class="grid grid-cols-3 grid-rows-3 lg:grid-rows-2 gap-4 w-full lg:max-h-[600px]">
          <?php
          $posts = $data->posts;
          ?>
          <div class="col-span-3 lg:col-span-2 lg:row-span-2 bg-gray-200 w-full h-full relative">
            <?php
            if (count($posts) > 0):
              $firstPost = $posts[0];
              $categoriesForFirstPost = get_the_category($firstPost->ID);
            ?>
              <div class="w-full h-full bg-cover bg-no-repeat" style="background-image: url(<?php echo get_the_post_thumbnail_url($firstPost->ID, 'large'); ?>)">
                <div class="w-full h-full flex flex-col justify-end px-4 md:px-7 pb-8 bg-gradient-to-t from-[#00BED6]  to-transparent">
                  <a href="#" class="bg-yellow-400 w-max px-2 py-1 mb-5 block">
                    <span class="font-family-roboto text-sm uppercase text-tarawera-950">
                      <?php echo $categoriesForFirstPost[0]->name; ?>
                    </span>
                  </a>
                  <h4 class="text-lg md:text-2xl lg:text-4xl font-family-oswald text-tarawera-950 uppercase max-w-[320px] mb-5">
                    <?php echo get_the_title($firstPost->ID); ?>
                  </h4>
                  <a href="<?php echo get_the_permalink($firstPost->ID); ?>" class="font-family-oswald uppercase text-tarawera-950 text-sm md:text-base flex items-center gap-2 border-b border-tarawera-950 w-max px-3 pb-2">
                    Ver highlights
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                      <mask id="a" width="24" height="24" x="0" y="0" maskUnits="userSpaceOnUse" style="mask-type:alpha">
                        <path fill="#D9D9D9" d="M0 0h24v24H0z" />
                      </mask>
                      <g mask="url(#a)">
                        <path fill="#003B4D" d="M6.4 18 5 16.6 14.6 7H6V5h12v12h-2V8.4L6.4 18Z" />
                      </g>
                    </svg>
                  </a>
                </div>
              </div>
            <?php endif; ?>
          </div>
          <div class="col-span-3 lg:col-span-1">
            <?php
            if (count($posts) > 1):
              $secondPost = $posts[1];
              $categoriesForSecondPost = get_the_category($secondPost->ID);
            ?>
              <div class="w-full h-full bg-cover bg-no-repeat mb-4" style="background-image: url(<?php echo get_the_post_thumbnail_url($secondPost->ID, 'large'); ?>)">
                <div class="w-full h-full flex flex-col justify-end px-4 md:px-7 pb-8 bg-gradient-to-t from-[#00BED6]  to-transparent">
                  <a href="#" class="bg-yellow-400 w-max px-2 py-1 mb-5 block">
                    <span class="font-family-roboto text-sm uppercase text-tarawera-950">
                      <?php echo $categoriesForSecondPost[0]->name; ?>
                    </span>
                  </a>
                  <h4 class="text-lg md:text-2xl font-family-oswald text-tarawera-950 uppercase max-w-[320px] mb-5">
                    <?php echo get_the_title($secondPost->ID); ?>
                  </h4>
                  <a href="<?php echo get_the_permalink($secondPost->ID); ?>" class="font-family-oswald uppercase text-tarawera-950 text-sm md:text-base flex items-center gap-2 border-b border-tarawera-950 w-max px-3 pb-2">
                    Ver highlights
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                      <mask id="a" width="24" height="24" x="0" y="0" maskUnits="userSpaceOnUse" style="mask-type:alpha">
                        <path fill="#D9D9D9" d="M0 0h24v24H0z" />
                      </mask>
                      <g mask="url(#a)">
                        <path fill="#003B4D" d="M6.4 18 5 16.6 14.6 7H6V5h12v12h-2V8.4L6.4 18Z" />
                      </g>
                    </svg>
                  </a>
                </div>
              </div>
            <?php endif; ?>
            <?php
            if (count($posts) > 2):
              $thirdPost = $posts[2];
              $categoriesForThirdPost = get_the_category($thirdPost->ID);
            ?>
              <div class="w-full h-full bg-cover bg-no-repeat" style="background-image: url(<?php echo get_the_post_thumbnail_url($thirdPost->ID, 'large'); ?>)">
                <div class="w-full h-full flex flex-col justify-end px-4 md:px-7 pb-8 bg-gradient-to-t from-[#00BED6]  to-transparent">
                  <a href="#" class="bg-yellow-400 w-max px-2 py-1 mb-5 block">
                    <span class="font-family-roboto text-sm uppercase text-tarawera-950">
                      <?php echo $categoriesForThirdPost[0]->name; ?>
                    </span>
                  </a>
                  <h4 class="text-lg md:text-2xl font-family-oswald text-tarawera-950 uppercase max-w-[320px] mb-5">
                    <?php echo get_the_title($thirdPost->ID); ?>
                  </h4>
                  <a href="<?php echo get_the_permalink($thirdPost->ID); ?>" class="font-family-oswald uppercase text-tarawera-950 text-base flex items-center gap-2 border-b border-tarawera-950 w-max px-3 pb-2">
                    Ver highlights
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                      <mask id="a" width="24" height="24" x="0" y="0" maskUnits="userSpaceOnUse" style="mask-type:alpha">
                        <path fill="#D9D9D9" d="M0 0h24v24H0z" />
                      </mask>
                      <g mask="url(#a)">
                        <path fill="#003B4D" d="M6.4 18 5 16.6 14.6 7H6V5h12v12h-2V8.4L6.4 18Z" />
                      </g>
                    </svg>
                  </a>
                </div>
              </div>
            <?php endif; ?>
          </div>
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
    $numberPost = isset($instance['numberPost']) ? $instance['numberPost'] : 3;
    // Display widget settings form
  ?>
    <p>
      <label for="<?php echo $this->get_field_id('numberPost'); ?>">
        <?php _e('Number of posts'); ?>:
      </label>
      <input class="widefat" id="<?php echo $this->get_field_id('numberPost'); ?>"
        name="<?php echo $this->get_field_name('numberPost'); ?>" type="number" min="1" max="3"
        value="<?php echo esc_attr($numberPost); ?>" />
    </p>
<?php
  }
}

register_widget('NewsWidget2');
