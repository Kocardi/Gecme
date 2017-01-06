<?php
//connection:
include('conn.php');

//consultation:
$reponse = $bdd->query('SELECT * FROM liste WHERE design="Anoxymètre"');

//display information:
while($row = $reponse->fetch()) 
{
 echo '<center><table  style="border:2px solid; border-color:#43500C; background:#B7CD58;" width="100%"><tr><td style="border:1px solid;"><p><b>'  .$row['design'] . '  N°'.$row['ident'  ].'&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/' . $row['type'] . '.jpg" id="image" width="60" height="56"/></td></b></tr><tr><td><form action="fdv.php" method="post"><input type="hidden" name="choixnum3" value= '.$row['ident'].' /><input type="submit" value="Editer fdv" /></form><strong>'  .$row['design'] . '</strong> n° <strong>'. $row['ident'] .'</strong> de la Marque <strong>'. $row['marq'].'</strong> de Type  <strong>'. $row['type'].'</strong> ayant pour Référence <strong>' . $row['ref'] . '</strong> <br>Affecter au service <strong>'.$row['affec'].'</strong> pour <strong>'.$row['appli'].'</strong> <br>Recu <strong>'.$row['etat'].'</strong> le: <strong>'.$row['datepicker'].'</strong>  et  mis en service le: <strong>'.$row['datepicker2'].'</strong> pour des mesures comprise entre <strong>'. $row['etend'].'</strong>
	<br>
	avec une Résolution de <strong>'. $row['reso'] .'</strong> pour une plage d\'application de <strong>'. $row['plage'] .'</strong>
	<br>
	a Etalonner en <strong>'.$row['etal2'].'</strong> tous les <strong>'.$row['period'].'  </strong> en suivant la procedure <strong>'.$row['proced'].'</strong>
<br>
Tolerance sur la mesure des produits de <strong>'.$row['tole'].'</strong> et un coeficient de <strong>'.$row['coef'].'</strong> pour une erreur max tolérée <strong>'.$row['erreur'].'</strong>	</td></tr></table> </p></center>';
}
//endwhile;
//$reponse->closeCursor();
$bdd=null;
?><br>
