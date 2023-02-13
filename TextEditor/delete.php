<?php

include "config.php";

$id = $_GET['id'];

if($id) {
    // database insert SQL code
    $sql = "DELETE FROM texts WHERE id=$id";

    // deletes a user in the database 
    if(mysqli_query($db, $sql)){
        header("Location: http://localhost:8081/php/TextEditor/");
    }
    else {
        echo "<p>Error Deleting User</p>";
        echo "<a type='button' class='abutton' href='http://localhost:8081/php/TextEditor/'>Home Page</a>";
    }
}
else {
    echo "<p>Error Deleting User</p>";
    echo "<a type='button' class='abutton' href='http://localhost:8081/php/TextEditor/'>Home Page</a>";
}
?>