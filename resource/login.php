<?php
    include_once "../config/Database.php";

    session_start();
    if(isset($_POST['loginBtn'])){
        $email = ($_POST['email']);      
        $pass = hash('whirlpool',$_POST['password']); 

    $select = $db->prepare("SELECT * FROM users WHERE email='$email' and password='$pass' and isVerified='1'");
    $select->setFetchMode(PDO::FETCH_ASSOC);
    $select->execute();
    $data=$select->fetch();
        $_SESSION['email']=$data['email'];
        $_SESSION['password']=$data['password'];
    header("location: ../profile.php");
    }
?>

