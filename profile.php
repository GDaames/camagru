<?php
    include_once 'resource/session.php';
    //include_once 'resource/database.php';
    include_once 'resource/login.php';
    include_once 'resource/signup.php';
?>

<!DOCTYPE html>
<html>
    <head lang="en">
    <title>Profile</title>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./css/navbar.css">
        <link rel="stylesheet" type="text/css" href="./css/inlineform.css">
    </head>

    <body>
        <ul class="topnav">
            <li><a href="index.php">Home</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a class="active" href="profile.php">Profile</a></li>
            <form class="form-inline" method="post" action="">  
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <input style="form-inline input" type="submit" name="loginBtn" value="Sign in">
            </form>
        </ul>

        <h1 style="color: white; font-family: Impact, Charcoal, sans-serif;">Camagru</h1>

    <?php /*
        $con = new PDO("mysql:host=localhost;dbname=camagru","root","123456");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if (isset($_GET['submit'])) {
            $id = $_GET['did'];
            $name = $_GET['dname'];
            $email = $_GET['demail'];
            $pass = hash('whirlpool', $_GET['dpass']);
            $query = $con->prepare("UPDATE users SET `name`='$name', `email`='$email' WHERE `id` = $id");
            $query->execute();
        }
        $query = $con->prepare("SELECT * FROM users");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute();

    while ($row = $query->fetch()) {
        if ($row['name'] == $_SESSION['name']){
            echo "<b><a href='profile.php?update={$row['id']}'>{$row['name']}</a></b>";
            echo "<br />";
        }
    }
    
    */?>

    <?php
        if (isset($_GET['update'])) {
            $update = $_GET['update'];
            $query1 = $con->prepare("SELECT * FROM users WHERE id=$update");
            $query1->execute();
            while ($row1 = $query1->fetch()) {
                echo "<form class='form' method='get'>";
                echo "<h2>Update Form</h2>";
                echo "<hr/>";
                echo "<input class='input' type='hidden' name='did' value='{$row1['id']}' />";
                echo "<br />";
                echo "<label>" . "Name:" . "</label>" . "<br />";
                echo "<input class='input' type='text' name='dname' value='{$row1['name']}' />";
                echo "<br />";
                echo "<label>" . "Email:" . "</label>" . "<br />";
                echo "<input class='input' type='text' name='demail' value='{$row1['email']}' />";
                echo "<br />";
                echo "</textarea>";
                echo "<br />";
                echo "<input class='submit' type='submit' name='submit' value='update' />";
                echo "</form>";
            }
        }
        if (isset($_GET['submit'])) {
            header('location:index.php');
        }
    ?>


        <!--<div class="bottom">
            <?php /*if(!isset($_SESSION['username'])): ?>
            <P style="font-size: 11px">You are currently not signed in <a href="login.php">Log in</a> Not yet a member?" <a href="signup.php">Sign up</a> </P>
            <?php else: ?>  
            <p style="font-size: 11px">You are logged in as <?php if(isset($_SESSION['username'])) echo $_SESSION['username']; ?> <a href="logout.php">Logout</a> </p>
            <?php endif ?>
            <p>Copyright &copy; <a href="https://www.camagru.com">Camagru</a> <?php echo date('Y') */?>, All rights reserved.</p>
        </div> -->

    </body>
</html>