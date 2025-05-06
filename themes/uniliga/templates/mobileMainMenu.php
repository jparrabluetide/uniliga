<header class="w-full bg-tarawera-950 py-2 block lg:hidden">
  <div class="container mx-auto px-4">
    <div class="flex items-center justify-between">
      <div class="">
        <a href="<?php echo esc_url(home_url('/')); ?>">
          <img src="<?php echo get_template_directory_uri(); ?>/images/icono-mobile-uniliga.png" alt="Logo Uniliga">
        </a>
      </div>
      <div class="relative">
        <div class="text-white" id="btnMobileToggleMenu">
          <svg width="30px" height="30px" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path d="M4 6H20M4 12H20M4 18H20" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </div>
        <div class="absolute z-10 top-10 right-0 bg-white min-w-2xs shadow-2xl hidden" id="contMenuMobile1">
          <?php wp_nav_menu(array('theme_location' => 'menu-1', 'menu_id' => 'menu-mobile-1')); ?>
          <?php wp_nav_menu(array('theme_location' => 'menu-2', 'menu_id' => 'menu-mobile-2')); ?>
        </div>
      </div>
    </div>
  </div>
</header>
