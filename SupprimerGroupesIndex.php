<?php 

include "connexion.php";
if (isset($_GET['deletenomGroupe'])){
    $nomGroupe=$_GET['deletenomGroupe'];
    $conn=mysqli_connect("localhost","root",'','gestion_etudiant');
$req="DELETE FROM `groupe` WHERE `groupe`.nomGroupe=$nomGroupe ";
$result=mysqli_query($conn,$req);
if($result){
    echo "suppression reussie";
}
}
?>