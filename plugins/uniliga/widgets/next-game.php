<?php

/**
 * Plugin Name: Widget Proximo Partido
 * Description: Muestra el próximo partido.
 */

// Evitar acceso directo
if (!defined('ABSPATH')) {
  exit;
}

class NextGameWidget extends WP_Widget
{
  public function __construct()
  {
    parent::__construct(
      'bluetide-next-game', // Base ID
      __('Next Game widget', 'bluetide'),
      array(
        'description' => __('Next game description', 'bluetide')
      )
    );
  }

  public function widget($args, $instance)
  {
    switch_to_blog($instance['siteId']);

    $args = array(
      'post_type' => 'sp_event',
      'post_status' => 'future',
      'posts_per_page' => 3,
      'order_by' => 'date',
      'order' => 'ASC',
      'tax_query' => array(
        array(
          'taxonomy' => 'sp_league',
          'field' => 'id',
          'terms' => $instance['leagueId']
        )
      )
    );

    $data = new WP_Query($args);
?>
    <?php
    $gamesData = array();
    if ($data->have_posts()):
      while ($data->have_posts()):
        $data->the_post();
        $dataId = get_the_ID();
        $teams  = array_unique(get_post_meta($dataId, 'sp_team'));
        $leagues = wp_get_post_terms($dataId, 'sp_league');
        $gameDate = get_the_time('d, M Y');
        $gameHour = get_the_time('h:i a');

        $gamesData[] = array(
          'teams' => $teams,
          'leagues' => $leagues,
          'gameDate' => $gameDate,
          'gameHour' => $gameHour,
          'dataId' => $dataId
        );

      endwhile;
      wp_reset_postdata();
    ?>
      <div class="grid grid-cols-2 grid-rows-2 gap-4 font-family-oswald">
        <div class="bg-[#003B4D] col-span-2 lg:col-span-1 row-span-2">
          <div class="flex flex-col justify-between h-full">
            <div class="">
              <h4 class="!text-white text-center !mb-0 pb-2 pt-4 uppercase !text-base md:!text-2xl font-family-oswald">Próximo partido</h4>
              <div class="px-4 w-full">
                <div class="w-full bg-[#00BED6] h-[1px] mb-5"></div>
              </div>
            </div>
            <div class="my-4 flex gap-2 justify-between items-center px-4 pb-1">
              <div class="">
                <div class="w-20 h-20 md:w-24 md:h-24 mx-auto bg-gray-300 rounded-full mb-2 flex items-center justify-center [&>img]:aspect-square [&>img]:w-16 [&>img]:object-contain">
                  <?php echo get_the_post_thumbnail($gamesData[0]['teams'][0], 'sportspress-fit-icon', array('itemprop' => 'logo')); ?>
                </div>
                <p class="text-white !mb-0 text-xs md:text-base text-center uppercase">
                  <?php echo get_the_title($gamesData[0]['teams'][0]); ?>
                </p>
              </div>
              <p class="text-white !mb-0 text-lg">VS</p>
              <div class="">
                <div class="w-20 h-20 md:w-24 md:h-24 mx-auto bg-gray-300 rounded-full mb-2 flex items-center justify-center [&>img]:aspect-square [&>img]:w-16 [&>img]:object-contain">
                  <?php echo get_the_post_thumbnail($gamesData[0]['teams'][1], 'sportspress-fit-icon', array('itemprop' => 'logo')); ?>
                </div>
                <p class="text-white !mb-0 text-xs md:text-base text-center uppercase">
                  <?php echo get_the_title($gamesData[0]['teams'][1]); ?>
                </p>
              </div>
            </div>
            <div class="flex items-center justify-between gap-4 px-4 pb-5">
              <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="41" viewBox="0 0 40 41" fill="none">
                  <mask id="mask0_17_2351" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="40" height="41">
                    <rect y="0.687012" width="40" height="40" fill="#D9D9D9" />
                  </mask>
                  <g mask="url(#mask0_17_2351)">
                    <path d="M20 24.0203C19.5278 24.0203 19.1319 23.8605 18.8125 23.5411C18.4931 23.2217 18.3333 22.8258 18.3333 22.3536C18.3333 21.8814 18.4931 21.4855 18.8125 21.1661C19.1319 20.8467 19.5278 20.6869 20 20.6869C20.4722 20.6869 20.8681 20.8467 21.1875 21.1661C21.5069 21.4855 21.6667 21.8814 21.6667 22.3536C21.6667 22.8258 21.5069 23.2217 21.1875 23.5411C20.8681 23.8605 20.4722 24.0203 20 24.0203ZM13.3333 24.0203C12.8611 24.0203 12.4653 23.8605 12.1458 23.5411C11.8264 23.2217 11.6667 22.8258 11.6667 22.3536C11.6667 21.8814 11.8264 21.4855 12.1458 21.1661C12.4653 20.8467 12.8611 20.6869 13.3333 20.6869C13.8056 20.6869 14.2014 20.8467 14.5208 21.1661C14.8403 21.4855 15 21.8814 15 22.3536C15 22.8258 14.8403 23.2217 14.5208 23.5411C14.2014 23.8605 13.8056 24.0203 13.3333 24.0203ZM26.6667 24.0203C26.1944 24.0203 25.7986 23.8605 25.4792 23.5411C25.1597 23.2217 25 22.8258 25 22.3536C25 21.8814 25.1597 21.4855 25.4792 21.1661C25.7986 20.8467 26.1944 20.6869 26.6667 20.6869C27.1389 20.6869 27.5347 20.8467 27.8542 21.1661C28.1736 21.4855 28.3333 21.8814 28.3333 22.3536C28.3333 22.8258 28.1736 23.2217 27.8542 23.5411C27.5347 23.8605 27.1389 24.0203 26.6667 24.0203ZM20 30.6869C19.5278 30.6869 19.1319 30.5272 18.8125 30.2078C18.4931 29.8883 18.3333 29.4925 18.3333 29.0203C18.3333 28.548 18.4931 28.1522 18.8125 27.8328C19.1319 27.5133 19.5278 27.3536 20 27.3536C20.4722 27.3536 20.8681 27.5133 21.1875 27.8328C21.5069 28.1522 21.6667 28.548 21.6667 29.0203C21.6667 29.4925 21.5069 29.8883 21.1875 30.2078C20.8681 30.5272 20.4722 30.6869 20 30.6869ZM13.3333 30.6869C12.8611 30.6869 12.4653 30.5272 12.1458 30.2078C11.8264 29.8883 11.6667 29.4925 11.6667 29.0203C11.6667 28.548 11.8264 28.1522 12.1458 27.8328C12.4653 27.5133 12.8611 27.3536 13.3333 27.3536C13.8056 27.3536 14.2014 27.5133 14.5208 27.8328C14.8403 28.1522 15 28.548 15 29.0203C15 29.4925 14.8403 29.8883 14.5208 30.2078C14.2014 30.5272 13.8056 30.6869 13.3333 30.6869ZM26.6667 30.6869C26.1944 30.6869 25.7986 30.5272 25.4792 30.2078C25.1597 29.8883 25 29.4925 25 29.0203C25 28.548 25.1597 28.1522 25.4792 27.8328C25.7986 27.5133 26.1944 27.3536 26.6667 27.3536C27.1389 27.3536 27.5347 27.5133 27.8542 27.8328C28.1736 28.1522 28.3333 28.548 28.3333 29.0203C28.3333 29.4925 28.1736 29.8883 27.8542 30.2078C27.5347 30.5272 27.1389 30.6869 26.6667 30.6869ZM8.33333 37.3536C7.41667 37.3536 6.63194 37.0272 5.97917 36.3744C5.32639 35.7217 5 34.9369 5 34.0203V10.6869C5 9.77026 5.32639 8.98554 5.97917 8.33276C6.63194 7.67999 7.41667 7.3536 8.33333 7.3536H10V4.02026H13.3333V7.3536H26.6667V4.02026H30V7.3536H31.6667C32.5833 7.3536 33.3681 7.67999 34.0208 8.33276C34.6736 8.98554 35 9.77026 35 10.6869V34.0203C35 34.9369 34.6736 35.7217 34.0208 36.3744C33.3681 37.0272 32.5833 37.3536 31.6667 37.3536H8.33333ZM8.33333 34.0203H31.6667V17.3536H8.33333V34.0203Z" fill="#00BED6" />
                  </g>
                </svg>
                <p class="text-white !mb-0 text-base"><?php echo $gamesData[0]['gameDate']; ?></p>
              </div>
              <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="41" viewBox="0 0 40 41" fill="none">
                  <mask id="mask0_17_2354" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="40" height="41">
                    <rect y="0.687012" width="40" height="40" fill="#D9D9D9" />
                  </mask>
                  <g mask="url(#mask0_17_2354)">
                    <path d="M25.5002 28.5203L27.8335 26.1869L21.6668 20.0203V12.3536H18.3335V21.3536L25.5002 28.5203ZM20.0002 37.3536C17.6946 37.3536 15.5279 36.9161 13.5002 36.0411C11.4724 35.1661 9.7085 33.9786 8.2085 32.4786C6.7085 30.9786 5.521 29.2147 4.646 27.1869C3.771 25.1592 3.3335 22.9925 3.3335 20.6869C3.3335 18.3814 3.771 16.2147 4.646 14.1869C5.521 12.1592 6.7085 10.3953 8.2085 8.89526C9.7085 7.39526 11.4724 6.20776 13.5002 5.33276C15.5279 4.45776 17.6946 4.02026 20.0002 4.02026C22.3057 4.02026 24.4724 4.45776 26.5002 5.33276C28.5279 6.20776 30.2918 7.39526 31.7918 8.89526C33.2918 10.3953 34.4793 12.1592 35.3543 14.1869C36.2293 16.2147 36.6668 18.3814 36.6668 20.6869C36.6668 22.9925 36.2293 25.1592 35.3543 27.1869C34.4793 29.2147 33.2918 30.9786 31.7918 32.4786C30.2918 33.9786 28.5279 35.1661 26.5002 36.0411C24.4724 36.9161 22.3057 37.3536 20.0002 37.3536ZM20.0002 34.0203C23.6946 34.0203 26.8404 32.7217 29.4377 30.1244C32.0349 27.5272 33.3335 24.3814 33.3335 20.6869C33.3335 16.9925 32.0349 13.8467 29.4377 11.2494C26.8404 8.65221 23.6946 7.3536 20.0002 7.3536C16.3057 7.3536 13.1599 8.65221 10.5627 11.2494C7.96544 13.8467 6.66683 16.9925 6.66683 20.6869C6.66683 24.3814 7.96544 27.5272 10.5627 30.1244C13.1599 32.7217 16.3057 34.0203 20.0002 34.0203Z" fill="#00BED6" />
                  </g>
                </svg>
                <p class="text-white !mb-0 text-base"><?php echo $gamesData[0]['gameHour']; ?></p>
              </div>
            </div>
            <div class="bg-gradient-to-b from-[#00BED6] to-[#003B4D] text-white py-3 px-4">
              <p class="text-white !mb-0 text-sm md:text-base text-center uppercase">
                <?php echo $gamesData[0]['leagues'][0]->name; ?>
              </p>
            </div>
          </div>
        </div>
        <div class="col-span-2 lg:col-span-1 row-span-1">
          <div class="border border-[#003B4D]">
            <div class="flex items-center justify-center gap-6 pt-2">
              <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="41" viewBox="0 0 40 41" fill="none" class="h-7 w-7">
                  <mask id="mask0_17_2351" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="40" height="41">
                    <rect y="0.687012" width="40" height="40" fill="#D9D9D9" />
                  </mask>
                  <g mask="url(#mask0_17_2351)">
                    <path d="M20 24.0203C19.5278 24.0203 19.1319 23.8605 18.8125 23.5411C18.4931 23.2217 18.3333 22.8258 18.3333 22.3536C18.3333 21.8814 18.4931 21.4855 18.8125 21.1661C19.1319 20.8467 19.5278 20.6869 20 20.6869C20.4722 20.6869 20.8681 20.8467 21.1875 21.1661C21.5069 21.4855 21.6667 21.8814 21.6667 22.3536C21.6667 22.8258 21.5069 23.2217 21.1875 23.5411C20.8681 23.8605 20.4722 24.0203 20 24.0203ZM13.3333 24.0203C12.8611 24.0203 12.4653 23.8605 12.1458 23.5411C11.8264 23.2217 11.6667 22.8258 11.6667 22.3536C11.6667 21.8814 11.8264 21.4855 12.1458 21.1661C12.4653 20.8467 12.8611 20.6869 13.3333 20.6869C13.8056 20.6869 14.2014 20.8467 14.5208 21.1661C14.8403 21.4855 15 21.8814 15 22.3536C15 22.8258 14.8403 23.2217 14.5208 23.5411C14.2014 23.8605 13.8056 24.0203 13.3333 24.0203ZM26.6667 24.0203C26.1944 24.0203 25.7986 23.8605 25.4792 23.5411C25.1597 23.2217 25 22.8258 25 22.3536C25 21.8814 25.1597 21.4855 25.4792 21.1661C25.7986 20.8467 26.1944 20.6869 26.6667 20.6869C27.1389 20.6869 27.5347 20.8467 27.8542 21.1661C28.1736 21.4855 28.3333 21.8814 28.3333 22.3536C28.3333 22.8258 28.1736 23.2217 27.8542 23.5411C27.5347 23.8605 27.1389 24.0203 26.6667 24.0203ZM20 30.6869C19.5278 30.6869 19.1319 30.5272 18.8125 30.2078C18.4931 29.8883 18.3333 29.4925 18.3333 29.0203C18.3333 28.548 18.4931 28.1522 18.8125 27.8328C19.1319 27.5133 19.5278 27.3536 20 27.3536C20.4722 27.3536 20.8681 27.5133 21.1875 27.8328C21.5069 28.1522 21.6667 28.548 21.6667 29.0203C21.6667 29.4925 21.5069 29.8883 21.1875 30.2078C20.8681 30.5272 20.4722 30.6869 20 30.6869ZM13.3333 30.6869C12.8611 30.6869 12.4653 30.5272 12.1458 30.2078C11.8264 29.8883 11.6667 29.4925 11.6667 29.0203C11.6667 28.548 11.8264 28.1522 12.1458 27.8328C12.4653 27.5133 12.8611 27.3536 13.3333 27.3536C13.8056 27.3536 14.2014 27.5133 14.5208 27.8328C14.8403 28.1522 15 28.548 15 29.0203C15 29.4925 14.8403 29.8883 14.5208 30.2078C14.2014 30.5272 13.8056 30.6869 13.3333 30.6869ZM26.6667 30.6869C26.1944 30.6869 25.7986 30.5272 25.4792 30.2078C25.1597 29.8883 25 29.4925 25 29.0203C25 28.548 25.1597 28.1522 25.4792 27.8328C25.7986 27.5133 26.1944 27.3536 26.6667 27.3536C27.1389 27.3536 27.5347 27.5133 27.8542 27.8328C28.1736 28.1522 28.3333 28.548 28.3333 29.0203C28.3333 29.4925 28.1736 29.8883 27.8542 30.2078C27.5347 30.5272 27.1389 30.6869 26.6667 30.6869ZM8.33333 37.3536C7.41667 37.3536 6.63194 37.0272 5.97917 36.3744C5.32639 35.7217 5 34.9369 5 34.0203V10.6869C5 9.77026 5.32639 8.98554 5.97917 8.33276C6.63194 7.67999 7.41667 7.3536 8.33333 7.3536H10V4.02026H13.3333V7.3536H26.6667V4.02026H30V7.3536H31.6667C32.5833 7.3536 33.3681 7.67999 34.0208 8.33276C34.6736 8.98554 35 9.77026 35 10.6869V34.0203C35 34.9369 34.6736 35.7217 34.0208 36.3744C33.3681 37.0272 32.5833 37.3536 31.6667 37.3536H8.33333ZM8.33333 34.0203H31.6667V17.3536H8.33333V34.0203Z" fill="#00BED6" />
                  </g>
                </svg>
                <p class="text-[#003B4D] !mb-0 text-base"><?php echo $gamesData[1]['gameDate']; ?></p>
              </div>
              <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="41" viewBox="0 0 40 41" fill="none" class="h-7 w-7">
                  <mask id="mask0_17_2354" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="40" height="41">
                    <rect y="0.687012" width="40" height="40" fill="#D9D9D9" />
                  </mask>
                  <g mask="url(#mask0_17_2354)">
                    <path d="M25.5002 28.5203L27.8335 26.1869L21.6668 20.0203V12.3536H18.3335V21.3536L25.5002 28.5203ZM20.0002 37.3536C17.6946 37.3536 15.5279 36.9161 13.5002 36.0411C11.4724 35.1661 9.7085 33.9786 8.2085 32.4786C6.7085 30.9786 5.521 29.2147 4.646 27.1869C3.771 25.1592 3.3335 22.9925 3.3335 20.6869C3.3335 18.3814 3.771 16.2147 4.646 14.1869C5.521 12.1592 6.7085 10.3953 8.2085 8.89526C9.7085 7.39526 11.4724 6.20776 13.5002 5.33276C15.5279 4.45776 17.6946 4.02026 20.0002 4.02026C22.3057 4.02026 24.4724 4.45776 26.5002 5.33276C28.5279 6.20776 30.2918 7.39526 31.7918 8.89526C33.2918 10.3953 34.4793 12.1592 35.3543 14.1869C36.2293 16.2147 36.6668 18.3814 36.6668 20.6869C36.6668 22.9925 36.2293 25.1592 35.3543 27.1869C34.4793 29.2147 33.2918 30.9786 31.7918 32.4786C30.2918 33.9786 28.5279 35.1661 26.5002 36.0411C24.4724 36.9161 22.3057 37.3536 20.0002 37.3536ZM20.0002 34.0203C23.6946 34.0203 26.8404 32.7217 29.4377 30.1244C32.0349 27.5272 33.3335 24.3814 33.3335 20.6869C33.3335 16.9925 32.0349 13.8467 29.4377 11.2494C26.8404 8.65221 23.6946 7.3536 20.0002 7.3536C16.3057 7.3536 13.1599 8.65221 10.5627 11.2494C7.96544 13.8467 6.66683 16.9925 6.66683 20.6869C6.66683 24.3814 7.96544 27.5272 10.5627 30.1244C13.1599 32.7217 16.3057 34.0203 20.0002 34.0203Z" fill="#00BED6" />
                  </g>
                </svg>
                <p class="text-[#003B4D] !mb-0 text-base"><?php echo $gamesData[1]['gameHour']; ?></p>
              </div>
            </div>
            <div class="px-4 w-full mt-2">
              <div class="w-full bg-[#00BED6] h-[1px] mb-3"></div>
            </div>
            <div class="my-2 flex gap-2 justify-between items-center px-4">
              <div class="">
                <div class="w-20 h-20 md:w-20 md:h-w-20 mx-auto bg-gray-300 rounded-full mb-2 flex items-center justify-center [&>img]:aspect-square [&>img]:w-16 [&>img]:object-contain">
                  <?php echo get_the_post_thumbnail($gamesData[1]['teams'][0], 'sportspress-fit-icon', array('itemprop' => 'logo')); ?>
                </div>
                <p class="text-[#003B4D] !mb-0 text-xs md:text-base text-center uppercase">
                  <?php echo get_the_title($gamesData[1]['teams'][0]); ?>
                </p>
              </div>
              <p class="text-[#003B4D] !mb-0 text-base">VS</p>
              <div class="">
                <div class="w-20 h-20 md:w-20 md:h-w-20 mx-auto bg-gray-300 rounded-full mb-2 flex items-center justify-center [&>img]:aspect-square [&>img]:w-16 [&>img]:object-contain">
                  <?php echo get_the_post_thumbnail($gamesData[1]['teams'][1], 'sportspress-fit-icon', array('itemprop' => 'logo')); ?>
                </div>
                <p class="text-[#003B4D] !mb-0 text-xs md:text-base text-center uppercase">
                  <?php echo get_the_title($gamesData[1]['teams'][1]); ?>
                </p>
              </div>
            </div>
            <div class="bg-gradient-to-b from-[#00BED6] to-[#003B4D] text-white py-2 px-4">
              <p class="text-white !mb-0 text-sm md:text-base text-center uppercase">
                <?php echo $gamesData[1]['leagues'][0]->name; ?>
              </p>
            </div>
          </div>
        </div>
        <div class="col-span-2 lg:col-span-1 row-span-1">
          <div class="border border-[#003B4D]">
            <div class="flex items-center justify-center gap-6 pt-2">
              <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="41" viewBox="0 0 40 41" fill="none" class="h-7 w-7">
                  <mask id="mask0_17_2351" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="40" height="41">
                    <rect y="0.687012" width="40" height="40" fill="#D9D9D9" />
                  </mask>
                  <g mask="url(#mask0_17_2351)">
                    <path d="M20 24.0203C19.5278 24.0203 19.1319 23.8605 18.8125 23.5411C18.4931 23.2217 18.3333 22.8258 18.3333 22.3536C18.3333 21.8814 18.4931 21.4855 18.8125 21.1661C19.1319 20.8467 19.5278 20.6869 20 20.6869C20.4722 20.6869 20.8681 20.8467 21.1875 21.1661C21.5069 21.4855 21.6667 21.8814 21.6667 22.3536C21.6667 22.8258 21.5069 23.2217 21.1875 23.5411C20.8681 23.8605 20.4722 24.0203 20 24.0203ZM13.3333 24.0203C12.8611 24.0203 12.4653 23.8605 12.1458 23.5411C11.8264 23.2217 11.6667 22.8258 11.6667 22.3536C11.6667 21.8814 11.8264 21.4855 12.1458 21.1661C12.4653 20.8467 12.8611 20.6869 13.3333 20.6869C13.8056 20.6869 14.2014 20.8467 14.5208 21.1661C14.8403 21.4855 15 21.8814 15 22.3536C15 22.8258 14.8403 23.2217 14.5208 23.5411C14.2014 23.8605 13.8056 24.0203 13.3333 24.0203ZM26.6667 24.0203C26.1944 24.0203 25.7986 23.8605 25.4792 23.5411C25.1597 23.2217 25 22.8258 25 22.3536C25 21.8814 25.1597 21.4855 25.4792 21.1661C25.7986 20.8467 26.1944 20.6869 26.6667 20.6869C27.1389 20.6869 27.5347 20.8467 27.8542 21.1661C28.1736 21.4855 28.3333 21.8814 28.3333 22.3536C28.3333 22.8258 28.1736 23.2217 27.8542 23.5411C27.5347 23.8605 27.1389 24.0203 26.6667 24.0203ZM20 30.6869C19.5278 30.6869 19.1319 30.5272 18.8125 30.2078C18.4931 29.8883 18.3333 29.4925 18.3333 29.0203C18.3333 28.548 18.4931 28.1522 18.8125 27.8328C19.1319 27.5133 19.5278 27.3536 20 27.3536C20.4722 27.3536 20.8681 27.5133 21.1875 27.8328C21.5069 28.1522 21.6667 28.548 21.6667 29.0203C21.6667 29.4925 21.5069 29.8883 21.1875 30.2078C20.8681 30.5272 20.4722 30.6869 20 30.6869ZM13.3333 30.6869C12.8611 30.6869 12.4653 30.5272 12.1458 30.2078C11.8264 29.8883 11.6667 29.4925 11.6667 29.0203C11.6667 28.548 11.8264 28.1522 12.1458 27.8328C12.4653 27.5133 12.8611 27.3536 13.3333 27.3536C13.8056 27.3536 14.2014 27.5133 14.5208 27.8328C14.8403 28.1522 15 28.548 15 29.0203C15 29.4925 14.8403 29.8883 14.5208 30.2078C14.2014 30.5272 13.8056 30.6869 13.3333 30.6869ZM26.6667 30.6869C26.1944 30.6869 25.7986 30.5272 25.4792 30.2078C25.1597 29.8883 25 29.4925 25 29.0203C25 28.548 25.1597 28.1522 25.4792 27.8328C25.7986 27.5133 26.1944 27.3536 26.6667 27.3536C27.1389 27.3536 27.5347 27.5133 27.8542 27.8328C28.1736 28.1522 28.3333 28.548 28.3333 29.0203C28.3333 29.4925 28.1736 29.8883 27.8542 30.2078C27.5347 30.5272 27.1389 30.6869 26.6667 30.6869ZM8.33333 37.3536C7.41667 37.3536 6.63194 37.0272 5.97917 36.3744C5.32639 35.7217 5 34.9369 5 34.0203V10.6869C5 9.77026 5.32639 8.98554 5.97917 8.33276C6.63194 7.67999 7.41667 7.3536 8.33333 7.3536H10V4.02026H13.3333V7.3536H26.6667V4.02026H30V7.3536H31.6667C32.5833 7.3536 33.3681 7.67999 34.0208 8.33276C34.6736 8.98554 35 9.77026 35 10.6869V34.0203C35 34.9369 34.6736 35.7217 34.0208 36.3744C33.3681 37.0272 32.5833 37.3536 31.6667 37.3536H8.33333ZM8.33333 34.0203H31.6667V17.3536H8.33333V34.0203Z" fill="#00BED6" />
                  </g>
                </svg>
                <p class="text-[#003B4D] !mb-0 text-base"><?php echo $gamesData[2]['gameDate']; ?></p>
              </div>
              <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="41" viewBox="0 0 40 41" fill="none" class="h-7 w-7">
                  <mask id="mask0_17_2354" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="40" height="41">
                    <rect y="0.687012" width="40" height="40" fill="#D9D9D9" />
                  </mask>
                  <g mask="url(#mask0_17_2354)">
                    <path d="M25.5002 28.5203L27.8335 26.1869L21.6668 20.0203V12.3536H18.3335V21.3536L25.5002 28.5203ZM20.0002 37.3536C17.6946 37.3536 15.5279 36.9161 13.5002 36.0411C11.4724 35.1661 9.7085 33.9786 8.2085 32.4786C6.7085 30.9786 5.521 29.2147 4.646 27.1869C3.771 25.1592 3.3335 22.9925 3.3335 20.6869C3.3335 18.3814 3.771 16.2147 4.646 14.1869C5.521 12.1592 6.7085 10.3953 8.2085 8.89526C9.7085 7.39526 11.4724 6.20776 13.5002 5.33276C15.5279 4.45776 17.6946 4.02026 20.0002 4.02026C22.3057 4.02026 24.4724 4.45776 26.5002 5.33276C28.5279 6.20776 30.2918 7.39526 31.7918 8.89526C33.2918 10.3953 34.4793 12.1592 35.3543 14.1869C36.2293 16.2147 36.6668 18.3814 36.6668 20.6869C36.6668 22.9925 36.2293 25.1592 35.3543 27.1869C34.4793 29.2147 33.2918 30.9786 31.7918 32.4786C30.2918 33.9786 28.5279 35.1661 26.5002 36.0411C24.4724 36.9161 22.3057 37.3536 20.0002 37.3536ZM20.0002 34.0203C23.6946 34.0203 26.8404 32.7217 29.4377 30.1244C32.0349 27.5272 33.3335 24.3814 33.3335 20.6869C33.3335 16.9925 32.0349 13.8467 29.4377 11.2494C26.8404 8.65221 23.6946 7.3536 20.0002 7.3536C16.3057 7.3536 13.1599 8.65221 10.5627 11.2494C7.96544 13.8467 6.66683 16.9925 6.66683 20.6869C6.66683 24.3814 7.96544 27.5272 10.5627 30.1244C13.1599 32.7217 16.3057 34.0203 20.0002 34.0203Z" fill="#00BED6" />
                  </g>
                </svg>
                <p class="text-[#003B4D] !mb-0 text-base"><?php echo $gamesData[2]['gameHour']; ?></p>
              </div>
            </div>
            <div class="px-4 w-full mt-2">
              <div class="w-full bg-[#00BED6] h-[1px] mb-3"></div>
            </div>
            <div class="my-2 flex gap-2 justify-between items-center px-4">
              <div class="">
                <div class="w-20 h-20 md:w-20 md:h-w-20 mx-auto bg-gray-300 rounded-full mb-2 flex items-center justify-center [&>img]:aspect-square [&>img]:w-16 [&>img]:object-contain">
                  <?php echo get_the_post_thumbnail($gamesData[2]['teams'][0], 'sportspress-fit-icon', array('itemprop' => 'logo')); ?>

                </div>
                <p class="text-[#003B4D] !mb-0 text-xs md:text-base text-center uppercase">
                  <?php echo get_the_title($gamesData[2]['teams'][0]); ?>
                </p>
              </div>
              <p class="text-[#003B4D] !mb-0 text-base">VS</p>
              <div class="">
                <div class="w-20 h-20 md:w-20 md:h-w-20 mx-auto bg-gray-300 rounded-full mb-2 flex items-center justify-center [&>img]:aspect-square [&>img]:w-16 [&>img]:object-contain">
                  <?php echo get_the_post_thumbnail($gamesData[2]['teams'][1], 'sportspress-fit-icon', array('itemprop' => 'logo')); ?>
                </div>
                <p class="text-[#003B4D] !mb-0 text-xs md:text-base text-center uppercase">
                  <?php echo get_the_title($gamesData[2]['teams'][1]); ?>
                </p>
              </div>
            </div>
            <div class="bg-gradient-to-b from-[#00BED6] to-[#003B4D] text-white py-2 px-4">
              <p class="text-white !mb-0 text-sm md:text-base text-center uppercase">
                <?php echo $gamesData[2]['leagues'][0]->name; ?>
              </p>
            </div>
          </div>
        </div>
      </div>
    <?php else: ?>
      <p>
        <?php _e('No hay próximos partidos programados.', 'bluetide'); ?>
      </p>
    <?php endif; ?>
    <?php restore_current_blog(); ?>
  <?php
  }

