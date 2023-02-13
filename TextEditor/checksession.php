<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"SELECT username, userid FROM users WHERE username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   $usernameid = $row['userid'];
   
   if(!isset($_SESSION['login_user']) && $_SERVER['REQUEST_URI'] != "/php/TextEditor/login.php" && $_SERVER['REQUEST_URI'] != "/php/TextEditor/signup.php"){
      header("location: http://localhost:8081/php/TextEditor/login.php");
      die();
   } 
?>