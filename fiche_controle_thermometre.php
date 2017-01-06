<link rel="stylesheet" href="print.css" type="text/css" media="print" />
<meta charset="utf-8"/>

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
#photost{
float:right;
margin-top: -3%;
margin-right:0%;
}
#tablet{
font-size:86%;"
</style>
<body>
<TABLE BORDER="1" WIDTH="100%" style="background:aliceblue">   
  <TR> 
 <TH WIDTH="85%"><div id="tete">
 <IMG id="logo3" class="logo3"SRC="images/logo3.jpg"  />
	<h2>Constat de vérification semestriel des Thermomètres</h2>
	<div id="tete2">
	<a>Classement : Maintenance</a><br>
	<a>Stockage : 2ans</a>
	</div>
</div>	
</TH> 
 <TH WIDTH="19%">
	<h4 align="center"><a>Kritsen Chateaulin<a></h4>
	&nbsp;&nbsp;<a>DEC.MTN.003</a><br>
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
<TABLE id="tablet"  BORDER>
          <TR>
             <TH>Description de l'instrument à vérifier</TH>
             <TH>Numéro d'identification</TH>
             <TH>Représentation</TH>
			 <TH>Atelier</TH>
			 <TH>Température de vérification</TH>
			 <TH>Tolérence (°C) température de vérification</TH>
			 <TH>Température mesurée T1</TH>
			 <TH>Température de l'étalon T2</TH>
			 <TH>Ecart toléré</TH>
			 <TH>Ecart mesuré T1-T2</TH>
			 <TH>Resultat (C/NC)</TH>
			 <TH>Action</TH>
          </TR>
<?php		  
	//connection:
include('conn.php');

//consultation: recup des balance dans la base
$reponse = $bdd->query('SELECT * FROM liste WHERE design ="Thermomètre"');

//display information:
while($rows = $reponse->fetch())

{	  ?>		  
          <TR>
             
			 <td rowspan=3><?php echo "$rows[marq]<br>$rows[type]<br>$rows[ref]";?></td>
             <td rowspan=3 align="center"><?php echo "$rows[ident]";?></TD>
             <TD rowspan=3><?php echo '<img src="images/' . $rows['type'] . '.jpg" id="photost" width="90" height="80" />';?></TD>
			 <td rowspan=3 align="center" ><?php echo "$rows[affec]";?></TD>
             <TD>Température à 0°C</TD>
             <TD align="center">+/- 5°C</TD>
			 <TD><?php echo "&nbsp;";?></TD>
             <TD><?php echo "&nbsp;";?></TD>
             <TD align="center">+/- 0,5°C</TD>
			 <TD><?php echo "&nbsp;";?></TD>
             <TD><?php echo "&nbsp;";?></TD>
             <TD><?php echo "&nbsp;";?></TD>
          </TR>
		  <TR>			 
             <TD>Température à -20°C</TD>
             <TD align="center">+/- 5°C</TD>
			 <TD><?php echo "&nbsp;";?></TD>
             <TD><?php echo "&nbsp;";?></TD>
             <TD align="center">+/- 0,5°C</TD>
			 <TD><?php echo "&nbsp;";?></TD>
             <TD><?php echo "&nbsp;";?></TD>
             <TD><?php echo "&nbsp;";?></TD>
          </TR>
		  <TR>			 
             <TD>Température à 85°C</TD>
             <TD align="center" >+/- 5°C</TD>
			 <TD><?php echo "&nbsp;";?></TD>
             <TD><?php echo "&nbsp;";?></TD>
             <TD align="center">+/- 0,5°C</TD>
			 <TD><?php echo "&nbsp;";?></TD>
             <TD><?php echo "&nbsp;";?></TD>
             <TD><?php echo "&nbsp;";?></TD>
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
<br>
<div id="aremp" name="aremp">

<?php $photos= '<img src="images/' . $rows['type'] . '.jpg" id="photos" width="210" height="180" />';?>
</body>