<?php
require_once('../Model/Adherant.php');
require_once('../Model/Livre.php');
require_once('../Model/Emprunt.php');
require_once('../Model/User.php');
include "../Model/Connexion.php";


function ajouterEmprunt(){
    if(!empty($_GET['idLiv']) && !empty($_GET['idAdh']) && !empty($_GET['nbExmpEmprunte']) && !empty($_GET['dateEmprunt'])){
        $idliv=$_GET['idLiv'];
        $idadh=$_GET['idAdh'];
        $nbexp=$_GET['nbExmpEmprunte'];
        $dtdeb=$_GET['dateEmprunt'];
        $dtrt=$_GET['dateRetour'];
        if($dtdeb<$dtrt){
            $emprunt=new Emprunt($idadh,$idliv,$nbexp,$dtdeb,$dtrt);
            return ($emprunt->ajouterE());
        }else{
            echo '<script>alert("verifier date!")</script>';
            return false;
        }
    }
    else return false; 
}

if (isset($_GET['Add'])) {
        $ajout = ajouterEmprunt();
        if ($ajout) {
            echo '<script>alert("emprunt ajouté!")</script>';
            echo '<script> document.location.href="../Vue/searchEmprunt.php"</script>';
        } else {
            echo '<script>alert("Veuillez remplir tous les champs")</script>';
            echo '<script> document.location.href="../Vue/empruntAdm.php"</script>';
        }
}

function modifierEmprunt(){
    
    $idliv=$_GET['idLiv'];
    $idadh=$_GET['idAdh'];
    $nbexp=$_GET['nbExmpEmprunte'];
    $dtdeb=$_GET['dateEmprunt'];
    $dtrt=$_GET['dateRetour'];
    $emprunt=new Emprunt($idadh,$idliv,$nbexp,$dtdeb,$dtrt);
        return($emprunt->modifierE());
}

if(isset($_GET["modifier"])) {
    $modif= modifierEmprunt();
    if($modif){
    echo '<script>alert("Emprunt modifié")</script>';
    echo '<script> document.location.href="../Vue/searchEmprunt.php"</script>';
}
else  {
echo '<script>alert("Aucune modification!")</script>';
echo '<script> document.location.href="../Vue/empruntAdm.php"</script>';
}
}

function supprimerEmprunt()
{
    $idliv=$_GET['idLiv'];
    $idadh=$_GET['idAdh'];
    $dtdeb=$_GET['dateEmprunt'];
    $emprunt=new Emprunt($idadh,$idliv,"",$dtdeb,"");
    return ($emprunt->supprimerE());

}

if(isset($_GET["supp"])) {
    $supp= supprimerEmprunt();
    if($supp){
    echo '<script>alert("voulez-vous vraiment supprime?!")</script>';
    echo '<script>alert("emprunt supprime")</script>';
    echo '<script> document.location.href="../Vue/searchEmprunt.php"</script>';
    }else {
    echo '<script>alert("Aucune suppression!")</script>';
    echo '<script> document.location.href="../Vue/empruntAdm.php"</script>';
    }
}
?>