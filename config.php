<?php

$servername = "localhost";
$username = "root";
$password = "P0S1tiv@!";
$database = "dbtabase";

$connection = new mysqli($servername, $username, $password, $database);

if($connection->connect_error){
    die("Connection failed: ". $connection->connect_error); 
}
?>