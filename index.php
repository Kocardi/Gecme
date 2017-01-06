<?php
  // Definition des constantes et variables
  define('LOGIN','Kritsenmtn');
    define('PASSWORD','Kritsen123');
  $errorMessage = '';
 
  // Test de l'envoi du formulaire
  if(!empty($_POST)) 
  {
    // Les identifiants sont transmis ?
    if(!empty($_POST['login'])  && !empty($_POST['password'])) 
    {
      // Sont-ils les mêmes que les constantes ?
      if($_POST['login'] !== LOGIN ) 
      {
        $errorMessage = 'Connexion au serveur impossible ! !';
      }
        elseif($_POST['password'] !== PASSWORD) 
      {  
        $errorMessage = 'Connexion au serveur impossible !';
      }
        else
      {
        // On ouvre la session
        session_start();
        // On enregistre le login en session
        $_SESSION['login'] = LOGIN ;
        // On redirige vers le fichier admin.php
        header('Location:/index2.php');
        exit();
      }
    }
      else
    {
      $errorMessage = 'Veuillez inscrire vos identifiants svp !';
    }
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
  <head>
    <title>Gecme&reg;</title>
  </head>
  <style type="text/css">body{background-color:#8EA336;} #boutoncon{margin-left:70px; background-color:silver;} #identi{margin-top:10px;}</style>
  <body onload="document.getElementById('login').focus()">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post"><BR/><BR/>
      <fieldset style="border:solid 2px #43500C; padding:20px; margin-left:auto; margin-right:auto; width:250px; color:#43500C; background-color:#DFF57F;">
        <legend id="identi">Identifiez-vous</legend>
        <?php
          // Rencontre-t-on une erreur ?
          if(!empty($errorMessage)) 
          {
            echo '<p>', htmlspecialchars($errorMessage) ,'</p>';
          }
        ?>
       <p>
          <label for="login">Identifiant :</label> 
          <input type="text" name="login" id="login" value="" />
        </p>
        <p>
          <label for="password">Mot de passe :</label> 
          <input type="password" name="password" id="password" value="" /> <BR/><BR/>
          <input type="submit" name="submit" id="boutoncon" value="Connexion ..." />
        </p>
      </fieldset>
    </form>
  </body>
</html>