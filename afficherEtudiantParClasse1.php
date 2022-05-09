<?php 
include "connexion.php";
$Classe=$_POST['Classe'];
$Classe=trim($Classe);
$requete=" SELECT * from etudiant where Classe='{$Classe}'";
$conn=mysqli_connect("localhost","root",'','gestion_etudiant');
$res3=mysqli_query($conn,$requete);
while($row2=mysqli_fetch_array(($res3))){ 
?> 
    <tr>
        <td><?php echo $row2['cin'];?></td><pre>       </pre>
        <td><?php echo $row2['email'];?></td><pre>       </pre>
        <td><?php echo $row2['nom'];?></td><pre>       </pre>
        <td><?php echo $row2['prenom'];?></td><pre>       </pre>
        <td><?php echo $row2['adresse'];?></td><pre>       </pre>
        <td><?php echo $row2['Classe'];?></td><pre>       </pre>
    </tr>
<?php } 
echo $requete;
?>