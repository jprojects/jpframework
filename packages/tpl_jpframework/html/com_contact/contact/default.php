<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$cparams = JComponentHelper::getParams('com_media');

jimport('joomla.html.html.bootstrap');
?>
<section id="faq" style="margin:50px 0;">

        <div class="container">

            <header>
                <h1><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
                <div class="lead"><?php echo $this->contact->misc; ?></div>
            </header>

            <div class="row">

                <div class="col-md-6">             

                    <div class="alert">
                        
                        <p class="lead" style="margin-bottom:50px;"><?php echo JText::_('JP_FRAMEWORK_CONTACT_DETAILS'); ?></p>
                        
						<?php if ($this->contact->address && $this->params->get('show_street_address')) : ?>
                        <div class="row">
                          
                          <div class="col-md-4 col-xs-6 text-left">
                            <strong><?php echo JText::_('JP_FRAMEWORK_CONTACT_ADDRESS'); ?></strong>
                          </div>
                          
                          <div class="col-md-8 col-xs-6">
                            <address>
                              <?php echo $this->contact->address; ?><br/>
                            </address>
                          </div>
			
                        </div><!-- /row -->
						<?php endif; ?>

						<?php if ($this->contact->suburb && $this->params->get('show_suburb')) : ?>
						<div class="row">			                          
			  
			                <div class="col-md-4 col-xs-6 text-left">
	                            <strong><?php echo JText::_('JP_FRAMEWORK_CONTACT_SUBURB'); ?></strong>
	                          </div>
	                          
	                          <div class="col-md-8 col-xs-6">
	                            <address>
	                              <?php echo $this->contact->suburb; ?><br/>
	                            </address>
	                          </div>
						
			                </div><!-- /row -->
							<?php endif; ?>
							<?php if ($this->contact->state && $this->params->get('show_state')) : ?>
							<div class="row">
					                          
	                          <div class="col-md-4 col-xs-6 text-left">
	                            <strong><?php echo JText::_('JP_FRAMEWORK_CONTACT_STATE'); ?></strong>
	                          </div>
	                          
	                          <div class="col-md-8 col-xs-6">
	                            <address>
	                              <?php echo $this->contact->state; ?><br/>
	                            </address>
	                          </div>
				
	                        </div><!-- /row -->
							<?php endif; ?>
							<?php if ($this->contact->postcode && $this->params->get('show_postcode')) : ?>
							<div class="row">					                          
					  
	                          <div class="col-md-4 col-xs-6 text-left">
	                            <strong><?php echo JText::_('JP_FRAMEWORK_CONTACT_POSTCODE'); ?></strong>
	                          </div>
	                          
	                          <div class="col-md-8 col-xs-6">
	                            <address>
	                              <?php echo $this->contact->postcode; ?><br/>
	                            </address>
	                          </div>
								
					        </div><!-- /row -->
							<?php endif; ?>
							<?php if ($this->contact->country && $this->params->get('show_country')) : ?>
							<div class="row">
					                          
		                          <div class="col-md-4 col-xs-6 text-left">
		                            <strong><?php echo JText::_('JP_FRAMEWORK_CONTACT_COUNTRY'); ?></strong>
		                          </div>
		                          
		                          <div class="col-md-8 col-xs-6">
		                            <address>
		                              <?php echo $this->contact->country; ?><br/>
		                            </address>
		                          </div>
					
		                    </div><!-- /row -->
							<?php endif; ?>
					
							<?php if ($this->contact->email_to && $this->params->get('show_email')) : ?>
							<div class="row">       
					  
		                          <div class="col-md-4 col-xs-6 text-left">
		                            <strong><?php echo JText::_('JP_FRAMEWORK_CONTACT_EMAIL'); ?></strong>
		                          </div>
		                          
		                          <div class="col-md-8 col-xs-6">
		                            <address>
		                              <?php echo $this->contact->email; ?><br/>
		                            </address>
		                          </div>
					
		                    </div><!-- /row -->
							<?php endif; ?>
							<?php if ($this->contact->telephone && $this->params->get('show_telephone')) : ?>
	                        <div class="row">
	                          
	                          <div class="col-md-4 col-xs-6 text-left">
	                            <strong><?php echo JText::_('JP_FRAMEWORK_CONTACT_PHONE'); ?></strong>
	                          </div>
	                          
	                          <div class="col-md-8 col-xs-6">
	                            <address>
	                              <?php echo nl2br($this->contact->telephone); ?><br/>
	                            </address>
	                          </div>
	
	                        </div><!-- /row -->
							<?php endif; ?>
							<?php if ($this->contact->mobile && $this->params->get('show_mobile')) :?>
	                        <div class="row">
	                          
	                          <div class="col-md-4 col-xs-6 text-left">
	                            <strong><?php echo JText::_('JP_FRAMEWORK_CONTACT_MOBILE'); ?></strong>
	                          </div>
	                          
	                          <div class="col-md-8 col-xs-6">
	                            <address>
	                              <?php echo nl2br($this->contact->mobile); ?><br/>
	                            </address>
	                          </div>
	
	                        </div><!-- /row -->
							<?php endif; ?>
							<?php if ($this->contact->fax && $this->params->get('show_fax')) : ?>
							<div class="row">
					                          
	                          <div class="col-md-4 col-xs-6 text-left">
	                            <strong>Fax</strong>
	                          </div>
	                          
	                          <div class="col-md-8 col-xs-6">
	                            <address>
	                              <?php echo nl2br($this->contact->fax); ?><br/>
	                            </address>
	                          </div>
	
	                        </div><!-- /row -->
					
			<?php endif; ?>
			<?php if ($this->contact->webpage && $this->params->get('show_webpage')) : ?>
							<div class="row">
					                          
	                          <div class="col-md-4 col-xs-6 text-left">
	                            <strong><?php echo JText::_('JP_FRAMEWORK_CONTACT_WEBPAGE'); ?></strong>
	                          </div>
	                          
	                          <div class="col-md-8 col-xs-6">
	                            <address>
	                              <?php echo JStringPunycode::urlToUTF8($this->contact->webpage); ?><br/>
	                            </address>
	                          </div>
	
	                        </div><!-- /row -->
			<?php endif; ?>

                    </div><!-- /alert -->

                </div><!-- /col-md-6 -->

                <div class="col-md-6">

            <div class="row contact-intro">
			<?php $this->contact->image == '' ? $c_img = '' : $c_img = $this->contact->image; ?>
						<?php if($c_img != '') : ?>
                        <div class="col-md-3 text-right"><img class="img-responsive" src="<?php echo $c_img; ?>" alt=""></div>
                        <?php endif; ?>
                        <div class="col-md-<?php if($c_img != '') : ?>12<?php else: ?>9<?php endif; ?>"><p class="lead"><?php echo JText::_('JP_FRAMEWORK_CONTACT_FORM_TITLE'); ?></p></div>                        
                    </div>

                    <!--////////// CONTACT FORM //////////-->
                    <form id="contact-form" action="<?php echo JRoute::_('index.php'); ?>" method="post" class="form-validate form-horizontal">

			<div class="form-group">
                        	<input type="text" name="jform[contact_name]" id="jform_contact_name" required="required" aria-required="true" aria-invalid="true" class="required invalid form-control input-lg" placeholder="<?php echo JText::_('JP_FRAMEWORK_CONTACT_FORM_NAME'); ?>">
			</div>
			<div class="form-group">
                        	<input type="text" id="jform_contact_email" name="jform[contact_email]" required="required" aria-required="true" class="required validate-email form-control input-lg" placeholder="<?php echo JText::_('JP_FRAMEWORK_CONTACT_FORM_EMAIL'); ?>">
			</div>
			<div class="form-group">
				<input type="text" id="jform_contact_subject" name="jform[contact_subject]" required="required" aria-required="true" class="required form-control input-lg" placeholder="<?php echo JText::_('JP_FRAMEWORK_CONTACT_FORM_SUBJECT'); ?>">
			</div>
			<div class="form-group">
                        	<textarea class="required form-control input-lg" rows="4" id="jform_contact_message" required="required" aria-required="true" name="jform[contact_message]" placeholder="<?php echo JText::_('JP_FRAMEWORK_CONTACT_FORM_MSG'); ?>"></textarea>
			</div>
			
			<div class="form-group">
			<?php foreach ($this->form->getFieldsets() as $fieldset) : ?>
			<?php if ($fieldset->name === 'captcha' && $this->captchaEnabled) : ?>
				<?php $fields = $this->form->getFieldset($fieldset->name); ?>
				<?php if (count($fields)) : ?>
					<?php if (isset($fieldset->label) && ($legend = trim(JText::_($fieldset->label))) !== '') : ?>
						<legend><?php echo $legend; ?></legend>
					<?php endif; ?>
					<?php foreach ($fields as $field) : ?>
						<?php echo $field->renderField(); ?>
					<?php endforeach; ?>
			<?php endif; ?>
			<?php endif; ?>
			<?php endforeach; ?>
			</div>
			
			<div class="form-group">
                        	<button type="submit" class="btn btn-primary btn-lg btn-block" name="submit"><span class="glyphicon glyphicon-send"></span> <?php echo JText::_('COM_CONTACT_CONTACT_SEND'); ?></button>
			</div>
		
			<input type="hidden" name="option" value="com_contact" />
			<input type="hidden" name="task" value="contact.submit" />
			<input type="hidden" name="return" value="<?php echo $this->return_page; ?>" />
			<input type="hidden" name="id" value="<?php echo $this->contact->slug; ?>" />
			<?php echo JHtml::_('form.token'); ?>

                    </form>

                     <div id="contact-error"></div>
                    <!--////////// end CONTACT FORM ///////////-->

                </div><!-- /col-md-6-->
                
            </div>
        </div>
        
        <?php echo $this->item->event->afterDisplayContent; ?>

    </section>
