let openmodal = document.querySelectorAll('.modal-open-button');
for (let i = 0; i < openmodal.length; i++) {
  openmodal[i].addEventListener('click', function(e){
    e.preventDefault();
    openModal(e.target.dataset.modal);
  })
}

let closemodal = document.querySelectorAll('.modal-close');
for (let i = 0; i < closemodal.length; i++) {
    closemodal[i].addEventListener('click', function(e){
        hideModal(e.target.dataset.modal);
    });
}

export function openModal(id) {
    hideAllModals();
    const modal = document.querySelector(`#${id}`);
    if(modal){
        const body = document.querySelector('body');
        modal.classList.add('modal-open');
        modal.style.pointerEvents = 'auto';
        modal.style.opacity = '1';

        body.classList.add('modal-active');
        let overlay = modal.querySelector('.modal-overlay');
        modal.addEventListener('click', function(e) {
            if( e.target == overlay){
                hideModal(id)
            }   
        });

        document.addEventListener('keydown', function(e) {
            if (e.keyCode == 27) {
                hideModal(id)
            }
        });
    }
}

export function hideModal(id) {
    const modal = document.querySelector(`#${id}`);
    if(modal){
        const body = document.querySelector('body');
        modal.classList.remove('modal-open');
        modal.style.pointerEvents = 'none';
        modal.style.opacity = '0';
        body.classList.remove('modal-active');

        modal.dispatchEvent(new CustomEvent("hideModal", {
            detail: { id: id }
        }));
    }
}

export function hideAllModals() {
    const modals = document.querySelectorAll('.modal-open');
    for (let i = 0; i < modals.length; i++) {
        hideModal( modals[i].id );
    }
}

