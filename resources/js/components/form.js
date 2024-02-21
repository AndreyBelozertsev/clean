import {openModal, hideAllModals} from './modal.js';

export default () => ({
    response: false,

    data() {
        const inputs = Array.from(this.$el.querySelectorAll("input, textarea, select"));
        return inputs.reduce(
            (object, key) => ({ ...object, [key.name]: key.value }),
            {}
        );

    },

    async post() {
        const responseModal = document.querySelector('#modal-response');
        const responseBlock = document.querySelector('#modal-response .modal-content');
        responseBlock.innerHTML = '';
        const submitButton = this.$el.querySelector('button[type="submit"]');
        submitButton.disabled = true;

        this.response = await (
            await fetch(this.$el.getAttribute('action'), {
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    "Accept" : "application/json"
                },
                body: new FormData(this.$el),
            })
        ).json();
        if(this.response.success){
            if(this.response.next_action){
                openModal(this.response.next_action);
            }
            else{
                hideAllModals();
                openModal('modal-response');
                responseBlock.innerHTML = this.response.message;
                responseModal.addEventListener("hideModal", function(event) {
                    window.location.href = '/';
                });
            }
        }else{
            submitButton.disabled = false;
        }
        

    }
});