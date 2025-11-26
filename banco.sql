CREATE DATABASE restaurante;
USE restaurante;


CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    login VARCHAR(50) NOT NULL UNIQUE,
    senha_hash VARCHAR(255) NOT NULL,
    permissao ENUM('GARCOM', 'CAIXA', 'GERENTE', 'ADMIN') NOT NULL DEFAULT 'GARCOM',
    ativo TINYINT(1) NOT NULL DEFAULT 1
);


CREATE TABLE mesas (
    id_mesa INT AUTO_INCREMENT PRIMARY KEY,
    numero INT NOT NULL,
    status ENUM('LIVRE', 'OCUPADA', 'RESERVADA', 'FECHANDO') NOT NULL DEFAULT 'LIVRE'
);


CREATE TABLE comandas (
    id_comanda INT AUTO_INCREMENT PRIMARY KEY,
    mesa_id INT NULL,
    cliente VARCHAR(100),
    data_abertura DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    data_fechamento DATETIME NULL,
    status ENUM('ABERTA', 'FECHADA', 'CANCELADA') NOT NULL DEFAULT 'ABERTA',

    FOREIGN KEY (mesa_id) REFERENCES mesas(id_mesa) ON DELETE SET NULL
);


CREATE TABLE produtos (
    id_produto INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    categoria VARCHAR(50) NOT NULL,
    preco DECIMAL(10,2) NOT NULL,
    controla_estoque TINYINT(1) NOT NULL DEFAULT 0
);


CREATE TABLE pedidos (
    id_pedido INT AUTO_INCREMENT PRIMARY KEY,
    comanda_id INT NOT NULL,
    usuario_id INT NOT NULL,
    hora DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    status ENUM('NOVO', 'EM_PREPARO', 'PRONTO', 'ENTREGUE', 'CANCELADO') NOT NULL DEFAULT 'NOVO',

    FOREIGN KEY (comanda_id) REFERENCES comandas(id_comanda) ON DELETE CASCADE,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);



CREATE TABLE itens_pedido (
    id_item INT AUTO_INCREMENT PRIMARY KEY,
    pedido_id INT NOT NULL,
    produto_id INT NOT NULL,
    quantidade INT NOT NULL,
    obs VARCHAR(255),
    valor_unitario DECIMAL(10,2) NOT NULL,
    status VARCHAR(20) NOT NULL DEFAULT 'NORMAL',

    FOREIGN KEY (pedido_id) REFERENCES pedidos(id_pedido) ON DELETE CASCADE,
    FOREIGN KEY (produto_id) REFERENCES produtos(id_produto)
);


CREATE TABLE logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NULL,
    acao VARCHAR(100) NOT NULL,
    descricao TEXT NOT NULL,
    data_log DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE SET NULL
);