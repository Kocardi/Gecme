<?php
// On prolonge la session
session_start();
// On teste si la variable de session existe et contient une valeur
if(empty($_SESSION['login'])) 
{
  // Si inexistante ou nulle, on redirige vers le formulaire de login
  header('Location: /index.php');
  exit();
}
?>
<!doctype html>
<html lang="fr" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="HTML,CSS,XML,JavaScript"/>
<meta charset="utf-8"/>
<title>Gecme&reg;</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<link type="text/css" rel="stylesheet" href="mise_en_page.css"/>
<link type="text/css" rel="stylesheet" href="/jquery-ui.css"/>
<script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.js"></script>
<script type="text/javascript" src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script type="text/javascript" src="rebours/jquery.timeLeft.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script type="text/javascript" src="rebours/jquery.timeLeft.js"></script>

<SCRIPT type="text/javascript" >
function Calculer() {
	var tab="                   azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN0123456789_$&#@";
	var mot=document.forms[0].elements[0].value;
	var n=mot.length;
	var sum=1;
	for (var i=0;i<n;i++) {
		var index=tab.indexOf(mot.substring(i,i+1));
		sum=sum+(index*n*i)*(index*i*i);
	}
	document.forms[0].elements[2].value=sum;
}
</SCRIPT>
<style>
.cRetour {
  border-radius:3px;
  padding:10px;
  font-size:15px;
  text-align:center;
  color:#fff;
  background:rgba(0, 0, 0, 0.25);
  z-index:99999;
  transition:all ease-in 0.2s;
  position: fixed;
  cursor: pointer;
  bottom: 1em;
  right: 20px;
  display: none;
}
.cRetour:before{ content: "\25b2"; }
.cRetour:hover{
  background:rgba(0, 0, 0, 1);
  transition:all ease-in 0.2s;
}
</style>
  <script type="text/javascript" >// fonction effet accordéon
$(function() {
$( "#accordion" ).accordion({
heightStyle: "content", active: false,collapsible: true
});
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
  window.onscroll = function(ev) {
    document.getElementById("cRetour").className = (window.pageYOffset > 100) ? "cVisible" : "cInvisible";
  };
});
</script>
<script type="text/javascript">// fonction affichage du calendrier
$(function() {
         $('[name="datepicker"]').datepicker({ dateFormat: "dd-mm-yy" });
      });

$(function() {
         $('[name="datepicker2"]').datepicker({ dateFormat: "dd-mm-yy" });
      });

$(function() {
         $('[name="datepickerdec"]').datepicker({ dateFormat: "dd-mm-yy" });
      });	  
</script>

  <script type="text/javascript">//confirmation de suppression d'ecme
function Demande_verification(){
            msg = "Voulez-vous vraiment supprimer cette ECME ?"
       return confirm(msg);
}
</script>

<script type="text/javascript">// realisation des tabulation pour les liste d'ecme
$(document).ready(function($) {
	   $('#tabs').tabs({hide: {
        effect: "fade",
        duration: 500
    }});
	   });
</script>

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

</head>
<header>
	<div id="titre2">Gecme<font size="4px"><SUP>&reg;</SUP></font> &nbsp;&nbsp;&nbsp;&nbsp;    Gestion des ECMEs Marine Harvest Kritsen Chateaulin </div>
	<IMG class="logo2" SRC="logo2.jpg" WIDTH=120 HEIGHT=50 alt="logo2" />
	<IMG class="logo" SRC="logo.jpg" WIDTH=120 HEIGHT=50 alt="logo"/>
