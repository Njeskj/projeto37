CREATE TABLE IF NOT EXISTS `produtos` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `nome` VARCHAR(255) NOT NULL,
    `descricao` TEXT,
    `quantidade_estoque` INT DEFAULT 0,
    `preco` DECIMAL(10, 2) NOT NULL,
    `imagem` VARCHAR(255), -- Nome do arquivo ou caminho da imagem
    `data_criado` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `data_atualizado` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
