<?php

/*//ouverture de la session
session_start();

//connexion a la bdd
$bdd = new PDO('mysql:host=127.0.0.1;dbname=veudeurs', 'root', '');

//on recupere l'id ajoute par index avec incrementation auto a la bdd du client qui s'est connecte
if(isset($_GET['id'])) 
{

   $idrecup = intval($_GET['id']);
   $dataclientrecup = $bdd->prepare('SELECT * FROM vendeur WHERE id = ?');

   $dataclientrecup->execute(array($idrecup));

   $dataclient = $dataclientrecup->fetch();

?>
   <html>
         <head>
            <title>Mon profil</title>
            <meta charset="utf-8">
         </head>

         <body>
            <div id="header">
               <a href="eceAmazon.html"><img src="img/logo.png"></a>
               <span id="categorie"><a href="categorie.html"><img src="boutons/button_categorie.png"></a></span>
                 <span id="venteFlash"><a href="venteFlash.html"><img src="boutons/button_vente-flash.png"></a></span>
                 <span id="vendre"><a href="vendre.html"><img src="boutons/button_vendre.png"></a></span>
                 <span id="panier"><a href="panier.html"><img src="boutons/button_panier.png"></a></span>
                 <span id="compte"><a href="compte.html"><img src="boutons/button_mon-compte.png"></a></span>
                 <span id="admin"><a href="admin.html"><img src="boutons/button_admin.png"></a></span>
            </div>
            <div align="center">

               <h2>Bienvenue sur votre profil </h2>

      <?php
             echo "string";  
             echo "Connexion reussie <br>";            
          echo "pseudo: " . $dataclient['pseudo'] . '<br>'; 
          echo "email: " . $data['email'] . '<br>';
          echo '<img src="img/' . $data['photo'] . '">';
          echo '<img src="img/' . $data['image-fond'] . '">';

      ?>
               <a href="livraison.php">Saisir mes coordonnees de livraison</a>

               <a href="deconnexion.php">Deconnexion</a>
               

      <?php
      
      ?>


            </div>
         </body>
   </html>


         <?php   
         }*/


//ouverture de la session
session_start();

//connexion a la bdd
$bdd = new PDO('mysql:host=127.0.0.1;dbname=veudeurs', 'root', '');

//on recupere l'id ajoute par index avec incrementation auto a la bdd du client qui s'est connecte
if(isset($_GET['id'])) 
{
   $idrecup = intval($_GET['id']);
   $dataclientrecup = $bdd->prepare('SELECT * FROM vendeur WHERE id = ?');

   $dataclientrecup->execute(array($idrecup));

   $dataclient = $dataclientrecup->fetch();

?>
   <html>
         <head>
            <title>Mon profil</title>
            <meta charset="utf-8">
         </head>

         <body>
            <div id="header">
               <a href="eceAmazon.html"><img src="img/logo.png"></a>
                <span id="categorie"><a href="categorie.html"><img src="boutons/button_categorie.png"></a></span>
                 <span id="venteFlash"><a href="venteFlash.html"><img src="boutons/button_vente-flash.png"></a></span>
                 <span id="vendre"><a href="connexionvendeur.php"><img src="boutons/button_vendre.png"></a></span>
                 <span id="panier"><a href="panier.html"><img src="boutons/button_panier.png"></a></span>
                 <span id="compte"><a href="connexionclient.php"><img src="boutons/button_mon-compte.png"></a></span>
                 <span id="admin"><a href="connexionadmin.php"><img src="boutons/button_admin.png"></a></span>
                 <span id="admindec"><a href="deconnexion.php"><img src="boutons/button_deconnexion.png"></a></span>

            </div>
            <div align="center">

               <h2>Bienvenue sur votre profil </h2>

      <?php
              echo "Connexion reussie <br>";            
          echo "pseudo: " . $dataclient['pseudo'] . '<br>'; 
          echo "email: " . $dataclient['email'] . '<br>';
          echo '<img src="img/' . $dataclient['photo'] . '">';
          echo '<img src="img/' . $dataclient['image-fond'] . '">';
    //           echo $dataclient['email'];
               if(isset($_SESSION['id']) AND $dataclient['id'] == $_SESSION['id']) {
      ?>
              
              <span id="ajoutitem"><a href="ajout-item-v.html"><img src="boutons/ajout-item.png"></a></span>
               <span id="supprimeritem"><a href="supprimer-item.html"><img src="boutons/sup-item.png"></a></span>  

      <?php
      }
      ?>


            </div>
         </body>
   </html>


         <?php   
         }
         ?>