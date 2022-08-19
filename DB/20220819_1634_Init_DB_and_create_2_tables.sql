SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `learning-DB`
--
CREATE DATABASE IF NOT EXISTS `learning-DB` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `learning-DB`;

drop table if exists `correct`;
drop table if exists `incorrect`;

CREATE TABLE `correct` (
                           `id` bigint(20) NOT NULL,
                           `expression` varchar(100) NOT NULL,
                           `result` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `incorrect` (
                             `id` bigint(20) NOT NULL,
                             `expression` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for table `correct`
--
ALTER TABLE `correct`
    ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `idx_expression` (`expression`);

--
-- Indexes for table `incorrect`
--
ALTER TABLE `incorrect`
    ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `idx_expression` (`expression`);

--
-- AUTO_INCREMENT for table `correct`
--
ALTER TABLE `correct`
    MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `incorrect`
--
ALTER TABLE `incorrect`
    MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
