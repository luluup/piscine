<?php 

//Recuperation des champs de la page html
$codevendeur   = isset($_POST["codevendeur"])?$_POST["codevendeur"] : "";

//Affichage des champs
echo "Code vendeur : " . $_POST['codevendeur'] . "<br>";

//nom de la base de données  
$database = "veudeurs";

//Connexion avec la bdd
 $db_handle = mysqli_connect('localhost', 'root', '' );  
 $db_found = mysqli_select_db($db_handle, $database);

 $erreur = ""; 

//On teste si le champ est vide
if($codevendeur == "") 
      {$erreur .= "Le champ code vendeur du vendeur a supprimer est vide. <br>";}  

if ($erreur == "") 
{
  	if ($_POST["button6"]) 
	 {  
	 	if ($db_found) 
	 	{    
	 		$sql = "SELECT * FROM vendeur";
	 	}

	 	if ($codevendeur != "") 
	 		{     //on cherche l'item dans la bdd'    
	 		$sql .= " WHERE codevendeur LIKE '%$codevendeur%'";        
		 	}    


		 	$result = mysqli_query($db_handle, $sql);    
		 	    

		 	if (mysqli_num_rows($result) == ($codevendeur)) 
		 	{     //le livre est déjà dans la BDD     
		 		echo "Ce vendeur n'existe pas.";
		 	}
		 	else 
		 	{     
		 		$sql = "DELETE FROM `vendeur`
				WHERE `codevendeur` = $codevendeur";

		 		$result = mysqli_query($db_handle, $sql);
		 		echo "Delete successful." . "<br>";
		 	}
	 }
}

	else 
	 {         
	      echo "Erreur, ce vendeur ne peut pas etre supprime : $erreur";     
	 }


    //fermer la connexion  
  mysqli_close($db_handle);

 ?>