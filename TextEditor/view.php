<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "head.php"?>
    <title>TextEdit - View</title>
</head>
<body>
    <?php include "navbar.php"?> 

    <?php
        $id = $_GET["id"];
        $usersid = $_GET["usersid"];
        if($id) {
            if($usersid === $usernameid) {
                $query = "SELECT id, title, notepad FROM texts Where id='$id' AND usersid='$usersid'";
                $result = mysqli_query($db, $query);
                if(mysqli_num_rows($result) > 0 ){
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<form class='mainwindow' method='post' action='/php/TextEditor/save.php'>";
                            echo "<div class='tab'>";
                                echo "<input type='text' name='title' maxlength='30' value='" . $row["title"]. "' readonly class='title'/>";
                                echo "<a class='remove' href='/php/TextEditor/'>x</a>";
                            echo "</div>";
                            echo "<div class='text'>";
                                echo "<textarea name='notepad' class='area' maxlength='32000' readonly>" . $row["notepad"] . "</textarea>";
                                echo "<div class='textbuttons'>";
                                    echo "<a class='darkbutton save' href='/php/TextEditor/'>Back to Home</a>";
                                echo "</div>";
                            echo "</div>";
                        echo "</form>";
                    }
                }
                else {
                    echo "<p class='error'>Cannot Get File</p>";
                    echo "<div class='centerdivs'><a class='lightbutton' href='http://localhost:8081/php/TextEditor/'>Return Home</a></div>";
                }
            }
            else {
                echo "<p class='error'>Restricted Access</p>";
                echo "<div class='centerdivs'><a class='lightbutton' href='http://localhost:8081/php/TextEditor/'>Return Home</a></div>";
            }
        }
        else {
            echo "<p class='error'>Cannot Get File</p>";
            echo "<div class='centerdivs'><a class='lightbutton' href='http://localhost:8081/php/TextEditor/'>Return Home</a></div>";
        }
        
    ?>

    <?php include "footer.php"?> 
</body>
</html>