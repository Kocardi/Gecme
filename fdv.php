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
<meta charset="utf-8" />
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<!--  <script src="jquery-1.9.1.js"></script>  -->
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<!--  <script src="jquery-ui.js"></script>  -->
<link rel="stylesheet" href="jquery-ui.css" />
<link rel="stylesheet" href="mise_en_page.css" />
<link rel="stylesheet" href="printfdv.css" type="text/css" media="print" />
<script src="jquery.ui.datepicker-fr.js"></script>
<!-- <body style="background:#ADFF2F">   -->
<style>
 .imprdate{
color:#8EA336;}
</style>
<script type="text/javascript">
function imprimer_page(){
  window.print();
}
</script>
<?php
if(isset($_POST['choixnum3'])) $choixnum3=$_POST['choixnum3'];
else $choixnum3="";
//connection:
include('conn.php');
//consultation:
$reponse = $bdd->prepare('SELECT * FROM liste WHERE ident=?');
$reponse->execute(array($_POST['choixnum3']));
//display information:
while($row3 = $reponse->fetch())
{
//echo "$choixnum3";
echo '<table border WIDTH="100%"><tr><td>Marine Harvest Kriten <br/>Zone run ar puns<br/>29150 Chateaulin <img alt="" class="logo22" src="logo22.jpg" height="50" width="120"> </td><td colspan=2><table> <h2>'. $row3['design'] . '  N° : ' . $row3['ident'] .'</h2> </table></td></tr><TR><table border WIDTH="100%"><TD ROWSPAN=2><u>Identification de l\'instrument </u>
<img alt="" src="images/' . $row3['type'] . '.jpg" id="image_fdv" width="150" height="180"/>
<BR/><BR/> Numero d\'identification : <strong>' . $row3['ident'] . '</strong><BR/>Désignation : <strong>' . $row3['design'] . '</strong><BR/>Type : <strong>' . $row3['type'] . '</strong><br/>Marque : <strong>' . $row3['marq'] . '</strong><BR/>N° de série : <strong>' . $row3['ref'] . '</strong><BR/>Date de réception : <strong>' . $row3['datepicker'] . '</strong><BR/>Date de mise en service :<strong>' . $row3['datepicker2'] . '</strong><BR/></TD><TD WIDTH="30%" >Affectation : ' . $row3['affec'] . '<BR/><BR/>Service :<BR/>Responsable :</TD> <TD WIDTH="15%">Appareil<BR/>associé</TD></TR><TR><TD>Periodicité : ' . $row3['period'] . '</TD> <TD><center><FONT SIZE="2">Documentation :<BR/>DECMTN003</font></center></TD></TR></table>';
	}
  ?>
  <div>
    <table border> 
      <form method="POST" action="traitementfdv.php">
        <!--  transforme choixnum3 n°ident fdv  en choixnum4 pour utilisation dans traitement fdv -->  
        <input type="hidden" name="choixnum4" value="<?php echo $_POST['choixnum3']?>" />
        <!-- debut de tableau -->
        <table border width="100%" id="tablefdv"  >   
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
//require_once('connection.php');
//mysql_select_db("ecme");
$reponse2 = $bdd->prepare('SELECT * FROM fichedevie WHERE ident=? ORDER BY datepicker3 ASC');
$reponse2->execute(array($_POST['choixnum3']));
//$sql = mysql_query("SELECT * FROM fichedevie");
//while($donnees = mysql_fetch_array($sql))
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
   }
             ?>   
          <tr>       
            <td align=center>
              <input type="text" name="datepicker3" class="datepicker3" id="datepicker3" style="width:90%" required >	   
<script>
$(function() {
         $('[name="datepicker3"]').datepicker({ dateFormat: "dd-mm-yy" });
      });
	  </script>	  </td>       
            <td align=center>
              <select required id="naturedinter" name="naturedinter" style="width:90%" required >			
