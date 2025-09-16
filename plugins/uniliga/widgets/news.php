<?php

class NewsWidget extends WP_Widget
{

  public function __construct()
  {
    parent::__construct(
      'news_widget', // Base ID
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
        'posts_per_page' => $instance['numberPost'] ?? 5,
      )
    );
    ?>

    <div class="news">
      <?php if ($data->have_posts()): ?>
        <div class="news__grid">
          <?php
          $posts = $data->posts;
          ?>
          <div class="news__cell-1">
            <?php
            if (count($posts) > 0):
              $firstPost = $posts[0];
              $categoriesForFirstPost = get_the_category($firstPost->ID);
              ?>
              <div class="news__bgImage"
                style="background-image: url(<?php echo get_the_post_thumbnail_url($firstPost->ID, 'large'); ?>)">
                <div class="news__container bg-gradient-to-t-mainColor news__sport-<?php echo sanitize_title($categoriesForFirstPost[0]->name); ?>">
                  <a href="#" class="badge-sport ">
                    <span class="">
                      <?php echo $categoriesForFirstPost[0]->name; ?>
                    </span>
                  </a>
                  <h4 class="news__title">
                    <?php echo get_the_title($firstPost->ID); ?>
                  </h4>
                  <a href="<?php echo get_the_permalink($firstPost->ID); ?>"
                    class="news__link">
                    Ver más
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                      <mask id="a" width="24" height="24" x="0" y="0" maskUnits="userSpaceOnUse" style="mask-type:alpha">
                        <path fill="#D9D9D9" d="M0 0h24v24H0z" />
                      </mask>
                      <g mask="url(#a)">
                        <path fill="currentColor" d="M6.4 18 5 16.6 14.6 7H6V5h12v12h-2V8.4L6.4 18Z" />
                      </g>
                    </svg>
                  </a>
                </div>
              </div>
            <?php endif; ?>
          </div>
          <div class="news__cell-2">
            <?php
            if (count($posts) > 1):
              $secondPost = $posts[1];
              $categoriesForSecondPost = get_the_category($secondPost->ID);
              ?>
              <div class="news__bgImage mb-4"
                style="background-image: url(<?php echo get_the_post_thumbnail_url($secondPost->ID, 'large'); ?>)">
                <div class="news__container bg-gradient-to-t-mainColor news__sport-<?php echo sanitize_title($categoriesForSecondPost[0]->name); ?>">
                  <a href="#" class="badge-sport ">
                    <span class="">
                      <?php echo $categoriesForSecondPost[0]->name; ?>
                    </span>
                  </a>
                  <h4 class="news__title">
                    <?php echo get_the_title($secondPost->ID); ?>
                  </h4>
                  <a href="<?php echo get_the_permalink($secondPost->ID); ?>"
                    class="news__link">
                    Ver más
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                      <mask id="a" width="24" height="24" x="0" y="0" maskUnits="userSpaceOnUse" style="mask-type:alpha">
                        <path fill="#D9D9D9" d="M0 0h24v24H0z" />
                      </mask>
                      <g mask="url(#a)">
                        <path fill="currentColor" d="M6.4 18 5 16.6 14.6 7H6V5h12v12h-2V8.4L6.4 18Z" />
                      </g>
                    </svg>
                  </a>
                </div>
              </div>
            <?php endif; ?>
          </div>
          <div class="news__cell-3">
            <?php
            if (count($posts) > 2):
              $thirdPost = $posts[2];
              $categoriesForThirdPost = get_the_category($thirdPost->ID);
              ?>
              <div class="news__bgImage"
                style="background-image: url(<?php echo get_the_post_thumbnail_url($thirdPost->ID, 'large'); ?>)">
                <div class="news__container bg-gradient-to-t-mainColor news__sport-<?php echo sanitize_title($categoriesForThirdPost[0]->name); ?>">
                  <a href="#" class="badge-sport ">
                    <span class="">
                      <?php echo $categoriesForThirdPost[0]->name; ?>
                    </span>
                  </a>
                  <h4 class="news__title">
                    <?php echo get_the_title($thirdPost->ID); ?>
                  </h4>
                  <a href="<?php echo get_the_permalink($thirdPost->ID); ?>"
                    class="news__link">
                    Ver más
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                      <mask id="a" width="24" height="24" x="0" y="0" maskUnits="userSpaceOnUse" style="mask-type:alpha">
                        <path fill="#D9D9D9" d="M0 0h24v24H0z" />
                      </mask>
                      <g mask="url(#a)">
                        <path fill="currentColor" d="M6.4 18 5 16.6 14.6 7H6V5h12v12h-2V8.4L6.4 18Z" />
                      </g>
                    </svg>
                  </a>
                </div>
              </div>
            <?php endif; ?>
          </div>
          <div class="news__cell-4">
            <?php
            if (count($posts) > 3):
              $fourthPost = $posts[3];
              $categoriesForFourthPost = get_the_category($fourthPost->ID);

              ?>
              <div class="news__bgImage mb-4"
                style="background-image: url(<?php echo get_the_post_thumbnail_url($fourthPost->ID, 'large'); ?>)">
                <div class="news__container bg-gradient-to-t-mainColor news__sport-<?php echo sanitize_title($categoriesForFourthPost[0]->name); ?>">
                  <a href="#" class="badge-sport ">
                    <span class="">
                      <?php echo $categoriesForFourthPost[0]->name; ?>
                    </span>
                  </a>
                  <h4 class="news__title">
                    <?php echo get_the_title($fourthPost->ID); ?>
                  </h4>
                  <a href="<?php echo get_the_permalink($fourthPost->ID); ?>"
                    class="news__link">
                    Ver más
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                      <mask id="a" width="24" height="24" x="0" y="0" maskUnits="userSpaceOnUse" style="mask-type:alpha">
                        <path fill="#D9D9D9" d="M0 0h24v24H0z" />
                      </mask>
                      <g mask="url(#a)">
                        <path fill="currentColor" d="M6.4 18 5 16.6 14.6 7H6V5h12v12h-2V8.4L6.4 18Z" />
                      </g>
                    </svg>
                  </a>
                </div>
              </div>
            <?php endif; ?>
          </div>
          <div class="news__cell-5">
            <?php
            if (count($posts) > 4):
              $fifthPost = $posts[4];
              $categoriesForFifthPost = get_the_category($fifthPost->ID);
              ?>
              <div class="news__bgImage"
                style="background-image: url(<?php echo get_the_post_thumbnail_url($fifthPost->ID); ?>)">
                <div class="news__container bg-gradient-to-t-mainColor news__sport-<?php echo sanitize_title($categoriesForFifthPost[0]->name); ?>">
                  <a href="#" class="badge-sport ">
                    <span class="">
                      <?php echo $categoriesForFifthPost[0]->name; ?>
                    </span>
                  </a>
                  <h4 class="news__title">
                    <?php echo get_the_title($fifthPost->ID); ?>
                  </h4>
                  <a href="<?php echo get_the_permalink($fifthPost->ID); ?>"
                    class="news__link">
                    Ver más
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                      <mask id="a" width="24" height="24" x="0" y="0" maskUnits="userSpaceOnUse" style="mask-type:alpha">
                        <path fill="#D9D9D9" d="M0 0h24v24H0z" />
                      </mask>
                      <g mask="url(#a)">
                        <path fill="currentColor" d="M6.4 18 5 16.6 14.6 7H6V5h12v12h-2V8.4L6.4 18Z" />
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

register_widget('NewsWidget');
