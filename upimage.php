
<?php
session_start();

$image=$_POST['image'];
$email=$_SESSION['email'];                 
// $data = base64_encode($image);              
try {
    $db = new PDO("mysql:host=localhost;dbname=camagru","root","123456");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO images (email, photo, pname, likes)
    VALUES ('$email', '$image', 'pname', '0')";
    $db->exec($sql);
 }
  catch(PDOException $e)
  {
      echo $sql."ERROR".$e->getMessage();
  }
  header("location:home.php")
?> 