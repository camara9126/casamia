-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 09 déc. 2025 à 12:24
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `prestaurant`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `prix` varchar(255) NOT NULL,
  `prix2` varchar(255) DEFAULT NULL,
  `prix3` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `statut` int(11) NOT NULL DEFAULT 1,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `nom`, `description`, `prix`, `prix2`, `prix3`, `image`, `statut`, `menu_id`, `created_at`, `updated_at`, `slug`) VALUES
(4, 'fataya', 'petit modèle unité', '100', '', '', 'imgArticles/1760453726images.jpeg', 1, 5, '2025-10-14 13:55:26', '2025-10-14 13:55:26', 'fataya'),
(6, 'box frites', 'frites, sauces mayo', '1000', '', '', 'imgArticles/1761560637frite_2.png', 1, 11, '2025-10-17 10:02:01', '2025-10-27 09:23:57', 'box-frites'),
(7, 'jus orange', 'jus d\'orange naturel', '800', '', '', 'imgArticles/17606992031000922646.jpg', 1, 6, '2025-10-17 10:06:43', '2025-10-17 10:06:43', 'jus-orange'),
(9, 'jus gingembre', 'jus gingembre naturel', '500', '', '', 'imgArticles/17606993681000922635.jpg', 1, 6, '2025-10-17 10:09:28', '2025-10-17 10:09:28', 'jus-gingembre'),
(10, 'burger double', 'double burger deux steaks avec fromage, salade, tomate, oignon, sauce burger ou ketchup.', '2000', '', '', 'imgArticles/1760970436burger double.png', 1, 3, '2025-10-20 13:27:17', '2025-10-20 13:27:17', 'burger-double'),
(11, 'burger royal', 'steak fromage, œuf, jambon ou bacon, salade, tomate, oignon, sauce burger ou mayonnaise.', '1500', '', '', 'imgArticles/1760970628burger royal.png', 1, 3, '2025-10-20 13:30:28', '2025-10-20 13:30:28', 'burger-royal'),
(12, 'burger simple', 'steak fromage, salade, tomate, oignon, mayonnaise et ketchup', '1250', '', '', 'imgArticles/1760970698burgewr simple.png', 1, 3, '2025-10-20 13:31:38', '2025-10-20 13:31:38', 'burger-simple'),
(13, 'shawarma viande', 'shawarma viande marinée, frites, salade, tomate, oignon et sauce.', '1000', '', '', 'imgArticles/1760970885shawarma viande - poulet.png', 1, 9, '2025-10-20 13:34:45', '2025-10-20 13:34:45', 'shawarma-viande'),
(14, 'tacos poulet', 'tortilla, viande hachée, frites, fromage râpé, sauce fromagère, salade et tomate.', '2000', '', '', 'imgArticles/1760971007tacos poulet.png', 1, 10, '2025-10-20 13:36:47', '2025-10-20 13:36:47', 'tacos-poulet'),
(15, 'tacos viande', 'tortilla, poulet, frites, fromage râpé, sauce fromagère, salade et tomate.', '2000', '', '', 'imgArticles/1760971103tacos viande.png', 1, 10, '2025-10-20 13:38:23', '2025-10-20 13:38:23', 'tacos-poulet-1'),
(18, 'pizza 4 saisons', 'pizza sauce tomate, mozzarella, jambon, champignons, poivrons, olives et artichauds', '3000', '4000', '5000', 'imgArticles/1761566096pizza 4 saison.png', 1, 7, '2025-10-20 13:43:00', '2025-10-27 10:54:56', 'pizza-4-saisons'),
(19, 'pizza fermiere', 'sauce tomate, mozzarella, poulet rôti, oignons, poivrons, crème fraiche, œuf, maïs, origan, filet d\'huile d\'olive et jambon.', '3000', '4000', '5000', 'imgArticles/1761566049pizza fermiaire.png', 1, 7, '2025-10-20 13:48:51', '2025-10-27 10:54:09', 'pizza-fermiere'),
(20, 'pizza margarita', 'sauce tomate, mozzarella, basilic, huile d\'olive.', '3000', '4000', '5000', 'imgArticles/1761566115pizza margarita.png', 1, 7, '2025-10-20 13:50:55', '2025-10-27 10:55:15', 'pizza-margarita'),
(21, 'pizza reine', 'sauce tomate, mozzarella, jambon, champignons, olives noires.', '3000', '4000', '5000', 'imgArticles/1761566135pizza reine.png', 1, 7, '2025-10-20 13:52:24', '2025-10-27 10:55:35', 'pizza-reine'),
(22, 'crêpe salée', 'crêpe salée simple.', '800', '', '', 'imgArticles/1760972134crepe salee.png', 1, 4, '2025-10-20 13:55:34', '2025-10-20 13:55:34', 'crepe-salee'),
(23, 'crêpe sucrée', 'crêpe sucrée', '1000', '', '', 'imgArticles/1760972173crepe sucree.png', 1, 4, '2025-10-20 13:56:13', '2025-10-20 13:56:13', 'crepe-sucree'),
(24, 'jus bissap', 'jus bissap naturel', '500', '', '', 'imgArticles/1760972235jus bissap.png', 1, 6, '2025-10-20 13:57:15', '2025-10-20 13:57:15', 'jus-bissap'),
(25, 'jus bouye', 'jus bouye naturel', '200', '', '', 'imgArticles/1760972270jus bouye.png', 1, 6, '2025-10-20 13:57:50', '2025-10-20 13:57:50', 'jus-bouye'),
(26, 'jus citron', 'jus citron simple', '500', '', '', 'imgArticles/1760972534jus citron.png', 1, 6, '2025-10-20 14:02:14', '2025-10-20 14:02:14', 'jus-citron'),
(27, 'poutine poulet', 'frites, fromage, sauce brune(gravie) et poulet.', '3500', NULL, NULL, 'imgArticles/1761576875poutine poulet.png', 1, 8, '2025-10-27 13:54:35', '2025-10-27 13:54:35', 'poutine-poulet'),
(28, 'poutine viande', 'frites, fromage, sauce brune(gravie) et viande.', '3500', NULL, NULL, 'imgArticles/1761576994poutine viande.png', 1, 8, '2025-10-27 13:56:34', '2025-10-27 13:56:34', 'poutine-viande'),
(29, 'poutine mixte', 'frites, fromage en grains(ou mozzarella râpée), sauce brune(gravie), poulet et viande.', '4000', NULL, NULL, 'imgArticles/1761577223poutine.jpg', 1, 8, '2025-10-27 14:00:23', '2025-10-27 14:00:23', 'poutine-mixte');

