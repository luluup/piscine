
<?php
	
	$email   = isset($_POST["email"])?$_POST["email"] : ""; 
	$mdp   = isset($_POST["mdp"])?$_POST["mdp"] : ""; 

		//nom de la base de données  
		$database = "veudeurs";

		//Connexion avec la bdd
		 $db_handle = mysqli_connect('localhost', 'root', '' );  
		 $db_found = mysqli_select_db($db_handle, $database);

		 $erreur = ""; 

		//On teste si tous les champs du formulaire vendeur sont vide
		if($email == "") 
		      {$erreur .= "Le champ Email est vide. <br>";}  
		    
		if($mdp == "") 
		      { $erreur .= "Le champ Mot de passe est vide. <br>";}  
		 

		 //Si tous les champs remplis ont ajoute a la bdd
	if ($erreur == "") 
	{                

		 if ($_POST["button5"]) 
		       {   
		            if ($db_found) 

		            {    

			            	$sql = "SELECT * FROM administrateur";    
			          if ($email != "") 
							{     //on cherche le vendeur avec les paramètres pseudo et email     
								$sql .= " WHERE email LIKE '%$email%'";     

								if ($mdp != "") 
								{      
									$sql .= " AND motdepasse LIKE '%$mdp%'";     

								}    
								$result = mysqli_query($db_handle, $sql);    //regarder s'il y a de résultat    

								if (mysqli_num_rows($result) == 0) 
								{     //l'admin recherché n'existe pas     
									echo "Vous n'etes pas un administrateur";    
								} 

								else 
								{     //on trouve l'admin' recherché     
									while ($data = mysqli_fetch_assoc($result)) 
										{    
											echo "Connexion administrateur reussie <br>";            
								 			echo "motdepasse: " . $data['motdepasse'] . '<br>'; 
								 			echo "email: " . $data['email'] . '<br>';
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
	        <span id="ajoutvendeur"><a href="ajoutvendeur.html"><img src="boutons/button_ajoutvendeur.png"></a></span>
	        <span id="supprimeritem"><a href="supprimer-item.html"><img src="boutons/button_ajoutvendeur.png"></a></span>
	        <span id="supprimervendeur"><a href="supprimer-vendeur.html"><img src="boutons/button_ajoutvendeur.png"></a></span>
		</div>
</body>
</html>

<?php				 			
								
								 		}//fin tant que on trouve le resultat
						 		}//fin else si resultat non vide
							}//fin champ email non vide
					}//fin bdd
				else 
		         {    echo "Database not found";   }  

		      }//fin button

	}//fin erreur
	else
	{
		echo "Erreur, connexion impossible : $erreur"; 
	}
?>