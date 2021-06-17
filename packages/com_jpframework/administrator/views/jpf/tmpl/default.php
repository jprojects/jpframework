<?php
/**
 * @version     1.0.0
 * @package     com_jpframework
 * @copyright   Copyright (C) 2015. Todos los derechos reservados.
 * @license     Licencia Pública General GNU versión 2 o posterior. Consulte LICENSE.txt
 * @author      aficat <kim@aficat.com> - http://www.afi.cat
*/

// no direct access
defined('_JEXEC') or die;

JHtml::_('bootstrap.tooltip');
JHTML::_('behavior.modal');
JHtml::_('behavior.multiselect');
JHtml::_('formbehavior.chosen', 'select');

$model  = $this->getModel();
$app    = JFactory::getApplication();
$user	= JFactory::getUser();
$userId	= $user->get('id');
$this->sidebar .= $this->extra_sidebar;

$listOrder	= $this->state->get('list.ordering');
$listDirn	= $this->state->get('list.direction');
$canOrder	= $user->authorise('core.edit.state', 'com_jpframework');
$saveOrder	= $listOrder == 'a.ordering';
if ($saveOrder)
{
	$saveOrderingUrl = 'index.php?option=com_jpframework&task=jpf.saveOrderAjax&tmpl=component';
	JHtml::_('sortablelist.sortable', 'blocksList', 'adminForm', strtolower($listDirn), $saveOrderingUrl);
}
?>

<form action="<?= JRoute::_('index.php?option=com_jpframework&view=jpf'); ?>" method="post" name="adminForm" id="adminForm">

	<div id="j-sidebar-container" class="span2">
		<?= $this->sidebar; ?>
	</div>
	<div id="j-main-container" class="span10">

    	<div class="jpf-filters">
    		<input id="all" type="checkbox" name="checkall-toggle" value="" title="<?= JText::_('JGLOBAL_CHECK_ALL'); ?>" onclick="Joomla.checkAll(this)" />
			<?php echo JLayoutHelper::render('joomla.searchtools.default', array('view' => $this)); ?>
		</div>

		<form action="<?= JRoute::_('index.php?option=com_jpframework&view=jpf'); ?>" method="post" name="adminForm" id="adminForm">
			<table class="gridly ui-sortable" id="blocksList">
				<tbody>
				<?php
				if(count($this->items)) :
				$i = 0;
				?>
				<?php foreach($this->items as $item) : ?>
					<tr class="brick large <?= $item->state == 1 ? 'published' : 'unpublished'; ?>" data-id="<?= $item->id; ?>"  <?php if($i > 0) : ?>style="border-top:#ccc 2px dashed;"<?php endif; ?>>
						<td style="position:relative;">
						<input type="checkbox" class="cb" id="cb<?= $i; ?>" name="cid[]" value="<?= $item->id; ?>" onclick="Joomla.isChecked(this.checked);" />
						<input type="text" style="display:none" name="order[]" size="5" value="<?= $item->ordering;?>" class="width-20 text-area-order " />
						<div class="brick-msg">
							<?= strtoupper($item->title); ?><br><br>
							<?= strtoupper($item->type); ?><br><br>
							<?= $item->position != '' ? '('.$item->position.')' : '(No position)'; ?><br><br>
							<?= $item->state == 1 ? 'Published' : 'Unpublished'; ?><br><br>
							<img src="<?= JURI::root(); ?>media/mod_languages/images/<?= str_replace('-', '_', strtolower($item->language)); ?>.gif" alt="<?= $item->language; ?>">
						</div>
						<div class="brick-options">
							<a class="modal" rel="{handler: 'iframe', size: {x: 960, y:740}}" href="<?= JURI::root(); ?>administrator/index.php?option=com_jpframework&task=block.edit&id=<?= $item->id; ?>&tmpl=component">
								<span class="icon-options hasTip" aria-hidden="true" title="Edit"> </span>
							</a>
							<a onclick="confirm('Are you sure you want to delete this item?');return false;" style="padding-top:10px;" href="<?= JURI::root(); ?>administrator/index.php?option=com_jpframework&task=jpf.removeBlock&id=<?= $item->id; ?>">
								<span class="icon-delete hasTip" aria-hidden="true" title="Delete"> </span>
							</a>
							<?php if($item->state != 1) : ?>
							<a style="padding-top:10px;" href="<?= JURI::root(); ?>administrator/index.php?option=com_jpframework&task=blocks.publish&id=<?= $item->id; ?>">
								<span class="icon-publish hasTip" aria-hidden="true" title="Publish"></span>
							</a>
							<a style="padding-top:10px;" href="#">
								<span class="icon-eye-close disabled hasTip" aria-hidden="true" title="Preview"></span>
							</a>
							<?php else : ?>
							<a style="padding-top:10px;" href="<?= JURI::root(); ?>administrator/index.php?option=com_jpframework&task=blocks.unpublish&id=<?= $item->id; ?>">
								<span class="icon-unpublish hasTip" aria-hidden="true" title="Unpublish"></span>
							</a>
							<?php
							$language = explode('-', $item->language);
							?>
							<a style="padding-top:10px;" href="<?= JURI::root().'?Itemid='.$model->getState('list.menuitem').'&lang='.$language[0].'#'.$item->uniqid; ?>">
								<span class="icon-eye hasTip" aria-hidden="true" title="Preview"></span>
								<a class="modal" rel="{handler: 'iframe', size: {x: 580, y:740}}" style="cursor:pointer;margin-left:20px;"><span class="icon-mobile"></span></a>
    							<a class="modal" rel="{handler: 'iframe', size: {x: 768, y:740}}" style="cursor:pointer;margin-left:10px;"><span class="icon-tablet"></span></a>
    							<a class="modal" rel="{handler: 'iframe', size: {x: 960, y:740}}" style="cursor:pointer;margin-left:10px;"><span class="icon-screen"></span></a>
							</a>
							<?php endif; ?>
							<a style="padding-top:10px;" href="#" class="sortable-handler">
								<span class="icon-list hasTip" aria-hidden="true" title="Reorder"></span>
							</a>
						</div>
						</td>
					</tr>
				<?php
				$i++;
				endforeach; ?>
				<?php else : ?>
			  	<div class="brick large"><div class="brick-msg">ADD NEW BLOCK</div></div>
			  	<?php endif; ?>
			  	</tbody>
			</table>
		</form>

		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="filter_order" value="<?= $listOrder; ?>" />
		<input type="hidden" name="filter_order_Dir" value="<?= $listDirn; ?>" />
		<?= JHtml::_('form.token'); ?>
	</div>

</form>
