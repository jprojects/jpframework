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
		$db->setQuery(	"select * from #__content ".
				"where catid = ".$cat." and state = 1 order by created ".
				"asc limit ".$limit."");
		return $db->loadObjectList();
	}

	public static function getImage($text) {

		preg_match_all('/<img[^>]+>/i',$text, $result);
  		return $result[0][0];
	}

	public static function getText($text) {

		preg_match_all('/<img[^>]+>/i',$text, $result);
  		$img = $result[0][0];
  		return str_replace($img, '', $text);
	}
}
