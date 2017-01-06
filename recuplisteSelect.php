<?php
require_once('connection.php');
$sql = " SELECT `CODE` FROM `rido` ORDER BY CODE ASC  ";
$result = mysql_query($sql) or die("Requete pas comprise");

echo "<form action='ta_page.php' method='POST'>
<select name='CODE '>";
while ($row=mysql_fetch_array($result))
{
echo"<option>$row[0]</option>";
}
echo"<option value='Autre'>Autre</option>";
echo"</select></td></tr>
</form>";
?> 