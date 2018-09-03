-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2018 at 07:47 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstone2`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Shirt'),
(2, 'Accessories'),
(3, 'Shoes'),
(4, 'Jersey');

-- --------------------------------------------------------

--
-- Table structure for table `leagues`
--

CREATE TABLE `leagues` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `transaction_code` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) DEFAULT NULL,
  `status_id` int(11) NOT NULL DEFAULT '1',
  `payment_method_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `transaction_code`, `address`, `contact_number`, `date_created`, `user_id`, `status_id`, `payment_method_id`) VALUES
(12, 'TR5b8bef1a685a5', 'ssdfghg', 'NULL', '2018-09-02 22:09:42', 10, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`) VALUES
(1, 'Cash On Delivery'),
(2, 'Paypal');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `team_id` int(11) DEFAULT NULL,
  `league_id` int(11) DEFAULT NULL,
  `jersey_number` int(11) NOT NULL,
  `transaction_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `price` decimal(13,2) NOT NULL,
  `description` text NOT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image_path`, `price`, `description`, `category_id`) VALUES
(30, 'Ankle Support', 'assets/images/5b8ca5b6d0e0b3691c84d5efd3379d69f545e20ed184aa3088ce7ankle.jpg', '734.00', 'LP Ankle Support', 2),
(31, 'Nike Jersey (Giannis)', 'assets/images/5b8ca6db2050bb140fa2674e8bda17cd57c3fa10052d8fdc59665antetokounpo.jpg', '3595.00', 'NBA Giannis Antetokounmpo Jersey', 4),
(32, 'Nike Jersey (Classic Carter)', 'assets/images/5b8ca7317963f87f68e1407c5b1d86821869651a8c9c3f1e8cc64carter classic.jpg', '3595.00', 'Vince \"Half-Animal, Half-Amazing\" Carter Jersey', 4),
(33, 'Nike Jersey (Stephen Curry )', 'assets/images/5b8ca76d6204ee05333dfaa2530c1732c68bf58ce292406c603b3curry.jpg', '3595.00', 'Stephen Curry Official Jersey', 4),
(34, 'UA Curry 1', 'assets/images/5b8ca7e7465e08d9f61f8129afa753112ab11ef90795e3a88368bcurry1.jpg', '7995.00', 'Stephen Curry 1st signature shoes', 3),
(35, 'UA Curry 2', 'assets/images/5b8ca80a501c12a84ea14d6e3e1487e3a1541230ebdcbd4fd7041curry2.jpg', '7995.00', 'Stephen Curry 2nd signature shoes', 3),
(36, 'Addidas Drose 8', 'assets/images/5b8ca83920909dafb36e8071406b2a972a7bc13dc0a5203df1a80drose 8.jpg', '5995.00', 'Derrick Rose 8th signature shoes', 3),
(37, 'Addidas Harden 1', 'assets/images/5b8ca8711a569322ce46d124f897dbc2f428215a464f7b9b900aeharden 1.jpg', '6995.00', 'James Harden 1st signature shoes', 3),
(38, 'NBA Headband', 'assets/images/5b8ca8b4357cf289c0da4763a47acb2ef1fd0db4d32c2a4dc3733head band.jpg', '995.00', 'NBA Headband', 2),
(39, 'Nike Jersey (Kyrie)', 'assets/images/5b8ca90bddab9fec1770525c055bea899df22ec27ff5a3b355b6airving.jpg', '3595.00', 'Kyrie Irving the uncle drew official jersey', 4),
(40, 'Jcube Shirt black', 'assets/images/5b8ca96ebe12a7fefe6761a10f844b8cf9b601dc93a7fd7de67b5jcube shirt black.jpg', '299.00', 'Jcube has been doing very great. After a successful leagues they organized, they put up this Jcube shirt for sale.', 1),
(41, 'Nike Shirt (Just Do It)', 'assets/images/5b8ca9aef3ca94545760cceaab353b35ed4c957757c99a0cf3e38just do it.jpg', '1395.00', 'No Excuses just do it', 1),
(42, 'McDavid Knee Pad', 'assets/images/5b8caa10d5e9ffca4b8b81a29b3d48960950f08391e60a17bf7f6knee pad.jpg', '525.00', 'Go hard or go home. Do not lose your balls, go for lose balls.', 2),
(43, 'Nike Kobe 10', 'assets/images/5b8caa5b23421f68a71145f3cbd5f2e2ed76c15853d7ff175431fkobe 10.jpg', '9895.00', 'Kobe Bryant 10th signature shoes.', 3),
(44, 'Nike Jersey (Alternate Mamba)', 'assets/images/5b8caa97971fdf1a67f21fbd762be140481b9e6ec90450ad8f548kobe alternate.jpg', '3959.00', 'Kobe the mamba Bryant Official alternate Jersey', 4),
(45, 'Kobe AD', 'assets/images/5b8caaeeee931e81101d745e2c9f5404dfa4b68d975e23c395954kobeAD.jpg', '9895.00', 'Kobe Bryant After Dominating shoes', 3),
(46, 'Anta KT Shoes', 'assets/images/5b8cab1b2abd6656b8338f125996a642896cae215b01d1bf2eed2KT marvel.jpg', '4995.00', 'Klay Thompson Marvel Edition Signature shoes', 3),
(47, 'Anta Klay Thompson Shoes 1', 'assets/images/5b8cab4a84a6d8f327983700d54306a828c2fda54602185a71f6cKT1.jpg', '3995.00', 'Klay Thompson 1st signature shoes ', 3),
(48, 'Nike Lebron James 15', 'assets/images/5b8cab71a3827276d635d6f156a27b2e9630030d2cee795560bf5lebron 15 ghost.jpg', '10995.00', 'Lebron 15 Ghost', 3),
(49, 'Nike Jersey (The King)', 'assets/images/5b8cabbdccfd9d1ad6fa381076c0fba09bb46ae1b481231cb2b55lebron.jpg', '3595.00', 'Lebron The King Jersey playing for the Holywood. Laker home jersey.', 4),
(50, 'Nike Lebron Agimat', 'assets/images/5b8cac101ffa7f18a7bb0cbdfca2d2b6ac63b5b82226cf8edb684lebronsoldier agimat.jpg', '12995.00', 'Inspired by agimat of Filipino myth. Lebron and Nike released the Lebron Soldier Agimat.', 3),
(51, 'Addidas Lillard 1', 'assets/images/5b8cac363c908c6556a8893aa7ac5bdbaf099571e9e2bc53bbf15lillard.jpg', '6795.00', 'What time is it? It is Dame time.', 3),
(52, 'Nike Shirt (Mamba Shirt)', 'assets/images/5b8cac6f02da1bc87c98069a592bdeb8593bb703f8c2148a01bebmamba.jpg', '1395.00', 'The Mamba Shirt.', 1),
(53, 'Nike Jersey (Classic McGrady)', 'assets/images/5b8cafa3b41db9fde4c6739c69a5b3b785d47101e8ededb56f8f5mcgrady classic.jpg', '1395.00', 'Tracy McGrady Classic Jersey', 4),
(54, 'Molten GG7X', 'assets/images/5b8cb05ab052f861a431f5081fe95d529bf41cca5d4bf5aa0c4c5moltengg7x.jpg', '1918.00', 'PBA and FIBA Official Ball.', 2),
(55, 'UA Mouth Guard', 'assets/images/5b8cb0a5dbc6269d91854d8f6d4825aaccf791156a5cc11cd3de2mouth guard.jpg', '1199.00', 'Under Armor Mouth Guard like Steph Curry', 2),
(56, 'Nike Jersey (Tatum)', 'assets/images/5b8cb0cce8532e3afbad7c05d5ca713570b73b2a187b632c0312atatum.jpg', '1595.00', 'Jayson Tatum Official Jersey', 4),
(57, 'Li Ning Dwayne Wade', 'assets/images/5b8cb1301bf21c89eaf520783f2e9896bf593fa418f5efd049eccwade.jpg', '4599.00', 'Dwayne Wade father prime.', 3);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'user'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`) VALUES
(1, 'Processing'),
(2, 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '1',
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role_id`, `first_name`, `last_name`, `email`, `contact_number`, `address`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 2, 'Admin', 'Bautista', 'jayrbautista26@gmail.com', '09153582091', '23 happyst. bgy happy, happy city'),
(10, 'user', '12dea96fec20593566ab75692c9949596833adc9', 1, 'User', 'Bautista', 'jayrbautista261@gmail.com', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leagues`
--
ALTER TABLE `leagues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transaction_code` (`transaction_code`),
  ADD KEY `orders_fk0` (`user_id`),
  ADD KEY `orders_fk1` (`status_id`),
  ADD KEY `orders_fk2` (`payment_method_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_fk0` (`product_id`),
  ADD KEY `order_details_fk1` (`order_id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`),
  ADD KEY `players_fk0` (`user_id`),
  ADD KEY `players_fk1` (`team_id`),
  ADD KEY `players_fk2` (`league_id`),
  ADD KEY `players_fk3` (`transaction_code`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `products_fk0` (`category_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `users_fk0` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `leagues`
--
ALTER TABLE `leagues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_fk0` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_fk1` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_fk2` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_methods` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_fk0` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_fk1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_fk0` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `players_fk1` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `players_fk2` FOREIGN KEY (`league_id`) REFERENCES `leagues` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `players_fk3` FOREIGN KEY (`transaction_code`) REFERENCES `orders` (`transaction_code`) ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_fk0` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_fk0` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
