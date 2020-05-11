-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2020 at 05:47 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminUser` varchar(50) NOT NULL,
  `adminPass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminUser`, `adminPass`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ans`
--

CREATE TABLE `tbl_ans` (
  `id` int(11) NOT NULL,
  `quesNo` int(11) NOT NULL,
  `rightAns` int(11) NOT NULL DEFAULT '0',
  `ans` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ans`
--

INSERT INTO `tbl_ans` (`id`, `quesNo`, `rightAns`, `ans`) VALUES
(1, 1, 0, 'Digital Base Mapping System.'),
(2, 1, 0, 'Data Borrowing and Movement Software.'),
(3, 1, 1, 'Database Management System.'),
(4, 1, 0, 'Database Manipulation Software.'),
(5, 2, 1, 'It is good at handling geographical concepts.'),
(6, 2, 0, 'It is widely used.'),
(7, 2, 0, 'It is simple and easy to understand.'),
(8, 2, 0, 'It uses a pseudo-English style of questioning.'),
(9, 3, 0, 'Keys may be unique or have multiple occurrences in the database.'),
(10, 3, 0, 'It cannot use SQL.'),
(11, 3, 0, 'Queries are possible on individual or groups of tables.'),
(12, 3, 1, 'Tables are linked by common data known as keys.'),
(13, 4, 1, 'A row or record in a database table.'),
(14, 4, 0, 'Another name for the key linking different tables in a database.'),
(15, 4, 0, 'An attribute attached to a record.'),
(16, 4, 0, 'Another name for a table in an RDBMS.'),
(29, 5, 0, 'The need for multiple copies of the same data and subsequent merging after separate updates.'),
(30, 5, 0, 'The need to manage long transactions.'),
(31, 5, 0, 'The need for manual transfer of records to paper.'),
(32, 5, 1, 'The need for multiple views or different windows into the same databases.'),
(37, 6, 0, 'The need to split objects into their component parts.'),
(38, 6, 0, 'The ability to represent the world in a non-geometric way.'),
(39, 6, 1, 'The ability to develop more realistic models of the real world.'),
(40, 6, 0, 'The ability to develop databases using natural language approaches.'),
(41, 7, 0, 'ADD'),
(42, 7, 0, 'CREATE'),
(43, 7, 1, 'INSERT'),
(44, 7, 0, 'MAKE'),
(45, 8, 0, 'An exact match is necessary in a SELECT statement.'),
(46, 8, 1, ' An exact match is not possible in a SELECT statement.'),
(47, 8, 0, 'An exact match is necessary in a CREATE statement.'),
(48, 8, 0, 'An exact match is not possible in a CREATE statement.'),
(49, 9, 1, 'A virtual table that can be accessed via SQL commands'),
(50, 9, 0, 'A virtual table that cannot be accessed via SQL commands'),
(51, 9, 0, 'A base table that can be accessed via SQL commands'),
(52, 9, 0, 'A base table that cannot be accessed via SQL commands'),
(53, 10, 0, 'REMOVE TABLE CUSTOMER;'),
(54, 10, 1, 'DROP TABLE CUSTOMER;'),
(55, 10, 0, 'DELETE TABLE CUSTOMER;'),
(56, 10, 0, 'UPDATE TABLE CUSTOMER;');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ques`
--

CREATE TABLE `tbl_ques` (
  `id` int(11) NOT NULL,
  `quesNo` int(11) NOT NULL,
  `ques` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ques`
--

INSERT INTO `tbl_ques` (`id`, `quesNo`, `ques`) VALUES
(1, 1, 'What does the abbreviation DBMS stand for?'),
(2, 2, 'The advantages of Standard Query Language (SQL) include which of the following in relation to GIS databases?'),
(3, 3, 'Which of the following are characteristics of an RDBMS?'),
(4, 4, 'What is a tuple?'),
(5, 5, 'Which of the following are issues to be considered by users of large corporate GIS databases?'),
(11, 6, 'Which of the following are features of the object-oriented approach to databases?'),
(12, 7, 'You can add a row using SQL in a database with which of the following?'),
(13, 8, 'The wildcard in a WHERE clause is useful when?'),
(14, 9, 'A view is which of the following?'),
(15, 10, 'The command to eliminate a table from a database is:');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `userid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userid`, `name`, `username`, `password`, `email`, `status`) VALUES
(1, 'Ferdous', 'ferdous', '202cb962ac59075b964b07152d234b70', 'ferdous@gmail.com', 0),
(3, 'Md Fahim Ferdous', 'fahim', '202cb962ac59075b964b07152d234b70', 'fahim@gmail.com', 1),
(4, 'Fardin Ferdous', 'fardin', '202cb962ac59075b964b07152d234b70', 'fardin@gmail.com', 0),
(5, 'Md Nur Nabi', 'NurNabi', '202cb962ac59075b964b07152d234b70', 'nurnabi@gmail.com', 0);

-- all password 123
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_ans`
--
ALTER TABLE `tbl_ans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ques`
--
ALTER TABLE `tbl_ques`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_ans`
--
ALTER TABLE `tbl_ans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tbl_ques`
--
ALTER TABLE `tbl_ques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
