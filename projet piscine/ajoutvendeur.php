

<?php 

//Recuperation des donnees de la page HTML 
$Codevend = isset($_POST["codevendeur"])? $_POST["codevendeur"] : "";
$Nom = isset($_POST["nom"])? $_POST["nom"] : "";
$Email = isset($_POST["email"])? $_POST["email"] : "";
$Pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "";

//nom de la base de données  
$database = "veudeurs";


//Connexion avec la bdd
 $db_handle = mysqli_connect('localhost', 'root', '' );  
 $db_found = mysqli_select_db($db_handle, $database);

 if ($_POST["button3"]) 
 {   
 	if ($db_found) 
 	{    
 		$sql = "SELECT * FROM vendeur"; 
 		   

	        
	 		$sql = "INSERT INTO vendeur(codevendeur,nom, email)
	 		 VALUES('$Codevend', '$Nom', '$Email', '$Pseudo')";

	 		$result = mysqli_query($db_handle, $sql);
	 		echo "Add successful." . "<br>";                                   
	 		//on affiche l'item ajoute     
	 		$sql = "SELECT * FROM vendeur";     
	 		    

	 		$result = mysqli_query($db_handle, $sql); 
 
    	while ($data = mysqli_fetch_assoc($result)) 
    	{      
    		echo "Informations sur l'item ajoute a la vente:" . "<br>";      
    		echo "Code vendeur: " . $data['codevendeur'] . "<br>";      
    		echo "Nom: " . $data['nom'] . "<br>";      
    		echo "Pseudo: " . $data['pseudo'] . "<br>";      
    		echo "Email: " . $data['email'] . "<br>";      
    		echo "<br>";     
    	}    
    } 
   }
 
  
  else 
	  {    
	  echo "Database not found";   
	  }  
    //fermer la connexion  
  mysqli_close($db_handle);

 ?>