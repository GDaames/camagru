<?php
    include_once 'config/session.php';
    include_once 'config/database.php';
    include_once 'resource/login.php';
?>

<!DOCTYPE html>
<html>
    <head lang="en">
    <title>index</title>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./css/navbar.css">
        <link rel="stylesheet" type="text/css" href="./css/inlineform.css">
    </head>

    <body>

        <ul class="topnav">
            
            <?php if(!isset($_SESSION['email'])): ?>
            <li><a href="login.php">Log in</a></li>
            <li><a href="signup.php">Sign up</a><li>
            <li><a class="active" href="home.php">Camera</a></li>
            <!-- <li><a href="gallery.php">Gallery</a></li> -->
            <?php else: ?>  
            <li><p style="font-size: 14px">You are logged in as <?php if(isset($_SESSION['email'])) echo $_SESSION['email'];?> </li> 
            <li><a href="logout.php">Logout</a> </p><li>
            <?php endif ?>
            <li><h1 style="color: white; font-family: Impact, Charcoal, sans-serif;">Camagru</h1></li>
        </ul>

        <h1 style="color: white; font-family: Impact, Charcoal, sans-serif;">Get Started</h1>

        <div>

            <p>Copyright &copy; gdaames - Wethinkcode_- <?php echo date('Y') ?>, All rights reserved.</p>
        </div>

    </body>
</html>