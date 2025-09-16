import MainMenu from './mainMenu'
import Modals from './modals';

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
  })
})(jQuery)
