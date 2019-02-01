<?php

  try {
    $conn = new PDO("mysql:host=localhost", "root", "123456");
    $conn->setAttribute(PDO::ERRMODE_EXCEPTION);
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
          isVerified INT(1) DEFAULT 0)"
  );

  $conn->exec("CREATE TABLE images (
          id INT PRIMARY KEY AUTO_INCREMENT,
          photo LONGTEXT NOT NULL,
          pname VARCHAR(255) NOT NULL,
          likes INT DEFAULT 0)"
  );

  $conn->exec("CREATE TABLE password_reset_request (
          id int(10) unsigned NOT NULL AUTO_INCREMENT,
          user_id int(10) unsigned NOT NULL,
          date_requested datetime NOT NULL,
          token varchar(255) COLLATE utf8_unicode_ci NOT NULL,
          PRIMARY KEY (`id`)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1"
  );

  header('Location: ../index.php');
?>

