<?php
/**
 * @version     1.0.0
 * @package     com_jpframework
 * @copyright   Copyright (C) 2015. Todos los derechos reservados.
 * @license     Licencia Pública General GNU versión 2 o posterior. Consulte LICENSE.txt
 * @author      aficat <kim@aficat.com> - http://www.afi.cat
 */

// No direct access.
defined('_JEXEC') or die;

jimport('joomla.application.component.controlleradmin');

/**
 * Blockss list controller class.
 */
class JpframeworkControllerStore extends JControllerAdmin
{
	/**
	 * Proxy for getModel.
	 * @since	1.6
	 */
	public function getModel($name = 'store', $prefix = 'JpframeworkModel', $config = array())
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}
    
    
	/**
	 * Method to unzip a remote file.
	 * @return  void
	 * @since   3.0
	 */
	public function install()
	{
		jimport('joomla.filesystem.archive');
		$name = strtolower(JRequest::getVar('file', '', 'get'));
		$file = 'http://www.afi.cat/blocks/'.$name.'.zip';
		$path = JPATH_COMPONENT_ADMINISTRATOR.'/blocks/'.$name;

		if(!is_dir($path)) {
			mkdir($path, 0755);
		}
		$zip = JArchive::getAdapter('zip');
		if($zip->extract($file, $path)) {
		  	$msg = JText::_('COM_JPFRAMEWORK_INSTALL_SUCCESS');
			$type = '';
		} else {
		  	$msg = JText::_('COM_JPFRAMEWORK_INSTALL_ERROR');
			$type = 'error';
		}
		$this->setRedirect('index.php?option=com_jpframework&view=store', $msg, $type);
	}
    
    
    
}
