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

JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');
JHtml::_('behavior.keepalive');

//Joomla Component Creator code to allow adding non select list filters
if (!empty($this->extra_sidebar)) {
    $this->sidebar .= $this->extra_sidebar;
}
?>

<style>
.storeitem { text-align: center; }
</style>

<form action="<?php echo JRoute::_('index.php?option=com_jpframework&view=store'); ?>" method="post" name="adminForm" id="adminForm">
<?php if(!empty($this->sidebar)): ?>
	<div id="j-sidebar-container" class="span2">
		<?php echo $this->sidebar; ?>
	</div>
	<div id="j-main-container" class="span10">
<?php else : ?>
	<div id="j-main-container">
<?php endif;?>
        <div class="row-fluid">
		<?php 
		if(count($this->items))  :
		foreach($this->items->blocks as $item) : ?>

		    <div class="span4 storeitem well">
		      <h2><?php echo $item->name; ?></h2>
		      <p><?php echo $item->description; ?></p>
		      <p><?php echo $item->version; ?></p>
		      <?php version_compare(blockshelper::getBlockVersion($item->name), $item->version) >= 0 ? $str = 'Install' : $str = 'Update'; ?>
		      <p><a class="btn" href="index.php?option=com_jpframework&task=store.install&file=<?php echo strtolower($item->name); ?>"><?php echo $str; ?> &raquo;</a></p>
		    </div>
    
		<?php
		endforeach;
		else :
		echo JText::_('COM_JPFRAMEWORK_STORE_EMPTY');
		endif; ?>                   
        </div>
    </div>
<input type="hidden" name="task" value="" />
<?php echo JHtml::_('form.token'); ?>
</form>

