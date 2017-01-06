<meta charset="utf-8" />
<script src="jquery-1.9.1.js"></script>
<script src="jquery-ui.js"></script>
<link rel="stylesheet" href="jquery-ui.css" />
<link rel="stylesheet" href="mise_en_page.css" />
<link rel="stylesheet" href="printfdv.css" type="text/css" media="print" />
<script src="jquery.ui.datepicker-fr.js"></script>
<!--<body style="background:#499371">-->
<body style="background-image:url(images/declasse.gif);">
<script type="text/javascript">
function imprimer_page(){
  window.print();
}
</script>
<?php
if(isset($_POST['choixnum5'])) $choixnum3=$_POST['choixnum5'];
else $choixnum5="";
//connection:
include('conn.php');
//consultation:
$reponse = $bdd->prepare('SELECT * FROM listedeclasser WHERE ident=?');
$reponse->execute(array($_POST['choixnum5']));
//affiche les information:
while($row3 = $reponse->fetch())
{
echo '<table border WIDTH="100%"><tr><td>Marine Harvest Kriten <br/>Zone run ar puns<br/>29150 Chateaulin <img class="logo22" src="logo22.jpg" height="50" width="120"> </td><td colspan=2><table> <h2>'. $row3['design'] . '  N° : ' . $row3['ident'] .'</h2> </table></td></tr><TR><table border WIDTH="100%"><TD ROWSPAN=2>Identification de l\'instrument <img src="images/' . $row3['type'] . '.jpg" id="image_fdv_dec" width="150" height="180"/><BR/><BR/> Numero d\'identification : ' . $row3['ident'] . '<BR/>Désignation : ' . $row3['design'] . '<BR/>Type : ' . $row3['type'] . '<br/>Marque : ' . $row3['marq'] . '<BR/>N° de série : ' . $row3['ref'] . '<BR/>Date de réception : ' . $row3['datepicker'] . '<BR/>Date de mise en service : ' . $row3['datepicker2'] . '<BR/></TD><TD WIDTH="30%" >Affectation : ' . $row3['affec'] . '<BR/><BR/>Service :<BR/>Responsable :</TD> <TD WIDTH="15%">Appareil<BR/>associé</TD></TR><TR><TD>Periodicité : ' . $row3['period'] . '</TD> <TD><FONT SIZE="2">Documentation :<BR/>DECMTN003</font></TD></TR></table>';
	}
  ?>
  <div>
    <table border> 
      <form method="POST" action="traitementfdv.php">  
        <!--  transforme choixnum5 n°ident fdv  en choixnum6 pour utilisation dans traitement fdv -->   
        <input type="hidden" name="choixnum6" value="<?php echo $_POST['choixnum5']?>" />
        <!-- debut de tableau -->
        <table border width="100%" id="tablefdvde" >   
          <tr>       
            <th width=200>Date
            </th>       
            <th width=300>Nature d'intervention
            </th>       
            <th width=300>Référence du document
            </th>	   
            <th width=200>Résultat
            </th>	   
            <th width=100>Visa
            </th>   
          </tr>       
&nbsp;<?php
$reponse2 = $bdd->prepare('SELECT * FROM fichedeviedeclasser WHERE ident=? ORDER BY datepicker3 ASC');
$reponse2->execute(array($_POST['choixnum5']));
while($donnees = $reponse2->fetch())
{
         ?>         
          <tr>     
            <td align=center>
              <?php echo date("d-m-Y",strtotime($donnees['datepicker3'])); ?></td>	   <td>
              <?php echo $donnees['naturedinter'];?></td>       <td>
              <?php echo $donnees['refdoc'];?></td>	   <td>
              <?php echo $donnees['resul'];?></td>	   
            <td align=center>
              <?php echo $donnees['visa'];?></td>   
          </tr>    
<?php
	$numident = ($donnees['ident']);
  // }
             ?>      
<?php
    }
            ?>    
        </table>
        <div>
      </form>
<?php
$reponse3 = $bdd->prepare('SELECT * FROM fichedeviedeclasser WHERE ident=? ORDER BY datepicker3 DESC');
$reponse3->execute(array($_POST['choixnum5']));
while($donnees2 = $reponse3->fetch())
{?>
	   <div id="commentaire_declasser">
	   <?php echo $donnees2['raison'];?>
	   <?php echo $donnees2['commentairedeclasse'];?></div><?php
      }
        ?><br>
		</div>
	
      <A href="javascript:history.back()"></A>
      <FORM>
        <INPUT type="button" id="retour" value="Retour" onclick="history.back()"title="Retour à la page de choix des fiche de vie">
      </FORM>  
      <form>  
        <input id="impression" name="impression" type="button" onclick="imprimer_page()" value="Imprimer cette page"title="Imprimer la page" />
      </form>
  
  </div>
