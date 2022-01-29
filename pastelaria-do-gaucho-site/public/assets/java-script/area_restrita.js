$(document).ready(function() {
	valida_numeros();


	$('#form_pedido_cliente_on').validate({
		rules: {
			pSabor: {
				required: true
			},
			iIngred: {
				required: true
			},
			sValor: {
				required: true
			}
		},
		messages: {
			pSabor: {
				required: "Este campo de ser preenchido"
			},
			iIngred: {
				required: "Digite o ingrediente corretamente"
			},
			sValor: {
				required: "Preencha o campo valor unidade"
			}


		}
	});

	
	$('#form_pedido_add_bebida').validate({
		rules: {
			tBebida: { 
				required: true
			},
			inQtd: {
				required: true
			},
			inValorUnidade: {
				required: true
			}
		},
		messages: {
			tBebida: { 
				required: "tipo da bebida deve ser preenchido"
			},
			inQtd: {
				required: "informe a quantidade em (ML) da bebida"
			},
			inValorUnidade: {
				required: "digite o valor da bebida"
			}
		}
	});

	$('#form_edita_pedido').validate({
		rules: {
			cTaxa_Entrega: {
				required: true
			},
			cSituacao: {
				required: true
			}
		},
		messages: {
			cTaxa_Entrega: {
				required: "informe o valor da taxa de entrega"
			},
			cSituacao: {
				required: "informe a situação do pedido"
			}
		}
	});

});


function valida_numeros(){
	$('.numeric').numeric();



	$('.positive').numeric(
		{negative: false},
		function () {
			alert('No negative values');
			this.value = '';
			this.focus();
		}
		);

	$('.decimal-2-places').numeric({decimalPlaces: 2});

	$('.alternative-decimal-separator').numeric({altDecimal: ','});

	$('.alternative-decimal-separator-reverse').numeric({altDecimal: '.', decimal: ','});


}




