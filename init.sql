create DATABASE db;
use db;

create table users (
    id int AUTO_INCREMENT PRIMARY KEY,
    firstname varchar(20),
    lastname varchar(30),
    birthdate varchar(20),
    phone varchar(20),
    gender varchar(10),
    email varchar(60),
    password varchar(60)
)