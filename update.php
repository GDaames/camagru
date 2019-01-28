<?php
   session_start();
?>
<!DOCTYPE html>
<html>
<head>

<title>Profile</title>

<!-- <link rel="stylesheet" type="text/css" href="./css/style.css">
<link rel="shortcut icon" type="image/png" href="./images/icon.jpg" />
<a href="home.php"><img src="./images/h.png" alt="home"  width="7%;"> -->
</head>
<body>


<!-- <div class="maindiv">
<div class="divA">
<div class="title"> -->
<h2>Profile</h2>
<!-- </div>
<div class="divB">
<div class="divD"> -->
<p>Update</p>

<?php
$con = new PDO("mysql:host=localhost;dbname=camagru2","root","mazikeen");
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if (isset($_GET['submit'])) {
$id = $_GET['did'];
$name = $_GET['dname'];
$email = $_GET['demail'];
$pass = hash('whirlpool', $_GET['dpass']);
$query = $con->prepare("UPDATE users SET `name`='$name', `email`='$email' WHERE `id` = $id");
$query->execute();
}
$query = $con->prepare("SELECT * FROM users");
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();

while ($row = $query->fetch()) {
    if ($row['name'] == $_SESSION['name']){
        echo "<b><a href='updatephp.php?update={$row['id']}'>{$row['name']}</a></b>";
        echo "<br />";
    }
}
?>
?>
</div><?php
if (isset($_GET['update'])) {
$update = $_GET['update'];
$query1 = $con->prepare("SELECT * FROM users WHERE id=$update");
//works till here!!
$query1->execute();
while ($row1 = $query1->fetch()) {

echo "<form class='form' method='get'>";
echo "<h2>Update Form</h2>";
echo "<hr/>";
echo "<input class='input' type='hidden' name='did' value='{$row1['id']}' />";
echo "<br />";
echo "<label>" . "Name:" . "</label>" . "<br />";
echo "<input class='input' type='text' name='dname' value='{$row1['name']}' />";
echo "<br />";
echo "<label>" . "Email:" . "</label>" . "<br />";
echo "<input class='input' type='text' name='demail' value='{$row1['email']}' />";
echo "<br />";
echo "</textarea>";
echo "<br />";
echo "<input class='submit' type='submit' name='submit' value='update' />";
echo "</form>";
}
}
if (isset($_GET['submit'])) {
header('location:index.php');
}
?>
<div class="clear"></div>
</div>

<div class="clear"></div>

<?php

include 'footer.php';

?>
</body>
</html>