<?php
    include_once './config/database.php';
    session_start();

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = hash('whirlpool',$_POST['newpassword']);
        $cpassword = hash('whirlpool',$_POST['confirm_password']);

        if($cpassword != $password){
            echo" <strong>Sorry!</strong>  password's do not match. ";
        } else {
            $stmt = $db->prepare("UPDATE users SET password='$cpassword' WHERE email='$email'");
            $stmt->execute();
            echo "password Changed.";
            header("refresh:1; login.php");
        }
    }
?>

<!DOCTYPE html>
<html>
    <head lang="en">
    <title>Reset password</title>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./css/navbar.css">
        <link rel="stylesheet" type="text/css" href="./css/inlineform.css">
    </head>

    <body>
        <ul class="topnav">
            <h1 style="color: white; font-family: Impact, Charcoal, sans-serif; font-size: 30px;">CAMAGRU</h1>
        </ul>

        <div class="loginbox">
            <img src="avatar2.png" class="avatar">
            <h1>Reset password</h1>
                <form class="form-inline" method="post" action="resetpassword.php">
                    <input style="border-left: 4px solid #58C0ED;
                                  border-bottom: none;
                                  background: transparent;
                                  padding: 2px 60px 2px 70px;
                                  height: 30px;
                                  color: rgb(255, 255, 255);"type="email" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                    <input style="border-left: 4px solid #58C0ED;
                                  border-bottom: none;
                                  background: transparent;
                                  padding: 2px 60px 2px 70px;
                                  height: 30px;
                                  color: rgb(255, 255, 255);"type="password" name="newpassword" placeholder="New password" required>
                    <input style="border-left: 4px solid #58C0ED;
                                  border-bottom: none;
                                  background: transparent;
                                  padding: 2px 60px 2px 70px;
                                  height: 30px;
                                  color: rgb(255, 255, 255);"type="password" name="confirm_password" placeholder="Confirm password" required>
                    <input style="float: none;" type="submit" name="submit"><br>
                </form>
        </div>

    </body>
        <div>
            <p>Copyright &copy; gdaames - Wethinkcode_- <?php echo date('Y') ?>, All rights reserved.</p>
        </div>
</html>
