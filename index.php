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
            <li><a class="active"href="login.php">Log in</a></li>
            <li><a href="signup.php">Sign up</a><li>
            <li><a href="home.php">Camera</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <?php else: ?>  
            <li><p style="font-size: 14px">You are logged in as <?php if(isset($_SESSION['email'])) echo $_SESSION['email'];?> </li>
            <li><a href="logout.php">Logout</a> </p><li>
            <li><a href="profile.php"></a></li>
            <li><a class="active" href="index.php">Home</a></li>
            <li><a href="home.php">Camera</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="profile.php">Profile</a></li>
            <?php endif ?>
        </ul>

        <h1 style="color: white; font-family: Impact, Charcoal, sans-serif; font-size: 30px;">CAMAGRU</h1>

        <div>

            <p>Copyright &copy; gdaames - Wethinkcode_- <?php echo date('Y') ?>, All rights reserved.</p>
        </div>

    </body>
</html>