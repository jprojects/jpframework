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
<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
      <a class="navbar-brand mr-auto mr-lg-0" href="#">
      <?php if(jpf::getparameter('topmenu-logo') != '') : ?>
        <img class="logo-img" src="<?= jpf::getparameter('topmenu-logo'); ?>" alt="<?= jpf::getSitename(); ?>">
        <?php else : ?>
        <?= jpf::getSitename(); ?>
       <?php endif; ?>
      </a>
      <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
         <jdoc:include type="modules" name="jpf-menu" /> 
      </div>
</nav>
