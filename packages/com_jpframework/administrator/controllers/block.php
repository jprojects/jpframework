<?php
/**
 * @version     1.0.0
 * @package     com_jpframework
 * @copyright   Copyright (C) 2015. Todos los derechos reservados.
 * @license     Licencia Pública General GNU versión 2 o posterior. Consulte LICENSE.txt
 * @author      aficat <kim@aficat.com> - http://www.afi.cat
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * Block controller class.
 */
class JpframeworkControllerBlock extends JControllerForm
{

    function __construct() {
        $this->view_list = 'blocks';
        parent::__construct();
    }

    /**
	* Method to override the save method
	 *
	 * @return	void
	*/
    	function save()
	{
		
		$model  = $this->getModel();
    
    		if($model->store()) {

			parent::save();
		}
	}

}
