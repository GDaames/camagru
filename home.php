<?php
    include_once 'config/session.php';
    include_once 'config/database.php';
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
            <li><a href="login.php">Log in</a></li>
            <li><a href="signup.php">Sign up</a><li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href=""></a></li>
            <li><a class="active" href="index.php">Home</a></li>
        </ul>

        <h1 style="color: white; font-family: Impact, Charcoal, sans-serif; font-size: 30px;">Camagru</h1>

        <div>
            <?php if(!isset($_SESSION['email'])): ?>
            <P style="font-size: 14px">you need to be signed in to access this feature <a href="login.php">Log in</a> Not yet a member?" <a href="signup.php">Sign up</a> </P>
            <?php else: ?>  
            <p style="font-size: 14px">You are logged in as 
            <?php if(isset($_SESSION['email'])) echo $_SESSION['email']; ?> 
            <a href="logout.php">Logout</a> </p>
            

            <!-- <div class="booth">
                    <video id="video" width="400" height="300" autoplay="true" ondrop="drop(event)"></video>
                    <canvas id="filters" width="400" height="300"></canvas>
                    
                
                <select id="photo-filter">
                    <option value="none">Normal</option>
                    <option value="grayscale(100%)">Grayscale</option>
                    <option value="sepia(100%)">Sepia</option>
                    <option value="invert(100%)">Invert</option>
                    <option value="hue-rotate(90deg)">Hue</option>
                    <option value="blur(10px)">Blur</option>
                    <option value="contrast(200%)">Contrast</option>
                </select>
                <button id="clear-button">Clear</button>
                <button id="photo-button" onclick="snap();">Take Photo</button>
                <canvas id="canvas" width="400" height="300"></canvas>
                <form action="upimage.php" method="post">
                    <input id="camera" type="hidden" name="image">
                    <input type=submit value="save">
                </form>
            </div> -->

        <div class="booth">
            <video id="video" width="400" height="300" autoplay="true" ondrop="drop(event)"></video>
            <!-- <canvas id="filters" width="400" height="300"></canvas> -->
            <div>
                <!-- <button  onclick="add_effect(0);"><img src="images/filters/12.png"/></button> -->
                <!-- <button  onclick="add_effect(1);"><img src="images/filters/f3.png"/></button>
                <button  onclick="add_effect(2);"><img src="images/filters/f4.png"/></button>
                <button  onclick="add_effect(3);"><img src="images/filters/13.png"/></button> -->
            </div>
            <button id="photo-button" onclick="snap();">Take Photo</button>
            <!--<button id ="capture" class="booth-capture-button" onclick="snap();">Take Photo</button> -->
            <canvas id="canvas" width="400" height="300"></canvas>
            <form action="upimage.php" method="POST">
                <input id="camera" type="hidden" name="image">
                <input type=submit value="save">
            </form>
        </div>

        <script src="camera.js"></script>
        <?php endif ?>
            <p>Copyright &copy; <a href="https://www.camagru.com">Camagru</a> <?php echo date('Y') ?>, All rights reserved.</p>
        
    </body>
</html>