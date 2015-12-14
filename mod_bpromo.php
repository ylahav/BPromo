<?php
/**
 * @author
 * @copyright
 * @license
 */

defined("_JEXEC") or die("Restricted access");

JPluginHelper::importPlugin('system');
$dispatcher = JDispatcher::getInstance();
$customerInfo = $dispatcher->trigger( 'onGetVisitorInfo' )[0];

$scriptContent = "
	setTimeout(function(){
    	document.getElementById('b-promo-out').style.display = 'none';
   	}, " . $params['timer'] * 1000 . ");
";
$doc = JFactory::getDocument();
$doc->addScriptDeclaration( $scriptContent );
$doc->addStyleSheet( JURI::base() . "/modules/mod_bpromo/css/style.css");

require_once __DIR__ . '/helper.php';

$item = ModBpromoHelper::getItem($params, $customerInfo);

require JModuleHelper::getLayoutPath('mod_bpromo', $params->get('layout', 'default'));
