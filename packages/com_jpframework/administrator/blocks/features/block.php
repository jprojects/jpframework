<?php

/**
* @version		$Id: com_jpframework  Kim $
* @package		com_jpframework v 1.0.0
* @copyright	Copyright (C) 2014 Afi. All rights reserved.
* @license		GNU/GPL, see LICENSE.txt
*/

// restricted access
defined('_JEXEC') or die('Restricted access');

$blockid    = JFactory::getApplication()->input->get('blockid');
$cid 		= blocksHelper::getBlockParameter($blockid,'uniqid');
$classes 	= blocksHelper::getBlockParameter($blockid, 'classes');
$items 		= blocksHelper::getBlockParameter($blockid, 'list_features');
$height 	= blocksHelper::getBlockParameter($blockid, 'height', '140');
$columns    = blocksHelper::getBlockParameter($blockid, 'feature_column', 4);
$subheading = blocksHelper::getBlockParameter($blockid, 'feature_subheading');
$data   	= blocksHelper::groupByKey($items);
?>

<section id="<?= $uniqid; ?>" style="background-color:<?= blocksHelper::getBlockParameter($blockid, 'block_color', '#fff'); ?>;color:<?= blocksHelper::getBlockParameter($blockid, 'block_font_color', '#000'); ?>">

<div class="container marketing <?= $classes; ?>">

	<header>
		<h1><?= blocksHelper::getBlockParameter($blockid, 'feature_heading'); ?></h1>
		<?php if($subheading) : ?>
		<p><?= $subheading; ?></p>
		<?php endif; ?>
	</header>

	<div class="row text-center">

		<?php 
	  	$i = 0;
	  	foreach($data as $v):
		if($data['feat_img'][$i] == '') break;
	  	?>
		<div class="col-12 col-md-<?= $columns; ?>">
		    <img src="<?= $data['feat_img'][$i]; ?>" alt="<?= $data['feat_title'][$i]; ?>" width="<?= $height; ?>" height="<?= $height; ?>">
		    <h2 class="mt-4"><?= $data['feat_title'][$i]; ?></h2>
		    <p><?= $data['feat_text'][$i]; ?></p>
		    <?php if($data['feat_btn_text'][$i] != '') : ?>
		    <p><a class="btn btn-<?= $data['feat-btn-class'][$i]; ?>" href="<?= $data['feat_btn_link'][$i]; ?>" role="button"><?= $data['feat_btn_text'][$i]; ?></a></p>
		    <?php endif; ?>
		</div>
		<?php 
		$i++;
		endforeach; ?>
	  </div> 
		  
	</div>

</div>

</section>
