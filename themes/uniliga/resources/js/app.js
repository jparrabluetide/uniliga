
import MainMenu from "./mainMenu"
import Carousels from "./carousels"
import Modals from "./modals";

jQuery(function () {
  if (jQuery('#contMenuMobile1').length > 0) {
    new MainMenu()
  }

  if (jQuery(".swiperCarousel1").length > 0) {
    new Carousels().carousel1()
  }

  if (jQuery(".swiperCarousel2").length > 0) {
    new Carousels().carousel2()
  }

  if (jQuery('.modal').length > 0) {
    new Modals()
  }

});


