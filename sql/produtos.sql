-- Criação da tabela produtos
CREATE TABLE IF NOT EXISTS `produtos` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `nome` VARCHAR(255) NOT NULL,
    `descricao` TEXT,
    `quantidade_estoque` INT DEFAULT 0,
    `valor_compra` DECIMAL(10, 2) NOT NULL, -- Adicionando o campo valor_compra
    `valor_venda` DECIMAL(10, 2) NOT NULL, -- Renomeando o campo preco para valor_venda
    `imagem` VARCHAR(255), -- Nome do arquivo ou caminho da imagem
    `categoria_id` INT,
    `data_criado` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `data_atualizado` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (`categoria_id`) REFERENCES `categorias`(`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- Se quiser adicionar a foreign key depois de já ter dados na tabela
-- Certifique-se de que os valores existentes na coluna categoria_id são válidos
-- ALTER TABLE produtos
-- ADD CONSTRAINT fk_categoria
-- FOREIGN KEY (categoria_id) REFERENCES categorias(id);
