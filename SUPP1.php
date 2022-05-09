<?php 
include "connexion.php";
$Classe=$_POST['Classe'];
$Classe=trim($Classe);
$requete=" DELETE from etudiant where Classe='{$Classe}'";
$conn=mysqli_connect("localhost","root",'','gestion_etudiant');
$res3=mysqli_query($conn,$requete);


?>