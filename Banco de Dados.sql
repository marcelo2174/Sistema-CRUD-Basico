create database Avaliacao;

use Avaliacao;

create table  usuarios(
	id int auto_increment primary key,
    Login varchar(50),
    Senha varchar(50)
);

insert into usuarios(Login,Senha) values ("admin",123);