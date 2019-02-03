<?php
session_start();

try{
    $con = new PDO ("mysql:host=localhost;dbname=camagru","root","123456");
    if(isset($_POST['loginBtn'])){
        $email = ($_POST['email']);      // Turn our post into a local variable
        $pass = hash('whirlpool',$_POST['password']); 

    $select = $con->prepare("SELECT * FROM users WHERE email='$email' and password='$pass'");
    $select->setFetchMode(PDO::FETCH_ASSOC);
    $select->execute();
    $data=$select->fetch();
        $_SESSION['email']=$data['email'];
        $_SESSION['password']=$data['password'];
    header("location: ../home.php");
    }
}catch(PDOException $e)
    {
        echo "error".$e->getMessage();
    }
?>