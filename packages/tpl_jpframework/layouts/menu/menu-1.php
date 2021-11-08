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
<nav class="navbar navbar-expand-xl fixed-top navbar-dark bg-dark bg-jp">
  <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
        <?php if(jpf::getparameter('topmenu-logo') != '') : ?>
            <img class="logo-img" src="<?= jpf::getparameter('topmenu-logo'); ?>" alt="<?= jpf::getSitename(); ?>">
        <?php else : ?>
            <strong><?= jpf::getSitename(); ?></strong>
        <?php endif; ?>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
         	<jdoc:include type="modules" name="jpf-menu" /> <?php if(jpf::getparameter('language_menu', 0) == 1) : ?>| <jdoc:include type="modules" name="jpf-lang" /><?php endif; ?>
        </div>
  </div>
</nav>

