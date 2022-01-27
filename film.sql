-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : jeu. 27 jan. 2022 à 22:29
-- Version du serveur : 10.6.5-MariaDB
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `film`
--

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

DROP TABLE IF EXISTS `film`;
CREATE TABLE IF NOT EXISTS `film` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` int(11) NOT NULL,
  `numvoters` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`id`, `nom`, `description`, `score`, `numvoters`) VALUES
(1, 'Titanic', 'It tells the story of two young passengers on the liner Titanic in April 1912. ... They meet by chance during Rose\'s suicide attempt and live a love story quickly disturbed by the sinking of the ship.', 9, 15),
(2, 'Her', 'Los Angeles, in the near future. Theodore Twombly, a sensitive man with a complex character, is inconsolable following a difficult breakup. He then acquired an ultra-modern computer program, capable of adapting to the personality of each user.', 7, 10),
(3, 'Twilight', 'Bella Swan déménage pour aller vivre chez son père à Forks, dans l\'État de Washington. Là, elle est fascinée par un jeune homme mystérieux de son âge, Edward et par son étrange famille. Elle va découvrir qu\'Edward et sa famille sont en fait des vampires.', 10, 12),
(4, 'You', 'an American drama series developed by Greg Berlanti and Sera Gamble for the American channel Lifetime with Penn Badgley, Elizabeth Lail and Shay Mitchell.', 5, 20),
(5, 'Maid', 'Fleeing an abusive relationship, a young mother becomes a housekeeper and struggles to provide for her daughter, hoping for a better future. Watch as much as you want.', 6, 30),
(6, 'Room', 'Jack\'s world. Platonic fable surrounded by darkness, Room does not lack audacity but never transcends its condition as a product cut to the wire for international festivals. Summary: Five-year-old Jack lives alone with his mother, Ma. She teaches him to play, laugh and understand the world around him.', 7, 24),
(7, 'film d\'essai', 'film bien je le recommande ', 9, 32),
(9, 'dynastieessaie', 'The series follows the life of the wealthy and powerful Carrington family in Atlanta, Georgia, USA. Fallon Carrington returns to the family home with the goal of being chosen as the new CEO of her father\'s company.', 2, 10),
(11, 'may', 'A socially awkward veterinary assistant with a lazy eye and obsession with perfection descends into depravity after developing a crush on a boy with perfect hands.', 4, 23),
(12, 'Guardians of the Galaxy', 'Twilight Cove, a small forgotten town, is besieged by hideous creatures summoned into our dimension. It\'s only a matter of time before the army of creatures attacks the rest of civilization and wreaks havoc upon the world. At dusk, a', 3, 20),
(13, 'WISH YOU WERE HERE', 'Dr. Paul Kersey is an experienced trauma surgeon, a man who has spent his life saving lives. After an attack on his family, Paul embarks on his own mission for justice.', 8, 25),
(14, 'James Gunn', 'Young James struggles as the outsider kid at his school. His teacher, Mr. Sutherland, the only person he feels he can connect with. When James finally puts a voice to his feelings, Mr. Sutherland\'s response isn\'t what James had hoped', 1, 2),
(15, 'test zest', 'In 1985, a gay dance understudy hopes for his on-stage chance while fearing the growing AIDS epidemic.', 2, 2),
(16, 'squid game', 'A washed-up standup comedian attempts to navigate life through a series of dismal attempts to reclaim success.', 3, 3),
(17, 'casa', 'Scheming on a way to save their father\'s ranch, the Alvarez brothers find themselves in a war with Mexico\'s most feared drug lord.', 5, 9),
(18, 'Room', 'Held captive for 7 years in an enclosed space, a woman and her young son finally gain their freedom, allowing the boy to experience the outside world for the first time.', 7, 24),
(19, 'doctor', 'When his fiancee\'s niece is kidnapped, a stoic army doctor and his motley team launch a rescue operation in which they need both wit and their wits.', 6, 23),
(20, 'Scream', 'A year after the murder of her mother, a teenage girl is terrorized by a new killer, who targets the girl and her friends by using horror films as part of a deadly game.', 1, 5),
(23, 'good doctor', 'Will Hunting, a janitor at M.I.T., has a gift for mathematics, but needs help from a psychologist to find direction in his life.', 9, 30),
(24, 'never say never', 'James Bond sets out to stop a media mogul\'s plan to induce war between China and the UK in order to obtain exclusive global media coverage.', 8, 10);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
