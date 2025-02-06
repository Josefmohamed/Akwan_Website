import {allowPageScroll} from "../functions/prevent_allowPageScroll";

export function initModal() {
  const customModalEl = document.querySelector('#custom-modal');
  if (customModalEl) {
    const customModalInner = customModalEl.querySelector('.custom-modal-inner');
    const customModalContent = customModalInner.querySelector('.custom-modal-content');
    const closeModalElm = customModalInner.querySelector('.close-modal');

    const closeModal = (e) => {
      if (e && e.target.classList.contains('contact-form-title')) return;
      // region allow page scroll
      allowPageScroll()
      // endregion allow page scroll
      customModalEl.classList.remove('modal-active');
      setTimeout(() => {
        customModalContent.innerHTML = '';

        customModalEl.classList.remove('custom-modal-text', 'custom-modal-video', 'custom-modal-contact');
      }, 300)
    }

    const keyHandler = (e) => {
      if (e.key === 'Escape') {
        closeModal();
      }
    }
    window.addEventListener('keydown', keyHandler)

    customModalEl?.addEventListener('click', closeModal);
    customModalInner?.addEventListener('click', e => e.stopPropagation());
    closeModalElm?.addEventListener('click', closeModal);
  }
}
