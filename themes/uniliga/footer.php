<footer class="bg-tarawera-950 w-full py-5">
  <div class="container mx-auto px-4">
    <div class="grid grid-cols-4 gap-10 lg:gap-30">
      <div class="col-span-4 md:col-span-2 xl:col-span-1">
        <h3 class="text-white text-xl font-family-oswald uppercase mb-6">Sobre Uniliga</h3>
        <?php dynamic_sidebar('footer-about'); ?>
      </div>
      <div class="col-span-4 md:col-span-2 xl:col-span-1">
        <h3 class="text-white text-xl font-family-oswald uppercase mb-6">Site map</h3>
        <a href="#" class="text-white text-base">Sobre UniLiga</a>
        <div class="w-full h-[1px] bg-scooter-500 my-4"></div>
        <ul>
          <li>
            <a href="#" class="text-white text-base">Vóley</a>
          </li>
          <li>
            <a href="#" class="text-white text-base">Baloncesto</a>
          </li>
          <li>
            <a href="#" class="text-white text-base">Fútbol</a>
          </li>
          <li>
            <a href="#" class="text-white text-base">Flag</a>
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
          <div class="col-span-1 w-[84px] h-[84px] md:w-[64px] md:h-[64px] 2xl:w-[84px] 2xl:h-[84px] bg-gray-200">
          </div>
          <div class="col-span-1 w-[84px] h-[84px] md:w-[64px] md:h-[64px] 2xl:w-[84px] 2xl:h-[84px] bg-gray-200">
          </div>
          <div class="col-span-1 w-[84px] h-[84px] md:w-[64px] md:h-[64px] 2xl:w-[84px] 2xl:h-[84px] bg-gray-200">
          </div>
          <div class="col-span-1 w-[84px] h-[84px] md:w-[64px] md:h-[64px] 2xl:w-[84px] 2xl:h-[84px] bg-gray-200">
          </div>
          <div class="col-span-1 w-[84px] h-[84px] md:w-[64px] md:h-[64px] 2xl:w-[84px] 2xl:h-[84px] bg-gray-200">
          </div>
          <div class="col-span-1 w-[84px] h-[84px] md:w-[64px] md:h-[64px] 2xl:w-[84px] 2xl:h-[84px] bg-gray-200">
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


<?php wp_footer(); ?>
</body>

</html>
