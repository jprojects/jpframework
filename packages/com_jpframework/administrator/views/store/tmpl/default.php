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
#store-list h4.title-store a:hover {
    -webkit-transition: all 1s ease;
    -moz-transition: all 1s ease;
    -ms-transition: all 1s ease;
    -o-transition: all 1s ease;
    transition: all 1s ease;
    color: #f1c40f;
}

#store-list h4.title-store a {
    color: #f39c12;
}
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
        <div class="row-fluid" id="store-list">
		<?php 
		if(count($this->items))  :
		foreach($this->items->blocks as $item) : ?>
			<?php if(version_compare(blockshelper::getBlockVersion($item->name), $item->version) == 0) { $str = 'Up to date'; } ?>
			<?php if(version_compare(blockshelper::getBlockVersion($item->name), $item->version) == -1) { $str = 'Update'; } ?>
			<?php if(blockshelper::getBlockVersion($item->name) == '') { $str = 'Install'; } ?>
		    	<div class="span4 well">
				<div class="panel">
		    			<div class="panel-body">
		            				<div class="span12">
		                				<h4 class="title-store">
		                    					<strong><a href="#"><i class="icon-cube"></i> <?= $item->name; ?></a></strong>
		                				</h4>
		                				<hr>
		                				<p style="height:50px;"><?= $item->description; ?></p>
		                				<p>
		                    					<a href="#" class="btn btn-default" disabled="">Actual: <?= blockshelper::getBlockVersion($item->name); ?></a>
									<a href="#" class="btn btn-default" disabled="">New: <?= $item->version; ?></a>

		                    					<a <?php if($str == 'Up to date') : ?>disabled=""<?php endif; ?> href="index.php?option=com_jpframework&task=store.install&file=<?php echo strtolower($item->name); ?>" class="btn btn-warning pull-right"><?= $str; ?></a>
		                				</p>
		            				</div>
		    			</div>
	       			</div>
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

