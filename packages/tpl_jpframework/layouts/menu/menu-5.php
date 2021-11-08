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
jQuery(document).ready(function(){
    function resizeNav() {
        jQuery(".menu").css({"height": window.innerHeight});
        var radius = Math.sqrt(Math.pow(window.innerHeight, 2) + Math.pow(window.innerWidth, 2));
        var diameter = radius * 2;
        jQuery(".nav-layer").width(diameter);
        jQuery(".nav-layer").height(diameter);
        jQuery(".nav-layer").css({"margin-top": -radius, "margin-left": -radius});      
    }
    jQuery(".nav-toggle").click(function() {
        jQuery(".nav-toggle, .nav-layer, .menu").toggleClass("open");
        if(jQuery(".nav-toggle").hasClass('open')) {
        	jQuery(".logo").attr("src", "<?= JURI::base(); ?>images/logo_nyam.png");
        } else {
        	jQuery(".logo").attr("src", "<?= JURI::base(); ?>images/logo_nyam.png");
        }
    });
    jQuery(window).resize(resizeNav);
    resizeNav();
    
    //language into menu
    var html = jQuery('#lang').html();
    jQuery('.mod-list').prepend(html);
});
</script>

<!-- menu 5 example: https://bootsnipp.com/snippets/35pvq -->
<div class="topmenu fixed-top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="navbar">
                    <nav class="menu">
                        <div class="nav-layer"></div>
                        <div id="lang" style="display:none;"><jdoc:include type="modules" name="jpf-lang" /></div>
                        <jdoc:include type="modules" name="jpf-menu" /> <?php if(jpf::getparameter('language_menu', 0) == 1) : ?>| <jdoc:include type="modules" name="jpf-lang" /><?php endif; ?>
                        
                    </nav>
                    <?php if(jpf::getparameter('topmenu-logo') != '') : ?>
                        <img src="<?= jpf::getparameter('topmenu-logo'); ?>" alt="<?= jpf::getSitename(); ?>" class="img-fluid logo clickable">
                    <?php else : ?>
                        <strong><?= jpf::getSitename(); ?></strong>
                    <?php endif; ?>
                    <a class="nav-toggle">
                        <span></span>
                        <span></span>
                        <span></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
