<?php

//ouverture de la session
session_start();

//connexion a la bdd
$bdd = new PDO('mysql:host=127.0.0.1;dbname=veudeurs', 'root', '');

//si on clique sur le bouton
if(isset($_POST['buttoncc'])) 
{
  //recuperation donnees du formulaire
   $emailclient = ($_POST['emailclient']);
   $mdpclient = htmlspecialchars($_POST['mdpclient']);
echo "$emailclient";
echo "$mdpclient";
   //si champs bien rempli
   if(!empty($emailclient) AND !empty($mdpclient)) 
   {
      //on recupere les donnees correspondantes au client de la bdd
      $dataclientrecup = $bdd->prepare("SELECT * FROM administrateur WHERE email = ? AND motdepasse = ?");
      $dataclientrecup->execute(array($emailclient, $mdpclient));
      $clienttrouve = $dataclientrecup->rowCount();

      if($clienttrouve == 1) 
      {
         $dataclient = $dataclientrecup->fetch();
         $_SESSION['id'] = $dataclient['id'];
         $_SESSION['email'] = $dataclient['email'];
         header("Location: affichageadmin.php?id=".$_SESSION['id']);
      } 
      else {
         $erreur = "Vous n'avez pas acces a cette page vous n'etes pas un administrateur !";
            }
   } 
   else {
      $erreur = "Vous devez remplir tous les champs.";
        }
}
?>
  <html>
     <head>
        <title>Connexion a mon compte administrateur</title>
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
             <h2>Connexion a mon compte administrateur</h2>
             <br/>
             <form method="POST" action="">
                <input type="email" name="emailclient" placeholder="Email" />
                <input type="text" name="mdpclient" placeholder="Mot de passe" />
                <br/>
                <input type="submit" name="buttoncc" value="Se connecter" />
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