<?php
    include_once "../config/Database.php";

    session_start();
    if(isset($_POST['loginBtn'])){
        $email = ($_POST['email']);      
        $pass = hash('whirlpool',$_POST['password']); 

    $select = $db->prepare("SELECT * FROM users WHERE email='$email' and password='$pass' and verified='1'");
    $select->setFetchMode(PDO::FETCH_ASSOC);
    $select->execute();
    $data=$select->fetch();
        $_SESSION['email']=$data['email'];
        $_SESSION['password']=$data['password'];
        $verify = $data['verified'];

        if (isset($email) != isset($data['email']) || isset($pass) != isset($data['password']) && isset($verify) != 1){
            $msg = "incorrect details! also, have you activated your account yo?";
            echo "<script LANGUAGE='JavaScript'>
            window.alert('$msg');
            window.location.href='http://localhost:8080/camagru/login.php'; </script>";
        } else if (isset($email) == isset($data['email']) && isset($pass) == isset($data['password']) && isset($verify) == 1){
            $msg = "Awe! press OK to proceed.";
            echo "<script LANGUAGE='JavaScript'>
            window.alert('$msg');
            window.location.href='http://localhost:8080/camagru/profile.php'; </script>";
        }
    }
?>
