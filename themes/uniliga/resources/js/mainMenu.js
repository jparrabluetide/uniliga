let instance = null

export default class MainMenu {
  constructor () {
    if (!instance) {
      this.btnMobileMenu = '#btn-mobile-menu'
      this.mobileMainMenu = '#mobile-main-menu'

      instance = this
    }
    this.init()
    return instance
  }

  init () {
    jQuery(this.btnMobileMenu).on('click', () => this.toggleMobileMenu())
  }

  toggleMobileMenu () {
    jQuery(this.mobileMainMenu).toggleClass('hidden-important')
  }
}
