<form method="post" action="recherche_derniere_date_verif.php">
<label>choisir la fiche de vie :</label>
<select id="choixnum3" name="choixnum3" value="choixnum3" size="1">
<?php

//connection:
include('conn.php');
//consultation:
$reponse = $bdd->prepare('SELECT ident,design FROM liste ORDER BY ident ASC');
$reponse->execute(array());
//affiche les information:
echo '<option value=""> </option>';
while($data = $reponse->fetch())
	{	$afi2=substr($data['design'], 0, 12);
echo '<option>'.$data[ident].' '.$afi2.'</option>';
	}

?>&nbsp;&nbsp;
<input id="buttons" type="submit" value="Afficher" name="afficher">
</select>

&nbsp;&nbsp;
<!-- creation bouton Afficher -->
<?php
if(isset($_POST['choixnum3'])) $choixnum3=$_POST['choixnum3'];
else $choixnum3="";
?><BR><?php
echo $choixnum3;
//consultation:



$reponse33 = $bdd->prepare('SELECT MAX( datepicker3 )FROM fichedevie WHERE ident=? ');
$reponse33->execute(array($choixnum3));
//affiche les information:
while($data33 = $reponse33->fetch())
{
echo '   Dernière vérification Interne le : ' ;
$source = $data33['MAX( datepicker3 )'];
$date = new DateTime($source);
echo $date->format('d-m-Y');
}
?>

</form>