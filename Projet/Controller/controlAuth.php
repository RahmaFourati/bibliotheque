<?php
require_once('../Model/Adherant.php');
require_once('../Model/Livre.php');
require_once('../Model/Emprunt.php');
require_once('../Model/User.php');
include "../Model/Connexion.php";
session_start();


function generateUniqueId() {
    $prefix = 'Ad_'; 
    $uniqueId = uniqid($prefix);
    return $uniqueId;
}

function ajouterAdherant(){
    if(!empty($_GET['userName']) && !empty($_GET['email']) && !empty($_GET['numTel']) && !empty($_GET['pass']) && !empty($_GET['ConfirmPass'])){
        $name=$_GET['userName'];
        $mail=$_GET['email'];
        $tel=$_GET['numTel'];
        $pas=$_GET['pass'];
        $confPas=$_GET['ConfirmPass'];
        if($pas ==$confPas){
            $idd = generateUniqueId();
            $adherant=new Adherant($idd,$name,$mail,$tel,$pas);
            return ($adherant->ajouter());
        }
    }
    else return false; 
}

function modifierAdherant(){
    
    $name=$_GET['userName'];
    $mail=$_GET['email'];
    $tel=$_GET['numTel'];
    $pas=$_GET['pass'];
    $adherant=new Adherant('',$name,$mail,$tel,$pas);
    return($adherant->modifier());
}

if(isset($_GET['btnRegister'])){
    $ajout=ajouterAdherant();
    if($ajout){
        echo '<script>alert("Félicitations, vous êtes inscrit!")</script>';
    }
    else{
    echo '<script>alert("att rempli tous les champs")</script>';
    }
    echo '<script> document.location.href="../Vue/Acceuil.php"</script>';
    
}

if(isset($_GET['Add'])){
    $ajout=ajouterAdherant();
    if($ajout){
        echo '<script>alert("Félicitations, adherant ajouté!")</script>';
    }
    else{
    echo '<script>alert("att rempli tous les champs")</script>';
    echo '<script> document.location.href="../Vue/add_mod_adh.php"</script>';
    }
    echo '<script> document.location.href="../Vue/searchAdh.php"</script>';
}

if(isset($_GET["modifier"])) {
    $modif= modifierAdherant();
    if($modif){
        echo '<script>alert("Adherant modifié")</script>';
        echo '<script> document.location.href="../Vue/searchAdh.php"</script>';
    }else {
        echo '<script>alert("Aucune modification!")</script>';
        echo '<script> document.location.href="../Vue/add_mod_adh.php"</script>';
    }
}

function supprimerAdherant()
{
    if(isset($_GET["subDelAdh"]))
        $name=$_GET['search'];
        $adherant=new Adherant('',$name,"","","");
        echo '<script>alert("voulez-vous vraiment supprime?!")</script>';
        return ($adherant->supprimer());

}

if(isset($_GET["subDelAdh"])) {
    $supp= supprimerAdherant();
    if($supp){
    echo '<script>alert("Adherant supprime")</script>';
    echo '<script> document.location.href="../Vue/searchAdh.php"</script>';
    }else {
    echo '<script>alert("Aucune suppression!")</script>';
    echo '<script> document.location.href="../Vue/searchAdh.php"</script>';
    }
}


if(isset($_GET['btnSubLogin'])){
    $log = $_GET['userName'];
    $pass = $_GET['pass'];
    $u1 = new User($log, $pass);
    if($u1->connect()){
        $_SESSION['login_user']=$_GET['userName'];
        echo '<script> document.location.href="../Vue/AcceuilAdmin.php"</script>';
    }else{
        $aaa=new Adherant('',$log,'','',$pass);
        if($aaa->connect()){
            $_SESSION['login_user']=$_GET['userName'];
            $_SESSION['alerteAffichee']=true;
            echo '<script> document.location.href="../Vue/AcceuilAdherant.php"</script>';
            
        }else{
        echo '<script>alert("Identifiant ou mot de passe incorrect. Veuillez réessayer.")</script>';
        echo '<script> document.location.href="../Vue/Login.php"</script>';
        }
     
    }
}



?>