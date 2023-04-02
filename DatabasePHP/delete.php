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
        <title>Delete</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdn.skypack.dev/-/sakura.css@v1.3.1-VmH2VZPA3IgYndF0s0Cx/dist=es2020,mode=raw/css/sakura.css">
    </head>
    <body>
        <h1>Delete</h1>

        <?php if(isset($user)): ?>
            <p>Are you sure you want to delete your account?</p>
            <form action="process_del.php" method="post">
                <input type="submit" name="action" value="YES"/>
                <input type="submit" name="action" value="NO"/>
            </form>
        <?php endif; ?>
    </body>
</html>