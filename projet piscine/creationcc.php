<?php

//connexion a notre bdd
$bdd = new PDO('mysql:host=127.0.0.1;dbname=veudeurs', 'root', '');

//si on clique sur le bouton pour se connecter
if(isset($_POST['button'])) 
{
      $email = htmlspecialchars($_POST['email']); //evite les conflits avec les caracteres speciaux
      $mdp = htmlspecialchars($_POST['mdp']); //recuperation du mdp avec sha 1 special pour les mdp

      if( !empty($_POST['email']) AND !empty($_POST['mdp'])) 
      {
               if(filter_var($email, FILTER_VALIDATE_EMAIL)) 
               {
                  $emailclientrecup = $bdd->prepare("SELECT * FROM client WHERE email = ?");

                  $emailclientrecup->execute(array($email));

                  $emailclient = $emailclientrecup->rowCount();

                  if($emailclient == 0) 
                  {
                        $creationcompte = $bdd->prepare("INSERT INTO client(email, motdepasse) VALUES(?, ?)");

                        $creationcompte->execute(array($email, $mdp));

                        $erreur = "Compte cree <a href=\"connexionclient.php\">Me connecter</a>";
                  }

                  else 
                  {
                     $erreur = "Email deja utilise";
                  }

               }
               else 
               {
               $erreur = "Email non valide";
               } 
               

      } 
      else 
      {
         $erreur = "Veuillez remplir tous les champs.";
      }
}

?>

<html>
      <head>
         <title>Creation compte client</title>
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

         <h2>Creation de mon compte client</h2><br />

         <form method="POST" action="">
            <table>
            
                  <tr>
                     <td align="left">
                        <label for="email">Sasissez l'email de votre compte client:</label>
                     </td>
                     <td>
                        <input type="email" placeholder="Email" id="email" name="email" />
                     </td>
                  </tr>
          
                  <tr>
                     <td align="left">
                        <label for="mdp">Mot de passe :</label>
                     </td>
                     <td>
                        <input type="text" placeholder="Mot de passe" id="mdp" name="mdp" />
                     </td>
                  </tr>
                  <tr>
                     <td align="left"><br />
                        <input type="submit" name="button" value="Creation de mon compte client" />
                     </td>
                  </tr>

            </table>
         </form>

         <?php

         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>"; //erreur mise en rouge
         }
?>


            </div>
         </body>
      </html>