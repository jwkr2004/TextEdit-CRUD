<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "head.php"?>
    <title>TextEdit - Home</title>
</head>
<body>
    <?php include "navbar.php"?> 
    <div class="container">
        <button class="lightbutton" onclick="window.open('/php/TextEditor/create.php', '_self')">Create New File</button>
        <?php 
            $query = "SELECT id, title, usersid FROM texts";
            $result = mysqli_query($db, $query);
            if(mysqli_num_rows($result) > 0) {
                $counter = 0;
                while($row = mysqli_fetch_assoc($result)) {
                    if($row["usersid"] === $usernameid) {
                        echo "<div class='file'>";
                            echo "<div class='filename'>";
                                echo "<p>ID: " . $row['id'] . "</p>";
                                echo "<p>FileName: " . $row['title'] . "</p>";
                            echo "</div>";
                            echo "<div class='filebuttons'>";
                                echo "<button class='darkbutton' onclick='window.open(\"/php/TextEditor/edit.php?id=". $row["id"] ."&usersid=". $row["usersid"] ."\", \"_self\")'>Edit</button>";
                                echo "<button class='darkbutton' onclick='window.open(\"/php/TextEditor/view.php?id=". $row["id"] ."&usersid=". $row["usersid"] ."\", \"_self\")'>View</button>";
                                echo "<button class='darkbutton' onclick='window.open(\"/php/TextEditor/delete.php?id=". $row["id"] ."\", \"_self\")'>Delete</button>";
                            echo "</div>";
                        echo "</div>";
                        $counter++;
                    }
                }
                if($counter === 0) {
                    $error = "No Files Found";
                }
            }
            else {
                $error = "No Files Found";
            }
            if(isset($error)){
                echo "<p class='error'>$error</p>";
            }
        ?>
    </div>
    <?php include "footer.php"?> 
</body>
</html>