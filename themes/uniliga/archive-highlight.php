<?php get_header(); ?>
<?php
require_once('uniligaConfig.php');

$uniliga = new Uniliga();


$sport = '';
if (isset($_GET['sport'])) {
  $sport = sanitize_key($_GET['sport']);
  $sportId = $uniliga->getBlogIdBySportName($sport);
  switch_to_blog($sportId);
} else {
  switch_to_blog(1);
}

$data = new WP_Query(
  array(
    'post_type' => 'highlight',
    'posts_status' => 'publish',
    'order_by' => 'date',
    'order' => 'DESC',
    'posts_per_page' => 12,
    'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1,
  )
);
?>
<div class="container mx-auto px-4 pt-10 md:pt-20 pb-10 max-w-7xl">
  <h1 class="text-2xl md:text-4xl font-family-inter text-teal-800 uppercase font-medium mb-8">
    <?php echo __('Highlights', 'bluetide') ?></h1>
  <?php if ($data->have_posts()): ?>
    <div class="grid grid-cols-3 gap-4">
      <?php while ($data->have_posts()):
        $data->the_post();
        $dataId = get_the_ID();

        $imageCardId = get_post_meta($dataId, 'bluetide_fields_highlight_icon_id', true);
        $imageCardSize = 'highlight-card';
        $imageCardSrc = wp_get_attachment_image_src($imageCardId, $imageCardSize);

        $categoriesPost = get_the_category($dataId);
        $videoId = get_post_meta($dataId, 'bluetide_fields_highlight_youtube_id', true);
        ?>
        <div class="highlight-card">
          <div class="highlight-bg-image"
            style="background-image: url('<?php echo get_the_post_thumbnail_url($dataId, 'highlight-card'); ?>')">
            <div class="highlight-content">
              <div class="highlight-icon">
                <?php if (!empty($imageCardSrc)): ?>
                  <img src="<?php echo $imageCardSrc[0]; ?>" alt="icon" class="w-10 h-10" />
                <?php endif; ?>
              </div>
              <div class="highlight-contentText bg-gradient-to-t-mainColor">
                <p class="badge-sport bg__sport-<?php echo sanitize_title($categoriesPost[0]->name); ?>">
                  <span class="">
                    <?php echo $categoriesPost[0]->name; ?>
                  </span>
                </p>
                <h4 class="highlight-title">
                  <?php the_title(); ?>
                </h4>
                <button data-title="<?php the_title(); ?>" data-modal="modal-highlights"
                  data-videoid="<?php echo $videoId; ?>"
                  class="btn-modal highlight-button text-white">
                  Ver highlights
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                    <mask id="a" width="24" height="24" x="0" y="0" maskUnits="userSpaceOnUse" style="mask-type:alpha">
                      <path fill="#D9D9D9" d="M0 0h24v24H0z" />
                    </mask>
                    <g mask="url(#a)">
                      <path fill="currentColor" d="M6.4 18 5 16.6 14.6 7H6V5h12v12h-2V8.4L6.4 18Z" />
                    </g>
                  </svg>
                </button>
              </div>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
    <div class="pagination">
      <?php
      echo paginate_links(array(
        'total' => $data->max_num_pages,
        'current' => max(1, get_query_var('paged')),
        'prev_text' => __('&laquo;', 'bluetide'),
        'next_text' => __('&raquo;', 'bluetide'),
      ));
      ?>
    </div>
    <?php wp_reset_postdata(); ?>
  <?php else: ?>
    <div class="w-full text-center">
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
          <button class="modal__close text-white text-3xl cursor-pointer focus:outline-0" aria-label="Close modal"
            data-micromodal-close></button>
        </div>
      </footer>
    </div>
  </div>
</div>
<?php restore_current_blog(); ?>
<?php get_footer(); ?>
