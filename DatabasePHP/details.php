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
        <title>Details</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdn.skypack.dev/-/sakura.css@v1.3.1-VmH2VZPA3IgYndF0s0Cx/dist=es2020,mode=raw/css/sakura.css">
    </head>
    <body>
        <h1>Details</h1>

        <?php if(isset($user)): ?>
            <p>First name: <?= htmlspecialchars($user["first_name"])?></p>
            <p>Last name: <?= htmlspecialchars($user["last_name"])?></p>
            <p>Email: <?= htmlspecialchars($user["email"])?></p>
            <p><a href="index.php">Go back</a></p>
        <?php endif; ?>
    </body>
</html>