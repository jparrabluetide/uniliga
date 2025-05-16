<?php

  $page_slug = 'sobre-uniliga';

  switch_to_blog(1);
  $page = get_page_by_path($page_slug);
  $page_url = get_permalink($page->ID);
  restore_current_blog();
?>

<footer class="bg-tarawera-950 w-full pt-10 pb-5">
  <div class="container mx-auto px-4">
    <div class="grid grid-cols-4 gap-10 lg:gap-30">
      <div class="col-span-4 md:col-span-2 xl:col-span-1">
        <h3 class="text-white text-xl font-family-oswald uppercase mb-6">Sobre Uniliga</h3>
        <?php dynamic_sidebar('footer-about'); ?>
      </div>
      <div class="col-span-4 md:col-span-2 xl:col-span-1">
        <h3 class="text-white text-xl font-family-oswald uppercase mb-6">Site map</h3>
        <a href="<?php echo $page_url; ?>" class="text-white text-base">Sobre UniLiga</a>
        <div class="w-full h-[1px] bg-scooter-500 my-4"></div>
        <ul>
          <li>
            <a href="/voley" class="text-white text-base">Vóley</a>
          </li>
        </ul>
        <div class="w-full h-[1px] bg-scooter-500 my-4"></div>
        <div class="text-white">
          <?php wp_nav_menu(array('theme_location' => 'menu-2', 'menu_id' => 'menu-footer-2')); ?>
        </div>
      </div>
      <div class="col-span-4 md:col-span-2 xl:col-span-1">
        <h3 class="text-white text-xl font-family-oswald uppercase mb-6">Contácto</h3>
        <?php dynamic_sidebar('footer-contact'); ?>
      </div>
      <div class="col-span-4 md:col-span-2 xl:col-span-1">
        <h3 class="text-white text-xl font-family-oswald uppercase mb-6">Galería</h3>
        <div class="grid grid-cols-3 gap-x-2 gap-y-4">
          <?php
          $data = new WP_Query(
            array(
              'post_type' => 'gallery1',
              'posts_status' => 'publish',
              'order_by' => 'date',
              'order' => 'DESC',
              'posts_per_page' => 6,
            )
          );
          ?>
          <?php if ($data->have_posts()): ?>
            <?php while ($data->have_posts()): $data->the_post(); ?>
              <div class="col-span-1 w-[84px] h-[84px] md:w-[64px] md:h-[64px] 2xl:w-[84px] 2xl:h-[84px] bg-gray-200">
                <a href="<?php echo get_the_post_thumbnail_url(); ?>" class="w-full h-full block" data-lightbox="gallery-1_1" data-title="<?php echo get_the_title($data->ID); ?>">
                  <img src="<?php echo get_the_post_thumbnail_url($data->ID, 'gallery1-card'); ?>" class="w-full h-full object-cover" alt="<?php the_title(); ?>" />
                </a>
              </div>
            <?php endwhile; ?>
          <?php endif; ?>
          <?php wp_reset_postdata(); ?>
        </div>
      </div>
    </div>
  </div>
  </div>
  <div class="container mx-auto px-4 mt-6">
    <div class="w-full h-[1px] bg-white mb-8"></div>
    <div class="flex flex-col md:flex-row justify-between">
      <p class="text-white text-base">
        2025 © Copyright - UNILIGA MEDCOM
      </p>
      <div class="text-white text-base">
        <p>Development by: <a href="https://bluetide.dev" target="_blank" rel="noopener noreferrer">BlueTide</a> | <a href="#">Términos y condiciones</a></p>
      </div>
    </div>
  </div>
</footer>
