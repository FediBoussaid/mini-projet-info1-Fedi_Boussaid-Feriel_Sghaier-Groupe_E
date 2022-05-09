<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Groupe</title>
    <link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet"> 
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
</nav><br><br><br><br><br><br>
<h1 style="color:blue;" style="margin-left: 30px;">Ajouter un Nouveau Groupe</h1><br><br>
    <?php
    $conn=mysqli_connect("localhost","root",'','gestion_etudiant') or die("ERREUR");
    //mysql_select_db("groupe") or die("BD INTROUVABLE!");
    if($_POST){
        $nomGroupe = $_POST['nomGroupe'];
        if(!empty($nomGroupe)){
            mysqli_query($conn,'INSERT INTO groupe (nomGroupe) VALUES ("'.$nomGroupe.'")')or die('ERREUR: '.mysql_error());
            echo "SUCCES";
        }else echo "ERREUR";
    }
    ?>
<form method="post" action="">
     <label for="floatingTextarea"><h3>nomGroupe:</h3></label><br>
     <input type="text" id="nomGroupe" name="nomGroupe" class="form-control" required autofocus>
     <input type="submit" value="Envoyer"/>
</form>
    
</body>
</html>