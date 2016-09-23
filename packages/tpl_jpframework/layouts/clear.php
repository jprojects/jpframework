<?php

/**
 * @version    	2.0 jp_framework.php $ kim 2014
 * @package	JPFramework
 * @copyright   Copyright © 2010 - All rights reserved.
 * @license	GNU/GPL
 * @author	kim
 * @author mail kim@afi.cat
 * @website	http://www.afi.cat
 *
*/

if($this->countModules('jpf-left') && $this->countModules('jpf-right')) { $colsc = 6; $colsl = 3; $colsr = 3; }
if(!$this->countModules('jpf-left') && $this->countModules('jpf-right')) { $colsc = 8; $colsl = 0; $colsr = 4; }
if($this->countModules('jpf-left') && !$this->countModules('jpf-right')) { $colsc = 8; $colsl = 4; $colsr = 0; }
if(!$this->countModules('jpf-left') && !$this->countModules('jpf-right')) { $colsc = 12; $colsl = 0; $colsr = 0; }

?>

<?php if(jpf::getparameter('jpf-top') != 0) : ?>
<!-- start top row -->	
<div class="row first-row">		
<?php echo jpf::getColumn('jpf-top', 'top'); ?>		
</div>
<!-- end top row -->
<?php endif; ?>
    	
<?php if(jpf::getparameter('jpf-main') != 0) : ?>
<!-- start main row -->	
<div class="row">
<?php echo jpf::getColumn('jpf-main', 'main'); ?>		
</div>
<!-- end main row -->
<?php endif; ?>

<div class="container">
<?php if($this->countModules('jpf-left')) : ?>
<div class="col-lg-<?php echo $colsl; ?>">
    <jdoc:include type="modules" name="jpf-left" />
</div>
<?php endif; ?>

<div class="col-lg-<?php echo $colsc; ?>">
    
    	<jdoc:include type="message" />
	<jdoc:include type="component" />
	
</div>

<?php if($this->countModules('jpf-right')) : ?>
<div class="col-lg-<?php echo $colsr; ?>">
	<jdoc:include type="modules" name="jpf-right" />
</div>
<?php endif; ?>
</div>

<?php if(jpf::getparameter('jpf-showcase') != 0) : ?>
<!-- start showcase row -->	
<div class="row">
<?php echo jpf::getColumn('jpf-showcase', 'showcase'); ?>		
</div>
<!-- end showcase row -->
<?php endif; ?>
    	
<?php if(jpf::getparameter('jpf-bottom') != 0) : ?>
<!-- start bottom row -->	
<div class="row">
<?php echo jpf::getColumn('jpf-bottom', 'bottom'); ?>		
</div>
<!-- end bottom row -->
<?php endif; ?>

<!-- FOOTER -->
<footer>
	<div class="container">
	<p class="pull-right"><a href="#" class="cd-top">Back to top</a></p>
	<p>
		<?php if(jpf::getparameter('jpf-footer') != 0) : ?>
		<!-- start footer row -->	
		<div class="row">
		<?php echo jpf::getColumn('jpf-footer', 'footer'); ?>		
		</div>
		<!-- end footer row -->
		<?php endif; ?>

		<div class="text-center">
			&copy; <?php echo date('Y'); ?> <?php echo jpf::getSitename(); ?>
			<?php if(jpf::getparameter('privacy') != '') : ?>
			<a href="<?php echo jpf::getparameter('privacy'); ?>"><?= JText::_('JP_FRAMEWORK_PRIVACY'); ?></a> 
			&middot;
			<?php endif; ?>
		
			<?php if(jpf::getparameter('terms') != '') : ?>
			<a href="<?php echo jpf::getparameter('terms'); ?>"><?= JText::_('JP_FRAMEWORK_TERMS'); ?></a>
			<?php endif; ?>
		</div>
	</p>
	</div>
</footer>
