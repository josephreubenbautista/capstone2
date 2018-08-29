-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2018 at 09:56 AM
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
  `date_created` datetime NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status_id` int(11) NOT NULL,
  `payement_method_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(2, 'Jcube Shirt black', 'assets/images/5b864535514d07fefe6761a10f844b8cf9b601dc93a7fd7de67b5jcube shirt black.jpg', '299.00', 'Jcube Official Shirt Color Black', 1),
(3, 'Just Do It', 'assets/images/5b864566d20f06e9f2914eed05db12e40081115ef734ec6ee31bejust do it.jpg', '850.00', 'Nike \"Just Do It\" shirt', 1),
(4, 'Mamba', 'assets/images/5b8645a25adfb32caf7a5ee66e3062759e1db0f4593888f364d77mamba.jpg', '1399.00', 'Kobe Bryant Logo Nike shirt', 1),
(5, 'LP Ankle Support', 'assets/images/5b8645d3e67f9570aa24142fa0efb16b65c7322f281d717c51b51ankle.jpg', '350.00', 'OEM quality Ankle Support', 2),
(6, 'Antetokounmpo Jersey', 'assets/images/5b864628dfbb0f10a02ffeb3e3ad7a399c0f80fe403ceac2b8319antetokounpo.jpg', '1299.00', 'Milwaukee Bucks- Giannis Antetokounmpo Swingman Jersey', 4),
(7, 'Carter Jersey', 'assets/images/5b864664bdb3b45ca4cdde6222e8aa9e3fcd83ee8b2ade33c071ccarter classic.jpg', '1399.00', 'Vinsanity Toronto Raptors Classic Jersey', 4),
(8, 'Curry Jersey', 'assets/images/5b8646a1a5cb7cd7d905b536e6eb2261266d3e45d9981ac32ff2ecurry.jpg', '1499.00', 'Stephen Curry-Golden State Warriors Swingman Jersey', 4),
(9, 'Curry 1.0', 'assets/images/5b8646d05bec727b0e98e711001c256881d5116559c4741432e2acurry1.jpg', '6586.00', 'Stephen Curry-Signature Shoes v.1', 3),
(10, 'Curry 2.0', 'assets/images/5b8646f7ee9789e517c4c7a8035409820568da979a25437ba213fcurry2.jpg', '8995.00', 'Stephen Curry-Signature Shoes v 2.0', 3),
(11, 'DRose 8', 'assets/images/5b86471fcf7f4843a6823929f81959171af2562b993b2d5fb544bdrose 8.jpg', '4579.00', 'Derrick Rose The Return Forever', 3),
(12, 'Harden 1', 'assets/images/5b864741f02f0945fb48c918152311b4aad96c38ad1f48fc56b41harden 1.jpg', '7995.00', 'James Harden Signature Shoes', 1),
(13, 'NBA Headband', 'assets/images/5b86475a09b4b289c0da4763a47acb2ef1fd0db4d32c2a4dc3733head band.jpg', '550.00', 'NBA Headband', 2),
(14, 'Kyrie Jersey', 'assets/images/5b864788a07249501578ebeb1b2a3ad3add3de15658a89dc2a408irving.jpg', '1450.00', 'Uncle Drew Boston Celtics Jersey', 4),
(15, 'Knee Pad', 'assets/images/5b8647bbd77dfcaa23d4e8e77e05e35ed2225574a3da21dc0dcd2knee pad.jpg', '500.00', 'McDavid Knee Pad', 2),
(16, 'Kobe 10', 'assets/images/5b8647e2a72f7e31d78470807ad53c6da17de12c7117d485c2ea7kobe 10.jpg', '6995.00', 'Kobe Bryant Signature shoes v10', 1),
(17, 'Kobe Jersey', 'assets/images/5b864850512a7a060aaa3791bd6e48f16d0f885d58faed56f3167kobe alternate.jpg', '1699.00', 'Kobe Alternate Jersey', 4),
(18, 'Kobe AD', 'assets/images/5b864886f3300e81101d745e2c9f5404dfa4b68d975e23c395954kobeAD.jpg', '9995.00', 'After His retirement Kobe AD was released', 3),
(19, 'Klay Thompson', 'assets/images/5b8648bd2d748ae313f7b3fd8f493d6b9b19827099c8e8dadebd2KT marvel.jpg', '4579.00', 'Klay Thompson Signature shoes Collaboration with Marvel ', 3),
(20, 'KT 1', 'assets/images/5b8648e5870981755f29c60909f833ddf1128ac6ab5cfceb11522KT1.jpg', '4669.00', 'Klay Thompson Signature shoes version1', 1),
(21, 'Lebron 15', 'assets/images/5b8649091d6f6e6c54fbffd2019ee41324c89bd0cc9a973b923cflebron 15 ghost.jpg', '7995.00', 'Lebron James Ghost 15', 1),
(22, 'Lebron LA Jersey', 'assets/images/5b864952cc77784dfd4c49d231fdedf6c4f5c6a5af89777ef34bdlebron.jpg', '1599.00', 'Lebron LA Lakers Jersey', 4),
(23, 'Lebron Soldier Agimat', 'assets/images/5b86499290b78f7c9a7cdc1c382c19f523a2c8b39e121b284b6delebronsoldier agimat.jpg', '12995.00', 'Inspired by the resiliency of Filipinos Lebron made his Signature shoes be named with agimat', 3),
(24, 'Lillard 1', 'assets/images/5b8649cee7ff7e6c2d870c2cd9d9e1b25e32ce10cdc5d89584c77lillard.jpg', '5995.00', 'It is Dame Time Lillard Shoes', 3),
(25, 'T-Mac', 'assets/images/5b864abc6360090a91b9b2a730e71b25b5769827e4e3de697e088mcgrady classic.jpg', '1299.00', 'Tracy McGrady Toronto Raptors Classic Jersey', 4),
(26, 'Molten GG7X', 'assets/images/5b864ada6fb23861a431f5081fe95d529bf41cca5d4bf5aa0c4c5moltengg7x.jpg', '2999.00', 'Official Ball ', 2),
(27, 'UA Mouth Guard', 'assets/images/5b864afc527cb69d91854d8f6d4825aaccf791156a5cc11cd3de2mouth guard.jpg', '1300.00', 'Under Armour Mouth Guard', 1),
(28, 'Jayson Tatum', 'assets/images/5b864b2f1539a9cabd3bdbb0af22c0752566af875e18b599c96f3tatum.jpg', '1199.00', 'Jayson Tatum-Boston Celtics Jersey', 1),
(29, 'Wade', 'assets/images/5b864b5b91143147f77c9642a5ab88dd7cdee6f745f818fa4e4a3wade.jpg', '4599.00', 'Dwayne Wade Signature Shoes-colorway', 1);

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
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 2, 'Joseph Reuben', 'Bautista', 'jayrbautista26@gmail.com', '09153582091', '23 happyst. bgy happy, happy city'),
(10, 'user', '12dea96fec20593566ab75692c9949596833adc9', 1, 'Joseph Reuben', 'Bautista', 'jayrbautista261@gmail.com', '', '');

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
  ADD KEY `orders_fk2` (`payement_method_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `orders_fk2` FOREIGN KEY (`payement_method_id`) REFERENCES `payment_methods` (`id`) ON UPDATE CASCADE;

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
