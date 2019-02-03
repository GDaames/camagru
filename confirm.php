<?php
    include_once 'config/session.php';
?>

<!DOCTYPE html>
<html>
    <head lang="en">
    <title>confirmation page</title>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./css/navbar.css">
        <link rel="stylesheet" type="text/css" href="./css/inlineform.css">
    </head>

    <body>
        <ul class="topnav">
        <h1 style="color: white; font-family: Impact, Charcoal, sans-serif;">Camagru</h1>
        </ul>
<?php 

    try{
        $con = new PDO ("mysql:host=localhost;dbname=camagru","root","123456");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['code']) && !empty($_GET['code'])){      // Verify data
            $email = ($_GET['email']);                                                                              // Turn our get into a local variable
            $pass = ($_GET['password']);                                                                              
            $code = ($_GET['code']); 

            $search = $con->prepare("SELECT email, password, active FROM users WHERE email='$email' and password='$pass' and active='0'");
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $query->execute();
            $match = $search->rowCount($search);
            // print("$count");
            
            if($match > 0){
                $sql = "UPDATE users SET active='1' WHERE email='$email' and password='$pass' and active='0'";     //match!
                $stmt = $con->prepare($sql);
                $stmt->execute();
                echo '<div class="statusmsg">Your account has been activated, you can now login</div>';
            }else{
                echo '<div class="statusmsg">The url is either invalid or you already have activated your account.</div>';          // No match -> invalid url or account has already been activated.
            }
        }else{
                echo '<div class="statusmsg">Invalid approach, please use the link that has been send to your email.</div>';        // Invalid approach
            }
    }catch(PDOException $e)
    {
        echo "error".$e->getMessage();
    }

?>
        <h2 style="text-align: center; font-size: 25px; color: white; font-family: Charcoal, sans-serif;">Congratulations, Sign up successful!</h2>
        <a href="index.php" style="font-size: 15px; text-align: center; color: white; font-family: Charcoal, sans-serif;">Back to Home page</a>        
            <br><br>
        <div class="bottom">
            <p>Copyright &copy; <a href="https://www.camagru.com">Camagru</a> <?php echo date('Y') ?>, All rights reserved.</p>
        </div>

    </body>
</html>