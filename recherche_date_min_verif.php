<?php
/*require_once('conn.php');
$sql15=$bdd->query('SELECT ident, MIN( datepicker3 )FROM (SELECT *FROM (SELECT ident, datepicker3 FROM fichedevie ORDER BY datepicker3 DESC) AS id2 GROUP BY ident
) AS id3');
while ($donnees=$sql15->fetch())
	{echo 'Derniére vérification Interne le : ' ;
$source = $donnees['MIN( datepicker3 )'];
$date = new DateTime($source);
echo $date->format('d-m-Y');?><br><?php
echo $donnees['ident'];
}*/


//connection:
include('conn.php');
//consultation:
$reponse33 = $bdd->prepare('SELECT MAX( datepicker3 )FROM fichedevie WHERE ident=?');
$reponse33->execute(array(2));
//affiche les information:
while($data33 = $reponse33->fetch())
{
echo 'Dernière vérification Interne le : ' ;
$source = $data33['MAX( datepicker3 )'];
$date = new DateTime($source);
echo $date->format('d-m-Y');?><br><?php
echo 'Pour l\'ECME N° : ' ;
echo $data33['ident'];
	}
?>