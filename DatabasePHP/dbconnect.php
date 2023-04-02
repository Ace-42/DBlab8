<?php

$host="localhost";
$db_name="dblab8";
$username="root";
$password="password";

$mysqli = new mysqli($host,$username,$password,$db_name);

if($mysqli->connect_errno){
    die("Error ocurred: " . $mysqli->connect_error);
}

return $mysqli;