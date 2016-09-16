<?php
/**
 * @version     1.0.0
 * @package     com_jpframework
 * @copyright   Copyright (C) 2015. Todos los derechos reservados.
 * @license     Licencia Pública General GNU versión 2 o posterior. Consulte LICENSE.txt
 * @author      aficat <kim@aficat.com> - http://www.afi.cat
 */

defined('JPATH_BASE') or die;

jimport('joomla.html.html');
jimport('joomla.form.formfield');

/**
 * Supports an HTML select list of categories
 */
class JFormFieldBlock extends JFormField
{
	/**
	 * The form field type.
	 *
	 * @var		string
	 * @since	1.6
	 */
	protected $type = 'block';

	/**
	 * Method to get the field input markup.
	 *
	 * @return	string	The field input markup.
	 * @since	1.6
	 */
	protected function getInput()
	{
		// Initialize variables.
//print_r($_POST);
		$block = JRequest::getVar('type', 'testimonials');
		$html = array();
		$path = JPATH_ADMINISTRATOR.DS.'components'.DS.'com_jpframework'.DS.'blocks'.DS.$block.DS.'block.xml';
		echo $path;
		if (is_file($path)) {
			//ob_start();
			
			$html = file_get_contents($path);
		}
		echo $html;
	}
}
