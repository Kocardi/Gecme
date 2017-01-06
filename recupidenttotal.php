<?php  
require_once('connection.php');
// recherche du plus grand numero d'identification dans liste declasser
$req2="SELECT MAX(ident) AS article FROM listedeclasser";

// recherche du plus grand numero d'identification dans liste
$req3="SELECT MAX(ident) AS article FROM liste";

$res3=mysql_query($req3);
$res2=mysql_query($req2);

// ajout de 1 au deux plus grand numero d'identification
$idmax4=mysql_result($res2,0)+1;
$idmax3=mysql_result($res3,0)+1;

// recherche du plus grand entre les deux
$idmax2=max(($idmax4),($idmax3));
?>

<?php
mysql_close();  
?>
<?php
echo "<html>
<Form Method='Post' action='test5.php'>
<label>Numero identification interne : </label>
<Input type='text' id='ident' name='ident' title='ce champs se remplie tout seul' size='2'value=$idmax2>
</Form>
</html>
";
?> 