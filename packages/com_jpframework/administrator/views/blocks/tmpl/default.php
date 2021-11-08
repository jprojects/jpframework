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

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Multilanguage;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Session\Session;

HTMLHelper::_('behavior.multiselect');
HTMLHelper::_('bootstrap.framework');

$model  = $this->getModel();
$app    = Factory::getApplication();
$user	= Factory::getUser();
$userId	= $user->get('id');
$this->sidebar .= $this->extra_sidebar;

$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn  = $this->escape($this->state->get('list.direction'));
$saveOrder = $listOrder == 'a.ordering';

if ($saveOrder && !empty($this->items))
{
	$saveOrderingUrl = 'index.php?option=com_jpframework&task=blocks.saveOrderAjax&tmpl=component&' . Session::getFormToken() . '=1';
	HTMLHelper::_('draggablelist.draggable');
}
?>

<script>
document.addEventListener("DOMContentLoaded", function(event) { 
var loader = document.getElementById('loader');
loader.onclick = function(e) {
	e.preventDefault();
	var href   = loader.getAttribute('data-url');
	var target = loader.getAttribute('data-target');
	document.getElementById('frame').src = href;
	var myModal = new bootstrap.Modal(document.getElementById(target));
	myModal.show();
}
});
</script>

<form action="<?= Route::_('index.php?option=com_jpframework&view=blocks'); ?>" method="post" name="adminForm" id="adminForm">

<div class="row">
	<div id="j-sidebar-container" class="col-12 col-md-2">
		<?= $this->sidebar; ?>
	</div>
	<div id="j-main-container" class="col-12 col-md-10">

    	<div class="jpf-filters">
    		<input id="all" type="checkbox" name="checkall-toggle" value="" title="<?= JText::_('JGLOBAL_CHECK_ALL'); ?>" onclick="Joomla.checkAll(this)" />
			<?php echo LayoutHelper::render('joomla.searchtools.default', array('view' => $this)); ?>
		</div>

		
		<table class="gridly" id="blocksList">
			<tbody <?php if ($saveOrder) : ?>class="js-draggable" data-url="<?php echo $saveOrderingUrl; ?>" data-direction="<?php echo strtolower($listDirn); ?>" data-nested="true"<?php endif; ?>>
			<?php
			if(count($this->items)) :
			$i = 0;
			?>
			<?php foreach($this->items as $item) : ?>
				<?php
				$canCreate  = $user->authorise('core.create',     'com_jpframework');
				$canEdit    = $user->authorise('core.edit',       'com_jpframework');
				$canCheckin = $user->authorise('core.manage',     'com_jpframework');
				$canChange  = $user->authorise('core.edit.state', 'com_jpframework') && $canCheckin;
				?>
				<tr data-draggable-group="<?= $item->position; ?>" class="brick large <?= $item->state == 1 ? 'published' : 'unpublished'; ?> row<?php echo $i % 2; ?>" data-id="<?= $item->id; ?>"  <?php if($i > 0) : ?>style="border-top:#ccc 2px dashed;color:#000;"<?php endif; ?>>
					<td style="position:relative;">
					<input type="checkbox" class="cb" id="cb<?= $i; ?>" name="cid[]" value="<?= $item->id; ?>" onclick="Joomla.isChecked(this.checked);" />
					<input type="text" style="display:none" name="order[]" size="5" value="<?= $item->ordering;?>" class="width-20 text-area-order" />
					<div class="brick-msg">
						<?php $params = json_decode($item->params); ?>
						<b><?= strtoupper($params->title); ?></b><br><br>
						<?= strtoupper($item->type); ?><br><br>
						<?= $item->position != '' ? '('.$item->position.')' : '(No position)'; ?><br><br>
						<?= $item->state == 1 ? 'Published' : 'Unpublished'; ?><br><br>
						<img src="<?= JURI::root(); ?>media/mod_languages/images/<?= str_replace('-', '_', strtolower($item->language)); ?>.gif" alt="<?= $item->language; ?>">
					</div>
					<div class="brick-options">
						<a class="optionModal" href="<?= JURI::root(); ?>administrator/index.php?option=com_jpframework&task=block.edit&id=<?= $item->id; ?>">
							<span class="icon-options hasTip" aria-hidden="true" title="Edit"> </span>
						</a>
						<a onclick="confirm('Are you sure you want to delete this item?');return false;" style="padding-top:10px;" href="<?= JURI::root(); ?>administrator/index.php?option=com_jpframework&task=jpf.removeBlock&id=<?= $item->id; ?>">
							<span class="icon-delete hasTip" aria-hidden="true" title="Delete"> </span>
						</a>
						<?php if($item->state != 1) : ?>
						<a style="padding-top:10px;" href="<?= JURI::root(); ?>administrator/index.php?option=com_jpframework&task=blocks.publish&cid[]=<?= $item->id; ?>&<?= JSession::getFormToken(); ?>=1">
							<span class="icon-lock hasTip" aria-hidden="true" title="Publish"></span>
						</a>
						<a style="padding-top:10px;" href="#">
							<span class="icon-eye-close disabled hasTip" aria-hidden="true" title="Preview"></span>
						</a>
						<?php else : ?>
						<a style="padding-top:10px;" href="<?= JURI::root(); ?>administrator/index.php?option=com_jpframework&task=blocks.unpublish&cid[]=<?= $item->id; ?>&<?= JSession::getFormToken(); ?>=1">
							<span class="icon-unlock hasTip" aria-hidden="true" title="Unpublish"></span>
						</a>
						<?php
						$language = explode('-', $item->language);
						?>
						<a style="padding-top:10px;" data-target="previewModal" href="#" data-url="<?= JURI::root().'?Itemid='.$model->getState('list.menuitem').'&lang='.$language[0].'#'.$item->uniqid; ?>" id="loader">
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
		

		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		<?= HTMLHelper::_('form.token'); ?>
	</div>
</div>
</form>

<!-- Preview Modal -->
<div id="previewModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="previewModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl mx-auto">
    	<div class="modal-content" id="modalContent">
			<div class="modal-header">
			<h5 class="modal-title" id="previewModalLabel">Preview</h5>
				<h3 id="previewModalLabel">
					<a onclick="document.getElementById('modalContent').style.width = '480px';" style="cursor:pointer;margin-left:20px;"><span class="icon-mobile"></span></a>
					<a onclick="document.getElementById('modalContent').style.width = '768px';" style="cursor:pointer;margin-left:10px;"><span class="icon-tablet"></span></a>
					<a onclick="document.getElementById('modalContent').style.width = '1200px';" style="cursor:pointer;margin-left:10px;"><span class="icon-screen"></span></a>
				</h3>
			</div>
			<div class="modal-body">
					<iframe width="100%" height="500" id="frame" src=""></iframe>
			</div>
			<div class="modal-footer">
				<button class="btn btn-danger" data-bs-dismiss="modal" aria-hidden="true">Close</button>
			</div>
	  	</div>
	</div>
</div>
