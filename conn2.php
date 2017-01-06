<?php
// Connexion à la base de données
try
{
    $bdd = new PDO('mysql:host=kritsen.free.fr;dbname=kritsenmtn', 'kritsenmtn', 'Kritsenmtn',
	array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
?>