</header>
<body>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script type="text/javascript" src="rebours/jquery.timeLeft.js"></script>
<script type="text/javascript" src="jquery.ui.datepicker-fr.js"></script>
<script>            
jQuery(document).ready(function() {
  var duration = 500;
  jQuery(window).scroll(function() {
    if (jQuery(this).scrollTop() > 150) {
      // Si un défillement de 100 pixels ou plus.
      // Ajoute le bouton
      jQuery('.cRetour').fadeIn(duration);
    } else {
      // Sinon enlève le bouton
      jQuery('.cRetour').fadeOut(duration);
    }
  });
				
  jQuery('.cRetour').click(function(event) {
    // Un clic provoque le retour en haut animé.
    event.preventDefault();
    jQuery('html, body').animate({scrollTop: 0}, duration);
    return false;
  })
});
</script>

<div class="cRetour"></div>
<div id="accordion">
  <h3>Déclaration des Equipements de Contrôle, de Mesure et d'Essai</h3>
  <div>
    <form method="post" action="traitement.php" enctype="multipart/form-data">
<div id="decla" >
<div id="colonne1">
<label>Désignation :</label>
<select required id="design" name="design" title="selectionnez un équipement" autofocus onChange="AjoutOptionAuSelect(this);" >
<option value=""> </option>
<?php
require_once('conn.php');
$sql = $bdd->query(' SELECT DISTINCT design FROM liste ORDER BY design ASC  ');
//$result = mysql_query($sql) or die("Requete pas comprise");

//echo "<form action='trairecuplisteselect.php' method='POST'>
//<select name='CODE' id='CODE' onChange='AjoutOptionAuSelect(this);'>";
//while ($row=mysql_fetch_array($result))
	while($row5=$sql->fetch())
{
echo"<option>$row5[design]</option>";
}
?>
<option value="Autre">Autre</option>
<?php
echo"</select></td></tr>";
$sql->closeCursor();
$sql = NULL;
?>
<br>
<label>Marque :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
<select required id ="marq" name="marq" title="Sélectionnez la marque de l'équipement" onChange="AjoutOptionAuSelect(this);">
		<option value=""> </option>
		<?php
require_once('conn.php');
$sql2 = $bdd->query(' SELECT DISTINCT marq FROM liste ORDER BY marq ASC  ');
	while($row6=$sql2->fetch())
{
echo"<option>$row6[marq]</option>";
}
?>
<option value="Autre">Autre</option>
<?php
echo"</select></td></tr>";
?>
<br/>
<div><?php include('recupident.php');?></div>
 <label>Type :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="type" type="text" title="Utile pour affecter une image a l'ecme"name="type" required/>
  <br/>
   Réference : <input type="text" id="ref" name="ref" required/>
   <br/>
   <label>Localisation :</label>
       <select required id="affec" name="affec" title="Nom du service ou est affecté l'appareil" onChange="AjoutOptionAuSelect(this);" required>
<option value=""> </option>
		<?php
require_once('conn.php');
$sql3 = $bdd->query(' SELECT DISTINCT affec FROM liste ORDER BY affec ASC  ');
	while($row7=$sql3->fetch())
{
echo"<option>$row7[affec]</option>";
}
?>
<option value="Autre">Autre</option>
<?php
echo"</select></td></tr>";
?>
	   <br/>
<label>Application :</label>
       <select required id="appli" name="appli"  title="Localisation géographique de l'appareil dans le service" onChange="AjoutOptionAuSelect(this);" required>
	<option value=""> </option>
		<?php
require_once('conn.php');
$sql4 = $bdd->query(' SELECT DISTINCT appli FROM liste ORDER BY appli ASC  ');
	while($row8=$sql4->fetch())
{
echo"<option>$row8[appli]</option>";
}
?>
<option value="Autre">Autre</option>
<?php
echo"</select></td></tr>";
?>
    <br/>
Date de réception :&nbsp;<input type="text" name="datepicker" class="datepicker" id="datepicker" required>
<br/>
Date de mise en service :&nbsp;<input type="text" name="datepicker2" class="datepicker" id="datepicker2" required>
<br/>
<label for="image">Image : </label>

                <input type="hidden" name="MAX_FILE_SIZE" value="2097152"/>

                <input type="file" name="ImageNews" id="image" accept="image/jpeg" title="Image téléchargée préalablement dans le répertoire image au format jpg"/>
