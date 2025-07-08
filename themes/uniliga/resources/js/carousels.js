export default class Carousels {
  carousel1 () {
    new Swiper('.swiperCarousel1', {
      preloadImages: false,
      lazy: {
        loadPrevNext: true,
        loadPrevNextAmount: 1
      },
      watchSlidesProgress: true,
      loop: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false
      },
      slidesPerView: 1,
      spaceBetween: 0,
      pagination: {
        el: '.swiperCarousel1-pagination',
        clickable: true
      }
    })
  }

  carousel2 () {
    new Swiper('.swiperCarousel2', {
      loop: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false
      },
      slidesPerView: 1,
      spaceBetween: 0,
      pagination: {
        el: '.swiperCarousel2-pagination',
        clickable: true
      }
    })
  }
}
