<?php
include "checksession.php";
// database connection code

$id = $_POST["id"];
$title = trim($_POST["title"]);
$notepad = $_POST["notepad"];

//echo $notepad;

if($id) {
    $query = "UPDATE `texts` SET `title`='$title', `notepad`='$notepad' WHERE id='$id' AND usersid='$usernameid' ";

    if(mysqli_query($db, $query)){
        header("Location: http://localhost:8081/php/TextEditor");
    }
    else {
        echo "<p class='error'>Error Saving File</p>";
        echo "<a type='button' class='abutton' href='http://localhost:8081/php/TextEditor'>Home Page</a>";
    }
}
else {
    echo "<p class='error'>Error Saving File</p>";
    echo "<a type='button' class='abutton' href='http://localhost:8081/php/TextEditor'>Home Page</a>";
}
?>