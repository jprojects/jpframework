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
    <div class="container py-5">
        <div class="row row-cols-5 py-5 my-5 text-center text-md-start">
            <div class="col-12 col-md-5">
                <a href="/" class="mb-3 link-light text-decoration-none">
                    <?php if(jpf::getparameter('topmenu-logo') != '') : ?>
                    <img class="logo-img" src="<?= jpf::getparameter('topmenu-logo'); ?>" alt="<?= jpf::getSitename(); ?>">
                    <?php else : ?>
                    <strong><?= jpf::getSitename(); ?></strong>
                    <?php endif; ?>
                </a>
                <p class="text-muted">&copy; <?= date('Y'); ?></p>
                <hr class="featurette-divider">
                <p><?= jpf::getSocial(); ?></p>
            </div>

            <div class="d-block d-md-none mx-auto my-3 border-top"></div>

            <div class="col-12 col-md-3">
                <jdoc:include type="modules" name="jpf-footer-1" />	
            </div>

            <div class="d-block d-md-none mx-auto my-3 border-top"></div>

            <div class="col-12 col-md-2">
                <jdoc:include type="modules" name="jpf-footer-2" />	
            </div>

            <div class="d-block d-md-none mx-auto my-3 border-top"></div>

            <div class="col-12 col-md-2">
            <?php if(jpf::getparameter('privacy') != '') : ?>
            <p><a class="nav-link p-0" href="index.php?Itemid=<?=jpf::getArticleByLanguage('privacy'); ?>"><?=JText::_('JP_FRAMEWORK_PRIVACY'); ?></a></p>
            <?php endif; ?>
        
            <?php if(jpf::getparameter('cookie') != '') : ?>
            <p><a class="nav-link p-0" href="index.php?Itemid=<?=jpf::getArticleByLanguage('cookie'); ?>"><?=JText::_('JP_FRAMEWORK_COOKIES'); ?></a></p>
            <?php endif; ?>
        
            <?php if(jpf::getparameter('terms') != '') : ?>
            <p><a class="nav-link p-0" href="index.php?Itemid=<?=jpf::getArticleByLanguage('terms'); ?>"><?=JText::_('JP_FRAMEWORK_TERMS'); ?></a></p>
            <?php endif; ?>
            </div>
        </div>
    </div>
</footer>