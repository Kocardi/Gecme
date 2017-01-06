<?php  
require_once('connection.php');
// recherche du dernier numero d'identification +1
$req2="SELECT MAX(ident) AS article FROM liste";
$res2=mysql_query($req2);
$idmax2=mysql_result($res2,0)+1;
?>

<?php
mysql_close();  
?>
<?php
echo "<html>
<Form Method='Post' action='test5.php'>
<label>Numero identification interne : </label>
<Input type='text' name='ident' size='2'value=$idmax2>
</Form>
</html>
";
?> 