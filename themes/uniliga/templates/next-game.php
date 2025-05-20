<div class="grid grid-cols-2 grid-rows-2 gap-4">
  <div class="bg-[#003B4D] col-span-2 lg:col-span-1 row-span-2">
    <div class="flex flex-col justify-between h-full">
      <div class="">
        <h4 class="!text-white text-center !mb-0 pb-2 pt-4 uppercase !text-base md:!text-2xl">Próximo partido</h4>
        <div class="px-4 w-full">
          <div class="w-full bg-[#00BED6] h-[1px] mb-5"></div>
        </div>
      </div>
      <div class="my-4 flex gap-2 justify-between items-center px-4 pb-1">
        <div class="">
          <div class="w-20 h-20 md:w-24 md:h-24 mx-auto bg-gray-300 rounded-full mb-2 flex items-center justify-center [&>img]:aspect-square [&>img]:w-16 [&>img]:object-contain">
            <?php echo get_the_post_thumbnail($gamesData[0]['teams'][0], 'sportspress-fit-icon', array('itemprop' => 'logo')); ?>

          </div>
          <p class="text-white !mb-0 text-xs md:text-lg text-center uppercase">
            <?php echo get_the_title($gamesData[0]['teams'][0]); ?>
          </p>
        </div>
        <p class="text-white !mb-0 text-lg">VS</p>
        <div class="">
          <div class="w-20 h-20 md:w-24 md:h-24 mx-auto bg-gray-300 rounded-full mb-2 flex items-center justify-center [&>img]:aspect-square [&>img]:w-16 [&>img]:object-contain">
            <?php echo get_the_post_thumbnail($gamesData[0]['teams'][1], 'sportspress-fit-icon', array('itemprop' => 'logo')); ?>
          </div>
          <p class="text-white !mb-0 text-xs md:text-lg text-center uppercase">
            <?php echo get_the_title($gamesData[0]['teams'][1]); ?>
          </p>
        </div>
      </div>
      <div class="flex items-center justify-between gap-4 px-4 pb-5">
        <div class="flex items-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="40" height="41" fill="none" class="h-7 w-7">
            <mask id="a" width="40" height="41" x="0" y="0" maskUnits="userSpaceOnUse" style="mask-type:alpha">
              <path fill="#D9D9D9" d="M0 .687h40v40H0z" />
            </mask>
            <g mask="url(#a)">
              <path fill="#00BED6" d="M20 24.02c-.472 0-.868-.16-1.188-.479-.319-.32-.479-.715-.479-1.187 0-.473.16-.869.48-1.188.319-.32.715-.48 1.187-.48.472 0 .868.16 1.188.48.319.32.479.715.479 1.188 0 .472-.16.868-.48 1.187-.319.32-.715.48-1.187.48Zm-6.667 0c-.472 0-.868-.16-1.187-.479-.32-.32-.48-.715-.48-1.187 0-.473.16-.869.48-1.188.32-.32.715-.48 1.187-.48.473 0 .868.16 1.188.48.32.32.479.715.479 1.188 0 .472-.16.868-.48 1.187-.319.32-.714.48-1.187.48Zm13.334 0c-.473 0-.868-.16-1.188-.479-.32-.32-.479-.715-.479-1.187 0-.473.16-.869.48-1.188.319-.32.714-.48 1.187-.48.472 0 .868.16 1.187.48.32.32.48.715.48 1.188 0 .472-.16.868-.48 1.187-.32.32-.715.48-1.187.48ZM20 30.687c-.472 0-.868-.16-1.188-.48-.319-.319-.479-.715-.479-1.187 0-.472.16-.868.48-1.187.319-.32.715-.48 1.187-.48.472 0 .868.16 1.188.48.319.32.479.715.479 1.187 0 .473-.16.868-.48 1.188-.319.32-.715.479-1.187.479Zm-6.667 0c-.472 0-.868-.16-1.187-.48-.32-.319-.48-.715-.48-1.187 0-.472.16-.868.48-1.187.32-.32.715-.48 1.187-.48.473 0 .868.16 1.188.48.32.32.479.715.479 1.187 0 .473-.16.868-.48 1.188-.319.32-.714.479-1.187.479Zm13.334 0c-.473 0-.868-.16-1.188-.48-.32-.319-.479-.715-.479-1.187 0-.472.16-.868.48-1.187.319-.32.714-.48 1.187-.48.472 0 .868.16 1.187.48.32.32.48.715.48 1.187 0 .473-.16.868-.48 1.188-.32.32-.715.479-1.187.479ZM8.333 37.354a3.21 3.21 0 0 1-2.354-.98A3.21 3.21 0 0 1 5 34.02V10.687c0-.917.326-1.701.98-2.354a3.21 3.21 0 0 1 2.353-.98H10V4.02h3.333v3.334h13.334V4.02H30v3.334h1.667a3.21 3.21 0 0 1 2.354.979A3.21 3.21 0 0 1 35 10.687V34.02a3.21 3.21 0 0 1-.98 2.354 3.21 3.21 0 0 1-2.353.98H8.333Zm0-3.334h23.334V17.354H8.333V34.02Z" />
            </g>
          </svg>
          <p class="text-white !mb-0 text-base"><?php echo $gamesData[0]['gameDate']; ?></p>
        </div>
        <div class="flex items-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="40" height="41" fill="none">
            <mask id="a" width="40" height="41" x="0" y="0" maskUnits="userSpaceOnUse" style="mask-type:alpha">
              <path fill="#D9D9D9" d="M0 .687h40v40H0z" />
            </mask>
            <g mask="url(#a)">
              <path fill="#00BED6" d="m25.5 28.52 2.334-2.333-6.167-6.167v-7.666h-3.334v9L25.5 28.52ZM20 37.354c-2.305 0-4.472-.438-6.5-1.313-2.028-.875-3.791-2.062-5.291-3.562-1.5-1.5-2.688-3.264-3.563-5.292s-1.313-4.195-1.313-6.5c0-2.306.438-4.472 1.313-6.5.875-2.028 2.063-3.792 3.563-5.292s3.263-2.687 5.291-3.562c2.028-.875 4.195-1.313 6.5-1.313 2.306 0 4.472.438 6.5 1.313 2.028.875 3.792 2.062 5.292 3.562s2.687 3.264 3.562 5.292 1.313 4.194 1.313 6.5c0 2.305-.438 4.472-1.313 6.5-.875 2.028-2.062 3.792-3.562 5.292s-3.264 2.687-5.292 3.562-4.194 1.313-6.5 1.313Zm0-3.334c3.695 0 6.84-1.298 9.438-3.896 2.597-2.597 3.896-5.743 3.896-9.437 0-3.695-1.3-6.84-3.896-9.438C26.84 8.652 23.695 7.354 20 7.354c-3.694 0-6.84 1.298-9.437 3.895-2.598 2.598-3.896 5.743-3.896 9.438 0 3.694 1.298 6.84 3.896 9.437C13.16 32.722 16.306 34.02 20 34.02Z" />
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
          <svg xmlns="http://www.w3.org/2000/svg" width="40" height="41" fill="none">
            <mask id="a" width="40" height="41" x="0" y="0" maskUnits="userSpaceOnUse" style="mask-type:alpha">
              <path fill="#D9D9D9" d="M0 .687h40v40H0z" />
            </mask>
            <g mask="url(#a)">
              <path fill="#00BED6" d="M20 24.02c-.472 0-.868-.16-1.188-.479-.319-.32-.479-.715-.479-1.187 0-.473.16-.869.48-1.188.319-.32.715-.48 1.187-.48.472 0 .868.16 1.188.48.319.32.479.715.479 1.188 0 .472-.16.868-.48 1.187-.319.32-.715.48-1.187.48Zm-6.667 0c-.472 0-.868-.16-1.187-.479-.32-.32-.48-.715-.48-1.187 0-.473.16-.869.48-1.188.32-.32.715-.48 1.187-.48.473 0 .868.16 1.188.48.32.32.479.715.479 1.188 0 .472-.16.868-.48 1.187-.319.32-.714.48-1.187.48Zm13.334 0c-.473 0-.868-.16-1.188-.479-.32-.32-.479-.715-.479-1.187 0-.473.16-.869.48-1.188.319-.32.714-.48 1.187-.48.472 0 .868.16 1.187.48.32.32.48.715.48 1.188 0 .472-.16.868-.48 1.187-.32.32-.715.48-1.187.48ZM20 30.687c-.472 0-.868-.16-1.188-.48-.319-.319-.479-.715-.479-1.187 0-.472.16-.868.48-1.187.319-.32.715-.48 1.187-.48.472 0 .868.16 1.188.48.319.32.479.715.479 1.187 0 .473-.16.868-.48 1.188-.319.32-.715.479-1.187.479Zm-6.667 0c-.472 0-.868-.16-1.187-.48-.32-.319-.48-.715-.48-1.187 0-.472.16-.868.48-1.187.32-.32.715-.48 1.187-.48.473 0 .868.16 1.188.48.32.32.479.715.479 1.187 0 .473-.16.868-.48 1.188-.319.32-.714.479-1.187.479Zm13.334 0c-.473 0-.868-.16-1.188-.48-.32-.319-.479-.715-.479-1.187 0-.472.16-.868.48-1.187.319-.32.714-.48 1.187-.48.472 0 .868.16 1.187.48.32.32.48.715.48 1.187 0 .473-.16.868-.48 1.188-.32.32-.715.479-1.187.479ZM8.333 37.354a3.21 3.21 0 0 1-2.354-.98A3.21 3.21 0 0 1 5 34.02V10.687c0-.917.326-1.701.98-2.354a3.21 3.21 0 0 1 2.353-.98H10V4.02h3.333v3.334h13.334V4.02H30v3.334h1.667a3.21 3.21 0 0 1 2.354.979A3.21 3.21 0 0 1 35 10.687V34.02a3.21 3.21 0 0 1-.98 2.354 3.21 3.21 0 0 1-2.353.98H8.333Zm0-3.334h23.334V17.354H8.333V34.02Z" />
            </g>
          </svg>
          <p class="text-[#003B4D] !mb-0 text-base"><?php echo $gamesData[1]['gameDate']; ?></p>
        </div>
        <div class="flex items-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="40" height="41" fill="none">
            <mask id="a" width="40" height="41" x="0" y="0" maskUnits="userSpaceOnUse" style="mask-type:alpha">
              <path fill="#D9D9D9" d="M0 .687h40v40H0z" />
            </mask>
            <g mask="url(#a)">
              <path fill="#00BED6" d="m25.5 28.52 2.334-2.333-6.167-6.167v-7.666h-3.334v9L25.5 28.52ZM20 37.354c-2.305 0-4.472-.438-6.5-1.313-2.028-.875-3.791-2.062-5.291-3.562-1.5-1.5-2.688-3.264-3.563-5.292s-1.313-4.195-1.313-6.5c0-2.306.438-4.472 1.313-6.5.875-2.028 2.063-3.792 3.563-5.292s3.263-2.687 5.291-3.562c2.028-.875 4.195-1.313 6.5-1.313 2.306 0 4.472.438 6.5 1.313 2.028.875 3.792 2.062 5.292 3.562s2.687 3.264 3.562 5.292 1.313 4.194 1.313 6.5c0 2.305-.438 4.472-1.313 6.5-.875 2.028-2.062 3.792-3.562 5.292s-3.264 2.687-5.292 3.562-4.194 1.313-6.5 1.313Zm0-3.334c3.695 0 6.84-1.298 9.438-3.896 2.597-2.597 3.896-5.743 3.896-9.437 0-3.695-1.3-6.84-3.896-9.438C26.84 8.652 23.695 7.354 20 7.354c-3.694 0-6.84 1.298-9.437 3.895-2.598 2.598-3.896 5.743-3.896 9.438 0 3.694 1.298 6.84 3.896 9.437C13.16 32.722 16.306 34.02 20 34.02Z" />
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
          <svg xmlns="http://www.w3.org/2000/svg" width="40" height="41" fill="none">
            <mask id="a" width="40" height="41" x="0" y="0" maskUnits="userSpaceOnUse" style="mask-type:alpha">
              <path fill="#D9D9D9" d="M0 .687h40v40H0z" />
            </mask>
            <g mask="url(#a)">
              <path fill="#00BED6" d="M20 24.02c-.472 0-.868-.16-1.188-.479-.319-.32-.479-.715-.479-1.187 0-.473.16-.869.48-1.188.319-.32.715-.48 1.187-.48.472 0 .868.16 1.188.48.319.32.479.715.479 1.188 0 .472-.16.868-.48 1.187-.319.32-.715.48-1.187.48Zm-6.667 0c-.472 0-.868-.16-1.187-.479-.32-.32-.48-.715-.48-1.187 0-.473.16-.869.48-1.188.32-.32.715-.48 1.187-.48.473 0 .868.16 1.188.48.32.32.479.715.479 1.188 0 .472-.16.868-.48 1.187-.319.32-.714.48-1.187.48Zm13.334 0c-.473 0-.868-.16-1.188-.479-.32-.32-.479-.715-.479-1.187 0-.473.16-.869.48-1.188.319-.32.714-.48 1.187-.48.472 0 .868.16 1.187.48.32.32.48.715.48 1.188 0 .472-.16.868-.48 1.187-.32.32-.715.48-1.187.48ZM20 30.687c-.472 0-.868-.16-1.188-.48-.319-.319-.479-.715-.479-1.187 0-.472.16-.868.48-1.187.319-.32.715-.48 1.187-.48.472 0 .868.16 1.188.48.319.32.479.715.479 1.187 0 .473-.16.868-.48 1.188-.319.32-.715.479-1.187.479Zm-6.667 0c-.472 0-.868-.16-1.187-.48-.32-.319-.48-.715-.48-1.187 0-.472.16-.868.48-1.187.32-.32.715-.48 1.187-.48.473 0 .868.16 1.188.48.32.32.479.715.479 1.187 0 .473-.16.868-.48 1.188-.319.32-.714.479-1.187.479Zm13.334 0c-.473 0-.868-.16-1.188-.48-.32-.319-.479-.715-.479-1.187 0-.472.16-.868.48-1.187.319-.32.714-.48 1.187-.48.472 0 .868.16 1.187.48.32.32.48.715.48 1.187 0 .473-.16.868-.48 1.188-.32.32-.715.479-1.187.479ZM8.333 37.354a3.21 3.21 0 0 1-2.354-.98A3.21 3.21 0 0 1 5 34.02V10.687c0-.917.326-1.701.98-2.354a3.21 3.21 0 0 1 2.353-.98H10V4.02h3.333v3.334h13.334V4.02H30v3.334h1.667a3.21 3.21 0 0 1 2.354.979A3.21 3.21 0 0 1 35 10.687V34.02a3.21 3.21 0 0 1-.98 2.354 3.21 3.21 0 0 1-2.353.98H8.333Zm0-3.334h23.334V17.354H8.333V34.02Z" />
            </g>
          </svg>
          <p class="text-[#003B4D] !mb-0 text-base"><?php echo $gamesData[2]['gameDate']; ?></p>
        </div>
        <div class="flex items-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="40" height="41" fill="none">
            <mask id="a" width="40" height="41" x="0" y="0" maskUnits="userSpaceOnUse" style="mask-type:alpha">
              <path fill="#D9D9D9" d="M0 .687h40v40H0z" />
            </mask>
            <g mask="url(#a)">
              <path fill="#00BED6" d="m25.5 28.52 2.334-2.333-6.167-6.167v-7.666h-3.334v9L25.5 28.52ZM20 37.354c-2.305 0-4.472-.438-6.5-1.313-2.028-.875-3.791-2.062-5.291-3.562-1.5-1.5-2.688-3.264-3.563-5.292s-1.313-4.195-1.313-6.5c0-2.306.438-4.472 1.313-6.5.875-2.028 2.063-3.792 3.563-5.292s3.263-2.687 5.291-3.562c2.028-.875 4.195-1.313 6.5-1.313 2.306 0 4.472.438 6.5 1.313 2.028.875 3.792 2.062 5.292 3.562s2.687 3.264 3.562 5.292 1.313 4.194 1.313 6.5c0 2.305-.438 4.472-1.313 6.5-.875 2.028-2.062 3.792-3.562 5.292s-3.264 2.687-5.292 3.562-4.194 1.313-6.5 1.313Zm0-3.334c3.695 0 6.84-1.298 9.438-3.896 2.597-2.597 3.896-5.743 3.896-9.437 0-3.695-1.3-6.84-3.896-9.438C26.84 8.652 23.695 7.354 20 7.354c-3.694 0-6.84 1.298-9.437 3.895-2.598 2.598-3.896 5.743-3.896 9.438 0 3.694 1.298 6.84 3.896 9.437C13.16 32.722 16.306 34.02 20 34.02Z" />
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
