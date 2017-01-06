<meta charset="utf-8" />
<link rel="stylesheet" href="mise_en_page.css" />
<script type="text/JavaScript">//permet de rajouter une désignation dans déclaration ecme
	function AjoutOptionAuSelect(this_select)
	{
		if (this_select.value == "Autre")
		{
			var saisie;
			var pass = false;
			do
			{
				if (pass) alert("La valeur est incorrecte. Elle ne doit comporter que des lettres.");

				saisie = prompt("Entrer la nouvelle valeur :");

				if (saisie == null) return false;
				pass = true;
			}
			while (saisie.match(/[^a-z][^0-9][]/i) && saisie != "")

			this_select.options[this_select.length] = new Option(saisie, saisie, true, true);

			for (var i=0; i < this_select.options.length; i++)
			{
				if (this_select.options[i].value == saisie)
				{
					this_select.options[i].selected = true;
				}
			}
		}
	}
</script>
<?php
if(isset($_POST['choixnum9'])) $choixnum9=$_POST['choixnum9'];
else $choixnum9="";
?>

<form method="POST" action="traitementmodif.php">
<?php
include('conn.php');
//consultation:
$reponse = $bdd->prepare('SELECT * FROM liste WHERE ident=?');
$reponse->execute(array($_POST['choixnum9']));
//display information:
while($row9 = $reponse->fetch())
	
