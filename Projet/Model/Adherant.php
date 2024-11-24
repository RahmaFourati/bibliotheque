<?php
include "../Model/Connexion.php";
class Adherant{
    private $id_adherent;
    private $name;
    private $email;
    private $numTel;
    private $password;

    public function __construct($id_adherent,$name,$email,$numTel,$password) {
        $this->id_adherent = $id_adherent;
        $this->name = $name;
        $this->numTel = $numTel;
        $this->email = $email;
        $this->password = $password;
    }

    public function __construct2($name, $password) {
        $this->name = $name;
        $this->password = $password;
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
   
   public function __toString(){
    $s="succes de connexion ,user : $this->login    ";
    return $s;
    }

   function ajouter(){
        global $bdd;
        try{
            $stmt=$bdd->prepare("INSERT INTO Adherant VALUES(:id, :nom, :email, :num,:pass)");
            $stmt->bindParam(':id',$this->id_adherent);
            $stmt->bindParam(':nom',$this->name);
            $stmt->bindParam(':email',$this->email);
            $stmt->bindParam(':num',$this->numTel);
            $stmt->bindParam(':pass',$this->password);
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

    public function connect(){
        include "Connexion.php";
        $sql = $bdd->query("SELECT * FROM adherant");
        $sql->setFetchMode(PDO::FETCH_OBJ);
        while($adh = $sql->fetch()){ 
            if($adh->name==$this->name && $adh->password==$this->password)
                return true;
        }
        return false;
    }


    public function modifier(){
        global $bdd;

        $stmt=$bdd->prepare("SELECT * FROM Adherant WHERE name = :nom");
            $stmt->bindParam(':nom',$this->name); 
            $stmt->execute();
            $modif=false;
            if($stmt->rowCount()>0){
                if($this->numTel!=""){
                    $stmt=$bdd->prepare("UPDATE Adherant SET numTel = :num WHERE name = :nom") ;
                    $stmt->bindParam(':nom',$this->name);
                    $stmt->bindParam(':num',$this->numTel);
                    $stmt->execute();
                    $stmt->closeCursor();
                    $modif=true;
                    }
                if($this->email!=""){
                    $stmt=$bdd->prepare("UPDATE Adherant SET mail = :mail WHERE name = :nom") ;
                    $stmt->bindParam(':nom',$this->name);
                    $stmt->bindParam(':mail',$this->email);
                    $stmt->execute();
                    $stmt->closeCursor();
                    $modif=true;
                }
                if($this->password!=""){
                    $stmt=$bdd->prepare("UPDATE Adherant SET password =:pass WHERE name = :nom") ;
                    $stmt->bindParam(':nom',$this->name);
                    $stmt->bindParam(':pass',$this->password);
                    $stmt->execute();
                    $stmt->closeCursor();
                    $modif=true;
                }
            }
            return $modif;
    }

    function supprimer(){
        global $bdd;
        $stmt=$bdd->prepare("DELETE FROM adherant WHERE name = :nom") ;
            $stmt->bindParam(':nom',$this->name);
            $stmt->execute();
            $stmt->closeCursor();
            if($stmt->rowCount()>0)
            return true;
            else return false;
            
}
}
?>