-- Criação do banco de dados
CREATE DATABASE cadastro_alunos;

-- Selecionando o banco de dados
USE cadastro_alunos;

-- Criando a tabela de alunos
CREATE TABLE alunos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    data_nascimento DATE NOT NULL
);