</div>
<div id="colonnecentre">
Etat de l'équipement :
    <INPUT TYPE="radio" id="etat" NAME="etat" VALUE=Neuf >Neuf &nbsp;&nbsp;<INPUT TYPE="radio" NAME="etat" VALUE=Occasion>Occasion
<br/>
	<label>Etendue de mesure :</label>
	<select required id="etend" name="etend" required >
		<option value=""> </option>
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
		<option value="-50°C à 70°C">-50°C à 70°C</option>
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
      <select required id="plage" name="plage" required>
	<option value=""> </option>
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
      <select required id="etal2" name="etal2" required>
	<option value=""> </option>
	<option value=" - "> - </option>
	<option value="Interne">Interne</option>
	<option value="Externe">Externe</option>
	<option value="Interne + Externe">Interne + Externe</option>
      </select>
<br/>
<label>Périodicité (mois) :</label>
      <select required id="period" name="period"  title="Intervalle séparant deux opérations de métrologie consécutives" required>
	<option value=""> </option>
<option value="-"> - </option>
	<option value="6 mois">6 mois</option>
	<option value="12 mois">12 mois</option>
	</select>
<br/>

   <label>Tolérance sur la mesure produit(+/-) :</label>
      <select required id="tole" name="tole" title="" required>
	<option value=""> </option>
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
      <select required id="erreur" name="erreur" required>
	<option value=""> </option>
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
      <select required id="proced" name="proced" required>
	<option value=""> </option>
	<option value=" - "> - </option>
	<option value="ICCMTN002">ICCMTN002</option>
      </select>
<br/>
<label>Commentaire :</label>
<textarea name="commentaire" id="comm" title="tapez votre commentaire ici"></textarea>
<!--<textarea name="commentaire" id="comm" rows="2" cols="37"title="tapez votre commentaire ici"></textarea>-->
</div>
<div id="colonne2">
<label>Résolution :</label>
       <select id="reso" required name="reso" required>
	<option value=""> </option>
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
       <select id="preci"required name="preci" title="Classe I    Précision spéciale
Classe II   Précision fine
Classe III  Précision moyenne
Classe IIII Précision ordinaire" required>
	<option value=""> </option>
	<option value="-"> - </option>
	<option value="I">I</option>
	<option value="II">II</option>
    <option value="III">III</option>
    <option value="IIII">IIII</option>
		</select>
<br/>
		Etalonnage : 
    <INPUT TYPE="radio" id="etal" NAME="etal" VALUE=Oui>Oui 
   <INPUT TYPE="radio" NAME="etal" VALUE=Non>Non
<br/>
Métrologie Légale :
    <INPUT TYPE="radio" id="legal" NAME="legal" VALUE=Oui>Oui
<INPUT TYPE="radio" NAME="legal" VALUE=Non>Non
<br/>
<label>Coefficient f :</label>
      <select required id="coef" name="coef" required>
	<option value=""> </option>
	<option value=" - "> - </option>
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="10">10</option>
	</select>
<br/>
 <br/>               
<br/>
       
<p id="buttons">
<input type="submit" value="Enregistrer" name="enregistrer">
</p>


    
    

</form>
  </div>
  </div>
  </div>
  <h3>Liste des ECME</h3>
  <div>
    <?php
