// validação do formulário de pedido
$(document).ready(function() {
    $('#form_cadastro').validate({
        rules: {
            cdNome: {
                required: true
            },
            cdPhone: {
                required: true
            },
            // ---------------------
            cdComplemento: {
                required: true
            },
            cdNumero: {
                required: true
            },
            cdBairro: {
                required: true
            },
            // ----------------------
            cdLogin: {
                required: true
            },
            cdSenha: {
                required: true,
                rangelength: [6, 20]
            } 
        },
        messages: {
            cdNome: {
                required: " nome é obrigatório"                
            },
            cdPhone: {
                required: " telefone é obrigatório"
            },
            // ---------------------
            cdComplemento: {
                required: " complemento deve ser preenchido"
            },
            cdNumero: {
                required: " número é obrigatório"
            },
            cdBairro: {
                required: " bairro é obrigatório"
            },
            // ----------------------
            cdLogin: {
                required: " login é obrigatório"
            },
            cdSenha: {
                required: " Senha é obrigatória",
                rangelength: " sua senha deve ter entre 6 a 20 caracteres"
            }
        }
    });
    $('#xPhone').mask("(00) 0000-00009")
    $('#xPhone').blur(function(event) {
        if ($(this).val().length == 15) {
            $('#xPhone').mask("(00) 00000-0009")
        } else {
            $('#xPhone').mask('(00) 0000-00009')
        }
    })
});

/* script da página pedido validando dados do envio de formulario do cliente*/
let form  = document.forms['form_pedido_cliente_off'];
let validate_pedido = () => {
    if(form){
        // campos do formulario pedido
        let nome = form.cNome.value;
        let phone = form.cCelular.value;
        let forma_pagamento = form.inputEst.value;
        let forma_entrega_retirada = form.exampleRadios1.checked;
        let forma_entrega_entrega = form.exampleRadios2.checked;

        // esses campos são obrigatorio caso a forma de entrega seja "Entrega"
        let complemento = form.cComp.value;
        let numero = form.cNumero.value;
        let bairro = form.cBairro.value;
        
        if(nome && phone && forma_pagamento && forma_entrega_retirada){
            // ok pra envia o formulario

            // alert_cust('success', false, 'Pedido enviado há, Pastelaria, Retirada', 2500);
            return true;
        
        } else if(nome && phone && forma_pagamento && forma_entrega_entrega && complemento && numero && bairro){
            
            // alert_cust('success', false, 'Pedido enviado há, Pastelaria, Entrega', 2500);
            return true;
            
        } else {
            // nenhum campo foi preenchido
            alert_cust('error', 'Atenção', 'Preencha os campos corretamente!', 3000);
            return false;
        }
    }    
}


    
// validação do formulario com cliente logado
let form_logado = document.forms['form_pedido_cliente_on'];
let form_pedido_cliente_on = () => {
    let forma_pagamento_on = form_logado.inputEst.value;
    
    if(form_logado){
        if(!forma_pagamento_on){
            alert_cust('error', 'Atenção', 'Preencha os campos corretamente!', 3000);
            return false;
        } else {
            return true;
        }
    }

}




function alert_cust(type, title, messagem, time){
    Swal.fire({
      icon: type,
      title: title,
      text: messagem,
      showConfirmButton: false,
      timer: time
    });
}