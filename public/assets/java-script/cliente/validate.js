(function () {
    'use strict'
    $('#telefone').mask("(00) 0000-00009");

    function validateForm(formsValidate){
        Array.prototype.slice.call(formsValidate)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    }

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const formsLogin = document.querySelectorAll('.needs-validation');
    const formsCadastro = document.querySelectorAll('#form_cadastro');

    validateForm(formsLogin);
    validateForm(formsCadastro);
    // Loop over them and prevent submission

})()
