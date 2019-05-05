<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8"/>
		<title>ECE Amazon : categorie musique</title>
		<link href="style.css" rel="stylesheet" type="text/css"/>
	</head>

	<body>
		<div id="header">
			<a href="eceAmazon.html"><img src="img/logo.png"></a>
			<span id="categorie"><a href="categorie.html"><img src="boutons/button_categorie.png"></a></span>
	        < <span id="venteFlash"><a href="venteFlash.html"><img src="boutons/button_vente-flash.png"></a></span>
                 <span id="vendre"><a href="connexionvendeur.php"><img src="boutons/button_vendre.png"></a></span>
                 <span id="panier"><a href="panier.html"><img src="boutons/button_panier.png"></a></span>
                 <span id="compte"><a href="connexionclient.php"><img src="boutons/button_mon-compte.png"></a></span>
                 <span id="admin"><a href="connexionadmin.php"><img src="boutons/button_admin.png"></a></span>
		</div>
	</body>
</html>


<?php 
//nom de la base de données  
$database = "veudeurs";

//Connexion avec la bdd
$db_handle = mysqli_connect('localhost', 'root', '' );  
$db_found = mysqli_select_db($db_handle, $database);

if ($db_found) {
	$sql = "SELECT * FROM item WHERE categorie='Musique'";
	$result = mysqli_query($db_handle, $sql);
	while ($data = mysqli_fetch_assoc($result)) {
		echo "<div id='item'>ID item : " . $data['iditem'] . "<br>";
		echo "Nom : " . $data['nom'] . "<br>";
		echo '<img src="img/' . $data['photo1'] . '" width="100px">';
		echo '<img src="img/' . $data['photo2'] . '">';
		echo "<br>Description : " . $data['description'] . "<br>";
		//echo '<video controls src="vid/' . $data['video'] . '">';
		echo "Prix : " . $data['prix'] . "<br>";
		echo "<a href='ajout-panier.php'><img src='boutons/button_ajoutitem.png'></a></div>";
	}
}  

else {
	echo "Database not found";
}
mysqli_close($db_handle);
?>

