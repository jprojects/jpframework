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

<!-- menu 2  example: http://getbootstrap.com/docs/4.1/examples/pricing/ -->
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
      <div class="my-0 mr-md-auto font-weight-normal">
      <?php if(jpf::getparameter('topmenu-logo') != '') : ?>
        <img class="logo-img" src="<?= jpf::getparameter('topmenu-logo'); ?>" alt="<?= jpf::getSitename(); ?>">
        <?php else : ?>
        <?= jpf::getSitename(); ?>
       <?php endif; ?>
      </div>
      <nav class="my-2 my-md-0 mr-md-3">
        <jdoc:include type="modules" name="jpf-menu" />
      </nav>
      <a class="btn btn-outline-primary" href="#">Sign up</a>
</div>
