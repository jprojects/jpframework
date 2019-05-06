<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

use Joomla\Registry\Registry;

JLoader::register('TagsHelperRoute', JPATH_BASE . '/components/com_tags/helpers/route.php');

$authorised = JFactory::getUser()->getAuthorisedViewLevels();

?>
<?php if (!empty($displayData)) : ?>
	<ul class="tags list-inline list-unstyled">
		<?php foreach ($displayData as $i => $tag) : ?>
			<?php if (in_array($tag->access, $authorised)) : ?>
				<?php $tagParams = new Registry($tag->params); ?>
				<?php $link_class = $tagParams->get('tag_link_class', 'label label-info'); ?>
				<li class="tag-<?php echo $tag->tag_id; ?> tag-list<?php echo $i; ?> list-inline-item" itemprop="keywords">
					<a href="<?php echo JRoute::_(TagsHelperRoute::getTagRoute($tag->tag_id . ':' . $tag->alias)); ?>" class="<?php echo $link_class; ?>">
						<span class="badge badge-primary p-2"><?php echo $this->escape($tag->title); ?></span>
					</a>
				</li>
			<?php endif; ?>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>
