<?php

/**
 * @version     1.0.0
 * @package     com_jpframework
 * @copyright   Copyright (C) 2015. Todos los derechos reservados.
 * @license     Licencia Pública General GNU versión 2 o posterior. Consulte LICENSE.txt
 * @author      aficat <kim@aficat.com> - http://www.afi.cat
*/

defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');

/**
 * Methods supporting a list of Jpframework records.
*/
class JpframeworkModelJpf extends JModelList {

    /**
     * Constructor.
     *
     * @param    array    An optional associative array of configuration settings.
     * @see        JController
     * @since    1.6
     */
    public function __construct($config = array()) {
    
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = array(
                'id', 'a.id',
                'ordering', 'a.ordering',
                'state', 'a.state',
                'created_by', 'a.created_by',
                'type', 'a.type',
                'position', 'a.position',
                'language', 'a.language',
            );
        }

        parent::__construct($config);
    }

    /**
     * Method to auto-populate the model state.
     *
     * Note. Calling getState in this method will result in recursion.
    */
    protected function populateState($ordering = null, $direction = null) {

        $app = JFactory::getApplication('administrator');

        $menuitem = $app->getUserStateFromRequest($this->context . '.list.menuitem', 'list_menuitem', '', 'int');
        $this->setState('list.menuitem', $menuitem);  
        
        $language = $app->getUserStateFromRequest($this->context . '.list.language', 'list_language', '', 'string');
        $this->setState('list.language', $language);   

        // Load the parameters.
        $params = JComponentHelper::getParams('com_jpframework');
        $this->setState('params', $params);

        // List state information.
        parent::populateState('a.ordering', 'ASC');
    }

    /**
     * Method to get a store id based on model configuration state.
     *
     * This is necessary because the model is used by the component and
     * different modules that might need different sets of data or different
     * ordering requirements.
     *
     * @param	string		$id	A prefix for the store id.
     * @return	string		A store id.
     * @since	1.6
    */
    protected function getStoreId($id = '') {
        // Compile the store id.
        $id.= ':' . $this->getState('list.menuitem');
        $id.= ':' . $this->getState('list.language');

        return parent::getStoreId($id);
    }

    /**
     * Build an SQL query to load the list data.
     *
     * @return	JDatabaseQuery
     * @since	1.6
    */
    protected function getListQuery() {

        $db = $this->getDbo();
        $query = $db->getQuery(true);

        $query->select('a.*');
        
        $query->from('`#__jpframework_blocks` AS a');        
		
		// Filter by language
		$language = $this->getState('list.language');
		if (!empty($language)) {
			$query->where('a.language = ' . $db->quote($language));
		}
		
		// Filter by menu
		$menuitem = $this->getState('list.menuitem');
		if (!empty($menuitem)) {
			$query->where('(a.menuitem = '.$menuitem.' OR FIND_IN_SET('.$menuitem.', REPLACE(a.menuitem, ";", ",")) > 0)');
		}

        $query->order($db->escape('a.ordering ASC'));

		//echo $query;
        return $query;
    }

    public function getItems() {
    
        $items = parent::getItems();  
        return $items;
    }
    
    public function getMenuitems() {
    
    	$db = JFactory::getDbo();
    	$db->setQuery('SELECT DISTINCT(menuitem) FROM #__jpframework_blocks WHERE state = 1');
    	return $db->loadObjectList();
    }
    
    public function getLanguages() {
    
    	$db = JFactory::getDbo();
    	$db->setQuery('SELECT title, lang_code FROM #__languages WHERE published = 1');
    	return $db->loadObjectList();
    }
    
    public function addEntry($block) {
    
    	$db = JFactory::getDbo();
    	$app = JFactory::getApplication();
    	
    	$entry = new stdClass();
		$entry->uniqid = $block.'-'.uniqid();
		$entry->state = 0;	
		$entry->type = $block;	
		$entry->created_by = JFactory::getUser()->id;
		$entry->language = $app->getUserStateFromRequest($this->context . '.list.language', 'list_language', '', 'string');
		$entry->menuitem = $app->getUserStateFromRequest($this->context . '.list.menuitem', 'list_menuitem', '', 'int');
		
		$db->insertObject('#__jpframework_blocks', $entry);
    }

}