-- --------------------------------------------------------

--
-- Structure de la table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `menus`
--

INSERT INTO `menus` (`id`, `nom`, `description`, `image`, `created_at`, `updated_at`) VALUES
(3, 'burger', 'Un burger est un sandwich composé généralement d\'un steak haché (le plus souvent de bœuf) grillé, placé entre deux moitiés de pain rond, appelées \"bun\". hsrt', 'imgCategories/1761560538burgewr simple.png', '2025-10-13 13:31:52', '2025-10-27 09:22:18'),
(4, 'crêpe', 'Une crêpe est une galette fine et ronde faite à partir d\'une pâte liquide à base de farine, d\'œufs et de lait ou d\'eau, cuite à la poêle', 'imgCategories/1761563011crepe salee.png', '2025-10-13 13:34:00', '2025-10-27 10:03:31'),
(5, 'fataya', 'Le fataya est un beignet populaire du Sénégal, en forme de chausson, fourré de viande (souvent hachée) ou de poisson et frit', 'imgCategories/1760366113images.jpeg', '2025-10-13 13:35:13', '2025-10-13 13:35:13'),
(6, 'jus', 'Le jus est un liquide obtenu en pressant ou en extrayant le suc naturel de fruits ou de légumes.', 'imgCategories/1760366169jus-2.jpg', '2025-10-13 13:36:09', '2025-10-13 13:36:09'),
(7, 'pizza', 'La pizza est un plat italien à base de pâte de blé levée et aplatie, généralement garnie de sauce tomate, de fromage et d\'autres ingrédients comme des légumes ou de la viande, et cuite à haute température.', 'imgCategories/1761562526pizza margarita.png', '2025-10-13 13:37:07', '2025-10-27 09:55:26'),
(8, 'poutine', 'poutine est un plat emblématique du Québec, composé de frites, de fromage en grains et nappé d\'une sauce brune.', 'imgCategories/1760366274poutine.jpg', '2025-10-13 13:37:54', '2025-10-13 13:37:54'),
(9, 'sandwich', 'Un sandwich est un plat portable généralement composé de garnitures comme de la viande, du fromage ou des légumes, prises en sandwich entre deux tranches de pain ou dans un pain fendu.', 'imgCategories/1761572238sandwish.png', '2025-10-13 13:38:54', '2025-10-27 12:37:18'),
(10, 'tacos', 'plat mexicain composé d\'une tortilla (souvent de maïs) pliée autour d\'une garniture comme de la viande, du fromage ou des légumes, et souvent agrémenté de sauces comme la salsa ou le guacamole.', 'imgCategories/1760366577pngtree-mexican-taco-crepes-with-lemon-sauce-psd-transparent-png-image_6720528.png', '2025-10-13 13:42:57', '2025-10-13 13:42:57'),
(11, 'box frite', 'Une \"petite box frite\" désigne généralement un emballage en carton ou en papier, de dimensions réduites, conçu pour contenir une portion de frites à emporter.', 'imgCategories/1760449657frite.jpeg', '2025-10-14 12:47:37', '2025-10-14 12:47:37'),
(12, 'thiakry', 'Le Thiakry ou Dêgué est un couscous à base de farine de mil à gros ou moyen grains.', 'imgCategories/1761560729Design sans titre (3).png', '2025-10-14 12:48:34', '2025-10-27 09:25:29'),
(13, 'ngalakh', 'Le ngalakh est un dessert traditionnel sénégalais à base de mil, de pâte d\'arachide et de pain de singe.', 'imgCategories/1761562283ngalakh.png', '2025-10-14 12:49:31', '2025-10-27 09:51:23'),
(14, 'shawarma', 'Le shawarma est un plat du Moyen-Orient composé de fines tranches de viande (souvent poulet, bœuf ou agneau) marinée et rôtie sur une broche verticale tournante.', 'imgCategories/1760449814shawarma.jpeg', '2025-10-14 12:50:14', '2025-10-14 12:50:14'),
(15, 'salade de fruit', 'La salade de fruit est un plat généralement froid, composé de légumes crus et de garnitures .', 'imgCategories/1761562978salade de fruit.png', '2025-10-14 12:51:37', '2025-10-27 10:02:58');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_10_09_083830_create_personnels_table', 2),
(5, '2025_10_09_121920_add_staut_to_users_table', 3),
(6, '2025_10_09_134608_create_categories_table', 4),
(7, '2025_10_09_134821_create_articles_table', 4),
(8, '2025_10_10_103839_add_email_to_personnels_table', 5),
(9, '2025_10_09_134608_create_menus_table', 6),
(10, '2025_10_11_134821_create_articles_table', 7),
(11, '2025_10_13_105555_add_slug_to_articles_table', 7);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personnels`
--

CREATE TABLE `personnels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `pnom` varchar(255) NOT NULL,
  `identifiant` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  `statut` varchar(255) NOT NULL DEFAULT 'cuisiniere',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `personnels`
