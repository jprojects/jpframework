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

                    <a href="index.php" class="navbar-brand">
                    <?php if(jpf::getparameter('topmenu-logo') != '') : ?>
                    <img class="logo-img" src="<?php echo jpf::getparameter('topmenu-logo'); ?>" alt="<?php echo jpf::getSitename(); ?>">
                    <?php else : ?>
                    <?php echo jpf::getSitename(); ?>
                    <?php endif; ?>
                    </a>
                    <div class="collapse navbar-collapse main-nav" id="navigation">

                        <jdoc:include type="modules" name="jpf-menu" />

			<ul class="nav navbar-nav  pull-right">
				<?php
				$modules = JModuleHelper::getModules('jpf-inside-menu');
				if (count($modules)) {
				    $i = 1;
				    foreach ($modules as $module) {
				        echo '<li class="dropdown"><a href="#">'.$module->title.' <span class="caret"></span></a>';
				        echo '<ul class="dropdown-menu">
				        	<li>
				              <div class="container-cart">
				                    <h4 class="modal-title" id="mod-'.$module->id.'">'.$module->title.'</h4>
				                    <hr>
				                    '.JModuleHelper::renderModule($module).'
				              </div>
				            </li>
				        </ul></li>';
				        $i++;
				    }
				}
				?>
			</ul>

                    </div><!-- /nav-collapse -->
                </div><!-- /container -->
            </div><!-- /navbar-inner -->
        </nav>

    </section>
