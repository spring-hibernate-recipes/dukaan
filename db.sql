drop database if exists aryastatic;
create database aryastatic;
use aryastatic;

create table shopkeeper
(
	emailAddress varchar(32) primary key,
	name varchar(64) not null,
	address varchar(128) not null,
	locality varchar(32) not null,
	city varchar(32) not null,
	contactName varchar(64) not null,
	contactNumber varchar(32) not null,
	password varchar(32) not null
);

insert into shopkeeper values ('cks3383@gmail.com', 'Chandrakants Store', 'BTM 2nd Stage', 'BTM 2nd Stage', 'Bangalore', 'Chandrakant', '8971789157', 'password@123');

create table customer

(
	emailAddress varchar(32) primary key,
	name varchar(32) not null,
	address varchar(128) not null,
	locality varchar(128) not null,
	city varchar(32) not null,
	contactNumber varchar(32) not null,
	password varchar(32) not null
);

insert into customer values ('cks3383@gmail.com', 'Chandrakant Singh', '#1054, 17th Cross, 16th Main', 'BTM 2nd Stage', 'Bangalore', '8971789157', 'password@123');

create table customerBalances
(
	customerBalanceId int primary key auto_increment,
	shopkeeperEmail varchar(64) not null,
	balance double not null
);

create table `order`
(
	orderId int primary key auto_increment,
	customerEmail varchar(32) not null,
	shopkeeperEmail varchar(32) not null,
	amount double not null,
	createdDate datetime not null,
	status int not null,
	address varchar(128),
	orderType int not null
);


create table orderItem
(
	orderItemId int primary key auto_increment,
	orderId int not null,
	productId int not null,
	quantity double not null,
	amount double not null,
	status int not null
);

create table category
(
	id int primary key auto_increment,
	name varchar(32) not null,
	shopkeeperEmail varchar(128) not null
);

insert into category (name, shopkeeperEmail) values ('Groceries', 'cks3383@gmail.com');
insert into category (name, shopkeeperEmail) values ('Oil and Ghee', 'cks3383@gmail.com');
insert into category (name, shopkeeperEmail) values ('Household goods', 'cks3383@gmail.com');
insert into category (name, shopkeeperEmail) values ('Kitchen Needs', 'cks3383@gmail.com');
insert into category (name, shopkeeperEmail) values ('Spices', 'cks3383@gmail.com');
insert into category (name, shopkeeperEmail) values ('Hardware', 'cks3383@gmail.com');

create table subCategory
(
	id int primary key auto_increment,
	name varchar(32) not null,
	categoryId int not null
);

create table product
(
	id int primary key auto_increment,
	name varchar(64) not null,
	aliases varchar(128) not null,
	unit varchar(32) not null,
	unitPrice double not null,
	stock double not null,
	threshold double not null,
	wholesellerEmail varchar(64),
	sellerEmail varchar(64),
	categoryId int not null,
	imageUrl varchar(255),
	popularity int default 0
);

insert into product (name, aliases, unit, unitPrice, stock, threshold, wholesellerEmail, sellerEmail, categoryId) values ('Ashirwaad Aata', 'aata ashirwaad ashirwad wheat flour ', 'Kg', '70', '1000', '20', 'cks3383@gmail.com', 'cks3383@gmail.com', '1');
insert into product (name, aliases, unit, unitPrice, stock, threshold, wholesellerEmail, sellerEmail, categoryId) values ('Fortune Sunflower Oil', 'fortune sunflower oil sun flower ', 'l', '130', '30', '5', 'cks3383@gmail.com', 'cks3383@gmail.com', '2');
insert into product (name, aliases, unit, unitPrice, stock, threshold, wholesellerEmail, sellerEmail, categoryId) values ('Gilette Razor', 'gilette razor mach ', 'pc', '50', '10', '2', 'cks3383@gmail.com', 'cks3383@gmail.com', '3');

create table `account`
(
	id int primary key auto_increment,
	shopkeeperEmail varchar(64) not null,
	balance double not null,
	payable double not null,
	receivable double not null
);

create table transaction
(
	id int primary key auto_increment,
	accountId int not null,
	amount double not null,
	dateOfTransaction datetime not null,
	comments varchar(256) not null
);

create table tempTransaction
(
	id int primary key auto_increment,
	accountId int not null,
	amount double not null,
	dateOfTransaction datetime not null,
	comments varchar(256) not null
);

