[].forEach.call( document.querySelectorAll('.phone-number'), function(input) {
    let keyCode;
    function mask(event) {
        event.keyCode && (keyCode = event.keyCode);
        let pos = this.selectionStart;

        if (pos < 1) event.preventDefault();
        let matrix = "+7 (___) ___ ____",
            i = 0,
            def = matrix.replace(/\D/g, ""),
            val = this.value.replace(/\D/g, ""),
            new_value = matrix.replace(/[_\d]/g, function(a) {
                return i < val.length ? val.charAt(i++) || def.charAt(i) : a
            });
        i = new_value.indexOf("_");
        if (i != -1) {
            i < 1 && (i = 1);
            new_value = new_value.slice(0, i)
        }
        let reg = matrix.substr(0, this.value.length).replace(/_+/g,
            function(a) {
                return "\\d{0," + a.length + "}"
            }).replace(/[+()]/g, "\\$&");
        reg = new RegExp("^" + reg + "$");
       
        if(document.getElementById('submit')){
            if(new_value.length == 17){
                document.getElementById('submit').disabled = false;
            }else{
                document.getElementById('submit').setAttribute('disabled', 'disabled');
            }
        }
     
        if (!reg.test(this.value) || this.value.length < 1 || keyCode > 47 && keyCode < 58) this.value = new_value;
        if (event.type == "blur" && this.value.length < 1)  this.value = ""
    }

    input.addEventListener("input", mask, false);
    input.addEventListener("focus", mask, false);
    input.addEventListener("blur", mask, false);
    input.addEventListener("keydown", mask, false)

});