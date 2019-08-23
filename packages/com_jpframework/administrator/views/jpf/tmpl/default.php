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
JHtml::_('behavior.multiselect');
JHtml::_('formbehavior.chosen', 'select');

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
		
		<form action="<?= JRoute::_('index.php?option=com_jpframework&view=blocks'); ?>" method="post" name="adminForm" id="adminForm">
			<table class="gridly ui-sortable" id="blocksList">
				<tbody>
				<?php 
				if(count($this->items)) : 
				$i = 0;
				?>
				<?php foreach($this->items as $item) : ?>
					<tr class="brick large <?= $item->state == 1 ? 'published' : 'unpublished'; ?>" data-id="<?= $item->id; ?> sortable-handler"  <?php if($i > 0) : ?>style="border-top:#ccc 2px dashed;"<?php endif; ?>>
						<td>
						<input type="checkbox" class="cb" id="cb<?= $i; ?>" name="cid[]" value="<?= $item->id; ?>" onclick="Joomla.isChecked(this.checked);" />
						<input type="text" style="display:none" name="order[]" size="5" value="<?= $item->ordering;?>" class="width-20 text-area-order " />
						<div class="brick-msg"><?= strtoupper($item->type); ?><br><br><?= $item->position != '' ? '('.$item->position.')' : '(No position)'; ?> <img src="<?= JURI::root(); ?>media/mod_languages/images/<?= str_replace('-', '_', strtolower($item->language)); ?>.gif" alt="<?= $item->language; ?>"></div>
						<div class="brick-options">
							<a href="<?= JURI::root(); ?>administrator/index.php?option=com_jpframework&view=block&layout=edit&id=<?= $item->id; ?>&tmpl=component" data-target="#blockModal" data-toggle="modal">
								<span class="icon-options hasTip" aria-hidden="true" title="Edit"> </span>
							</a>
							<a onclick="confirm('Are you sure you want to delete this item?');return false;" style="padding-top:10px;" href="<?= JURI::root(); ?>administrator/index.php?option=com_jpframework&task=jpf.removeBlock&id=<?= $item->id; ?>">
								<span class="icon-delete hasTip" aria-hidden="true" title="Delete"> </span>
							</a>
							<?php if($item->state != 1) : ?>
							<a style="padding-top:10px;" href="javascript:void(0);" onclick="return listItemTask('cb<?= $i; ?>','jpf.publish')">
								<span class="icon-publish hasTip" aria-hidden="true" title="Publish"></span>
							</a>
							<?php else : ?>
							<a style="padding-top:10px;" href="javascript:void(0);" onclick="return listItemTask('cb<?= $i; ?>','jpf.unpublish')">
								<span class="icon-unpublish hasTip" aria-hidden="true" title="Unpublish"></span>
							</a>
							<?php endif; ?>
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

<!-- Modal -->
<div id="blockModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="blockModalLabel" aria-hidden="true">
	<div class="modal-header">
    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    	<h3 id="blockModalLabel">Edit block</h3>
  	</div>
  	<div class="modal-body" style="padding: 10px 20px;">
    	<!-- Body content injected via js -->
  	</div>
  	<div class="modal-footer">
    	<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    	<button class="btn btn-primary" onclick="Joomla.submitbutton('block.save');">Save changes</button>
  	</div>
</div>
