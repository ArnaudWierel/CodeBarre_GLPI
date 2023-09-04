<?php
/*
   █████████               █████          ███████████                                                     █████████  ████             ███ 
  ███░░░░░███             ░░███          ░░███░░░░░███                                                   ███░░░░░███░░███            ░░░  
 ███     ░░░   ██████   ███████   ██████  ░███    ░███  ██████   ████████  ████████   ██████            ███     ░░░  ░███  ████████  ████ 
░███          ███░░███ ███░░███  ███░░███ ░██████████  ░░░░░███ ░░███░░███░░███░░███ ███░░███          ░███          ░███ ░░███░░███░░███ 
░███         ░███ ░███░███ ░███ ░███████  ░███░░░░░███  ███████  ░███ ░░░  ░███ ░░░ ░███████           ░███    █████ ░███  ░███ ░███ ░███ 
░░███     ███░███ ░███░███ ░███ ░███░░░   ░███    ░███ ███░░███  ░███      ░███     ░███░░░            ░░███  ░░███  ░███  ░███ ░███ ░███ 
 ░░█████████ ░░██████ ░░████████░░██████  ███████████ ░░████████ █████     █████    ░░██████  █████████ ░░█████████  █████ ░███████  █████
  ░░░░░░░░░   ░░░░░░   ░░░░░░░░  ░░░░░░  ░░░░░░░░░░░   ░░░░░░░░ ░░░░░     ░░░░░      ░░░░░░  ░░░░░░░░░   ░░░░░░░░░  ░░░░░  ░███░░░  ░░░░░ 
                                                                                                                           ░███           
                                                                                                                           █████          
                                                                                                                          ░░░░░       
                                        Version 1.0.0 by Snayto (Arnaud WIEREL) @2023
*/

// Include necessary files
include_once('../../../inc/includes.php');

if (!extension_loaded('gd')) {
    die('La bibliothèque GD n\'est pas disponible.');
}

require '../vendor/autoload.php'; // Inclure l'autoloader de Composer

use Picqer\Barcode\BarcodeGeneratorPNG;

if (!defined('GLPI_ROOT')) {
    die("Sorry. You can't access this file directly");
}

class generateur_code_barre
{
    private $name;

    function __construct()
    {
    }
    // Function to retrieve the form post and generate the barcode
    function generate_code_barre($name)
    {
        $this->name = $name;
    }

    function get_name()
    {
        return $this->name;
    }

    function genererEtiquette($nom)
    {
        // Dimensions de l'étiquette en pixels
        $largeur_etiquette = 328.81889764;
        $hauteur_etiquette = 64.251968504;

        // Créer une image vide de la taille souhaitée pour l'étiquette
        $image = imagecreatetruecolor($largeur_etiquette, $hauteur_etiquette);

        // Couleurs
        $blanc = imagecolorallocate($image, 255, 255, 255);
        $noir = imagecolorallocate($image, 0, 0, 0);

        // Remplir l'arrière-plan en blanc
        imagefilledrectangle($image, 0, 0, $largeur_etiquette, $hauteur_etiquette, $blanc);

        // Charger le logo
        $logo = imagecreatefrompng('../logo.png');

        // Redimensionner le logo à la taille spécifiée (45.354330709x45.354330709)
        $nouvelle_largeur_logo = 25.354330709;
        $nouvelle_hauteur_logo = 25.354330709;
        $logo_redimensionne = imagescale($logo, $nouvelle_largeur_logo, $nouvelle_hauteur_logo);

        // Placer le logo à l'emplacement spécifié
        $logo_x = 16; // 20.787401575 px
        $logo_y = 30; // 7.5590551181 px
        imagecopy($image, $logo_redimensionne, $logo_x, $logo_y, 0, 0, $nouvelle_largeur_logo, $nouvelle_hauteur_logo);

        // Générer un code-barres en fonction du nom avec des dimensions personnalisées
        $code_barre_generator = new BarcodeGeneratorPNG();
        $code_barre_png = $code_barre_generator->getBarcode(
            $nom,
                $code_barre_generator::TYPE_CODE_93,
        );
        $code_barre_image = imagecreatefromstring($code_barre_png);



        // Placer le code-barres généré à l'emplacement spécifié
        $code_barre_largeur = imagesx($code_barre_image);
        $code_barre_hauteur = 50.015748031; // 34.015748031 px
        $code_barre_x = 13; // 37.795275591 px
        $code_barre_y = 0; // 7.5590551181 px

        // centrer le code barre
        $code_barre_x = ($largeur_etiquette - $code_barre_largeur) / 2;
        imagecopy($image, $code_barre_image, $code_barre_x, $code_barre_y, 0, 0, $code_barre_largeur, $code_barre_hauteur);

        // Placer le texte centré du code-barres généré en dessous du code-barres
        $texte_x = $code_barre_x + ($code_barre_largeur / 2) - (strlen($nom) * 5); // 5 px par caractère
        $texte_y = 35; // 18.897637795 px
        imagestring($image, 5, $texte_x, $texte_y, $nom, $noir);


        // Définir le nom du fichier à télécharger
        $nom_fichier = 'code-barres-' . $nom . '.png';

        // Afficher ou enregistrer l'image en tant que téléchargement
        header('Content-Type: image/png');
        header('Content-Disposition: attachment; filename="' . $nom_fichier . '"');
        imagepng($image); // Enregistrer l'image dans le fichier
        imagedestroy($image);

        // Terminer le script
        exit();
    }
}
?>