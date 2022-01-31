// uls/lis
let pastel = document.querySelector('#liPastel');
let bebida = document.querySelector('#liBebida');
let dadosCliente = document.querySelector('#liDados_cliente');


// forms
let divPastel = document.querySelector("#div_pastel");
let divBebidas = document.querySelector("#div_bebidas");
let divDadosCliente = document.querySelector("#div_dados_cliente");


// a primeira li ja começa ativa com a por e o display da div visivel
if (pastel) {
    pastel.style.background = "#FFC107";
}

if (pastel) {
    pastel.addEventListener('click', (event) => {

        if (divPastel.style.display == 'none') {
            pastel.style.background = "#FFC107";
            divPastel.style.display = 'flex';
        } else {
            pastel.style.background = "white";
            divPastel.style.display = 'none';
        }

        // altera status dos elementos adjacentes
        bebida.style.background = "white";
        divBebidas.style.display = 'none';

        dadosCliente.style.background = "white";
        divDadosCliente.style.display = 'none';

    });
}

if (bebida) {
    // formulario bebidas
    bebida.addEventListener('click', (event) => {

        if (divBebidas.style.display == "none") {
            bebida.style.background = "#FFC107";
            divBebidas.style.display = 'flex';
        } else {
            bebida.style.background = "white";
            divBebidas.style.display = 'none';
        }

        // altera status dos elementos adjacentes
        pastel.style.background = "white";
        divPastel.style.display = 'none';

        dadosCliente.style.background = "white";
        divDadosCliente.style.display = 'none';
    });
}

if (dadosCliente) {
    // formulario dados do cliente
    dadosCliente.addEventListener('click', (event) => {

        if (divDadosCliente.style.display == "none") {
            dadosCliente.style.background = "#FFC107";
            divDadosCliente.style.display = 'flex';
        } else {
            dadosCliente.style.background = "white";
            divDadosCliente.style.display = 'none';

        }
        // altera status dos elementos adjacentes
        pastel.style.background = "white";
        divPastel.style.display = 'none';

        bebida.style.background = "white";
        divBebidas.style.display = 'none';
    });
}

// ----------------------------------------- ||
// manipulando o conteúdo dos card na pagina home
    $(document).ready(function() {
        const manupulando_elementos = (veja_mais, veja_menos, btn) => {
            $(btn).on('click', event => {
                if ( $(veja_menos).css('display') === "none") {
                    $(veja_mais).css('display', 'none');
                    $(veja_menos).css('display', 'block');
                    $(btn).text('Leia menos');
                } else {
                    $(veja_menos).css('display', 'none');
                    $(veja_mais).css('display', 'block');
                    $(btn).text('Leia mais');
                }
            });
        }
        manupulando_elementos('#veja_mais_maravilha','#veja_menos_maravilha', '#btn_maravilha');
        manupulando_elementos('#veja_mais_joe','#veja_menos_joe', '#btn_joe');
        manupulando_elementos('#veja_mais_biani','#veja_menos_biani', '#btn_biani');

        manupulando_elementos('#veja_mais_dez','#veja_menos_dez', '#btn_dez');
        manupulando_elementos('#veja_mais_carne','#veja_menos_carne', '#btn_carne');
        manupulando_elementos('#veja_mais_salada','#veja_menos_salada', '#btn_salada');
    });

// ------- fim da manipulação dos card da home

 

// manipulando area restrita

let consulta_pastel_ancora = document.querySelector('#consultar_pastel');
let consulta_pastel_table = document.getElementById('div_consult_pastel')
let add_pastel_form = document.getElementById('div_add_pastel')

if (consulta_pastel_ancora) {
    consulta_pastel_ancora.addEventListener('click', (event) => {

        if (consulta_pastel_table.style.display == 'flex') {

            consulta_pastel_ancora.innerHTML = "<b>Consultar Pastel</b>";
            consulta_pastel_table.style.display = 'none';
            add_pastel_form.style.display = 'flex';
        } else {
            consulta_pastel_ancora.innerHTML = "<b>Adicionar Pastel</b>";
            consulta_pastel_table.style.display = 'flex';
            add_pastel_form.style.display = 'none';
        }
    });
}



let button_bebida = document.querySelector('#button_ativa_bebida');
let button_form = document.querySelector('#button_ativa_form');
let consultar_bebida_div = document.querySelector('#table_bebida');
let add_form_div = document.querySelector('#form_bebida');
if (button_bebida) {
    button_bebida.addEventListener('click', (event) => {


        if (consultar_bebida_div.style.display == 'flex') {
            consultar_bebida_div.style.display = 'none';
            add_form_div.style.display = 'flex';
            button_bebida.innerHTML = "<b>Consultar Bebida</b>";
        } else {
            consultar_bebida_div.style.display = 'flex';
            add_form_div.style.display = 'none';
            button_bebida.innerHTML = "<b>Adicionar Bebida</b>";
        }

    });
}

// -----------------------------------------------------------------
