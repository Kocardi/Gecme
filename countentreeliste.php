<?php

//connection:
include('conn.php');

$req = $bdd->query('SELECT COUNT(*) as nombre FROM liste');
$donnees=$req->fetch();

//compte le nombre d afficheur
$req = $bdd->query('SELECT COUNT(*) as nombreaff FROM liste WHERE design="Afficheur"');
$dona=$req->fetch();

//compte le nombre d analyseur
$req = $bdd->query('SELECT COUNT(*) as nombreana FROM liste WHERE design="Analyseur"');
$donana=$req->fetch();

//compte le nombre d anoxymetre
$req = $bdd->query('SELECT COUNT(*) as nombreano FROM liste WHERE design="Anoxymètre"');
$donano=$req->fetch();

//compte le nombre de balance
$req = $bdd->query('SELECT COUNT(*) as nombrebal FROM liste WHERE design="Balance"');
$donbal=$req->fetch();

//compte le nombre de compteur
$req = $bdd->query('SELECT COUNT(*) as nombrecom FROM liste WHERE design="Compteur"');
$doncom=$req->fetch();

//compte le nombre de detecteur metaux
$req = $bdd->query('SELECT COUNT(*) as nombremeto FROM liste WHERE design="Détecteur de métaux"');
$donmeto=$req->fetch();

//compte le nombre de detecteur fuite
$req = $bdd->query('SELECT COUNT(*) as nombrefuit FROM liste WHERE design="Détecteur de fuite"');
$donfuit=$req->fetch();

//compte le nombre d horloge
$req = $bdd->query('SELECT COUNT(*) as nombrehor FROM liste WHERE design="Horloge"');
$donhor=$req->fetch();

//compte le nombre de masse
$req = $bdd->query('SELECT COUNT(*) as nombremass FROM liste WHERE design="Masse"');
$donmass=$req->fetch();

//compte le nombre de minuteur
$req = $bdd->query('SELECT COUNT(*) as nombreminu FROM liste WHERE design="Minuteur"');
$donminu=$req->fetch();

//compte le nombre d oxymetre
$req = $bdd->query('SELECT COUNT(*) as nombreoxy FROM liste WHERE design="Oxymètre"');
$donoxy=$req->fetch();

//compte le nombre de sonde de temperature
$req = $bdd->query('SELECT COUNT(*) as nombreson FROM liste WHERE design="Sonde de température"');
$donson=$req->fetch();

//compte du nombre de thermometre
$req = $bdd->query('SELECT COUNT(*) as nombrether FROM liste WHERE design="Thermomètre"');
$don=$req->fetch();

//compte le nombre d'ecme en reparation
$req = $bdd->query('SELECT COUNT(*) as nombrerepa FROM fichedevie f1 WHERE naturedinter="Départ en réparation"AND NOT EXISTS ( SELECT * FROM fichedevie f2 WHERE f1.ident = f2.ident AND f2.naturedinter ="Retour de réparation") AND NOT EXISTS (SELECT * FROM fichedevie f3 WHERE f1.ident = f3.ident AND f3.naturedinter ="Déclassement")');
$donrepa=$req->fetch();

//compte le nombre d'ecme en étalonnage
$req = $bdd->query('SELECT COUNT(*) as nombreetal FROM fichedevie f1 WHERE naturedinter="Départ en étalonnage"AND NOT EXISTS ( SELECT * FROM fichedevie f2 WHERE f1.ident = f2.ident AND f2.naturedinter ="Retour d\'étalonnage") AND NOT EXISTS (SELECT * FROM fichedevie f3 WHERE f1.ident = f3.ident AND f3.naturedinter ="Déclassement")');
$donetal=$req->fetch();

//compte du nombre de metro legale
$req = $bdd->query('SELECT COUNT(*) as nombrelegal FROM liste WHERE legal="oui"');
$donlegal=$req->fetch();

?>
<!-- Commentaire  
/* 
echo $donnees['nombre']?> ecme sont actuellement en service<br>

&nbsp;&nbsp;<?php echo $dona['nombreaff']?> Afficheur<br>
&nbsp;&nbsp;<?php echo $donana['nombreana']?> Analyseur<br>
&nbsp;&nbsp;<?php echo $donano['nombreano']?> Anoxymètre<br>
&nbsp;&nbsp;<?php echo $donbal['nombrebal']?> Balances<br>
&nbsp;&nbsp;<?php echo $doncom['nombrecom']?> Compteur<br>
&nbsp;&nbsp;<?php echo $donmeto['nombremeto']?> Détecteur de métaux<br>
&nbsp;&nbsp;<?php echo $donfuit['nombrefuit']?> Détecteur de fuite<br>
&nbsp;&nbsp;<?php echo $donhor['nombrehor']?> Horloge<br>
&nbsp;&nbsp;<?php echo $donmass['nombremass']?> Masse<br>
&nbsp;&nbsp;<?php echo $donminu['nombreminu']?> Minuteur<br>
&nbsp;&nbsp;<?php echo $donoxy['nombreoxy']?> Oxymètre<br>
&nbsp;&nbsp;<?php echo $donson['nombreson']?> Sonde de température<br>
&nbsp;&nbsp;<?php echo $don['nombrether']?> Thermomètres<br>
&nbsp;&nbsp;<?php echo $donetal['nombreetal']?> En étalonnage<br>
 */-->
