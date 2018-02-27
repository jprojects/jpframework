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
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');
JHtml::_('behavior.keepalive');
$model = $this->getModel('block');

?>
<script type="text/javascript">
    js = jQuery.noConflict();
    js(document).ready(function() {
        
    });

    Joomla.submitbutton = function(task)
    {
        if (task == 'block.cancel') {
            Joomla.submitform(task, document.getElementById('block-form'));
        }
        else {
            
            if (task != 'block.cancel' && document.formvalidator.isValid(document.id('block-form'))) {
                
                Joomla.submitform(task, document.getElementById('block-form'));
            }
            else {
                alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
            }
        }
    }
</script>

<form action="<?php echo JRoute::_('index.php?option=com_jpframework&layout=edit&id=' . (int) $this->item->id); ?>" method="post" name="adminForm" id="block-form" class="form-validate">

    <div class="form-horizontal">
        <?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'general')); ?>

        <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'general', JText::_('COM_JPFRAMEWORK_TITLE_BLOCK', true)); ?>
        <div class="row-fluid">
            <div class="span10 form-horizontal">
                <fieldset class="adminform">

                    <input type="hidden" name="jform[id]" value="<?php echo $this->item->id; ?>" />
					<input type="hidden" name="jform[ordering]" value="<?php echo $this->item->ordering; ?>" />
					<div class="control-group">
						<div class="control-label"><?php echo $this->form->getLabel('state'); ?></div>
						<div class="controls"><?php echo $this->form->getInput('state'); ?></div>
					</div>
					<input type="hidden" name="jform[checked_out]" value="<?php echo $this->item->checked_out; ?>" />
					<input type="hidden" name="jform[checked_out_time]" value="<?php echo $this->item->checked_out_time; ?>" />

					<?php if(empty($this->item->created_by)){ ?>
					<input type="hidden" name="jform[created_by]" value="<?php echo JFactory::getUser()->id; ?>" />

					<?php } 
					else{ ?>
					<input type="hidden" name="jform[created_by]" value="<?php echo $this->item->created_by; ?>" />

					<?php } ?>			<div class="control-group">
					<div class="control-label"><?php echo $this->form->getLabel('type'); ?></div>
					<div class="controls"><?php echo $this->form->getInput('type'); ?></div>
				</div>
				<div class="control-group">
					<div class="control-label"><?php echo $this->form->getLabel('position'); ?></div>
					<div class="controls"><?php echo $this->form->getInput('position'); ?></div>
				</div>
				<div class="control-group">
					<div class="control-label"><?php echo $this->form->getLabel('language'); ?></div>
					<div class="controls"><?php echo $this->form->getInput('language'); ?></div>
				</div>				
				<div class="control-group">
					<div class="control-label"><?php echo $this->form->getLabel('menuitem'); ?></div>
					<div class="controls"><?php echo $this->form->getInput('menuitem'); ?></div>
				</div>	
                </fieldset>
            </div>
        </div>
        <?php echo JHtml::_('bootstrap.endTab'); ?>
        
        <?php if($this->item->type != '') : ?>
		<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'advanced', JText::_('COM_JPFRAMEWORK_TITLE_ADVANCED', true)); ?>
		<?php echo $model->renderFieldSet ($this->item->type, 'block'); ?>
		<?php echo JHtml::_('bootstrap.endTab'); ?>
		<?php endif; ?>
		
		<?php if($this->item->type != '') : ?>
		<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'styles', JText::_('COM_JPFRAMEWORK_TITLE_STYLES', true)); ?>
		<?php echo $model->renderFieldSet ($this->item->type, 'styles'); ?>
		<?php echo JHtml::_('bootstrap.endTab'); ?>
		<?php endif; ?>

        <?php echo JHtml::_('bootstrap.endTabSet'); ?>

        <input type="hidden" name="task" value="" />
        <?php echo JHtml::_('form.token'); ?>

    </div>
</form>
