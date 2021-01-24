CREATE TABLE IF NOT EXISTS Admins (
    ID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username varchar(40),
    password varchar(40)
);

-- Dumping data for table `Admins`
INSERT INTO Admins(username, password) VALUES 
('thanh','Thanh'),
('admin','admin');

CREATE TABLE IF NOT EXISTS Products (
    ID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci,
    image varchar(50),
    price varchar(10)
);
ALTER TABLE Products AUTO_INCREMENT = 1000;

-- Dumping data for table `Products`
INSERT INTO Products(name,image,price) VALUES 
('Vsmart Active 3','Test1/admin/product/upload/img-1.png','3600000');
