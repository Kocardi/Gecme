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

<?php 
require_once('conn.php');
?>
<table width="100%"><tr>
<th width="7%">&nbsp;</th>
<th width="7%">&nbsp;</th>
<th width="7%">&nbsp;</th>
<th width="7%">&nbsp;</th>
<th width="7%">&nbsp;</th>
<th width="7%">&nbsp;</th>
<th width="7%">&nbsp;</th>
<th width="7%">&nbsp;</th>
<th width="7%">&nbsp;</th>
<th width="7%">&nbsp;</th>
<th width="7%">&nbsp;</th>
<th width="7%">&nbsp;</th>
<th width="7%">&nbsp;</th>
<th width="7%">&nbsp;</th>
</tr>
<?php
$cpt=0;
$nbCols=14;
$sql = $bdd->query('select ident,design from liste order by design ,ident asc');// exécution de la requête
// Nota : on pourrait tout aussi bien parcourir les éléments d'un tableau ou les fichiers d'un dossier
echo '<form method="POST" action="traitementliste.php">';

while($row=$sql->fetch()){// parcours des résultats
$tabActivite = explode(',', ' <input type="checkbox" name="identliste[]" value="'.$row['ident'].'">'.$row['ident'].''); // construit le tableau d'activités
$afi=substr($row['design'], 0, 4); // retourne les 4 premiere lettes de designation

foreach($tabActivite as $activite) { // on parcours le tableau

// début d'une ligne
if ($cpt%$nbCols==0) // on divise le nb d'élément par le nb de colonnes. Si le reste est de 0 ...
echo '<tr>'; // ..., alors on est sur le premier élément d'une ligne

// On place chaque élément dans une cellule du tableau
echo '<td>';
echo '<li>'.$activite.' '.$afi.'</li>'; // affichage de tout ce qu'on veut dans la cellule
echo '</td>';

// fin d'une ligne
if ($cpt%$nbCols==($nbCols-1)) // on divise le nb d'élément par le nb de colonnes. Si le reste est de ($nbCols-1) ...
echo '</tr>'; // ..., on est sur le dernier élément d'une ligne

$cpt++; // on incrémente le compteur pour savoir où on en est
}
$identliste = $row['ident'];
}
?>
</tr>
</table>

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
 <option value="Vérification interne">Vérification interne</option>
             </select>	   </td>       
            <td align=center>
              <select required id="refdoc" name="refdoc" style="width:90%" required >			
<option value="DECMTN001">DECMTN001</option>		   
              </select>	   </td>	   
            <td align=center>
              <select required id="resul" name="resul" style="width:90%" required >			
<option value="Conforme">Conforme</option>		   
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
        
      </FORM> 
	  <input type="button" value="Retour Accueil" onclick="javascript:document.location.replace('index2.php' )">
<br></br>       
  </div>  
  </div>