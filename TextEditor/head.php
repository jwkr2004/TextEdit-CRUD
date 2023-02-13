<?php include "connect.php" ?>
<?php if($_SERVER['REQUEST_URI'] !== "/php/TextEditor/login.php" && $_SERVER['REQUEST_URI'] !== "/php/TextEditor/signup.php"){include "checksession.php";}?>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />