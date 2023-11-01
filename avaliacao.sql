-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Nov-2023 às 15:39
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `avaliacao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `domain`
--

CREATE TABLE `domain` (
  `id` int(11) NOT NULL,
  `domain` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `domain`
--

INSERT INTO `domain` (`id`, `domain`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, '@osir.com', 1, 4, '2023-11-01 09:37:23', '2023-11-01 10:29:05');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `protocol` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1 - Bug\r\n2 - Ajuda\r\n3 - Implementações',
  `description` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `responsable_id` int(11) NOT NULL,
  `open_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `closed_at` datetime DEFAULT NULL,
  `closure_reason` text DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tickets`
--

INSERT INTO `tickets` (`id`, `protocol`, `type`, `description`, `user_id`, `responsable_id`, `open_at`, `closed_at`, `closure_reason`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 1472476, 2, 'preciso de ajuda', 3, 3, '2023-11-01 01:45:02', NULL, NULL, 3, '2023-11-01 01:45:02', '2023-11-01 01:45:02'),
(3, 1511781, 3, 'Crie um campo', 3, 3, '2023-11-01 02:01:49', '2023-11-01 05:34:19', 'pq eu quis', 3, '2023-11-01 02:01:49', '2023-11-01 08:34:19'),
(4, 1161695, 2, 'ajudfaaaaaaaaa', 3, 3, '2023-11-01 02:59:44', NULL, NULL, 3, '2023-11-01 02:59:44', '2023-11-01 02:59:44'),
(5, 1825821, 1, 'Ajdua eu por favor', 5, 3, '2023-11-01 13:29:33', NULL, NULL, 5, '2023-11-01 13:29:33', '2023-11-01 13:29:33');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_type` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `user_type`, `status`, `created_at`, `updated_at`, `password`) VALUES
(3, 'Lucas', 'lucas@hotmail.com', 3, 1, '2023-10-31 22:11:15', '2023-10-31 22:11:15', '202cb962ac59075b964b07152d234b70'),
(4, 'Admin', 'admin@admin.com', 1, 1, '2023-11-01 08:40:10', '2023-11-01 08:46:03', '202cb962ac59075b964b07152d234b70'),
(5, 'adao', 'adao@osir.com', 3, 1, '2023-11-01 13:07:16', '2023-11-01 13:29:06', '202cb962ac59075b964b07152d234b70'),
(6, 'adao', 'adao2@osir.com', 2, 1, '2023-11-01 13:07:49', '2023-11-01 13:07:49', '202cb962ac59075b964b07152d234b70'),
(7, 'adao', 'adao3@osir.com', 2, 1, '2023-11-01 13:19:55', '2023-11-01 13:19:55', '202cb962ac59075b964b07152d234b70');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `domain`
--
ALTER TABLE `domain`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- Índices para tabela `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `responsable_id` (`responsable_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `domain`
--
ALTER TABLE `domain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `domain`
--
ALTER TABLE `domain`
  ADD CONSTRAINT `domain_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`responsable_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `tickets_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
