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
-- 테이블 구조 `board`
--

CREATE TABLE `board` (
  `num` int(11) NOT NULL,
  `id` char(15) NOT NULL,
  `name` char(10) NOT NULL,
  `subject` char(200) NOT NULL,
  `content` text NOT NULL,
  `regist_day` char(20) NOT NULL,
  `hit` int(11) NOT NULL,
  `file_name` char(40) DEFAULT NULL,
  `file_type` char(40) DEFAULT NULL,
  `file_copied` char(40) DEFAULT NULL,
  `good` int(11) NOT NULL,
  `tier` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `board`
--

INSERT INTO `board` (`num`, `id`, `name`, `subject`, `content`, `regist_day`, `hit`, `file_name`, `file_type`, `file_copied`, `good`, `tier`) VALUES
(5, '111', '김용범', 'test1', 'test', '2024-05-27 (10:15)', 21, '', '', '', 0, 'master.png'),
(6, '111', '김용범', 'imgtest1', 'imgtest1\r\nㅇㅇ', '2024-05-27 (10:22)', 24, 'searchBG.png', 'image/png', '2024_05_27_10_22_41.png', 0, 'master.png'),
(21, '111', '김용범', '메인화면 채우기', '111', '2024-05-27 (17:39)', 14, '', '', '', 0, 'grandmaster.png'),
(23, '111', '김용범', 'test2', 'test', '2024-05-28 (06:14)', 11, '니나브획득.gif', 'image/gif', '2024_05_28_06_14_52.gif', 0, 'grandmaster.png'),
(24, '111', '김용범', 'asdf', 'asdf', '2024-05-28 (06:15)', 1, '', '', '', 0, 'grandmaster.png'),
(26, 'tester5', '김깡지', '오늘 상노탑 9시', '필참할것', '2024-05-28 (07:50)', 0, '', '', '', 0, 'diamond.png'),
(27, '222', '허진영', '어 나 허진영인데', '기원이형은 바보가 맞다 ㅇㅇ', '2024-05-28 (07:50)', 1, '', '', '', 0, 'silver.png');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`num`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `board`
--
ALTER TABLE `board`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
