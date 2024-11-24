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
    <link rel="stylesheet" type="text/css" href="style.css">
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
                <input type="text" class="form-control" name="search" placeholder="search emprunt by idLivre ..." required="">
                <button style="background-color: rgb(100, 100, 195)" type="submit" name="subSearchEmp" class="btn btn-default" >
                <span class="glyphicon glyphicon-search"></span></button>
            </div>
        </form>
    </div>
<section>
    <h2 style="color:rgb(100, 100, 195)"> * list of Emprunt</h2>
    <?php

    //--------------------------------------------search by id Livre-----------------------
if(isset($_GET['subSearchEmp'])){
    $sql = $bdd->query("SELECT * FROM emprunt WHERE idLivre like '%{$_GET['search']}%' ");
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
        echo "</tr>";
        $sql->setFetchMode(PDO::FETCH_OBJ);
        while($row=$sql->fetch()){
            echo "<tr>";
            echo "<td>"; echo $row->idAdh; echo "</td>";
            echo "<td>"; echo $row->idLivre; echo "</td>";
            echo "<td>"; echo $row->nbExpEmp; echo "</td>";
            echo "<td>"; echo $row->dateEmprunt; echo "</td>";
            echo "<td>"; echo $row->dateRetourPrevue; echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}else{

    $sql = $bdd->query("SELECT * FROM emprunt");
        echo "<table class='table table-border table-hover'>";
        echo "<tr style='background-color: rgb(100, 100, 195);'>";
        echo "<th>"; echo "ID ADHERANT"; echo "</th>";
        echo "<th>"; echo "ID LIVRE"; echo "</th>";
        echo "<th>"; echo "NOMBRE EXEMPLAIRE"; echo "</th>";
        echo "<th>"; echo "DATE EMPRUNT"; echo "</th>";
        echo "<th>"; echo "DATE RETOUR PREVUE"; echo "</th>";
        echo "</tr>";
        $sql->setFetchMode(PDO::FETCH_OBJ);
        while($row=$sql->fetch()){
            echo "<tr>";
            echo "<td>"; echo $row->idAdh; echo "</td>";
            echo "<td>"; echo $row->idLivre; echo "</td>";
            echo "<td>"; echo $row->nbExpEmp; echo "</td>";
            echo "<td>"; echo $row->dateEmprunt; echo "</td>";
            echo "<td>"; echo $row->dateRetourPrevue; echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
}
?>
 
 <div class="srch">
    <form class="navbar-form" method="get" name="form2" action="">
            <div>
                <input type="text" class="form-control" name="searchbyidadh" placeholder="search emprunt by idAdh ..." required="">
                <button style="background-color: rgb(100, 100, 195)" type="submit" name="subSearchEmpAd" class="btn btn-default" >
                <span class="glyphicon glyphicon-search"></span></button>
            </div>
    </form>
</div>
<?php

   //--------------------------------------search by id Adherant----------------------------
if(isset($_GET['subSearchEmpAd'])){
    $sql = $bdd->query("SELECT * FROM emprunt WHERE idAdh like '%{$_GET['searchbyidadh']}%' ");
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
        echo "</tr>";
        $sql->setFetchMode(PDO::FETCH_OBJ);
        while($row=$sql->fetch()){
            echo "<tr>";
            echo "<td>"; echo $row->idAdh; echo "</td>";
            echo "<td>"; echo $row->idLivre; echo "</td>";
            echo "<td>"; echo $row->nbExpEmp; echo "</td>";
            echo "<td>"; echo $row->dateEmprunt; echo "</td>";
            echo "<td>"; echo $row->dateRetourPrevue; echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}?>
<div class="srch">
<form class="navbar-form" method="get" name="form3" action="">
            <div>
                <input type="text" class="form-control" name="search3" placeholder="search emprunt by dateEmprunt ..." required="">
                <button style="background-color: rgb(100, 100, 195)" type="submit" name="subSearchEmpDt" class="btn btn-default" >
                <span class="glyphicon glyphicon-search"></span></button>
            </div>
        </form>
</div>
  <?php
//----------------------------------search by date emprunt-----------------------------
 
if(isset($_GET['subSearchEmpDt'])){
    $sql = $bdd->query("SELECT * FROM emprunt WHERE dateEmprunt like '%{$_GET['search3']}%' ");
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
        echo "</tr>";
        $sql->setFetchMode(PDO::FETCH_OBJ);
        while($row=$sql->fetch()){
            echo "<tr>";
            echo "<td>"; echo $row->idAdh; echo "</td>";
            echo "<td>"; echo $row->idLivre; echo "</td>";
            echo "<td>"; echo $row->nbExpEmp; echo "</td>";
            echo "<td>"; echo $row->dateEmprunt; echo "</td>";
            echo "<td>"; echo $row->dateRetourPrevue; echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}
?>
    

</body>
</html>