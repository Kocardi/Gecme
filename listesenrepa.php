<?php
//connection:
include('conn.php');

//consultation:
$reponse = $bdd->query('
SELECT * 
FROM fichedevie f1 
WHERE naturedinter="Départ en réparation"
AND NOT EXISTS ( SELECT * 
				FROM fichedevie f2 
				WHERE f1.ident = f2.ident 
				AND f2.naturedinter ="Retour de réparation") 
					AND NOT EXISTS (SELECT * 
					FROM fichedevie f3 
					WHERE f1.ident = f3.ident 
					AND f3.naturedinter ="Déclassement") 
ORDER BY datepicker3');
$reponse2 = $bdd->query('
SELECT * 
FROM liste 
WHERE ident = "'.$row['ident' ].'"');
//display information:
while($row = $reponse->fetch())
{$reponse2 = $bdd->query('
SELECT * 
FROM liste 
WHERE ident = "'.$row['ident' ].'"');
while($row2 = $reponse2->fetch())
{
$date=date("d-m-Y", strtotime($row['datepicker3']));
echo '<center><table  style="border:2px solid; border-color:##43500C; background:#B7CD58;" width="100%"><tr><td style="border:1px solid;"><p><b>'  .$row2['design'] . '  N°'.$row['ident'  ].'&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/' . $row2['type'] . '.jpg" id="image" width="60" height="56"/></td></b></tr><tr><td><form action="fdv.php" method="post"><input type="hidden" name="choixnum3" value= '.$row['ident'].' /><input type="submit" value="Editer fdv" /></form><br><strong>'.$row2['design'].'</strong><strong> N° </strong><strong>'. $row['ident'] .'</strong> Envoyé en réparation le  <strong>'.$date.'</strong> </td></tr></table> </p></center><br>';
}}
$bdd=null;
?>