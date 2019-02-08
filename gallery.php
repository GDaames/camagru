<?php 
    include_once './config/database.php';
    session_start();

    if(empty($_SESSION['email'])){
        echo "you need to be signed in to access this feature: You will be redirected...";
        header('Refresh: 2; URL=http://localhost:8080/camagru/login.php');
    }
?>

<!DOCTYPE html>
<html>
    <head lang="en">
    <title>Gallery</title>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./css/cam.css">
        <link rel="stylesheet" type="text/css" href="./css/inlineform.css">
    </head>

    <body>
        <ul class="topnav">
            <li><a href="index.php">Home</a></li>
            <li><a href="home.php">Camera</a></li>
            <li><a class="active" href="gallery.php">Gallery</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href=""></a></li>
            <li><a href="./resource/logout.php">Logout</a></li>
        </ul>
        <h1 style="color: white; font-family: Impact, Charcoal, sans-serif; font-size: 30px;">CAMAGRU</h1>

<?php
    $display = "SELECT * FROM images";
    $do = $db->query($display);
    
    while ($pics = $do->fetch()) {
        echo '<form method="post" action="gallery.php">';
            echo '<u>'.$pics['email'].'</u>';
            echo "<img src=\"".$pics['photo']."\">";
            echo '<u>'.$pics['id'].'</u>';
            echo '<br>';
            echo '<button name='.$pics['id'].' value='.$pics['id'].' type="submit">Like</button>';
            echo '<hr>';
        echo '</form>';
    }
    $email = $_SESSION['email'];

    $select = $db->prepare("SELECT * FROM images WHERE email='$email'");
    $select->setFetchMode(PDO::FETCH_ASSOC);
    $select->execute();
    $result=$select->fetch();
    $id=$result['id'];

    if(isset($_POST['id'])){
        print_r($_POST);
        $like = $db->prepare("UPDATE images SET likes = likes +1 WHERE id ='$id'");
        $like->execute();
        echo "you liked this!";
    }
    // echo"SESSION= ";print_r($_SESSION);
    echo"POST= ";print_r($_POST);
?>


    </body>
</html>