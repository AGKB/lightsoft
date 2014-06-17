SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_category_id` int(11) DEFAULT NULL,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `parent_category_id`, `name`) VALUES
(1, 0, 'Category 1'),
(2, 0, 'Category 2'),
(3, 0, 'Category 3'),
(4, 0, 'autosale'),
(5, 0, 'automarket'),
(6, 0, 'autoshop'),
(7, 1, 'SubCategory 1.1'),
(8, 1, 'SubCategory 1.2'),
(9, 1, 'SubCategory 1.3'),
(10, 1, 'SubCategory 1.4'),
(11, 2, 'SubCategory 2.1'),
(12, 2, 'SubCategory 2.2'),
(13, 2, 'SubCategory 2.3'),
(14, 3, 'SubCategory 3.1'),
(15, 3, 'SubCategory 3.2'),
(16, 4, 'SubCategory 4.1'),
(17, 4, 'SubCategory 4.2'),
(18, 4, 'SubCategory 4.3'),
(19, 4, 'SubCategory 4.4');