include('countentreeliste.php');
?>
<div id="tabs">
  <ul>
    <li><a href="#tabs-1" title="">Liste tout  <?php echo $donnees['nombre']?></a></li>
    <li> <a href="#tabs-2" title="">Liste Identifiants  <?php echo $donnees['nombre']?></a>&nbsp;</li>
 <li><a href="#tabs-3" title="">Liste Afficheurs  <?php echo $dona['nombreaff']?> </a>&nbsp;</li>
 <!--<li><a href="#tabs-4" title="">Liste Analyseurs <?php //echo $donana['nombreana']?></a>&nbsp;</li>-->
 <li><a href="#tabs-5" title="">Liste Anoxymètre  <?php echo $donano['nombreano']?></a>&nbsp;</li>
 <li><a href="#tabs-6" title="">Liste Balances  <?php echo $donbal['nombrebal']?></a>&nbsp;</li>
 <li><a href="#tabs-7" title="">Liste Compteur  <?php echo $doncom['nombrecom']?></a>&nbsp;</li>
 <li><a href="#tabs-8" title="">Liste Détecteur de métaux  <?php echo $donmeto['nombremeto']?></a>&nbsp;</li>
 <li><a href="#tabs-9" title="">Liste Détecteur de fuite  <?php echo $donfuit['nombrefuit']?></a>&nbsp;</li>
 <li><a href="#tabs-10" title="">Liste Horloge  <?php echo $donhor['nombrehor']?></a>&nbsp;</li>
 <li><a href="#tabs-11" title="">Liste Masse  <?php echo $donmass['nombremass'] ?></a>&nbsp;</li>
 <li><a href="#tabs-12" title="">Liste Minuteur  <?php echo $donminu['nombreminu']?></a>&nbsp;</li>
 <li><a href="#tabs-13" title="">Liste Oxymètre  <?php echo $donoxy['nombreoxy']?></a>&nbsp;</li>
 <li><a href="#tabs-14" title="">Liste Sondes  <?php echo $donson['nombreson']?></a>&nbsp;</li>
 <li><a href="#tabs-15" title="">Liste Thermomètres  <?php echo $don['nombrether']?></a>&nbsp;</li>
<li><a href="#tabs-16" title="">Liste ecme en réparation  <?php echo $donrepa['nombrerepa']?></a>&nbsp;</li>
<li><a href="#tabs-17" title="">Liste ecme en étalonnage  <?php echo $donetal['nombreetal']?></a>&nbsp;</li>
<li><a href="#tabs-18" title="">Métrologie Légale  <?php echo $donlegal['nombrelegal']?></a>&nbsp;</li>
  </ul>
  <div id="tabs-1">
	  <?php include('listetout.php');?>
      </div>
  <div id="tabs-2">
	  <?php include('listeident.php');?>
      </div>
<div id="tabs-3">
	  <?php include('listeafficheur.php');?>
      </div>
<!--<div id="tabs-4">
         <?php //require_once('listeanalyseur.php');?>
      </div>  -->
<div id="tabs-5">
         <?php require_once('listeanox.php');?>
      </div>
<div id="tabs-6">
         <?php require_once('listebalance.php');?>
      </div>
<div id="tabs-7">
         <?php require_once('listecompteur.php');?>
      </div>
<div id="tabs-8">
         <?php require_once('listedetectmeto.php');?>
      </div>
<div id="tabs-9">
         <?php require_once('listedetecfuite.php');?>
      </div>
<div id="tabs-10">
         <?php require_once('listehorloge.php');?>
      </div>
<div id="tabs-11">
         <?php require_once('listemasse.php');?>
      </div>
<div id="tabs-12">
         <?php require_once('listeminuteur.php');?>
      </div>
<div id="tabs-13">
         <?php require_once('listeoxy.php');?>
      </div>
<div id="tabs-14">
         <?php require_once('listesonde.php');?>
      </div>
<div id="tabs-15">
         <?php require_once('listethermometre.php');?>
      </div>
<div id="tabs-16">
         <?php require_once('listesenrepa.php');?>
      </div>
<div id="tabs-17">
         <?php require_once('listesenetal.php');?>
      </div>
<div id="tabs-18">
         <?php require_once('listeslegal.php');?>
      </div>
	  
</div>
  </div>
  <h3>Fiche de vie <div class="container" style="margin:-23px 0px 0px 140px">
