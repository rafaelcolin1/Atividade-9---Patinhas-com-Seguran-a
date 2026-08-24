CREATE DATABASE pet_aumigos_rafael_colin_m1;
USE pet_aumigos_rafael_colin_m1;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100)NOT NULL,
    email VARCHAR(100)NOT NULL
);  

create table animais (
    id int primary key auto_increment,
    nome varchar(100) not null,
    especie text not null,
    raca text not null,
    porte varchar(50) not null,
    idade int not null,

    id_usuario int not null,
    foreign key (id_usuario) references usuarios(id)
);

insert into usuarios (nome, email) values
('João Silva', 'joao.silva@email.com'),
('Maria Santos', 'maria.santos@email.com'),
('Carlos Oliveira', 'carlos.oliveira@email.com'),
('Ana Souza', 'ana.souza@email.com'),
('Pedro Costa', 'pedro.costa@email.com'),
('Juliana Lima', 'juliana.lima@email.com'),
('Rafael Almeida', 'rafael.almeida@email.com'),
('Camila Rodrigues', 'camila.rodrigues@email.com'),
('Lucas Ferreira', 'lucas.ferreira@email.com'),
('Beatriz Martins', 'beatriz.martins@email.com');