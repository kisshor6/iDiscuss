-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2023 at 06:54 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idscuss`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(8) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` varchar(500) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `created`) VALUES
(1, 'React,js', 'React is a free and open-source front-end JavaScript library for building user interfaces based on UI components. It is maintained by Meta and a community of individual developers and companies.', '2022-05-25 13:07:31'),
(2, 'Django, python', 'Django is a Python-based web framework, free and open-source, that follows the model–template–views architectural pattern. It is maintained by the Django Software Foundation, an independent organization established in the US as a 501 non-profit', '2022-05-25 13:08:49'),
(3, 'jQuery, JavaScript ', 'jQuery is a JavaScript library designed to simplify HTML DOM tree traversal and manipulation, as well as event handling, CSS animation, and Ajax. It is free, open-source software using the permissive MIT License. As of May 2019, jQuery is used by 73% of the 10 million most popular websites', '2022-05-25 13:11:22');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(8) NOT NULL,
  `comment_content` text NOT NULL,
  `thread_id` int(8) NOT NULL,
  `comment_by` int(8) NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES
(6, 'The TypeError object represents an error when an operation could not be performed, typically (but not exclusively) when a value is not of the expected type. A TypeError may be thrown when: an operand or argument passed to a function is incompatible with the type expected by that operator', 1, 8, '2022-05-26 14:27:42'),
(7, 'Easily realign text to components with text alignment classes. For start, end, and center alignment, responsive classes are available that use the same viewport width breakpoints as the grid system.\r\n', 1, 7, '2022-05-26 14:39:29'),
(8, 'is this is aproblem\r\n', 2, 8, '2022-05-27 01:05:35'),
(9, 'I this is not a error only exception', 3, 8, '2022-05-27 08:26:08'),
(10, 'I this is not a error only exception', 3, 7, '2022-05-27 08:27:20'),
(11, 'This is not a problem', 1, 7, '2022-05-27 08:56:47'),
(13, '&lt;script&gt;alert(\"hello world !\");&lt;/script&gt;', 1, 9, '2022-05-27 14:15:27'),
(14, '&lt;script&gt;alert(\"hello world !\");&lt;/script&gt;', 10, 9, '2022-05-27 14:19:22'),
(15, 'WOW what a fantastic framework but error are very discusting', 6, 9, '2022-05-28 09:00:10'),
(16, 'checking the category id', 2, 9, '2022-05-29 08:55:43');

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

CREATE TABLE `thread` (
  `thread_id` int(7) NOT NULL,
  `thread_title` varchar(300) NOT NULL,
  `thread_desc` text NOT NULL,
  `thread_cat_id` int(7) NOT NULL,
  `thread_user_id` int(7) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thread`
--

INSERT INTO `thread` (`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `time`) VALUES
(1, 'Django unable to install', 'We are unable to install django in my pc so, I need help from you . I hop you will get it soon and resolve this error', 2, 8, '2022-05-26 08:07:42'),
(2, 'Problem seen in api ', 'hello everyone ! I am going to install android but I am unable to find the solution if this problem so Kindly I request to you for finding the solution', 2, 7, '2022-05-26 08:27:26'),
(6, 'React js, error occurred', 'React is a free and open-source front-end JavaScript library for building user interfaces based on UI components. It is maintained by Meta and a It is maintained by Meta and a community of individual developers and companies', 1, 8, '2022-05-26 13:04:29'),
(8, 'Django, python', 'Django is a Python-based web framework, free and open-source, that follows the model–template–views architectural pattern. It is maintained by the Django Software Foundation, an independent organization', 2, 7, '2022-05-27 09:00:51'),
(10, '&lt;script&gt;alert(\"hello world !\");&lt;/script&gt;', '&lt;script&gt;alert(\"hello world !\");&lt;/script&gt;', 2, 9, '2022-05-27 14:19:11'),
(11, 'Something wrong with install django', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos ut voluptates dolorum voluptas veritatis? Quam vel accusantium maiores! Iste illo est laudantium veniam, facere, blanditiis', 2, 9, '2022-05-28 12:22:04'),
(21, 'React Js null pointer Exception error occured', 'this is a common problem which is find in react js and most of people are unable to find the solution of this simple issue. always use the try and catch block in error generating areas.', 1, 10, '2023-03-20 22:26:45'),
(22, 'Change Bootstrap navbar color when hover [duplicate]', 'your code will just change the color of the li element you are hovering, not the entire navbar – \r\nLelio Faieta\r\n Nov 27, 2020 at 15:45\r\nYou may use .navbar-default .navbar-nav &gt; li &gt; a { color: red; }. The &gt; is used to have no color changes in dropdown menus if you are using these in the future. – \r\nbron\r\n Nov 27,', 3, 10, '2023-03-20 22:57:10'),
(23, 'What is jQuery?', 'jQuery is a fast, small, and feature-rich JavaScript library. It makes things like HTML document traversal and manipulation, event handling, animation, and Ajax much simpler with an easy-to-use API that works across a multitude of browsers. With a combination of versatility and extensibility, jQuery has changed the way that millions of people write JavaScript.', 3, 10, '2023-03-20 22:57:45'),
(24, 'Node.js Certifications', 'The OpenJS is proud to host the Node.js certification program, with exams covering application and service development.\r\nPass the exam, and get a verifiable certification!\r\nOpenJS Founda', 3, 10, '2023-03-20 22:58:28'),
(25, 'Setting up a new environment', 'This tutorial will cover creating a simple pastebin code highlighting Web API. Along the way it will introduce the various components that make up REST framework, and give you a comprehensive understanding of how everything fits together.', 2, 10, '2023-03-20 23:01:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(8) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_pass` varchar(300) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `user_email`, `user_pass`, `time`) VALUES
(7, 'devilevil849@gmail.com', '$2y$10$o66pUmUBcOX0bmTk6s.BG.Jge7TN7sdCkJUZ8bGIYbs2427mVcZtm', '2022-05-27 00:26:25'),
(8, 'devilevil@gmail.com', '$2y$10$KtfJVtC1435WTQFoO/juCOqrfmHeRNVF2jxuNIb4rzQgH7vlADZcS', '2022-05-27 00:38:41'),
(9, 'kisshor', '$2y$10$/JDnhZTm.bWIuDzlJRx7WOZIj53YDqyj/Hcx0cqJn3QmjRd4IeY02', '2022-05-27 13:47:36'),
(10, 'hatta', '$2y$10$Q6DMBk1Sdh6/HIXNbKZriOwoViR6Q4sFBfre8CyDf75JmgGcz8lye', '2023-03-20 21:51:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `thread`
--
ALTER TABLE `thread`
  ADD PRIMARY KEY (`thread_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `thread`
--
ALTER TABLE `thread`
  MODIFY `thread_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
