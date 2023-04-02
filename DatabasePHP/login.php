<?php
$invalid=false;

if($_SERVER["REQUEST_METHOD"]==="POST"){

    $mysqli= require __DIR__ . "/dbconnect.php";

    $sql=sprintf("select * from users where email = '%s'",$mysqli->real_escape_string($_POST["email"]));

    $res=$mysqli->query($sql);

    $user=$res->fetch_assoc();

    if($user){
        if($_POST["password"]==$user["password"]){
            session_start();
            session_regenerate_id();
            $_SESSION["user_id"]=$user["id"];
            header("Location: index.php");
            exit;
        }
    }

    $invalid=true;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdn.skypack.dev/-/sakura.css@v1.3.1-VmH2VZPA3IgYndF0s0Cx/dist=es2020,mode=raw/css/sakura.css">
    </head>
    <body>
        <h1>Login</h1>
        
        <?php if($invalid): ?>
            <em>Invalid Login</em>
        <?php endif; ?>

        <form method="post">
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>

            <button>Log In</button>

        </form>
    </body>
</html>
