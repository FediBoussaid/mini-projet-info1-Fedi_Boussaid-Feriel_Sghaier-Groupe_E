<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
 else if (isset($_GET['nomGroupe'])){
   //$conn=mysqli_connect("localhost","root","","gestion");
   $conn=mysqli_connect("localhost","root",'','gestion_etudiant');
   //$id=$_REQUEST['id'];
   $nomGroupe=$_REQUEST['nomGroupe'];
   $requete="UPDATE groupe set nomGroupe='$nomGroupe' where nomGroupe='$nomGroupe'";
   $query=mysqli_query($conn,$requete);
   if (isset($query)){
      //header("location:afficherGroupe.php");
   }
   else{
      echo "<h1>ERREUR</h1>";
   }
   }

else {
//$nom=$_REQUEST['nom'];
$nomGroupe=$_REQUEST['nomGroupe'];
include("connexion.php");
         $sel=$pdo->prepare("select nomGroupe from groupe where nomGroupe=? limit 1");
         $sel->execute(array($nomGroupe));
         $tab=$sel->fetchAll();
         if(count($tab)>0){
            $erreur="Groupe existe déja";// groupe existe déja
            echo"<h1>Groupe existe déja</h1>";}
         else{
            $req="insert into groupe values ('$nomGroupe')";
            $reponse = $pdo->exec($req) or die("error");
           // header("location:afficherGroupe.php");
         }  
         
}
?>