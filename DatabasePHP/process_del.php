<?php
session_start();
if(isset($_SESSION["user_id"])){
    $mysqli= require __DIR__ . "/dbconnect.php";
    $sql="delete from users where id = {$_SESSION["user_id"]}";
}
if($_POST["action"]=="YES"){
    $mysqli->query($sql);
    session_destroy();
    header("Location: index.php");
    exit;
}
else{
    header("Location: index.php");
    exit;
}