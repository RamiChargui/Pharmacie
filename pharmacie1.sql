-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 14 nov. 2022 à 20:19
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pharmacie1`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `nom_compte` varchar(25) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `pwd` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`nom_compte`, `nom`, `prenom`, `adresse`, `pwd`) VALUES
('manel', 'manel', 'selmi', '4000,riadh sousse', '12345'),
('rami', 'rami', 'chargui', 'نهج حمودة باشا 40 نابل 8000', '12345'),
('ramich', 'rami', 'chargui', '4000,riadh sousse', '12345');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `num_com` int(11) NOT NULL,
  `nom_client` varchar(25) NOT NULL,
  `date_commande` varchar(255) NOT NULL,
  `montant` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`num_com`, `nom_client`, `date_commande`, `montant`) VALUES
(24, 'manel', '0000-00-00', 8),
(29, 'ramich', '0000-00-00', 43);

-- --------------------------------------------------------

--
-- Structure de la table `detail_com`
--

CREATE TABLE `detail_com` (
  `id` int(11) NOT NULL,
  `num_com` int(11) NOT NULL,
  `num_prod` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `detail_com`
--

INSERT INTO `detail_com` (`id`, `num_com`, `num_prod`, `quantite`) VALUES
(4, 24, 3, 1),
(8, 29, 3, 1),
(9, 29, 7, 1),
(10, 29, 6, 1);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL DEFAULT 0,
  `quantite` int(11) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `prix`, `quantite`, `categorie`, `image`) VALUES
(1, 'strepsils', 25, 100, 'c2', 'strepsils.jpg'),
(2, 'Boiron', 7, 200, 'c1', 'boiron.jpg'),
(3, 'mag 2', 8, 150, 'c1', 'mag2.jpg'),
(4, 'candazol', 40, 50, 'c1', 'candozal.jpg'),
(5, 'weleda', 13, 150, 'c2', 'weleda.jpg'),
(6, 'kloran', 15, 100, 'c2', 'klorane.jpg'),
(7, 'gifrer', 20, 60, 'c3', 'gifrer.jpg'),
(8, 'roge-cavailles', 16, 100, 'c3', 'roge-cavailles.jpg'),
(15, 'inava', 30, 100, 'c3', 'inava.jpg'),
(20, 'uriage', 20, 100, 'c3', 'uriage.jpg'),
(21, 'augmanta', 19, 20, 'c1', 'arrboute.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`nom_compte`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`num_com`),
  ADD KEY `nom_client` (`nom_client`);

--
-- Index pour la table `detail_com`
--
ALTER TABLE `detail_com`
  ADD PRIMARY KEY (`id`),
  ADD KEY `num_com` (`num_com`),
  ADD KEY `num_prod` (`num_prod`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `num_com` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT pour la table `detail_com`
--
ALTER TABLE `detail_com`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_ibfk_1` FOREIGN KEY (`nom_client`) REFERENCES `clients` (`nom_compte`),
  ADD CONSTRAINT `commandes_ibfk_2` FOREIGN KEY (`num_com`) REFERENCES `detail_com` (`num_com`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `detail_com`
--
ALTER TABLE `detail_com`
  ADD CONSTRAINT `detail_com_ibfk_1` FOREIGN KEY (`num_com`) REFERENCES `commandes` (`num_com`),
  ADD CONSTRAINT `detail_com_ibfk_2` FOREIGN KEY (`num_prod`) REFERENCES `produit` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
