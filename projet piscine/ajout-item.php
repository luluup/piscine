<?php 

//Recuperation des champs de la page html
$iditem   = isset($_POST["iditem"])?$_POST["iditem"] : ""; 
$nom   = isset($_POST["nom"])?$_POST["nom"] : "";     
$photo1    = isset($_POST["photo1"])?$_POST["photo1"] : "";     
$photo2  = isset($_POST["photo2"])?$_POST["photo2"] : "";
$description   = isset($_POST["description"])?$_POST["description"] : "";   
$video   = isset($_POST["video"])?$_POST["video"] : "";     
$prix    = isset($_POST["prix"])?$_POST["prix"] : "";       
$categorie =  isset($_POST["categorie"])?$_POST["categorie"] : "";
$quantite =  isset($_POST["quantite"])?$_POST["quantite"] : "";

//Affichage des champs
echo "ID item : " . $_POST['iditem'] . "<br>";
echo "Nom : " . $_POST['nom'] . "<br>";
echo "Photo 1 : " . $_POST['photo1'] . "<br>";
echo "Photo 2 : " . $_POST['photo2'] . "<br>";
echo "Description : " . $_POST['description'] . "<br>";
echo "Video : " . $_POST['video'] . "<br>";
echo "Prix : " . $_POST['prix'] . "<br>";
echo "Categorie : " . $_POST['categorie'] . "<br>";
echo "Quantite : " . $_POST['quantite'] . "<br>";

//nom de la base de données  
$database = "veudeurs";

//Connexion avec la bdd
 $db_handle = mysqli_connect('localhost', 'root', '' );  
 $db_found = mysqli_select_db($db_handle, $database);

 $erreur = ""; 

//On teste si tous les champs du formulaire vendeur sont vide
if($iditem == "") 
      {$erreur .= "Le champ ID item est vide. <br>";}  
    
if($nom == "") 
      { $erreur .= "Le champ Nom est vide. <br>";}      

if($photo1 == "") 
      {$erreur .= "Le champ Photo1 est vide. <br>";} 

if($photo1 == "") 
      {$erreur .= "Le champ Photo1 est vide. <br>";}

if($description == "") 
      { $erreur .= "Le champ Description est vide. <br>";}  

if($video == "") {$erreur .= " Le champ Video est vide. <br>";}     

if($prix == "") 
      {$erreur .= "Le champ Prix est vide. <br>";} 

if($categorie == "") 
      {$erreur .= "Le champ Categorie est vide. <br>";}
  if($quantite == "") 
      {$erreur .= "Le champ Quantite est vide. <br>";}


 //Si tous les champs remplis ont ajoute a la bdd
if ($erreur == "") 
{         
   echo "Formulaire valide";        
 

		 if ($_POST["button2"]) 
		       {   
		            if ($db_found) 

		            {    
		            	$sql = "SELECT * FROM item";    
		               if ($iditem != "") 
		               {     
		               //on cherche le code vendeur et nom dans la bdd vendeur    
		                  $sql .= " WHERE Titre LIKE '%$iditem%'";     
		                  if ($nom != "") 
		                  {      
		                     $sql .= " AND Auteur LIKE '%$nom%'";     
		                  }    
		               }    

		               $result = mysqli_query($db_handle, $sql);    

		               //regarder s'il y a de résultat    
		               if (mysqli_num_rows($result) != 0) 
		               {     
		               //le vendeur est déjà dans la BDD     
		                  echo "Cet item a deja ete mis en vente.";  
		       
		               } 

		               else 
		               {    
		               // $sql = "INSERT INTO item(nom) VALUES('$nom')";   

		               $sql = "INSERT INTO item(iditem, nom, photo1, photo2, description, video, prix, categorie, quantite) VALUES('$iditem', '$nom', '$photo1', '$photo2', '$description', '$video', '$prix', '$categorie', '$quantite')";  

		                $result = mysqli_query($db_handle, $sql);     
		                echo "Add successful." . "<br>";                                  

		                 //on affiche l'item ajoute     
		                $sql = "SELECT * FROM item";     

		                if ($iditem != "") 
		                {     //on cherche le vendeur avec les paramètres code vendeur et nom     
		                  $sql .= " WHERE Titre LIKE '%$iditem%'";      
		                  if ($nom != "") 
		                  {       
		                     $sql .= " AND Auteur LIKE '%$nom%'";      
		                  }     
		               }     

		               $result = mysqli_query($db_handle, $sql); 
		       
		          while ($data = mysqli_fetch_assoc($result)) 
		            {      
							//Affichage des champs
							echo "ID item : " . $_POST['iditem'] . "<br>";
							echo "Nom : " . $_POST['nom'] . "<br>";
							echo '<img src="img/' . $data['photo1'] . '">';
							echo '<img src="img/' . $data['photo2'] . '">';;
							echo "Description : " . $_POST['description'] . "<br>";
							echo '<video controls src="vid/' . $data['video'] . '">';
							echo "Prix : " . $_POST['prix'] . "<br>";
							echo "Categorie : " . $_POST['categorie'] . "<br>";
							echo "Quantite : " . $_POST['quantite'] . "<br>";
		            }    
		         } 
		       
		        } 

		        else 
		         {    echo "Database not found";   }  

		      }

	}
	else 
	 {         
	      echo "Erreur, cet item ne peut pas etre ajoute : $erreur";     
	 }

    //fermer la connexion  
  mysqli_close($db_handle);

 ?>
