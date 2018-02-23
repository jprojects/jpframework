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
<div class="first-row">		
<?php echo jpf::getColumn('jpf-top', 'top'); ?>		
</div>
<!-- end top row -->
<?php endif; ?>
    	
<?php if(jpf::getparameter('jpf-main') != 0) : ?>
<!-- start main row -->	
<?php echo jpf::getColumn('jpf-main', 'main'); ?>		
<!-- end main row -->
<?php endif; ?>

<div class="row" style="margin:0;">
<?php if($doc->countModules('jpf-left')) : ?>
<div class="<?php echo $colsl; ?>">
    <jdoc:include type="modules" name="jpf-left" />
</div>
<?php endif; ?>

<div class="<?php echo $colsc; ?> mainbody">
  
  	<?php if(count(JFactory::getApplication()->getMessageQueue())) : ?>  
    <div class="container top20"><jdoc:include type="message" /></div>
    <?php endif; ?>
    <?php if(jpf::showComponent()) : ?>
	<jdoc:include type="component" />
	<?php endif; ?>
	
</div>

<?php if($doc->countModules('jpf-right')) : ?>
<div class="<?php echo $colsr; ?>">
	<jdoc:include type="modules" name="jpf-right" />
</div>
<?php endif; ?>
</div>

<?php if(jpf::getparameter('jpf-showcase') != 0) : ?>
<!-- start showcase row -->	
<?php echo jpf::getColumn('jpf-showcase', 'showcase'); ?>		
<!-- end showcase row -->
<?php endif; ?>
    	
<?php if(jpf::getparameter('jpf-bottom') != 0) : ?>
<!-- start bottom row -->	
<?php echo jpf::getColumn('jpf-bottom', 'bottom'); ?>		
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
			<div class="col-xs-12 col-md-4">
			<?php echo jpf::getColumn('jpf-footer-1', 'footer-1'); ?>	
			</div>
			<div class="col-xs-12 col-md-4">
			<?php echo jpf::getColumn('jpf-footer-2', 'footer-2'); ?>	
			</div>
			<div class="col-xs-12 col-md-4">
			<?php echo jpf::getColumn('jpf-footer-3', 'footer-3'); ?>	
			</div>		
		</div>
		<!-- end footer row -->
		<?php endif; ?>

		<div class="text-center">
			<ul class="social-icons list-unstyled list-inline"> 
				<?php if(jpf::getparameter('flickr') != '') : ?>
			  	<li><a target="_blank" href="<?php echo jpf::getparameter('flickr'); ?>"><i class="fa fa-flickr"></i></a></li> 
			  	<?php endif; ?>
			  	<?php if(jpf::getparameter('foursquare') != '') : ?>
			  	<li><a target="_blank" href="<?php echo jpf::getparameter('foursquare'); ?>"><i class="fa fa-foursquare"></i></a></li> 
			  	<?php endif; ?>
			  	<?php if(jpf::getparameter('github') != '') : ?>
			  	<li> <a target="_blank" href="<?php echo jpf::getparameter('github'); ?>"><i class="fa fa-github"></i></a></li> 
			  	<?php endif; ?>
			  	<?php if(jpf::getparameter('gplus') != '') : ?>
			  	<li> <a target="_blank" href="<?php echo jpf::getparameter('gplus'); ?>"><i class="fa fa-google-plus"></i></a></li> 
			  	<?php endif; ?>
			  	<?php if(jpf::getparameter('instagram') != '') : ?>
			  	<li> <a target="_blank" href="<?php echo jpf::getparameter('instagram'); ?>"><i class="fa fa-instagram"></i></a></li> 
			  	<?php endif; ?>
			  	<?php if(jpf::getparameter('pinterest') != '') : ?>
				<li> <a target="_blank" href="<?php echo jpf::getparameter('pinterest'); ?>"><i class="fa fa-pinterest"></i></a></li>
				<?php endif; ?>
			  	<?php if(jpf::getparameter('facebook') != '') : ?> 
				<li> <a target="_blank" href="<?php echo jpf::getparameter('facebook'); ?>"><i class="fa fa-facebook"></i></a></li> 
				<?php endif; ?>
			  	<?php if(jpf::getparameter('twitter') != '') : ?> 
				<li> <a target="_blank" href="<?php echo jpf::getparameter('twitter'); ?>"><i class="fa fa-twitter"></i></a></li> 
				<?php endif; ?>
			  	<?php if(jpf::getparameter('youtube') != '') : ?>
				<li> <a target="_blank" href="<?php echo jpf::getparameter('youtube'); ?>"><i class="fa fa-youtube"></i></a></li> 
				<?php endif; ?> 
				<?php if(jpf::getparameter('linkedin') != '') : ?>
				<li> <a target="_blank" href="<?php echo jpf::getparameter('linkedin'); ?>"><i class="fa fa-linkedin"></i></a></li> 
				<?php endif; ?>  
			</ul>
			<?= jpf::getSitename(); ?> &copy; <?= date('Y'); ?> Todos los derechos reservados.
			<?php if(jpf::getparameter('privacy') != '') : ?>
			<a href="<?= jpf::getArticleByLanguage('privacy'); ?>"><?= JText::_('JP_FRAMEWORK_PRIVACY'); ?></a> 
			&middot;
			<?php endif; ?>
		
			<?php if(jpf::getparameter('terms') != '') : ?>
			<a href="<?= jpf::getArticleByLanguage('terms'); ?>"><?= JText::_('JP_FRAMEWORK_TERMS'); ?></a>
			<?php endif; ?>
		</div>
	</p>
	</div>
</footer>
