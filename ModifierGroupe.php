<?php
   session_start();
   if($_SESSION["autoriser"]!="oui"){
      header("location:login.php");
      exit();
   }
   if(date("H")<18)
      $bienvenue="Bonjour et bienvenue ".
      $_SESSION["prenomNom"].
      " dans votre espace personnel";
   else
      $bienvenue="Bonsoir et bienvenue ".
      $_SESSION["prenomNom"].
      " dans votre espace personnel";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une classe</title>
    <!-- Bootstrap core CSS -->
<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core JS-JQUERY -->
<script src="./assets/dist/js/jquery.min.js"></script>
<script src="./assets/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="./assets/jumbotron.css" rel="stylesheet">

</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="#"><img src="download.png" height="65px" width="200px" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
  
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="index.php" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Groupes</a><div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="afficherEtudiants.php">Lister tous les étudiants</a>
          <a class="dropdown-item" href="afficherEtudiantsParClasse.php">Etudiants par Groupe</a>
          <a class="dropdown-item" href="AjouterGroupe.php">Ajouter Groupe</a>
          <a class="dropdown-item" href="ModifierGroupe.php">Modifier Groupe</a>
          <a class="dropdown-item" href="SupprimerGroupe.php">Supprimer Groupe</a>

        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Etudiants</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="AjouterEtudiant.php">Ajouter Etudiant</a>
          <a class="dropdown-item" href="ChercherEtudiant.php">Chercher Etudiant</a>
          <a class="dropdown-item" href="ModifierEtudiant.php">Modifier Etudiant</a>
          <a class="dropdown-item" href="supprimeretudiant.php">Supprimer Etudiant</a>


        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Absences</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="SaisirAbscence.php">Saisir Absence</a>
          <a class="dropdown-item" href="etatAbscence.php">État des absences pour un groupe</a>
        </div>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="deconnexion.php">Se Déconnecter <span class="sr-only">(current)</span></a>
      </li>

    </ul>
  
    <form id="myForm" method="GET" action="ChercherGroupe.php" class="form-inline my-2 my-lg-0">
      
      <button type="submit" class="btn btn-primary btn-block active">Rechercher Un Groupe</button>
    </form>
  </div>
</nav><br><br>

      
<main role="main">
        <div class="jumbotron">
            <div class="container">
         <br/> <br/>
              <h1 class="display-4">Modifier une Classe</h1>
          
            </div>
          </div>
          <div class="container">
<p>
 <form id="myForm" method="POST" action="" >
    
  

    <div class="form-group">
     <label for="anclasse">Classe:</label><br>
     <input type="text" id="anclasse" name="anclasse"  class="form-control" required pattern="INFO[1-3]{1}-[A-E]{1}"/>
    </div><br>
    <p>Nouvelle Classe :  </p><br>
     <!--Classe-->
     <div class="form-group">
     <label for="nclasse">Classe:</label><br>
     <input type="text" id="nclasse" name="nclasse" class="form-control" />
    <!-- title="Pattern INFOX-X. Par Exemple: INFO1-A, INFO2-E, INFO3-C">-->
     <!--Bouton Ajouter-->
     <button type="submit" class="btn btn-primary " style="background-color:#3D5AFE;">Modifier</button>
     <div id="demo"></div>
   
 </form>
 </p> 
 </div>
 <?php
 if (isset($_REQUEST['nclasse']))
{
  if($_SESSION["autoriser"]!="oui"){
   header("location:login.php");
   exit();
  }
 else {
    $anclasse=$_REQUEST['anclasse'];
    $nclasse=$_REQUEST['nclasse'];
    $erreur="";
   
 
 include("connexion.php");
         
 
          $sel=$pdo->prepare("select  classe from etudiant where classe=? ");
          $sel->execute(array($anclasse));
          $tab=$sel->fetchAll();
          if ((count($tab)==0) )
          {  $erreur="NOT OK";}
          else {
          if(count($tab)>0){
          $req="UPDATE etudiant set  Classe='$nclasse' WHERE classe='$anclasse'" ;
          $reponse = $pdo->exec($req) or die("error");
          $erreur ="OK"; } 
          }
         if ( $erreur =="OK")
         { echo '<h5 class=container style="color:limegreen;">Modification de la classe effectuée avec succes</h5>';}
         else {
           echo '<h5 class=container style="color:red ;">classe non existante </h5>';
         }
         
          }  
 
 } ?>
 
</main>


<footer class="container">
    <p>&copy; ENICAR 2021-2022</p>
  </footer>


</body>
</html>