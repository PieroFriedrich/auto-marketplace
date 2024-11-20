SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `cars` (
  `ID` int(11) NOT NULL,
  `location` varchar(20) NOT NULL,
  `model` varchar(30) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `color` varchar(15) NOT NULL,
  `km` int(11) NOT NULL,
  `price` int(15) NOT NULL,
  `picture` text NOT NULL,
  `year` int(11) NOT NULL,
  `seller_name` varchar(30) DEFAULT NULL,
  `seller_email` varchar(40) DEFAULT NULL,
  `seller_phone` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`ID`, `location`, `model`, `brand`, `color`, `km`, `price`, `picture`, `year`, `seller_name`, `seller_email`, `seller_phone`) VALUES
(47, 'toronto', 'Mobi', 'Fiat', 'white', 48000, 36000, 'uploads/66a70f4ac1416.png', 2016, 'Piero', 'friedrichpiero@gmail.com', '111-111-1111'),
(48, 'vancouver', 'C3', 'Citroen', 'silver', 29000, 17800, 'uploads/66a7d4cab5a4d.webp', 2018, 'Bryan', 'bryanmark@yahoo.com', '910-294-1010'),
(50, 'vancouver', 'Mazda 3', 'Mazda', 'other', 0, 28000, 'uploads/66a7d5d069760.avif', 2025, 'Ryan', 'ryanbricks@gmail.com', '123-123-1234'),
(55, 'winnipeg', 'Fusion Sport', 'Ford', 'red', 40000, 28000, 'uploads/66aa717810033.png', 2018, 'Mark', 'rodgersmark@yahoo.com', '190-190-1199'),
(57, 'calgary', 'Kicks', 'Nissan', 'other', 80000, 17500, 'uploads/66aa71fc9c120.jpg', 2021, 'Ulf John', 'ulf.j@gmail.com', '818-759-2929'),
(58, 'vancouver', 'Cayenne', 'Porsche', 'white', 45000, 56000, 'uploads/66aa72b46cc9f.jpeg', 2020, 'Jeremy', 'jeremy.t@gmail.com', '614-202-9105');


ALTER TABLE `cars`
  ADD PRIMARY KEY (`ID`);


ALTER TABLE `cars`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;