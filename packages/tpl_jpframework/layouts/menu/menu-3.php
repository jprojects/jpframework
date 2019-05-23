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

<!-- menu 3 example: http://getbootstrap.com/docs/4.1/examples/album/ -->
<div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 col-md-7 py-4">
              <h4 class="text-white"><?= jpf::getSitename(); ?></h4>
              <p class="text-muted"><?= jpf::getparameter('topmenu-about'); ?></p>
            </div>
            <div class="col-sm-4 offset-md-1 py-4">
              <h4 class="text-white">Menú</h4>
              <!-- add class list-unstyled -->
              <jdoc:include type="modules" name="jpf-menu" />  
            </div>
          </div>
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
          <a href="index.php" class="navbar-brand d-flex align-items-center">
            <img class="img-fluid" src="<?= jpf::getparameter('topmenu-logo'); ?>" alt="<?= jpf::getSitename(); ?>">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
