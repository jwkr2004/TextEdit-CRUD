<?php
   include("config.php");
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password']; 
        $password = password_hash("$password", PASSWORD_DEFAULT);

        $sql = "SELECT username FROM users WHERE username = '$username'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        
        $count = mysqli_num_rows($result);
            
        if($count > 0) {
            $error = "Username Already Exists";
        }
        else {
            $query = "INSERT INTO `users` (`username`, `userpassword`)
            VALUES ('$username', '$password')";
 
            if(mysqli_query($db, $query)){
                header("Location: http://localhost:8081/php/TextEditor/login.php");
            }
            else {
                $error = "Error Creating Account";
            }
        }
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "head.php" ?>
    <title>TextEditor - Login</title>
</head>
<body>
    <?php include "navbar.php"?> 
    <form class="loginform" action="" method="post">
        <h2 class="formtitle">Sign Up</h2>
        <label>Username: </label>
        <input type="text" name="username" maxlength="30" required/>
        <label>Password: </label>
        <input type="text" name="password" maxlength="30" required/>
        <div class="centerdivs">
          <button class="darkbutton" type="submit">Create</button>
        </div>
        
    </form>
    <?php if(isset($error)){echo "<p class='error'>$error</p>";} ?>

    <?php include "footer.php" ?>
</body>
</html>