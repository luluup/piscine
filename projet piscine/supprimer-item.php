 <?php 

//Recuperation des champs de la page html
$iditems   = isset($_POST["iditems"])?$_POST["iditems"] : "";

//Affichage des champs
echo "ID item : " . $_POST['iditems'] . "<br>";

//nom de la base de données  
$database = "veudeurs";

//Connexion avec la bdd
 $db_handle = mysqli_connect('localhost', 'root', '' );  
 $db_found = mysqli_select_db($db_handle, $database);

 $erreur = ""; 

//On teste si le champ est vide
if($iditems == "") 
      {$erreur .= "Le champ ID item a supprimer est vide. <br>";}  

if ($erreur == "") 
{
  	if ($_POST["button4"]) 
	 {   
	 	if ($db_found) 
	 	{    
	 		$sql = "SELECT * FROM item";
	 	}

	 	if ($iditems != "") 
	 		{     //on cherche l'item dans la bdd'    
	 		$sql .= " WHERE iditem LIKE '%$iditems%'";        
		 	}    


		 	$result = mysqli_query($db_handle, $sql);    
		 	    

		 	if (mysqli_num_rows($result) == ($iditems)) 
		 	{     //le livre est déjà dans la BDD     
		 		echo "Cet item n'existe pas.";
		 	}
		 	else 
		 	{     
		 		$sql = "DELETE FROM `item`
				WHERE `iditem` = $iditems";

		 		$result = mysqli_query($db_handle, $sql);
		 		echo "Delete successful." . "<br>";
		 	}
	 }
}

	else 
	 {         
	      echo "Erreur, cet item ne peut pas etre supprime : $erreur";     
	 }


    //fermer la connexion  
  mysqli_close($db_handle);

 ?>