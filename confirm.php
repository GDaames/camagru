<!DOCTYPE html>
<html>
    <head lang="en">
    <title>confirmation page</title>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./css/navbar.css">
        <link rel="stylesheet" type="text/css" href="./css/inlineform.css">
    </head>

    <body>
        <ul class="topnav">
            <li><a href="index.php">Home</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="profile.php">Profile</a></li>
        </ul>

        <h1 style="color: white; font-family: Impact, Charcoal, sans-serif;">Camagru</h1>
            <h2 style="text-align: center; font-size: 25px; color: white; font-family: Charcoal, sans-serif;">Congratulations, Sign up successful!</h2>
            <a href="index.php" style="font-size: 15px; text-align: center; color: white; font-family: Charcoal, sans-serif;">Back to Home page</a>
            <br><br>

        <div class="bottom">
            <?php if(!isset($_SESSION['email'])): ?>
            <P style="font-size: 14px; color: white;">You are currently not signed in <a href="login.php">Log in</a> Not yet a member?" <a href="signup.php">Sign up</a> </P>
            <?php else: ?>  
            <p style="font-size: 14px; color: white;">You are logged in as <?php if(isset($_SESSION['email'])) echo $_SESSION['email']; ?> <a href="logout.php">Logout</a> </p>
            <?php endif ?>
            <p>Copyright &copy; <a href="https://www.camagru.com">Camagru</a> <?php echo date('Y') ?>, All rights reserved.</p>
        </div>

    </body>
</html>