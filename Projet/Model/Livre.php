<?php
include "../Model/Connexion.php";

class Livre{
    private $id_livre;
    private $titre;
    private $auteur;
    private $genre;
    private $prix;
    private $nbExp;
    private $dispo;

    public function __construct($id_livre,$titre,$auteur,$genre,$prix,$nbExp,$dispo) {
        $this->id_livre= $id_livre;
        $this->titre = $titre;
        $this->auteur = $auteur;
        $this->genre = $genre;
        $this->prix = $prix;
        $this->nbExp = $nbExp;
        $this->dispo = $dispo;
    }

    public function __get($attr) {
        return $this->$attr;
        
   }
   public function __set($attr,$value) {
       $this->$attr = $value; 
   }

   public function __isset($attr) {
    return isset($this->$attr);
   }

    public function __toString() {
        $genres = implode(', ', $this->genre); 
        return "$this->titre, $this->auteur, $genres, $this->prix, $this->nbExp";
    }

   function ajouterL(){
    global $bdd;
    try{
        $stmt=$bdd->prepare("INSERT INTO livre VALUES(:id, :titre, :auteur, :genre,:prix ,:nbExp,:disp)");
        $stmt->bindParam(':id',$this->id_livre);
        $stmt->bindParam(':titre',$this->titre);
        $stmt->bindParam(':auteur',$this->auteur);
        $stmt->bindParam(':genre',$this->genre);
        $stmt->bindParam(':prix',$this->prix);
        $stmt->bindParam(':nbExp',$this->nbExp);
        $stmt->bindParam(':disp',$this->dispo);
        $stmt->execute();
        $stmt->closeCursor();
        if($stmt->rowCount()>0)
            return true;
        else 
            return false;
    }catch(PDOException $e) {
        return false;
        }
   }


   public function modifierL(){
    global $bdd;

    $stmt=$bdd->prepare("SELECT * FROM livre WHERE idlivre = :id");
        $stmt->bindParam(':id',$this->id_livre); 
        $stmt->execute();
        $modif=false;
        if($stmt->rowCount()>0){
            if($this->titre!=""){
                $stmt=$bdd->prepare("UPDATE livre SET titre = :titre WHERE idlivre = :id") ;
                $stmt->bindParam(':id',$this->id_livre);
                $stmt->bindParam(':titre',$this->titre);
                $stmt->execute();
                $stmt->closeCursor();
                $modif=true;
                }
            if($this->prix!=""){
                $stmt=$bdd->prepare("UPDATE livre SET prix = :prix WHERE idlivre = :id") ;
                $stmt->bindParam(':id',$this->id_livre);
                $stmt->bindParam(':prix',$this->prix);
                $stmt->execute();
                $stmt->closeCursor();
                $modif=true;
            }
            if($this->nbExp!=""){
                $stmt=$bdd->prepare("UPDATE livre SET nbExmp =:nbExp WHERE idlivre = :id") ;
                $stmt->bindParam(':id',$this->id_livre);
                $stmt->bindParam(':nbExp',$this->nbExp);
                $stmt->execute();
                $stmt->closeCursor();
                $modif=true;
            }
            if($this->dispo!=""){
                $stmt=$bdd->prepare("UPDATE livre SET disp =:dispo WHERE idlivre = :id") ;
                $stmt->bindParam(':id',$this->id_livre);
                $stmt->bindParam(':dispo',$this->dispo);
                $stmt->execute();
                $stmt->closeCursor();
                $modif=true;
            }
        }
        return $modif;
}

function supprimerL(){
    global $bdd;
    $stmt=$bdd->prepare("DELETE FROM livre WHERE idlivre = :id") ;
        $stmt->bindParam(':id',$this->id_livre);
        $stmt->execute();
        $stmt->closeCursor();
        if($stmt->rowCount()>0)
        return true;
        else return false;
        
}

function restituerL(){
    global $bdd;
    $stmt =$bdd->prepare("UPDATE Livre SET nbExmp = nbExmp + 1 WHERE idlivre = :idLiv ");
    $stmt->bindParam(':idLiv', $this->id_livre);
    $stmt->execute();
    $stmt->closeCursor();
    if($stmt->rowCount()>0){
        return true;
    }
    return false;
}
}

?>