<form method="POST" action="fichecontrole.php">
<label>choisir la Balance :</label>
<!--  <select id="choixnum3" name="choixnum3" value="choixnum3" size="1">  -->
<?php
$server = "kritsenmtn.free.fr";
$user = "kritsenmtn";
$pass = "Kritsenmtn";
$bd = "kritsenmtn";
mysql_connect($server,$user,$pass);
mysql_select_db($bd);

$sql = "SELECT * FROM liste WHERE design='Balance' ";
$rep = mysql_query("$sql") ;
while($data = mysql_fetch_array($rep))
{

$resultat=@preg_replace('/[^0123456789]/','',$data[etend]);
//echo "<option>".$data[ident]."</option>";
echo 'balance numero:',"$data[ident]";
?><br><?php

echo   $resultat;
?><br><?php
?><br><?php
}
?>
<!-- creation bouton Afficher -->
<p id="buttons">
<input id="affichefdv" type="submit" value="Afficher" name="afficher">
</p>
</form>
