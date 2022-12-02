-- DROP DATABASE IF EXISTS express;
CREATE DATABASE express;
GRANT ALL PRIVILEGES ON express.* TO 'admin'@'localhost' IDENTIFIED BY 'password123';
USE express;

-- DROP TABLE IF EXISTS `tb_upload`;
CREATE TABLE `tb_upload` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `tb_upload`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tb_upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;


-- DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
    `id` integer(15) NOT NULL auto_increment,
    `username` varchar(25) NOT NULL default '',
    `firstname` varchar(35) NOT NULL default '',
    `lastname` varchar(35) NOT NULL default '',
    `password` varchar(35) NOT NULL default '',
    `email` varchar(35) NOT NULL default '',
    `role` varchar(20) NOT NULL default '',
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY  (`id`)
);

INSERT INTO `users` VALUES(1,'c_doctors','Computer','Doctors','expressdoc2140','cd@comp2140.com','Admin',CURRENT_TIMESTAMP),
                        (2,'n_stwart','Natonya','Stewart','expressdoc2140','ns@comp2140.com','Admin',CURRENT_TIMESTAMP),
                        (3,'j_rhoden','Joel','Rhoden','expressdoc2140','jr@comp2140.com','Admin',CURRENT_TIMESTAMP),
                        (4,'r_munda','Ricardo','Munda','expressdoc2140','rm@comp2140.com','Admin',CURRENT_TIMESTAMP), 
                        (5,'r_hart','Rayon','Hart','expressdoc2140','rh@comp2140.com','Admin',CURRENT_TIMESTAMP), 
                        (6,'a_johnson','Aalyah','Johnson','expressdoc2140','aj@comp2140.com','Admin',CURRENT_TIMESTAMP), 
                        (7,'j_chambers','Jusayne','Chambers','expressdoc2140','jc@comp2140.com','Admin',CURRENT_TIMESTAMP);

-- DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id` int(15) NOT NULL,
  `firstname` varchar(35) NOT NULL DEFAULT '',
  `lastname` varchar(35) NOT NULL DEFAULT '',
  `email` varchar(35) NOT NULL DEFAULT '',
  `telephone` varchar(20) NOT NULL DEFAULT '',
  `assigned_to` varchar(30) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- DROP TABLE IF EXISTS `device`;
CREATE TABLE `device` (
  `id` int(15) NOT NULL,
  `customer_id` varchar(35) NOT NULL DEFAULT '',
  `brand` varchar(35) NOT NULL DEFAULT '',
  `type` varchar(35) NOT NULL DEFAULT '',
  `model_number` varchar(20) NOT NULL DEFAULT '',
  `assigned_to` varchar(30) NOT NULL DEFAULT '0',
  `category` varchar(30) NOT NULL,
  `repair_status` varchar(30) NOT NULL,
  `estimated_cost` decimal(10,0) NOT NULL,
  `description` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- DROP TABLE IF EXISTS `payment`;
CREATE TABLE `payment` (
  `paymentid` int(15) NOT NULL,
  `customer_id` int(15) NOT NULL DEFAULT 0,
  `balance` decimal(10,0) NOT NULL,
  `amount_paid` decimal(10,0) NOT NULL,
  `remaining_balance` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- DROP TABLE IF EXISTS `tb_upload`;
CREATE TABLE `tb_upload` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentid`);

--
-- Indexes for table `tb_upload`
--
ALTER TABLE `tb_upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `device`
--
ALTER TABLE `device`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentid` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_upload`
--
ALTER TABLE `tb_upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;