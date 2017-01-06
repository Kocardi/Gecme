<?php
if(isset($_POST['design'])) $design=$_POST['design'];
else $design="";
if(isset($_POST['marq'])) $marq=$_POST['marq'];
else $marq="";
if(isset($_POST['ident'])) $ident=$_POST['ident'];
else $ident="";
if(isset($_POST['type'])) $type=$_POST['type'];
else $type="";
if(isset($_POST['ref'])) $ref=$_POST['ref'];
else $ref="";
if(isset($_POST['affec'])) $affec=$_POST['affec'];
else $affec="";
if(isset($_POST['datepicker'])) $datepicker=$_POST['datepicker'];
else $datepicker="";
if(isset($_POST['datepicker2'])) $datepicker2=$_POST['datepicker2'];
else $datepicker2="";
if(isset($_POST['etat'])) $etat=$_POST['etat'];
else $etat="";
if(isset($_POST['reso'])) $reso=$_POST['reso'];
else $reso="";
if(isset($_POST['etend'])) $etend=$_POST['etend'];
else $etend="";
if(isset($_POST['preci'])) $preci=$_POST['preci'];
else $preci="";
if(isset($_POST['etal'])) $etal=$_POST['etal'];
else $etal="";
if(isset($_POST['legal'])) $etal=$_POST['legal'];
else $legal="";
if(isset($_POST['plage'])) $plage=$_POST['plage'];
else $plage="";
if(isset($_POST['etal2'])) $etal2=$_POST['etal2'];
else $etal2="";
if(isset($_POST['period'])) $period=$_POST['period'];
else $period="";
if(isset($_POST['tole'])) $tole=$_POST['tole'];
else $tole="";
if(isset($_POST['coef'])) $coef=$_POST['coef'];
else $coef="";
if(isset($_POST['erreur'])) $erreur=$_POST['erreur'];
else $erreur="";
if(isset($_POST['proced'])) $proced=$_POST['proced'];
else $proced="";
if(isset($_POST['commentaire'])) $commentaire=$_POST['commentaire'];
else $commentaire="";
if(isset($_POST['raison'])) $raison=$_POST['raison'];
else $raison="";
if(isset($_POST['commentairedeclasse'])) $commentairedeclasse=$_POST['commentairedeclasse'];
else $commentairedeclasse="";


if(empty($design) OR empty($marq))
{
echo 'Attention tous les champs doivent etre remplis';
}
else
{
//$db = mysql_connect('localhost', 'root', '') or die ('erreur de connection a la base'.mysql_error());
require_once('connection.php');
//mysql_select_db('ecme',$db) or die('erreur de selection '.mysql_error());
$sql = "INSERT INTO listedeclasser(id, design, marq, ident, type, ref, affec, datepicker, datepicker2, etat, reso, etend, preci, etal, legal, plage, etal2, period, tole, coef, erreur, proced, commentaire, raison, commentairedeclasse) VALUES('', '$design','$marq','$ident','$type','$ref','$affec','$datepicker','$datepicker2','$etat','$reso','$etend','$preci','$etal','$legal','$plage','$etal2','$period','$tole','$coef','$erreur','$proced','$commentaire','$raison','$commentairedeclasse)";
mysql_query($sql) or die ('erreur de sauvegarde !'.$sql.'<br>' .mysql_error());
echo 'ecme enregistrer.';
mysql_close($link);
}
?>
<script language="javascript">
  alert("Déclassement effectué" );
  document.location.replace("index2.php" );
</script>