<option value=""> </option>			
<option value=" - "> -  </option>
<option value="Contrôle Ads">Contrôle Ads</option>
<option value="Contrôle Aes">Contrôle Aes</option>
<option value="Contrôle Artemis">Contrôle Artemis</option>
<option value="Contrôle Baron">Contrôle Baron</option>
<option value="Contrôle Bizerba">Contrôle Bizerba</option>
<option value="Contrôle CEIA">Contrôle CEIA</option>
<option value="Contrôle Cmi">Contrôle Cmi</option>
<option value="Contrôle Crowcon">Contrôle Crowcon</option>
<option value="Contrôle Pbi Dansensor">Contrôle Pbi Dansensor</option>
<option value="Contrôle PIO">Contrôle PIO</option>
<option value="Contrôle Testo">Contrôle Testo</option>
<option value="Départ en étalonnage">Départ en étalonnage</option>		   
<option value="Départ en réparation">Départ en réparation</option>
<option value="Mise en service">Mise en service</option>
<option value="Pas trouvé">Pas trouvé !</option>
<option value="Remplacement de la pile">Remplacement de la pile</option>
<option value="Remplacement de la sonde">Remplacement de la sonde</option>
<option value="Retour d'étalonnage">Retour d'étalonnage</option> 		   
<option value="Retour de réparation">Retour de réparation</option> 
<option value="Vérification interne">Vérification interne</option>
<option value="En Séchage">En Séchage</option>          
              </select>	   </td>       
            <td align=center>
              <select required id="refdoc" name="refdoc" style="width:90%" required >			
<option value=""> </option>			
<option value=" - "> - </option>		   
<option value="DECMTN001">DECMTN001</option>		   
<option value="Devis">Devis</option>
<option value="Document Ads">Document Ads</option>
<option value="Contrôle Ads">Document Aes</option>
<option value="Document Artemis">Document Artemis</option>	
<option value="Document Baron">Document Baron</option>
<option value="Document Bizerba">Document Bizerba</option>	   	   
<option value="Document CEIA">Document CEIA</option>
<option value="Document Cmi">Document Cmi</option>
<option value="Document Crowcon">Document Crowcon</option>
<option value="Document Pbi Dansensor">Document Pbi Dansensor</option>		   
<option value="Document PIO">Document PIO</option>	
<option value="Document Testo">Document Testo</option>
<option value="Facture">Facture</option>		               
              </select>	   </td>	   
            <td align=center>
              <select required id="resul" name="resul" style="width:90%" required >			
<option value="">  </option>			
<option value=" - "> - </option>		   
<option value="Conforme">Conforme</option>		   
<option value="Non Conforme">Non Conforme</option>           
              </select></td>	   
            <td align=center>       
              <select required id="visa" name="visa" style="width:90%" title="Nom de la personne ayant procédé à l'opération de métrologie" required >			
                <option value="">  </option>
		<option value="AM">AM</option>
		<option value="CD">CD</option>		   
                <option value="EK">EK</option>		   
                <option value="YLC">YLC</option>           
                <option value="LC">LC</option>
		<option value="SB">SB</option>
		<option value="TF">TF</option>         
                <option value="Autre">Autre</option>		
              </select>
			</td>
		</tr> 
		        </table>
		        <div>
          <br>

          <input type="submit"id="enregistrer" value="Enregistrer"   name="enregistrer"title="Sauvegarder l'intervention">
<br></br>
        <INPUT type="button" id="retour" value="Retour" onclick="history.back()"title="Retour à la page de choix des fiche de vie">
      </FORM> 
<br></br> 
      <form>  
        <input id="impression" name="impression" type="button" onclick="imprimer_page()" value="Imprimer cette page"title="Imprimer la page" />
      </form>
  </div>
  
  </div>
  <div class="imprdate">
<?php
$date = date("d-m-Y");
$heure = date("H:i");
Print("Imprimé le $date à $heure");
?>
</div>
<!--     </form>
      <A href="javascript:history.back()"></A>
      <FORM> -->
