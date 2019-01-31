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
$controls = blocksHelper::getBlockParameter($blockid, 'carousel_controls', 1);
$indicators = blocksHelper::getBlockParameter($blockid, 'carousel_indicators', 1);
$box = blocksHelper::getBlockParameter($blockid, 'carousel_box', 0);
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
  	background-image: url(<?= JURI::root().$v[2]; ?>); 
  	height: <?= $height; ?>;
	background-size: cover;
	background-position: center center;
	background-repeat: no-repeat;
	background-attachment: fixed;
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

<div class="carousel fade-carousel slide carousel-<?= $blockid; ?> parallax" data-ride="carousel" id="<?= $cid; ?>">
  
  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
  
  	<?php if(count($data) > 1 && $indicators == 1) : ?>
    <ol class="carousel-indicators">
    	<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    	<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    	<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  	</ol>
  	<?php endif; ?>
  
  	<?php 
  	$i = 0;
  	foreach($data as $k => $v):
	if($v[2] == '') break;
  	?>
    <div class="item slides <?php if($i == 0) : ?>active<?php endif; ?>">
      <div class="slide-<?= $i; ?>"></div>
      <div class="container hero">
      	<a href="index.php?Itemid=<?= $v[3]; ?>">
        <hgroup <?php if($box == 1) : ?>class="box"<?php endif; ?>>
            <h1><?= $v[0]; ?></h1> 
            <p><?= $v[1]; ?></p>       
        </hgroup>
        </a>
      </div>
    </div>
    <?php 
    $i++;
    endforeach; ?>
  </div> 
  
  <?php if(count($data) > 1 && $controls == 1) : ?>
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
