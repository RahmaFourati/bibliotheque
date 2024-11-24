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
    <link rel="stylesheet" type="text/css" href="styleLivre.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

    <header>
        <?php
        include "./navbar.php";
        ?> 
    </header>

    <div class="srch">
        <form class="navbar-form" method="get" name="form1" action="">
            <div>
                <input type="text" class="form-control" name="search" placeholder="search book by titre ..." required="">
                <button style="background-color: rgb(100, 100, 195)" type="submit" name="subSearchLiv" class="btn btn-default" >
                <span class="glyphicon glyphicon-search"></span></button>
            </div>
        </form>
        <form class="navbar-form" method="get" name="form1" action="../Controller/controlLivres.php">
            <div>
                <input type="text" class="form-control" name="search" placeholder="search book by id ..." required="">
                <button style="background-color: rgb(100, 100, 195)" type="submit" name="subDelLiv" class="btn btn-default" >
                <span class="glyphicon glyphicon-trash"></span></button>
            </div>
        </form>
    </div>
<section>
    <h2 style="color:rgb(100, 100, 195)"> * list of books</h2>
    <?php

    
if(isset($_GET['subSearchLiv'])){
    $sql = $bdd->query("SELECT * FROM livre WHERE titre like '%{$_GET['search']}%' ");
    if($sql->rowCount()==0){
        echo "Sorry! No book found .try searching again . ";
    }
    else{
        echo "<table class='table table-border table-hover'>";
        echo "<tr style='background-color: #dab7e7;'>";
        echo "<th>"; echo "ID"; echo "</th>";
        echo "<th>"; echo "TITRE"; echo "</th>";
        echo "<th>"; echo "AUTEUR"; echo "</th>";
        echo "<th>"; echo "GENRE"; echo "</th>";
        echo "<th>"; echo "NOMBRE EXEMPLAIRES"; echo "</th>";
        echo "<th>"; echo "DISPONIBILITE"; echo "</th>";
        echo "</tr>";
        $sql->setFetchMode(PDO::FETCH_OBJ);
        while($row=$sql->fetch()){
            echo "<tr>";
            echo "<td>"; echo $row->idLivre; echo "</td>";
            echo "<td>"; echo $row->titre; echo "</td>";
            echo "<td>"; echo $row->auteur; echo "</td>";
            echo "<td>"; echo $row->genre; echo "</td>";
            echo "<td>"; echo $row->nbExmp; echo "</td>";
            echo "<td>"; echo $row->disp; echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}else{

    $sql = $bdd->query("SELECT * FROM livre");
    echo "<table class='table table-border table-hover'>";
    echo "<tr style='background-color: rgb(100, 100, 195);'>";
    echo "<th>"; echo "ID"; echo "</th>";
    echo "<th>"; echo "TITRE"; echo "</th>";
    echo "<th>"; echo "AUTEUR"; echo "</th>";
    echo "<th>"; echo "GENRE"; echo "</th>";
    echo "<th>"; echo "NOMBRE EXEMPLAIRES"; echo "</th>";
    echo "<th>"; echo "DISPONIBILITE"; echo "</th>";
    echo "</tr>";
    $sql->setFetchMode(PDO::FETCH_OBJ);
    while($row=$sql->fetch()){
        echo "<tr>";
        echo "<td>"; echo $row->idLivre; echo "</td>";
        echo "<td>"; echo $row->titre; echo "</td>";
        echo "<td>"; echo $row->auteur; echo "</td>";
        echo "<td>"; echo $row->genre; echo "</td>";
        echo "<td>"; echo $row->nbExmp; echo "</td>";
        echo "<td>"; echo $row->disp; echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
   
    ?>
    

</body>
</html>