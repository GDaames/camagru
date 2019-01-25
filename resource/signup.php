<?php
    session_start();
try{
    $con = new PDO("mysql:host=localhost;dbname=camagru","root","123456");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(isset($_POST['signupBtn'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        
        $code = rand(100000, 999999);
        $pass_hash = hash('whirlpool', $pass);
        $insert = $con->prepare("INSERT INTO users (username,email,password,code)
        values(:username,:email,:password,:code)");
            $insert->bindParam(':username',$username);
            $insert->bindParam(':email',$email);
            $insert->bindParam(':password',$pass_hash);
            $insert->bindParam(':code',$code); 
            $insert->execute();
            $str = "your verification link is http://localhost:8080/camagru/cong.phtml?user=".$email."&code=".$code;
            mail($email, "CAMAGRU Confirmation", $str);
            echo "Link sent: You will be redirected in 5 seconds";
            header('Refresh: 5; URL=http://localhost:8080/camagru/index.php');
        }
    }

    catch(PDOException $e)
    {
    echo "error".$e->getMessage();
    }
    
?>