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
$Itemid = JFactory::getApplication()->input->get('Itemid');
?>

<?php if(jpf::getparameter('jpf-top') != 0) : ?>
<!-- start top row -->	
<div class="first-row">		
<?= jpf::getColumn('jpf-top', 'top'); ?>		
</div>
<!-- end top row -->
<?php endif; ?>

<div class="wrap">

	<div class="col-md-2">
		<jdoc:include type="modules" name="jpf-left" />
	</div>

	<div class="col-md-10">

		<jdoc:include type="modules" name="jpf-bread" />

		<?php if($Itemid != 115 && $Itemid != 134) : ?>
		<div class="col-md-9 mainbody">
	
			<?php if(jpf::getparameter('jpf-main') != 0) : ?>
			<!-- start main row -->	
			<?= jpf::getColumn('jpf-main', 'main'); ?>		
			<!-- end main row -->
			<?php endif; ?>
	
		</div>
	
		<div class="col-md-3">
			<jdoc:include type="modules" name="jpf-right" />
		</div>	
		<?php endif; ?>
		
		<div class="clearfix"></div>
		
		<div class="col-md-12">
			<?php if(count(JFactory::getApplication()->getMessageQueue())) : ?>  
			<div class="messages"><jdoc:include type="message" /></div>
			<?php endif; ?>
			<?php if((jpf::getparameter('front_component') == 1 && jpf::isFrontpage()) || !jpf::isFrontpage()) : ?>
			<jdoc:include type="component" />
			<?php endif; ?>
			</div>
		
			<?php if(jpf::getparameter('jpf-showcase') != 0) : ?>
			<!-- start showcase row -->	
			<?= jpf::getColumn('jpf-showcase', 'showcase'); ?>		
			<!-- end showcase row -->
			<?php endif; ?>	
		</div>

	</div>
	
</div>

<div class="clearfix"></div>

<?php if(jpf::getparameter('jpf-bottom') != 0) : ?>
<!-- start bottom row -->	
<?= jpf::getColumn('jpf-bottom', 'bottom'); ?>		
<!-- end bottom row -->
<?php endif; ?>
		
<?php if(JFactory::getUser()->guest) : ?>
<div id="message_box" class="hidden-xs hidden-sm">
    <span id="close_message" class="fa fa-times" style="float:right;cursor:pointer"></span>
    <p>Introduce tu usuario para acceder a los precios</p><p></p><p>Si no eres usuario debes <a href="index.php?option=com_botiga&view=register&Itemid=113">registrarte</a></p>
</div>
<?php endif; ?>
<div class="clearfix"></div>

<!-- FOOTER -->
<footer>
	<div class="container">
	<p class="pull-right"><a href="#top" class="cd-top">Back to top</a></p>
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

		<div class="text-left">
			<ul class="social-icons list-unstyled list-inline"> 
				<?php if(jpf::getparameter('flickr') != '') : ?>
			  	<li><a target="_blank" href="<?= jpf::getparameter('flickr'); ?>"><i class="fa fa-flickr"></i></a></li> 
			  	<?php endif; ?>
			  	<?php if(jpf::getparameter('foursquare') != '') : ?>
			  	<li><a target="_blank" href="<?= jpf::getparameter('foursquare'); ?>"><i class="fa fa-foursquare"></i></a></li> 
			  	<?php endif; ?>
			  	<?php if(jpf::getparameter('github') != '') : ?>
			  	<li> <a target="_blank" href="<?= jpf::getparameter('github'); ?>"><i class="fa fa-github"></i></a></li> 
			  	<?php endif; ?>
			  	<?php if(jpf::getparameter('gplus') != '') : ?>
			  	<li> <a target="_blank" href="<?= jpf::getparameter('gplus'); ?>"><i class="fa fa-google-plus"></i></a></li> 
			  	<?php endif; ?>
			  	<?php if(jpf::getparameter('instagram') != '') : ?>
			  	<li> <a target="_blank" href="<?= jpf::getparameter('instagram'); ?>"><i class="fa fa-instagram"></i></a></li> 
			  	<?php endif; ?>
			  	<?php if(jpf::getparameter('pinterest') != '') : ?>
				<li> <a target="_blank" href="<?= jpf::getparameter('pinterest'); ?>"><i class="fa fa-pinterest"></i></a></li>
				<?php endif; ?>
			  	<?php if(jpf::getparameter('facebook') != '') : ?> 
				<li> <a target="_blank" href="<?= jpf::getparameter('facebook'); ?>"><i class="fa fa-facebook"></i></a></li> 
				<?php endif; ?>
			  	<?php if(jpf::getparameter('twitter') != '') : ?> 
				<li> <a target="_blank" href="<?= jpf::getparameter('twitter'); ?>"><i class="fa fa-twitter"></i></a></li> 
				<?php endif; ?>
			  	<?php if(jpf::getparameter('youtube') != '') : ?>
				<li> <a target="_blank" href="<?= jpf::getparameter('youtube'); ?>"><i class="fa fa-youtube"></i></a></li> 
				<?php endif; ?> 
				<?php if(jpf::getparameter('linkedin') != '') : ?>
				<li> <a target="_blank" href="<?= jpf::getparameter('linkedin'); ?>"><i class="fa fa-linkedin"></i></a></li> 
				<?php endif; ?>  
			</ul>
			&copy; DICO - T <a href="tel:34938869318">+34 938869318</a> - F  +34 938893734 - <a href="mailto:info@dicohotel.com">info@dicohotel.com</a>
		</div>
	</p>
	</div>
</footer>
