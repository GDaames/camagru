<?php
    include_once './config/database.php';
    session_start();

    if(empty($_SESSION['email'])){
        echo "you need to be signed in to access this feature: You will be redirected...";
        header('Refresh: 2; URL=http://localhost:8080/camagru/login.php');
    }

?>

<!DOCTYPE html>
<html>
    <head lang="en">
    <title>Profile</title>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./css/navbar.css">
        <link rel="stylesheet" type="text/css" href="./css/inlineform.css">
    </head>

    <body>
        <ul class="topnav">
        <li><a href="index.php">Home</a></li>
            <li><a href="home.php">Camera</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a class="active" href="profile.php">Profile</a></li>
            <li><a href=""></a></li>
            <li><a href="./resource/logout.php">Logout</a></li>
        </ul>

<?php
    if(isset($_POST['confirm'])){
        $username = $_POST['newusername'];
        $password = hash('whirlpool',$_POST['newpassword']);
        $cpassword = hash('whirlpool',$_POST['cnewpassword']);
        $email = $_POST['email'];

        if($cpassword != $password){
            echo " <strong>Sorry!</strong>  password's do not match. ";
        } else { 
            $stmt = $db->prepare("UPDATE users SET username='$username', password='$password' WHERE email='$email'");
            $stmt->execute();
            echo "Your changes have been made. You will be redirected";
            header('Refresh: 2; URL=http://localhost:8080/camagru/profile.php');
        }
    }
?>
        
        <h1 style="color: white; font-family: Impact, Charcoal, sans-serif; font-size: 30px;">CAMAGRU</h1>

        <div class="loginbox">
            <img src="avatar2.png" class="avatar">
            <h1>Update Details</h1>
                <form class="form-inline" method="post" action="profile.php">
                    <input style="border-left: 4px solid #58C0ED;
                                  border-bottom: none;
                                  background: transparent;
                                  padding: 2px 60px 2px 70px;
                                  height: 30px;
                                  color: rgb(255, 255, 255);"type="email" name="email" placeholder="Please re-enter email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                    <input style="border-left: 4px solid #58C0ED;
                                  border-bottom: none;
                                  background: transparent;
                                  padding: 2px 60px 2px 70px;
                                  height: 30px;
                                  color: rgb(199, 199, 199);" type="text" name="newusername" placeholder="Enter new username" required>
                    <input style="border-left: 4px solid #58C0ED;
                                  border-bottom: none;
                                  background: transparent;
                                  padding: 2px 60px 2px 70px;
                                  height: 30px;
                                  color: rgb(255, 255, 255);"type="password" name="newpassword"  type="text" maxlength="255" placeholder="Enter new password" required>
                    <input style="border-left: 4px solid #58C0ED;
                                  border-bottom: none;
                                  background: transparent;
                                  padding: 2px 60px 2px 70px;
                                  height: 30px;
                                  color: rgb(255, 255, 255);"type="password" name="cnewpassword"  type="text" maxlength="255" placeholder="Confirm new password" required>
                    <input style="float: none;" type="submit" name="confirm" value="submit">
                </form>
        </div>

        <?php
            $email = $_SESSION['email'];

            $display = "SELECT * FROM images WHERE email='$email'";
            $do = $db->query($display);
            while($pics = $do->fetch())
            {
                echo $email;
                echo "<img src=\"".$pics['photo']."\">";
                echo "<script>window.location.Gallery;</script>";
            }
        ?>
    
    </body>
</html>