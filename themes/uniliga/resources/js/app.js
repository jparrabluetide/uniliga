import MainMenu from "./mainMenu"


;(function ($) {
  'use strict'
  // Ahora puedes usar el alias $ sin problemas
  $(document).ready(function () {
    if(jQuery('#mobile-main-menu').length){
      new MainMenu()
    }
  })
})(jQuery)
