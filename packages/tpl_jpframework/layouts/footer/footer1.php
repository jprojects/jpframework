<?php

/**
 * @version 3.0 jp_framework.php $ kim 2014
 * @package	JPFramework
 * @copyright Copyright © 2010 - All rights reserved.
 * @license	GNU/GPL
 * @author	kim
 * @author mail kim@afi.cat
 * @website	http://www.afi.cat
 *
*/

?>

<footer>
	<div class="container">
		
		<div class="text-center mb-2"><img src="images/Logo_CanTonXic_Blanc.png" class="img-fluid w-25" alt="..."></div>
	
		<?php if(jpf::getparameter('jpf-footer') != 0) : ?>
		<!-- start footer row -->	
		<div class="row">
			<div class="col-xs-12 col-md-4">
				<jdoc:include type="modules" name="jpf-footer-1" />	
			</div>
			<div class="col-xs-12 col-md-4">
			    <jdoc:include type="modules" name="jpf-menu" />	
			</div>
			<div class="col-xs-12 col-md-4">
				<div class="social text-center text-md-end mb-2">
					<img class="icon" src="images/Icona_Telefon_Blanc.png" alt="...">
					<img class="icon" src="images/Icona_Correu_Blanc.png" alt="...">
					<img class="icon" src="images/Icona_Whatsapp_Blanc.png" alt="...">
					<img class="icon" src="images/Icona_Facebook_Blanc.png" alt="...">
					<img class="icon" src="images/Icona_Ubicacio_Blanc.png" alt="...">
					<img class="icon" src="images/Icona_Instagram_Blanc.png" alt="...">
				</div>
				<a href="index.php?Itemid=<?=jpf::getArticleByLanguage('privacy'); ?>"><?=JText::_('JP_FRAMEWORK_PRIVACY'); ?></a> 	
				<a href="index.php?Itemid=<?=jpf::getArticleByLanguage('cookie'); ?>"><?=JText::_('JP_FRAMEWORK_COOKIES'); ?></a> 
				<a href="index.php?Itemid=<?=jpf::getArticleByLanguage('terms'); ?>"><?=JText::_('JP_FRAMEWORK_TERMS'); ?></a>
				<a href="index.php?Itemid=<?=jpf::getArticleByLanguage('condicions'); ?>"><?=JText::_('JP_FRAMEWORK_CONDITIONS'); ?></a>
			</div>		
		</div>
		<!-- end footer row -->
		<?php endif; ?>
	
	</div>
</footer>
<div class="subfooter text-center py-2">
	<img class="img-fluid" src="images/logo_footer.png" alt="...">
</div>