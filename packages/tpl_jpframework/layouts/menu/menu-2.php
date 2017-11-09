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

JHtml::script('templates/jpframework/js/jquery.navgoco.js');

?>

<script>
jQuery(document).ready(function(){												

       //Navigation Menu Slider
        jQuery('#nav-expander').on('click',function(e){
      		e.preventDefault();
      		jQuery('body').toggleClass('nav-expanded');
      	});
      	jQuery('#nav-close').on('click',function(e){
      		e.preventDefault();
      		jQuery('body').removeClass('nav-expanded');
      	});
      	
      	
      	// Initialize navgoco with default options
        jQuery(".main-menu").navgoco({
            caret: '<span class="caret"></span>',
            accordion: false,
            openClass: 'open',
            save: true,
            cookie: {
                name: 'navgoco',
                expires: false,
                path: '/'
            },
            slide: {
                duration: 300,
                easing: 'swing'
            }
        });
});
</script>

<nav>
<jdoc:include type="modules" name="jpf-menu" />
</nav>
 
<div class="navbar navbar-inverse navbar-fixed-top">      
 
    <a href="index.php" class="navbar-brand">
                    <?php if(jpf::getparameter('topmenu-logo') != '') : ?>
                    <img class="logo-img" src="<?= jpf::getparameter('topmenu-logo'); ?>" alt="<?= jpf::getSitename(); ?>">
                    <?php else : ?>
                    <?= jpf::getSitename(); ?>
                    <?php endif; ?>
           </a> 
    <div class="navbar-header pull-right">
      <a id="nav-expander" class="nav-expander fixed">
  		<i class="fa fa-bars fa-lg white"></i>
      </a>
    </div>
</div>
