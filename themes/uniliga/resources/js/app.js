import MainMenu from "./mainMenu"
import Carousels from "./carousels"

jQuery(function () {
  if (jQuery('#contMenuMobile1').length > 0) {
    new MainMenu()
  }

  if (jQuery(".swiperCarousel1").length > 0) {
    new Carousels().carousel1()
  }
});

