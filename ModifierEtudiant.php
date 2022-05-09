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
    <title>Modifier un étudiant</title>
    <!-- Bootstrap core CSS -->
<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
              <h1 class="display-4">Modifier un Etudiant</h1>
          
            </div>
          </div>
          <div class="container">
<p>
 <form id="myForm" method="POST" action="" >
    
  

    <div class="form-group">
     <label for="cin">CIN:</label><br>
     <input type="text" id="cin" name="cin"  class="form-control" required pattern="[0-9]{8}" title="8 chiffres"/>
    </div><br>
    <p class="fw-bolder">Saisir les nouveaux coordonnées :   </p><br>
     <!--Nom-->
     <div class="form-group">
     <label for="nom">Nom:</label><br>
     <input type="text" id="nom" name="nom" class="form-control" >
    </div>
     <!--Prénom-->
     <div class="form-group">
     <label for="prenom">Prénom:</label><br>
     <input type="text" id="prenom" name="prenom" class="form-control" >
    </div>
     <!--Email-->
     <div class="form-group">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" class="form-control" >
       </div>
     <!--Password-->
     
   
     <!--Classe-->
     <div class="form-group">
     <label for="classe">Classe:</label><br>
     <input type="text" id="classe" name="classe" class="form-control" />
    <!-- title="Pattern INFOX-X. Par Exemple: INFO1-A, INFO2-E, INFO3-C">-->
    </div>
     <!--Adresse-->
     <div class="form-group">
     <label for="adresse">Adresse:</label><br>
     <textarea id="adresse" name="adresse"  class="form-control" >
     </textarea>
    </div>
     <!--Bouton Ajouter-->
     <button type="submit" class="btn btn-primary " style="background-color:#3D5AFE;">modifier</button>
     <div id="demo"></div>
   
 </form>
 </p> 
 </div>
 <?php
 if (isset($_REQUEST['classe'])&&isset($_REQUEST['adresse'])&&isset($_REQUEST['prenom'])&&isset($_REQUEST['nom'])&&isset($_REQUEST['nom'])&&isset($_REQUEST['prenom']))
{
  if($_SESSION["autoriser"]!="oui"){
   header("location:login.php");
   exit();
  }
 else {
    $cin=$_REQUEST['cin'];
    $nom=$_POST["nom"];
    $prenom=$_POST["prenom"];
    $login=$_POST["email"];
    
    $adresse=$_REQUEST['adresse'];
    $classe=$_REQUEST['classe'];
    $erreur="";
   
 
 include("connexion.php");
         
 
          $sel=$pdo->prepare("select  classe from etudiant where cin=? ");
          $sel->execute(array($cin));
          $tab=$sel->fetchAll();
          if ((count($tab)==0) )
          {  $erreur="NOT OK";}
          else {
          if(count($tab)>0){
          $req="UPDATE etudiant set  nom='$nom', prenom='$prenom',email='$login',Classe='$classe',adresse='$adresse' WHERE cin='$cin'" ;
          $reponse = $pdo->exec($req) or die("error");
          $erreur ="OK"; } 
          }
         if ( $erreur =="OK")
         { echo '<h5 class=container style="color:limegreen;">La modification du l etudiant a été bien effectué</h5>';}
         else {
           echo '<h5 class=container style="color:red ;">etudiant non existant </h5>';
         }
         
          }  
 
 } ?>
 
</main>


<footer class="container">
    <p>&copy; ENICAR 2021-2022</p>
  </footer>


</body>
</html>
