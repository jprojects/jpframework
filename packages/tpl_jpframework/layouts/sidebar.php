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
			<div class="col-xs-1 mx-auto">
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

        <div class="container<?php if(jpf::getparameter('fluid', 0) == 1) : ?>-fluid<?php endif;; ?> mainbody">
				  
			<?php if(jpf::showComponent()) : ?>
			<div><jdoc:include type="component" /></div>
			<?php endif; ?>
				
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
    </div>
</div>