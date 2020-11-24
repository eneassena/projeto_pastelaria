 -- consulta qual pastel esta para qual pedido e qual cliente fez esse pedido pelo id do pedido
SELECT * FROM pedido_pastel
JOIN pastel ON pedido_pastel.pk_pedido_pastel = pastel.id_pastel
JOIN pedido ON pedido_pastel.pk_pastel_pedido = pedido.id_pedido
WHERE pedido.id_pedido = 79;

-- consulta qual bebida esta para qual pedido
SELECT * FROM pedido_bebida
JOIN bebidas ON pedido_bebida.pk_pedido_bebida = bebidas.id_bebida
JOIN pedido ON pedido_bebida.pk_bebida_pedido = pedido.id_pedido
WHERE pedido.data_pedido = curdate() 
AND pedido.situacao = 'em andamento' 
AND pedido.id_pedido = 79;

-- consulta informacoes do pedido e do cliente
SELECT * FROM pedido 
JOIN cliente ON pedido.pk_cliente = cliente.id_cliente 
JOIN endereco_cliente ON endereco_cliente.pk_endereco_cliente = pedido.pk_cliente
JOIN endereco ON endereco_cliente.pk_cliente_endereco = endereco.id_endereco
WHERE pedido.data_pedido = curdate() 
AND pedido.situacao = 'em andamento' 
AND  pedido.id_pedido = 79;

 