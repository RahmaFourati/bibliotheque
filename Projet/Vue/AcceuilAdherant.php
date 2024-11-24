<?php
include "../Model/Adherant.php";
include "../Model/Livre.php";
include "../Model/Emprunt.php";
include "../Model/User.php";
include "../Model/Connexion.php";
session_start();
$joursRestants = isset($_SESSION['jours_restants']) ? $_SESSION['jours_restants'] : 0;
if (isset($_SESSION['alerteAffichee']) && !empty($_SESSION['alerteAffichee'])) {
  echo '<script>alert("Il vous reste '.$joursRestants.' jours pour restituer votre premier livre.")</script>';
  $_SESSION['alerteAffichee'] = ''; 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Adherant</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
    
    
     .jumbotron {
      margin-bottom: 0;
    }
   
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
  </style>
</head>
<body>

<div class="jumbotron">
  <div class="container text-center">
    <h1>Online Library</h1>      
    <!--<p>Mission : "Offrir un accès équitable à l'information et à la culture, renforçant ainsi les liens sociaux et favorisant le développement personnel."
        <br>Vission : "Devenir le principal centre d'apprentissage et d'innovation, enrichissant la vie de notre communauté."
        <br> Values: "Nous nous engageons à l'accès inclusif, à l'intégrité, à la collaboration et à l'innovation pour créer un environnement accueillant et inspirant."
    </p>-->
    <h4>GREETINGS , ESTEEMED MEMBER </h4>
  </div>
</div>
<?php
include "./navbar.php";
?>
<style>
    img{
        width: 176px;
        height : 286px;
    }
    .srch{
    padding-left: 1000px;
    padding-bottom:50px;
    }
    #btnView{
      padding-left:100px;
      padding-right:100px;
      font-size:30px;
      margin-bottom:15px;
    }
    
</style>
<?php
/*
// Préparez votre requête SQL pour sélectionner la colonne nbExmp de la table Livre avec un titre en minuscules
$stmtSelectNbEx = $bdd->prepare("SELECT nbExmp FROM Livre WHERE LOWER(titre) = LOWER(:titre)");
$titre = "Orgueil Et Prejuges";
$stmtSelectNbEx->bindParam(':titre', $titre);
$stmtSelectNbEx->execute();

// Récupérez le résultat de la requête
$nbExemplaires = $stmtSelectNbEx->fetchColumn();

// Mettez à jour la disponibilité en fonction du nombre d'exemplaires
$disponible = ($nbExemplaires > 0) ? true : false;

// Préparez votre requête SQL pour mettre à jour la disponibilité du livre
$stmtUpdateDispo = $bdd->prepare("UPDATE Livre SET disponibilite = :disponible WHERE LOWER(titre) = LOWER(:titre)");
$stmtUpdateDispo->bindParam(':disponible', $disponible, PDO::PARAM_BOOL);
$stmtUpdateDispo->bindParam(':titre', "Orgueil Et Prejuges");
$stmtUpdateDispo->execute();

// Fermez le curseur après avoir terminé
$stmtSelectNbEx->closeCursor();
$stmtUpdateDispo->closeCursor();*/
?>
<style>
  .viewww{
    margin-left:600px;
  }
</style>


<form class="form-inline"  method="get"  action="../Controller/controlAdherant.php">
<div class="viewww">
<button type="submit" name="viewMine" size="100" id="btnView" class="btn btn-danger">My borrowed books </button>
</div>
<div class="srch">
    <input type="text" class="form-control" size="50" name="srchLivAd"  placeholder="Search by nom livre ...">
    <button type="submit" name="btnCherAdhLiv" class="btn btn-info">Search</button><br>
    <input type="text" class="form-control" size="50" name="srchLibtAt"  placeholder="Search by nom auteur ...">
    <button type="submit" name="btnCherALBA" class="btn btn-info">Search</button><br>
  </form>
</div>
<div class="container">    
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-default">
        <div class="panel-heading"><a href=".php" style="color:black;">Orgueil Et Prejuges</a></div>
        <div class="panel-body"><img src="../others/livre1.jfif" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer"><span style="color:red">AUTEUR:</span> Jane Austen <br><span style="color:red">GENRE :</span>Roman<br> <span style="color:green">en stock</span></div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-default">
        <div class="panel-heading"><a href=".php" style="color:black;">Le Cauchemar d'Innsmouth</a></div>
        <div class="panel-body"><img src="../others/livre2.webp" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer"><span style="color:red">AUTEUR:</span> H.P.Lovecraft <br><span style="color:red">GENRE :</span>Horreur<br> <span style="color:red">rupture de stock</span></div>
      </div>
    </div>
    
    <div class="col-sm-4"> 
      <div class="panel panel-default">
        <div class="panel-heading"><a href=".php" style="color:black;">1984 </a></div>
        <div class="panel-body"><img src="../others/livre3.jfif" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer"><span style="color:red">AUTEUR:</span> George Orwell <br><span style="color:red">GENRE :</span>Science-Fiction <br> <span style="color:green">en stock</span></div>
      </div>
    </div>
  </div>
</div><br>

<div class="container">    
  <div class="row">
  <div class="col-sm-4"> 
      <div class="panel panel-default">
        <div class="panel-heading"><a href=".php" style="color:black;">L'Étranger </a></div>
        <div class="panel-body"><img src="../others/livre444.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer"><span style="color:red">AUTEUR:</span> Albert Camus  <br> <span style="color:red">GENRE :</span>Philosophie <br><br> <span style="color:green">en stock</span></div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-default">
        <div class="panel-heading"><a href=".php" style="color:black;">Divergente </a></div>
        <div class="panel-body"><img src="../others/livre555.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer"><span style="color:red">AUTEUR:</span> Veronica Roth <br><span style="color:red">GENRE :</span>Action <br> <span style="color:green">en stock</span></div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-default">
        <div class="panel-heading"><a href=".php" style="color:black;">Le Petit Livre rouge</a></div>
        <div class="panel-body"><img src="../others/livre6.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer"><span style="color:red">AUTEUR:</span> Carl Gustav Jung <br><span style="color:red">GENRE :</span>Historique <br><span style="color:green">en stock</span>
      </div>
      </div>
    </div>
  </div>
</div><br><br>

<footer class="container-fluid text-center">
  <p>Online Library Copyright</p>  
  <form class="form-inline">Get deals:
    <input type="email" class="form-control" size="50" placeholder="Email Address">
    <button type="button" class="btn btn-danger">Sign Up</button>
  </form>
</footer>

</body>
</html>