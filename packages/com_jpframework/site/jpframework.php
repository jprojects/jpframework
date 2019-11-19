<?php
/**
 * @version		1.0.0 jpframework $
 * @package		jpframework
 * @copyright   Copyright © 2010 - All rights reserved.
 * @license		GNU/GPL
 * @author		kim
 * @author mail kim@aficat.com
 * @website		http://www.aficat.com
 *
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

define('DS', DIRECTORY_SEPARATOR);

// Require the base controller
JLoader::registerPrefix('jpframework', JPATH_COMPONENT);
require_once (JPATH_COMPONENT.DS.'controller.php');

// Perform the Request task
$controller	= JControllerLegacy::getInstance('jpframework');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
?>
