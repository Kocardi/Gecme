<form method="POST" action="fichecontrole.php">
<label>choisir la Balance :</label>
<select id="choixnum3" name="choixnum3" value="choixnum3" size="1">
<?php
$server = "kritsen.free.fr";
$user = "kritsenmtn";
$pass = "Kritsenmtn";
$bd = "kritsenmtn";
mysql_connect($server,$user,$pass);
mysql_select_db($bd);

$sql = "SELECT ident FROM liste WHERE design='Balance' ORDER BY ident ASC";
$rep = mysql_query("$sql") ;
while($data = mysql_fetch_array($rep))
{
echo "<option>".$data[ident]."</option>";
}
?>
<!-- creation bouton Afficher -->
<p id="buttons">
<input id="affichefdv" type="submit" value="Afficher" name="afficher">
</p>
</form>


