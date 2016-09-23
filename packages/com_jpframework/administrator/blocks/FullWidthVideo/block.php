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

<section id="<?php echo blocksHelper::getBlockParameter($blockid, 'uniqid', 'block-'.$blockid); ?>">

<div class="overlay">
        <h1><?= blocksHelper::getBlockParameter($blockid, 'video_title'); ?></h1>
    </div>
    <div class="videoContainer">
        <video autoplay>
            <source src="<?= blocksHelper::getBlockParameter($blockid, 'video_mp4'); ?>" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
            <source src="<?= blocksHelper::getBlockParameter($blockid, 'video_webm'); ?>" type='video/webm; codecs="vp8, vorbis"' />

            Video not supported.
        </video>
    </div>
</section>
