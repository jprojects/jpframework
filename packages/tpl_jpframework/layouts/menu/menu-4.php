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

<script>
jQuery(function () {
  'use strict'

  jQuery('[data-toggle="offcanvas"]').on('click', function () {
    jQuery('.offcanvas-collapse').toggleClass('open')
  })
})
</script>

<!-- menu 4 example: http://getbootstrap.com/docs/4.1/examples/offcanvas/ -->
<nav class="navbar navbar-expand-lg fixed-top">
      <a class="navbar-brand mr-auto mr-lg-0" href="index.php">
      <?php if(jpf::getparameter('topmenu-logo') != '') : ?>
        <img class="logo-img" src="<?= JURI::root().jpf::getparameter('topmenu-logo'); ?>" alt="<?= jpf::getSitename(); ?>">
        <?php else : ?>
        <?= jpf::getSitename(); ?>
       <?php endif; ?>
      </a>
      <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
        <i class="fas fa-bars"></i>
      </button>

      <div class="navbar-collapse offcanvas-collapse justify-content-end" id="navbarsExampleDefault">
          <jdoc:include type="modules" name="jpf-menu" /> 
      </div>
</nav>
