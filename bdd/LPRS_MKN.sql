-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : sam. 16 déc. 2023 à 20:34
-- Version du serveur : 5.7.39
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `LPRS_MKN`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref_user` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `ref_user`, `created_at`, `updated_at`) VALUES
(1, 2, '2023-12-14 10:04:26', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `candidature`
--

CREATE TABLE `candidature` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref_etudiant` bigint(20) UNSIGNED NOT NULL,
  `ref_offre` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`id`, `nom`, `adresse`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Toyota France', '22 Avenue des Nations Unies, 92190 Meudon', 'Filiale française du constructeur automobile Toyota.', '2023-12-14 08:00:00', '2023-12-14 08:00:00'),
(2, 'Total SA', '2 Place de la Coupole, 92400 Courbevoie', 'Groupe pétrolier et gazier international basé en France.', '2023-12-14 09:30:00', '2023-12-14 09:30:00'),
(3, 'Carbon IT', '55 Rue de la Roquette, 75011 Paris', 'Entreprise française spécialisée dans les solutions logicielles durables.', '2023-12-14 10:45:00', '2023-12-14 10:45:00'),
(4, 'Capgemini France', '10 Rue du Colonel Pierre Avia, 75015 Paris', 'Multinationale française de conseil et de services informatiques.', '2023-12-14 12:15:00', '2023-12-14 12:15:00'),
(5, 'Airbus SAS', '1 Rond-Point Maurice Bellonte, 31707 Blagnac Cedex', 'Entreprise aérospatiale européenne.', '2023-12-14 13:30:00', '2023-12-14 13:30:00'),
(6, 'Renault Group', '13-15 Quai Alphonse Le Gallo, 92100 Boulogne-Billancourt', 'Constructeur automobile français.', '2023-12-14 14:45:00', '2023-12-14 14:45:00'),
(7, 'L Oréal', '41 Rue Martre, 92110 Clichy', 'Multinationale française de produits cosmétiques.', '2023-12-14 15:30:00', '2023-12-14 15:30:00'),
(8, 'Dassault Systèmes', '10 Rue Marcel Dassault, 78140 Vélizy-Villacoublay', 'Constructeur aéronautique français fondé en 1929 par Marcel Bloch .', '2023-12-14 16:15:00', '2023-12-14 16:15:00'),
(9, 'Danone SA', '17 Boulevard Haussmann, 75009 Paris', 'Multinationale agroalimentaire française.', '2023-12-14 17:00:00', '2023-12-14 17:00:00'),
(10, 'Orange SA', '78 Rue Olivier de Serres, 75015 Paris', 'Entreprise de télécommunications française.', '2023-12-14 17:45:00', '2023-12-14 17:45:00'),
(12, 'Atixit', '53 Rue Bourdignon 94100 Saint Maur des Fossés', 'Prestataire informatique des PME et partenaire IT, découvrez l’accompagnement informatique sur-mesure d’Atixit avec des services informatiques adaptés à votre société et votre secteur d’activité.', '2023-12-14 10:07:15', '2023-12-14 10:07:15'),
(13, 'konoha', 'konoha', 'ninja', '2023-12-16 16:02:44', '2023-12-16 16:02:44'),
(14, 'c', 'c', 'c', '2023-12-16 18:52:45', '2023-12-16 18:52:45');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `domaine_etude` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref_user` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `domaine_etude`, `ref_user`, `created_at`, `updated_at`) VALUES
(7, 'informatique', 13, '2023-12-14 13:12:04', '2023-12-14 13:12:04');

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `duree` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT '0',
  `ref_salle` bigint(20) UNSIGNED DEFAULT NULL,
  `ref_admin` bigint(20) UNSIGNED DEFAULT NULL,
  `ref_users` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`id`, `nom`, `description`, `date`, `heure`, `duree`, `valide`, `ref_salle`, `ref_admin`, `ref_users`, `created_at`, `updated_at`) VALUES
(1, 'Rencontre des anciens étudiants', 'Un événement où d\'anciens étudiants partagent leurs expériences après l\'obtention de leur diplôme.', '2024-01-10', '00:00:00', '02:00', 1, 4, 1, 13, NULL, '2023-12-15 17:12:20'),
(9, 'Fête de fin d\'année', 'Célébration de fin d\'année', '2023-12-31', '20:53:50', '03:00', 0, 2, 1, 13, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref_etudiant` bigint(20) UNSIGNED NOT NULL,
  `ref_evenement` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

