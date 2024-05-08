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
<div class="topbar container">
  <div class="row">
      <div class="col-12 col-md-4 pt-2">
        <div class="d-none d-md-block">
            <img class="icon" src="images/user_icon.png" alt="..."> <b>Área del cliente</b></div>
        </div>
      <div class="col-12 col-md-4"><img class="img-fluid" src="images/logo_color.png" alt="Can Ton Xic"></div>
      <div class="col-12 col-md-4 text-end pt-2"><jdoc:include type="modules" name="jpf-lang" /> 
      <div class="social d-none d-md-block">
        <img class="icon" src="images/phone_icon.png" alt="...">
        <img class="icon" src="images/mail_icon.png" alt="...">
        <img class="icon" src="images/whatsapp_icon.png" alt="...">
        <img class="icon" src="images/facebook_icon.png" alt="...">
        <img class="icon" src="images/loc_icon.png" alt="...">
        <img class="icon" src="images/instagram_icon.png" alt="...">
      </div>
    </div>
  </div>
</div>

<!-- menu 1 -->
<nav class="navbar navbar-expand-xl <?php if(jpf::getparameter('topmenu-fixed') == 1) : ?>fixed-top<?php endif; ?> bg-jp">
  <div class="container<?= jpf::getparameter('topmenu-fluid', 0) == 0 ? '' : '-fluid'; ?>">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarCollapse">
         	<jdoc:include type="modules" name="jpf-menu" />
        </div>
  </div>
</nav>

