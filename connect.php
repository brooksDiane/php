<?php

$db_route = 'localhost';            //Use IP or Address in production
$db_user = 'root';              //Localhost is for local debug testing only.
$db_pass = '';              //Enter your real credentials, delete the temporary fields.
$db_name = 'dbName';

$mysqli = new mysqli($db_route, $db_user, $db_pass, $db_name, $db_port);

if($mysqli->connect_error) {
    die("connection failed: " . $mysqli->connect_error);
}


session_start();

?>