<?php

/**
 * @version    	3.0 jp_framework.php $ kim 2014
 * @package	JPFramework
 * @copyright   Copyright © 2010 - All rights reserved.
 * @license	GNU/GPL
 * @author	kim
 * @author mail kim@afi.cat
 * @website	http://www.afi.cat
 *
*/

$doc = JFactory::getDocument();
$colsc = "container-fluid";
$colsl = "";
$colsr = "";
if($doc->countModules('jpf-left') && $doc->countModules('jpf-right')) { $colsc = 'col-md-6'; $colsl = 'col-md-3'; $colsr = 'col-md-3'; }
if(!$doc->countModules('jpf-left') && $doc->countModules('jpf-right')) { $colsc = 'col-md-8'; $colsl = 'col-md-0'; $colsr = 'col-md-2'; }
if($doc->countModules('jpf-left') && !$doc->countModules('jpf-right')) { $colsc = 'col-md-8'; $colsl = 'col-md-2'; $colsr = 'col-md-0'; }

?>

<?php if(jpf::getparameter('jpf-top') != 0) : ?>
<!-- start top row -->			
<?= jpf::getColumn('jpf-top', 'top'); ?>		
<!-- end top row -->
<?php endif; ?>

<?php if(count(JFactory::getApplication()->getMessageQueue())) : ?>  
<div class="message-container"><jdoc:include type="message" /></div>
<?php endif; ?>
    	
<?php if(jpf::getparameter('jpf-main') != 0) : ?>
<!-- start main row -->	
<?= jpf::getColumn('jpf-main', 'main'); ?>		
<!-- end main row -->
<?php endif; ?>

<div class="container<?php if(jpf::getparameter('fluid', 0) == 1) : ?>-fluid<?php endif;; ?>">
	<div class="row">
		<?php if($doc->countModules('jpf-left')) : ?>
		<div class="<?= $colsl; ?>">
			<jdoc:include type="modules" name="jpf-left" />
		</div>
		<?php endif; ?>

		<div class="<?= $colsc; ?>">
		  
			<?php if(jpf::showComponent()) : ?>
			<div class="mainbody"><jdoc:include type="component" /></div>
			<?php endif; ?>
			
		</div>

		<?php if($doc->countModules('jpf-right')) : ?>
		<div class="<?= $colsr; ?>">
			<jdoc:include type="modules" name="jpf-right" />
		</div>
		<?php endif; ?>
	</div>
</div>

<?php if(jpf::getparameter('jpf-showcase') != 0) : ?>
<!-- start showcase row -->	
<?= jpf::getColumn('jpf-showcase', 'showcase'); ?>		
<!-- end showcase row -->
<?php endif; ?>
    	
<?php if(jpf::getparameter('jpf-bottom') != 0) : ?>
<!-- start bottom row -->	
<?= jpf::getColumn('jpf-bottom', 'bottom'); ?>		
<!-- end bottom row -->
<?php endif; ?>

<!-- FOOTER -->
<footer>
	<div class="container">
	<p class="float-right"><a href="#" class="cd-top">Back to top</a></p>
	<p>
		<?php if(jpf::getparameter('jpf-footer') != 0) : ?>
		<!-- start footer row -->	
		<div class="row">
			<div class="col-xs-12 col-md-4">
			<?= jpf::getColumn('jpf-footer-1', 'footer-1'); ?>	
			</div>
			<div class="col-xs-12 col-md-4">
			<?= jpf::getColumn('jpf-footer-2', 'footer-2'); ?>	
			</div>
			<div class="col-xs-12 col-md-4">
			<?= jpf::getColumn('jpf-footer-3', 'footer-3'); ?>	
			</div>		
		</div>
		<!-- end footer row -->
		<?php endif; ?>

		<div class="text-center">
			<div class="social-icons"> 
				<?= jpf::getSocial(); ?>  
			</div>
			<?=jpf::getSitename(); ?> &copy; <?=date('Y'); ?>
			<?php if(jpf::getparameter('privacy') != '') : ?>
			<a href="<?=jpf::getArticleByLanguage('privacy'); ?>"><?=JText::_('JP_FRAMEWORK_PRIVACY'); ?></a> 
			&middot;
			<?php endif; ?>
		
			<?php if(jpf::getparameter('terms') != '') : ?>
			<a href="<?=jpf::getArticleByLanguage('terms'); ?>"><?=JText::_('JP_FRAMEWORK_TERMS'); ?></a>
			<?php endif; ?>
		</div>
	</p>
	</div>
</footer>
