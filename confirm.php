<?php
    session_start();

    $code = $_GET['code'];
    if (isset($_GET)){
        $db = new PDO("mysql:host=localhost;dbname=camagru","root","123456");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $db->prepare("UPDATE users SET verified=1 WHERE  code=$code");
        $stmt->execute();
        $msg = "Activation Success!";
        echo "<script LANGUAGE='JavaScript'>
        window.alert('$msg');
        window.location.href='http://localhost:8080/camagru/login.php';
        </script>";
    }
?>

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
        <h1 style="color: white; font-family: Impact, Charcoal, sans-serif;">Camagru</h1>
        </ul>


        <h2 style="text-align: center; font-size: 25px; color: white; font-family: Charcoal, sans-serif;">Congratulations, Sign up successful!</h2>
        <a href="index.php" style="font-size: 15px; text-align: center; color: white; font-family: Charcoal, sans-serif;">Back to Home page</a>        
            <br><br>

    </body>
    <div class="bottom">
        <p>Copyright &copy; <a href="https://www.camagru.com">Camagru</a> <?php echo date('Y') ?>, All rights reserved.</p>
    </div>
</html>