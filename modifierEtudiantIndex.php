<?php
// Connexion à la base de données
try
{
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $conn=mysqli_connect("localhost","root",'','gestion_etudiant');
    //$conn = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
  
    /* On récupère les donnée de l'article séléctioné*/
    $reponse = $conn->prepare('SELECT prenom, nom, email, cin, Classe, adresse WHERE id = ?');
    $reponse->execute(array (number=> $_GET['number']));
    
  while ($donnees = $reponse->fetch())
    {
    ?>

<!--Formulaire avec les champs préremplis-->

<p>	
        <form action="modifier_post.php" method="post" id="modif_personnalite">


                    <label for="nom">nom</label><br/>
                    <input type="text" name="nom" value="<?php echo $donnees['nom'];?>" tabindex="20"/><br/>
                    <label for="prenom">prénom</label><br/>
                    <input type="text" name="prenom" title="<?php echo $donnees['prenom'];?>" tabindex="20"/><br/>
                    
                    <label for="email">E-mail</label><br/>
                    <input type="text" name="email" title="<?php echo $donnees['emai'];?>" tabindex="20"/><br/>

                    <label for="cin">CIN</label><br/>
                    <input type="text" name="cin" title="<?php echo $donnees['cin'];?>" tabindex="20"/><br/>

                    <label for="Classe">Classe</label><br/>
                    <input type="text" name="Classe" title="<?php echo $donnees['Classe'];?>" tabindex="20"/><br/>

                    <label for="adresse">adresse</label><br/>
                    <input type="text" name="adresse" title="<?php echo $donnees['adresse'];?>" tabindex="20"/><br/>
                        
                        <?php
                        } 

                    // Fin de la boucle pour l'affichage des donnée dans la base de donnée
                        $reponse->closeCursor();

                    }

                    catch(Exception $e)
                    {
                        die('Erreur : '.$e->getMessage());
                    }

                    ?>
         </form>
</p>