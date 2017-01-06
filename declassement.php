<?php
if(isset($_POST['choixnum'])) $choixnum=$_POST['choixnum'];
else $choixnum="";
if(isset($_POST['datepicker3'])) $datepicker3=$_POST['datepicker3'];
else $datepicker3="";
if(isset($_POST['newdatepicker3'])) $newdatepicker3=$_POST['newdatepicker3'];
else $newdatepicker3="";
if(isset($_POST['datepickerdec'])) $datepickerdec=$_POST['datepickerdec'];
else $datepickerdec="";
if(isset($_POST['newdatepickerdec'])) $newdatepickerdec=$_POST['newdatepickerdec'];
else $newdatepickerdec="";
$newdatepickerdec = @ereg_replace('^([0-9]{1,2})-([0-9]{1,2})-([0-9]{2,4})$', '\\3-\\2-\\1', $datepickerdec);
if(isset($_POST['raison'])) $raison=$_POST['raison'];
else $raison="";
if(isset($_POST['visa'])) $visa=$_POST['visa'];
else $visa="";
if(isset($_POST['commentairedeclasse'])) $commentairedeclasse=$_POST['commentairedeclasse'];
else $commentairedeclasse="";

//connection:
include('conn.php');

//consultation:
// copie de liste dans liste declasser
$reponse=$bdd->prepare('INSERT INTO listedeclasser (design, marq, ident, type, ref, affec, appli, datepicker, datepicker2, etat, reso, etend, preci, etal, plage, etal2, period, tole, coef, erreur, proced) SELECT design, marq, ident, type, ref, affec, appli, datepicker, datepicker2, etat, reso, etend, preci, etal, plage, etal2, period, tole, coef, erreur, proced FROM liste where ident = ?');
$reponse->execute(array($_POST['choixnum']));


// effacer de liste
$reponse=$bdd->prepare('DELETE FROM liste WHERE ident = ?');
$reponse->execute(array($_POST['choixnum']));

// copie dans fiche de vie

$req=$bdd->prepare('INSERT INTO fichedevie(ident, datepicker3, naturedinter, refdoc, resul, visa, raison, commentairedeclasse) VALUES(:ident, :datepicker3, :naturedinter, :refdoc, :resul, :visa, :raison, :commentairedeclasse)');
  $req->execute(array(
    'ident' => $choixnum,
    'datepicker3' => $newdatepickerdec,
    'naturedinter' => 'Déclassement',
    'refdoc' => ' - ',
    'resul' => 'Non Conforme',
    'visa' => $visa,
	'raison' => $raison,
	'commentairedeclasse' => $commentairedeclasse
    ));

	// copie de fichedevie dans fichedeviedeclasser
$reponse=$bdd->prepare('INSERT INTO fichedeviedeclasser SELECT * FROM fichedevie where ident = ?');
$reponse->execute(array($_POST['choixnum']));
	
// effacer de fichedevie
$reponse=$bdd->prepare('DELETE FROM fichedevie WHERE ident = ?');
$reponse->execute(array($_POST['choixnum']));
		
?>
<meta charset="utf-8"/>
<!-- retour a la page index.php -->
<script language="javascript">
  alert("ECME Déclassé !" );
  document.location.replace("index2.php" );
</script>