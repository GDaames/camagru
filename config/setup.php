<?php

  try {
    $conn = new PDO("mysql:host=localhost", "root", "123456");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  catch(PDOException $error) {
    echo 'Connection Failed: ' . $error->getMessage();
  }

  $conn->exec("CREATE DATABASE camagru");
  $conn->exec("USE camagru");
  $conn->exec("CREATE TABLE users (
          id INT PRIMARY KEY AUTO_INCREMENT,
          username VARCHAR(225) UNIQUE,
          email VARCHAR(255) UNIQUE,
          password VARCHAR(255) UNIQUE,
          code INT,
          reg_date TIMESTAMP NOT NULL,
          verified INT(1) DEFAULT 0 )"
  );

  $conn->exec("CREATE TABLE images (
          id INT PRIMARY KEY AUTO_INCREMENT,
          username VARCHAR(255) NOT NULL,
          photo LONGTEXT NOT NULL,
          title VARCHAR(255) NOT NULL,
          likes INT(11) DEFAULT NULL,
          stamp TIMESTAMP NOT NULL,
          comment VARCHAR(255) NOT NULL,
          upload LONGBLOB NOT NULL)"
  );
   
  // $conn->exec("CREATE TABLE likes ( 
  //         id INT NOT NULL AUTO_INCREMENT , 
  //         pid INT NOT NULL, 
  //         username VARCHAR(255) NOT NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB "
  // );

  $msg = "Database successfully created! Proceed to log in";
  echo "<script LANGUAGE='JavaScript'>
  window.alert('$msg');
  window.location.href='http://localhost:8080/camagru/signup.php';
  </script>";
?>