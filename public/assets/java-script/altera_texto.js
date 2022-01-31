





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








function alert_cust(type, title, messagem, time){
    Swal.fire({
      icon: type,
      title: title,
      text: messagem,
      showConfirmButton: false,
      timer: time
    });
}
