<?php
    include_once 'resource/session.php';
    include_once 'resource/database.php';
    //include_once 'resource/utilities.php';
    include_once 'resource/login.php';
?>

<!DOCTYPE html>
<html>
    <head lang="en">
    <title>Gallery</title>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./css/navbar.css">
        <link rel="stylesheet" type="text/css" href="./css/inlineform.css">
    </head>

    <body>
        <ul class="topnav">
            <li><a href="index.php">Home</a></li>
            <li><a class="active" href="gallery.php">Gallery</a></li>
            <li><a href="profile.php">Profile</a></li>
            <form class="form-inline" method="post" action="">  
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <input style="form-inline input" type="submit" name="loginBtn" value="Sign in">
            </form>
        </ul>

        <h1 style="color: white; font-family: Impact, Charcoal, sans-serif;">Camagru</h1>

        <div id="img-bx">
        <video id="video">Stream not available...</video>
        
              <button id="photo-button" class="btn btn-dark">
                Take Photo
              </button>
            <select id="photo-filter" class="select">
              <option value="none">Normal</option>
              <option value="grayscale(100%)">Grayscale</option>
              <option value="sepia(100%)">Sepia</option>
              <option value="invert(100%)">Invert</option>
              <option value="hue-rotate(90deg)">Hue</option>
              <option value="blur(10px)">Blur</option>
              <option value="contrast(200%)">Contrast</option>
            </select>
            <button id="clear-button" class="btn btn-light">Clear</button>
            <canvas id="canvas"></canvas>
        
      </div>
    </div>

<div id="photos"></div>

<script src="camera.js"></script>

        <div class="bottom">
            <?php if(!isset($_SESSION['username'])): ?>
            <P style="font-size: 15px">You are currently not signed in <a href="login.php">Log in</a> Not yet a member?" <a href="signup.php">Sign up</a> </P>
            <?php else: ?>  
            <p style="font-size: 15px">You are logged in as <?php if(isset($_SESSION['username'])) echo $_SESSION['username']; ?> <a href="logout.php">Logout</a> </p>
            <?php endif ?>
            <p>Copyright &copy; <a href="https://www.camagru.com">Camagru</a> <?php echo date('Y') ?>, All rights reserved.</p>
        </div>

    </body>
</html>