<div id="countdown" > </div>
</div></h3>
  <div id="fichedv">
<form method="post" action="fdv.php">
<label>choisir la fiche de vie :</label>
<select id="choixnum3" name="choixnum3" value="choixnum3" size="1">
<?php

//connection:
include('conn.php');
//consultation:
$reponse = $bdd->prepare('SELECT ident,design FROM liste ORDER BY ident ASC');
$reponse->execute(array());
//affiche les information:
echo '<option value=""> </option>';
while($data = $reponse->fetch())
	{	$afi2=substr($data['design'], 0, 12);
echo '<option>'.$data[ident].' '.$afi2.'</option>';
	}

?>

</select>
&nbsp;&nbsp;
<!-- creation bouton Afficher -->
<input id="buttons" type="submit" value="Afficher" name="afficher">
</form>

</div>
  <h3>Impression</h3>
  <div>
  <div id="fade">

<a href="fiche_controle_balprod.php" onMouseOver=survol("entree") onMouseOut=survol("sortie") > <input class="fade" type="button" value="Liste des Balances en Production :"></a>    DEC.PRO.002<br/>
<a href="fiche_controle_afficheur.php" > <input class="fade" type="button" value="Liste des Afficheurs à controler :"></a>    DEC.MTN.00?<br/>
<a href="fichecontrole_bal.php" > <input class="fade" type="button" value="Liste des Balances à controler :"></a>     DEC.MTN.001<br/>
<a href="fiche_controle_compt_horlo.php" > <input class="fade" type="button" value="Liste des Compteurs et Horloges à controler :"></a>     DEC.MTN.004 et DEC.MTN.002<br/>
<a href="fiche_controle_gtc.php" > <input class="fade" type="button" value="Liste des Sondes GTC à controler :"></a>     DEC.MTN.003<br/>
<a href="fiche_controle_sondes.php" > <input class="fade" type="button" value="Liste des Sondes de température à controler :"></a>     DEC.MTN.003<br/>
<a href="fiche_controle_thermometre.php" > <input class="fade" type="button" value="Liste des Thermomètres à controler :"></a>     DEC.MTN.003<br/>

<a href="fdecontrole.php" > <input class="fade" type="button" value="Fiche de contrôle :"></a>     DEC.PRO.00?<br/>
</div>
  </div>
  <h3>Déclassement ECME</h3>
  <div>
   <form method="post" action="declassement.php" onSubmit="return Demande_verification()">
<label>choisir le numéro de l'équipement à déclasser :</label>
<select id="choixnum" name="choixnum" value="choixnum"  size="1" >
<?php

//connection:
include('conn.php');
//consultation:
$reponse = $bdd->prepare('SELECT ident,design FROM liste ORDER BY ident ASC');
$reponse->execute(array());
//affiche les information:
echo '<option value=""> </option>';
while($data1 = $reponse->fetch())
	{	$afi3=substr($data1['design'], 0, 12);
echo '<option>'.$data1[ident].' '.$afi3.'</option>';
	}
?>
</select>
<label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Visa :</label>
<select required id="visa" name="visa" style="width:100px" title="Nom de la personne ayant procédé à l'opération de métrologie" required >
	<option value=""></option>
	<option value="EK">EK</option>
	<option value="YLC">YLC</option>
    <option value="LC">LC</option>
    <option value="Autre">Autre</option>
	</select>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	Date de déclassement :&nbsp;<input type="text" name="datepickerdec" class="datepicker" id="datepickerdec" required >
<br></br>	
<fieldset>
<legend>Indiquer la raison de la non conformité :</legend>
<textarea name="raison" id="raison" rows="3" cols="90" required>
</textarea>
</fieldset>
<fieldset>
<legend> Commentaire :</legend>
<textarea name="commentairedeclasse" id="commentairedeclasse" rows="3" cols="90" >
</textarea>
</fieldset>
</p>
<p id="buttons">
<input type="submit"   value="Déclasser" name="enregistrer" >
</p>
</form>
  </div>
  <h3>ECME déclassé</h3>
  <div>
  <form method="post" action="fdvdeclasser.php" >
