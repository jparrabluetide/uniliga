import MicroModal from 'micromodal';

export default class Modals {
  constructor() {
    this.btnModal = '.btn-modal';
    this.modal = '.modal';
    this.modalClose = '.modal__close';

    this.modalData = {
      title: '',
      modal: '',
      videoId: '',
    };

    this.init();
  }

  init() {
    jQuery(this.btnModal).on('click', (e) => {
      e.preventDefault();
      this.openModal(e.currentTarget);
    });
  }

  openModal(btnModal) {
    this.modalData.title = jQuery(btnModal).data('title');
    this.modalData.modal = jQuery(btnModal).data('modal');
    this.modalData.videoId = jQuery(btnModal).data('videoid');

    jQuery("#" + this.modalData.modal).find('.modal__video').html(`
      <lite-youtube videoid="${this.modalData.videoId}" videotitle="${this.modalData.title}" autopause></lite-youtube>
    `);

    jQuery("#" + this.modalData.modal).find('.modal__title').text(`
      ${this.modalData.title}
    `);

    MicroModal.show(this.modalData.modal, {
      onClose: modal => {

        jQuery("#" + this.modalData.modal).find('.modal__video').html('');
        
        this.modalData.modal = '';
        this.modalData.title = '';
        this.modalData.videoId = '';
      }
    })
  }
}
