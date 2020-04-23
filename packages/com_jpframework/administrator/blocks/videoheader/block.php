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

$blockid   = JRequest::getVar('blockid');
$video_subheader = blocksHelper::getBlockParameter($blockid, 'video_subheader', '');
$video_header = blocksHelper::getBlockParameter($blockid, 'video_header', '');
blocksHelper::getBlockParameter($blockid, 'video_autoplay', 1) ? $video_autoplay = 'autoplay="autoplay"' : $video_autoplay = '';
blocksHelper::getBlockParameter($blockid, 'video_muted', 1) ? $video_muted = 'muted="muted"' : $video_muted = '';
blocksHelper::getBlockParameter($blockid, 'video_loop', 1) ? $video_loop = 'loop="loop"' : $video_loop = '';
?>

<style>
.videoheader {
  position: relative;
  background-color: black;
  height: 75vh;
  min-height: 25rem;
  width: 100%;
  overflow: hidden;
}

.videoheader video {
  position: absolute;
  top: 50%;
  left: 50%;
  min-width: 100%;
  min-height: 100%;
  width: auto;
  height: auto;
  z-index: 0;
  -ms-transform: translateX(-50%) translateY(-50%);
  -moz-transform: translateX(-50%) translateY(-50%);
  -webkit-transform: translateX(-50%) translateY(-50%);
  transform: translateX(-50%) translateY(-50%);
}

.videoheader .container {
  position: relative;
  z-index: 2;
}

.videoheader .overlay {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  background-color: black;
  opacity: 0.5;
  z-index: 1;
}

@media (pointer: coarse) and (hover: none) {
  .videoheader {
    background: url('<?= JURI::root().blocksHelper::getBlockParameter($blockid, 'video_poster', ''); ?>') black no-repeat center center scroll;
  }
  .videoheader video {
    display: none;
  }
}
</style>

<header class="videoheader" id="<?= blocksHelper::getBlockParameter($blockid, 'uniqid', 'block-'.$blockid); ?>">
  <div class="overlay"></div>
  <video playsinline="playsinline" <?= $video_autoplay; ?> <?= $video_muted; ?> <?= $video_loop; ?>>
    <source src="<?= JURI::root().blocksHelper::getBlockParameter($blockid, 'video', ''); ?>" type="video/mp4">
  </video>
  <?php if($video_header != '') : ?>
  <div class="container h-100">
    <div class="d-flex text-center h-100">
      <div class="my-auto w-100 text-white">
        <h1 class="display-3"><?= $video_header; ?></h1>
        <?php if($video_subheader != '') : ?>
        <h2><?= $video_subheader; ?></h2>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <?php endif; ?>
</header>
