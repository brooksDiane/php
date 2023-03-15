create DATABASE db;
use db;

create table users (
    id int AUTO_INCREMENT PRIMARY KEY,
    firstname varchar(20),
    lastname varchar(30),
    birthdate varchar(20),
    email varchar(60),
    password varchar(60)
)