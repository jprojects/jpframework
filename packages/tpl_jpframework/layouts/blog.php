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
$colsc = "col-md-12";
$colsl = "";
$colsr = "";
if($doc->countModules('jpf-left') && $doc->countModules('jpf-right')) { $colsc = 'col-md-6'; $colsl = 'col-md-4'; $colsr = 'col-md-2'; }
if(!$doc->countModules('jpf-left') && $doc->countModules('jpf-right')) { $colsc = 'col-md-9'; $colsl = ''; $colsr = 'col-md-3'; }
if($doc->countModules('jpf-left') && !$doc->countModules('jpf-right')) { $colsc = 'col-md-9'; $colsl = 'col-md-3'; $colsr = ''; }

?>

<header>
<?= jpf::getLayout(jpf::getparameter('menu', 'menu-1'), 'menu'); ?>
</header>

<main role="main">

	<?php if(count(JFactory::getApplication()->getMessageQueue())) : ?>  
	<div class="message-container"><jdoc:include type="message" /></div>
	<?php endif; ?>
	
	<?php if(jpf::getparameter('jpf-top') != 0) : ?>
	<!-- start top row -->			
	<?= jpf::getColumn('jpf-top', 'top'); ?>		
	<!-- end top row -->
	<?php endif; ?>
			
	<?php if(jpf::getparameter('jpf-main') != 0) : ?>
	<!-- start main row -->	
	<?= jpf::getColumn('jpf-main', 'main'); ?>		
	<!-- end main row -->
	<?php endif; ?>

	<div class="container<?php if(jpf::getparameter('fluid', 0) == 1) : ?>-fluid<?php endif; ?> mainbody">
		<div class="row">			

			<div class="<?= $colsc; ?>">			  
				<?php if(jpf::showComponent()) : ?>
				<div><jdoc:include type="component" /></div>
				<?php endif; ?>				
			</div>
			
			<?php if($doc->countModules('jpf-left')) : ?>
			<div class="<?= $colsl; ?>">
				<jdoc:include type="modules" name="jpf-left" style="panel" />
			</div>
			<?php endif; ?>

			<?php if($doc->countModules('jpf-right')) : ?>
			<div class="<?= $colsr; ?>">
				<jdoc:include type="modules" name="jpf-right" style="panel" />
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

</main>

<!-- FOOTER -->
<?= jpf::getLayout(jpf::getparameter('footer', 'footer1'), 'footer'); ?>
