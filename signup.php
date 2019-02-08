<?php

    include_once "resource/signup.php";
?>

<!DOCTYPE html>
<html>
    <head lang="en">
    <title>Signup</title>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./css/navbar.css">
        <link rel="stylesheet" type="text/css" href="./css/inlineform.css">
    </head>

    <body>
        <ul class="topnav">
            <li><a href="login.php">Log in</a></li>
            <li><a class="active" href="signup.php">Sign up</a><li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href=""></a></li>
            <li><a href="index.php">Home</a></li>
            <form class="form-inline" method="post" action="signup.php">  
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <input style="form-inline input" type="submit" name="loginBtn" value="Sign in">
            </form>
        </ul>

        <h1 style="color: white; font-family: Impact, Charcoal, sans-serif;">Camagru</h1>

        <div class="loginbox">
            <img src="avatar2.png" class="avatar">
            <h1>Sign up</h1>
            <P style="font-size: 12px">By signing up, you agree to our <strong>Terms, Data Policy</strong> and <strong>Cookies Policy.</strong></P>
                <form class="form-inline" method="post" action="resource/signup.php">
                    <input style="border-left: 4px solid #58C0ED;
                                  border-bottom: none;
                                  background: transparent;
                                  padding: 2px 60px 2px 70px;
                                  height: 30px;
                                  color: rgb(199, 199, 199);" type="text" name="username" placeholder="Username" required>
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
                                  color: rgb(255, 255, 255);"type="password" name="password"  type="text" maxlength="255" placeholder="Password" required>
                    <input style="float: none;" type="submit" name="signupBtn" value="Sign up">
                </form>
        </div>

        <div class="bottom">
            <?php if(!isset($_SESSION['username'])): ?>
            <P style="font-size: 11px">You are currently not signed in <a href="login.php">Log in</a> Not yet a member?" <a href="signup.php">Sign up</a> </P>
            <?php else: ?>  
            <p style="font-size: 11px">You are logged in as <?php if(isset($_SESSION['username'])) echo $_SESSION['username']; ?> <a href="logout.php">Logout</a> </p>
            <?php endif ?>
            <p>Copyright &copy; <a href="https://www.camagru.com">Camagru</a> <?php echo date('Y') ?>, All rights reserved.</p>
        </div>

    </body>
</html>