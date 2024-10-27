use cpf;

create database cpf;
drop database cpf;


select * from respostas;
select * from acessos;

SELECT a.*, r.*
FROM acessos a
INNER JOIN respostas r ON a.id = r.id_acesso;

SELECT a.id, a.cpf, a.unidade, r.* #r.pergunta1, r.pergunta2, r.pergunta3, r.pergunta4, r.pergunta5, r.acesso_id, r.data_criacao
FROM acessos a
INNER JOIN respostas r ON a.id = r.acesso_id;

use pesquisa;

select * from respostas;

--
ALTER TABLE `acessos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`);
  
  ALTER TABLE `respostas`
  ADD PRIMARY KEY (`id`);

use pesquisa;
CREATE TABLE `acessos` (
  `id` int(11) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `unidade` varchar(250) NOT NULL,
  `data_acesso` timestamp NOT NULL DEFAULT current_timestamp(),
  `acessado` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `acessos` (`id`, `cpf`, `unidade`, `data_acesso`, `acessado`) VALUES
(2, '09993198412', '', '', 0);

create database pesquisa;

CREATE TABLE respostas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pergunta1 VARCHAR(10) NOT NULL,
    comentario VARCHAR(1000)
);

SELECT a.id, a.cpf, a.unidade, r.* #r.pergunta1, r.pergunta2, r.pergunta3, r.pergunta4, r.pergunta5, r.acesso_id, r.data_criacao
FROM acessos a
INNER JOIN respostas r ON a.id = r.acesso_id;

SELECT a.cpf, a.unidade, r.pergunta1, r.pergunta2, r.pergunta3, r.pergunta4, comentario, data_hora
FROM acessos a
INNER JOIN respostas r ON a.id = r.acessos_id;



