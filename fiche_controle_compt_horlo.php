<html>
<head>
<link rel="stylesheet" href="printfiche.css" type="text/css" media="print" />
<meta charset="utf-8"/>

</head>
<script type="text/javascript">
function imprimer_page(){
  window.print();
}
</script>
<body bgcolor='#9acd88'>
<style type="text/css">
body{
margin-left:2%;
}
#logo3{
margin-top:-10px;
float:right;
width:160;
height:90;
}
#tete{
text-align:center;
}
#tete2{
text-align:left;
}
#imprim{
position:absolue;
}
#petit{
font-size:10px;
}
.excentration{
float:right;
margin-right:4%;
margin-top: -2%;
}
h3{
margin-left:-1%;
}
#photos{
float:right;
margin-top: -3%;
margin-right:18%;
}
</style>
<body>

<TABLE BORDER="1" WIDTH="100%" style="background:aliceblue"> 
  
  <TR> 
 <TH WIDTH="85%"><div id="tete">
 <IMG id="logo3" class="logo3"SRC="images/logo3.jpg"  />
	<h2>Constat de vérification semestriel des Compteurs</h2>
	<div id="tete2">
	<a>Classement : Maintenance</a><br>
	<a>Stockage : 2ans</a>
	</div>
</div>	
</TH> 
 <TH WIDTH="19%">
	<h4 align="center"><a>Kritsen Chateaulin<a></h4>
	&nbsp;&nbsp;<a>DEC.MTN.004</a><br>
	&nbsp;&nbsp;<a>Indice de révision:E</a>
 </TH> 
   </TR> 
  </TABLE><br>
  &nbsp;&nbsp;<a>Date :_____/_____/_____  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Nom du vérificateur:__________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Identification du thermomètre étalon :___________</a><BR>
<br>
  <?php

// garde uniquement les chiffres dans etend
$resultat=@preg_replace('/[^0123456789]/','',$rows[etend]);

?>
<TABLE BORDER WIDTH="100%">
          <TR>
             <TH>Description de l'instrument à vérifier</TH>
			 <TH>Référence</TH>
             <TH>Localisation</TH>
			 <TH>Atelier</TH>
			 <TH>Valeur du Compteur</TH>
			 <TH>Poids mesuré</TH>
			 <TH>Ecart de mesure</TH>
			 <TH>Ecart toléré</TH>
			 <TH>Resultat (C/NC)</TH>
			 <TH>Action</TH>
          </TR>
<?php		  
	//connection:
include('conn.php');

//consultation: recup des balance dans la base
$reponse = $bdd->query('SELECT * FROM liste WHERE design ="Compteur"');

//display information:
while($rows = $reponse->fetch())
{	  ?>
    <TR>
        <TD width="15%" align="center"><?php echo "$rows[design]"," N°","$rows[ident]";?></TD>
		<TD><?php echo "$rows[type]";?></TD>
        <TD><?php echo "$rows[affec]";?></TD>
			 <!--<TD align="center" >P2</TD>-->
		<TD align="center" ><?php if("$rows[affec]"=="Cutterage"or"$rows[affec]"=="Décors"or"$rows[affec]"=="Fabrication"or"$rows[affec]"=="Dosage"or"$rows[affec]"=="Epices"or"$rows[affec]"=="P1"or"$rows[affec]"=="Quai réception"){echo"P1";}elseif("$rows[affec]"=="Caisson -12°C"or"$rows[affec]"=="Caisson de Congélation"or"$rows[affec]"=="Caisson Exterieur N°1"or"$rows[affec]"=="Caisson Exterieur N°2"or"$rows[affec]"=="Expédition"or"$rows[affec]"=="Fours"or"$rows[affec]"=="Ligne allumettes"or"$rows[affec]"=="Ligne Tranchettes"or"$rows[affec]"=="P2"or"$rows[affec]"=="Tranchage"or"$rows[affec]"=="Cuisson"){echo"P2";}else{echo " ";}?></TD>
        <TD><?php echo "&nbsp;";?></TD>
		<TD><?php echo "&nbsp;";?></TD>
        <TD><?php echo "&nbsp;";?></TD>
        <TD width="80px" align="center">+/- 0,5 L</TD>
		<TD width="5%" ><?php echo "&nbsp;";?></TD>
        <TD width="20%"><?php echo "&nbsp;";?></TD>
    </TR>
  <?php	
}
?>        
        </TABLE>

<TABLE BORDER="1" WIDTH="100%" style="background:aliceblue"> 
  <BR>
  <TR> 
 <TH WIDTH="85%"><div id="tete">
 <IMG id="logo3" class="logo3"SRC="images/logo3.jpg"  />
	<h2>Constat de vérification semestriel des Horloges et Minuteurs</h2>
	<div id="tete2">
	<a>Classement : Maintenance</a><br>
	<a>Stockage : 2ans</a>
	</div>
</div>	
</TH> 
 <TH WIDTH="19%">
	<h4 align="center"><a>Kritsen Chateaulin<a></h4>
	&nbsp;&nbsp;<a>DEC.MTN.002</a><br>
	&nbsp;&nbsp;<a>Indice de révision:E</a>
 </TH> 
   </TR> 
  </TABLE><br>
  &nbsp;&nbsp;<a>Date :_____/_____/_____  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Nom du vérificateur:__________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Identification du thermomètre étalon :___________</a><BR>
<br>
  <?php

// garde uniquement les chiffres dans etend
$resultat=@preg_replace('/[^0123456789]/','',$rows[etend]);
?>
<TABLE BORDER WIDTH="100%">
          <TR>
             <TH>Description de l'instrument à vérifier</TH>
			 <TH>Référence</TH>
             <TH>Localisation</TH>
			 <TH>Erreur Max tolérée</TH>
			 <TH>Horloge parlante</TH>
			 <TH>Heure Horloge contrôlée</TH>
			 <TH>Ecart toléré</TH>
			 <TH>Resultat (C/NC)</TH>
			 <TH>Action</TH>
          </TR>
<?php		  
	//connection:
include('conn.php');

//consultation: recup des balance dans la base
$reponse = $bdd->query('SELECT * FROM liste WHERE design IN ( "Minuteur", "Horloge" )');

//display information:
while($rows5 = $reponse->fetch())

{	  ?>		  
    <TR>
        <TD width="15%" align="center"><?php echo "$rows5[design]"," N°","$rows5[ident]";?></TD>
		<TD><?php echo "$rows5[type]";?></TD>
        <TD><?php echo "$rows5[affec]";?></TD>
		<TD align="center" ><?php echo "2 min";?></TD>
		<TD><?php echo "&nbsp;";?></TD>
		<TD><?php echo "&nbsp;";?></TD>
        <TD width="80px" align="center">+/- 1 min</TD>
		<TD width="5%"><?php echo "&nbsp;";?></TD>
        <TD width="20%"><?php echo "&nbsp;";?></TD>
    </TR>
  <?php	
}
?>        
        </TABLE>
<FORM>
        <INPUT type="button" id="retour" value="Retour" onclick="history.back()"title="Retour à la page impression">
      </FORM>
	  <form>  
        <input id="impression" name="impression" type="button" onclick="imprimer_page()" value="Imprimer les pages"title="Imprimer toutes les pages" />
      </form>
</body>
</html>