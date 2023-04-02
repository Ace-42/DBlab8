<?php

session_start();
if(isset($_SESSION["user_id"])){
    $mysqli= require __DIR__ . "/dbconnect.php";
    $sql="select * from users where id = {$_SESSION["user_id"]}";
    $result=$mysqli->query($sql);
    $user=$result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdn.skypack.dev/-/sakura.css@v1.3.1-VmH2VZPA3IgYndF0s0Cx/dist=es2020,mode=raw/css/sakura.css">
    </head>
    <body>
        <h1>Home</h1>

        <?php if(isset($user)): ?>
            <p>Hello <?= htmlspecialchars($user["first_name"])?> <?= htmlspecialchars($user["last_name"])?>. You are now logged in.</p>
            <p><a href="details.php">View details</a></p>
            <p><a href="update.php">Update information</a></p>
            <p><a href="delete.php">Delete account</a></p>
            <p><a href="logout.php">Log out</a></p>
        <?php else: ?>
            <p><a href="login.php">Log in</a> or <a href="register.html">Register</a></p>
        <?php endif; ?>
    </body>
</html>