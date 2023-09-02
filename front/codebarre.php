<?php
/*
   █████████               █████          ███████████                                                     █████████  ████             ███ 
  ███░░░░░███             ░░███          ░░███░░░░░███                                                   ███░░░░░███░░███            ░░░  
 ███     ░░░   ██████   ███████   ██████  ░███    ░███  ██████   ████████  ████████   ██████            ███     ░░░  ░███  ████████  ████ 
░███          ███░░███ ███░░███  ███░░███ ░██████████  ░░░░░███ ░░███░░███░░███░░███ ███░░███          ░███          ░███ ░░███░░███░░███ 
░███         ░███ ░███░███ ░███ ░███████  ░███░░░░░███ ███░░███  ░███ ░░░  ░███ ░░░ ░███████           ░███    █████ ░███  ░███ ░███ ░███ 
░░███     ███░███ ░███░███ ░███ ░███░░░   ░███    ░███░███ ░███  ░███      ░███     ░███░░░            ░░███  ░░███  ░███  ░███ ░███ ░███ 
 ░░█████████ ░░██████ ░░████████░░██████  ███████████ ░░████████ █████     █████    ░░██████  █████████ ░░█████████  █████ ░███████  █████
  ░░░░░░░░░   ░░░░░░   ░░░░░░░░  ░░░░░░  ░░░░░░░░░░░   ░░░░░░░░ ░░░░░     ░░░░░      ░░░░░░  ░░░░░░░░░   ░░░░░░░░░  ░░░░░  ░███░░░  ░░░░░ 
                                                                                                                           ░███           
                                                                                                                           █████          
                                                                                                                          ░░░░░       
                                        Version 1.0.0 by Snayto (Arnaud WIEREL) @2023
*/

// Include necessary files
include_once('../../../inc/includes.php');
include_once('../inc/codebarre_glpi.class.php');
include_once('../inc/generateur_code_barre.class.php');

html::header(__('CodeBarre', 'codebarre'), $_SERVER['PHP_SELF'], 'plugins', 'codebarre', 'codebarre');

echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>';
echo '<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">';
echo '<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>';

echo '<div class="center">';
echo '<h2>' . __('Bienvenue sur le plugin CodeBarre_GLPI !', 'codebarre') . '</h2>';

echo '<form action="' . $_SERVER['PHP_SELF'] . '" method="get">';
echo '<label for="texte">Entrez votre texte ici :</label>';
echo '<input type="text" id="texte" name="texte">';
echo '<input type="submit" value="Enregistrer">';
echo '</form>';

echo '</div>';



if (isset($_GET["texte"])) {
   $texte = $_GET["texte"];
   echo "Le texte passé en paramètre est : " . $texte;
}

echo '</div>';

Html::footer();
?>