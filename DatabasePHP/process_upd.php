<?php

session_start();
if(isset($_SESSION["user_id"])){
    $mysqli= require __DIR__ . "/dbconnect.php";
}
if($_POST["password"]!=$_POST["cpass"]){
    die("Both the passwords do not match");
}
$sql = "update users set users.first_name = '{$_POST["first_name"]}' where users.id = {$_SESSION["user_id"]}";
$mysqli->query($sql);
$sql2 = "update users set last_name = '{$_POST["last_name"]}' where id = {$_SESSION["user_id"]}";
$mysqli->query($sql2);
$sql3 = "update users set email = '{$_POST["email"]}' where id = {$_SESSION["user_id"]}";
$mysqli->query($sql3);
$sql4 = "update users set password = '{$_POST["password"]}' where id = {$_SESSION["user_id"]}";
$mysqli->query($sql4);
header("Location: index.php");
exit;
?>