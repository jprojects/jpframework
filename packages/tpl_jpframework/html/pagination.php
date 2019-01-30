<?php
/**
 * @package     Joomla.Libraries
 * @subpackage  Pagination
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('JPATH_PLATFORM') or die;



	/**
	 * Create the html for a list footer
	 *
	 * @param   array  $list  Pagination list data structure.
	 *
	 * @return  string  HTML for a list start, previous, next,end
	 *
	 * @since   1.5
	 */
	function pagination_list_render($list)
	{
		// Reverse output rendering for right-to-left display.
		$html = '<ul class="pagination">';
		$html .= '<li class="page-item pagination-start">' . $list['start']['data'] . '</li>';
		$html .= '<li class="page-item pagination-prev">' . $list['previous']['data'] . '</li>';

		foreach ($list['pages'] as $page)
		{
			$html .= '<li class="page-item">' . $page['data'] . '</li>';
		}

		$html .= '<li class="page-item pagination-next">' . $list['next']['data'] . '</li>';
		$html .= '<li class="page-item pagination-end">' . $list['end']['data'] . '</li>';
		$html .= '</ul>';

		return $html;
	}

?>
