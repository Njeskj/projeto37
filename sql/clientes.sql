CREATE TABLE IF NOT EXISTS `clientes` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `nome` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255),
    `telefone` VARCHAR(15),
    `endereco` VARCHAR(255),
    `comp` VARCHAR(255),
    `ref` VARCHAR(255),
    `bairro` VARCHAR(255),
    `cep` VARCHAR(255),
    `data_nascimento` DATE,
    `cpf` VARCHAR(14),
    `data_criado` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `data_atualizado` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
