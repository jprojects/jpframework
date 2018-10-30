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
$cid 	= blocksHelper::getBlockParameter($blockid,'carousel_id');
$items 	= json_decode(blocksHelper::getBlockParameter($blockid, 'list_images'), true);
$height = blocksHelper::getBlockParameter($blockid, 'carousel_height');
$data   = blocksHelper::group_by_key($items);
//print_r($data);
?>

<style>
<?php 
$i = 0;
foreach($data as $k => $v):
if($v[2] == '') break;
?>
.carousel-<?=  $blockid; ?> .slides .slide-<?= $i; ?> {
  	background-image: url(<?= $v[2]; ?>); 
  	height: <?= $height; ?>;
	background-size: cover;
	background-position: center center;
	background-repeat: no-repeat;
}
<?php 
$i++;
endforeach; ?>
.carousel-<?=  $blockid; ?>,
.carousel-<?=  $blockid; ?> .carousel-inner .item {
    height: <?= $height; ?>;
}
</style>

<section id="<?= blocksHelper::getBlockParameter($blockid, 'uniqid', 'block-'.$blockid); ?>" style="padding:0;">

<div class="carousel fade-carousel slide carousel-<?= $blockid; ?>" data-ride="carousel" id="<?= $cid; ?>">
  
  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
  	<?php 
  	$i = 0;
  	foreach($data as $k => $v):
	if($v[2] == '') break;
  	?>
    <div class="item slides <?php if($i == 0) : ?>active<?php endif; ?>">
      <div class="slide-<?= $i; ?>"></div>
      <div class="container hero">
        <hgroup>
            <h1><?= $v[0]; ?></h1>        
        </hgroup>
      </div>
    </div>
    <?php 
    $i++;
    endforeach; ?>
  </div> 
  
  <?php if(count($data) > 1) : ?>
  <!-- Controls -->
  <a class="left carousel-control" href="#<?= $cid; ?>" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#<?= $cid; ?>" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
  <?php endif; ?>
      
</div>

</section>
