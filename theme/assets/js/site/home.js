// Formulário de login carregado no modal
$(document).ready(() => {

    const troca_contexto_card_text = (botao, leiamais, leiamenos) => {
        $(botao).on('click', function(e) {
            e.preventDefault();
            if ($(leiamais).css('display') === 'none') {
                $(leiamais).css('display', 'block');
                $(leiamenos).css('display', 'none');
                $(botao).text('leia menos');
            } else if ($(leiamais).css('display') === 'block') {
                $(leiamais).css('display', 'none');
                $(leiamenos).css('display', 'block');
                $(botao).text('leia mais');
            }
        });
    }

    troca_contexto_card_text('#action_botao_maravilha', '#ler_mais_maravilha', '#ler_menos_maravilha');
    troca_contexto_card_text('#action_botao_joe', '#ler_mais_joe', '#ler_menos_joe');
    troca_contexto_card_text('#action_botao_biani', '#ler_mais_biani', '#ler_menos_biani');
    troca_contexto_card_text('#action_botao_dez', '#ler_mais_dez', '#ler_menos_dez');
    troca_contexto_card_text('#action_botao_carne', '#ler_mais_carne', '#ler_menos_carne');
    troca_contexto_card_text('#action_botao_salada', '#ler_mais_salada', '#ler_menos_salada');

    // js dos cards da page home
    let login_btn = document.getElementById('btn_login');
    for (let item of['maravilha_btn', 'joe_btn', 'biani_btn', 'dez_btn', 'carne_btn', 'salada_btn']) {
        let btn = document.getElementById(item);
        if (btn) { // maravilha_btn, joe_btn, biani_btn, dez_btn, carne_btn, salada_btn
            btn.addEventListener('click', (event) => {
                event.preventDefault();
                if (login_btn) login_btn.click();
            });
        }
    }

    $('#login-app').on('submit', e => {
        const formLogin = e.target;
        let login = formLogin.user_login;
        let senha = formLogin.user_senha;
        if (!login.value || !senha.value) {
            e.preventDefault();
            alert_cust("error", 'Painel Login', 'Preencha os campos corretamentes', 3000);
        }
    });
});

function alert_cust(type, title, messagem, time) {
    Swal.fire({
        icon: type,
        title: title,
        text: messagem,
        showConfirmButton: !1,
        timer: time
    })
}