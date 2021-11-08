<?php
/**
 * @version    	1.2.0 menu-2.php $ kim 2014
 * @package		JP_Framework
 * @copyright   Copyright © 2014 - All rights reserved.
 * @license		GNU/GPL
 * @author		kim
 * @author mail kim@afi.cat
 * @website		http://www.afi.cat
 *
*/

?>

<header class="d-flex flex-wrap justify-content-center py-3">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <?php if(jpf::getparameter('topmenu-logo') != '') : ?>
          <img class="logo-img" src="<?= JURI::root().jpf::getparameter('topmenu-logo'); ?>" alt="<?= jpf::getSitename(); ?>">
        <?php else : ?>
          <?= jpf::getSitename(); ?>
        <?php endif; ?>
    </a>

    <ul class="nav nav-pills d-flex align-items-center">
      <jdoc:include type="modules" name="jpf-menu" /> <?php if(jpf::getparameter('language_menu', 0) == 1) : ?>| <jdoc:include type="modules" name="jpf-lang" /><?php endif; ?>
    </ul>
  </header>