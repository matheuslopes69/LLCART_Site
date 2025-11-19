
CREATE DATABASE IF NOT EXISTS llacart_db
  DEFAULT CHARACTER SET utf8mb4
  DEFAULT COLLATE utf8mb4_general_ci;

USE llacart_db;


CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


INSERT INTO usuarios (nome, email, senha)
VALUES ('Administrador', 'admin@llacart.com', '$2y$10$ExemploSenhaHash');


