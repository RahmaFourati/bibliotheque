<?php
include "../Model/Connexion.php";
class Emprunt{
    private $id_adherent;
    private $id_livre;
    private $nbExpEmp;
    private $date_emprunt;
    private $date_retour_prevue;
    

    public function __construct($id_adherent,$id_livre,$nbExpEmp,$date_emprunt,$date_retour_prevue) {
        $this->id_adherent = $id_adherent;
        $this->id_livre= $id_livre;
        $this->nbExpEmp = $nbExpEmp;
        $this->date_emprunt = $date_emprunt;
        $this->date_retour_prevue = $date_retour_prevue;
        
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

   function ajouterE(){
    global $bdd;

    // Vérifier si l'utilisateur existe
    $userExists = false;
    $stmtUser = $bdd->prepare("SELECT * FROM Adherant WHERE idAdh = :idUser");
    $stmtUser->bindParam(':idUser', $this->id_adherent);
    $stmtUser->execute();
    if ($stmtUser->fetch(PDO::FETCH_ASSOC)) {
        $userExists = true;
    }
    $stmtUser->closeCursor();

    // Vérifier si le livre existe
    $livreExists = false;
    $stmtLiv = $bdd->prepare("SELECT * FROM Livre WHERE idLivre = :idLiv");
    $stmtLiv->bindParam(':idLiv', $this->id_livre);
    $stmtLiv->execute();
    if ($stmtLiv->fetch(PDO::FETCH_ASSOC)) {
        $livreExists = true;
    }
    $stmtLiv->closeCursor();

    // Vérifier le nombre d'exemplaires disponibles
    $nbExemplaires = 0;
    if ($livreExists) {
        $stmtNbEx = $bdd->prepare("SELECT nbExmp FROM Livre WHERE idLivre = :idLiv");
        $stmtNbEx->bindParam(':idLiv', $this->id_livre);
        $stmtNbEx->execute();
        $nbExemplaires = $stmtNbEx->fetchColumn();
        $stmtNbEx->closeCursor();
    }

    if ($userExists && $livreExists && $nbExemplaires > 0) {
        // Ajouter l'emprunt dans la base de données
        $stmtAjoutEmprunt = $bdd->prepare("INSERT INTO Emprunt VALUES (:idUser, :idLiv, :nbExp, :dateEmprunt, :dateRetour)");
        $stmtAjoutEmprunt->bindParam(':idUser', $this->id_adherent);
        $stmtAjoutEmprunt->bindParam(':idLiv', $this->id_livre);
        $stmtAjoutEmprunt->bindParam(':nbExp',  $this->nbExpEmp);
        $stmtAjoutEmprunt->bindParam(':dateEmprunt', $this->date_emprunt);
        // Ici, vous devez définir la date de retour prévue en fonction de vos besoins
        $dateRetour = date('Y-m-d', strtotime( $this->date_emprunt . ' + 14 days')); // Exemple: 14 jours à partir de la date d'emprunt
        $stmtAjoutEmprunt->bindParam(':dateRetour', $this->date_retour_prevue);
        $stmtAjoutEmprunt->execute();
        $stmtAjoutEmprunt->closeCursor();
        
        // Mettre à jour le nombre d'exemplaires disponibles du livre
        $stmtUpdateNbEx = $bdd->prepare("UPDATE Livre SET nbExmp = nbExmp - :nbExp WHERE idLivre = :idLiv");
        $stmtUpdateNbEx->bindParam(':idLiv', $this->id_livre);
        $stmtUpdateNbEx->bindParam(':nbExp',  $this->nbExpEmp);
        $stmtUpdateNbEx->execute();
        $stmtUpdateNbEx->closeCursor();

        $nbExemplairesUpdated = $nbExemplaires - $this->nbExpEmp;
        if ($nbExemplairesUpdated == 0) {
            // Mettre à jour la disponibilité du livre
            $disponible = false;
            $stmtUpdateDispo = $bdd->prepare("UPDATE Livre SET disp = :disponible WHERE idLivre = :idLiv");
            $stmtUpdateDispo->bindParam(':idLiv', $this->id_livre);
            $stmtUpdateDispo->bindParam(':disponible', $disponible, PDO::PARAM_BOOL);
            $stmtUpdateDispo->execute();
            $stmtUpdateDispo->closeCursor();
        }
    
        return true;
    } else {
        // Un des contrôles a échoué, l'emprunt ne peut pas être ajouté
        return false;
    }
}

   public function modifierE(){
    global $bdd;

    $stmt=$bdd->prepare("SELECT * FROM emprunt WHERE idAdh = :idAdh  AND  idlivre = :idLiv");
        $stmt->bindParam(':idLiv',$this->id_livre); 
        $stmt->bindParam(':idAdh',$this->id_adherent); 
        $stmt->execute();
        $modif=false;
        if($stmt->rowCount()>0){
            if($this->nbExpEmp!=""){
                $stmt=$bdd->prepare("UPDATE emprunt SET nbExpEmp = :nbEx WHERE idAdh = :idAdh  AND idlivre = :idLiv") ;
                $stmt->bindParam(':idLiv',$this->id_livre);
                $stmt->bindParam(':idAdh',$this->id_adherent); 
                $stmt->bindParam(':nbEx',$this->nbExpEmp);
                $stmt->execute();
                $stmt->closeCursor();
                $modif=true;
            }
            if($this->date_emprunt!=""){
                $stmt=$bdd->prepare("UPDATE emprunt SET dateEmprunt = :dtEmp WHERE idAdh = :idAdh  AND idlivre = :idLiv") ;
                $stmt->bindParam(':idLiv',$this->id_livre);
                $stmt->bindParam(':idAdh',$this->id_adherent); 
                $stmt->bindParam(':dtEmp',$this->date_emprunt);
                $stmt->execute();
                $stmt->closeCursor();
                $modif=true;
            }
            if($this->date_retour_prevue!=""){
                $stmt=$bdd->prepare("UPDATE emprunt SET dateRetourPrevue = :dtrt WHERE idAdh = :idAdh  AND idlivre = :idLiv") ;
                $stmt->bindParam(':idLiv',$this->id_livre);
                $stmt->bindParam(':idAdh',$this->id_adherent); 
                $stmt->bindParam(':dtrt',$this->date_retour_prevue);
                $stmt->execute();
                $stmt->closeCursor();
                $modif=true;
            }
        }
        return $modif;
    }

    function supprimerE(){
        global $bdd;
        $stmt=$bdd->prepare("DELETE FROM emprunt WHERE idAdh = :idAdh  AND idlivre = :idLiv AND dateEmprunt = :dtEmp ") ;
            $stmt->bindParam(':idLiv',$this->id_livre);
            $stmt->bindParam(':idAdh',$this->id_adherent); 
            $stmt->bindParam(':dtEmp',$this->date_emprunt);
            $stmt->execute();
            $stmt->closeCursor();
            if($stmt->rowCount()>0)
                return true;
            else 
                return false;
            
    }
}
?>