<?php
    session_start();
    if(empty($_SESSION['email'])){
        echo "you need to be signed in to access this feature: You will be redirected...";
        header('Refresh: 2; URL=http://localhost:8080/camagru/login.php');
    }
?>

<!DOCTYPE html>
<html>
    <head lang="en">
    <title>Home</title>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./css/navbar.css">
        <link rel="stylesheet" type="text/css" href="./css/inlineform.css">
        <link rel="stylesheet" type="text/css" href="./css/cam.css">
    </head>

    <body>
        <ul class="topnav">
            <li><a href="index.php">Home</a></li>
            <li><a class="active" href="home.php">Camera</a><li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href=""></a></li>
            <li><a href="index.php">Logout</a></li>
        </ul>

        <h1 style="color: white; font-family: Impact, Charcoal, sans-serif; font-size: 30px;">Camagru</h1>

        <div class="booth">
   
        <div class="booth">
    
    <video id="video" width="400" height="300" autoplay="true" ondrop="drop(event)"></video>
    <canvas id="filters" width="400" height="300"></canvas>
    <div>
         <!-- <button  onclick="add_effect(0);"><img src="filters/12.png"/></button> -->
         <!-- <button  onclick="add_effect(1);"><img src="./filters/f3.png"/></button>
         <button  onclick="add_effect(2);"><img src="./filters/f4.png"/></button>
         <button  onclick="add_effect(3);"><img src="./filters/13.png"/></button> -->
    </div>
    <button id ="capture" class="booth-capture-button" onclick="snap();">Take Photo</button>
    <canvas id="canvas" width="400" height="300"></canvas>
    <form action="upimage.php" method="post">
        <input id="camera" type="hidden" name="image">
        <input type=submit value="save">
    </form>
 </div>
 
         <script src="camera.js"></script>

            <p>Copyright &copy; <a href="https://www.camagru.com">Camagru</a> <?php echo date('Y') ?>, All rights reserved.</p>
        
    </body>
</html>