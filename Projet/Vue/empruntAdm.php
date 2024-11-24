

<?php
include "../Model/Adherant.php";
include "../Model/Livre.php";
include "../Model/Emprunt.php";
include "../Model/User.php";
include "../Model/Connexion.php";
?>


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
    <h2>ADD / MODIFY OR DELETE EMPRUNT</h2>
  <form method="get" action="../Controller/controlEmprunt.php" >
    <div class="form-group">
      <label >ID-LIVRE:</label>
      <input type="text" class="form-control" name="idLiv" id="usr">
    </div>
    <div class="form-group">
      <label >ID ADHERANT:</label>
      <input type="text" class="form-control" name="idAdh" id="pwd">
    </div>
    <div class="form-group">
      <label >NOMBRE EXEMPLAIRE EMPRUNTE:</label>
      <input type="text" class="form-control" name="nbExmpEmprunte" >
    </div>
    <div class="form-group">
      <label > DATE EMPRUNT</label>
      <input type="date" class="form-control" name="dateEmprunt" >
    </div>
    <div class="form-group">
      <label >DATE RETOUR:</label>
      <input type="date" class="form-control" name="dateRetour">
    </div>
    <button type="submit" name="Add" class="btn btn-default">ADD</button>
    <button type="submit" name="modifier" class="btn btn-default">MODIFIER</button>
    <button type="submit" name="supp" class="btn btn-default">SUPPRIMER</button>
  </form>
</div>
</body>
</html>


