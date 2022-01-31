$(document).ready(function() {
    //  este formulário está na página de layout do cliente
    // Formulario de login de usuários no app
    $('.formLogin').submit((e) => {
        let formulario = e.target;

        if(!formulario.login.value || !formulario.password.value){
            e.preventDefault();
            Swal.fire('Login de Usuário', "Preencha as informações corretamente!", "error");
        } else {
            e.preventDefault();

            $.post(formulario.action, $('.formLogin').serialize())
            .done(data => {
                if(data['auth']){
                    Swal.fire("Login de Usuário", 'Usuário Logado!', 'success');
                    setTimeout(() => {
                        window.location = "/";
                    }, 2000);
                } else {
                    Swal.fire('Login de Usuário', 'Usuário Invalido!', 'error');
                }
            })
        }
    });


    //  validação de envio do formulario de cadastro
    $('#form_cadastro').submit((e) => {
        // e.preventDefault();

        console.log($('#form_cadastro').serialize());
    });
});
