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
class JFormFieldScrolleffects extends JFormField
{
	/**
	 * The form field type.
	 *
	 * @var		string
	 * @since	1.6
	 */
	protected $type = 'scrolleffects';

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

		$html[] = '<select name="'.$this->name.'" class="form-control">';
		$html[] =  '<option value="">Select an option</option>';
		$html[] = '<optgroup label="Attention Seekers">';
        $html[] =  '<option value="bounce">bounce</option>';
        $html[] =  '<option value="flash">flash</option>';
        $html[] =  '<option value="pulse">pulse</option>';
        $html[] =  '<option value="rubberBand">rubberBand</option>';
        $html[] =  '<option value="shake">shake</option>';
        $html[] =  '<option value="swing">swing</option>';
        $html[] =  '<option value="tada">tada</option>';
        $html[] =  '<option value="wobble">wobble</option>';
        $html[] =  '<option value="jello">jello</option>';
        $html[] = '</optgroup>';
        $html[] = '<optgroup label="Bouncing Entrances">';
        $html[] =  '<option value="bounceIn">bounceIn</option>';
        $html[] =  '<option value="bounceInDown">bounceInDown</option>';
        $html[] =  '<option value="bounceInLeft">bounceInLeft</option>';
        $html[] =  '<option value="bounceInRight">bounceInRight</option>';
        $html[] =  '<option value="bounceInUp">bounceInUp</option>';
        $html[] = '</optgroup>';
        $html[] = '<optgroup label="Bouncing Exits">';
        $html[] =  '<option value="bounceOut">bounceOut</option>';
        $html[] =  '<option value="bounceOutDown">bounceOutDown</option>';
        $html[] =  '<option value="bounceOutLeft">bounceOutLeft</option>';
        $html[] =  '<option value="bounceOutRight">bounceOutRight</option>';
        $html[] =  '<option value="bounceOutUp">bounceOutUp</option>';
        $html[] = '</optgroup>';
        $html[] = '<optgroup label="Fading Entrances">';
        $html[] =  '<option value="fadeIn">fadeIn</option>';
        $html[] =  '<option value="fadeInDown">fadeInDown</option>';
        $html[] =  '<option value="fadeInDownBig">fadeInDownBig</option>';
        $html[] =  '<option value="fadeInLeft">fadeInLeft</option>';
        $html[] =  '<option value="fadeInLeftBig">fadeInLeftBig</option>';
        $html[] =  '<option value="fadeInRight">fadeInRight</option>';
        $html[] =  '<option value="fadeInRightBig">fadeInRightBig</option>';
        $html[] =  '<option value="fadeInUp">fadeInUp</option>';
        $html[] =  '<option value="fadeInUpBig">fadeInUpBig</option>';
        $html[] = '</optgroup>';
        $html[] = '<optgroup label="Fading Exits">';
        $html[] =  '<option value="fadeOut">fadeOut</option>';
        $html[] =  '<option value="fadeOutDown">fadeOutDown</option>';
        $html[] =  '<option value="fadeOutDownBig">fadeOutDownBig</option>';
        $html[] =  '<option value="fadeOutLeft">fadeOutLeft</option>';
        $html[] =  '<option value="fadeOutLeftBig">fadeOutLeftBig</option>';
        $html[] =  '<option value="fadeOutRight">fadeOutRight</option>';
        $html[] =  '<option value="fadeOutRightBig">fadeOutRightBig</option>';
        $html[] =  '<option value="fadeOutUp">fadeOutUp</option>';
        $html[] =  '<option value="fadeOutUpBig">fadeOutUpBig</option>';
        $html[] = '</optgroup>';
        $html[] = '<optgroup label="Flippers">';
        $html[] =  '<option value="flip">flip</option>';
        $html[] =  '<option value="flipInX">flipInX</option>';
        $html[] =  '<option value="flipInY">flipInY</option>';
        $html[] =  '<option value="flipOutX">flipOutX</option>';
        $html[] =  '<option value="flipOutY">flipOutY</option>';
        $html[] = '</optgroup>';
        $html[] = '<optgroup label="Lightspeed">';
        $html[] =  '<option value="lightSpeedIn">lightSpeedIn</option>';
        $html[] =  '<option value="lightSpeedOut">lightSpeedOut</option>';
        $html[] = '</optgroup>';
        $html[] = '<optgroup label="Rotating Entrances">';
        $html[] =  '<option value="rotateIn">rotateIn</option>';
        $html[] =  '<option value="rotateInDownLeft">rotateInDownLeft</option>';
        $html[] =  '<option value="rotateInDownRight">rotateInDownRight</option>';
        $html[] =  '<option value="rotateInUpLeft">rotateInUpLeft</option>';
        $html[] =  '<option value="rotateInUpRight">rotateInUpRight</option>';
        $html[] = '</optgroup>';
        $html[] = '<optgroup label="Rotating Exits">';
        $html[] = '<option value="rotateOut">rotateOut</option>';
        $html[] = '<option value="rotateOutDownLeft">rotateOutDownLeft</option>';
        $html[] = '<option value="rotateOutDownRight">rotateOutDownRight</option>';
        $html[] = '<option value="rotateOutUpLeft">rotateOutUpLeft</option>';
        $html[] = '<option value="rotateOutUpRight">rotateOutUpRight</option>';
        $html[] = '</optgroup>';
        $html[] = '<optgroup label="Sliding Entrances">';
        $html[] = '<option value="slideInUp">slideInUp</option>';
        $html[] = '<option value="slideInDown">slideInDown</option>';
        $html[] = '<option value="slideInLeft">slideInLeft</option>';
        $html[] = '<option value="slideInRight">slideInRight</option>';
        $html[] = '</optgroup>';
        $html[] = '<optgroup label="Sliding Exits">';
        $html[] = '<option value="slideOutUp">slideOutUp</option>';
        $html[] = '<option value="slideOutDown">slideOutDown</option>';
        $html[] = '<option value="slideOutLeft">slideOutLeft</option>';
        $html[] = '<option value="slideOutRight">slideOutRight</option>';       
        $html[] = '</optgroup>';       
        $html[] = '<optgroup label="Zoom Entrances">';
        $html[] = '<option value="zoomIn">zoomIn</option>';
        $html[] = '<option value="zoomInDown">zoomInDown</option>';
        $html[] = '<option value="zoomInLeft">zoomInLeft</option>';
        $html[] = '<option value="zoomInRight">zoomInRight</option>';
        $html[] = '<option value="zoomInUp">zoomInUp</option>';
        $html[] = '</optgroup>';       
        $html[] = '<optgroup label="Zoom Exits">';
        $html[] = '<option value="zoomOut">zoomOut</option>';
        $html[] = '<option value="zoomOutDown">zoomOutDown</option>';
        $html[] = '<option value="zoomOutLeft">zoomOutLeft</option>';
        $html[] = '<option value="zoomOutRight">zoomOutRight</option>';
        $html[] = '<option value="zoomOutUp">zoomOutUp</option>';
        $html[] = '</optgroup>';
        $html[] = '<optgroup label="Specials">';
        $html[] =  '<option value="hinge">hinge</option>';
        $html[] =  '<option value="jackInTheBox">jackInTheBox</option>';
        $html[] =  '<option value="rollIn">rollIn</option>';
        $html[] =  '<option value="rollOut">rollOut</option>';
        $html[] = '</optgroup>';
		$html[] = "</select>";
        
		return implode($html);
	}
}
