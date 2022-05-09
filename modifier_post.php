<?php

/*Si le champ "Prénom" est rempli*/
  
if (isset($_POST['nom']) AND $_POST['nom'] !== "")
    {  
  
/*Ensuite si le champ "Nom" est rempli*/

  if (isset($_POST['prenom']) AND $_POST['prenom'] !== "")
  if (isset($_POST['email']) AND $_POST['email'] !== "")
  if (isset($_POST['cin']) AND $_POST['cin'] !== "")
  if (isset($_POST['Classe']) AND $_POST['Classe'] !== "")
  if (isset($_POST['adresse']) AND $_POST['adresse'] !== "")

       {
/*Puis si le champ "Naissance" est rempli*/

       //  if (isset($_POST['naissance']) AND $_POST['naissance'] !== "")
            {    
           
/* Enfin si le champ "Photo" est rempli*/

            // if (isset($_POST['photo']) AND $_POST['photo'] !== "")
                {
           			   
/*Au final on a comme ordre de modifier l'article seulement si les champs numero_article, date_article, text_article et auteur article ne sont pas vide*/

  
  try
    {
      //$conn = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
      $conn=mysqli_connect("localhost","root",'','gestion_etudiant');
    
    
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/*cette requètte préparée sert à modifier les données j'ai rajouté "nouveau" et "nouvelle" au nom des variables mais vous n'êtes pas obligé des faire pareil, c'est juste pour mieux me repérer et comprendre ce que je fais.*/
  
  $reponse = $conn->prepare('UPDATE etudiant SET prenom = :nouveau_prenom, nom = :nouveau_nom, cin = :nouveau_cin, email = :nouveau_email, Classe = :nouveau_Classe, adresse = :nouveau_adresse WHERE id = :id ');
    
  $reponse->execute(array( 
      'nouveau_prenom' => $_POST['prenom'],
      'nouveau_nom' => $_POST['nom'],
      'nouveau_email' => $_POST['email'],
      'nouveau_cin' => $_POST['cin'],
      'nouveau_Classe' => $_POST['Classe'],
      'nouveau_adresse' => $_POST['adresse'],
      
      ));			
      }
  catch(Exception $e)
    {
      die('Erreur:'.$e->getMessage());
    }
  $reponse->closeCursor();
          
          }
            }
          
      }  
  
  echo'<p> votre présentation a bien été modifiée</p>';
    }
 
 else
    {  	
  echo '<p>Vous n\'avez pas remplis touts les champs demandés</p>';
  }
?>