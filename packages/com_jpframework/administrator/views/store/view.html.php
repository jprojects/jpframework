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
 * View to edit
 */
class JpframeworkViewStore extends JViewLegacy {

    protected $items;
    protected $pagination;
    protected $state;

    /**
     * Display the view
     */
    public function display($tpl = null) {
        $this->state = $this->get('State');
        $this->items = $this->get('Data');
        $this->pagination = $this->get('Pagination');

		$items = $this->items;

        JpframeworkHelper::addSubmenu('store');

        $this->addToolbar();

        $this->sidebar = JHtmlSidebar::render();
        parent::display($tpl);
    }

    /**
     * Add the page title and toolbar.
     */
    protected function addToolbar() {

        JToolBarHelper::title(JText::_('COM_JPFRAMEWORK_TITLE_STORE'), 'block.png');

        JToolBarHelper::cancel('block.cancel', 'JTOOLBAR_CANCEL');
    }

}
