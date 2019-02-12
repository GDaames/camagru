<?php
    session_start();    
    include_once './config/database.php';   
    
// var_dump($_POST);
$email=$_SESSION['email']; 

    $pic=$_POST['image'];
    $select = $db->prepare("SELECT * FROM users WHERE email='$email'");
    $select->setFetchMode(PDO::FETCH_ASSOC);
    $select->execute();
    $data=$select->fetch();
        $username=$data['username'];
        $title="IMG_".date("Y/m/d")."_"."$username".rand(1000, 1000000);
        $comment="";
        // $data=base64_encode($pic);

if (isset($_POST['image'])) {
    $insert = "INSERT INTO images (username, photo, title, likes, comment) 
    VALUES ('$username', '$pic', '$title', '0', :'$comment')";
        // $insert->bindParam(':username', $username);
        // $insert->bindParam(':photo', $pic);
        // $insert->bindParam(':title', $title);
        // $insert->bindParam(':comment', $comment);
    if($db->exec($insert)) {
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
}

    // if(isset($_POST['comment'])) { 
        
    //     $comment = $_POST['comment'];

    //     $insert = $db->prepare("INSERT INTO images (comment)
    //     values(:comment)");
    //         $insert->bindParam(':comment',$comment);
    //         $insert->execute();
    // }

    // if(isset($_POST['id'])){
    //     print_r($_POST);
    //     $like = $db->prepare("UPDATE images SET likes = likes +1 WHERE id ='$id'");
    //     $like->execute();
    //     echo "you liked this!";
    // }
?> 