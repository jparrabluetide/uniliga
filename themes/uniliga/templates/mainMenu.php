<header class="w-full bg-tarawera-950 hidden lg:block">
  <div class="container mx-auto px-4 relative py-6 flex items-center justify-between">
    <?php wp_nav_menu(array('theme_location' => 'menu-1', 'menu_id' => 'menu-menu-1')); ?>
    <div class="bg-shape-menu">
      <div class="w-[100px] h-[100px] mx-auto my-4">
        <?php if (has_custom_logo()): ?>
          <?php the_custom_logo(); ?>
        <?php endif; ?>
      </div>
    </div>
    <div class="flex items-center gap-4">
      <?php wp_nav_menu(array('theme_location' => 'menu-2', 'menu_id' => 'menu-menu-2')); ?>
      <a href="#newsletterFooter" class="text-white flex items-center gap-2 uppercase border border-white py-2 px-4">
        <span class="font-family-oswald">Suscríbete</span>
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <mask id="mask0_147_76" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
            <rect width="24" height="24" fill="white" />
          </mask>
          <g mask="url(#mask0_147_76)">
            <path d="M4 20C3.45 20 2.97917 19.8042 2.5875 19.4125C2.19583 19.0208 2 18.55 2 18V6C2 5.45 2.19583 4.97917 2.5875 4.5875C2.97917 4.19583 3.45 4 4 4H20C20.55 4 21.0208 4.19583 21.4125 4.5875C21.8042 4.97917 22 5.45 22 6V18C22 18.55 21.8042 19.0208 21.4125 19.4125C21.0208 19.8042 20.55 20 20 20H4ZM12 13L20 8V6L12 11L4 6V8L12 13Z" fill="white" />
          </g>
        </svg>
      </a>
    </div>
  </div>
</header>
