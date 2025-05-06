export default class MainMenu {
  constructor() {
    this.contMainMenu = '#contMenuMobile1';
    this.btnMobileToggleMenu = '#btnMobileToggleMenu';

    this.init()
  }

  init() {
    jQuery(this.btnMobileToggleMenu).on('click', () => {
      jQuery(this.contMainMenu).toggleClass('hidden')
    })
  }
}
