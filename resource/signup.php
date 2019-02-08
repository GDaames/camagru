<?php
session_start();
try{
    $con = new PDO("mysql:host=localhost;dbname=camagru","root","123456");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(isset($_POST['signupBtn'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            echo("$email is a valid email address\n");
        } else {
            echo("$email is not a valid email address\n");
            header('Refresh: 1; URL=http://localhost:8080/camagru/signup.php');
        } 
        if (strlen($password) < 6 || strlen($password) > 12 || !preg_match("#[A-Z]+#", $password)){
            echo ("password must be 6-12 characters and contain atleast 1 capital letter\n");
            header('Refresh: 3; URL=http://localhost:8080/camagru/signup.php');
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
                $headers = 'From:noreply@camagru.com' . "\r\n"; // Set from headers
                mail($email, "CAMAGRU Confirmation", $str, $headers);
                echo "Link sent: check your mail for a verification link.";
                header('Refresh: 3; URL=http://localhost:8080/camagru/login.php');
        }
    }
}catch(PDOException $e){
    echo "error".$e->getMessage();
}
?>