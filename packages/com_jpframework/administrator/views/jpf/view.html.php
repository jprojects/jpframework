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

jimport('joomla.application.component.view');

/**
 * View class for a list of Jpframework.
*/
class JpframeworkViewJpf extends JViewLegacy {

    protected $items;
    protected $pagination;
    protected $state;

    /**
     * Display the view
    */
    public function display($tpl = null) {

        $this->state = $this->get('State');
        $this->items = $this->get('Items');
        $this->pagination = $this->get('Pagination');
        $this->filterForm   = $this->get('FilterForm');
		$this->activeFilters = $this->get('ActiveFilters');

        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            throw new Exception(implode("\n", $errors));
        }

        JpframeworkHelper::addSubmenu('blocks');

        $this->addToolbar();

        $this->sidebar = JHtmlSidebar::render();

        parent::display($tpl);
    }

    /**
     * Add the page title and toolbar.
     *
     * @since	1.6
    */
    protected function addToolbar() {

        require_once JPATH_COMPONENT . '/helpers/jpframework.php';

        $doc = JFactory::getDocument();

		      $doc->addStylesheet('components/com_jpframework/assets/css/jpframework.css');

        $canDo = JpframeworkHelper::getActions();

        JToolBarHelper::title(JText::_('COM_JPFRAMEWORK_TITLE_BLOCKS'), 'cube');

        if ($canDo->get('core.edit.state')) {

            if (isset($this->items[0]->state)) {
                JToolBarHelper::divider();
                JToolBarHelper::custom('jpf.publish', 'publish.png', 'publish_f2.png', 'JTOOLBAR_PUBLISH', true);
                JToolBarHelper::custom('jpf.unpublish', 'unpublish.png', 'unpublish_f2.png', 'JTOOLBAR_UNPUBLISH', true);
                JToolbarHelper::custom('jpf.duplicate', 'copy.png', 'copy_f2.png', 'JTOOLBAR_DUPLICATE', true);
            }

            if (isset($this->items[0]->checked_out)) {
                JToolBarHelper::custom('jpf.checkin', 'checkin.png', 'checkin_f2.png', 'JTOOLBAR_CHECKIN', true);
            }
        }

        JToolBarHelper::custom('jpf.lessCompiler', 'publish.png', 'publish_f2.png', 'COM_JPFRAMEWORK_PARSE_CSS', false);

        //Show trash and delete for components that uses the state field
        if (isset($this->items[0]->state)) {
            if ($canDo->get('core.delete')) {
                JToolBarHelper::deleteList('', 'jpf.delete', 'JTOOLBAR_EMPTY_TRASH');
                JToolBarHelper::divider();
            } else if ($canDo->get('core.edit.state')) {
                JToolBarHelper::trash('jpf.trash', 'JTOOLBAR_TRASH');
                JToolBarHelper::divider();
            }
        }

        if ($canDo->get('core.admin')) {
            JToolBarHelper::preferences('com_jpframework');
        }

        //Set sidebar action - New in 3.0
        JHtmlSidebar::setAction('index.php?option=com_jpframework&view=jpf');

        $this->extra_sidebar = '';

        foreach(JpframeworkHelper::getBlocks() as $block) {

		    JHtmlSidebar::addEntry(

				'<span class="icon-puzzle"></span>&nbsp;'.$block,
				'index.php?option=com_jpframework&task=jpf.addBlock&block='.$block.'&'.JSession::getFormToken().'=1',
				false

			);
		}
    }

}
