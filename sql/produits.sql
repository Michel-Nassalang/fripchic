-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 03 mai 2021 à 22:28
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `site-e-commerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(250) NOT NULL,
  `titre` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `prix` int(11) NOT NULL,
  `n1` varchar(11) NOT NULL,
  `n2` varchar(11) NOT NULL,
  `n3` varchar(11) NOT NULL,
  `n4` varchar(11) NOT NULL,
  `categorie` varchar(250) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `titre`, `description`, `prix`, `n1`, `n2`, `n3`, `n4`, `categorie`, `stock`) VALUES
(4, 'Lacoste', 'Lacoste bleue avec épaule bien bombée', 2000, 'M', 'S', 'L', 'XL', 'culotte', 10),
(5, 'culotte fresh', 'Culotte pour se décontracter', 1500, 'M', 'S', 'L', 'XL', 'culotte', 15),
(6, 'Robe', 'La robe d\'une princesse ', 7000, 'M', 'S', 'L', 'XL', 'robe', 15),
(10, 'chemise unisex', 'Des chemises pour hommes gentlemen à s\'offrir à bas prix', 4500, 'M', 'S', 'SS', 'XL', 'chemise', 35),
(12, 'Lacoste en coton', 'deslacostes ultra légers avec une bonne adaptation', 3000, 'XLL', 'M', 'S', 'XL', 'lacoste', 12),
(13, 'Pull noir', 'Des pull noirs unisex très abordables', 7500, 'XL', 'M', 'S', 'L', 'Pull-Over', 16),
(14, 'Short léger', 'Des shorts multicouleurs très légers pour la chaleur', 1000, 'M', 'L', 'S', 'X', 'Shorts', 38),
(15, 'Calecon Homme', 'Caleçon pour homme transpirant beaucoup', 750, 'S', 'L', 'XL', 'M', 'Sous Vêtements', 15),
(16, 'T-shirts', 'Des t-shirts de couleurs uniques avec une variété imagiginaire', 1500, 'M', 'L', 'S', 'XL', 'T-shirts', 30),
(17, 'Costume homme', 'Costume élégent pour homme', 45000, 'M', 'S', 'XL', 'L', 'Costume', 4),
(18, 'Sac de sport', 'Des sacs de sports adidas de pure qualité à des prix introuvables', 8500, 'M', 'XL', 'L', 'S', 'Sac', 10),
(19, 'Chemise fleurette', 'Un univers plein de couleurs vives et marquantes est le monde attire la joie et la confiance. Avec ces chemises vous osez trouver ce univers.', 4500, 'S', 'M', 'XL', 'L', 'chemise', 21),
(20, 'Pri-Nike', 'Des chaussures nike de qualité avec des designs exceptionnels', 12500, '41', '39', '42', '40', 'Chaussures', 13),
(21, 'Crampons', 'Des crampons pour professionnels', 17500, '42', '41', '39', '43', 'Chaussures', 9),
(22, 'Capuche flex', 'Une  capuche facile à porter et fait à base de coton', 1500, '5', '7', '4', '9', 'Chapeau', 11),
(23, 'Jacket noir', 'Des jackets noirs foncé à base de peau d\'animals', 9000, 'M', 'S', 'L', 'XL', 'Pull-Over', 15),
(24, 'Shorts rouges', 'Des shorts rouges très légers qui permettent de se détendre en période de chaleur', 2000, 'M', 'S', 'L', 'SS', 'Shorts', 11),
(25, 'Nike Air', 'Les nouvelles chaussures Nike de nos jours qui s\'attachent automatiquement à nos pieds avec des systèmes très avancés pour chaussures. Ce sont les chaussures fantastiques à l\'ère actuelle', 35000, '41', '39', '43', '44', 'Chaussures', 5),
(27, 'Jacket de Sport', 'Des jackets de sportifs unisex pour se protèger', 9000, 'M', 'S', 'XL', 'L', 'Pull-Over', 9),
(28, 'Sous Vêtements', 'Des sous vêtements pour femmes à bas prix et bon qualité, c\'est à base de coton et est fine et léger.', 500, '12', '14', '13', '9', 'Sous Vêtements', 15),
(29, 'T-shirts col rond', 'Des t-shirts très jolis avec la marque North Face qui est comme vous le connaissez une marque de qualité. Ce sont des t-shirts unisex', 2500, 'M', 'L', 'S', 'XL', 'T-shirts', 15),
(30, 'Baskets Nike', 'Des baskets Nike pour des sportifs du basket ball avec des talons repoussants et très rebondissants', 30000, '42', '41', '39', '44', 'Chaussures', 7),
(31, 'Liquete', 'Des liquêtes pull en jeans très importants pour la fraicheur. Les pulls en jeans sont à la portée de la mode car ils peuvent être portés avec n\'importe quoi', 11000, 'M', 'L', 'S', 'XL', 'jeans', 15),
(32, 'Crop Top ', 'Des chemises coupées à partir du nombril. Habits de plage très sexy qui permet de se mettre dans toutes ses formes et rondeurs.', 4500, 'M', 'XL', 'S', 'L', 'chemise', 14),
(33, 'T-shirts Adidas', 'Des t-shirts flottants et ultra légers et permettrant de se détendre dans des moments de chaleur ou de canicule. Fais à base de coton pure et léger.', 1500, 'M', 'XL', 'S', 'L', 'T-shirts', 15),
(34, 'Pull en cuir', 'Pull en cuir qui permet de se protèger efficacement du froid. Le pull est fait à l\'intérieur en soie pour ne pas déranger ou mettre mal à l\'aise celui qui le porte', 12000, 'M', 'L', 'S', 'XL', 'Pull-Over', 15),
(35, 'Coupé Nike', 'Des coupés nike de couleurs vives pour faire le sport ou pour marcher. Ce sont des chaussures très légers et compatibles avec toute genre de pieds', 8500, '43', '39', '41', '42', 'Chaussures', 13),
(36, 'Nike Baskets', 'Des baskets Nike pour des sportifs du basket ball avec des talons repoussants et très rebondissants', 25000, '44', '41', '39', '42', 'Chaussures', 15),
(37, 'Pull road', 'Des pull en pure coton qui permettent de se protèger efficacement du froid pendant les périodes d\'êxtremes fraicheur.', 12500, 'M', 'S', 'L', 'XL', 'Pull-Over', 9),
(38, 'Bas pour femmes', 'Des bas pour femmes pour des moments de détente ou de sport. C\'est un bon moyen de retrouver sa souplesse. Ca permet de rendre aussi toutes ses formes et rondeurs', 3500, 'M', 'L', 'S', 'XL', 'Sous Vêtements', 10),
(39, 'Bonnet rouge swag', 'Des bonnets swagger boy qui protèjent et donne un confort maximal au niveau de la tête. C\'est un bonnet assez stylé pour être porté avec des vêtements de luxe', 2500, '8', '7', '9', '11', 'Chapeau', 15),
(40, 't-shirts gris', 'Des t-shirts gris unicolore qui sont très légers pour des moments de relaxation bien profitante', 1500, 'S', 'XL', 'M', 'L', 'T-shirts', 13),
(41, 'Fleurette chemise', 'Des chemises de fleurettes pour hommes avec un prix très abordable', 2500, 'M', 'XL', 'S', 'L', 'chemise', 15),
(42, 'Chemise veste', 'Des chemises blanches pour des vestes', 5000, 'L', 'M', 'S', 'XL', 'chemise', 10),
(43, 'Hall', 'Des chaussures hall de classes avec des figurines très jolies et attirantes', 8500, '41', '39', '43', '40', 'Chaussures', 11),
(44, 'Pull rouge', 'Des pull rouges avec des dessins mortels adéquats avec tout genre d\'habillements', 6500, 'M', 'XL', 'S', 'L', 'Pull-Over', 9),
(45, 'Chemise carreaux', 'Des chemises carreaux pour les filles sexy. Ce sont des chemises à porter en hiver avec de jolis jeans', 5000, 'M', 'L', 'S', 'XL', 'chemise', 11);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
