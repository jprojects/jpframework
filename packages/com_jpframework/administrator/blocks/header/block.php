<?php

/**
 * @version     1.0.0
 * @package     com_jpframework
 * @copyright   Copyright (C) 2015. Todos los derechos reservados.
 * @license     Licencia Pública General GNU versión 2 o posterior. Consulte LICENSE.txt
 * @author      aficat <kim@aficat.com> - http://www.afi.cat
 */
// No direct access
defined('_JEXEC') or die;

$blockid = JRequest::getVar('blockid');
?>

<style>
.header { 
	height: 250px;
	width: 100%;
}
.header-img {
    background-image: url(<?= JURI::root().blocksHelper::getBlockParameter($blockid, 'header_logo'); ?>);
    height: 100vh;
    max-height: 250px;
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;
}
</style>

<div class="header" id="<?= blocksHelper::getBlockParameter($blockid, 'uniqid', 'block-'.$blockid); ?>">
	<div class="header-img"></div>
</div>
