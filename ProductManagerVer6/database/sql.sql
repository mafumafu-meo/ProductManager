-- database name: shoping
create table if not exists customers(
    id int primary key auto_increment,
    username varchar(40),
    password varchar(40),
    full_name varchar(40),
    email varchar(40),
    address varchar(40),
    phone varchar(20)
) default charset = utf8;

create table if not exists orders(
    id int primary key auto_increment,
    customer_id int,
    date varchar(40)
);

create table if not exists products(
    id int primary key auto_increment,
    name varchar(40),
    description varchar(40),
    image varchar(100),
    price int
) default charset = utf8;

create table if not exists order_details(
    id int primary key auto_increment,
    order_id int,
    product_id int,
    quantity int,
    price int
);

CREATE TABLE IF NOT EXISTS Admins (
    ID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username varchar(40),
    password varchar(40)
);

insert into customers(username, password, full_name, email, address, phone) values
('thanh','thanh','Đỗ Văn Thanh','thanh@gmail.com','address','0918273645');
insert into orders(customer_id, date) values
(1,'26/01/2021');
insert into products(name,description,price,image) values
('Vsmart Active 3','OK',3600000,'http://localhost/Test1/images/img-1.png');
insert into order_details(order_id, product_id, quantity, price) values
(1,1,2,7200000);
INSERT INTO Admins(username, password) VALUES 
('thanh','Thanh'),
('admin','admin');