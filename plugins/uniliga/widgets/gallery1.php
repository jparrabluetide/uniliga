<?php

class Gallery1Widget extends WP_Widget
{

  public function __construct()
  {
    parent::__construct(
      'gallery1_widget', // Base ID
      __('Gallery widget', 'bluetide'),
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
        'posts_per_page' => $instance['numberPost'] ?? 5,
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
        'posts_per_page' => $instance['numberPost'] ?? 5,
      );
    }

    $data = new WP_Query($args);
?>

    <div class="gallery-1">
      <div class="grid grid-cols-3 grid-rows-2 gap-4">
        <?php if ($data->have_posts()): ?>
          <?php $posts = $data->posts; ?>
          <div class="col-span-3 md:col-span-1">
            <?php
            if (count($posts) > 0):
              $firstPost = $posts[0];
              $categoriesPost0 = get_the_category($firstPost->ID);
            ?>
              <div class="w-full h-full bg-cover bg-no-repeat" style="background-image: url(<?php echo get_the_post_thumbnail_url($firstPost->ID, 'large'); ?>)">
                <div class="w-full h-full flex flex-col justify-end px-4 md:px-7 pb-6 pt-14 bg-gradient-to-t-mainColor">
                  <p class="badge-sport block">
                    <span class="font-family-roboto text-sm uppercase text-tarawera-950">
                      <?php echo $categoriesPost0[0]->name; ?>
                    </span>
                  </p>
                  <h4 class="text-lg md:text-2xl lg:text-3xl font-family-oswald text-tarawera-950 uppercase max-w-[320px] mb-5">
                    <?php echo get_the_title($firstPost->ID); ?>
                  </h4>
                  <a href="<?php echo get_the_post_thumbnail_url($firstPost->ID); ?>" data-lightbox="gallery-1" data-title="<?php echo get_the_title($firstPost->ID); ?>" class="font-family-oswald uppercase text-tarawera-950 text-sm md:text-base flex items-center gap-2 border-b border-tarawera-950 w-max px-3 pb-2">
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
          <div class="col-span-3 md:col-span-1 md:row-span-2">
            <?php
            if (count($posts) > 1):
              $post1 = $posts[1];
              $categoriesPost1 = get_the_category($post1->ID);
            ?>
              <div class="w-full h-full bg-cover bg-no-repeat" style="background-image: url(<?php echo get_the_post_thumbnail_url($post1->ID, 'large'); ?>)">
                <div class="w-full h-full flex flex-col justify-end px-4 md:px-7 pb-6 pt-14 bg-gradient-to-t-mainColor">
                  <p class="badge-sport block">
                    <span class="font-family-roboto text-sm uppercase text-tarawera-950">
                      <?php echo $categoriesPost1[0]->name; ?>
                    </span>
                  </p>
                  <h4 class="text-lg md:text-2xl lg:text-3xl font-family-oswald text-tarawera-950 uppercase max-w-[320px] mb-5">
                    <?php echo get_the_title($post1->ID); ?>
                  </h4>
                  <a href="<?php echo get_the_post_thumbnail_url($post1->ID); ?>" data-lightbox="gallery-1" data-title="<?php echo get_the_title($post1->ID); ?>" class="font-family-oswald uppercase text-tarawera-950 text-sm md:text-base flex items-center gap-2 border-b border-tarawera-950 w-max px-3 pb-2">
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
          <div class="col-span-3 md:col-span-1">
            <?php
            if (count($posts) > 2):
              $post2 = $posts[2];
              $categoriesPost2 = get_the_category($post2->ID);
            ?>
              <div class="w-full h-full bg-cover bg-no-repeat" style="background-image: url(<?php echo get_the_post_thumbnail_url($post2->ID, 'large'); ?>)">
                <div class="w-full h-full flex flex-col justify-end px-4 md:px-7 pb-6 pt-14 bg-gradient-to-t-mainColor">
                  <p class="badge-sport block">
                    <span class="font-family-roboto text-sm uppercase text-tarawera-950">
                      <?php echo $categoriesPost2[0]->name; ?>
                    </span>
                  </p>
                  <h4 class="text-lg md:text-2xl lg:text-3xl font-family-oswald text-tarawera-950 uppercase max-w-[320px] mb-5">
                    <?php echo get_the_title($post2->ID); ?>
                  </h4>
                  <a href="<?php echo get_the_post_thumbnail_url($post2->ID); ?>" data-lightbox="gallery-1" data-title="<?php echo get_the_title($post2->ID); ?>" class="font-family-oswald uppercase text-tarawera-950 text-sm md:text-base flex items-center gap-2 border-b border-tarawera-950 w-max px-3 pb-2">
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
          <div class="col-span-3 md:col-span-1">
            <?php
            if (count($posts) > 3):
              $post3 = $posts[3];
              $categoriesPost3 = get_the_category($post3->ID);
            ?>
              <div class="w-full h-full bg-cover bg-no-repeat" style="background-image: url(<?php echo get_the_post_thumbnail_url($post3->ID, 'large'); ?>)">
                <div class="w-full h-full flex flex-col justify-end px-4 md:px-7 pb-6 pt-14 bg-gradient-to-t-mainColor">
                  <p class="badge-sport block">
                    <span class="font-family-roboto text-sm uppercase text-tarawera-950">
                      <?php echo $categoriesPost3[0]->name; ?>
                    </span>
                  </p>
                  <h4 class="text-lg md:text-2xl lg:text-3xl font-family-oswald text-tarawera-950 uppercase max-w-[320px] mb-5">
                    <?php echo get_the_title($post3->ID); ?>
                  </h4>
                  <a href="<?php echo get_the_post_thumbnail_url($post3->ID); ?>" data-lightbox="gallery-1" data-title="<?php echo get_the_title($post3->ID); ?>" class="font-family-oswald uppercase text-tarawera-950 text-sm md:text-base flex items-center gap-2 border-b border-tarawera-950 w-max px-3 pb-2">
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
          <div class="col-span-3 md:col-span-1">
            <?php
            if (count($posts) > 4):
              $post4 = $posts[4];
              $categoriesPost4 = get_the_category($post4->ID);
            ?>
              <div class="w-full h-full bg-cover bg-no-repeat" style="background-image: url(<?php echo get_the_post_thumbnail_url($post4->ID, 'large'); ?>)">
                <div class="w-full h-full flex flex-col justify-end px-4 md:px-7 pb-6 pt-14 bg-gradient-to-t-mainColor">
                  <p class="badge-sport block">
                    <span class="font-family-roboto text-sm uppercase text-tarawera-950">
                      <?php echo $categoriesPost4[0]->name; ?>
                    </span>
                  </p>
                  <h4 class="text-lg md:text-2xl lg:text-3xl font-family-oswald text-tarawera-950 uppercase max-w-[320px] mb-5">
                    <?php echo get_the_title($post4->ID); ?>
                  </h4>
                  <a href="<?php echo get_the_post_thumbnail_url($post4->ID); ?>" data-lightbox="gallery-1" data-title="<?php echo get_the_title($post4->ID); ?>" class="font-family-oswald uppercase text-tarawera-950 text-sm md:text-base flex items-center gap-2 border-b border-tarawera-950 w-max px-3 pb-2">
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
    $numberPost = isset($instance['numberPost']) ? $instance['numberPost'] : 5;
    $spLeagues = isset($instance['spLeagues']) ? $instance['spLeagues'] : array();
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

register_widget('Gallery1Widget');
