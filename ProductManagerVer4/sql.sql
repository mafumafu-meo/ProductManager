CREATE TABLE IF NOT EXISTS `Admins` (
    username varchar(10),
    password varchar(10)
);

-- Dumping data for table `Admins`
INSERT INTO `Admins`(`username`, `password`) VALUES 
('thanh','Thanh'),
('admin','admin');

CREATE TABLE IF NOT EXISTS `Products` (
    productID int AUTO_INCREMENT PRIMARY KEY,
    productName nvarchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci,
    productDes text,
    productCost varchar(10)
);

-- Dumping data for table `Products`
INSERT INTO `Products`(`productID`, `productName`, `productDes`, `productCost`) VALUES 
(1000,'ti vi','dep tuyet voi','10000');
