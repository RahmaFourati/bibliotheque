<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
  <?php
  include "navbar.php";
  ?>
  <br><br><br>
<div class="container">
    <h2>ADD OR MODIFY ADHERANT</h2>
  <form method="get" action="../Controller/controlAuth.php" >
    <div class="form-group">
      <label >USER NAME:</label>
      <input type="text" class="form-control" name="userName" id="usr">
    </div>
    <div class="form-group">
      <label >E-MAIL:</label>
      <input type="text" class="form-control" name="email" id="pwd">
    </div>
    <div class="form-group">
      <label >NUMERO DE TELEPHONE:</label>
      <input type="text" class="form-control" name="numTel" >
    </div>
    <div class="form-group">
      <label >PASSWORD:</label>
      <input type="password" class="form-control" name="pass" >
    </div>
    <div class="form-group">
      <label >CONFIRM PASSWORD:</label>
      <input type="password" class="form-control" name="ConfirmPass">
    </div>
    <button type="submit" name="Add" class="btn btn-default">AJOUTER</button>
    <button type="submit" name="modifier" class="btn btn-default">MODIFIER</button>
    
  </form>
</div>
</body>
</html>