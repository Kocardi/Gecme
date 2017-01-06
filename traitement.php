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
if(isset($_POST['appli'])) $appli=$_POST['appli'];
else $appli="";
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
if(isset($_POST['legal'])) $legal=$_POST['legal'];
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

if(empty($design) OR empty($marq))
{
echo 'Attention tous les champs doivent être remplis';
}
else
{
require_once('conn.php');
$req = $bdd->prepare('INSERT INTO liste(id, design, marq, ident, type, ref, affec, appli, datepicker, datepicker2, etat, reso, etend, preci, etal, legal, plage, etal2, period, tole, coef, erreur, proced, commentaire) VALUES (:id, :design, :marq, :ident, :type, :ref, :affec, :appli, :datepicker, :datepicker2, :etat, :reso, :etend, :preci, :etal, :legal, :plage, :etal2, :period, :tole, :coef, :erreur, :proced, :commentaire)')or exit(print_r($bdd->errorinfo()));
$req->execute(array(
'id' => $id,
'design' => $design,
'marq' => $marq,
'ident' => $ident,
'type' => $type,
'ref' => $ref,
'affec' => $affec,
'appli' => $appli,
'datepicker' => $datepicker,
'datepicker2' => $datepicker2,
'etat' => $etat,
'reso' => $reso,
'etend' => $etend,
'preci' => $preci,
'etal' => $etal,
'legal' => $legal,
'plage' => $plage,
'etal2' => $etal2,
'period' => $period,
'tole' => $tole,
'coef' => $coef,
'erreur' => $erreur,
'proced' => $proced,
'commentaire' => $commentaire,
));
}
//$handle = fopen("https://smsapi.free-mobile.fr/sendmsg?user=90172980&pass=wjvlxurRveEw0H&msg= $design N° $ident enregistré!", "r");
?>

<?php
include('traitementimage.php');
?>

<meta charset="utf-8" />
<script language="javascript">
  alert("<?php echo $design  ; ?> N°: <?php echo $ident ;?>  Enregistré !" );
  document.location.replace("index2.php" );
</script>
