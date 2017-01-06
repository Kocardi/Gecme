<?php
if(isset($_POST['type'])) $type=$_POST['type'];
else $type="";
//if (!empty($_POST['InsererNews']))
	if (!empty($_FILES['ImageNews']))

{

        $ListeExtension = array('jpg' => 'image/jpeg', 'jpeg'=>'image/jpeg');

        $ListeExtensionIE = array('jpg' => 'image/pjpeg', 'jpeg'=>'image/pjpeg');

        if (!empty($_FILES['ImageNews']))

        {
               

                if ($_FILES['ImageNews']['error'] <= 0)

                {

                        if ($_FILES['ImageNews']['size'] <= 2097152)

                        {

                            $ImageNews = $_FILES['ImageNews']['name'];

 

                            $ExtensionPresumee = explode('.', $ImageNews);

                            $ExtensionPresumee = strtolower($ExtensionPresumee[count($ExtensionPresumee)-1]);

                            if ($ExtensionPresumee == 'jpg' || $ExtensionPresumee == 'jpeg')

                            {

                              $ImageNews = getimagesize($_FILES['ImageNews']['tmp_name']);

                              if($ImageNews['mime'] == $ListeExtension[$ExtensionPresumee]  || $ImageNews['mime'] == $ListeExtensionIE[$ExtensionPresumee])

{

 

                                              $ImageChoisie = imagecreatefromjpeg($_FILES['ImageNews']['tmp_name']);

                                              $TailleImageChoisie = getimagesize($_FILES['ImageNews']['tmp_name']);

                                              $NouvelleLargeur = 150; //Largeur choisie à 350 px mais modifiable

 

                                              $NouvelleHauteur = ( ($TailleImageChoisie[1] * (($NouvelleLargeur)/$TailleImageChoisie[0])) );

 

                                              $NouvelleImage = imagecreatetruecolor($NouvelleLargeur , $NouvelleHauteur) or die ("Erreur");

 

                                              imagecopyresampled($NouvelleImage , $ImageChoisie  , 0,0, 0,0, $NouvelleLargeur, $NouvelleHauteur, $TailleImageChoisie[0],$TailleImageChoisie[1]);

                                              imagedestroy($ImageChoisie);

                                              //$NomImageChoisie = explode('.', $ImageNews);
											  //$NomImageChoisie = explode('.', $_FILES['ImageNews']['name']);

                                              $NomImageExploitable = $type;
											                                              

                                              imagejpeg($NouvelleImage , 'images/'.$NomImageExploitable.'.'.$ExtensionPresumee, 100);

                                                                                            
                                        }

                                        else

                                        {

                                                echo 'Le type MIME de l\'image n\'est pas bon';

                                        }

                                }

                                else

                                {

                                        echo 'L\'extension choisie pour l\'image est incorrecte';

                                }

                        }

                        else

                        {

                                echo 'L\'image est trop lourde';

                        }

                }

                else

                {

                        echo 'Erreur lors de l\'upload image';

                }

        }

        else

        {

                echo 'sélectionner une image';

        }

}

?>