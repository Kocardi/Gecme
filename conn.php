<?php
// Connexion à la base de données
try
{
    $bdd = new PDO('mysql:host=kritsenmtn.free.fr;dbname=kritsenmtn;charset=utf8', 'kritsenmtn', 'Kritsenmtn',
	array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
?>
