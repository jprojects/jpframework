<?php
/**
 * @version     1.0.0
 * @package     com_jpframework
 * @copyright   Copyright (C) 2015. Todos los derechos reservados.
 * @license     Licencia Pública General GNU versión 2 o posterior. Consulte LICENSE.txt
 * @author      aficat <kim@aficat.com> - http://www.afi.cat
 */

defined('JPATH_BASE') or die;

jimport('joomla.form.formfield');

/**
 * Supports an HTML select list of categories
 */
class JFormFieldClasses extends JFormField
{
	/**
	 * The form field type.
	 *
	 * @var		string
	 * @since	1.6
	 */
	protected $type = 'classes';

	/**
	 * Method to get the field input markup.
	 *
	 * @return	string	The field input markup.
	 * @since	1.6
	 */
	protected function getInput()
	{
		// Initialize variables.
		$html = array();       

		$html[] = "<select name='".$this->name."' class='form-control'>";
		$html[] = "<option value=''>Select an option</option>";
		$html[] = "<option value='primary'>Primary</option>";
		$html[] = "<option value='secondary'>Secondary</option>";
		$html[] = "<option value='success'>Success</option>";
		$html[] = "<option value='danger'>Danger</option>";
		$html[] = "<option value='warning'>Warning</option>";
		$html[] = "<option value='info'>Info</option>";
		$html[] = "<option value='dark'>Dark</option>";
		$html[] = "<option value='link'>Link</option>";
		$html[] = "</select>";
        
		return implode($html);
	}
}
