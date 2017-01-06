<?php
// fichier de connection a la base 
//  require_once('connection.php');
// avant les requetes mysql


$host = "kritsenmtn.free.fr"; 
$user = "kritsenmtn"; 
$passwd = "Kritsenmtn"; 
$database = "kritsenmtn"; 
$link = @mysql_connect($host, $user,$passwd);

if(!$link){
	die('Erreur de connexion au serveur');
}
$select_db = @mysql_select_db($database);
if(!$select_db){
	die('Erreur de connexion à la base');
}
?>
