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

/**
 * Jpframework helper.
*/
class JpframeworkHelper {

    /**
     * Configure the Linkbar.
    */
    public static function addSubmenu($vName = '') {
    
    	$view = JFactory::getApplication()->input->get('view');

    }

    /**
     * Gets a list of the actions that can be performed.
     *
     * @return	JObject
     * @since	1.6
    */
    public static function getActions() {
    
        $user = JFactory::getUser();
        $result = new JObject;

        $assetName = 'com_jpframework';

        $actions = array(
            'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.own', 'core.edit.state', 'core.delete'
        );

        foreach ($actions as $action) {
            $result->set($action, $user->authorise($action, $assetName));
        }

        return $result;
    }
    
    /**
     * Gets a list of blocks.
     *
     * @return	Array
     * @since	1.6
    */
    public static function getBlocks() {
    
    	$path = JPATH_COMPONENT_ADMINISTRATOR . '/blocks';
    	$filter = '.';
    	$recurse = false;
    	$fullpath = false;
    	$exclude = array();
    	
        return JFolder::folders($path, $filter, $recurse, $fullpath , $exclude);
    }
}
