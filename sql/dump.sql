-- phpMyAdmin SQL Dump
-- version 5.1.1-1.el7.remi
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2021 年 6 月 10 日 12:18
-- サーバのバージョン： 5.5.68-MariaDB
-- PHP のバージョン: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `team28`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `kadai_kanri`
--

CREATE TABLE `kadai_kanri` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kadai_name` varchar(100) NOT NULL,
  `limit_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='課題管理のデータベース';

--
-- テーブルのデータのダンプ `kadai_kanri`
--

INSERT INTO `kadai_kanri` (`id`, `user_id`, `kadai_name`, `limit_date`) VALUES
(1, 0, '', '0000-00-00');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `kadai_kanri`
--
ALTER TABLE `kadai_kanri`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `kadai_kanri`
--
ALTER TABLE `kadai_kanri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
