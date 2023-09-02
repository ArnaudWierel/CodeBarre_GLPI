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

if (!defined('GLPI_ROOT')) {
    die("Sorry. You can't access this file directly");
}

class PluginCodeBarreGLPI extends CommonDBTM
{
    private $pdo;

    static $rightname = 'plugin_codebarre_glpi';

    static function getTypeName($nb = 0)
    {
        return __('Générateur de code barre', 'codebarre');
    }

    static function getMenuContent()
    {
        $menu = [];

        // Menu entry in helpdesk
        $menu['title'] = self::getTypeName(2);
        $menu['page'] = "/plugins/CodeBarre_GLPI/front/codebarre.php";
        $menu['icon'] = 'fa-solid fa-barcode';

        return $menu;
    }

    // (Optionally) implement access rights 
    function getRights($interface = 'central')
    {
        switch ($interface) {
            case 'central':
                return [
                    'plugin_codebarre_glpi' => 'PluginCodeBarreGLPI'
                ];
            case 'profile':
                return [
                    'plugin_codebarre_glpi' => 'PluginCodeBarreGLPI'
                ];
        }
    }

    function getTabNameForItem(CommonGLPI $item, $withtemplate = 0)
    {
        // Vérifiez le type de l'objet et renvoyez le nom approprié
        switch ($item->getType()) {
            case 'PluginCodeBarreGLPI':
                return __('CodeBarre_GLPI', 'codebarre');
        }
        return '';
    }
    static function displayTabContentForItem(CommonGLPI $item, $tabnum = 1, $withtemplate = 0)
    {
        switch ($item->getType()) {
            case 'PluginCodeBarreGLPI':
                break;
        }
        return true;
    }
}