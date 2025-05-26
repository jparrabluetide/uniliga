<?php get_header(); ?>

<div class="container mx-auto px-4 py-8">
  <?php while (have_posts()):
    the_post();
  ?>
  <div class="tablePosition">
    <?php the_content(); ?>
  </div>
  <?php endwhile; ?>
  <?php wp_reset_postdata(); ?>
</div>
<?php get_footer(); ?>
