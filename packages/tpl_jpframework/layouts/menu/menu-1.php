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
<!-- menu 1 -->
<section id="header">

        <nav class="navbar navbar-fixed-top" role="navigation" id="menu-1">

            <div class="navbar-inner">
                <div class="container">

                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target="#navigation"></button>

                    <!-- Logo goes here - replace the image with your -->
                    <a href="index.php" class="navbar-brand">
                    <?php if(jpf::getparameter('topmenu-logo') != '') : ?>
                    <img class="logo-img" src="<?php echo jpf::getparameter('topmenu-logo'); ?>" alt="<?php echo jpf::getSitename(); ?>">
                    <?php else : ?>
                    <?php echo jpf::getSitename(); ?>
                    <?php endif; ?>
                    </a>
                    <div class="collapse navbar-collapse main-nav" id="navigation">

                        <jdoc:include type="modules" name="jpf-menu" />

                    </div><!-- /nav-collapse -->
                </div><!-- /container -->
            </div><!-- /navbar-inner -->
        </nav>

    </section>
