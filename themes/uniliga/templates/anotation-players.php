<div class="container mx-auto px-4">
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-4">
    <div class="col-span-1">
      <div class="w-full bg-gray-300 h-[340px] md:h-[280px]">
         <img src="<?php echo get_the_post_thumbnail_url($dataId, 'medium'); ?>" alt="<?php the_title(); ?>" class="w-full !h-full object-cover object-top" />
      </div>
      <div class="bg-gradient-to-b from-[#00BED6] to-[#003B4D] py-4 px-4">
        <h4 class="text-lg font-family-oswald text-white">Lorem ipsum dolor</h4>
        <p class="text-sm font-family-roboto text-scooter-500">Lorem ipsum dolor sit amet</p>
      </div>
    </div>
  </div>
</div>
