/*
  Tabelas do sistema:

  - painel: #idPainel, login, senha, perfil, dataDeAcesso
  - admin: #idAdmin, nome, oline, &fk2_idPainel
  
  - cliente: #idCliente, nome, telefone, &fk1_idPainel
  - cliente_endereco: #idClienteEndereco, &fk2_idCliente, &fk1_idEndereco
  - endereco: #idEndereco, complemento, bairro, numero

  
  - pedido: #idPedido, valorTotal, formaDeEntrega, situacao, dataDoPedido, taxaDeEntrega, &fk1_idFormaPag, &fk1_idCliente
  - forma_pagamento: #idFormaPag, tipoDoPagamento

  - pedido_bebida: #idPedidoBebida, quantidadeBebida, saldoFinalBebida, &fk2_idPedido, &fk1_idBebida
  - bebida: #idBebida, tipoDaBebida, sabor, fruto, quantidadeEmMl, valorUnidade
  
  - pastel: #idPastel, valorTotal, quantidadePastel, &fk1_idCardapioPastel
  - cardapio_pastel: #idCardapioPastel, saborDoPastel, valorUnitario, ingrediente
  - pedido_pastel: #idPedidoPastel, quantidadePastel, saldoFinalPastel, &fk1_idPedido, &fk1_idCardapioPastel

  - localizacao: #idLocalizacao, nomeDoBairro, taxa


  como o modelo conceitual definido vamos para o modelo DER e MER
  
  implementação do código sq

  testes no modelo do baco de dados


*/



