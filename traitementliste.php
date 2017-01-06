<?php
//if(isset($_POST['identliste'])) {
//$checkbox = $_POST['identliste'];
//$identliste = implode($checkbox,",");
//}
if(isset($_POST['identliste'])) $identliste=$_POST['identliste'];
else $identliste="";
if(isset($_POST['datepicker3'])) $datepicker3=$_POST['datepicker3'];
else $datepicker3="";
$newdatepicker3 = @ereg_replace('^([0-9]{1,2})-([0-9]{1,2})-([0-9]{2,4})$', '\\3-\\2-\\1', $datepicker3);
if(isset($_POST['naturedinter'])) $naturedinter=$_POST['naturedinter'];
else $naturedinter="";
if(isset($_POST['refdoc'])) $refdoc=$_POST['refdoc'];
else $refdoc="";
if(isset($_POST['resul'])) $resul=$_POST['resul'];
else $resul="";
if(isset($_POST['visa'])) $visa=$_POST['visa'];
else $visa="";
$to_insert = '';
$to_insert .= $identliste;
foreach ($_POST['identliste'] as $identliste)

if(empty($datepicker3) OR empty($naturedinter) OR empty($refdoc) OR empty($resul) OR empty($visa))
{
  echo 'Attention tous les champs doivent etre remplis';
}
else
{
//  $db = mysql_connect('localhost', 'root', '') or die ('erreur de connection a la base'.mysql_error());
  //require_once('connection.php');
  //connection:
include('conn.php');

//  mysql_select_db('ecme',$db) or die('erreur de selection '.mysql_error());
// $sql = "INSERT INTO fichedevie(id, ident, datepicker3, naturedinter, refdoc, resul, visa) VALUES('','".$choixnum3."', '".$newdatepicker3."','".$naturedinter."','".$refdoc."','".$resul."','".$visa."')";

  // ajout des valeur dans la table
  $req=$bdd->prepare('INSERT INTO fichedevie(ident, datepicker3, naturedinter, refdoc, resul, visa) VALUES( :ident, :datepicker3, :naturedinter, :refdoc, :resul, :visa)');
  $req->execute(array(
    'ident' => $identliste,
    'datepicker3' => $newdatepicker3,
    'naturedinter' => $naturedinter,
    'refdoc' => $refdoc,
    'resul' => $resul,
    'visa' => $visa
    ));
 // echo 'Données enregitrées dans la base fiche de vie !';
  
//  mysql_query($sql) or die ('erreur de sauvegarde !'.$sql.'<br>' .mysql_error());
  //echo 'fiche de vie enregistrer.';
  //mysql_close();
}
?>
<meta charset="utf-8"/>
<script language="javascript">
  alert("Fiches de vie enregistée !" );
  document.location.replace("fdecontrole.php");
</script>
