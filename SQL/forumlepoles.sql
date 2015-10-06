-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 06 Octobre 2015 à 09:56
-- Version du serveur :  5.6.25
-- Version de PHP :  5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `forumlepoles`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Drama'),
(2, 'Comedy'),
(3, 'SF & Fantasy');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(10) unsigned NOT NULL,
  `creation` datetime NOT NULL,
  `creatorId` int(10) unsigned NOT NULL,
  `topicId` int(10) unsigned NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `messages`
--

INSERT INTO `messages` (`id`, `creation`, `creatorId`, `topicId`, `message`) VALUES
(1, '2015-09-16 15:11:47', 4, 1, 'Cool !'),
(2, '2015-09-16 15:57:23', 1, 3, 'Cool !'),
(3, '2015-09-16 16:33:50', 1, 4, 'Quatre mois aprÃ¨s le tragique accident de voiture qui a tuÃ© leurs parents, Elena Gilbert, 17 ans, et son frÃ¨re Jeremy, 15 ans, essaient encore de s''adapter Ã  cette nouvelle rÃ©alitÃ©. Belle et populaire, l''adolescente poursuit ses Ã©tudes au Mystic Falls High en s''efforÃ§ant de masquer son chagrin. Elena est immÃ©diatement fascinÃ©e par Stefan et Damon Salvatore, deux frÃ¨res que tout oppose. Elle ne tarde pas Ã  dÃ©couvrir qu''ils sont en fait des vampires...'),
(4, '2015-09-16 16:33:55', 1, 4, 'Quatre mois aprÃ¨s le tragique accident de voiture qui a tuÃ© leurs parents, Elena Gilbert, 17 ans, et son frÃ¨re Jeremy, 15 ans, essaient encore de s''adapter Ã  cette nouvelle rÃ©alitÃ©. Belle et populaire, l''adolescente poursuit ses Ã©tudes au Mystic Falls High en s''efforÃ§ant de masquer son chagrin. Elena est immÃ©diatement fascinÃ©e par Stefan et Damon Salvatore, deux frÃ¨res que tout oppose. Elle ne tarde pas Ã  dÃ©couvrir qu''ils sont en fait des vampires...'),
(5, '2015-10-05 15:45:26', 1, 24, 'spaceship'),
(6, '2015-10-05 17:09:18', 1, 19, 'Trop'),
(7, '2015-10-05 17:24:44', 1, 18, 'trop');

-- --------------------------------------------------------

--
-- Structure de la table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `id` int(10) unsigned NOT NULL,
  `creation` datetime NOT NULL,
  `creatorId` int(10) unsigned NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(2047) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `categorieId` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `topics`
--

INSERT INTO `topics` (`id`, `creation`, `creatorId`, `title`, `description`, `categorieId`) VALUES
(3, '2015-09-16 15:09:06', 3, 'Shameless', 'Pour les enfants Gallagher, la vie est tout sauf un long fleuve tranquille... Fiona, l''aÃ®nÃ©e, Ã¢gÃ©e de 20 ans, Ã©lÃ¨ve du mieux possible sa soeur et ses quatre frÃ¨res. Leur mÃ¨re, Monica, les a abandonnÃ©s pour refaire sa vie avec une femme. Quant Ã  leur pÃ¨re, Frank, paumÃ©, chÃ´meur et alcoolique, il dilapide l''argent des allocations familiales..', 1),
(4, '2015-09-16 15:10:41', 4, 'The Vampire Diaries', 'Quatre mois aprÃ¨s le tragique accident de voiture qui a tuÃ© leurs parents, Elena Gilbert, 17 ans, et son frÃ¨re Jeremy, 15 ans, essaient encore de s''adapter Ã  cette nouvelle rÃ©alitÃ©. Belle et populaire, l''adolescente poursuit ses Ã©tudes au Mystic Falls High en s''efforÃ§ant de masquer son chagrin. Elena est immÃ©diatement fascinÃ©e par Stefan et Damon Salvatore, deux frÃ¨res que tout oppose. Elle ne tarde pas Ã  dÃ©couvrir qu''ils sont en fait des vampires...', 3),
(16, '2015-09-16 16:40:45', 1, 'Girls by Lena Dunham', 'L''entrÃ©e dans la vie active de quatre jeunes filles d''une vingtaine d''annÃ©es, de leurs humiliations Ã  leurs rares triomphes. Hannah, l''Ã©ternelle stagiaire, rÃªve de devenir Ã©crivain ; Marnie, sexy et un peu garce sur les bords, ne manque pas d''ambition; et Jessa, hippie dans l''Ã¢me, aimerait gagner sa vie de son art...', 2),
(17, '2015-09-16 16:41:20', 1, 'Grey''s Anatomy', 'Meredith Grey, fille d''un chirurgien trÃ¨s rÃ©putÃ©, commence son internat de premiÃ¨re annÃ©e en mÃ©decine chirurgicale dans un hÃ´pital de Seattle. La jeune femme s''efforce de maintenir de bonnes relations avec ses camarades internes, mais dans ce mÃ©tier difficile la compÃ©tition fait rage...', 1),
(18, '2015-09-18 16:45:13', 1, 'How to get away with murder', 'qdgb', 1),
(19, '2015-09-23 10:20:16', 1, 'Mr Robot', '<p>C''est trop g&eacute;nial !</p>', 1),
(20, '2015-09-23 12:20:59', 1, 'Arrow', '<p><strong>Skills:</strong></p>\r\n<ul>\r\n<li>1</li>\r\n<li>2</li>\r\n<li>3</li>\r\n<li>4</li>\r\n</ul>', 3),
(24, '2015-09-23 13:18:02', 1, 'The 100', '<p>spaceshiep</p>', 3);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `email` varchar(127) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(127) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pseudo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `pseudo`, `avatar`) VALUES
(1, 'm.arconte@live.fr', '000', 'Mathilda', 'http://www.karenhealey.com/wp-content/uploads/2012/12/olive-penderghast-I-love-you.jpg'),
(3, 'tom@gmail.com', '000', 'Tom', ''),
(4, 'elias@gmail.com', '000', 'Elias', 'http://cdn.playbuzz.com/cdn/56ab0e60-6392-4a55-8bb6-fdc0b412370a/5bccbb27-066f-404f-8761-6223a5908882.jpg'),
(5, 'charlie@gmail.com', '000', 'Charlie', ''),
(6, 'angus@gmail.com', '000', 'Augustus ', ''),
(8, 'olive@mail.com', '000', 'Olive', 'http://www.film.com/wp-content/uploads/2009/11/40081817-40081820-large.jpg'),
(10, 'jfreak@mail.com', '000', 'Marianne', 'http://www.film.com/wp-content/uploads/2009/11/40081859-40081862-large.jpg'),
(11, 'chuck@mail.com', '000', 'Woodchuck', 'http://www.hotflick.net/flicks/2010_Easy_A/010EYA_Penn_Badgley_002.jpg'),
(12, 'fich@mail.com', '000', 'Mr Fincham', 'http://www.wearysloth.com/Gallery/ActorsN/48290.gif'),
(13, 'stin@mail.com', '000', 'Barney Stinson', 'http://www.themost10.com/wp-content/uploads/2012/06/Barney-Stinson-6.jpg?359737');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creatorId` (`creatorId`),
  ADD KEY `topicId` (`topicId`);

--
-- Index pour la table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creatorId` (`creatorId`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
