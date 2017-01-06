<form method="POST" action="fichecontrole.php">

<?php
//connection:
include('conn.php');

//consultation:
$reponse = $bdd->query('SELECT * FROM liste WHERE design ="Balance"');

//display information:
while($rowb = $reponse->fetch())

{

$resultat=@preg_replace('/[^0123456789]/','',$rowb[etend]);
//echo "<option>".$data[ident]."</option>";
echo 'balance numero:',"$rowb[ident]";
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