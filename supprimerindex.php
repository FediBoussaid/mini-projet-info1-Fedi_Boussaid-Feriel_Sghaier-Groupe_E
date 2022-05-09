<?php 

include "connexion.php";
if (isset($_GET['deletecin'])){
    $cin=$_GET['deletecin'];
    $conn=mysqli_connect("localhost","root",'','gestion_etudiant');
$req="DELETE FROM `etudiant`WHERE cin=$cin ";
$result=mysqli_query($conn,$req);
if($result){
    echo "suppression reussie";
}
}
?>