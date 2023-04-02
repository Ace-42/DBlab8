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
        <title>Update</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdn.skypack.dev/-/sakura.css@v1.3.1-VmH2VZPA3IgYndF0s0Cx/dist=es2020,mode=raw/css/sakura.css">
    </head>
    <body>
        <h1>Update</h1>
        <?php if(isset($user)): ?>
            <form action="process_upd.php" method="post">
            <div>
                <label for="first_name">First Name</label>
                <input type="text" id="first_name" name="first_name" value=<?= htmlspecialchars($user["first_name"])?> >
            </div>
            <div>
                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name" value=<?= htmlspecialchars($user["last_name"])?> >
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value=<?= htmlspecialchars($user["email"])?> >
            </div>
            <div>
                <label for="password">New Password</label>
                <input type="password" id="password" name="password" value=<?= htmlspecialchars($user["password"])?>>
            </div>
            <div>
                <label for="cpass">Confirm Password</label>
                <input type="password" id="cpass" name="cpass" value=<?= htmlspecialchars($user["password"])?>>
            </div>
            <button>Update</button>
        </form>
        <?php endif; ?>
    </body>
</html>