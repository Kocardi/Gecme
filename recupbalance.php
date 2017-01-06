<html>
<body>
<form method="POST" action="index.php">

<p id="buttons">
<input type="submit" value="Retour" name="resultat"><br/>
<a href="javascript:window.print()"><input type="button" id="button-imprimer" value="Imprimer" /></a>
</p>
</form>
</body>
</html>
<?php
//connection:
$link = mysqli_connect("kritsenmtn.free.fr","kritsenmtn","Kritsenmtn","kritsenmtn") or die("Error " . mysqli_error($link));

//consultation:

$query = " SELECT * FROM liste WHERE design='balance' " or die("Error in the consult.." . mysqli_error($link));

//execute the query.

$result = mysqli_query($link, $query);

//display information:

while($row = mysqli_fetch_array($result)) 

{
    echo '<center><table  style="border:1px solid; border-color:blue; background:#9999FF;" width="75%"><tr><td style="border:1px solid;"><p><b>' . $row['design'] . '  ' . $row['ident'] . ' </td></b></tr><tr><td>' . $row['affec'] . '<br /> Recu le: ' .$row['datepicker'] .'<br/> mis en service le:' . $row['datepicker2'] . ' </td></tr></table> </p></center>';
}
?>
