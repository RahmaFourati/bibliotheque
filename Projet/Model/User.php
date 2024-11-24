<?php
include "../Model/Connexion.php";
class User{
    private $login;
    private $password;

    public function __construct($login,$password) {
        $this->login = $login;
        $this->password = $password;
    }

    public function __get($attr) {
        return $this->$attr;
        
   }
   public function __set($attr,$value) {
       $this->$attr = $value; 
   }

   public function __toString(){
    $s="succes de connexion ,user : $this->login    ";
    return $s;
    }

   public function __isset($attr) {
    return isset($this->$attr);
   }

   public function getType() {
     return $this->type;
    }

   public function connect(){
    include "Connexion.php";
    $sql = $bdd->query("SELECT * FROM user");
    $sql->setFetchMode(PDO::FETCH_OBJ);
    while($user = $sql->fetch()){ 
        if($user->login==$this->login && $user->password==$this->password)
            return true;
    }
        return false;
   }

   function ajouterU(){
    global $bdd;
    try{
        $stmt=$bdd->prepare("INSERT INTO user VALUES(:nom,:pass)");
        $stmt->bindParam(':nom',$this->login);
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

}
?>