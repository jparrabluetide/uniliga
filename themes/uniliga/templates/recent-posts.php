<?php
$data = new WP_Query(
  array(
    'post_type' => 'new',
    'posts_status' => 'publish',
    'order_by' => 'date',
    'order' => 'DESC',
    'posts_per_page' => 5,
  )
);

?>
<?php if ($data->have_posts()): ?>
  <div class="">
    <?php while ($data->have_posts()):
      $data->the_post();
      $dataId = get_the_ID();
    ?>
      <a class="flex items-center mb-4 gap-4" href="<?php the_permalink(); ?>">
        <img src="<?php echo get_the_post_thumbnail_url($dataId, 'thumbnail'); ?>" alt="<?php the_title(); ?>" width="80" height="80" class="w-20 h-20 object-cover rounded-md" />
        <div class="">
          <p class="text-sm text-gray-400"><?php echo get_the_date(); ?></p>
          <h4 class="text-lg font-family-oswald text-tarawera-950"><?php the_title(); ?></h4>
        </div>
      </a>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
  </div>
<?php else: ?>
  <div class="w-full">
    <p class="text-center text-xl text-black"><?php _e('No posts found', 'bluetide'); ?></p>
  </div>
<?php endif; ?>
