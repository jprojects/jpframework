<?php

/**
* @version		$Id: com_jpframework  Kim $
* @package		com_jpframework v 1.0.0
* @copyright	Copyright (C) 2014 Afi. All rights reserved.
* @license		GNU/GPL, see LICENSE.txt
*/

// restricted access
defined('_JEXEC') or die('Restricted access');

abstract class BotigaFeaturedHelper {

	public static function getItems($limit) {

		$db = JFactory::getDbo();
		$db->setQuery("SELECT * from `#__botiga_items` WHERE published = 1 AND featured = 1 ORDER BY id DESC LIMIT ".$limit);
		return $db->loadObjectList();
	}
}
