import MainMenu from './mainMenu'
import Modals from './modals';
import Carousels from './carousels'

;(function ($) {
  'use strict'
  // Ahora puedes usar el alias $ sin problemas
  $(document).ready(function () {
    if (jQuery('#mobile-main-menu').length) {
      new MainMenu()
    }
    if (jQuery('.modal').length > 0) {
      new Modals()
    }
    if( jQuery('.carousel-1').length > 0) {
      new Carousels().carousel1()
    }
  })
})(jQuery)
