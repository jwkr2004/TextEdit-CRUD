<?php

include "config.php";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection Failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS $database";

if ($conn->query($sql) === TRUE) {
  $conn = new mysqli($servername, $username, $password, $database);

  $sql1 = "CREATE TABLE IF NOT EXISTS texts (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(30),
    notepad VARCHAR(65535),
    usersid INT(6) UNSIGNED,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";
  if ($conn->query($sql1) !== TRUE) {
    echo "Error creating Table: " . $conn->error;
  }
  $sql2 = "CREATE TABLE IF NOT EXISTS users (
    userid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30),
    userpassword VARCHAR(255),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";
  if ($conn->query($sql2) !== TRUE) {
    echo "Error creating Table: " . $conn->error;
  }  
} 
else {
  echo "Error creating Database: " . $conn->error;
}

?>