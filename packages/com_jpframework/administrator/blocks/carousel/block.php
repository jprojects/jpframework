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
//print_r($items);
?>

<style>
<?php 
$i = 0;
foreach($items as $item): 
if($items['carousel_img'][$i] == '') break;
?>
.carousel-<?=  $blockid; ?> .slides .slide-<?= $i; ?> {
  	background-image: url(<?= $items['carousel_img'][$i]; ?>); 
  	height: <?= $height; ?>;
	background-size: cover;
	background-position: center center;
	background-repeat: no-repeat;
}
<?php 
$i++;
endforeach; ?>
.carousel-<?=  $blockid; ?> {
    height: <?= $height; ?>;
}
.carousel-<?=  $blockid; ?> .carousel-inner .item {
    height: <?= $height; ?>;
}
</style>

<section id="<?= blocksHelper::getBlockParameter($blockid, 'uniqid', 'block-'.$blockid); ?>">

<div class="carousel fade-carousel slide carousel-<?= $blockid; ?>" data-ride="carousel" id="<?= $cid; ?>">
  
  	<ol class="carousel-indicators">
  		<?php 
	  	$i = 0;
	  	foreach($items as $item): 
	  	if($items['carousel_img'][$i] == '') break;
	  	?>
  		<li data-target="#<?= $cid; ?>" data-slide-to="<?= $i; ?>" <?php if($i == 0) : ?>class="active"<?php endif; ?>></li>
  		<?php 
    	$i++;
    	endforeach; ?>
	</ol>
        
  	<div class="carousel-inner">
	  	<?php 
	  	$i = 0;
	  	foreach($items as $item): 
	  	if($items['carousel_img'][$i] == '') break;
	  	?>
		<div class="carousel-item slides <?php if($i == 0) : ?>active<?php endif; ?>">
		  <div class="slide-<?= $i; ?>"></div>
		  <div class="container hero">
		    <hgroup>
		        <h1><?= $items['carousel_title'][$i]; ?></h1>        
		    </hgroup>
		  </div>
		</div>
		<?php 
		$i++;
		endforeach; ?>
  	</div> 
  
	<?php if(count($items) > 1) : ?>
	<a class="carousel-control-prev" href="#<?= $cid; ?>" role="button" data-slide="prev">
		  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		  <span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#<?= $cid; ?>" role="button" data-slide="next">
		  <span class="carousel-control-next-icon" aria-hidden="true"></span>
		  <span class="sr-only">Next</span>
	</a>
	<?php endif; ?>
      
</div>

</section>
