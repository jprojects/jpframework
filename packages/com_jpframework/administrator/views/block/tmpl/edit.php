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

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Router\Route;

HTMLHelper::_('behavior.formvalidator');
HTMLHelper::_('behavior.keepalive');

$model = $this->getModel('block');

?>


<form action="<?= JRoute::_('index.php?option=com_jpframework&view=block&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="block-form" class="form-validate">
	<input type="hidden" name="jform[id]" value="<?= $this->item->id; ?>" />
	<input type="hidden" name="jform[ordering]" value="<?= $this->item->ordering; ?>" />
    <div class="form-horizontal">
	<?php echo HTMLHelper::_('uitab.startTabSet', 'myTab', array('active' => 'General')); ?>

        <?= JHtml::_('uitab.addTab', 'myTab', 'general', JText::_('COM_JPFRAMEWORK_TITLE_BLOCK', true)); ?>
        <div class="row-fluid">
            <div class="span12 form-horizontal">
                <fieldset class="adminform">
					<div class="control-group">
						<div class="control-label"><?= $this->form->getLabel('state'); ?></div>
						<div class="controls"><?= $this->form->getInput('state'); ?></div>
					</div>
					<input type="hidden" name="jform[checked_out]" value="<?= $this->item->checked_out; ?>" />
					<input type="hidden" name="jform[checked_out_time]" value="<?= $this->item->checked_out_time; ?>" />

					<?php if(empty($this->item->created_by)){ ?>
					<input type="hidden" name="jform[created_by]" value="<?= JFactory::getUser()->id; ?>" />

					<?php }
					else{ ?>
					<input type="hidden" name="jform[created_by]" value="<?= $this->item->created_by; ?>" />
					<?php } ?>
                  	<div class="control-group">
						<div class="control-label"><?= $this->form->getLabel('type'); ?></div>
						<div class="controls"><?= $this->form->getInput('type'); ?></div>
					</div>
					<div class="control-group">
						<div class="control-label"><?= $this->form->getLabel('position'); ?></div>
						<div class="controls"><?= $this->form->getInput('position'); ?></div>
					</div>
					<div class="control-group">
						<div class="control-label"><?= $this->form->getLabel('language'); ?></div>
						<div class="controls"><?= $this->form->getInput('language'); ?></div>
					</div>
					<div class="control-group">
						<div class="control-label"><?= $this->form->getLabel('menuitem'); ?></div>
						<div class="controls"><?= $this->form->getInput('menuitem'); ?></div>
					</div>
                </fieldset>
            </div>
        </div>
        <?= JHtml::_('uitab.endTab'); ?>

        <?php if($this->item->type != '') : ?>
    		<?= JHtml::_('uitab.addTab', 'myTab', 'advanced', JText::_('COM_JPFRAMEWORK_TITLE_ADVANCED', true)); ?>
    		<?= $model->renderFieldSet ($this->item->type, 'block'); ?>
    		<?= JHtml::_('uitab.endTab'); ?>
    		<?php endif; ?>

    		<?php if($this->item->type != '') : ?>
    		<?= JHtml::_('uitab.addTab', 'myTab', 'styles', JText::_('COM_JPFRAMEWORK_TITLE_STYLES', true)); ?>
    		<?= $model->renderFieldSet ($this->item->type, 'styles'); ?>
    		<?= JHtml::_('uitab.endTab'); ?>
    		<?php endif; ?>

        <?= JHtml::_('uitab.endTabSet'); ?>

        <input type="hidden" name="task" value="block.save" />
        <?= JHtml::_('form.token'); ?>

    </div>
</form>
