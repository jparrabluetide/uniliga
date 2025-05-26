<div class="container mx-auto relative hidden lg:block">
  <div class="px-8 py-3 bg-scooter-500 top-0 w-full relative z-10">
    <div class="grid grid-cols-10 gap-4 items-center">
      <div class="col-span-1">
        <div class="w-[80px] h-[80px]">
          <?php if (has_custom_logo()): ?>
            <?php the_custom_logo(); ?>
          <?php endif; ?>
        </div>
      </div>
      <div class="col-span-6 xl:col-span-7">
        <?php wp_nav_menu(array('theme_location' => 'menu-sport', 'menu_id' => 'menu-sport')); ?>
      </div>
      <div class="col-span-3 xl:col-span-2">
        <div class="flex items-center gap-4">
          <?php wp_nav_menu(array('theme_location' => 'menu-2', 'menu_id' => 'menu-menu-2')); ?>
          <a href="#" class="text-white flex items-center gap-2 uppercase border border-white py-2 px-4">
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
    </div>
  </div>
</div>
