<?php

if(empty($_POST["first_name"])){
    die("First name cannot be empty");
}

if(empty($_POST["last_name"])){
    die("Last name cannot be empty");
}

if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
    die("Enter a valid email");
}

if(strlen($_POST["password"])<6){
    die("Password must be at least 6 characters long");
}

if(!preg_match("/[a-z]/i",$_POST["password"])){
    die("Password must contain at least one letter");
}

if(!preg_match("/[0-9]/",$_POST["password"])){
    die("Password must contain at least one number");
}

if($_POST["password"]!=$_POST["cpass"]){
    die("Both the passwords do not match");
}

$mysqli = require __DIR__ . "/dbconnect.php";

$sql = "insert into users(first_name, last_name, email, password)
        values (?, ?, ?, ?)";

$stmt = $mysqli->stmt_init();

if(! $stmt->prepare($sql)){
    die("SQL query has errors in it: " . mysqli->error);
}

$stmt->bind_param("ssss",$_POST["first_name"],$_POST["last_name"],$_POST["email"],$_POST["password"]);

if($stmt->execute()){
    header("Location: reg_success.html");
    exit;
} else{
    if($mysqli->errno==1062){
        die("Email already taken");
    } else{
        die($mysqli->error);
    }
}

print_r($_POST);