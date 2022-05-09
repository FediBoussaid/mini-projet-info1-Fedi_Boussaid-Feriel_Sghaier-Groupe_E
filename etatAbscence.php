<?php
require('connexion.php');
$deb="";
$fin="";
$classe="";
if(isset($_POST['debut'])){
$deb=date('Y-m-d',strtotime($_POST['debut'])); }
if(isset($_POST['fin'])){
$fin=date('Y-m-d',strtotime($_POST['fin'])); }
if(isset($_POST['classe'])){
$classe = $_POST['classe'];}
$conn=mysqli_connect("localhost","root",'','gestion_etudiant');
$getAllabsences = $pdo->query('SELECT * FROM  `absence`  WHERE ( (`groupe`  LIKE "%'.$classe.'%") and (`date` between '.$deb.' and '.$fin.') )' );
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCO-ENICAR Etat Absence</title>
    <!-- Bootstrap core CSS -->
<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core JS-JQUERY -->
<script src="./assets/dist/js/jquery.min.js"></script>
<script src="./assets/dist/js/bootstrap.bundle.min.js"></script>

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
<?php //include('includes/navbar.php'); ?>   
<main role="main">
        <div class="jumbotron jumbotron-fluid">
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
              <h1 class="display-4">État des absences pour un groupe</h1>
              <p>Pour afficher l'état des absences, choisissez d'abord le groupe  et la periode concernée!</p>
            </div>
          </div>

<div class="container">
<form method="POST">
  <table><tr><td>Date de début (j/m/a) : </td><td>
    <input type="date" name="debut" size="10" value="<?= $_POST['debut']; ?>" onchange="submit();" class="datepicker"/>
    </td></tr><tr><td>Date de fin : </td><td>
    <input type="date" name="fin" size="10" value="<?= $_POST['fin']; ?>" onchange="submit();" class="datepicker"/>
    </td></tr></table>

<div class="form-group">
<label for="classe">Choisir une classe:</label><br>

<select id="classe" name="classe" onchange="submit();"  class="custom-select custom-select-sm custom-select-lg">
<?php if(isset($_POST['classe'])){ ?>
  <option value="<?= $_POST['classe']; ?>"><?= $_POST['classe']; ?></option> <?php }?>
  <option value="INFO-3A">3-INFOA</option>
  <option value="INFO-3B">3-INFOB</option>
  <option value="INFO-2A">2-INFOA</option>
  <option value="INFO-2B">2-INFOB</option>
  <option value="INFO-2C">2-INFOC</option>
  <option value="INFO-2D">2-INFOD</option>
  <option value="INFO-2E">2-INFOE</option>
  <option value="INFO-1A">1-INFOA</option>
  <option value="INFO-1B">1-INFOB</option>
  <option value="INFO-1C">1-INFOC</option>
  <option value="INFO-1D">1-INFOD</option>
</select>
</div>

<div class="table-responsive"> 
  <table class="table table-striped table-hover">
  <thead>
  <tr class="gt_firstrow " ><th >Nom</th><th>Justifiées</th><th >Non justifiées</th><th >Total</th></tr>
  </thead>
  <tbody>
  <?php 
            while($absence = $getAllabsences->fetch()){
                ?>
  <tr><td><b><?=$absence['nom']?></b></td><td >0</td><td >0</td><td >0</td></tr>
  <?php
            }
        ?>
  </tbody>
  <tfoot>
  </tfoot>
  </table>
  </div>
</form>

</div>  
</main>
<?php //include('includes/footer.php');?>
</body>
</html>