CREATE TABLE IF NOT EXISTS `pedidos` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `id_cliente` INT NOT NULL,
    `id_produto` INT NOT NULL,
    `quantidade` INT NOT NULL,
    `valor_total` DECIMAL(10, 2) NOT NULL,
    `observacoes` TEXT,
    `status` ENUM('Em andamento', 'Concluído') DEFAULT 'Em andamento',
    `data_pedido` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `id_endereco` INT,
    `forma_pagamento` VARCHAR(255),
    -- Adicione mais campos conforme necessário
    FOREIGN KEY (`id_cliente`) REFERENCES `clientes`(`id`),
    FOREIGN KEY (`id_produto`) REFERENCES `produtos`(`id`),
    FOREIGN KEY (`id_endereco`) REFERENCES `enderecos`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