CREATE TABLE `offre` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref_type` bigint(20) UNSIGNED NOT NULL,
  `ref_entreprise` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `offre`
--

INSERT INTO `offre` (`id`, `titre`, `description`, `etat`, `ref_type`, `ref_entreprise`, `created_at`, `updated_at`) VALUES
(9, 'Ingénieur en aérospatiale', 'Airbus SAS recherche un ingénieur en aérospatiale pour concevoir et développer des composants et des systèmes aéronautiques de pointe. Vous travaillerez sur des projets d\'envergure internationale.', 'à pourvoir', 7, 5, '2023-12-14 17:30:00', '2023-12-16 18:59:35'),
(10, 'Responsable de la qualité des avions', 'Airbus SAS est à la recherche d\'un responsable de la qualité des avions pour assurer la conformité aux normes de qualité dans la fabrication d\'aéronefs. Vous superviserez les processus de contrôle qualité.', 'à pourvoir', 2, 5, '2023-12-14 18:15:00', '2023-12-16 18:57:36'),
(11, 'Ingénieur en conception automobile', 'Renault Group recherche un ingénieur en conception automobile pour contribuer au développement de nouveaux modèles de véhicules. Vous serez impliqué dans toutes les phases de conception.', 'à pourvoir', 1, 6, '2023-12-14 19:00:00', '2023-12-14 19:00:00'),
(12, 'Chef de projet de production', 'Renault Group est à la recherche d\'un chef de projet de production pour gérer les opérations de fabrication dans nos usines. Vous assurerez l\'efficacité et la qualité de la production.', 'à pourvoir', 1, 6, '2023-12-14 19:45:00', '2023-12-14 19:45:00'),
(14, 'Spécialiste du marketing des produits capillaires', 'L\'Oréal est à la recherche d\'un spécialiste du marketing des produits capillaires pour promouvoir nos gammes de produits pour les cheveux. Vous élaborerez des stratégies marketing et de communication.', 'à pourvoir', 1, 7, '2023-12-14 21:15:00', '2023-12-14 21:15:00'),
(15, 'Ingénieur en conception 3D', 'Dassault Systèmes recherche un ingénieur en conception 3D pour travailler sur des logiciels de modélisation. Vous contribuerez à la conception de produits et d\'environnements virtuels.', 'à pourvoir', 1, 8, '2023-12-14 22:00:00', '2023-12-14 22:00:00'),
(17, 'Responsable de la production alimentaire', 'Danone SA recherche un responsable de la production alimentaire pour superviser la fabrication de produits laitiers et d\'autres produits alimentaires. Vous assurerez la qualité et la sécurité alimentaire.', 'à pourvoir', 1, 9, '2023-12-14 23:30:00', '2023-12-14 23:30:00'),
(18, 'Responsable des ressources humaines', 'Danone SA est à la recherche d\'un responsable des ressources humaines pour gérer les relations avec les employés et mettre en œuvre des politiques RH efficaces.', 'à pourvoir', 1, 9, '2023-12-15 00:15:00', '2023-12-15 00:15:00'),
(19, 'Ingénieur en télécommunications', 'Orange SA recherche un ingénieur en télécommunications pour concevoir et gérer les réseaux de communication. Vous participerez à l\'expansion de nos services de télécommunications.', 'à pourvoir', 1, 10, '2023-12-15 01:00:00', '2023-12-15 01:00:00'),
(20, 'Chef de projet de déploiement réseau', 'Orange SA est à la recherche d\'un chef de projet de déploiement réseau pour planifier et exécuter le déploiement de nouvelles infrastructures de communication. Vous dirigerez une équipe dédiée.', 'à pourvoir', 1, 10, '2023-12-15 01:45:00', '2023-12-15 01:45:00'),
(21, 'Développeur Full Stack', 'AtixIT recherche un développeur Full Stack talentueux pour rejoindre notre équipe dynamique. Vous travaillerez sur des projets variés pour nos clients, en utilisant une technologie de pointe pour concevoir et développer des solutions logicielles innovantes.', 'à pourvoir', 4, 12, '2023-12-15 02:30:00', '2023-12-16 18:57:29'),
(22, 'Chef de Projet Informatique', 'AtixIT recherche un chef de projet informatique expérimenté pour superviser la gestion de projets informatiques pour nos clients. Vous serez responsable de la planification, de la coordination et de l\'exécution des projets, en veillant à ce qu\'ils soient livrés dans les délais et respectent les exigences du client.', 'à pourvoir', 2, 12, '2023-12-15 03:30:00', '2023-12-16 18:57:17');

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `rdv`
--

CREATE TABLE `rdv` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `valide` tinyint(1) DEFAULT '0',
  `ref_entreprise` bigint(20) UNSIGNED NOT NULL,
  `ref_offre` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `rep_entreprise`
--

CREATE TABLE `rep_entreprise` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `poste` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref_entreprise` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ref_user` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `rep_entreprise`
--

INSERT INTO `rep_entreprise` (`id`, `poste`, `ref_entreprise`, `created_at`, `updated_at`, `ref_user`) VALUES
(2, 'Alternant informatique', 12, '2023-12-14 10:07:15', '2023-12-14 10:07:15', 6);

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacite` int(11) NOT NULL,
  `disponibilite` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`id`, `nom`, `capacite`, `disponibilite`, `created_at`, `updated_at`) VALUES
