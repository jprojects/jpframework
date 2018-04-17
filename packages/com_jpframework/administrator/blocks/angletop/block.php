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
$color   = blocksHelper::getBlockParameter($blockid, 'block_color');
?>

<style>
.angle-top, .angle-bottom {
    overflow: visible;
    position: relative;
    margin-top: 70px !important;
    padding-bottom: 60px !important;
    padding-top: 90px !important;
    border-color: <?= $color; ?>;
    background-color: <?= $color; ?> !important;
}
.angle-top:before {
    background-color: <?= $color; ?>;
    background: none repeat scroll 0 0 #fff;
    content: "";
    margin-top: -149px;
    min-height: 100px;
    position: absolute;
    -webkit-transform: skewY(-2deg);
    -moz-transform: skewY(-2deg);
    -ms-transform: skewY(-2deg);
    -o-transform: skewY(-2deg);
    transform: skewY(-2deg);
    width: 100%;
    z-index: 1;
}
</style>

<div class="cta angle-top"></div>
