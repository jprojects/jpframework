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

class com_jpframeworkInstallerScript
{
	/**
     * This method is called after a component is installed.
     *
     * @param  \stdClass $parent - Parent object calling this method.
     *
     * @return void
    */
	public function install () {

		$db = JFactory::getDbo();
		
		//create article base to associate all menú items
		
		$post = new stdClass();
		$post->title 	= 'JPFramework';
		$post->alias 	= 'jpframework';
		$post->state 	= 1;
		$post->catid 	= 2;
		$post->created 	= date('Y-m-d H:i:s');
		$post->created_by = 928;
		$post->access 	= 1;
		$post->metadata = '{"robots":"","author":"","rights":"","xreference":""}';
		$post->featured = 0;
		$post->language = '*';
		
		$db->insertObject('#__content', $post);
		
		$parent->getParent()->setRedirectURL('index.php?option=com_jpframework');
	}

    /**
     * This method is called after a component is uninstalled.
     *
     * @param  \stdClass $parent - Parent object calling this method.
     *
     * @return void
     */
    public function uninstall($parent) 
    {
        echo '<p>' . JText::_('COM_JPFRAMEWORK_UNINSTALL_TEXT') . '</p>';
    }

    /**
     * This method is called after a component is updated.
     *
     * @param  \stdClass $parent - Parent object calling object.
     *
     * @return void
     */
    public function update($parent) 
    {
        echo '<p>' . JText::sprintf('COM_JPFRAMEWORK_UPDATE_TEXT', $parent->get('manifest')->version) . '</p>';
    }

    /**
     * Runs just before any installation action is preformed on the component.
     * Verifications and pre-requisites should run in this function.
     *
     * @param  string    $type   - Type of PreFlight action. Possible values are:
     *                           - * install
     *                           - * update
     *                           - * discover_install
     * @param  \stdClass $parent - Parent object calling object.
     *
     * @return void
     */
    public function preflight($type, $parent) 
    {
        echo '<p>' . JText::_('COM_JPFRAMEWORK_PREFLIGHT_' . $type . '_TEXT') . '</p>';
    }

    /**
     * Runs right after any installation action is preformed on the component.
     *
     * @param  string    $type   - Type of PostFlight action. Possible values are:
     *                           - * install
     *                           - * update
     *                           - * discover_install
     * @param  \stdClass $parent - Parent object calling object.
     *
     * @return void
     */
    function postflight($type, $parent) 
    {
        echo '<p>' . JText::_('COM_JPFRAMEWORK_POSTFLIGHT_' . $type . '_TEXT') . '</p>';
    }
}
