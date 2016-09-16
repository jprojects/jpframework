<?php

/**
* @version		$Id: com_jpframework  Kim $
* @package		com_jpframework v 1.0.0
* @copyright	Copyright (C) 2014 Afi. All rights reserved.
* @license		GNU/GPL, see LICENSE.txt
*/

// restricted access
defined('_JEXEC') or die('Restricted access');

$blockid = JRequest::getVar('blockid');
blocksHelper::loadCss(JURI::root().'administrator/components/com_jpframework/blocks/carousel/assets/css/carousel.css');
blocksHelper::getBlockParameter($blockid,'carousel_play') == 0 ? $play = "false" : $play = blocksHelper::getBlockParameter($blockid,'carousel_play');
$cid = blocksHelper::getBlockParameter($blockid,'carousel_id');
?>

<style>
.carousel-<?php echo $blockid; ?> .slides .slide-1 {
  background-image: url(<?php echo JURI::root().blocksHelper::getBlockParameter($blockid,'carousel_img1'); ?>); 
}
<?php if(blocksHelper::getBlockParameter($blockid,'carousel_img2') != '') : ?>
.carousel-<?php echo $blockid; ?> .slides .slide-2 {
  background-image: url(<?php echo JURI::root().blocksHelper::getBlockParameter($blockid,'carousel_img2'); ?>);
}
<?php endif; ?>
<?php if(blocksHelper::getBlockParameter($blockid,'carousel_img3') != '') : ?>
.carousel-<?php echo $blockid; ?> .slides .slide-3 {
  background-image: url(<?php echo JURI::root().blocksHelper::getBlockParameter($blockid,'carousel_img3'); ?>);
}
<?php endif; ?>
.carousel-<?php echo $blockid; ?> {
    height: <?php echo blocksHelper::getBlockParameter($blockid,'carousel_height'); ?>px;
}
.carousel-<?php echo $blockid; ?> .carousel-inner .item {
    height: <?php echo blocksHelper::getBlockParameter($blockid,'carousel_height'); ?>px;
}
.carousel-<?php echo $blockid; ?> .slides .slide-1, 
.carousel-<?php echo $blockid; ?> .slides .slide-2,
.carousel-<?php echo $blockid; ?> .slides .slide-3 {
  height: <?php echo blocksHelper::getBlockParameter($blockid,'carousel_height'); ?>px;
}
</style>

<section id="<?php echo blocksHelper::getBlockParameter($blockid, 'uniqid', 'block-'.$blockid); ?>" style="padding:0;">

<div class="carousel fade-carousel slide carousel-<?php echo $blockid; ?>" data-ride="carousel" data-interval="<?php echo $play; ?>" id="<?php echo $cid; ?>">

  <!-- Indicators -->
  <ol class="carousel-indicators">
    <?php if(blocksHelper::getBlockParameter($blockid,'carousel_img2') != '') : ?>
    <li data-target="#<?php echo $cid; ?>" data-slide-to="0" class="active"></li>
    <li data-target="#<?php echo $cid; ?>" data-slide-to="1"></li>
    <?php endif; ?>
    <?php if(blocksHelper::getBlockParameter($blockid,'carousel_img3') != '') : ?>
    <li data-target="#<?php echo $cid; ?>" data-slide-to="2"></li>
    <?php endif; ?>
  </ol>
  
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item slides active">
      <div class="slide-1"></div>
      <div class="hero">
        <hgroup>
            <h1><?php echo blocksHelper::getBlockParameter($blockid,'carousel_title1'); ?></h1>        
            <h3><?php echo blocksHelper::getBlockParameter($blockid,'carousel_text1'); ?></h3>
        </hgroup>
      </div>
    </div>
    <?php if(blocksHelper::getBlockParameter($blockid,'carousel_img2') != '') : ?>
    <div class="item slides">
      <div class="slide-2"></div>
      <div class="hero">        
        <hgroup>
            <h1><?php echo blocksHelper::getBlockParameter($blockid,'carousel_title2'); ?></h1>        
            <h3><?php echo blocksHelper::getBlockParameter($blockid,'carousel_text2'); ?></h3>
        </hgroup>       
      </div>
    </div>
    <?php endif; ?>
    <?php if(blocksHelper::getBlockParameter($blockid,'carousel_img3') != '') : ?>
    <div class="item slides">
      <div class="slide-3"></div>
      <div class="hero">        
        <hgroup>
            <h1><?php echo blocksHelper::getBlockParameter($blockid,'carousel_title3'); ?></h1>        
            <h3><?php echo blocksHelper::getBlockParameter($blockid,'carousel_text3'); ?></h3>
        </hgroup>
      </div>
    </div>
    <?php endif; ?>
  </div> 
</div>

</section>
