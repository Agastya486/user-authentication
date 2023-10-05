<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'mydb';

$conn = mysqli_connect($host, $user, $pass, $dbname);

if(!$conn){
    die('Connection Failed');
}