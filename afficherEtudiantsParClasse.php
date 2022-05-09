<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCO-ENICAR Etudiants Par Classe</title>
    <!-- Bootstrap core CSS -->
    <link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core JS-JQUERY -->
<script src="./assets/dist/js/jquery.min.js"></script>
<script src="./assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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
            <div class="container"><br><br><br>
              <h1 class="display-4">Afficher la liste d'étudiants par groupe</h1>
              <p>Cliquer sur la liste afin de choisir une Classe!</p>
            </div>
        </div>

    <div class="container">
        <form>
            <div class="form-group">
                <label for="Classe">Choisir une Classe:</label><br>
                    <!--
                    <input list="Classe">
                    <datalist id="Classe" name="Classe">
                        <option value="1-INFOA">1-INFOA</option>
                        <option value="1-INFOB">1-INFOB</option>
                        <option value="1-INFOC">1-INFOC</option>
                        <option value="1-INFOD">1-INFOD</option>
                        <option value="1-INFOE">1-INFOE</option>
                    </datalist>
                    -->
        
                <?php 
                    include "connexion.php";
                    $sql="SELECT distinct  Classe from etudiant";
                    $conn=mysqli_connect("localhost","root",'','gestion_etudiant');
                    $res=mysqli_query($conn,$sql);?>
                    <select id="Classe" name="Classe"  class="custom-select custom-select-sm custom-select-lg" onchange="selectelement()">
                        <?php 
                            while ($row=mysqli_fetch_array($res)){?>
                            <option value="<?php echo $row['Classe'] ?>"><?php echo $row['Classe'] ?></option>
                        <?php } ?>
                    </select>
                <script>
                    function selectelement(){
                        var x=document.getElementById("Classe").value;
                        $.ajax({
                            url:"afficherEtudiantParClasse1.php",
                            method:"POST",
                            data:{Classe: x},
                    success:function(data){$("#resultat").html(data);}
                    })
                    }
                </script>



                <div class="container">
                    <div class="row">
                        <div class="table-responsive"> 
                            <div id="resultat">
                                <table class="table table-striped table-hover">
                                        <thead>
                                            <th>cin</th>
                                            <th>email</th>
                                            <th>nom</th>
                                            <th> prenom</th>
                                            <th>adresse</th>
                                            <th> Classe</th>
                                        </thead><br><br><br><br>
                                        <tbody id="resultat">
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div> 
    
    
</main>
<footer class="container">
<p>&copy; ENICAR 2021-2022</p>
</footer>
</body>
</html>

