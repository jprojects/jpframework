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

<!-- menu 4 -->
<nav class="navbar navbar-default" id="colorful-nav">
    <div>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu3">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="menu3">
        	<!-- needs class nav navbar nav -->
        	<jdoc:include type="modules" name="jpf-menu" />
            <!-- 
            ToDo: los items del menu deben ser asi modificando el mod_menu seguramente
            <li class="home"><a href="#"><span class="glyphicon glyphicon-home"></span><h5>HOME</h5></a></li> 
            -->
        </div>
    </div>
</nav>
