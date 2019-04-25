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
		$post->attribs  = '{"article_layout":"","show_title":"0","link_titles":"","show_tags":"","show_intro":"","info_block_position":"","info_block_show_title":"","show_category":"0","link_category":"","show_parent_category":"","link_parent_category":"","show_associations":"","show_author":"0","link_author":"","show_create_date":"0","show_modify_date":"0","show_publish_date":"0","show_item_navigation":"0","show_icons":"0","show_print_icon":"0","show_email_icon":"0","show_vote":"0","show_hits":"0","show_noauth":"","urls_position":"","alternative_readmore":"","article_page_title":"","show_publishing_options":"","show_article_options":"","show_urls_images_backend":"","show_urls_images_frontend":""}';
		
		$db->insertObject('#__content', $post);
		
		//change menu module position
		$db->setQuery('UPDATE #__modules SET position = '.$db->quote('jpf-menu').' WHERE id = 1');
		$db->query();
		
		//create pdf directory
		mkdir(JPATH_ROOT.'/images/pdf');
		
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
