<?php
    session_start();
try{
    $con = new PDO("mysql:host=localhost;dbname=camagru","root","123456");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(isset($_POST['signupBtn'])){

        if(isset($_POST['email']) && !empty($_POST['email']) AND isset($_POST['password']) && !empty($_POST['password'])){
            $name = ($_POST['email']);          // Turn our post into a local variable
            $pass = ($_POST['password']);       // Turn our post into a local variable
        }

        $username = $_POST['username'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        
        $code = rand(100000, 999999); //$hash
        $pass_hash = hash('whirlpool', $pass);
        $insert = $con->prepare("INSERT INTO users (username,email,password,code)
        VALUES (:username,:email,:password,:code)");
            $insert->bindParam(':username',$username);
            $insert->bindParam(':email',$email);
            $insert->bindParam(':password',$pass_hash);
            
            $insert->bindParam(':code',$code); 
            $insert->execute();
            $str = "your verification link is http://localhost:8080/camagru/confirm.php?user=".$email."&code=".$code ;
            $headers = 'From:noreply@camagru.com' . "\r\n"; // Set from headers
            mail($email, "CAMAGRU Confirmation", $str, $headers);
            // Return Success - Valid Email $msg = 'Your account has been made, <br /> please verify it by clicking the activation link that has been send to your email.';
            echo "Link sent: You will be redirected in 5 seconds";
            header('Refresh: 5; URL=http://localhost:8080/camagru/index.php');
        }
    }
catch(PDOException $e)
    {
    echo "error".$e->getMessage();
    }
?>