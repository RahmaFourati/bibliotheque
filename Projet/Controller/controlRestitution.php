<?php
require_once('../Model/Adherant.php');
require_once('../Model/Livre.php');
require_once('../Model/Emprunt.php');
require_once('../Model/User.php');
include "../Model/Connexion.php";
function restituerLivre(){
    
    $id=$_GET['idLiv'];
    $livre=new livre($id,"","","","","","");
        return($livre->restituerL());
}
function restituerEm(){
    $idliv=$_GET['idLiv'];
    $idadh=$_GET['idAdh'];
    $dtdeb=$_GET['dateEmprunt'];
    $emprunt=new Emprunt($idadh,$idliv,"",$dtdeb,"");
    return ($emprunt->supprimerE());
}

if(isset($_GET['restituer'])){
    $resEm=restituerEm();
    $res=restituerLivre();
    if($res && $resEm)
        echo "Le livre a été restitué avec succès.";
    else{
        echo "Une erreur s'est produite lors de la restitution du livre.";
    }
}
?>