 
create table pessoa(
	id int not null auto_increment,
	nome varchar(150),
	telefone varchar(150),
    primary key(id)
);

create table endereco(
id int not null auto_increment,
bairro varchar(150),
numero varchar(50),
primary key(id)
);

create table endereco_pessoa(
pessoa int,
endereco int,
foreign key(pessoa) references pessoa(id),
foreign key(endereco) references endereco(id)
on delete cascade
on update cascade
);
 
insert into pessoa values
(default, 'eneas', '2222-5555'),
(default, 'marcos', '3333-5555'),
(default, 'ayana', '1111-5555'),
(default, 'vitor', '4444-5555');
 
 insert into endereco values
 (default, 'bairro 1', '1'),
 (default, 'bairro 2', '2'),
 (default, 'bairro 3', '3'),
 (default, 'bairro 4', '4');
 
 insert into endereco_pessoa values
 (1,3),
 (4,3);
 -- (3,3),
 -- (4,4);
 
 
 select * from endereco_pessoa
 join pessoa on endereco_pessoa.pessoa = pessoa.id
 join endereco on endereco_pessoa.endereco = endereco.id;
 delete from endereco where id = 3;
 update endereco 
 set bairro = 'kalilandia'
 where id = 3;
 
 