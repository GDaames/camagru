<?php
    session_start();    
    include_once './config/database.php';   
    
$pic=$_POST['image'];
var_dump($_POST);
$email=$_SESSION['email']; 

$select = $db->prepare("SELECT * FROM users WHERE email='$email'");
$select->setFetchMode(PDO::FETCH_ASSOC);
$select->execute();
$data=$select->fetch();
// $id=$data['id'];
$username=$data['username'];
$t=time();
$title = "IMG_".date("Y/m/d")."_".rand(1000, 1000000);
$comment="";
                
// $data = base64_encode($pic);              
$insert = $db->prepare("INSERT INTO images (username, photo, title, likes, comment) 
VALUES ($username, $pic, $title, '0', $comment)");
    // $insert->bindParam(':username', $username);
    // $insert->bindParam(':photo', $pic);
    // $insert->bindParam(':title', $title);
    // $insert->bindParam(':comment', $comment);
    if($insert->execute()) {
    ?>
    <script>
        alert("Image was successfully uplaoded");
        window.location.href=('home.php');
    </script>
        <?php
    } else {
    ?>
    <script>
        alert("Error");
        window.location.href=('home.php');
    </script>
    <?php
    }
//   header("location:home.php")
?> 