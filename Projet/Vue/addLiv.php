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
    <h2>ADD OR MODIFY BOOK</h2>
  <form method="get" action="../Controller/controlLivres.php" >
    <div class="form-group">
      <label >Id-Livre:</label>
      <input type="text" class="form-control" name="idLiv" id="usr">
    </div>
    <div class="form-group">
      <label >Titre:</label>
      <input type="text" class="form-control" name="titre" id="pwd">
    </div>
    <div class="form-group">
      <label >Auteur:</label>
      <input type="text" class="form-control" name="auteur" >
    </div>
    <div class="form-group">
        <label >Genre:</label>
        <select class="form-control" name="genres" >
            <option></option>
            <option value="Science-fiction">Science-fiction</option>
            <option value="horreur">horreur</option>
            <option value="action">action</option>
            <option value="Roman">Roman</option>
            <option value="historique">historique</option>
            <option value="Philosophie">Philosophie</option>
        </select>
    </div>
    <div class="form-group">
      <label >Prix:</label>
      <input type="text" class="form-control" name="prix" >
    </div>
    <div class="form-group">
      <label >Exemplaires:</label>
      <input type="text" class="form-control" name="NbExmpExiste" >
    </div>
    <div class="form-group">
      <label >Availability:</label>
      <input type="text" class="form-control" name="dispo">
    </div>
   
    <button type="submit" name="Add" class="btn btn-default">AJOUTER</button>
    <button type="submit" name="modifier" class="btn btn-default">MODIFIER</button>
    <a href="restitutionLivre.php">RESTITUER</a>
  </form>
</div>
</body>
</html>