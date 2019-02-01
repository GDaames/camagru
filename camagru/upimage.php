<?php

session_start();
$image=$_POST['image'];
try {
    $con = new PDO("mysql:host=localhost;dbname=camagru","root","123456");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $photos = "INSERT INTO images(photo, pname, likes)
    VALUES ('$image', 'pname', '0')";
    $con->exec($photos);
 }
  catch(PDOException $e)
  {
      echo "error".$e->getMessage();
  }
  header("location:home.php")
?>