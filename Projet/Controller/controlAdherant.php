<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<?php
require_once('../Model/Adherant.php');
require_once('../Model/Livre.php');
require_once('../Model/Emprunt.php');
require_once('../Model/User.php');
include "../Model/Connexion.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    
  }  
  
if(isset($_GET['btnCherAdhLiv'])){
    $sql = $bdd->query("SELECT * FROM livre WHERE titre like '%{$_GET['srchLivAd']}%' ");
    if($sql->rowCount()==0){
        echo "Sorry! No book found .try searching again . ";
    }
    else{
        echo "<table class='table table-border table-hover'>";
        echo "<tr style='background-color: #dab7e7;'>";
        echo "<th>"; echo "TITRE"; echo "</th>";
        echo "<th>"; echo "AUTEUR"; echo "</th>";
        echo "<th>"; echo "GENRE"; echo "</th>";
        echo "<th>"; echo "NOMBRE EXEMPLAIRES"; echo "</th>";
        echo "<th>"; echo "DISPONIBILITE"; echo "</th>";
        echo "</tr>";
        $sql->setFetchMode(PDO::FETCH_OBJ);
        while($row=$sql->fetch()){
            echo "<tr>";
            echo "<td>"; echo $row->titre; echo "</td>";
            echo "<td>"; echo $row->auteur; echo "</td>";
            echo "<td>"; echo $row->genre; echo "</td>";
            echo "<td>"; echo $row->nbExmp; echo "</td>";
            echo "<td>"; echo $row->disp; echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo '<a href="../Vue/AcceuilAdherant.php">RETURN</a>';
    }
}


if(isset($_GET['viewMine'])){
    
    $username = $_SESSION['login_user'];
    $stmt = $bdd->prepare("SELECT idAdh FROM Adherant WHERE name = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $userId = $stmt->fetchColumn();
    $sql = $bdd->prepare("SELECT * FROM emprunt WHERE idAdh = :user_id");
    $sql->bindParam(':user_id', $userId);
    $sql->execute();
    if($sql->rowCount()==0){
        
        echo "Sorry! No emprunt found .try searching again . ";
    }
    else{
        echo "<table class='table table-border table-hover'>";
        echo "<tr style='background-color: rgb(100, 100, 195);'>";
        echo "<th>"; echo "ID ADHERANT"; echo "</th>";
        echo "<th>"; echo "ID LIVRE"; echo "</th>";
        echo "<th>"; echo "NOMBRE EXEMPLAIRE"; echo "</th>";
        echo "<th>"; echo "DATE EMPRUNT"; echo "</th>";
        echo "<th>"; echo "DATE RETOUR PREVUE"; echo "</th>";
        echo "<th>"; echo "JOURS RESTANTS"; echo "</th>";
        echo "</tr>";
        $sql->setFetchMode(PDO::FETCH_OBJ);
        while($row=$sql->fetch()){
            echo "<tr>";
            echo "<td>"; echo $row->idAdh; echo "</td>";
            echo "<td>"; echo $row->idLivre; echo "</td>";
            echo "<td>"; echo $row->nbExpEmp; echo "</td>";
            echo "<td>"; echo $row->dateEmprunt; echo "</td>";
            echo "<td>"; echo $row->dateRetourPrevue; echo "</td>";
            $dateRetourPrevue = strtotime($row->dateRetourPrevue);
            $dateActuelle = strtotime(date('Y-m-d'));
            $joursRestants = max(0, ($dateRetourPrevue - $dateActuelle) / (60 * 60 * 24));
            $_SESSION['jours_restants'] = $joursRestants;
            echo "<td>"; echo $joursRestants; echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo '<a href="../Vue/AcceuilAdherant.php">RETURN</a>';
    }
}
   

if(isset($_GET['btnCherALBA'])){
    $sql = $bdd->query("SELECT * FROM livre WHERE auteur like '%{$_GET['srchLibtAt']}%' ");
    if($sql->rowCount()==0){
        echo "Sorry! No book found .try searching again . ";
    }
    else{
        echo "<table class='table table-border table-hover'>";
        echo "<tr style='background-color: #dab7e7;'>";
        echo "<th>"; echo "TITRE"; echo "</th>";
        echo "<th>"; echo "AUTEUR"; echo "</th>";
        echo "<th>"; echo "GENRE"; echo "</th>";
        echo "<th>"; echo "NOMBRE EXEMPLAIRES"; echo "</th>";
        echo "<th>"; echo "DISPONIBILITE"; echo "</th>";
        echo "</tr>";
        $sql->setFetchMode(PDO::FETCH_OBJ);
        while($row=$sql->fetch()){
            echo "<tr>";
            echo "<td>"; echo $row->titre; echo "</td>";
            echo "<td>"; echo $row->auteur; echo "</td>";
            echo "<td>"; echo $row->genre; echo "</td>";
            echo "<td>"; echo $row->nbExmp; echo "</td>";
            echo "<td>"; echo $row->disp; echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo '<a href="../Vue/AcceuilAdherant.php">RETURN</a>';
    }
}

?>