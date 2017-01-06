<?php
//ouverture de la connexion
function connect_bd()
{
    $nomserveur='mysql.hostinger.fr'; //nom du seveur
    $nombd='ecme'; //nom de la base de données
    $login='root'; //login de l'utilisateur
    $pass='KNEuc29'; // mot de pass
    $bd=mysql_connect($nomserveur, $login, $pass)or die("Connexion échouée");
    mysql_select_db($nombd,$bd)or die("La base ne peut pas être selectionnée");
    return $bd;
}

//fermeture de la connexion
function deconnect_bd($bd)
{
    mysql_close($bd);
    $db=0;
}
?> 
