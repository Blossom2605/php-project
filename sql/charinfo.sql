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
-- 테이블 구조 `charinfo`
--

CREATE TABLE `charinfo` (
  `id` int(11) NOT NULL,
  `nickname` varchar(13) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `level` varchar(10) NOT NULL,
  `job` varchar(50) NOT NULL,
  `server` varchar(50) NOT NULL,
  `user_id` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `charinfo`
--

INSERT INTO `charinfo` (`id`, `nickname`, `image_url`, `level`, `job`, `server`, `user_id`) VALUES
(1, ' ', '', '', '', '', 'admin'),
(2, '이유은', 'https://img.lostark.co.kr/armory/5/a5efb214a2bed5fd4f14dd622acfe6bce04f0b9c8c1a1da424ded59c3d57d07e.png?v=20240512135119', '1,640.17', '소울이터', '카마인', '111'),
(4, '바랜별', 'https://img.lostark.co.kr/armory/0/a5bd1ddabae3262fe3a3e1f76262c74a1004cff6ceb85ebc5efb1352653ca634.png?v=20240222110423', '1,450.00', '소서리스', '카마인', '222'),
(5, '들별', 'https://img.lostark.co.kr/armory/6/fe37ce20c4691c33843ca07cbf551fe520239e0b98de28eedf4e252c50692129.png?v=20240504123425', '1,621.67', '창술사', '카마인', '권성현'),
(6, '초고급서폿', 'https://img.lostark.co.kr/armory/9/3f6c2ec75f978c09f4613e00a90c0411f3fe30f4bf90d52decabd45cfcf25dd0.png?v=20240526073659', '1,642.50', '바드', '카마인', '333'),
(7, '어린이갱스터', 'https://img.lostark.co.kr/armory/5/ac7ca46530d636fad53eead572345b78d97a8ef46f1732647637b46a3d5c0aab.png?v=20240526170935', '1,612.50', '건슬링어', '카마인', '444'),
(8, '빗나간고창을줍는깡지', 'https://img.lostark.co.kr/armory/1/78abe200dd6afdeb2664c6a201deecea36b617a905f2a8fc21a31b5c521793c5.png?v=20240526125923', '1,655.83', '서머너', '카마인', 'tester5');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `charinfo`
--
ALTER TABLE `charinfo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nickname` (`nickname`),
  ADD KEY `fk_member_id` (`user_id`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `charinfo`
--
ALTER TABLE `charinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 덤프된 테이블의 제약사항
--

--
-- 테이블의 제약사항 `charinfo`
--
ALTER TABLE `charinfo`
  ADD CONSTRAINT `fk_member_id` FOREIGN KEY (`user_id`) REFERENCES `members` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
