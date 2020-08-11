create database ilarica;
use ilarica;

create table clientes(
id int not null AUTO_INCREMENT PRIMARY KEY,
email varchar(100) not null,
nome varchar(100) not null,
sobrenome varchar(100) not null,
endereco varchar(100)
);