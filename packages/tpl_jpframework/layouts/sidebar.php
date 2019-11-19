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

?>

<script type="text/javascript">
jQuery(document).ready(function () {
    jQuery('#sidebarCollapse').on('click', function () {
        jQuery('#submenu').toggle();
    });
});
</script>

<div class="wrapper">

    <!-- Sidebar  -->
    <nav id="sidebar">
    	<div class="row">
			<div class="col-xs-1 mx-auto fixbar">
				<div class="sidebar-header">
				    <a id="sidebarCollapse"><i class="fa fa-bars fa-2x"></i></a>				    
				</div>
		    </div>	    
        </div>
    </nav>
    <nav id="submenu">
		<jdoc:include type="modules" name="jpf-menu" />	
	</nav>

    <!-- Page Content  -->
    <div id="content">

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
		
		<?php if(jpf::showComponent()) : ?>
        <div class="mainbody">
			<div><jdoc:include type="component" /></div>		
		</div>
		<?php endif; ?>

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
    </div>
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
					<p><?=jpf::getSitename(); ?> &copy; <?=date('Y'); ?></p>
					<?php if(jpf::getparameter('privacy') != '') : ?>
					<a href="index.php?Itemid=<?=jpf::getArticleByLanguage('privacy'); ?>"><?=JText::_('JP_FRAMEWORK_PRIVACY'); ?></a> 
					&middot;
					<?php endif; ?>
					
					<?php if(jpf::getparameter('cookie') != '') : ?>
					<a href="index.php?Itemid=<?=jpf::getArticleByLanguage('cookie'); ?>"><?=JText::_('JP_FRAMEWORK_COOKIES'); ?></a>
					&middot;
					<?php endif; ?>
				
					<?php if(jpf::getparameter('terms') != '') : ?>
					<a href="index.php?Itemid=<?=jpf::getArticleByLanguage('terms'); ?>"><?=JText::_('JP_FRAMEWORK_TERMS'); ?></a>
					<?php endif; ?>
				</div>
			</p>
		</div>
	</footer>
</div>
