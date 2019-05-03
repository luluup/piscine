<?php 
 

$email = isset($_POST["email"])? $_POST["email"] : "";
$motdepasse = isset($_POST["motdepasse"])? $_POST["motdepasse"] : "";       

//nom de la base de données  
$database = "veudeurs";

//Connexion avec la bdd
 $db_handle = mysqli_connect('localhost', 'root', '' );  
 $db_found = mysqli_select_db($db_handle, $database);

 $erreur = ""; 

		//On teste si tous les champs du formulaire vendeur sont vide
if($email == "") 
	      {$erreur .= "Le champ Email est vide. <br>";}  
		    
if($motdepasse == "") 
      { $erreur .= "Le champ Mot de passe est vide. <br>";}  
		 

		 //Si tous les champs remplis ont ajoute a la bdd
if ($erreur == "") 
	{  

//Si on clique sur se connecter
if ($_POST["button7"])
{

	//si BDD existe 
	 if ($db_found) 
	 {      
		$sql = "SELECT * FROM client"; 

		if ($email != "") 
		{     //on cherche le client avec les paramètres email et mot de passe   
			$sql .= " WHERE email LIKE '%$email%'";     

			if ($email != "") 
			{      
				$sql .= " AND motdepasse LIKE '%$motdepasse%'";     

			}    
		$result = mysqli_query($db_handle, $sql);    //regarder s'il y a de résultat    

		if (mysqli_num_rows($result) == 0) 
		{     //le vendeur recherché n'existe pas     
			echo "Ce compte client n'existe pas";    
		} 

		else 
		{     //on trouve le vendeur recherché     
			while ($data = mysqli_fetch_assoc($result)) 
				{    
					echo "Connexion a mon compte client reussie <br>";            
		 			echo "email: " . $data['email'] . '<br>';
		 			echo "motdepasse: " . $data['motdepasse'] . '<br>'; 
		 			echo "Nom: " . $data['nom'] . '<br>';
		 			echo "Prenom: " . $data['prenom'] . '<br>'; 
		 			echo "email: " . $data['email'] . '<br>';
		 			echo"Informations bancaires : <br>";
		 			echo "Numero de carte: " . $data['numero'] . '<br>'; 
		 			echo "Nom du proprietaire de la CB: " . $data['nomcarte'] . '<br>';
		 			echo "Type CB: " . $data['type'] . '<br>'; 
		 			echo "Date d'expiration: " . $data['dateexpi'] . '<br>';
		 			echo "Cle de securite: " . $data['clesecu'] . '<br>'; 
		 			?>

<!DOCTYPE html>
<html>
<head>
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
</body>
</html>

<?php
				}    	
		}
	}

	 	     
	   }  

	     //Si bdd pas trouve ou existe pas
	  else {      
	    echo "Database not found";  }
}
}//fin erreur
	else
	{
		echo "Erreur, connexion impossible : $erreur"; 
	}

//ferme la connection 
mysqli_close($db_handle); 
 
?> 