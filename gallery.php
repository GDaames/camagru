<?php 
    include_once './config/database.php';
    session_start();

    if(empty($_SESSION['username'])){
        $msg =  "you need to be signed in to view this";
        echo "<script LANGUAGE='JavaScript'>
        window.alert('$msg');
        window.location.href='http://localhost:8080/camagru/login.php'; </script>";
    }
?>

<!DOCTYPE html>
<html>
    <head lang="en">
    <title>Gallery</title>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./css/navbar.css">
        <link rel="stylesheet" type="text/css" href="./css/inlineform.css">
        <style>
div.gallery {
  border: 1px solid #ccc;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: auto;
}

div.desc {
  padding: 5px;
  text-align: center;
}

* {
  box-sizing: border-box;
}

.responsive {
  padding: 0 6px;
  float: left;
  width: 24.99999%;
}

@media only screen and (max-width: 700px) {
  .responsive {
    width: 49.99999%;
    margin: 6px 0;
  }
}

@media only screen and (max-width: 500px) {
  .responsive {
    width: 100%;
  }
}

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}
</style>
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
    $display = $db ->prepare("SELECT * FROM images");
    $display->setFetchMode(PDO::FETCH_ASSOC);
    $display->execute();
    $i = 0;
    while ($pics = $display->fetch()) {
        if ($i%3 == 0) {
            echo"<tr>";
        }
        echo '<div class="responsive">';
            echo '<div class="gallery">';
                echo '<a target="_blank" href="#">';
                echo '<form method="post" action="gallery.php">';
                echo "<td><img src=\"".$pics['photo']."\" alt=\"".$pics['username']."\" class='gallery' width='500' height='400'></td>";
                echo '</a>';
                echo '<div class="desc"><textarea type="text" name="textarea" maxlength="256" rows=4 cols="40" placeholder="write a comment" rows="10" cols="100" required></textarea></div>';
                // echo '<input type="submit" name="comment" value="comment" id="submit">';
                echo '<button name="comment" value="comment" type="submit">Comment</button>';
                echo '<input type="submit" name="like" value="like" id="like">';
                echo '<input type="submit" name="delete" value="delete" id="delete">';
                echo '<hr>';
                echo '<div class="desc">echo'.$pics['comment'].'</div>';
            echo '</div>';
        echo '</div>';
            // echo '<button name='.$pics['id'].' value='.$pics['id'].' type="submit">Like</button>';
            // 
            echo '<button name="delete" value="delete" type="submit">Delete</button>';
            if($i%3 ==2) {
                echo"</tr>";
            }
            $i++;
        echo '</form>';
    }

    // $username = $_SESSION['username'];
    // $select = $db->prepare("SELECT * FROM images WHERE username='$username'");
    // $select->setFetchMode(PDO::FETCH_ASSOC);
    // $select->execute();
    // $data=$select->fetch();
    $data=$display->fetch();
    $data['id'];
    $data['username'];
    $data['title'];
    $data['timestamp'];
    $comment = $_POST['comment'];

    if(isset($_POST['id'])){
        print_r($_POST);
        $like = $db->prepare("UPDATE images SET likes = likes +1 WHERE id ='$id'");
        $like->execute();
        echo "you liked this!";
    }

    if(isset($_POST['delete'])) { 
        $del = $db->prepare("DELETE FROM images WHERE id=$id");
        $del->bindParam(":id",$id,PDO::PARAM_INT);
        $del->execute();
    }
    if(isset($_POST['comment'])) { 
        $insert = $db->prepare("INSERT INTO images (comment)
        values(:comment)");
            $insert->bindParam(':comment',$comment);
            $insert->execute();
    }
?>


    </body>
</html>