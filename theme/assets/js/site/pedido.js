//  implementação de js na pagina pedido no elemento que controla etapas de pedido
// elementos de lista <li>
const liPastel = document.querySelector("li#liPastel");
const liBebida = document.querySelector("li#liBebida");
const liDados_cliente = document.querySelector("li#liDados_Cliente");

// elementos de bloco <div>
let div_pastel = document.querySelector("div#divPastel");
let div_bebidas = document.querySelector("div#divBebidas");
let div_dados_cliente = document.querySelector("div#divDadosCliente");

const displayActive = 'block',
    displayNoActive = 'none',
    active = 'rgb(255, 193, 7)',
    notActive = 'rgb(255, 255, 255)';

// action
const etapa_add_pastel = () => {
    if (div_pastel.style.display === displayActive) {
        div_bebidas.style.display = displayNoActive;
        div_dados_cliente.style.display = displayNoActive;
    } else if (div_pastel.style.display !== displayActive) {
        div_pastel.style.display = displayActive;
        div_dados_cliente.style.display = displayNoActive;
        div_bebidas.style.display = displayNoActive;
    }
}
const etapa_add_bebida = () => {
    if (div_bebidas.style.display === displayActive) {
        div_pastel.style.display = displayNoActive;
        div_dados_cliente.style.display = displayNoActive;
    } else if (div_bebidas.style.display !== displayActive) {
        div_bebidas.style.display = displayActive;
        div_pastel.style.display = displayNoActive;
        div_dados_cliente.style.display = displayNoActive;
    }
}
const etapa_dados_cliente = () => {
    if (div_dados_cliente.style.display === displayActive) {
        div_bebidas.style.display = displayNoActive;
        div_pastel.style.display = displayNoActive;
    } else if (div_dados_cliente.style.display !== displayActive) {
        div_bebidas.style.display = displayNoActive;
        div_pastel.style.display = displayNoActive;
        div_dados_cliente.style.display = displayActive;
    }
}

// function manipulador de cores e display de elementos da DOM
const mudaListaCorBackgroup = (element) => {
        liPastel.addEventListener('click', function(e) {
            e.preventDefault();
            etapa_add_pastel();
            if (liPastel.style.background === active) {
                liPastel.style.background = notActive;
                liBebida.style.background = notActive;
                liDados_cliente.style.background = notActive;
            } else if (liPastel.style.background === notActive) {
                liPastel.style.background = active;
                liBebida.style.background = notActive;
                liDados_cliente.style.background = notActive;
            }
        });
        liBebida.addEventListener('click', function(e) {
            e.preventDefault();
            etapa_add_bebida();
            if (liBebida.style.background === notActive) {
                liBebida.style.background = active;
                liPastel.style.background = notActive;
                liDados_cliente.style.background = notActive;
            } else {
                liBebida.style.background = active;
                liPastel.style.background = notActive;
                liDados_cliente.style.background = notActive;
            }
        });
        liDados_cliente.addEventListener('click', function(e) {
            e.preventDefault();
            etapa_dados_cliente();
            if (liDados_cliente.style.background === notActive) {
                liDados_cliente.style.background = active;
                liPastel.style.background = notActive;
                liBebida.style.background = notActive;
            } else {
                liDados_cliente.style.background = active;
                liBebida.style.background = notActive;
                liPastel.style.background = notActive;
            }
        });
    } // end mudaListaCorBackgroup()


// escuta de click
if (liPastel) {
    liPastel.style.background = active;
    mudaListaCorBackgroup('liPastel');
}
if (liBebida) {
    mudaListaCorBackgroup('liBebida');
}
if (liDados_cliente) {
    mudaListaCorBackgroup('liDados_Cliente');
}

//  ---------------------------------------------------



// script do formulario de dados do cliente

$("form#form_pedido_dados_cliente").on('submit', (e) => {
    const formData = e.target;
    // console.log(formData.forma_entrega.value);

    if (formData.forma_entrega.value) {
        switch (formData.forma_entrega.value) {
            case 'Retirada':
                if (!formData.nome.value ||
                    !formData.telefone.value ||
                    !formData.forma_entrega.value ||
                    !formData.forma_pagamento.value
                ) {
                    e.preventDefault();
                    alert_cust('error', 'Solicitação Pedido', 'formulario invalido', 3000);
                }
                break;
            case 'Entrega':
                if (!formData.nome.value ||
                    !formData.telefone.value ||
                    !formData.bairro.value ||
                    !formData.numero.value ||
                    !formData.complemento.value ||
                    !formData.forma_entrega.value ||
                    !formData.forma_pagamento.value
                ) {
                    e.preventDefault();
                    alert_cust('error', 'Solicitação Pedido', 'formulario invalido', 3000);
                }
                break;
            default:
                alert_cust('error', 'Solicitação Pedido', 'formulario invalido', 3000);
        }
    }
});