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
        $html[] =  '<option value="bounce" '.($this->value == "bounce" ? "selected" : "").'>bounce</option>';
        $html[] =  '<option value="flash" '.($this->value == "flash" ? "selected" : "").'>flash</option>';
        $html[] =  '<option value="pulse" '.($this->value == "pulse" ? "selected" : "").'>pulse</option>';
        $html[] =  '<option value="rubberBand" '.($this->value == "rubberBand" ? "selected" : "").'>rubberBand</option>';
        $html[] =  '<option value="shake" '.($this->value == "shake" ? "selected" : "").'>shake</option>';
        $html[] =  '<option value="swing" '.($this->value == "swing" ? "selected" : "").'>swing</option>';
        $html[] =  '<option value="tada" '.($this->value == "tada" ? "selected" : "").'>tada</option>';
        $html[] =  '<option value="wobble" '.($this->value == "wobble" ? "selected" : "").'>wobble</option>';
        $html[] =  '<option value="jello" '.($this->value == "jello" ? "selected" : "").'>jello</option>';
        $html[] = '</optgroup>';
        $html[] = '<optgroup label="Bouncing Entrances">';
        $html[] =  '<option value="bounceIn" '.($this->value == "bounceIn" ? "selected" : "").'>bounceIn</option>';
        $html[] =  '<option value="bounceInDown" '.($this->value == "bounceInDown" ? "selected" : "").'>bounceInDown</option>';
        $html[] =  '<option value="bounceInLeft" '.($this->value == "bounceInLeft" ? "selected" : "").'>bounceInLeft</option>';
        $html[] =  '<option value="bounceInRight" '.($this->value == "bounceInRight" ? "selected" : "").'>bounceInRight</option>';
        $html[] =  '<option value="bounceInUp" '.($this->value == "bounceInUp" ? "selected" : "").'>bounceInUp</option>';
        $html[] = '</optgroup>';
        $html[] = '<optgroup label="Bouncing Exits">';
        $html[] =  '<option value="bounceOut" '.($this->value == "bounceOut" ? "selected" : "").'>bounceOut</option>';
        $html[] =  '<option value="bounceOutDown" '.($this->value == "bounceOutDown" ? "selected" : "").'>bounceOutDown</option>';
        $html[] =  '<option value="bounceOutLeft" '.($this->value == "bounceOutLeft" ? "selected" : "").'>bounceOutLeft</option>';
        $html[] =  '<option value="bounceOutRight" '.($this->value == "bounceOutRight" ? "selected" : "").'>bounceOutRight</option>';
        $html[] =  '<option value="bounceOutUp" '.($this->value == "bounceOutUp" ? "selected" : "").'>bounceOutUp</option>';
        $html[] = '</optgroup>';
        $html[] = '<optgroup label="Fading Entrances">';
        $html[] =  '<option value="fadeIn" '.($this->value == "fadeIn" ? "selected" : "").'>fadeIn</option>';
        $html[] =  '<option value="fadeInDown" '.($this->value == "fadeInDown" ? "selected" : "").'>fadeInDown</option>';
        $html[] =  '<option value="fadeInDownBig" '.($this->value == "fadeInDownBig" ? "selected" : "").'>fadeInDownBig</option>';
        $html[] =  '<option value="fadeInLeft" '.($this->value == "fadeInLeft" ? "selected" : "").'>fadeInLeft</option>';
        $html[] =  '<option value="fadeInLeftBig" '.($this->value == "fadeInLeftBig" ? "selected" : "").'>fadeInLeftBig</option>';
        $html[] =  '<option value="fadeInRight" '.($this->value == "fadeInRight" ? "selected" : "").'>fadeInRight</option>';
        $html[] =  '<option value="fadeInRightBig" '.($this->value == "fadeInRightBig" ? "selected" : "").'>fadeInRightBig</option>';
        $html[] =  '<option value="fadeInUp" '.($this->value == "fadeInUp" ? "selected" : "").'>fadeInUp</option>';
        $html[] =  '<option value="fadeInUpBig" '.($this->value == "fadeInUpBig" ? "selected" : "").'>fadeInUpBig</option>';
        $html[] = '</optgroup>';
        $html[] = '<optgroup label="Fading Exits">';
        $html[] =  '<option value="fadeOut" '.($this->value == "fadeOut" ? "selected" : "").'>fadeOut</option>';
        $html[] =  '<option value="fadeOutDown" '.($this->value == "fadeOutDown" ? "selected" : "").'>fadeOutDown</option>';
        $html[] =  '<option value="fadeOutDownBig" '.($this->value == "fadeOutDownBig" ? "selected" : "").'>fadeOutDownBig</option>';
        $html[] =  '<option value="fadeOutLeft" '.($this->value == "fadeOutLeft" ? "selected" : "").'>fadeOutLeft</option>';
        $html[] =  '<option value="fadeOutLeftBig" '.($this->value == "fadeOutLeftBig" ? "selected" : "").'>fadeOutLeftBig</option>';
        $html[] =  '<option value="fadeOutRight" '.($this->value == "fadeOutRight" ? "selected" : "").'>fadeOutRight</option>';
        $html[] =  '<option value="fadeOutRightBig" '.($this->value == "fadeOutRightBig" ? "selected" : "").'>fadeOutRightBig</option>';
        $html[] =  '<option value="fadeOutUp" '.($this->value == "fadeOutUp" ? "selected" : "").'>fadeOutUp</option>';
        $html[] =  '<option value="fadeOutUpBig" '.($this->value == "fadeOutUpBig" ? "selected" : "").'>fadeOutUpBig</option>';
        $html[] = '</optgroup>';
        $html[] = '<optgroup label="Flippers">';
        $html[] =  '<option value="flip" '.($this->value == "flip" ? "selected" : "").'>flip</option>';
        $html[] =  '<option value="flipInX" '.($this->value == "flipInX" ? "selected" : "").'>flipInX</option>';
        $html[] =  '<option value="flipInY" '.($this->value == "flipInY" ? "selected" : "").'>flipInY</option>';
        $html[] =  '<option value="flipOutX" '.($this->value == "flipOutX" ? "selected" : "").'>flipOutX</option>';
        $html[] =  '<option value="flipOutY" '.($this->value == "flipOutY" ? "selected" : "").'>flipOutY</option>';
        $html[] = '</optgroup>';
        $html[] = '<optgroup label="Lightspeed">';
        $html[] =  '<option value="lightSpeedIn" '.($this->value == "lightSpeedIn" ? "selected" : "").'>lightSpeedIn</option>';
        $html[] =  '<option value="lightSpeedOut" '.($this->value == "lightSpeedOut" ? "selected" : "").'>lightSpeedOut</option>';
        $html[] = '</optgroup>';
        $html[] = '<optgroup label="Rotating Entrances">';
        $html[] =  '<option value="rotateIn" '.($this->value == "rotateIn" ? "selected" : "").'>rotateIn</option>';
        $html[] =  '<option value="rotateInDownLeft" '.($this->value == "rotateInDownLeft" ? "selected" : "").'>rotateInDownLeft</option>';
        $html[] =  '<option value="rotateInDownRight" '.($this->value == "rotateInDownRight" ? "selected" : "").'>rotateInDownRight</option>';
        $html[] =  '<option value="rotateInUpLeft" '.($this->value == "rotateInUpLeft" ? "selected" : "").'>rotateInUpLeft</option>';
        $html[] =  '<option value="rotateInUpRight" '.($this->value == "rotateInUpRight" ? "selected" : "").'>rotateInUpRight</option>';
        $html[] = '</optgroup>';
        $html[] = '<optgroup label="Rotating Exits">';
        $html[] = '<option value="rotateOut" '.($this->value == "rotateOut" ? "selected" : "").'>rotateOut</option>';
        $html[] = '<option value="rotateOutDownLeft" '.($this->value == "rotateOutDownLeft" ? "selected" : "").'>rotateOutDownLeft</option>';
        $html[] = '<option value="rotateOutDownRight" '.($this->value == "rotateOutDownRight" ? "selected" : "").'>rotateOutDownRight</option>';
        $html[] = '<option value="rotateOutUpLeft" '.($this->value == "rotateOutUpLeft" ? "selected" : "").'>rotateOutUpLeft</option>';
        $html[] = '<option value="rotateOutUpRight" '.($this->value == "rotateOutUpRight" ? "selected" : "").'>rotateOutUpRight</option>';
        $html[] = '</optgroup>';
        $html[] = '<optgroup label="Sliding Entrances">';
        $html[] = '<option value="slideInUp" '.($this->value == "slideInUp" ? "selected" : "").'>slideInUp</option>';
        $html[] = '<option value="slideInDown" '.($this->value == "slideInDown" ? "selected" : "").'>slideInDown</option>';
        $html[] = '<option value="slideInLeft" '.($this->value == "slideInLeft" ? "selected" : "").'>slideInLeft</option>';
        $html[] = '<option value="slideInRight" '.($this->value == "slideInRight" ? "selected" : "").'>slideInRight</option>';
        $html[] = '</optgroup>';
        $html[] = '<optgroup label="Sliding Exits">';
        $html[] = '<option value="slideOutUp" '.($this->value == "slideOutUp" ? "selected" : "").'>slideOutUp</option>';
        $html[] = '<option value="slideOutDown" '.($this->value == "slideOutDown" ? "selected" : "").'>slideOutDown</option>';
        $html[] = '<option value="slideOutLeft" '.($this->value == "slideOutLeft" ? "selected" : "").'>slideOutLeft</option>';
        $html[] = '<option value="slideOutRight" '.($this->value == "slideOutRight" ? "selected" : "").'>slideOutRight</option>';       
        $html[] = '</optgroup>';       
        $html[] = '<optgroup label="Zoom Entrances">';
        $html[] = '<option value="zoomIn" '.($this->value == "zoomIn" ? "selected" : "").'>zoomIn</option>';
        $html[] = '<option value="zoomInDown" '.($this->value == "zoomInDown" ? "selected" : "").'>zoomInDown</option>';
        $html[] = '<option value="zoomInLeft" '.($this->value == "zoomInLeft" ? "selected" : "").'>zoomInLeft</option>';
        $html[] = '<option value="zoomInRight" '.($this->value == "zoomInRight" ? "selected" : "").'>zoomInRight</option>';
        $html[] = '<option value="zoomInUp" '.($this->value == "zoomInUp" ? "selected" : "").'>zoomInUp</option>';
        $html[] = '</optgroup>';       
        $html[] = '<optgroup label="Zoom Exits">';
        $html[] = '<option value="zoomOut" '.($this->value == "zoomOut" ? "selected" : "").'>zoomOut</option>';
        $html[] = '<option value="zoomOutDown" '.($this->value == "zoomOutDown" ? "selected" : "").'>zoomOutDown</option>';
        $html[] = '<option value="zoomOutLeft" '.($this->value == "zoomOutLeft" ? "selected" : "").'>zoomOutLeft</option>';
        $html[] = '<option value="zoomOutRight" '.($this->value == "zoomOutRight" ? "selected" : "").'>zoomOutRight</option>';
        $html[] = '<option value="zoomOutUp" '.($this->value == "zoomOutUp" ? "selected" : "").'>zoomOutUp</option>';
        $html[] = '</optgroup>';
        $html[] = '<optgroup label="Specials">';
        $html[] =  '<option value="hinge" '.($this->value == "hinge" ? "selected" : "").'>hinge</option>';
        $html[] =  '<option value="jackInTheBox" '.($this->value == "jackInTheBox" ? "selected" : "").'>jackInTheBox</option>';
        $html[] =  '<option value="rollIn" '.($this->value == "rollIn" ? "selected" : "").'>rollIn</option>';
        $html[] =  '<option value="rollOut" '.($this->value == "rollOut" ? "selected" : "").'>rollOut</option>';
        $html[] = '</optgroup>';
		$html[] = "</select>";
        
		return implode($html);
	}
}
