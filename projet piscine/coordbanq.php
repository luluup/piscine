<html>
   <head>
      <title>Coordonnes livraison</title>
      <meta charset="utf-8">
   </head>
   <body>
      <div align="left">
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
         <h2>Veuillez saisir vos coordonnees bancaires pour le paiement de vos achats</h2>
         <div align="left">
            <form method="POST" action="" enctype="multipart/form-data">
               <label>VOS INFORMATIONS BAINCAIRES :</label>
               <label>Type de carte :</label>
               <input type="text" name="type" placeholder="Type"/><br/>
               <label>Numero de carte :</label>
               <input type="number" name="numcarte" placeholder="Numero carte"/><br/>
               <label>Nom du proprietaire de la carte :</label>
               <input type="text" name="nomcarte" placeholder="Nom"/><br/>
               <label>Date d'expiration :</label>
               <input type="date" name="dateexpi" placeholder="Date expiration"/><br/>
               <label>Cle de securite :</label>
               <input type="number" name="clesecu" placeholder="Cle de securite"/><br/>
               <label>Email pour la validation du paiement :</label>
               <input type="email" name="emailclient" placeholder="Email validation paiement"/><br/>
               <input type="submit" value="Validez mes coordonnees bancaires" />
            </form>


         </div>
      </div>
   </body>
</html>

<?php

session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=veudeurs', 'root', '');

if(isset($_SESSION['id'])) 
{
   $dataclientrecup = $bdd->prepare("SELECT * FROM client WHERE id = ?");
   $dataclientrecup->execute(array($_SESSION['id']));
   $client = $dataclientrecup->fetch();

   //recuperation des donnees html
	$type   = isset($_POST["type"])?$_POST["type"] : "";     
	$numcarte    = isset($_POST["numcarte"])?$_POST["numcarte"] : "";  
	$nomcarte  = isset($_POST["nomcarte"])?$_POST["nomcarte"] : "";    
	$dateexpi   = isset($_POST["dateexpi"])?$_POST["dateexpi"] : "";     
	$clesecu    = isset($_POST["clesecu"])?$_POST["clesecu"] : "";  
  $emailclient    = isset($_POST["emailclient"])?$_POST["emailclient"] : "";      


$ajoutbanq = $bdd->prepare("UPDATE client SET type =?, numcarte =?, nomcarte=? WHERE id = ?"); 
    $ajoutbanq->execute(array($type, $numcarte, $nomcarte, $_SESSION['id']));

	$erreur = ""; 

	//On teste si tous les champs du formulaire item sont vide
	    
	if($type == "") 
	      { $erreur .= "Le champ Type de carte est vide. <br>";}      

	if($numcarte == "") 
	      {$erreur .= "Le champ Numero de carte est vide. <br>";} 

	if($nomcarte == "") 
	      {$erreur .= "Le champ Nom du proprietaire de la carte est vide. <br>";}

	//if($dateexpi == "") 
	      //{ $erreur .= "Le champ Date d'expiration est vide. <br>";}  

	//if($clesecu == "") {$erreur .= " Le champ Cle de securite est vide. <br>";}
 // if($emailclient == "") {$erreur .= " Le champ Email de securite est vide. <br>";}      


	  //Si tous les champs remplis ont ajoute a la bdd
	if ($erreur == "") 
	{
		//on ajoute les coordonnees de livraison du client
    $ajoutbanq = $bdd->prepare("UPDATE client SET type =?, numcarte =?, nomcarte=? WHERE id = ?"); 
    $ajoutbanq->execute(array($type, $numcarte, $nomcarte, $_SESSION['id']));
		//$ajoutbanq = $bdd->prepare("UPDATE client SET type =?, numcarte = ?,  nomcarte =?, dateexpi = ?,  clesecu =? WHERE id = ?"); 
		//$ajoutbanq->execute(array($type, $numcarte, $nomcarte, $dateexpi, $clesecu, $_SESSION['id']));
		echo "Coordonnees bancaires ajoutees";


    //envoie du mail de confirmation de paiement
        $sujet = "Confirmation de votre achat sur le site ECE Amazon" ;
        $entete = "From: ECE Amazon" ;

        $message = '
          
        Vous allez bientot etre debite pour votre achat !
        Merci et on espere vous revoir vite sur ece Amazon ! :)
          
          
        ---------------
        Ceci est un mail automatique, Merci de ne pas y répondre.';

        mail($emailclient, $sujet, $message, $entete);
	}
	else 
	 {     
	      echo "Erreur, ces coordonnees bancaires ne peuvent pas etre ajoutees : $erreur"; 
  
	 }
   
?>

<?php   
}
else {
   header("Location: connexionclient.php");
}
?>
