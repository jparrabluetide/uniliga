export default class Carousels {

  carousel1() {
    new Swiper('.swiperCarousel1', {
      loop: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
      slidesPerView: 1,
      spaceBetween: 0,
      pagination: {
        el: '.swiperCarousel1-pagination',
        clickable: true,
      },

    });
  }
}
