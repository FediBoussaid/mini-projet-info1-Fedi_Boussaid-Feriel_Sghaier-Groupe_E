<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
else {
$nomGroupe=$_REQUEST['nomGroupe'];


include("connexion.php");
         $sel=$pdo->prepare("select nomGroupe from etudiant where nomGroupe=? limit 1");
         $sel->execute(array($nomGroupe));
         $tab=$sel->fetchAll();
         if(count($tab)>0)
            $erreur="NOT OK";// Etudiant existe déja
         else{
            $req="insert into groupe values ($nomGroupe)";
            $reponse = $pdo->exec($req) or die("error");
            $erreur ="OK";
         }  
         echo $erreur;
}
?>