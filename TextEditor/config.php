<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "texteditordb";
$db = mysqli_connect($servername, $username, $password, $database);
if(!$db) {
    die("Connection Failed" . mysqli_connect_error());
}
?>