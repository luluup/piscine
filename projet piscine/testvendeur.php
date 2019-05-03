<?php
$codevendeur   = isset($_POST["codevendeur"])?$_POST["codevendeur"] : "";   
$nom   = isset($_POST["nom"])?$_POST["nom"] : "";     
$pseudo    = isset($_POST["pseudo"])?$_POST["pseudo"] : "";     
$email   = isset($_POST["email"])?$_POST["email"] : ""; 

echo "Code vendeur : " . $_POST['codevendeur'] . "<br>";
echo "Nom : " . $_POST['nom'] . "<br>";
echo "Pseudo : " . $_POST['pseudo'] . "<br>";
echo "Email : " . $_POST['email'] . "<br>";

//nom de la base de données  
$database = "veudeurs";

//Connexion avec la bdd
 $db_handle = mysqli_connect('localhost', 'root', '' );  
 $db_found = mysqli_select_db($db_handle, $database);

 $erreur = ""; 


//On teste si tous les champs du formulaire vendeur sont vide
if($codevendeur == "") 
      {$erreur .= "Le champ Code vendeur est vide. <br>";}  
    
if($nom == "") 
      { $erreur .= "Le champ Nom est vide. <br>";}  

if($pseudo == "") {$erreur .= " Le champ Pseudo est vide. <br>";}     

if($email == "") 
      {$erreur .= "Le champ Email est vide. <br>";}  
 

 //Si tous les champs remplis ont ajoute a la bdd
if ($erreur == "") 
{         
   echo "Formulaire valide";        
 

       if ($_POST["button3"]) 
       {   
            if ($db_found) 

            {    $sql = "SELECT * FROM vendeur";    
               if ($codevendeur != "") 
               {     
               //on cherche le code vendeur et nom dans la bdd vendeur    
                  $sql .= " WHERE Titre LIKE '%$codevendeur%'";     
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
                  echo "Ce compte vendeur existe deja";  
       
               } 

               else 
               {    
                $sql = "INSERT INTO vendeur(codevendeur, nom, pseudo, email) VALUES('$codevendeur', '$nom', '$pseudo', '$email')";     

                $result = mysqli_query($db_handle, $sql);     

                echo "Add successful." . "<br>";                                   

                //on affiche le vendeur ajouté     
                $sql = "SELECT * FROM vendeur";     

                if ($codevendeur != "") 
                {     //on cherche le vendeur avec les paramètres code vendeur et nom     
                  $sql .= " WHERE Titre LIKE '%$codevendeur%'";      
                  if ($nom != "") 
                  {       
                     $sql .= " AND Auteur LIKE '%$nom%'";      
                  }     
               }     

               $result = mysqli_query($db_handle, $sql); 
       
          while ($data = mysqli_fetch_assoc($result)) 
            {      
                     echo "Code vendeur : " . $_POST['codevendeur'] . "<br>";
                     echo "Nom : " . $_POST['nom'] . "<br>";
                     echo "Pseudo : " . $_POST['pseudo'] . "<br>";
                     echo "Email : " . $_POST['email'] . "<br>";
            }    
         } 
       
        } 

        else 
         {    echo "Database not found";   }  
      }

}

else {         
      echo "Erreur, ce vendeur ne peut pas etre inscrit : $erreur";     }

?>