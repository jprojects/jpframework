<?php

/**
* @version		$Id: com_jpframework  Kim $
* @package		com_jpframework v 1.0.0
* @copyright	Copyright (C) 2014 Afi. All rights reserved.
* @license		GNU/GPL, see LICENSE.txt
*/

// restricted access
defined('_JEXEC') or die('Restricted access');

$blockid 	   	= JRequest::getVar('blockid');
blocksHelper::loadCss(JURI::root().'administrator/components/com_jpframework/blocks/carousel/assets/css/carousel.css');
blocksHelper::getBlockParameter($blockid,'carousel_play') == 0 ? $play = "false" : $play = blocksHelper::getBlockParameter($blockid,'carousel_play');
$fluid    = blocksHelper::getBlockParameter($blockid, 'fluid', '');
$cid 			    = blocksHelper::getBlockParameter($blockid,'carousel_id');
$items 		  	= json_decode(blocksHelper::getBlockParameter($blockid, 'list_images'), true);
$controls 		= blocksHelper::getBlockParameter($blockid, 'carousel_controls', 1);
$indicators 	= blocksHelper::getBlockParameter($blockid, 'carousel_indicators', 1);
$nexticon 		= blocksHelper::getBlockParameter($blockid, 'carousel_control_right', 'carousel-control-next-icon');
$previcon 		= blocksHelper::getBlockParameter($blockid, 'carousel_control_left', 'carousel-control-prev-icon');
$nextimg 			= blocksHelper::getBlockParameter($blockid, 'carousel_controlImg_right', '');
$previmg 			= blocksHelper::getBlockParameter($blockid, 'carousel_controlImg_left', '');
$box 			    = blocksHelper::getBlockParameter($blockid, 'carousel_box', 0);
$position     = blocksHelper::getBlockParameter($blockid, 'Position_box', 'hero_center');
$colorbox     = blocksHelper::getBlockParameter($blockid, 'color_box', 'rgba(0, 0, 0, 0.2);');
$height 	   	= blocksHelper::getBlockParameter($blockid, 'carousel_height');
$data   	  	= blocksHelper::group_by_key($items);
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
  background-attachment: scroll;
	background-attachment: fixed;
}
<?php if($v[4] != '') : ?>
@media screen and (max-width: 768px){
	.carousel-<?=  $blockid; ?> .slides .slide-<?= $i; ?> {
    	background-image: url(<?= JURI::root().$v[4]; ?>);
    }
}
<?php endif; ?>
<?php if($v[3] != '') : ?>
@media screen and (max-width: 590px){
	.carousel-<?=  $blockid; ?> .slides .slide-<?= $i; ?> {
    	background-image: url(<?= JURI::root().$v[3]; ?>);
    }
}
<?php endif; ?>
<?php
$i++;
endforeach; ?>
.carousel-<?=  $blockid; ?>,
.carousel-<?=  $blockid; ?> .carousel-inner .item {
    height: <?= $height; ?>;
}
<?php if(!empty($colorbox)) : ?>
.box { background: <?= $colorbox; ?> }
<?php endif; ?>
</style>

<section class="<?= $fluid; ?>" id="<?= blocksHelper::getBlockParameter($blockid, 'uniqid', 'block-'.$blockid); ?>">

	<div class="carousel fade-carousel slide carousel-<?= $blockid; ?> <?= $classes; ?>" data-ride="carousel" id="<?= $cid; ?>">

	  	<?php if(count($data) > 1 && $indicators == 1) : ?>
		<ol class="carousel-indicators">
			<?php
		  	$i = 0;
		  	foreach($data as $k => $v):
			if($v[2] == '') break;
		  	?>
			<li data-target="#<?= $cid; ?>" data-slide-to="<?= $i; ?>" <?php if($i == 0) : ?>class="active"<?php endif; ?>></li>
			<?php
			$i++;
			endforeach; ?>
  		</ol>
  		<?php endif; ?>

	  	<div class="carousel-inner" role="listbox">

		  	<?php
		  	$i = 0;
		  	foreach($data as $k => $v):
			if($v[2] == '') break;
		  	?>
			<div class="carousel-item slides <?php if($i == 0) : ?>active<?php endif; ?>">
			  	<div class="slide-<?= $i; ?>"></div>
			  	<?php if($box == 1) : ?>
			  	<div class="hero <?=$position?>">
			  		<?php if($v[6] == 1) : ?>
			  		<a href="index.php?Itemid=<?= $v[5]; ?>">
			  		<?php endif; ?>
							<hgroup class="box">
									<h1><?= $v[0]; ?></h1>
									<p><?= $v[1]; ?></p>
							</hgroup>
						<?php if($v[6] == 1) : ?>
						</a>
						<?php endif; ?>
			  	</div>
			  	<?php endif; ?>
			</div>
			<?php
			$i++;
			endforeach; ?>

	  	</div>

	  <?php if(count($data) > 1 && $controls == 1) : ?>
	  <!-- Controls -->
	  <a class="carousel-control-prev" data-target="#<?= $cid; ?>" data-slide="prev">
		<?php if(!empty($previmg)) :?>
		<img src="<?=$previmg?>" alt="prev">
		<?php else :?>
		<span class="<?=$previcon?>" aria-hidden="true"></span>
		<?php endif;?>
    	<span class="sr-only">Previous</span>
	  </a>

	  <a class="carousel-control-next" data-target="#<?= $cid; ?>" data-slide="next">
		<?php if(!empty($nextimg)) :?>
		<img src="<?=$nextimg?>" alt="next">
		<?php else :?>
		<span class="<?=$nexticon?>" aria-hidden="true"></span>
		<?php endif;?>
    	<span class="sr-only">Next</span>
	  </a>
	  <?php endif; ?>

	</div>

</section>
