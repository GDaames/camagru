<?php
session_start();

try{
    $con = new PDO("mysql:host=localhost;dbname=camagru","root","123456");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(isset($_POST['signupBtn'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $cpassword = $_POST['password'];
        $password = $_POST['cpassword'];
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                $msg = "$email is a valid email address";
            } else {
                $msg = "$email is not a valid email address";
                echo "<script LANGUAGE='JavaScript'>
                window.alert('$msg');
                window.location.href='http://localhost:8080/camagru/signup.php';
                </script>";
            } if($cpassword != $password){
                $msg = "oops! passwords do NOT match!";
                echo "<script LANGUAGE='JavaScript'>
                window.alert('$msg');
                window.location.href='http://localhost:8080/camagru/signup.php';
                </script>";
            } else if (strlen($password) < 6 || strlen($password) > 12 || !preg_match("#[A-Z]+#", $password)){
                $msg = "password must be 6-12 characters and contain atleast 1 capital letter";
                echo "<script LANGUAGE='JavaScript'>
                window.alert('$msg');
                window.location.href='http://localhost:8080/camagru/signup.php';
                </script>";
            } else {
            $code = rand(100000, 999999);
            $pass_hash = hash('whirlpool', $password);
            $insert = $con->prepare("INSERT INTO users (username,email,password,code)
            values(:username,:email,:password,:code)");
                $insert->bindParam(':username',$username);
                $insert->bindParam(':email',$email);
                $insert->bindParam(':password',$pass_hash);
                $insert->bindParam(':code',$code); 
                $insert->execute();
                $str = "your verification link is http://localhost:8080/camagru/confirm.php?user=".$email."&code=".$code ;
                $headers = 'From:noreply@camagru.com' . "\r\n"; 
                mail($email, "CAMAGRU Confirmation", $str, $headers);
                $msg =  "Link sent: check your mail for a verification link.";
                echo "<script LANGUAGE='JavaScript'>
                window.alert('$msg');
                window.location.href='http://localhost:8080/camagru/login.php';
                </script>";
        }
    }
}catch(PDOException $e){
    echo "error".$e->getMessage();
}
?>