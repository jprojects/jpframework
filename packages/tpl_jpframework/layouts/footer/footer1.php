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
		<p class="float-right"><a href="#" class="cd-top"><?=JText::_('JP_FRAMEWORK_BACK_TO_TOP'); ?></a></p>
	
		<?php if(jpf::getparameter('jpf-footer') != 0) : ?>
		<!-- start footer row -->	
		<div class="row">
			<div class="col-xs-12 col-md-4">
				<jdoc:include type="modules" name="jpf-footer-1" />	
			</div>
			<div class="col-xs-12 col-md-4">
			    <jdoc:include type="modules" name="jpf-footer-2" />	
			</div>
			<div class="col-xs-12 col-md-4">
				<jdoc:include type="modules" name="jpf-footer-3" />	
			</div>		
		</div>
		<!-- end footer row -->
		<?php endif; ?>

		<div class="text-center">
			<div class="social-icons"> 
				<?= jpf::getSocial(); ?>  
			</div>
			<p><?=jpf::getSitename(); ?> &copy; <?= date('Y'); ?></p>
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
	
	</div>
</footer>