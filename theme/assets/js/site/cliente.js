 // formulário de cadastro de cliente
 $(document).ready(function() {

    $('.telefone_cliente').mask('(00) 00000-0000');

    let inpt = document.querySelector("#numero");
    
     const edit_field = (e) => {
         // string
         inpt.value = inpt.value.replace('/\D\g/', '');
     }
     inpt.addEventListener('input', edit_field);

     const valid = (e) => {
         let form = e.target;

         let fieldCel = form.celular.value.replace('(', '').replace(')', '').replace(' ', '');
         if (!form.nome.value || !form.bairro.value || !form.numero.value ||
             !form.complemento.value || !form.user_login.value ||
             !form.user_senha.value
         ) {
             e.preventDefault();
             Swal.fire('formulario invalido')
         }

         if (fieldCel.length != 12) {
             e.preventDefault();
             Swal.fire('campo celular incorreto')
         }

         if (!Number.isInteger(+form.numero.value)) {
             e.preventDefault();
             Swal.fire('Campo número incorreto')
         }

         if (form.user_senha.value.length < 5) {
             e.preventDefault();
             Swal.fire('Error: a senha deve ter acima 5 caracteres')
         }

     }
     document.getElementById('form_cadastro')
         .addEventListener('submit', valid)

     //  $('#form_cadastro').on('submit', function(e) {
     //      // e.preventDefault();
     //      const forms = e.target;

     //      let data = [...forms];
     //      let message = "preencha os campos corretamente!!!";
     //      let erro = false;

     //      for (let item of data) {
     //          switch (item.type) {
     //              case 'text':
     //              case 'number':
     //              case 'password':
     //                  if (!item.value) {
     //                      erro = true;
     //                      message = "preencha os campos corretamente!!!";
     //                  }
     //                  if (item.type === 'password') {
     //                      if (item.value.length < 6 || item.value.length > 20) {
     //                          erro = true
     //                          message = "Campo senha invalido para cadastra cliente";
     //                      }
     //                  }
     //          }
     //      }
     //      if (erro) {
     //          e.preventDefault();
     //          Swal.fire(message);
     //      }
     //  });

 });
