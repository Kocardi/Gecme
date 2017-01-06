<?php
//connection:
include('conn.php');

//consultation:
$reponse = $bdd->query('SELECT * FROM liste WHERE legal="oui"');

//display information:
while($row = $reponse->fetch())
{
echo '<center><table  style="border:2px solid; border-color:#43500C; background:#B7CD58;" width="100%"><tr><td style="border:1px solid;"><p><b>'  .$row['design'] . '  N°'.$row['ident'  ].'&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/' . $row['type'] . '.jpg" id="image" width="60" height="56"/></td></b></tr><tr><td><form action="fdv.php" method="post"><input type="hidden" name="choixnum3" value= '.$row['ident'].' /><input type="submit" value="Editer fdv" /></form><br><strong>'  .$row['design'] . '</strong> n° <strong>'. $row['ident'] .'</strong> en Métrologie Légale pour le contrôle des   <strong>'. $row['affec'].'</strong> </td></tr></table> </p></center><br>';
}
//endwhile;
$reponse->closeCursor();
$bdd=null;
?><br>