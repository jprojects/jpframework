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
blocksHelper::loadCss(JURI::root().'administrator/components/com_jpframework/blocks/videoheader/assets/css/videoheader.css');
$video_subheader = blocksHelper::getBlockParameter($blockid, 'video_subheader', '');
$video_header = blocksHelper::getBlockParameter($blockid, 'video_header', '');
blocksHelper::getBlockParameter($blockid, 'video_autoplay', 1) ? $video_autoplay = 'autoplay="autoplay"' : $video_autoplay = '';
blocksHelper::getBlockParameter($blockid, 'video_muted', 1) ? $video_muted = 'muted="muted"' : $video_muted = '';
blocksHelper::getBlockParameter($blockid, 'video_loop', 1) ? $video_loop = 'loop="loop"' : $video_loop = '';
?>

<header class="videoheader" id="<?= blocksHelper::getBlockParameter($blockid, 'uniqid', 'block-'.$blockid); ?>">
  <div class="overlay"></div>
  <video playsinline="playsinline" <?= $video_autoplay; ?> <?= $video_muted; ?> <?= $video_loop; ?>>
    <source src="<?= JURI::root().blocksHelper::getBlockParameter($blockid, 'video_vid', ''); ?>" type="video/mp4">
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
<?php if($pills > 0) : ?>
<div class="d-flex">
</div>
<?php endif; ?>