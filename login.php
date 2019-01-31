<?php
    include_once 'config/session.php';
    include_once 'config/database.php';
    include_once 'resource/login.php';
    include_once 'resource/signup.php';

?>

<!DOCTYPE html>
<html>
    <head lang="en">
    <title>login</title>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./css/navbar.css">
        <link rel="stylesheet" type="text/css" href="./css/inlineform.css">
    </head>

    <body>
        <ul class="topnav">
            <li><a class="active"href="login.php">Log in</a></li>
            <li><a href="signup.php">Sign up</a><li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href=""></a></li>
            <li><a href="index.php">Home</a></li>
            <form class="form-inline" method="post" action="resource/login.php">  
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <input style="form-inline input" type="submit" name="loginBtn" value="Sign in">
            </form>
        </ul>

        <h1 style="color: white; font-family: Impact, Charcoal, sans-serif;">Camagru</h1>

        <div class="loginbox">
            <img src="avatar2.png" class="avatar">
            <h1>Sign in</h1>
            
                <form class="form-inline" method="post" action="resource/login.php">
                    <input style="border-left: 4px solid #58C0ED;
                                  border-bottom: none;
                                  background: transparent;
                                  padding: 2px 60px 2px 70px;
                                  height: 30px;
                                  color: rgb(255, 255, 255);"type="text" name="email" placeholder="Email" required>
                    <input style="border-left: 4px solid #58C0ED;
                                  border-bottom: none;
                                  background: transparent;
                                  padding: 2px 60px 2px 70px;
                                  height: 30px;
                                  color: rgb(255, 255, 255);"type="password" name="password" placeholder="Password" required>
                    <input style="float: none;" type="submit" name="loginBtn" value="Sign in">
                </form>
        </div>

        <div class="bottom">
            <?php if(!isset($_SESSION['email'])): ?>
            <P style="font-size: 11px">You are currently not signed in <a href="login.php">Log in</a> Not yet a member?" <a href="signup.php">Sign up</a> </P>
            <?php else: ?>  
            <p style="font-size: 11px">You are logged in as <?php if(isset($_SESSION['email'])) echo $_SESSION['email']; ?> <a href="logout.php">Logout</a> </p>
            <?php endif ?>
            <p>Copyright &copy; <a href="https://www.camagru.com">Camagru</a> <?php echo date('Y') ?>, All rights reserved.</p>
        </div>

    </body>
</html>