(2, 'salle 2', 9, 1, '2023-12-14 20:41:50', '2023-12-14 20:51:12'),
(3, 'salle 3', 45, 1, '2023-12-14 20:43:03', '2023-12-14 20:43:03'),
(4, 'salle 4', 80, 1, '2023-12-14 20:43:39', '2023-12-14 20:43:39'),
(5, 'salle 5', 500, 1, '2023-12-14 20:43:59', '2023-12-14 20:43:59');

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`id`, `libelle`, `valide`, `created_at`, `updated_at`) VALUES
(1, 'CDI', 1, NULL, NULL),
(2, 'CDD', 0, NULL, NULL),
(3, 'Stage', 1, NULL, NULL),
(4, 'Alternance', 1, NULL, '2023-12-16 16:07:12'),
(7, 'CDD 1an', 0, '2023-12-16 18:59:35', '2023-12-16 18:59:41');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT '0',
  `role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `email_verified_at`, `password`, `valide`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Benazza', 'Mohamed Ayoub', 'a@a.a', NULL, '$2y$10$Bxixpze0O0P7clsIp117oeXoecbuosHyKD3JIsl2CgW4B4tz1R.C2', 1, 'Admin', NULL, '2023-12-14 09:03:49', '2023-12-14 09:03:49'),
(6, 'Sedjai', 'Khatir', 'ent@ent.ent', NULL, '$2y$10$5/D/WKzzIv40G3QgYbJg4ebz36obC5GruVKnYw/khETlaqSydeBlK', 1, 'Entreprise', NULL, '2023-12-14 10:07:15', '2023-12-14 12:37:05'),
(13, 'Rezig', 'Noussaira', 'e@e.e', NULL, '$2y$10$vxnn19.XL4X5/XvH4PgIv.Xph4ut8NDAe4/wMlp/uVDXAKMaQtyR.', 1, 'Etudiant', NULL, '2023-12-14 13:12:04', '2023-12-14 13:12:04');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_ref_user_foreign` (`ref_user`);