  public function update($new_instance, $old_instance)
  {
    $instance = array();

    switch_to_blog($new_instance['siteId']);

    $instance['siteId'] = strip_tags($new_instance['siteId']);
    $instance['leagueId'] = strip_tags($new_instance['leagueId']) ? strip_tags($new_instance['leagueId']) : 8;

    restore_current_blog();
    return $instance;
  }

  public function form($instance)
  {

    $siteId = !empty($instance['siteId']) ? $instance['siteId'] : get_current_blog_id();
    $leagueId = !empty($instance['leagueId']) ? $instance['leagueId'] : 8;
    switch_to_blog($siteId);
    // lista de ligas
    $leagues = get_terms(
      array(
        'taxonomy' => 'sp_league',
        'hide_empty' => false, // Para incluir ligas sin eventos asociados (opcional)
      )
    );

    $sites = wp_get_sites();

  ?>

    <p>
      <label for="<?php echo $this->get_field_id('siteId'); ?>"><?php _e('Site:', 'bluetide'); ?></label>
      <select class="widefat" id="<?php echo $this->get_field_id('siteId'); ?>" name="<?php echo $this->get_field_name('siteId'); ?>">
        <?php
        foreach ($sites as $site) :
          $blog_id = $site['blog_id'];
          //$domain = $site['domain'];
          //$path = $site['path'];
          $site_name = get_blog_details($blog_id)->blogname; // Obtener el nombre del sitio
          //$site_url = network_site_url($path, $domain); // Generar la URL del sitio
          $selected = ($blog_id == $siteId) ? 'selected' : '';

          echo '<option value="' . esc_attr($blog_id) . '" ' . $selected . '>' . esc_html($site_name) . '</option>';
        endforeach;
        ?>
      </select>
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('leagueId'); ?>"><?php _e('Leagues:', 'bluetide'); ?></label>
      <select class="widefat" id="<?php echo $this->get_field_id('leagueId'); ?>" name="<?php echo $this->get_field_name('leagueId'); ?>">
        <?php foreach ($leagues as $league) : $selected = ($league->term_id == $leagueId) ? 'selected' : ''; ?>
          <option value="<?php echo $league->term_id; ?>" <?php echo $selected; ?>><?php echo $league->name; ?></option>
        <?php endforeach; ?>
      </select>
    </p>
<?php
    restore_current_blog();
  }
}

register_widget('NextGameWidget');
