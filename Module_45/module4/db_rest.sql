-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 25, 2013 at 12:34 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_rest`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE IF NOT EXISTS `tbl_food` (
  `food_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `descrip` text NOT NULL,
  `alias` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`food_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`food_id`, `menu_id`, `title`, `price`, `descrip`, `alias`, `img`) VALUES
(1, 1, 'Davy''s classic prawn cocktail', 7.85, 'A selection of prawns, marie rose sauce with a hint of Manzanilla\r\n', 'davys-classic-prawn-cocktail', 'davys-classic-prawn-cocktail.jpg'),
(2, 1, 'Warm grilled goat''s cheese crostini', 5.55, 'On balsamic dressed mixed leaf\r\n', 'warm-grilled-goats-cheese-crostini', 'warm-grilled-goats-cheese-crostini.jpg'),
(3, 1, 'Plate of Scottish smoked salmon', 7.95, 'with lambs leaf dressed with balsamic syrup and pink peppercorns\r\n', 'plate-of-scottish-smoked-salmon', 'plate-of-scottish-smoked-salmon.jpg'),
(4, 2, 'Gordon''s Salad', 9.95, 'Chicory, gorgonzola cheese, pear and dandelion salad with a whole grain mustard dressing\r\n', 'gordons-salad', 'gordons-salad.jpg'),
(5, 2, 'Grilled Salmon Salad', 23.95, 'Mixed greens with sliced avocado, bacon, cherry tomato, onion and Cheshire with toasted sesame citrus vinaigrette\r\n', 'grilled-salmon-salad', 'grilled-salmon-salad.jpg'),
(6, 2, 'Cobb Salad', 21.15, 'Our take on the classic - grilled chicken, hickory-smoked bacon, Stilton cheese, tomato, boiled egg, black olive, English peas, avocado and fresh chives, with a choice of dressing on the side\r\n', 'cobb-salad', 'cobb-salad.jpg'),
(7, 3, 'Grilled goat''s cheese', 7.95, 'Warm goat''s cheese served with roast Mediterranean vegetables and pesto on a toasted ciabatta\r\n', 'grilled-goats-cheese', 'grilled-goats-cheese.jpg'),
(8, 3, 'Cumberland sausage', 7.25, '6oz Cumberland sausage ring served with red onions, in toasted sourdough bloomer\r\n', 'cumberland-sausage', 'cumberland-sausage.jpg'),
(9, 4, 'Kings Wings', 15.95, 'A dozen spiced chicken wings tossed in our special Guinness Hoisin BBQ sauce, with sesame seeds and green onions\r\n', 'kings-wings', 'kings-wings.jpg'),
(10, 4, 'Sausage Rolls', 18.35, 'Banger sausage wrapped in pastry served with our house BBQ and Scotch eggs\r\n', 'sausage-rolls', 'sausage-rolls.jpg'),
(11, 4, 'Bangers and mash', 10.95, 'Cumberland sausages with traditional mashed potatoes and onion gravy\r\n', 'bangers-and-mash', 'bangers-and-mash.jpg'),
(12, 4, 'Fish and chips', 12.95, 'Line caught haddock in beer batter served with chipped potatoes and minted pea puree\r\n', 'fish-n-chips', 'fish-n-chips.jpg'),
(13, 4, 'New season lamb cutlets', 16.25, 'Roasted vegetables, sweet potato and chive mash\r\n', 'new-season-lamb-cutlets', 'new-season-lamb-cutlets.jpg'),
(14, 4, 'Side orders', 2.85, '"Choose from:<br/>\r\n- chipped potatoes or fries<br/>\r\n- Jersey Royal potatoes<br/>\r\n- traditional mash<br/>\r\n- seasonal vegetable selection<br/>\r\n- green beans<br/>\r\n- mixed leaf salad with house dressing<br/>\r\n(Price is for each portion)"\r\n', 'side-orders', 'side-orders.jpg'),
(15, 5, 'T-Bone steak', 28.95, '400g served on the bone. Made up of both sirloin and fillet offering you both the tenderness of the fillet and the flavour of the sirloin\r\n', 't-bone-steak', 't-bone-steak.jpg'),
(16, 5, 'Sirloin steak', 23.55, 'A juicy, tasty and tender cut of 240g fully trimmed and aged for 21 days\r\n', 'sirloin-steak', 'sirloin-steak.jpg'),
(17, 5, 'Ribeye steak', 20.15, 'Rich marbling is the secret to this succulent and tasty cut of 220g, aged for 28 days\r\n', 'ribeye-steak', 'ribeye-steak.jpg'),
(18, 6, 'English cheese board', 9.75, 'A selection of four British cheeses served with biscuits and green tomato and apple chutney\r\n', 'english-cheese-board', 'english-cheese-board.jpg'),
(19, 6, 'Chocolate tart', 5.85, 'Delicious tart with clotted cream and raspberry coulis\r\n', 'chocolate-tart', 'chocolate-tart.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food_tag`
--

CREATE TABLE IF NOT EXISTS `tbl_food_tag` (
  `tag_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  PRIMARY KEY (`tag_id`,`food_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_food_tag`
--

INSERT INTO `tbl_food_tag` (`tag_id`, `food_id`) VALUES
(1, 1),
(2, 1),
(3, 2),
(3, 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE IF NOT EXISTS `tbl_menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`menu_id`, `name`, `link`, `image`) VALUES
(1, 'Starters', 'starters', 'davys-classic-prawn-cocktail.jpg'),
(2, 'Salads', 'salads', 'gordons-salad.jpg'),
(3, 'Sandwiches', 'sandwiches', 'grilled-goats-cheese.jpg'),
(4, 'Main Courses', 'main-courses', 'kings-wings.jpg'),
(5, 'Beef', 'beef', 't-bone-steak.jpg'),
(6, 'Desserts', 'desserts', 'english-cheese-board.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rates`
--

CREATE TABLE IF NOT EXISTS `tbl_rates` (
  `food_id` int(11) NOT NULL,
  `mark` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_rates`
--

INSERT INTO `tbl_rates` (`food_id`, `mark`) VALUES
(1, 2),
(1, 3),
(1, 5),
(1, 4),
(4, 5),
(4, 5),
(4, 5),
(4, 5),
(2, 5),
(3, 3),
(1, 2),
(1, 5),
(1, 5),
(1, 5),
(4, 5),
(3, 1),
(3, 1),
(5, 1),
(5, 1),
(3, 1),
(9, 5),
(18, 5),
(19, 5),
(17, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tag`
--

CREATE TABLE IF NOT EXISTS `tbl_tag` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_tag`
--

INSERT INTO `tbl_tag` (`tag_id`, `name`) VALUES
(1, 'cocktail'),
(2, 'fish'),
(3, 'balsamic'),
(4, 'bacon'),
(5, 'Cumberland');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `email`, `password`) VALUES
(2, 'admin', '4187c4575f19a0b34cb6358c5590a449');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
