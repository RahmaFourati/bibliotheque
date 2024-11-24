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
    <h2>RETURN BOOK</h2>
  <form method="get" action="../Controller/controlRestitution.php" >
    <div class="form-group">
      <label >Id-Livre:</label>
      <input type="text" class="form-control" name="idLiv" id="usr" required>
    </div>
    <div class="form-group">
      <label >Id-Adherant:</label>
      <input type="text" class="form-control" name="idAdh" id="pwd" required>
    </div>
    <div class="form-group">
      <label >Date emprunt:</label>
      <input type="date" class="form-control" name="dateEmprunt" required>
    </div>
    
    <button type="submit" name="restituer" class="btn btn-default">RESTITUER</button>
  </form>
</div>
</body>
</html>
<?php




/*$stmt_delete_emprunt = $bdd->prepare("DELETE FROM emprunt WHERE idlivre = :id_livre AND idAdh = :id_adherent");
        $stmt_delete_emprunt->bindParam(':id_livre', $this->id_livre);
        $stmt_delete_emprunt->bindParam(':id_adherent', idAdherent);
        $stmt_delete_emprunt->execute();
        $stmt_delete_emprunt->closeCursor();
        if($stmt_delete_emprunt->rowCount()>0){
            return true;
        } else {
            return false;
        } 
*/
?>