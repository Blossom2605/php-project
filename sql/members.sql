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
-- 테이블 구조 `members`
--

CREATE TABLE `members` (
  `num` int(11) NOT NULL,
  `id` char(15) NOT NULL,
  `pass` char(15) NOT NULL,
  `name` char(10) NOT NULL,
  `email` char(80) DEFAULT NULL,
  `regist_day` char(20) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `point` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `members`
--

INSERT INTO `members` (`num`, `id`, `pass`, `name`, `email`, `regist_day`, `level`, `point`) VALUES
(1, 'admin', '12345', '관리자 계정', 'admin@mariaDB.com', '2024-05-27 (18:35)', 10, 0),
(2, '111', '12345', '김용범', '111@111', '2024-05-24 (10:23)', 7, 3687),
(4, '222', '12345', '허진영', 'yeondol@naver.com', '2024-05-27 (04:03)', 2, 224),
(5, '권성현', '12345', '권성현', '1234@1234', '2024-05-27 (10:39)', 3, 200),
(6, '333', '333', '333', 'dt@dasf', '2024-05-27 (19:05)', 4, 268),
(7, '444', '444', '444', '123@123', '2024-05-27 (19:10)', 1, 0),
(8, 'tester5', '12345', '김깡지', 'tester5@gmail.com', '2024-05-28 (07:44)', 5, 3100);

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`num`),
  ADD UNIQUE KEY `id` (`id`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `members`
--
ALTER TABLE `members`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
