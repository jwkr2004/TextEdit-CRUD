<?php

include "config.php";
include "checksession.php";
 
// database insert SQL code
$sql = "INSERT INTO `texts` (`title`, `notepad`, `usersid`)
VALUES ('Untitled Document', '', '$usernameid')";

// insert in database 
if(mysqli_query($db, $sql)){
    header("Location: http://localhost:8081/php/TextEditor/");
}
else {
    echo "<p>Error Adding User</p>";
    echo "<a class='lightbutton' href='http://localhost:8081/php/TextEditor/'>Home Page</a>";
}
?>