{?>
<div id="decla" >
<div id="colonne1">
<label>Désignation :</label>
<select id="design" name="design" title="selectionnez un équipement" autofocus onChange="AjoutOptionAuSelect(this);" >
<option value="<?php echo "$row9[design]" ;?>"><?php echo "$row9[design]" ;?> </option>
<?php
require_once('conn.php');
$sql = $bdd->query(' SELECT DISTINCT design FROM liste ORDER BY design ASC  ');
	while($row5=$sql->fetch())
{echo"<option>$row5[design]</option>";}
?>
<option value="Autre">Autre</option>
<?php

echo"</select></td></tr>";

$sql->closeCursor();
$sql = NULL;
?>
<br>

<label>Marque :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
<select id ="marq" name="marq" title="Sélectionnez la marque de l'équipement" onChange="AjoutOptionAuSelect(this);">
<option value="<?php echo "$row9[marq]" ;?>"><?php echo "$row9[marq]" ;?></option>
<?php
require_once('conn.php');
$sql2 = $bdd->query(' SELECT DISTINCT marq FROM liste ORDER BY marq ASC  ');
while($row6=$sql2->fetch())
{echo"<option>$row6[marq]</option>";}
?>
<option value="Autre">Autre</option>
<?php
echo"</select></td></tr>";
?>
<br/>
<div><?php include('recupidentmodif.php');?></div>
 <label>Type :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="type" type="text" value="<?php echo $row9['type']?>"title="Utile pour affecter une image a l'ecme" name="type"/>
  <br/>
   Réference : <input type="text" id="ref" value="<?php echo $row9['ref']?>" name="ref"/>
   <br/>
   <label>Localisation :</label>
 <select id="affec"  name="affec" title="Nom du service ou est affecté l'appareil">
<option value="<?php echo "$row9[affec]" ;?>"><?php echo "$row9[affec]" ;?> </option>
<?php
require_once('conn.php');
$sql3 = $bdd->query(' SELECT DISTINCT affec FROM liste ORDER BY affec ASC  ');
while($row7=$sql3->fetch())
{echo"<option>$row7[affec]</option>";}
?>
<option value="Autre">Autre</option>
<?php
echo"</select></td></tr>";
?>
<br/>
<label>Application :</label>
<select id="appli" name="appli"  title="Localisation géographique de l'appareil dans le service">
<option value="<?php echo "$row9[appli]" ;?>"><?php echo "$row9[appli]" ;?> </option>
<?php
require_once('conn.php');
$sql4 = $bdd->query(' SELECT DISTINCT appli FROM liste ORDER BY appli ASC  ');
while($row8=$sql4->fetch())
{echo"<option>$row8[appli]</option>";}
?>
<option value="Autre">Autre</option>
<?php
echo"</select></td></tr>";
?>
<br/>	
Date de réception :&nbsp;<input type="text" value="<?php echo $row9['datepicker']?>" name="datepicker" class="datepicker" id="datepicker">
<br/>
Date de mise en service :&nbsp;<input type="text" value="<?php echo $row9['datepicker2']?>" name="datepicker2" class="datepicker" id="datepicker2">
<br/>
<?php echo'<img alt="" src="images/'.$row9['type'].'.jpg" id="image_fdv" width="150" height="180"/>';?>
</div>
<div id="colonnecentre">
Etat de l'équipement :
    <INPUT TYPE="radio" id="etat" NAME="etat" VALUE=Neuf <?php if($row9['etat']=='Neuf') { echo 'checked="checked"'; }?>>Neuf 
		&nbsp;&nbsp;<INPUT TYPE="radio" NAME="etat" VALUE=Occasion <?php if($row9['etat']=='Occasion') { echo 'checked="checked"'; }?>>Occasion
	<br/>
	<label>Etendue de mesure :</label>
	<select id="etend" name="etend" >
		<option value="<?php echo "$row9[etend]" ;?>"><?php echo "$row9[etend]" ;?> </option>
		<option value="-"> - </option>
	<optgroup label="Balance">
   		<option value="0,5 g à 1,5 kg">0,5 g à 1,5 kg</option>
		<option value="1 g à 400 g">1 g à 400 g</option>
		<option value="5 g à 2,2 kg">5 g à 2,2 kg</option>
		<option value="5 g à 25 kg">5 g à 25 kg</option>
		<option value="20 g à 3 kg">20 g à 3 kg</option>
		<option value="40 g à 6 kg">40 g à 6 kg</option>
		<option value="25 g à 12 kg">25 g à 12 kg</option>
		<option value="40 g à 12 kg">40 g à 12 kg</option>
		<option value="50 g à 15 kg">50 g à 15 kg</option>
		<option value="100 g à 15 kg">100 g à 15 kg</option>
		<option value=""> </option>
	</optgroup>
	<optgroup label="Thermomètre">
	<option value="-10°C à 50°C">-10°C à 50°C</option>
 		<option value="-20°C à 110°C">-20°C à 110°C</option>
		<option value="-20°C à 230°C">-20°C à 230°C</option>
		<option value="-30°C à 30°C">-30°C à 30°C</option>
		<option value="-35°C à 85°C">-35°C à 85°C</option>
		<option value="-40°C à 70°C">-40°C à 70°C</option>
		<option value="-40°C à 80°C">-40°C à 80°C</option>
		<option value="-40°C à 150°C">-40°C à 150°C</option>
		<option value="-50°C à 40°C">-50°C à 40°C</option>
		<option value="-50°C à 150°C">-50°C à 150°C</option>
		<option value="-50°C à 300°C">-50°C à 300°C</option>
		<option value="-55°C à 350°C">-55°C à 350°C</option>
   		<option value="-100°C à 600°C">-100°C à 600°C</option>
		<option value=""> </option>
	</optgroup>
	<optgroup label="Horloge">
		<option value="15 m">15 minutes </option>
		<option value="24 h">24 heures </option>
		<option value=""> </option>
	</optgroup>
	<optgroup label="Autre">
    		<option value="0 à 999">0 à 999,9 </option>
		<option value="0 à 100%">0 à 100% </option>
		<option value="0 ou 1">0 ou 1 </option>
	</optgroup>
       </select>
<br/>  
<label>Plage d'application :</label>
      <select id="plage" name="plage">
	<option value="<?php echo "$row9[plage]" ;?>"><?php echo "$row9[plage]" ;?> </option>
	<option value="-"> - </option>
<optgroup label="Balance">
	<option value="20 g à 800 g">20 g à 800 g </option>
	<option value="20 g à 15 kg">20 g à 15 kg </option>
	<option value="25 g à 1 kg">25 g à 1 kg </option>
	<option value="25 g à 1,6 kg">25 g à 1,6 kg </option>
	<option value="40 g à 6 kg">40 g à 6 kg </option>
	<option value="50 g à 12 kg">50 g à 12 kg </option>
	<option value="50 g à 15 kg">50 g à 15 kg </option>
	<option value="100 g à 1,6 kg">100 g à 1,6 kg </option>
	<option value="230 g à 2 kg">230 g à 2 kg </option>
	<option value="500 g à 1,6 kg">500 g à 1,6 kg </option>
	<option value="800 g à 5 kg">800 g à 5 kg </option>
	<option value="1 kg à 5 kg">1 kg à 5 kg </option>
	<option value="3 kg à 40 kg">3 kg à 40 kg </option>
	<option value=""> </option>
</optgroup>
<optgroup label="Thermomètre">
	<option value="-2°C à 15°C">-2°C à 15°C </option>
	<option value="-10°C à -25°C">-10°C à -25°C </option>
	<option value="-20°C à 75°C">-20°C à 75°C </option>
	<option value="-25°C à 18°C">-25°C à 18°C </option>
	<option value="-40°C à 80°C">-40°C à 80°C </option>
	<option value="-50°C à 40°C">-50°C à 40°C </option>
	<option value="-50°C à 70°C">-50°C à 70°C </option>
	<option value="-50°C à 140°C">-50°C à 140°C </option>
	<option value="-50°C à 200°C">-50°C à 200°C </option>
	<option value="0°C à 3°C">0°C à 3°C </option>
	<option value="0°C à 5°C">0°C à 5°C </option>
	<option value="0°C à 100°C">0°C à 100°C </option>
	<option value="0°C à 250°C">0°C à 250°C </option>
	<option value="5°C à 8°C">5°C à 8°C </option>
	<option value="5°C à 12°C">5°C à 12°C </option>
	<option value="10°C à 100°C">10°C à 100°C </option>
	<option value="70°C à 80°C">70°C à 80°C </option>
	<option value="70°C à 85°C">70°C à 85°C </option>
	<option value="150°C à 250°C">150°C à 250°C </option>
	<option value=""> </option>
</optgroup>
<optgroup label="Autre">
	<option value="0% à 30%">0% à 30% </option>
	<option value="0% à 100%">0% à 100% </option>
	<option value="19,5% à 23,5%">19,5% à 23,5% </option>
	<option value="0 à 15 mn">0 à 15 mn </option>
	<option value="24 h">24 h </option>
	<option value="0 ou 1">0 ou 1 </option>
</optgroup>
      </select>
<br/>
<label>Etalonnage :</label>
      <select id="etal2" name="etal2">
	<option value="<?php echo "$row9[etal2]" ;?>"><?php echo "$row9[etal2]" ;?> </option>
	<option value=" - "> - </option>
	<option value="Interne">Interne</option>
	<option value="Externe">Externe</option>
	<option value="Interne + Externe">Interne + Externe</option>
      </select>
<br/>
<label>Périodicité (mois) :</label>
      <select id="period" name="period" title="Intervalle séparant deux opérations de métrologie consécutives" >
	<option value="<?php echo "$row9[period]" ;?>"><?php echo "$row9[period]" ;?> </option>
<option value="-"> - </option>
	<option value="6 mois">6 mois</option>
	<option value="12 mois">12 mois</option>
	</select>
<br/>
   <label>Tolérance sur la mesure produit(+/-) :</label>
      <select id="tole" name="tole" title="" >
	<option value="<?php echo "$row9[tole]" ;?>"><?php echo "$row9[tole]" ;?> </option>
	<option value=" - "> - </option>
	<option value="+/- 0,5 g">+/- 0,5 g</option>
	<option value="+/- 1 g">+/- 1 g</option>
	<option value="+/- 2 g">+/- 2 g</option>
	<option value="+/- 5 g">+/- 5 g</option>
	<option value=""> </option>
	<option value="+/- 1°C">+/- 1°C</option>
	<option value="+/- 2°C">+/- 2°C</option>
	<option value=""> </option>
	<option value="+/- 1 mn">+/- 1 mn</option>
	<option value=""> </option>
	<option value="+/- 1 %">+/- 1 %</option>
      </select>
<br/>
<label>Erreur maximale tolérée (+/-) :</label>
      <select id="erreur" name="erreur" >
	<option value="<?php echo "$row9[erreur]" ;?>"><?php echo "$row9[erreur]" ;?> </option>
	<option value=" - "> - </option>
	<option value="+/- 0,5 g">+/- 0,5 g</option>
	<option value="+/- 1 g">+/- 1 g</option>
	<option value="+/- 2 g">+/- 2 g</option>
	<option value="+/- 5 g">+/- 5 g</option>
	<option value=""> </option>
	<option value="+/- 1°C">+/- 1°C</option>
	<option value="+/- 2°C">+/- 2°C</option>
	<option value=""> </option>
	<option value="+/- 1 mn">+/- 1 mn</option>
	<option value=""> </option>
	<option value="+/- 1 %">+/- 1 %</option>
      </select>
<br/>
<label>Procédure d'étalonnage :</label>
      <select id="proced" name="proced" >
	<option value="<?php echo "$row9[proced]" ;?>"><?php echo "$row9[proced]" ;?> </option>
	<option value=" - "> - </option>
	<option value="ICCMTN002">ICCMTN002</option>
      </select>
<br/>
<label>Commentaire :</label>
<textarea name="commentaire" value="<?php echo "$row9[commentaire]"?>" id="comm" title="tapez votre commentaire ici"><?php echo "$row9[commentaire]"?></textarea>
<!--<textarea name="commentaire" id="comm" rows="2" cols="37"title="tapez votre commentaire ici"></textarea>-->
</div>
<div id="colonne2">
<label>Résolution :</label>
       <select id="reso" name="reso">
	<option value="<?php echo "$row9[reso]" ;?>"><?php echo "$row9[reso]" ;?> </option>
	<option value="-"> - </option>
	<option value="0,01 g">0,01 g</option>
	<option value="0,1 g">0,1 g</option>
	<option value="0,5 g">0,5 g</option>
    	<option value="1 g">1 g</option>
    	<option value="2 g">2 g</option>
	<option value="5 g">5 g</option>
	<option value=""> </option>
	<option value="0,1°C">0,1°C</option>
	<option value="1°C">1°C</option>
       </select>
<br/>
<label>Classe de Précision :</label>
       <select id="preci" name="preci" title="Classe I    Précision spéciale
Classe II   Précision fine
Classe III  Précision moyenne
Classe IIII Précision ordinaire" >
	<option value="<?php echo "$row9[preci]" ;?>"><?php echo "$row9[preci]" ;?> </option>
	<option value="-"> - </option>
	<option value="I">I</option>
	<option value="II">II</option>
    <option value="III">III</option>
    <option value="IIII">IIII</option>
		</select>
<br/>
		Etalonnage : 
    <INPUT TYPE="radio" id="etal" NAME="etal" VALUE=Oui <?php if($row9['etal']=='Oui') { echo 'checked="checked"'; }?>>Oui 
   <INPUT TYPE="radio" NAME="etal" VALUE=Non <?php if($row9['etal']=='Non') { echo 'checked="checked"'; }?>>Non
<br/>
Métrologie Légale :
    <INPUT TYPE="radio" id="legal" NAME="legal" VALUE=Oui <?php if($row9['legal']=='Oui') { echo 'checked="checked"'; }?>>Oui
<INPUT TYPE="radio" NAME="legal" VALUE=Non <?php if($row9['legal']=='Non') { echo 'checked="checked"'; }?>>Non
<br/>
<label>Coefficient f :</label>
      <select id="coef" name="coef" >
	<option value="<?php echo "$row9[coef]" ;?>"><?php echo "$row9[coef]" ;?> </option>
	<option value=" - "> - </option>
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="10">10</option>
	</select>
<br/>
<br/>
<br/>

<?php
}
?>
<p id="buttons">
<input type="submit" value="Enregistrer" name="enregistrer">
</p>
<INPUT type="button" id="retour" value="Retour" onclick="history.back()"title="Retour à la page de choix des fiche de vie">
</form>
  </div>
  </div>