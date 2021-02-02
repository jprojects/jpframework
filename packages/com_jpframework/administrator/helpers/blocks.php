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
class blocksHelper {

	public static function getBlockParameter($id, $field, $default="") {
		
		$db = JFactory::getDbo();
		$db->setQuery('SELECT params FROM `#__jpframework_blocks` WHERE id = '.$id);
		$registry = new JRegistry;
		$registry->loadString($db->loadResult());
		$params = $registry->toArray();
		$value = $params[$field];
		if($value == "" && $default != "") { return $default; } else { return $value; }
	}
	
	public static function getBlockVersion($name) {
		$name = strtolower($name);
		$url  = JURI::root()."administrator/components/com_jpframework/blocks/$name/manifest.json";
		$json = file_get_contents($url);
		$data = json_decode($json);
		return $data->version;
	}

	public static function loadCss($file) {
		$document = JFactory::getDocument();
		$document->addStylesheet($file);
	}
	
	public static function loadJs($file) {
		$document = JFactory::getDocument();
		$document->addScript($file);
	}
	
	/**
	 * method to get component parameters
	 * @param string $param
	 * @param mixed $default
	 * @return mixed
	*/
	public static function getParameter($param, $default="")
	{
		$params = JComponentHelper::getParams( 'com_jpframework' );
		$param = $params->get( $param, $default );
	
		return $param;
	}
}
