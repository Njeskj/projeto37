CREATE TABLE IF NOT EXISTS `enderecos` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `id_cliente` INT NOT NULL,
    `endereco` VARCHAR(255) NOT NULL,
    -- Adicione mais campos de endereço conforme necessário
    FOREIGN KEY (`id_cliente`) REFERENCES `clientes`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
