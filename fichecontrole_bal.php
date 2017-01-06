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
#photos{
float:right;
margin-top: -3%;
margin-right:18%;
}
</style>
<body>
<?php


//connection:
include('conn.php');

//consultation: recup des balance dans la base
$reponse = $bdd->query('SELECT * FROM liste WHERE design ="Balance" ORDER BY ident ASC');

//display information:
while($rowb = $reponse->fetch())

{
// garde uniquement les chiffres dans etend
$resultat=@preg_replace('/[^0123456789]/','',$rowb[etend]);

?>
<FORM>
        <INPUT type="button" id="retour" value="Retour" onclick="history.back()"title="Retour à la page impression">
      </FORM>
	  <form>  
        <input id="impression" name="impression" type="button" onclick="imprimer_page()" value="Imprimer les pages"title="Imprimer toutes les pages" />
      </form>
<TABLE BORDER="1" WIDTH="100%" style="background:aliceblue"> 
  
  <TR> 
 <TH WIDTH="85%"><div id="tete">
 <IMG id="logo3" class="logo3"SRC="images/logo3.jpg"  />
	<h2>Constat de vérification semestriel des Balances</h2>
	<div id="tete2">
	<a>Classement : Maintenance</a><br>
	<a>Stockage : 5ans</a>
	</div>
</div>	
</TH> 
 <TH WIDTH="19%">
	<h4 align="center"><a>Kritsen Chateaulin<a></h4>
	&nbsp;&nbsp;<a>DECMTN001</a><br>
	&nbsp;&nbsp;<a>Indice de révision : E</a>
 </TH> 
   </TR> 
  </TABLE>
<br>
<div id="aremp" name="aremp">

&nbsp;&nbsp;<a>Date :_____/_____/_____  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Nom du vérificateur:__________</a><BR>
&nbsp;&nbsp;<a>Marque : </a><b> <?php echo "$rowb[marq]";?></b><BR>
&nbsp;&nbsp;<a>N° de référence : </a><b> <?php echo "$rowb[ref]";?></b><BR>
&nbsp;&nbsp;<a>N° d'identification : </a> <b><?php echo "$rowb[ident]";?></b>
<?php $photos= '<img src="images/' . $rowb['type'] . '.jpg" id="photos" width="210" height="180" />';?>

<h3><U>1/ Vérification de la justesse de la balance:</u></h3>
</div>
<?php
$reponsew = $bdd->prepare('SELECT * FROM etendue WHERE et_1 =?');
$reponsew->execute(array($resultat));


//display information:
while($roww = $reponsew->fetch())
{
?>
<div id="tabgene" name="tabgene">
<TABLE BORDER="1" WIDTH="100%" style="background:aliceblue"> 
<label> Mesure croissante </label> 
<TR> 
<TH WIDTH="19%">  Masses étalons </TH> 
<TH WIDTH="15%"> <?php echo "$roww[et_2]"; ?> </TH> 
<TH WIDTH="15%"> <?php echo "$roww[et_3]"; ?> </TH> 
<TH WIDTH="15%"> <?php echo "$roww[et_4]"; ?> </TH> 
<TH WIDTH="15%"> <?php echo "$roww[et_5]"; ?> </TH>
<TH WIDTH="15%"> <?php echo "$roww[et_6]"; ?> </TH>
</TR> 
<TR> 
<TH > Réference étalons </TH> 
<TD style="font-size:80%;" align="center"> <?php include('ifpoids_et2.php'); ?> </TD> 
<TD style="font-size:80%;" align="center" > <?php include('ifpoids_et3.php'); ?></TD> 
<TD style="font-size:80%;" align="center"> <?php include('ifpoids_et4.php'); ?> </TD>
<TD style="font-size:80%;" align="center" > <?php include('ifpoids_et5.php'); ?> </TD>
<TD style="font-size:70%;" align="center"> <?php include('ifpoids_et6.php'); ?> </TD>
</TR> 
<TR> 
<TH> EMT <br><a id=petit> Erreur Maximale Toléré</a></TH> 
<TD align="center"> 2g </TD> 
<TD align="center"> 2g </TD> 
<TD align="center"> 4g </TD>
<TD align="center"> 4g </TD>
<TD align="center"> 6g </TD>
</TR>
<TR> 
<TH> Mesures </TH> 
<TD align="right"> g </TD> 
<TD align="right"> g </TD> 
<TD align="right"> g </TD>
<TD align="right"> g </TD>
<TD align="right"> g </TD>
</TR>
</TABLE> 
<br>
<TABLE BORDER="1" WIDTH="100%" style="background:aliceblue"> 
<label> Mesure Décroissante </label> 
<TR> 
<TH WIDTH="15%"> Masses étalons </TH> 
<TH WIDTH="15%"> <?php echo "$roww[et_6]"; ?> </TH> 
<TH WIDTH="15%"> <?php echo "$roww[et_5]"; ?> </TH> 
<TH WIDTH="15%"> <?php echo "$roww[et_4]"; ?> </TH> 
<TH WIDTH="15%"> <?php echo "$roww[et_3]"; ?> </TH>
<TH WIDTH="15%"> <?php echo "$roww[et_2]"; ?> </TH>
</TR> 
<TR> 
<TH> Mesures</TH> 
<TD align="right"> g </TD> 
<TD align="right"> g </TD> 
<TD align="right"> g </TD>
<TD align="right"> g </TD>
<TD align="right"> g </TD>
</TR>
</table>
Résultat de la vérification de la justesse: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <INPUT type="checkbox" name="choix1" value="1"> Conforme  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <INPUT type="checkbox" name="choix2" value="2"> Non Conforme

<br>
<h3> <U>2/ Vérification de l'excentration de charge:</u></h3>
<TABLE class="excentration" BORDER="1" bordercolor="grey"> 
    <TR> 
 <TH WIDTH="20px"> 1 </TH> 
 <TH WIDTH="20px"> 2 </TH> 
   </TR> 
  <TR> 
 <TH WIDTH="20px"> 3 </TH> 
 <TH WIDTH="20px"> 4 </TH> 
   </TR> 
</TABLE> 
<TABLE BORDER="1" WIDTH="70%" style="background:aliceblue"> 
<TR> 
<TH WIDTH="20%"> Position masses </TH> 
<TH WIDTH="16%"> 1 </TH> 
<TH WIDTH="16%"> 2 </TH> 
<TH WIDTH="16%"> 3 </TH> 
<TH WIDTH="16%"> 4 </TH>
</TR> 
<TR> 
<TH> Mesures</TH> 
<TD align="right"> g </TD> 
<TD align="right"> g </TD> 
<TD align="right"> g </TD>
<TD align="right"> g </TD>
</TR>
</table>
Résultat de la vérification de l'excentration de charge: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <INPUT type="checkbox" name="choix1" value="1"> Conforme  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <INPUT type="checkbox" name="choix2" value="2"> Non Conforme
<h3> <U>3/ Vérification de la fidélité de la balance:</u></h3>
<?php echo $photos?>
<TABLE BORDER="1" WIDTH="50%" style="background:aliceblue"> 
<TR> 
<TH WIDTH="15%">  </TH> 
<TH WIDTH="20%"> Masse <?php echo "$roww[et_4]"; ?> référence <?php include('ifpoids_et4.php'); ?> </TH> 
</TR> 
<TR> 
<TH> Mesure N°1</TH> 
<TD align="right"> g </TD> 
</TR>
<TR> 
<TH> Mesure N°2</TH> 
<TD align="right"> g </TD> 
</TR>
<TR> 
<TH> Mesure N°3</TH> 
<TD align="right"> g </TD> 
 
<TR> 
<TH> EMT<br><a id=petit> Erreur Maximale Toléré</a></TH> 
<TD align="center"> +/- 5g </TD> 
</TR>
</table>
Résultat de la vérification de la fidélité de la balance: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <INPUT type="checkbox" name="choix1" value="1"> Conforme  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <INPUT type="checkbox" name="choix2" value="2"> Non Conforme
</div>
<br>
<table BORDER="1" WIDTH="70%" align="center" style="background:aliceblue">
<TR>
<TH>
	<h2>Résultat de la vérification de la Balances</h2>
	 <h2><INPUT type="checkbox" name="choix1" value="1"> Conforme  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <INPUT type="checkbox" name="choix2" value="2"> Non Conforme</h2>
</TH>
</TR>
</table>
<HR SIZE=+7 WIDTH=80% color=grey>
<?php	
}
?>
<?php	
}
?>
<!-- saut de page pour l'impression  -->
<p style="page-break-before:always">
<form>
  <input id="imprim" name="impression" type="button" onclick="imprimer_page()" value="Imprimer" />
</form>
</body>
