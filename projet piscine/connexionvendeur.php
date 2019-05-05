<?php

//ouverture de la session
session_start();

//connexion a la bdd
$bdd = new PDO('mysql:host=127.0.0.1;dbname=veudeurs', 'root', '');

//si on clique sur le bouton
if(isset($_POST['buttoncc'])) 
{
  //recuperation donnees du formulaire
   $pseudo = htmlspecialchars($_POST['pseudo']);
   $emailclient = htmlspecialchars($_POST['emailclient']);
   

   //si champs bien rempli
   if(!empty($pseudo) AND !empty($emailclient)) 
   {
      //on recupere les donnees correspondantes au client de la bdd
      $dataclientrecup = $bdd->prepare("SELECT * FROM vendeur WHERE pseudo = ? AND email = ?");

      $dataclientrecup->execute(array($pseudo, $emailclient));

      $clienttrouve = $dataclientrecup->rowCount();
      echo "pseudo : $pseudo";

      if($clienttrouve == 1) 
      {
         $dataclient = $dataclientrecup->fetch();
         $_SESSION['id'] = $dataclient['id'];
         $_SESSION['email'] = $dataclient['email'];
         header("Location: affichagevendeur.php?id=".$_SESSION['id']);
      } 
      else {
         $erreur = "Ce compte vendeur n'existe pas.";
            }
   } 
   else {
      $erreur = "Vous devez remplir tous les champs.";
        }
}
?>
  <html>
     <head>
        <title>Connexion a mon compte vendeur</title>
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
          </div>
          <div align="left">
             <h2>Connexion a mon compte vendeur</h2>
             <br/>
             <form method="POST" action="">
                <input type="text" name="pseudo" placeholder="Pseudo"/>
                <input type="email" name="emailclient" placeholder="Email"/>
                
                <br/>
                <input type="submit" name="buttoncc" value="Se connecter"/>
             </form>

         <?php
         
         if(isset($erreur)) 
         {
            echo '<font color="red">'.$erreur."</font>";
         }

         ?>



      </div>
   </body>
</html>