CREATE TABLE IF NOT EXISTS `formas_de_pagamento` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `nome` VARCHAR(255) NOT NULL,
    `descricao` TEXT,
    -- Adicione mais campos conforme necessário, como por exemplo:
    -- `taxa` DECIMAL(10, 2),
    -- `ativo` BOOLEAN DEFAULT true,
    -- ...

    -- Adicionando campos de controle de data
    `criado_em` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `atualizado_em` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
