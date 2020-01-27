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

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::_('jquery.framework');
JHtml::_('bootstrap.framework');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');
JHtml::_('behavior.keepalive');
$model = $this->getModel('block');

?>
<script>
Joomla.submitbutton = function(task)
{
  if(task != 'block.apply' && document.formvalidator.isValid(document.id('block-form'))) {
    Joomla.submitform(task, document.getElementById('block-form'));
  } else {
      alert('<?= $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
  }
}
</script>
<style>
.form-horizontal .control-label { width: 30%; }
.control-group .chzn-container { width: 100%; }
#submit {
  background-color: #437f97;
  color: #fff;
  border-radius: 0;
}
#submit:hover, .submit:focus {
  background-color: #46b1c9;
}
.nav-tabs {
    border-bottom: 1px solid #437f97;
}
.nav-tabs > li > a {
  color: #437f97;
}
.nav-tabs > li.active a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
  background-color: #437f97;
  color: #fff;
  border-radius: 0;
}
.nav-tabs > li > a:hover, .nav-tabs > li > a:focus {
  background-color: #46b1c9;
  color: #fff;
}
</style>

<form action="<?= JRoute::_('index.php?option=com_jpframework&layout=edit&id=' . (int) $this->item->id); ?>&tmpl=component" method="post" name="adminForm" id="block-form" class="form-validate">

    <div class="form-horizontal">
        <?= JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'general')); ?>

        <?= JHtml::_('bootstrap.addTab', 'myTab', 'general', JText::_('COM_JPFRAMEWORK_TITLE_BLOCK', true)); ?>
        <div class="row-fluid">
            <div class="span12 form-horizontal">
                <fieldset class="adminform">
                  <input type="hidden" name="jform[id]" value="<?= $this->item->id; ?>" />
					        <input type="hidden" name="jform[ordering]" value="<?= $this->item->ordering; ?>" />
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
        <?= JHtml::_('bootstrap.endTab'); ?>

        <?php if($this->item->type != '') : ?>
    		<?= JHtml::_('bootstrap.addTab', 'myTab', 'advanced', JText::_('COM_JPFRAMEWORK_TITLE_ADVANCED', true)); ?>
    		<?= $model->renderFieldSet ($this->item->type, 'block'); ?>
    		<?= JHtml::_('bootstrap.endTab'); ?>
    		<?php endif; ?>

    		<?php if($this->item->type != '') : ?>
    		<?= JHtml::_('bootstrap.addTab', 'myTab', 'styles', JText::_('COM_JPFRAMEWORK_TITLE_STYLES', true)); ?>
    		<?= $model->renderFieldSet ($this->item->type, 'styles'); ?>
    		<?= JHtml::_('bootstrap.endTab'); ?>
    		<?php endif; ?>

        <?= JHtml::_('bootstrap.endTabSet'); ?>

        <input type="hidden" name="task" value="block.apply" />
        <?= JHtml::_('form.token'); ?>

    </div>
    <button class="btn btn-primary" id="submit" type="submit"><?= JText::_('JTOOLBAR_SAVE'); ?></button>
</form>
