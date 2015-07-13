<?php
/**
 * @author
 * @copyright
 * @license
 */

defined("_JEXEC") or die("Restricted access");

$scriptContent = "
	setTimeout(function(){
    	document.getElementById('b-promo-out').style.display = 'none';
   	}, " . $params['timer'] * 1000 . ");
";
$doc =& JFactory::getDocument();
$doc->addScriptDeclaration( $scriptContent );
$doc->addStyleSheet( JURI::base() . "/modules/mod_bpromo/css/style.css");

// Include the syndicate functions only once
require_once __DIR__ . '/helper.php';
$item = ModBpromoHelper::getItem($params);

require JModuleHelper::getLayoutPath('mod_bpromo', $params->get('layout', 'default'));
