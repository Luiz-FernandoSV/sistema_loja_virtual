CREATE DATABASE sistema_loja_virtual;

USE sistema_loja_virtual;

CREATE TABLE usuario(
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(100) NOT NULL,
email VARCHAR(100) NOT NULL,
senha VARCHAR (100) NOT NULL
);

CREATE TABLE produto(
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(100) NOT NULL,
imagem VARCHAR(100) NOT NULL,
descricao VARCHAR(200) NOT NULL,
quantidade INT NOT NULL,
preco DECIMAL(2) NOT NULL 
);

INSERT INTO produto (id, nome, imagem, descricao, quantidade, preco) VALUES
(1, 'Notebook Dell Inspiron 15', 'https://images.unsplash.com/photo-1517336714731-489689fd1ca8', 'Notebook com processador Intel Core i5, 8GB de RAM e SSD de 256GB. Ideal para estudos, trabalho e tarefas do dia a dia.', 10, 4299.90),

(2, 'Bola de Futebol Adidas', 'https://images.unsplash.com/photo-1614632537423-5e0e6e7e0a00', 'Bola de futebol oficial com material resistente e costura reforçada. Indicada para jogos recreativos e treinos.', 15, 89.90),

(3, 'Console Xbox Series S', 'https://images.unsplash.com/photo-1621259182978-fbf93132d53d', 'Console de videogame da Microsoft com armazenamento SSD e suporte para jogos em alta performance.', 8, 2799.00),

(4, 'Computador Desktop Gamer Básico', 'https://images.unsplash.com/photo-1587202372775-e229f172b9d7', 'PC com processador Ryzen 5, 16GB de RAM e SSD de 512GB. Ideal para jogos leves, programação e multitarefas.', 6, 3899.90),

(5, 'Fone de Ouvido Bluetooth JBL', 'https://images.unsplash.com/photo-1518444028785-8f7d7c1c2a52', 'Fone de ouvido sem fio com conexão Bluetooth, bateria de longa duração e som de alta qualidade.', 20, 199.90),

(6, 'Mouse Gamer Logitech', 'https://images.unsplash.com/photo-1527814050087-3793815479db', 'Mouse gamer com sensor de alta precisão, iluminação RGB e design ergonômico para longas sessões de uso.', 25, 149.90),

(7, 'Teclado Mecânico Redragon', 'https://images.unsplash.com/photo-1511467687858-23d96c32e4ae', 'Teclado mecânico com switches de alta durabilidade, iluminação RGB e estrutura reforçada para gamers.', 18, 299.90),

(8, 'Monitor LG 24 Polegadas', 'https://images.unsplash.com/photo-1527443224154-c4a3942d3acf', 'Monitor Full HD de 24 polegadas com painel IPS, cores vibrantes e ideal para trabalho ou entretenimento.', 12, 899.90),

(9, 'Smartphone Samsung Galaxy A34', 'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9', 'Smartphone com tela AMOLED de 6.6 polegadas, 128GB de armazenamento e câmera de alta resolução.', 14, 1799.90),

(10, 'Cadeira Gamer Ergonômica', 'https://images.unsplash.com/photo-1598300056393-4aac492f4344', 'Cadeira gamer com apoio lombar, ajuste de altura e revestimento confortável para longas horas de uso.', 7, 1299.90),

(11, 'HD Externo Seagate 1TB', 'https://images.unsplash.com/photo-1597872200969-2b65d56bd16b', 'HD externo portátil com capacidade de 1TB, ideal para backup de arquivos, fotos e documentos.', 16, 349.90),

(12, 'Webcam Full HD Logitech', 'https://images.unsplash.com/photo-1587829741301-dc798b83add3', 'Webcam com resolução Full HD 1080p, ideal para reuniões online, aulas e transmissões ao vivo.', 13, 279.90);

