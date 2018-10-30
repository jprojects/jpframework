<?php
/**
 * @version     1.0.0
 * @package     com_jpframework
 * @copyright   Copyright (C) 2015. Todos los derechos reservados.
 * @license     Licencia Pública General GNU versión 2 o posterior. Consulte LICENSE.txt
 * @author      aficat <kim@aficat.com> - http://www.afi.cat
 */


// no direct access
defined('_JEXEC') or die;

// Report simple running errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_jpframework')) 
{
	throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}

if(!defined('DS')) { define('DS', DIRECTORY_SEPARATOR); }

//import Helper
require_once(JPATH_ADMINISTRATOR . DS . 'components' . DS . 'com_jpframework' . DS . 'helpers' . DS . 'blocks.php');
// Include dependancies
jimport('joomla.application.component.controller');

$controller	= JControllerLegacy::getInstance('Jpframework');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