<label>choisir le numéro a visualiser :</label>
<select id="choixnum5" name="choixnum5" value="choixnum5"  size="1" >
<?php

//connection:
include('conn.php');
//consultation:
$reponse = $bdd->prepare('SELECT ident,design FROM listedeclasser ORDER BY ident ASC');
$reponse->execute(array());
//affiche les information:
echo '<option value=""> </option>';
while($data = $reponse->fetch())
{	$afi=substr($data['design'], 0, 12);

echo '<option>'.$data[ident].' '.$afi.'</option>';
	}

?>
</select>

&nbsp;&nbsp;
<input id="buttons"type="submit" value="Visualiser" name="Visualiser">
</form>
</div> 
<h3>Modification d'un ECME</h3>
  <div>
  <form method="post" action="modif.php" >
<label>choisir le numéro d'identification de l'ECME à modifier :</label>
<select id="choixnum9" name="choixnum9" value="choixnum9"  size="1" >
<?php
//connection:
include('conn.php');
//consultation:
$reponse = $bdd->prepare('SELECT ident,design FROM liste ORDER BY ident ASC');
$reponse->execute(array());
//affiche les information:
echo '<option value=""> </option>';
while($data = $reponse->fetch())
	{	$afi4=substr($data['design'], 0, 12);
echo '<option>'.$data[ident].' '.$afi4.'</option>';
	}
?>
</select>
&nbsp;&nbsp;

<input id="buttons"type="submit" value="Visualiser" name="Visualiser">
</form>
</div>
</body>
</div>
 
<?php

//connection:
 include('conn.php');
$dateverif = $bdd->prepare('SELECT datepicker3, COUNT( * ) AS nbpre
FROM fichedevie
GROUP BY datepicker3 DESC
ORDER BY nbpre DESC
LIMIT 1');
 $dateverif->execute(array());
 while($data = $dateverif->fetch())
	{		
$source = $data[datepicker3];
$date = new DateTime($source);
	echo 'Dernière vérification le : ';echo $date->format('d m Y');}
	?>
<script type="text/javascript">  //compte a rebours

$('#countdown').timeLeft({till: '01 02 2017 03:14:07',
//$('#countdown').timeLeft({till: 'february 01, 2017 03:14:07',
//$('#countdown').timeLeft({till: '<?php $dateverif2; ?>',
format:  '<font color="orange">Prochaine Vérification dans <b>: </b><span class="badge">%M</span> mois <span class="badge">%W</span> semaine <span class="badge">%D</span> jour </font>',
});
</script>





<?php
$dossiersessions = 'sessions/';
        // Ouverture du dossier
        $ouverturedossier = opendir($dossiersessions);
        // Parcours du dossier en boucle
        while ($cookiesdesession = readdir($ouverturedossier))
        {
                // Si le fichier est un cookie de session
                if (is_file($dossiersessions.$cookiesdesession) AND eregi('^sess_[a-f0-9]{32}$', $cookiesdesession))
                {
                        // Et si sa taille est égale à zéro (session fermée)
                        $taillecookie = filesize($dossiersessions.$cookiesdesession);
                        if ($taillecookie == 0)
                        {
                                // On l'efface!
                                unlink ($dossiersessions.$cookiesdesession);
                        }
                        else
                        {
                                // Sinon on casse la boucle
                                break;
                        }
                }
        }
        // Pour terminer, on referme le dossier.
        closedir($ouverturedossier);
		?>
<footer><br/><br/><br/><br/><p align="right">&#169;<FONT size="1pt"> Eric KERIVEL 2016</FONT></p>
</footer>
</html>