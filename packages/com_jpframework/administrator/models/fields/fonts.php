<?php
/**
 * @package     JP Framework
 * @subpackage  com_jpframework
 *
 * @copyright   Copyright (C) 20019 JP Framework. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

jimport('joomla.form.formfield');

/**
 * Supports a Google fonts field.
 *
 * @package     Joomla.Administrator
 * @subpackage  com_jpframework
 * @since       1.6
 */
class JFormFieldFonts extends JFormField
{
	/**
	 * The form field type.
	 *
	 * @var		string
	 * @since   1.6
	 */
	protected $type = 'fonts';

	/**
	 * Method to get the field input markup.
	 *
	 * @return  string	The field input markup.
	 * @since   1.6
	 */
	protected function getInput()
	{		
		$doc = JFactory::getDocument();

		// Load files
		$doc->addStylesheet('components/com_jpframework/assets/css/jquery.fontselect.css');
		$doc->addScript('components/com_jpframework/assets/js/jquery.fontselect.js');

		// Build the script.
		$script = array();

		// Select button script
		$script[] = '	function applyFont(font) { ';
		$script[] = '	    font = font.replace(/\+/g, " ");';
		$script[] = '	    font = font.split(":");';
		$script[] = '	    var fontFamily = font[0];';
		$script[] = '	    var fontWeight = font[1] || 400;';
		$script[] = '	    jQuery("p.loremipsum'.$this->id.'").css({fontFamily:fontFamily, fontWeight:fontWeight});';
		$script[] = '	}';
		$script[] = '	jQuery(function() {';
		$script[] = '		jQuery("#'.$this->id.'").fontselect({systemFonts: false}).on("change", function() { applyFont(jQuery(this).val()); });';
		$script[] = '	})';

		// Add the script to the document head.
		$doc->addScriptDeclaration(implode("\n", $script));

		// Setup variables for display.
		$html	= array();

		$html[] = '<input type="text" id="'.$this->id.'" name="'.$this->name.'" value="'.$this->value.'" />';
		$html[] = '<p class="loremipsum'.$this->id.'" style="font-family:Arimo;">Lorem ipsum dolor sit amet consectetur adipiscing elit hendrerit.</p>';

		return implode($html);
	}
}
