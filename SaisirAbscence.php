<?php
include("SaisirAbscenceAction.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCO-ENICAR Saisir Absence</title>
    <!-- Bootstrap core CSS -->
<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core JS-JQUERY -->
<script src="./assets/dist/js/jquery.min.js"></script>
<script src="./assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Custom styles for this template -->
<link href="./assets/jumbotron.css" rel="stylesheet">
<style>
        .jumbotron {
  position: relative;
  overflow: hidden;
  background-color:black;
  background-image:url('Violet et Vert Typographie Citation Couverture Facebook (2).png');
  background-size:cover;
}
.jumbotron .container {
  z-index: 2;
  position: relative;
}

    </style>
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
<?php //include('includes/navbar.php'); ?>
<main role="main">
        <div  class="jumbotron jumbotron-fluid">
        <div class="container text-white">
      <br>
      <br><br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
              <h1 class="display-4">Saisir les Abscences pour un groupe</h1>
              <p>Pour signaler, annuler ou justifier une absence, choisissez d'abord le groupe, le module puis l'étudiant concerné!</p>
            </div>
        </div>
        <div><h6 id="demo"></h6></div> 
<div class="container">
<form id="myForm" method="POST">
<div class="form-group">
  <label for="semaine">Choisir une semaine:</label><br>
  <input id="semaine" type="week" name="semaine" onchange="submit();"  value="<?= $_POST['semaine']; ?>" size="20" class="datepicker" />
</div>
<div class="form-group">
<label for="classe">Choisir un groupe:</label><br>
<select id="groupe" name="groupe" value="nomGroupe"  onchange="submit();" class="custom-select custom-select-sm custom-select-lg">
<?php if(isset($_POST['nomGroupe'])){ ?>
  <option value="<?= $_POST['nomGroupe']; ?>"><?= $_POST['nomGroupe']; ?></option> <?php }?>
  <option value="INFO3-A">3-INFOA</option>
  <option value="INFO3-B">3-INFOB</option>
  <option value="INFO2-A">2-INFOA</option>
  <option value="INFO2-B">2-INFOB</option>
  <option value="INFO2-C">2-INFOC</option>
  <option value="INFO2-D">2-INFOD</option>
  <option value="INFO2-E">2-INFOE</option>
  <option value="INFO1-A">1-INFOA</option>
  <option value="INFO1-B">1-INFOB</option>
  <option value="INFO1-C">1-INFOC</option>
  <option value="INFO1-D">1-INFOD</option> 
</select>
</div>
<div class="form-group">
  <label for="module">Choisir un module:</label><br>
  <select id="module" name="module" value="module" class="custom-select custom-select-sm custom-select-lg">  
  <option value="selected">Choisir un module</option>
    <?php if(in_array($eetudiant,$tab)){
      if($eetudiant==$tab[0] OR $eetudiant==$tab[1] ){
                          ?>
        <option value="Web Developpment">Web Developpment</option>  
        <option value="Machine learning">Machine learning</option> 
        <option value="Sécurité des Systèmes d’Information">Sécurité des Systèmes d’Information</option> 
        <option value="Spécification Formelle">Spécification Formelle</option> 
        <option value="Génie Logiciel Avancé">Génie Logiciel Avancé</option> 
        <option value="Techniques Avancées de Multimédia ">Techniques Avancées de Multimédia </option> 
        <option value="Architecture et Programmation Parallèle">Architecture et Programmation Parallèle</option> 
        <option value="1 Business Intelligence">1 Business Intelligence</option> 
     <?php }if($eetudiant==$tab[2] OR $eetudiant==$tab[3] OR $eetudiant==$tab[4] OR $eetudiant==$tab[5] OR $eetudiant==$tab[6]){ ?>
              <option value="Génie Logiciel">Génie Logiciel</option>  
              <option value="Programmation Java">Programmation Java</option> 
              <option value="Comptabilité d’Entreprise">Comptabilité d’Entreprise</option> 
              <option value="Techniques de Recherche d’Emploi">Techniques de Recherche d’Emploi</option> 
              <option value="Génie Logiciel Avancé">Génie Logiciel Avancé</option> 
              <option value="Algorithmique Avancée ">Algorithmique Avancée </option> 
              <option value="Routage des Réseaux">Routage des Réseaux</option> 
              <option value="Systèmes Embarqués" >Systèmes Embarqués </option> 
 <?php    }else{ ?>

           <option value="Tech. Web">Tech. Web</option>  
              <option value="Programmation C++">Programmation C++</option> 
              <option value="Comptabilité d’Entreprise">Comptabilité d’Entreprise</option> 
              <option value="Architecture et circuit numérique">Architecture et circuit numérique</option> 
              <option value="Analyse Numérique Non Linéaire">Analyse Numérique Non Linéaire</option> 
              <option value="Culture et Communication 2 ">Culture et Communication 2</option> 
              <option value="Structures de Données">Structures de Données</option> 
              <option value="Fondements des Réseaux Informatiques" >Fondements des Réseaux Informatiques </option>
<?php
      
    } }
 ?>
  </select>
  </div>
<table rules="cols" frame="box" name="date" value="date">
<tr><th> <?php echo $numberOfEtud ?> étudiant(s) Dans ce Groupe </th>
<th colspan="3" width="100px" style="padding-left: 5px; padding-right: 5px;">Lundi</th>
<th colspan="3" width="100px" style="padding-left: 5px; padding-right: 5px;">Mardi</th>
<th colspan="3" width="100px" style="padding-left: 5px; padding-right: 5px;">Mercredi</th>
<th colspan="3" width="100px" style="padding-left: 5px; padding-right: 5px;">Jeudi</th>
<th colspan="3" width="100px" style="padding-left: 5px; padding-right: 5px;">Vendredi</th>
<th colspan="3" width="100px" style="padding-left: 5px; padding-right: 5px;">Samedi</th>
</tr><tr><td>&nbsp;</td>
<th colspan="3" width="100px" style="padding-left: 5px; padding-right: 5px;"><?php  echo get_lundi_vendredi_from_week($d,$y,$format="d/m/Y")[0]?> </th>
<th colspan="3" width="100px" style="padding-left: 5px; padding-right: 5px;"><?php  echo get_lundi_vendredi_from_week($d,$y,$format="d/m/Y")[1] ?> </th>
<th colspan="3" width="100px" style="padding-left: 5px; padding-right: 5px;"><?php  echo get_lundi_vendredi_from_week($d,$y,$format="d/m/Y")[2]?> </th>
<th colspan="3" width="100px" style="padding-left: 5px; padding-right: 5px;"><?php  echo get_lundi_vendredi_from_week($d,$y,$format="d/m/Y")[3]?> </th>
<th colspan="3" width="100px" style="padding-left: 5px; padding-right: 5px;"><?php  echo get_lundi_vendredi_from_week($d,$y,$format="d/m/Y")[4]?> </th>
<th colspan="3" width="100px" style="padding-left: 5px; padding-right: 5px;"><?php  echo get_lundi_vendredi_from_week($d,$y,$format="d/m/Y")[5]?> </th>
</tr><tr><td>&nbsp;</td>
<th>AM</th><th>PM</th><th>Justification</th><th>AM</th><th>PM</th><th>Justification</th><th>AM</th><th>PM</th><th>Justification</th><th>AM</th><th>PM</th><th>Justification</th><th>AM</th><th>PM</th><th>Justification</th><th>AM</th><th>PM</th><th>Justification</th>
</tr>
<?php 
            while($etudiant = $getAlletudiants->fetch()){
                ?>
<tr class="row_3"><td ><b><input style="border:none;" name="IDE" value="<?=$etudiant['nom']?> <?=$etudiant['prenom']?>"></b></td>
<td><input type="checkbox" name="date" value=" <?php  echo get_lundi_vendredi_from_week($d,$y,$format="d/m/Y")[0]?> "></td>
<td><input type="checkbox"name="date" value="<?php  echo get_lundi_vendredi_from_week($d,$y,$format="d/m/Y")[0]?> "></td>
<td><input type="checkbox"name="justification" value="1"></td>
<td><input type="checkbox"name="date" value=" <?php  echo get_lundi_vendredi_from_week($d,$y,$format="d/m/Y")[1] ?>"></td>
<td><input type="checkbox"name="date" value=" <?php  echo get_lundi_vendredi_from_week($d,$y,$format="d/m/Y")[1] ?>"></td>
<td><input type="checkbox"name="justification" value="1"></td>
<td><input type="checkbox"name="date" value=" <?php  echo get_lundi_vendredi_from_week($d,$y,$format="d/m/Y")[2] ?>"></td>
<td><input type="checkbox"name="date" value=" <?php  echo get_lundi_vendredi_from_week($d,$y,$format="d/m/Y")[2] ?>"></td>
<td><input type="checkbox"name="justification" value="1"></td>
<td><input type="checkbox"name="date" value="<?php  echo get_lundi_vendredi_from_week($d,$y,$format="d/m/Y")[3] ?>"></td>
<td><input type="checkbox"name="date" value=" <?php  echo get_lundi_vendredi_from_week($d,$y,$format="d/m/Y")[3] ?>"></td>
<td><input type="checkbox"name="justification" value="1"></td>
<td><input type="checkbox"name="date" value=" <?php  echo get_lundi_vendredi_from_week($d,$y,$format="d/m/Y")[4] ?>"></td>
<td><input type="checkbox"name="date" value=" <?php  echo get_lundi_vendredi_from_week($d,$y,$format="d/m/Y")[4] ?>"></td>
<td><input type="checkbox"name="justification" value="1"></td>
<td><input type="checkbox"name="date" value=" <?php  echo get_lundi_vendredi_from_week($d,$y,$format="d/m/Y")[5] ?>"></td>
<td><input type="checkbox"name="date" value="<?php  echo get_lundi_vendredi_from_week($d,$y,$format="d/m/Y")[5] ?>"></td>
<td><input type="checkbox"name="justification" value="1"></td>
</tr>

<?php
            }
        ?>
</table>
<br>
 <!--Bouton Valider-->
 <button  type="submit" onclick="ajouterAbsence()" class="btn btn-primary btn-block">Valider</button>
</form>
</div>  
</main>
<?php //include('includes/footer.php');?>

<script>
    function ajouterAbsence()
    {
        var xmlhttp = new XMLHttpRequest();
        var url="http://localhost/sco/auth-php-mysql/saisirAbsence.php";
        //Envoie Req
        xmlhttp.open("POST",url,true);
        form=document.getElementById("myForm");
        formdata=new FormData(form);
        xmlhttp.send(formdata);

        //Traiter Res

        xmlhttp.onreadystatechange=function()
            {   
                if(this.readyState==4 && this.status==200){
                // alert(this.responseText);
                    if(this.responseText=="OK")
                    {
                        document.getElementById("demo").innerHTML="L'ajout de l'absence a été bien effectué";
                        document.getElementById("demo").style.backgroundColor="green";
                    }
                    else
                    {
                        document.getElementById("demo").innerHTML="L'absence existe déja, merci de vérifier la date";
                        document.getElementById("demo").style.backgroundColor="#fba";
                    }
                }
            } 
    }
    </script>
</body>
</html>