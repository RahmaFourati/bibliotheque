<?php
try
{
$bdd = new PDO('mysql:host=localhost;dbname=bibliotheque', 'root', '');
//echo "cnx reussite";
}
catch (PDOException $e)
{
die('Erreur : ' . $e->getMessage());
}
?>
