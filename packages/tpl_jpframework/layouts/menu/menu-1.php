<?php
/**
 * @version    	1.2.0 menu-1.php $ kim 2014
 * @package		JP_Framework
 * @copyright   Copyright © 2014 - All rights reserved.
 * @license		GNU/GPL
 * @author		kim
 * @author mail kim@afi.cat
 * @website		http://www.afi.cat
 *
 */

?>
<!-- menu 1 example: http://getbootstrap.com/docs/4.1/examples/carousel/ -->
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="index.php">
        <?php if(jpf::getparameter('topmenu-logo') != '') : ?>
            <img class="logo-img" src="<?= jpf::getparameter('topmenu-logo'); ?>" alt="<?= jpf::getSitename(); ?>">
        <?php else : ?>
            <strong><?= jpf::getSitename(); ?></strong>
        <?php endif; ?>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
        	<!-- add class navbar-nav mr-auto -->
         	<jdoc:include type="modules" name="jpf-menu" />          
        </div>
</nav>

