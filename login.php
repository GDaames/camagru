<?php session_start(); ?>
    
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

        <?php 
            if(isset($msg)){                                                // Check if $msg is not empty
                echo '<div class="statusmsg">'.$msg.'</div>';               // Display our message and wrap it with a div with the class "statusmsg".
            } 
        ?>

        <div class="loginbox">
            <img src="avatar2.png" class="avatar">
            <h1>Log in</h1>
            
                <form class="form-inline" method="post" action="./resource/login.php">
                <input style="border-left: 4px solid #58C0ED;
                                  border-bottom: none;
                                  background: transparent;
                                  padding: 2px 60px 2px 70px;
                                  height: 30px; text-align: center;
                                  color: rgb(199, 199, 199);"type="email" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                    <input style="border-left: 4px solid #58C0ED;
                                  border-bottom: none;
                                  background: transparent;
                                  padding: 2px 60px 2px 70px;
                                  height: 30px; text-align: center;
                                  color: rgb(199, 199, 199);"type="password" name="password" placeholder="Password" required>
                    <input style="float: none;" type="submit" name="loginBtn" value="Log in"><br>
                    <input name="forgot" onclick="location.href='forgot.php';" type="submit" id="forgotBtn" value="forgot password"><br>
                </form> 
        </div>

        <div class="bottom">
            <p>Copyright &copy; <a href="https://www.camagru.com">Camagru</a> <?php echo date('Y') ?>, All rights reserved.</p>
        </div>

    </body>
</html>