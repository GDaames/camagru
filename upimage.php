<?php
session_start();
$image=$_POST['image'];                     // Get the image and convert into string
$data = base64_encode($image);              // Encode the image string data into base64
try {
    $db = new PDO("mysql:host=localhost;dbname=camagru","root","123456");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO images (photo, pname, likes)
    VALUES ('$image', 'pname', '0')";
    $db->exec($sql);
 }
  catch(PDOException $e)
  {
      echo $sql."ERROR".$e->getMessage();
  }
  header("location:home.php")
?> 