
<!DOCTYPE html>
<html>
    <head lang="en">
    <title>index</title>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./css/navbar.css">
        <link rel="stylesheet" type="text/css" href="./css/inlineform.css">
    </head>

    <body>

<?php
 //echo file_get_contents( "nav.phtml" );
 session_start();
 $image=$_POST['image'];
 try{
     $con = new PDO("mysql:host=localhost;dbname=camagru","root","123456");
     $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $display = "SELECT * FROM images";
     $do = $con->query($display);

     $id = $_GET['id'];

     while($pics = $do->fetch())
     {
       echo "<img src=\"".$pics['photo']."\">";
       echo("<button onclick=\"\">like</button>");

       echo "<script>
  window.location.Gallery;
  </script>";
     }
   }
   catch(PDOException $e)
   {
       echo "error".$e->getMessage();
   }
   // $likes ="UPDATE images SET likes = likes +1 WHERE id =:id";
   // $l->prepare($likes);
   // execute(array(':id => $_GET['id']'));
?>