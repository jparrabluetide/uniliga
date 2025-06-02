<?php get_header(); ?>
<?php
$data = new WP_Query(
  array(
    'post_type' => 'gallery1',
    'posts_status' => 'publish',
    'order_by' => 'date',
    'order' => 'DESC',
    'posts_per_page' => 12,
    'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1,
  )
);
?>
<div class="container px-4 mx-auto pt-10 md:pt-20 pb-10">
  <div class="gallery-1">
    <h1 class="text-2xl md:text-4xl font-family-oswald text-tarawera-950 uppercase font-medium mb-8"><?php echo __('Galería', 'bluetide') ?></h1>
    <div class="grid grid-cols-3 gap-4">
      <?php if ($data->have_posts()):
        while ($data->have_posts()):
          $data->the_post();
          $dataId = get_the_ID();

          $categoriesPost = get_the_category($dataId);
      ?>
          <div class="col-span-3 lg:col-span-1">
            <div class="w-full h-full bg-cover bg-no-repeat" style="background-image: url(<?php echo get_the_post_thumbnail_url($dataId, 'large'); ?>)">
              <div class="w-full h-full flex flex-col justify-end px-4 md:px-7 pb-6 pt-14 bg-gradient-to-t from-[#00BED6]  to-transparent">
                <p class="bg-yellow-400 w-max px-2 py-1 mb-5 block">
                  <span class="font-family-roboto text-sm uppercase text-tarawera-950">
                    <?php echo $categoriesPost[0]->name; ?>
                  </span>
                </p>
                <h4 class="text-lg md:text-2xl lg:text-3xl font-family-oswald text-tarawera-950 uppercase max-w-[320px] mb-5">
                  <?php echo get_the_title($dataId); ?>
                </h4>
                <a href="<?php echo get_the_post_thumbnail_url($dataId); ?>" data-lightbox="gallery-1" data-title="<?php echo get_the_title($dataId); ?>" class="font-family-oswald uppercase text-tarawera-950 text-sm md:text-base flex items-center gap-2 border-b border-tarawera-950 w-max px-3 pb-2">
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
          </div>
        <?php endwhile; ?>
    </div>
    <div class="pagination">
      <?php
        echo paginate_links(array(
          'total'   => $data->max_num_pages,
          'current' => max(1, get_query_var('paged')),
          'prev_text' => __('&laquo;', 'bluetide'),
          'next_text' => __('&raquo;', 'bluetide'),
        ));
      ?>
    </div>
    <?php wp_reset_postdata(); ?>
  <?php else: ?>
    <div class="col-span-3">
      <p class="text-center text-xl text-black"><?php _e('No posts found', 'bluetide'); ?></p>
    </div>
  <?php endif; ?>
  </div>
</div>

<?php get_footer(); ?>
