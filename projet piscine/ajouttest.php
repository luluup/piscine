<?php
$veudeurs->exec('INSERT INTO item(id-item, nom, photo1) VALUES(:id-item, :nom, :photo1)');

$req->execute(array(
	'nom' => $nom,
	'photo1' => $photo1,
	'id-item' => $id-item,
	));

echo 'Le jeu a bien été ajouté !';
?>