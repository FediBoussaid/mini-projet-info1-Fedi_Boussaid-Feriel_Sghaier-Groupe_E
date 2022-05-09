<?php
$con=mysqli_connect("localhost","root","","gestion_etudiant");
$nomGroupe=$_GET['nomGroupe'];
//$Classe=$_GET['Classe'];
$sql="DELETE FROM groupe where nomGroupe='$nomGroupe'";
//$sql1="DELETE FROM etudiant where Classe='$Classe'"
$query=mysqli_query($con,$sql);
//$query1=mysqli_query($con,$sql1);
if (isset($query))
 {header("location:SupprimerGroupe.php");}
else{
    echo "<h1>ERREUR</h1>";
}; 
//if (isset($query1))
// {header("location:SupprimerGroupe.php");}
//else{
  //  echo "<h1>ERREUR</h1>";
//}; 
 ?>