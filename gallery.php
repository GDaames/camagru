<?php session_start();
if(empty($_SESSION['email'])){
    echo "you need to be signed in to access this feature: You will be redirected...";
    header('Refresh: 2; URL=http://localhost:8080/camagru/login.php');}
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
            <li><a href="home.php">Camera</a></li>
            <li><a class="active" href="gallery.php">Gallery</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href=""></a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
        <h1 style="color: white; font-family: Impact, Charcoal, sans-serif; font-size: 30px;">CAMAGRU</h1>

<?php
    // echo "SESSION= "; print_r($_SESSION); 
    // echo "POST= "; print_r($_POST);
    // echo "GET= "; print_r($_GET);
 try{
     $db = new PDO("mysql:host=localhost;dbname=camagru","root","123456");
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }catch(PDOException $e){
        echo "error".$e->getMessage();
    }

    $display = "SELECT * FROM images";
    $do = $db->query($display);
    while($pics = $do->fetch())
    {
      echo "<img src=\"".$pics['photo']."\">";
      echo "<script>window.location.Gallery;</script>";
    }

      
?>


    </body>
</html>