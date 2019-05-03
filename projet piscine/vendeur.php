<?php 
 
$pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
$email = isset($_POST["email"])? $_POST["email"] : "";
       

//nom de la base de données  
$database = "veudeurs";

//Connexion avec la bdd
 $db_handle = mysqli_connect('localhost', 'root', '' );  
 $db_found = mysqli_select_db($db_handle, $database);

 $erreur = ""; 

		//On teste si tous les champs du formulaire vendeur sont vide
if($email == "") 
	      {$erreur .= "Le champ Email est vide. <br>";}  
		    
if($pseudo == "") 
      { $erreur .= "Le champ Pseudo est vide. <br>";}  
		 

		 //Si tous les champs remplis ont ajoute a la bdd
if ($erreur == "") 
	{  

//Si on clique sur se connecter
if ($_POST["button1"])
{

	//si BDD existe 
	 if ($db_found) 
	 {      
		$sql = "SELECT * FROM vendeur"; 
		//$avatar = "SELECT * FROM vendeur WHERE photo LIKE '%$photo%'";
		//echo $avatar;

		if ($pseudo != "") 
		{     //on cherche le vendeur avec les paramètres pseudo et email     
			$sql .= " WHERE pseudo LIKE '%$pseudo%'";     

			if ($email != "") 
			{      
				$sql .= " AND email LIKE '%$email%'";     

			}    
		$result = mysqli_query($db_handle, $sql);    //regarder s'il y a de résultat    

		if (mysqli_num_rows($result) == 0) 
		{     //le vendeur recherché n'existe pas     
			echo "Ce compte vendeur n'existe pas";    
		} 

		else 
		{     //on trouve le vendeur recherché     
			while ($data = mysqli_fetch_assoc($result)) 
				{    
					echo "Connexion reussie <br>";            
					echo "pseudo: " . $data['pseudo'] . '<br>'; 
		 			echo "email: " . $data['email'] . '<br>';
		 			echo '<img src="img/' . $data['photo'] . '">';
		 			echo '<img src="img/' . $data['image-fond'] . '">';
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
	        <span id="ajoutitem"><a href="ajout-item-v.html"><img src="boutons/button_ajoutitem.png"></a></span>
	        <span id="supprimeritem"><a href="supprimer-item.html"><img src="boutons/button_ajoutvendeur.png"></a></span>
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