<?php
require_once('../Model/Adherant.php');
require_once('../Model/Livre.php');
require_once('../Model/Emprunt.php');
require_once('../Model/User.php');
include "../Model/Connexion.php";

//../Controller/controlLivres.php
function ajouterLivre(){
    if(!empty($_GET['idLiv']) && !empty($_GET['titre']) && !empty($_GET['auteur']) && !empty($_GET['genres']) 
    && !empty($_GET['prix']) && !empty($_GET['NbExmpExiste']) && !empty($_GET['dispo'])){

        $id=$_GET['idLiv'];
        $titre=$_GET['titre'];
        $aut=$_GET['auteur'];
        $genre=$_GET['genres'];
        $prix=$_GET['prix'];
        $NbExm =$_GET['NbExmpExiste'];
        $disp =$_GET['dispo'];
            $livre=new livre($id,$titre,$aut,$genre,$prix,$disp,$NbExm);
            return ($livre->ajouterL());
    }
    else return false; 
}

function modifierLivre(){
    
    $id=$_GET['idLiv'];
    $titre=$_GET['titre'];
    $aut=$_GET['auteur'];
    $genre=$_GET['genres'];
    $prix=$_GET['prix'];
    $NbExm =$_GET['NbExmpExiste'];
    $disp =$_GET['dispo'];
        $livre=new livre($id,$titre,$aut,$genre,$prix,$disp,$NbExm);
        return($livre->modifierL());
}


if(isset($_GET['Add'])){
    
    $ajout = ajouterLivre();
    if($ajout){
        echo '<script>alert("Livre ajouté!")</script>';
        echo '<script> document.location.href="../Vue/livreAdmin.php"</script>';
    } else {
        echo '<script>alert("Veuillez remplir tous les champs")</script>';
        echo '<script> document.location.href="../Vue/addLiv.php"</script>';
    }
}


if(isset($_GET["modifier"])) {
    $modif= modifierLivre();
    if($modif)
    echo '<script>alert("livre modifié")</script>';
else  echo '<script>alert("Aucune modification!")</script>';
echo '<script> document.location.href="../Vue/addLiv.php"</script>';

}

function supprimerLivre()
{
    if(isset($_GET["subDelLiv"]))
    $id=$_GET['search'];
    $livre=new Livre($id,"","","","","","");
    echo '<script>alert("voulez-vous vraiment supprime?!")</script>';
    return ($livre->supprimerL());

}

if(isset($_GET["subDelLiv"])) {
    $supp= supprimerLivre();
    if($supp){
    echo '<script>alert("livre supprime")</script>';
    echo '<script> document.location.href="../Vue/livreAdmin.php"</script>';
    }else {
    echo '<script>alert("Aucune suppression!")</script>';
    echo '<script> document.location.href="../Vue/addLiv.php"</script>';
}
}

?>