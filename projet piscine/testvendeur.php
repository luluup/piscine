<!DOCTYPE html>
<html>
<head>
  <title>Vendeur ajoute !</title>
</head>
<body>
  <div id="header">
               <a href="eceAmazon.html"><img src="img/logo.png"></a>
                <span id="categorie"><a href="categorie.html"><img src="boutons/button_categorie.png"></a></span>
                 <span id="venteFlash"><a href="venteFlash.html"><img src="boutons/button_vente-flash.png"></a></span>
                 <span id="vendre"><a href="connexionvendeur.php"><img src="boutons/button_vendre.png"></a></span>
                 <span id="panier"><a href="panier.html"><img src="boutons/button_panier.png"></a></span>
                 <span id="compte"><a href="connexionclient.php"><img src="boutons/button_mon-compte.png"></a></span>
                 <span id="admin"><a href="connexionadmin.php"><img src="boutons/button_admin.png"></a></span>
                 <span id="admindec"><a href="deconnexion.php"><img src="boutons/button_deconnexion.png"></a></span>
            </div>
            <div align="left">
</body>
</html>

<?php   
$nom   = isset($_POST["nom"])?$_POST["nom"] : "";     
$pseudo    = isset($_POST["pseudo"])?$_POST["pseudo"] : "";     
$email   = isset($_POST["email"])?$_POST["email"] : ""; 


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
               if ($nom != "") 
               {     
               //on cherche le code vendeur et nom dans la bdd vendeur    
                  $sql .= " WHERE Nom LIKE '%$nom%'";     
                  if ($nom != "") 
                  {      
                     $sql .= " AND Pseudo LIKE '%$pseudo%'";     
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
                $sql = "INSERT INTO vendeur(nom, pseudo, email) VALUES('$nom', '$pseudo', '$email')";     

                $result = mysqli_query($db_handle, $sql);     

                echo "Add successful." . "<br>";                                   

                //on affiche le vendeur ajouté     
                $sql = "SELECT * FROM vendeur";     

                if ($nom != "") 
                {     //on cherche le vendeur avec les paramètres code vendeur et nom     
                  $sql .= " WHERE Nom LIKE '%$nom%'";      
                  if ($nom != "") 
                  {       
                     $sql .= " AND Pseudo LIKE '%$pseudo%'";      
                  }     
               }     

               $result = mysqli_query($db_handle, $sql); 
       
          while ($data = mysqli_fetch_assoc($result)) 
            {      
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