--
-- Index pour la table `candidature`
--
ALTER TABLE `candidature`
  ADD PRIMARY KEY (`id`),
  ADD KEY `candidature_ref_etudiant_foreign` (`ref_etudiant`),
  ADD KEY `candidature_ref_offre_foreign` (`ref_offre`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `etudiant_ref_user_foreign` (`ref_user`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evenement_ref_salle_foreign` (`ref_salle`),
  ADD KEY `evenement_ref_admin_foreign` (`ref_admin`),
  ADD KEY `fk_ref_users` (`ref_users`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inscription_ref_etudiant_foreign` (`ref_etudiant`),
  ADD KEY `inscription_ref_evenement_foreign` (`ref_evenement`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `offre`
--
ALTER TABLE `offre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `offre_ref_type_foreign` (`ref_type`),
  ADD KEY `fk_ref_entreprise` (`ref_entreprise`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `rdv`
--
ALTER TABLE `rdv`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rdv_ref_entreprise_foreign` (`ref_entreprise`),
  ADD KEY `rdv_ref_offre_foreign` (`ref_offre`);

--
-- Index pour la table `rep_entreprise`
--
ALTER TABLE `rep_entreprise`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rep_entreprise_ref_entreprise_foreign` (`ref_entreprise`),
  ADD KEY `fk_rep_entreprise_user` (`ref_user`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `candidature`
--
ALTER TABLE `candidature`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `inscription`
--
ALTER TABLE `inscription`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `offre`
--
ALTER TABLE `offre`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `rdv`
--
ALTER TABLE `rdv`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `rep_entreprise`
--
ALTER TABLE `rep_entreprise`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `salle`
--
ALTER TABLE `salle`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ref_user_foreign` FOREIGN KEY (`ref_user`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `candidature`
--
ALTER TABLE `candidature`
  ADD CONSTRAINT `candidature_ref_etudiant_foreign` FOREIGN KEY (`ref_etudiant`) REFERENCES `etudiant` (`id`),
  ADD CONSTRAINT `candidature_ref_offre_foreign` FOREIGN KEY (`ref_offre`) REFERENCES `offre` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `etudiant_ref_user_foreign` FOREIGN KEY (`ref_user`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `evenement_ref_admin_foreign` FOREIGN KEY (`ref_admin`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `evenement_ref_salle_foreign` FOREIGN KEY (`ref_salle`) REFERENCES `salle` (`id`),
  ADD CONSTRAINT `fk_ref_users` FOREIGN KEY (`ref_users`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `inscription_ref_etudiant_foreign` FOREIGN KEY (`ref_etudiant`) REFERENCES `etudiant` (`id`),
  ADD CONSTRAINT `inscription_ref_evenement_foreign` FOREIGN KEY (`ref_evenement`) REFERENCES `evenement` (`id`);

--
-- Contraintes pour la table `offre`
--
ALTER TABLE `offre`
  ADD CONSTRAINT `fk_ref_entreprise` FOREIGN KEY (`ref_entreprise`) REFERENCES `entreprise` (`id`),
  ADD CONSTRAINT `offre_ref_type_foreign` FOREIGN KEY (`ref_type`) REFERENCES `type` (`id`);

--
-- Contraintes pour la table `rdv`
--
ALTER TABLE `rdv`
  ADD CONSTRAINT `rdv_ref_entreprise_foreign` FOREIGN KEY (`ref_entreprise`) REFERENCES `entreprise` (`id`),
  ADD CONSTRAINT `rdv_ref_offre_foreign` FOREIGN KEY (`ref_offre`) REFERENCES `offre` (`id`);

--
-- Contraintes pour la table `rep_entreprise`
--
ALTER TABLE `rep_entreprise`
  ADD CONSTRAINT `fk_rep_entreprise_user` FOREIGN KEY (`ref_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `rep_entreprise_ref_entreprise_foreign` FOREIGN KEY (`ref_entreprise`) REFERENCES `entreprise` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
