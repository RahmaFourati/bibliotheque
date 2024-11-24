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
                <input type="text" class="form-control" name="search"  placeholder="search adherant by name ..." required="">
                <button style="background-color: rgb(100, 100, 195)" type="submit" name="subSearchAdh" class="btn btn-default" >
                <span class="glyphicon glyphicon-search"></span></button>
            </div>
        </form>
        <form class="navbar-form" method="get" name="form1" action="">
            <div>
                <input type="text" class="form-control" name="search2" placeholder="search adherant by id ..." required="">
                <button style="background-color: rgb(100, 100, 195)" type="submit" name="subSearchAdhid" class="btn btn-default" >
                <span class="glyphicon glyphicon-search"></span></button>
            </div>
        </form>
        <form class="navbar-form" method="get" name="form1" action="../Controller/controlAuth.php">
            <div>
                <input type="text" class="form-control" name="search" placeholder="delete adherant by name ..." required="">
                <button style="background-color: rgb(100, 100, 195)" type="submit" name="subDelAdh" class="btn btn-default" >
                <span class="glyphicon glyphicon-trash"></span></button>
            </div>
        </form>
    </div>
<section>
    <h2 style="color:rgb(100, 100, 195)"> * list of Adherants</h2>
    <?php

    
if(isset($_GET['subSearchAdh'])){
    $sql = $bdd->query("SELECT * FROM adherant WHERE name like '%{$_GET['search']}%' ");
    if($sql->rowCount()==0){
        echo "Sorry! No adherant found .try searching again . ";
    }
    else{
        echo "<table class='table table-border table-hover'>";
        echo "<tr style='background-color: rgb(100, 100, 195);'>";
        echo "<th>"; echo "ID"; echo "</th>";
        echo "<th>"; echo "USERNAME"; echo "</th>";
        echo "<th>"; echo "MAIL"; echo "</th>";
        echo "<th>"; echo "NUMEROTELEPHONE"; echo "</th>";
        echo "<th>"; echo "PASSWORD"; echo "</th>";
        echo "</tr>";
        $sql->setFetchMode(PDO::FETCH_OBJ);
        while($row=$sql->fetch()){
            echo "<tr>";
            echo "<td>"; echo $row->idAdh; echo "</td>";
            echo "<td>"; echo $row->name; echo "</td>";
            echo "<td>"; echo $row->mail; echo "</td>";
            echo "<td>"; echo $row->numTel; echo "</td>";
            echo "<td>"; echo $row->password; echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}else{
    if(isset($_GET['subSearchAdhid'])){
        $sql = $bdd->query("SELECT * FROM adherant WHERE idAdh like '%{$_GET['search2']}%' ");
        if($sql->rowCount()==0){
            echo "Sorry! No adherant found .try searching again . ";
        }
        else{
            echo "<table class='table table-border table-hover'>";
            echo "<tr style='background-color: rgb(100, 100, 195);'>";
            echo "<th>"; echo "ID"; echo "</th>";
            echo "<th>"; echo "USERNAME"; echo "</th>";
            echo "<th>"; echo "MAIL"; echo "</th>";
            echo "<th>"; echo "NUMEROTELEPHONE"; echo "</th>";
            echo "<th>"; echo "PASSWORD"; echo "</th>";
            echo "</tr>";
            $sql->setFetchMode(PDO::FETCH_OBJ);
            while($row=$sql->fetch()){
                echo "<tr>";
                echo "<td>"; echo $row->idAdh; echo "</td>";
                echo "<td>"; echo $row->name; echo "</td>";
                echo "<td>"; echo $row->mail; echo "</td>";
                echo "<td>"; echo $row->numTel; echo "</td>";
                echo "<td>"; echo $row->password; echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    }else{
    $sql = $bdd->query("SELECT * FROM adherant");
    echo "<table class='table table-border table-hover'>";
        echo "<tr style='background-color: rgb(100, 100, 195);'>";
        echo "<th>"; echo "ID"; echo "</th>";
        echo "<th>"; echo "USERNAME"; echo "</th>";
        echo "<th>"; echo "MAIL"; echo "</th>";
        echo "<th>"; echo "NUMEROTELEPHONE"; echo "</th>";
        echo "<th>"; echo "PASSWORD"; echo "</th>";
        echo "</tr>";
        $sql->setFetchMode(PDO::FETCH_OBJ);
        while($row=$sql->fetch()){
            echo "<tr>";
            echo "<td>"; echo $row->idAdh; echo "</td>";
            echo "<td>"; echo $row->name; echo "</td>";
            echo "<td>"; echo $row->mail; echo "</td>";
            echo "<td>"; echo $row->numTel; echo "</td>";
            echo "<td>"; echo $row->password; echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}

?>
    

</body>
</html>