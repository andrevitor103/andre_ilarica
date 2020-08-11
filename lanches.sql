CREATE TABLE lanches(
   id int not null AUTO_INCREMENT PRIMARY key,
   nome varchar(100) not null,
   valor decimal(6,2) not null,
   descricao varchar(100) not null default 'SEM DADOS'
);

CREATE TABLE pedidos(
	id_pedido int not null AUTO_INCREMENT PRIMARY KEY,
    nome varchar(100) not null,
    email varchar(100) not null,
    lanche varchar(100) not null
);