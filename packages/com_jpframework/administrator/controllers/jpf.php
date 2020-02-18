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
 * Blocks list controller class.
*/
class JpframeworkControllerJpf extends JControllerAdmin
{
	/**
	 * Proxy for getModel.
	 * @since	1.6
	*/
	public function getModel($name = 'block', $prefix = 'JpframeworkModel', $config = array())
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}

	/**
	 * Method to add a new block.
	 *
	 * @return  void
	 *
	 * @since   1.6
	*/
	public function addBlock()
	{
		// Check for request forgeries
		//JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

		$block = $this->input->get('block', '');

		try
		{
			$model = $this->getModel('jpf');

			$model->addEntry($block);

			$this->setMessage(JText::_('COM_JPFRAMEWORK_NEW_BLOCK_ADDED'));
		}
		catch (Exception $e)
		{
			JError::raiseWarning(500, $e->getMessage());
		}

		$this->setRedirect('index.php?option=com_jpframework&view=jpf');
	}

	/**
	 * Method to clone an existing block.
	 *
	 * @return  void
	 *
	 * @since   1.6
	 */
	public function duplicate()
	{
		// Check for request forgeries
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

		$pks = $this->input->post->get('cid', array(), 'array');
		JArrayHelper::toInteger($pks);

		try
		{
			if (empty($pks))
			{
				throw new Exception(JText::_('COM_JPFRAMEWORK_ERROR_NO_BLOCKS_SELECTED'));
			}

			$model = $this->getModel();
			$model->duplicate($pks);
			$this->setMessage(JText::plural('COM_JPFRAMEWORK_N_BLOCKS_DUPLICATED', count($pks)));
		}
		catch (Exception $e)
		{
			JError::raiseWarning(500, $e->getMessage());
		}

		$this->setRedirect('index.php?option=com_jpframework&view=jpf');
	}


	/**
	 * Method to save the submitted ordering values for records via AJAX.
	 *
	 * @return  void
	 *
	 * @since   3.0
	 */
	public function saveOrderAjax()
	{
		// Get the input
		$input = JFactory::getApplication()->input;
		$pks = $input->post->get('cid', array(), 'array');
		$order = $input->post->get('order', array(), 'array');

		// Sanitize the input
		JArrayHelper::toInteger($pks);
		JArrayHelper::toInteger($order);

		// Get the model
		$model = $this->getModel();

		// Save the ordering
		$return = $model->saveorder($pks, $order);

		if ($return)
		{
			echo "1";
		}

		// Close the application
		JFactory::getApplication()->close();
	}

	/**
	 * Method to remove a new block.
	 *
	 * @return  void
	 *
	 * @since   1.6
	*/
	public function removeBlock()
	{
		// Check for request forgeries
		//JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

		$db = JFactory::getDbo();

		$id = $this->input->getInt('id');

		try
		{
			$db->setQuery('DELETE FROM `#__jpframework_blocks` WHERE id = '.$id);
			$db->query();

			$this->setMessage(JText::_('COM_JPFRAMEWORK_BLOCK_DELETED'));
		}
		catch (Exception $e)
		{
			JError::raiseWarning(500, $e->getMessage());
		}

		$this->setRedirect('index.php?option=com_jpframework&view=jpf');
	}

	/**
	 * less compiler
	 * @return  void
	 * @since   3.0
	*/
	public function lessCompiler()
	{
		require_once(JPATH_ROOT.'/templates/jpframework/less/Less.php');

		$db = JFactory::getDbo();

		$params = &JComponentHelper::getParams( 'com_jpframework' );

		$body_color 			= $params->get('body_color');
		$body_fontsize 		= $params->get('body_fontsize');
		$body_font 				= $params->get('body_font');
		$body_font_type		= $params->get('body_font_type', 'px');
		$body_fcolor 			= $params->get('body_fcolor');
		$link_color 			= $params->get('link_color');
		$linkhover_color 	= $params->get('linkhover_color');
		$footer_color 		= $params->get('footer_color');
		$footer_fcolor 		= $params->get('footer_fcolor');
		$menu 						= $params->get('menu', '-1');
		$menu_bg 					= $params->get('menu_bg');
		$primary_color 		= $params->get('primary_color');
		$primary_bg 			= $params->get('primary_bg');
		$secondary_color 	= $params->get('secondary_color');
		$secondary_bg 		= $params->get('secondary_bg');
		$success_color 		= $params->get('success_color');
		$success_bg 			= $params->get('success_bg');
		$error_color 			= $params->get('error_color');
		$error_bg 				= $params->get('error_bg');

		$options 	= array( 'compress'=>true );
		$parser 	= new Less_Parser($options);
		$parser->parseFile( JPATH_ROOT.'/templates/jpframework/css/jpframework.less' );
		if($menu != '-1') {
			$parser->parseFile( JPATH_ROOT.'/templates/jpframework/layouts/menu/'.$menu.'.less' );
		}
		$parser->parseFile( JPATH_ROOT.'/templates/jpframework/css/animate.less' );
		$parser->parse("
			@body_color: ".$body_color.";
			@body_fontsize: ".$body_fontsize.$body_font_type.";
			@body_font:  '".$body_font."';
			@body_fcolor:  ".$body_fcolor.";
			@link_color: ".$link_color.";
			@linkhover_color: ".$linkhover_color.";
			@footer_color: ".$footer_color.";
			@footer_fcolor: ".$footer_fcolor.";
			@menu_background: ".$menu_bg.";
			@primary_color: ".$primary_color.";
			@primary_bg: ".$primary_bg.";
			@secondary_color: ".$secondary_color.";
			@secondary_bg: ".$secondary_bg.";
			@success_color: ".$success_color.";
			@success_bg: ".$success_bg.";
			@error_color: ".$error_color.";
			@error_bg: ".$error_bg.";
		");

		$css = $parser->getCss();
		file_put_contents(JPATH_ROOT.'/templates/jpframework/css/jpframework.css', $css);
		chmod(JPATH_ROOT.'/templates/jpframework/css/jpframework.css', 0777);

		$this->setRedirect('index.php?option=com_jpframework&view=jpf', JText::_('JP_FRAMEWORK_LESS_COMPILED'));
	}

}