--

INSERT INTO `personnels` (`id`, `prenom`, `pnom`, `identifiant`, `motdepasse`, `statut`, `created_at`, `updated_at`, `email`) VALUES
(2, 'aminata', 'sy', 'amina', '$2y$12$xeE84cKghpDw6wVco3he4OQSRECVS18y3vni17fZu9LKRESoKiz/C', 'cuisiniere', '2025-10-09 12:35:29', '2025-10-09 12:35:29', 'aminasy@gmail.com'),
(3, 'fatou', 'ba', 'fatou', '$2y$12$F.0wnhYvQbu.KBMzINy9qus2CtQIbqWFhSosDUgOCl3pnWvbwNJui', 'cuisiniere', '2025-10-09 12:37:32', '2025-10-09 12:37:32', 'fatouba@gmail.com'),
(4, 'test', 'test', 'test', '$2y$12$0Vxvty6fXhBie05TST0zHOwI1X.Y4Mw//33KwImiVnvwuEzSQlphO', 'cuisiniere', '2025-10-10 10:37:03', '2025-10-10 10:37:03', 'test@gmail.com'),
(5, 'test', 'test', 'test', '$2y$12$40VJPdf8twpiFJ2AO98Pq.MjTFkxt.2LuJY9QkBmRARhRquTBLERO', 'cuisiniere', '2025-10-10 10:37:34', '2025-10-10 10:37:34', 'test@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('2eBh3uiKckqSaMU8d7vDLh4QZ0HBxqakVA7aq89D', NULL, '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZXlMNUdqT1lyY3JFV256Vjl1N3M2amF1cFRXdUhQNllwcEEzQ1NKcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NDoiY2FydCI7YToxOntzOjc6ImRlZmF1bHQiO086Mjk6IklsbHVtaW5hdGVcU3VwcG9ydFxDb2xsZWN0aW9uIjoyOntzOjg6IgAqAGl0ZW1zIjthOjI6e3M6MzI6ImRlYThhYjAyMTI5NzgxNjVlMmI1NGQzZTg0NWQ3MDFjIjtPOjMyOiJHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbSI6OTp7czo1OiJyb3dJZCI7czozMjoiZGVhOGFiMDIxMjk3ODE2NWUyYjU0ZDNlODQ1ZDcwMWMiO3M6MjoiaWQiO3M6MjoiMjIiO3M6MzoicXR5IjtpOjE7czo0OiJuYW1lIjtzOjEzOiJjcsOqcGUgc2Fsw6llIjtzOjU6InByaWNlIjtkOjgwMDtzOjc6Im9wdGlvbnMiO086Mzk6Ikdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtT3B0aW9ucyI6Mjp7czo4OiIAKgBpdGVtcyI7YToyOntzOjU6Im1vZGVsIjtzOjg6IlN0YW5kYXJ0IjtzOjU6ImltYWdlIjtzOjM3OiJpbWdBcnRpY2xlcy8xNzYwOTcyMTM0Y3JlcGUgc2FsZWUucG5nIjt9czoyODoiACoAZXNjYXBlV2hlbkNhc3RpbmdUb1N0cmluZyI7YjowO31zOjQ5OiIAR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW0AYXNzb2NpYXRlZE1vZGVsIjtzOjE4OiJBcHBcTW9kZWxzXEFydGljbGUiO3M6NDE6IgBHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbQB0YXhSYXRlIjtpOjIxO3M6NDE6IgBHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbQBpc1NhdmVkIjtiOjA7fXM6MzI6IjEyZDMxOTgyMDE1MWEwNmFjNjY1MTI0ZjY1YjU5YTY4IjtPOjMyOiJHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbSI6OTp7czo1OiJyb3dJZCI7czozMjoiMTJkMzE5ODIwMTUxYTA2YWM2NjUxMjRmNjViNTlhNjgiO3M6MjoiaWQiO3M6MjoiMTkiO3M6MzoicXR5IjtpOjM7czo0OiJuYW1lIjtzOjE0OiJwaXp6YSBmZXJtaWVyZSI7czo1OiJwcmljZSI7ZDo1MDAwO3M6Nzoib3B0aW9ucyI7TzozOToiR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW1PcHRpb25zIjoyOntzOjg6IgAqAGl0ZW1zIjthOjI6e3M6NToibW9kZWwiO3M6MTE6IkdyYW5kIE1vZGVsIjtzOjU6ImltYWdlIjtzOjQxOiJpbWdBcnRpY2xlcy8xNzYxNTY2MDQ5cGl6emEgZmVybWlhaXJlLnBuZyI7fXM6Mjg6IgAqAGVzY2FwZVdoZW5DYXN0aW5nVG9TdHJpbmciO2I6MDt9czo0OToiAEdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtAGFzc29jaWF0ZWRNb2RlbCI7czoxODoiQXBwXE1vZGVsc1xBcnRpY2xlIjtzOjQxOiIAR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW0AdGF4UmF0ZSI7aToyMTtzOjQxOiIAR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW0AaXNTYXZlZCI7YjowO319czoyODoiACoAZXNjYXBlV2hlbkNhc3RpbmdUb1N0cmluZyI7YjowO319fQ==', 1763390321);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `statut` varchar(255) NOT NULL DEFAULT 'cuisiniere'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `statut`) VALUES
(3, 'amadou', 'aminasy@gmail.com', NULL, '$2y$12$tosmQFsZ8ktj3P.ap1MF2.bT4uqk56DpYvTEK/vPbWL3aF7geGGr2', NULL, '2025-10-14 10:52:46', '2025-10-14 10:52:46', 'cuisiniere');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_menu_id_foreign` (`menu_id`);

--
-- Index pour la table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Index pour la table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `personnels`
--
ALTER TABLE `personnels`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `personnels`
--
ALTER TABLE `personnels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
