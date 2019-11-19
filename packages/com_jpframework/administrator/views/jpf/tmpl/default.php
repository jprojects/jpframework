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

<script>
jQuery(document).ready(function(){
	jQuery('.loader').click(function(e) {
		e.preventDefault();
		var href   = jQuery(this).attr('href');
		var target = jQuery(this).attr('data-target');
		var type   = jQuery(this).attr('data-type');
		if(type == 'modal') {
	    	jQuery(target + ' .modal-body').load(href, function(result) {
				jQuery(target).modal({show:true});
			});
		}
		if(type == 'iframe') {
	    jQuery(target + ' .frame').attr('src', href);
			jQuery(target).modal({show:true});
		}

	});
});
</script>

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
						<td>
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
							<a style="padding-top:10px;" href="javascript:void(0);" onclick="return listItemTask('cb<?= $i; ?>','jpf.publish')">
								<span class="icon-publish hasTip" aria-hidden="true" title="Publish"></span>
							</a>
							<a style="padding-top:10px;" href="#">
								<span class="icon-eye-close disabled hasTip" aria-hidden="true" title="Preview"></span>
							</a>
							<?php else : ?>
							<a style="padding-top:10px;" href="javascript:void(0);" onclick="return listItemTask('cb<?= $i; ?>','jpf.unpublish')">
								<span class="icon-unpublish hasTip" aria-hidden="true" title="Unpublish"></span>
							</a>
							<?php
							$language = explode('-', $item->language);
							?>
							<a style="padding-top:10px;" href="<?= JURI::root().'?Itemid='.$model->getState('list.menuitem').'&lang='.$language[0].'#'.$item->uniqid; ?>" data-target="#previewModal" data-type="iframe" class="loader">
								<span class="icon-eye hasTip" aria-hidden="true" title="Preview"></span>
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

<!-- Preview Modal -->
<div id="previewModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="previewModalLabel" aria-hidden="true">
	<div class="modal-header">
    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    	<h3 id="previewModalLabel">Preview block
    		<a onclick="jQuery('#previewModal').css({'width':'565px', 'left':'70%'});" style="cursor:pointer;margin-left:20px;"><span class="icon-mobile"></span></a>
    		<a onclick="jQuery('#previewModal').css({'width':'768px', 'left':'70%'});" style="cursor:pointer;margin-left:10px;"><span class="icon-tablet"></span></a>
    		<a onclick="jQuery('#previewModal').css({'width':'80%', 'left':'50%'});" style="cursor:pointer;margin-left:10px;"><span class="icon-screen"></span></a>
    	</h3>
  	</div>
  	<div class="modal-body">
    		<iframe width="100%" height="500" class="frame" src=""></iframe>
  	</div>
  	<div class="modal-footer">
    	<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
  	</div>
</div>
