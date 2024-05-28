-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 24-05-28 08:03
-- 서버 버전: 10.4.32-MariaDB
-- PHP 버전: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `project`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `checkins`
--

CREATE TABLE `checkins` (
  `num` int(11) NOT NULL,
  `user_id` char(15) DEFAULT NULL,
  `last_checkin_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `checkins`
--

INSERT INTO `checkins` (`num`, `user_id`, `last_checkin_date`) VALUES
(1, '111', '2024-05-28'),
(3, '222', '2024-05-20'),
(4, '권성현', '2024-05-15'),
(5, 'admin', '2024-05-28'),
(6, '333', '2024-05-27'),
(7, '444', '2024-05-27'),
(8, 'tester5', '2024-05-28');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `checkins`
--
ALTER TABLE `checkins`
  ADD PRIMARY KEY (`num`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `checkins`
--
ALTER TABLE `checkins`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 덤프된 테이블의 제약사항
--

--
-- 테이블의 제약사항 `checkins`
--
ALTER TABLE `checkins`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `members` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
