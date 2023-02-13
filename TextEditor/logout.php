<?php
   session_start();
   
   if(session_destroy()) {
      header("Location: http://localhost:8081/php/TextEditor/login.php");
   }
?>