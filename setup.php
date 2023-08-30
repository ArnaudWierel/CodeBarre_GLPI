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

// Change le nom du plugin en "CodeBarre_GLPI"
define('CODEBARRE_GLPI_VERSION', '1.0.0');

// Inclut le fichier de classe du plugin
include_once('inc/codebarre_glpi.class.php');

/**
 * Initialisation des hooks du plugin - Obligatoire
 *
 * @return void
 */
function plugin_init_codebarre_glpi()
{
    global $PLUGIN_HOOKS;

    // Obligatoire !
    $PLUGIN_HOOKS['csrf_compliant']['CodeBarre_GLPI'] = true;

    // Ajoute l'entrée au menu contextuel de l'appareil
    $PLUGIN_HOOKS['menu_toadd']['codebarre_glpi'] = array('context' => 'PluginCodeBarreGLPI');

    // Enregistre la classe du plugin
    Plugin::registerClass('PluginCodeBarreGLPI');
}

/**
 * Obtient le nom et la version du plugin - Obligatoire
 *
 * @return array
 */
function plugin_version_codebarre_glpi()
{
    return [
        'name' => 'CodeBarre_GLPI',
        'version' => '1.0.0',
        'author' => 'Sanyto (Arnaud WIEREL)',
        'license' => 'GLPv3',
        'homepage' => 'https://github.com/ArnaudWierel/CodeBarre_GLPI',
        'requirements' => [
            'glpi' => [
                'min' => '10.0.2'
            ],
            'php' => [
                'min' => '7.4',
                'max' => '8.19'
            ]
        ]
    ];
}

/**
 * Vérification optionnelle des prérequis avant l'installation : peut afficher des erreurs ou ajouter un message après redirection
 *
 * @return boolean
 */
function plugin_codebarre_glpi_check_prerequisites()
{
    // Vérifie la version de GLPI
    if (version_compare(GLPI_VERSION, '10.0.2', 'lt') || version_compare(PHP_VERSION, '7.4', 'lt')) {
        echo "Ce plugin nécessite GLPI 10.0.2 et PHP entre 7.4 et 8.19";
        return false;
    }
    return true;
}

/**
 * Vérifie le processus de configuration du plugin : doit renvoyer true si réussi
 * Peut afficher un message uniquement en cas d'échec et $verbose est true
 *
 * @param boolean $verbose Activer la verbosité. Par défaut à false
 *
 * @return boolean
 */
function plugin_codebarre_glpi_check_config($verbose = false)
{
    if (true) { // Votre vérification de configuration
        return true;
    }

    if ($verbose) {
        echo "Installé, mais non configuré";
    }
    return false;
}

/**
 * Optionnel: définit les options du plugin.
 *
 * @return array
 */
function plugin_codebarre_glpi_options()
{
    return [
        Plugin::OPTION_AUTOINSTALL_DISABLED => true,
    ];
}