SELECT * FROM pedido; -- traz informações dos pedido já feitos 
SELECT * FROM cliente; -- guarda informações de um cliente
SELECT * FROM endereco; -- guarda o endereco de um cliente
SELECT * FROM endereco_cliente; -- armazena referencia de endereço de clientes
SELECT * FROM pastel; -- traz dados de pasteis que foram pedido por um cliente
SELECT * FROM pedido_bebida; -- traz dados de bebidas que foram pedida em um pedido
SELECT * FROM pedido_pastel; -- traz dados de pasteis que foram pedido em um pedido

SELECT pedido.*, cliente.nome_cli, cliente.telefone 
FROM  pedido 
JOIN cliente ON pedido.pk_cliente = cliente.id_cliente
WHERE data_pedido = curdate() AND situacao = 'em andamento'
ORDER BY id_pedido ASC;
    
    
UPDATE pedido
SET taxa_entrega = 5
WHERE id_pedido = 80;
SELECT * FROM vw_exibe_pedido_feito;
/*
cenarios

para um pedido ser realizado completamente ate o cliente receber o seu produto
prescisa ter os pasteis escolhido
opcionalmente bebidas
apos o cliente saber o que vai pedir 
prescisa calcular o valor total do pedido
saber se este pedido é retirada ou entrega
saber se o cliente esta cadastrado ou nao
saber qual a taxa de entrega do pedido


passo para realizar o pedido
calcular o valor total dos pasteis e/ou bebidas

cenario 1 
pedido para retirada
cliente cadastrado
passos:
	- buscar dados do cliente pelo id
    - inserir o pedido
    - forma_pagamento
    - insere pastel
	- insere pedido_pastel
    - insere pedido_bebida


cenario 2
pedido para retirada
cliente nao ta cadastrado
	- cadastra as informacoes do cliente como nome, telefone
    - cadastrar o endereco como complemento, numero, bairro
    - relacionamento em endereco_cliente passando a pk de cliente e endereco
    - inserir o pedido
    - forma_pagamento
    - insere pastel
	- insere pedido_pastel
    - insere pedido_bebida

cenario 3
pedido para entrega
cliente cadastrodo
	- calcular o valor total do pedido do cliente pastel e/ou água
	- buscar informações do cliente logado no momento pelo id
    - verificar a forma de pagamento 
    - verificar a forma de entrega se o cliente deseja receber o pedido em casa
    - inserir o pedido do cliente
    - insere a forma de pagamento
    - insere pastel
    - insere pedido_pastel
    - insere peiddo_bebida
    

cenario 4
pedido para entrega
cliente nao tem cadastro
	- calcular o pedido escolhido pelo cliente pastel e/ou agua
    - obter as informações inseridas no formulario de envio
    - inserir os dados como nome, telefone na tabela cliente
    - inserir o endereco como numero, bairro, complemento na table endereco
    - aplicar o relacionamento da table endereco_cliente passando as pk de cliente e endereco
    - inserir o pedido
    - inserir a forma de pagamento
    - inserir pastel passando a pk da table cardapio_pastel
    - inserir pedido_pastel passando a pk da table pedido e da table pastel
    - inserir pedido_bibida  passando a pk da tabel bebida e da table pedido





pagina area restrita

prescisamo ter
1: visualizacao dos pedido e permissão de edição deste pedidos
2: formulario para adiconar novos pasteis e editalos e excluir
3: formulario para adicionar novas bebidas e editalos e excluir

cenario :1.1
	tem uma tabela exibindo dados que chega a tabela de pedido
    exibir os lancher que o cliente pediu
	dever permitir um click (por exemplo) que redirecione aquele pedido clicado 
    para uma pagina com um formulario possibilitando uma atualização do mesmo
    essa atualização permiter modificar situação do pedido e taxa da entrega

	dependencias
		tabela
			- nome cliente
            - telefone
            - situacao
            - forma entrega
            - sub valor
            - taxa entrega
            - valor total
        formulario

cenario :2.1
	ao clicar em adicionar pastel será exibido um formulario para que possa inserir informações de um novo pastel
    visualizar os pasteis ja adicionados
    editar os pasteis ja adicionados
        
        
cenario :3.1
	ao clicar em adicionar bebida será exibido um formulario para poder inserir nova bebida
    visualizar as bebidas ja adicionadas
    editar as bebidas ja adicionadas
     
*/