<?php get_header(); ?>

<div class="container mx-auto px-4 py-8 md:py-16">
  <article class="rose prose-base lg:prose-lg">
    <div class="grid grid-cols-12 gap-4">
      <div class="col-span-12 md:col-span-8">
        <h1 class="text-2xl md:text-4xl font-family-oswald uppercase text-tarawera-950 mb-7 "><?php the_title(); ?></h1>
        <div class="">
          <?php the_content(); ?>
        </div>
      </div>
      <div class="col-span-12 md:col-span-4">
        Search
        <?php get_search_form(); ?>
      </div>
    </div>
  </article>
</div>

<?php get_footer(); ?>
