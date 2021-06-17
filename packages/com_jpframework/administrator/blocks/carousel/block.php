<?php

/**
* @version		$Id: com_jpframework  Kim $
* @package		com_jpframework v 1.0.0
* @copyright	Copyright (C) 2014 Afi. All rights reserved.
* @license		GNU/GPL, see LICENSE.txt
*/

// restricted access
defined('_JEXEC') or die('Restricted access');

$blockid        = JFactory::getApplication()->input->get('blockid');
blocksHelper::loadCss(JURI::root().'administrator/components/com_jpframework/blocks/carousel/assets/css/carousel.css');
blocksHelper::getBlockParameter($blockid,'carousel_play') == 0 ? $play = "false" : $play = blocksHelper::getBlockParameter($blockid,'carousel_play');
$fluid          = blocksHelper::getBlockParameter($blockid, 'fluid', '');
$cid 			= blocksHelper::getBlockParameter($blockid,'carousel_id');
$items 		  	= blocksHelper::getBlockParameter($blockid, 'list_images');
$controls 		= blocksHelper::getBlockParameter($blockid, 'carousel_controls', 1);
$indicators 	= blocksHelper::getBlockParameter($blockid, 'carousel_indicators', 1);
$nexticon 		= blocksHelper::getBlockParameter($blockid, 'carousel_control_right', 'carousel-control-next-icon');
$previcon 		= blocksHelper::getBlockParameter($blockid, 'carousel_control_left', 'carousel-control-prev-icon');
$nextimg 		= blocksHelper::getBlockParameter($blockid, 'carousel_controlImg_right', '');
$previmg 		= blocksHelper::getBlockParameter($blockid, 'carousel_controlImg_left', '');
$box 			= blocksHelper::getBlockParameter($blockid, 'carousel_box', 0);
$position       = blocksHelper::getBlockParameter($blockid, 'Position_box', 'hero_center');
$colorbox       = blocksHelper::getBlockParameter($blockid, 'color_box', 'rgba(0, 0, 0, 0.2);');
$height 	   	= blocksHelper::getBlockParameter($blockid, 'carousel_height');
$data           = blocksHelper::groupByKey($items);
?>

<style>
<?php
$i = 0;
foreach($data as $v):
if($data['carousel_img'][$i] == '') break;
?>
.carousel-<?=  $blockid; ?> .slides .slide-<?= $i; ?> {
  	background-image: url(<?= JURI::root().$data['carousel_img'][$i]; ?>);
  	height: <?= $height; ?>;
	background-size: cover;
	background-position: center center;
	background-repeat: no-repeat;
    background-attachment: scroll;
}
<?php if($data['carousel_img_md'][$i] != '') : ?>
@media screen and (max-width: 768px){
	.carousel-<?=  $blockid; ?> .slides .slide-<?= $i; ?> {
    	background-image: url(<?= JURI::root().$data['carousel_img_md'][$i]; ?>);
    }
}
<?php endif; ?>
<?php if($data['carousel_img_xs'][$i] != '') : ?>
@media screen and (max-width: 590px){
	.carousel-<?=  $blockid; ?> .slides .slide-<?= $i; ?> {
    	background-image: url(<?= JURI::root().$data['carousel_img_xs'][$i]; ?>);
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

	<div class="carousel fade-carousel slide carousel-<?= $blockid; ?> <?= $classes; ?>" data-bs-ride="carousel" id="<?= $cid; ?>">

	  	<?php if(count($data) > 1 && $indicators == 1) : ?>
		<div class="carousel-indicators">
			<?php
		  	$i = 0;
		  	foreach($data as $v):
			if($data['carousel_img'][$i] == '') break;
		  	?>
			<button type="button" data-bs-target="#<?= $cid; ?>" data-bs-slide-to="<?= $i; ?>" <?php if($i == 0) : ?>class="active"<?php endif; ?> aria-current="true" aria-label="Slide <?= $i; ?>"></button>
			<?php
			$i++;
			endforeach; ?>
  		</div>
  		<?php endif; ?>

	  	<div class="carousel-inner" role="listbox">

		  	<?php
		  	$i = 0;
		  	foreach($data as $v):
			if($data['carousel_img'][$i] == '') break;
		  	?>
			<div class="carousel-item slides <?php if($i == 0) : ?>active<?php endif; ?>">
			  	<div class="slide-<?= $i; ?>"></div>
			  	<?php if($box == 1) : ?>
			  	<div class="hero <?=$position?>">
			  		<?php if($data['carousel_link_active'][$i] == 1) : ?>
			  		<a class="text-light" href="index.php?Itemid=<?= $data['carousel_link'][$i]; ?>">
			  		<?php endif; ?>
							<hgroup class="box">
									<h1><?= $data['carousel_title'][$i]; ?></h1>
									<p><?= $data['carousel_text'][$i]; ?></p>
							</hgroup>
						<?php if($data['carousel_link_active'][$i] == 1) : ?>
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
	  <a class="carousel-control-prev" data-bs-target="#<?= $cid; ?>" data-bs-slide="prev">
		<?php if(!empty($previmg)) :?>
		<img src="<?=$previmg?>" alt="prev">
		<?php else :?>
		<span class="<?=$previcon?>" aria-hidden="true"></span>
		<?php endif;?>
    	<span class="sr-only">Previous</span>
	  </a>

	  <a class="carousel-control-next" data-bs-target="#<?= $cid; ?>" data-bs-slide="next">
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
