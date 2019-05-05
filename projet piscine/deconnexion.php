<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div id="header">
			<a href="eceAmazon.html"><img src="img/logo.png"></a>
			 	 <span id="categorie"><a href="categorie.html"><img src="boutons/button_categorie.png"></a></span>
                 <span id="venteFlash"><a href="venteFlash.html"><img src="boutons/button_vente-flash.png"></a></span>
                 <span id="vendre"><a href="connexionvendeur.php"><img src="boutons/button_vendre.png"></a></span>
                 <span id="panier"><a href="panier.html"><img src="boutons/button_panier.png"></a></span>
                 <span id="compte"><a href="compte.html"><img src="boutons/button_mon-compte.png"></a></span>
                 <span id="admin"><a href="admin.html"><img src="boutons/button_admin.png"></a></span>
		</div>
</body>
</html>

<?php
//on ouvre la session
session_start();

$_SESSION = array();
// on la detruit et on retourne a la page d'accueil du site
session_destroy();

header("Location: eceAmazon.html");
?>