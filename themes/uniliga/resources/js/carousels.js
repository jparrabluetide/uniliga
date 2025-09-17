let instance = null

export default class Carousels {
  constructor () {
    if (!instance) {
      this.carousel1_html = '.carousel-1'
      instance = this
    }

    return instance
  }

  carousel1 () {
    jQuery(this.carousel1_html).owlCarousel({
      loop: true,
      margin: 0,
      nav: true,
      autoplay: true,
      autoplayTimeout: 10000,
      autoplayHoverPause: true,
      responsiveClass: true,
      smartSpeed: 1500,
      responsive: {
        0: {
          items: 1
        }
      }
    })
  }
}
