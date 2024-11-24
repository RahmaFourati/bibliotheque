<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body style="height:1500px">
<?php if($_SESSION['login_user']){?>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">ONLINELIBRARYMANAGEMENTSYSTEM </a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="Acceuil.php">Home</a></li>
      <li><a  href="#">User</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="registration.php"><span class="glyphicon glyphicon-user"></span> SIGN-UP</a></li>
      <!--<li><a href="Login.php"><span class="glyphicon glyphicon-log-in"></span> LOGIN</a></li>-->
      <li><a href="Acceuil.php"><span class="glyphicon glyphicon-log-out"></span> LOGOUT</a></li>
    </ul>
  </div>
</nav>
<?php } else { ?>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">ONLINELIBRARYMANAGEMENTSYSTEM </a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="Acceuil.php">Home</a></li>
      <li><a  href="#">User</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="registration.php"><span class="glyphicon glyphicon-user"></span> SIGN-UP</a></li>
      <li><a href="Login.php"><span class="glyphicon glyphicon-log-in"></span> LOGIN</a></li>
     <!-- <li><a href="Acceuil.php"><span class="glyphicon glyphicon-log-out"></span> LOGOUT</a></li>-->
    </ul>
  </div>
</nav>
<?php } ?>
</body>
</html>