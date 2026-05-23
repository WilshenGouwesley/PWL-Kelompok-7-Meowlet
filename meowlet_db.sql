-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 23, 2026 at 08:42 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meowlet_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `order_no` varchar(20) NOT NULL,
  `user_id` int NOT NULL,
  `total_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `status` enum('pending','processing','shipped','completed','cancelled') NOT NULL DEFAULT 'pending',
  `note` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_no`, `user_id`, `total_price`, `status`, `note`, `created_at`, `updated_at`) VALUES
(6, 'ORD-20262412', 15, '1400.00', 'pending', NULL, '2026-05-23 15:18:55', '2026-05-23 15:18:55'),
(7, 'ORD-20261396', 14, '2340.00', 'processing', NULL, '2026-05-23 15:19:56', '2026-05-23 15:30:36');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `qty` int NOT NULL DEFAULT '1',
  `unit_price` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) GENERATED ALWAYS AS ((`qty` * `unit_price`)) STORED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `qty`, `unit_price`) VALUES
(8, 6, 3, 2, '700.00'),
(9, 7, 6, 3, '680.00'),
(10, 7, 5, 1, '300.00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `short_description` varchar(500) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text,
  `seller` varchar(255) DEFAULT NULL,
  `categories` varchar(255) DEFAULT NULL,
  `smallimg1` varchar(255) DEFAULT NULL,
  `smallimg2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `short_description`, `price`, `image`, `description`, `seller`, `categories`, `smallimg1`, `smallimg2`) VALUES
(1, 'Cat Paw Sharpener', 'High-quality pencil sharpener with a sharp and durable blade. Helps sharpen pencils quickly, neatly, and easily for school or office needs. Lightweight and practical design, easy to carry anywhere.', '450.00', 'cat_paw_eraser.png', 'This pencil sharpener is designed to provide fast, smooth, and precise sharpening for all standard pencils. Made with a strong and durable blade, it produces clean pencil tips without easily breaking the lead. The compact and lightweight design makes it easy to carry in a pencil case, backpack, or office drawer.  Suitable for students, artists, and office workers, this sharpener offers comfortable daily use with reliable performance. Its sturdy material ensures long-lasting durability, while the simple design makes it easy to use anytime and anywhere. Perfect for school, office, drawing, and everyday writing activities.', 'Jason Lee', 'Stationary', 'cat_paw_eraser1.jpg', 'cat_paw_eraser2.jpg'),
(2, 'Pen SmoothWrite 0.5 mm', 'Pen with gel ink that flows softly so it?s comfortable to use when you?re writing for a long time.', '150.00', 'pen.png', 'The SmoothWrite 0.5 mm pen is designed for a smooth and comfortable writing experience. Using high-quality, steady-flowing gel ink, this pen produces neat, clear writing that doesn\'t break easily.?The 0.5 mm tip makes it ideal for taking notes, writing documents, or taking precise notes. Its lightweight, ergonomic body design makes it comfortable to hold for extended periods. It\'s suitable for students, schoolchildren, and office workers who need a reliable writing tool every day.', 'Hasan Rizki', 'Stationary', 'pen2.png', 'pen3.png'),
(3, 'Cat Paw Stapler', 'Bring a cute touch to your desk with the Cat Paw Stapler. Designed with an adorable cat paw shape, this stapler combines style and function for daily school, office, and home use. Compact, lightweight, and easy to press, it delivers smooth stapling while making your workspace look more fun and aesthetic.', '700.00', 'cat-paw-stapler.png', 'Upgrade your stationery collection with the charming Cat Paw Stapler, a perfect mix of practicality and adorable design. Inspired by soft cat paws, this stapler adds personality and warmth to any desk setup while still providing reliable everyday performance.\r\n\r\nMade from durable materials, the stapler offers a comfortable grip and smooth stapling action for papers, notes, assignments, and documents. Its compact size saves desk space and makes it easy to carry inside pencil cases, backpacks, or office bags.\r\n\r\nThe cute cat paw appearance makes it a great choice for students, office workers, stationery collectors, and cat lovers. Whether you use it for school, work, journaling, or decoration, this stapler helps turn ordinary tasks into something more enjoyable.', 'Julian ', 'Stationary', 'cat-paw-stapler2.jfif', 'cat-paw-stapler3.webp'),
(4, 'Immanuel Big Blue Book', 'Study smarter with the Immanuel Big Blue Book, a comprehensive learning companion designed to help students improve understanding, practice problem-solving skills, and prepare for exams with confidence. Clear explanations and organized materials make learning easier and more effective.', '400.00', 'immanuel-big-blue-book.png', 'The Immanuel Big Blue Book is a complete study resource created to support students in mastering important concepts and achieving better academic performance. Packed with structured lessons, practice exercises, and easy-to-follow explanations, this book helps students strengthen their understanding step by step.\r\n\r\nDesigned for daily learning and exam preparation, the book provides organized materials that make studying more efficient and less overwhelming. Its clear layout and comprehensive content help students stay focused while improving problem-solving and critical thinking skills.\r\n\r\nWhether used for self-study, classroom support, homework practice, or revision sessions, this book serves as a reliable academic companion for motivated learners.', 'Wilshen Gouwesley', 'Stationary', '', ''),
(5, 'Immanuel Math Book', 'Master mathematics with the Immanuel Math Book, a practical study guide designed to help students understand mathematical concepts through clear explanations, structured lessons, and practice exercises. Perfect for daily learning and exam preparation.', '300.00', 'immanuel-math-book.png', 'The Immanuel Math Book is designed to help students build a stronger foundation in mathematics with simple explanations and organized learning materials. Covering essential math topics, this book supports students in improving calculation skills, logical thinking, and problem-solving abilities.\r\n\r\nEach chapter is arranged in a clear and systematic format, making complex concepts easier to understand and apply. Practice questions and exercises help students reinforce what they learn while preparing for quizzes, assignments, and exams.\r\n\r\nSuitable for classroom support, independent study, and revision sessions, this book helps students study more effectively and gain confidence in mathematics.', 'Leonardo Agustin', 'Stationary', '', ''),
(6, 'Premium Crochet Red Yarn', 'Create beautiful handmade projects with the Premium Crochet Red Yarn. Made with soft and durable fibers, this yarn offers smooth stitching, vibrant color, and comfortable handling for crochet, knitting, and DIY craft projects.', '680.00', 'yarn-ball.png', 'The Premium Crochet Red Yarn is a high-quality yarn designed for crochet lovers, knitters, and craft enthusiasts who want both comfort and durability in every project. Featuring a rich red color and soft texture, this yarn helps create neat, beautiful, and professional-looking results.\r\n\r\nIts smooth fiber structure allows the yarn to glide easily through hooks and needles, helping reduce tangling while making stitching more comfortable. Suitable for beginners and experienced crafters alike, this yarn works well for making scarves, hats, bags, plushies, decorations, clothing accessories, and other creative handmade items.\r\n\r\nThe strong yet lightweight material helps finished creations maintain their shape while staying soft and comfortable to use.', 'Charlie', 'Handycraft', 'yarn-ball2.jpg', 'yarn-ball3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'tes', 'abdcefg@gmail.com', '$2y$10$YYdcvkSS340yyVuU9CveiuH.Dcwkk5yN/kihHPYyvruS21zMlymPu'),
(4, 'test', 'tesaja@gmail.com', '$2y$10$KPUIRLRpo3/ElHfwYn5rzOY5NIeOn8xh1HNKT5WLwSOMLOTKYB0RW'),
(5, 'Wilshen', 'tes1234@gmail.com', '$2y$10$kwMj6qlleRHQJl8zLBi14u/yWww9/R1qTv1UA7hLssn1UpPXRMLXW'),
(9, 'gatau', 'capucino@gmail.com', '$2y$10$xdKj5CBo6NYNIQOqbuUK4ONyKDlo/.qponST6CuL.0ue5voUhFSPi'),
(10, 'hihihi', 'qwerty@gmail.com', '$2y$10$mVkYeeeaY/hCvcRKyO.th.Gs6.Zj0oOAlYNA7VkYtqFzM2ipFw.qO'),
(11, 'scuba', 'scuba@gmail.com', '$2y$10$eLqh422UM49LftLIFMfcd.3eRUHsR3LX78aGp5cyJ.R98jaSEizgu'),
(14, 'Gouwesley', 'gouwesley@gmail.com', '$2y$10$HdwyqyGKpgYOyvBD/GWUCOFy2F0WX3s4uso8doLnltjxgnG1UEDW2'),
(15, 'jeki', 'jeki@gmail.com', '$2y$10$HRZCYREc5YDKkaeB97Yqxu8sRSZx4WjuHxVNPKRhj9a/tZM5.XPQG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_no` (`order_no`),
  ADD KEY `fk_orders_user` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_items_order` (`order_id`),
  ADD KEY `fk_items_product` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `fk_items_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_items_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
