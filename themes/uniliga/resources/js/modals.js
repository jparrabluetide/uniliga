import MicroModal from 'micromodal'

let instance = null

export default class Modals {
  constructor () {
    if (!instance) {
      this.btnModal = '.btn-modal'
      this.modal = '.modal'
      this.modalClose = '.modal__close'

      this.modalData = {
        title: '',
        modal: '',
        videoId: ''
      }
      instance = this
    }
    this.init()
    return instance
  }

  init () {
    jQuery(this.btnModal).on('click', e => {
      e.preventDefault()
      this.openModal(e.currentTarget)
    })
  }

  openModal (btnModal) {
    this.modalData.title = jQuery(btnModal).data('title')
    this.modalData.modal = jQuery(btnModal).data('modal')
    this.modalData.videoId = jQuery(btnModal).data('videoid')

    console.log(this.modalData)

    jQuery('#' + this.modalData.modal).find('.modal__video').html(`
      <iframe width="760" height="428" src="https://www.youtube.com/embed/${this.modalData.videoId}" title="${this.modalData.title}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    `)

    jQuery('#' + this.modalData.modal).find('.modal__title').text(`
      ${this.modalData.title}
    `)

    MicroModal.show(this.modalData.modal, {
      onClose: modal => {
        jQuery('#' + this.modalData.modal)
          .find('.modal__video')
          .html('')

        this.modalData.modal = ''
        this.modalData.title = ''
        this.modalData.videoId = ''
      }
    })
  }
}
