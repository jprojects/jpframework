<?php

/**
* @version		$Id: com_jpframework  Kim $
* @package		com_jpframework v 1.0.0
* @copyright	Copyright (C) 2014 Afi. All rights reserved.
* @license		GNU/GPL, see LICENSE.txt
*/

// restricted access
defined('_JEXEC') or die('Restricted access');

abstract class NewsHelper {

	public static function getArticles($cat, $limit) {

		$db = JFactory::getDbo();
		$db->setQuery(	"select * from #__blogger_items ".
				"where state = 1 order by id ".
				"desc limit ".$limit."");
		return $db->loadObjectList();
	}

	/**
	 * Get intro from full text
	 *
	 * @param   string  $text  Article text
	 *
	 * @return string
	 */
	public static function getIntro($text) 
	{
		if(strpos($text, '<hr id="system-readmore" />') !== false) {
			$txt = explode('<hr id="system-readmore" />', $text);
			return $txt[0];
		} else {
			return $text;
		}
	}
}
