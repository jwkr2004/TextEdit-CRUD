<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      $username = $_POST['username'];
      $password = $_POST['password']; 
      
      $query = "SELECT userid, username, userpassword FROM users WHERE username = '$username'";
      $result = mysqli_query($db, $query);
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
      if($count === 1) {
        if($row['username'] === $username && password_verify($password, $row['userpassword'])) {
          $_SESSION['login_user'] = $username;
         
          header("location: http://localhost:8081/php/TextEditor/");
        }
        else {
          $error = "Username Or Password Is Invalid!";
        }
      }
      else {
        $error = "Username Doest Not Exist!";
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
        <h2 class="formtitle">Login</h2>
        <label>Username: </label>
        <input type="text" name="username" maxlength="30" required/>
        <label>Password: </label>
        <input type="password" name="password" maxlength="30" required/>
        <div class="centerdivs">
          <button class="darkbutton" type="submit">Login</button>
        </div>
        
    </form>
    <?php if(isset($error)){echo "<p class='error'>$error</p>";} ?>

    <?php include "footer.php" ?>
</body>
</html>