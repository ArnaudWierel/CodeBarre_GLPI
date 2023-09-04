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

$codebarre = new generateur_code_barre();

if (isset($_GET["texte"])) {
   $texte = $_GET["texte"];
   $codebarre->genererEtiquette($texte);
   unset($_GET["texte"]);
}

html::header(__('CodeBarre', 'codebarre'), $_SERVER['PHP_SELF'], 'plugins', 'codebarre', 'codebarre');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Plugin CodeBarre_GLPI</title>
   <link rel="stylesheet" href="style.css">
</head>

<body>
   <div class="container">
      <h2>Bienvenue sur le plugin CodeBarre_GLPI !</h2>

      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
         <label for="texte">Entrez votre texte ici :</label>
         <input type="text" id="texte" name="texte" value="<?php echo $codebarre->get_name(); ?>" class="input-text">
         <input type="submit" value="Enregistrer" class="submit-button">
      </form>
   </div>
</body>

</html>

<?php
Html::footer();
?>