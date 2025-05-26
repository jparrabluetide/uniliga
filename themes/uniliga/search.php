<?php get_header(); ?>
<header class="page-header py-16 bg-scooter-500 mb-10">
  <div class="container mx-auto px-4">
    <h1 class="page-title text-white font-family-oswald text-2xl md:text-4xl uppercase">
      <?php
      /* translators: %s: search query. */
      printf(esc_html__('Resultados para: %s', 'bluetide'), '<span>' . get_search_query() . '</span>');
      ?>
    </h1>
  </div>
</header><!-- .page-header -->
<div class="searchResults container mx-auto px-4">
  <?php if (have_posts()) : ?>
    <div class="grid grid-cols-12 gap-4">
      <div class="col-span-12 md:col-span-8 prose prose-base lg:prose-lg">
        <?php while (have_posts()):
          the_post();
          get_template_part('templates/content', 'search');
        ?>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      </div>
      <div class="col-span-12 md:col-span-4">
        <?php get_template_part('templates/newsSidebar'); ?>
      </div>
    </div>
  <?php else : ?>
    <div class="">
      <p class="text-center text-xl text-black"><?php _e('No posts found', 'bluetide'); ?></p>
    </div>
  <?php endif; ?>
</div>
<?php get_footer(); ?>
