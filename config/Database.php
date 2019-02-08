<?php

$username = 'root';
$dsn = 'mysql:host=localhost; dbname=camagru';
$password = '123456';


try
{
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch (PDOException $e){
    echo "Connection Failed ".$e->getMessage();
}
?>