<?php
    include_once './config/Database.php';
    session_start();

if(isset($_POST['confirm']))
{
    $email = $_POST['email'];
    $stmt = $db->prepare("SELECT id FROM users WHERE email=?");
    $stmt->execute([$email]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC); 
    if($stmt->rowCount() == 1)
    {
        $id = $row['id'];
  
        $message= "
            Hello , $email
            <br /><br />
            Click Following Link To Reset Your Password 
            <br /><br />
            <a href='http://localhost:8080/camagru/resetpassword.php?userid=$id&email=$email'>
        click here to reset your password</a>
            <br /><br />
            thank you :)
            ";
        $headers = "Content-Type: text/html";
        $subject = "Password Reset";
        $headers = 'From:noreply@camagru.com' . "\r\n";
        mail($email, $subject, $message, $headers);

        $msg = " We have sent an email to $email.Please click on the password reset link in the email to generate new password.";
 }
 else
 {
  $msg = "<strong>Sorry!</strong>  this email not found. ";
 }
}
?>

    <!DOCTYPE html>
<html>
    <head lang="en">
    <title>Forgot Password</title>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./css/navbar.css">
        <link rel="stylesheet" type="text/css" href="./css/inlineform.css">
    </head>

    <body>

        <ul class="topnav">
            <h1 style="color: white; font-family: Impact, Charcoal, sans-serif; font-size: 30px;">CAMAGRU</h1>
        </ul>

        

        <div class="loginbox">
            <img src="avatar2.png" class="avatar">
            <h1>Confirm Email</h1>
                <form class="form-inline" id="form" method="post" action="forgot.php">
                    <input style="border-left: 4px solid #58C0ED;
                                  border-bottom: none;
                                  background: transparent;
                                  padding: 2px 60px 2px 70px;
                                  height: 30px;
                                  color: rgb(255, 255, 255);"type="email" name="email" placeholder="Confirm Email" required>
                    <input style="float: none;" type="submit" name="confirm" id="forgotBtn" value="Submit"><br>   
                    <input name="confirm" onclick="location.href='index.php';" class="buttons" type="submit" id="back_btn" value="Back to Homepage"><br>
                </form>
        </div>

    </body>
        <div>
            <p>Copyright &copy; gdaames - Wethinkcode_- <?php echo date('Y') ?>, All rights reserved.</p>
        </div>
</html>