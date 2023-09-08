drop database if exists bookstore;
create database bookstore default character set utf8 collate utf8_general_ci;
grant all on bookstore.* to 'staff'@'localhost' identified by 'password';
use bookstore;

/*uid*/
CREATE TABLE `user` 
(
    id int AUTO_INCREMENT PRIMARY KEY, 
    uid varchar(255) not null,
    name varchar(255) not null,
    password varchar(255) not null
);
CREATE TABLE `client` 
(
    id int AUTO_INCREMENT PRIMARY KEY, 
    uid varchar(255) not null,
    name varchar(255) not null,
    password varchar(255) not null,
    gmail varchar(255) not null,
    access varchar(255) not null,
    time varchar(255) not null
);

/*bid*/
CREATE TABLE `book` 
(
    id int AUTO_INCREMENT PRIMARY KEY, 
    bid varchar(255) not null,
    name varchar(255) not null,
    price varchar(255) not null,
    amount varchar(255) not null,
    language varchar(255) not null,
    time varchar(255) not null
);
CREATE TABLE `introduce` 
(
    id int AUTO_INCREMENT PRIMARY KEY, 
    bid varchar(255) not null,
    writer varchar(255) not null,
    publisher varchar(255) not null,/*出版商*/
    relation varchar(255) not null,/*敘述*/
    time varchar(255) not null
);
/*oid*/
CREATE TABLE `temp` 
(
    id int AUTO_INCREMENT PRIMARY KEY, 
    bid varchar(255) not null,
    oid varchar(255) not null,
    time varchar(255) not null
);
CREATE TABLE `order` 
(
    id int AUTO_INCREMENT PRIMARY KEY, 
    oid varchar(255) not null,
    uid varchar(255) not null,
    bid varchar(255) not null,
    drop_amount varchar(255) not null,
    time varchar(255) not null
);
CREATE TABLE `deliver` 
(
    id int AUTO_INCREMENT PRIMARY KEY, 
    oid varchar(255) not null,
    uid varchar(255) not null,
    name varchar(255) not null,
    card varchar(255) not null,
    access varchar(255) not null,
    time varchar(255) not null
);
/*SELECT * FROM `order`,`book` WHERE `order`.`bid` = `book`.`bid`;*/
