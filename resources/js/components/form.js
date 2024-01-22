
import Swal from 'sweetalert2'

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
            Swal.fire({
                icon: "success",
                text: this.response.message,
                showConfirmButton: true,
                confirmButtonText: 'Хорошо'
            }).then((result) => {
                //window.location.href = '/';
            });
        }
    }
});