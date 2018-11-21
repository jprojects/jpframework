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
$cid 	= blocksHelper::getBlockParameter($blockid,'uniqid');
$items 	= json_decode(blocksHelper::getBlockParameter($blockid, 'list_features'), true);
$height = blocksHelper::getBlockParameter($blockid, 'height', '140');
$subheading = blocksHelper::getBlockParameter($blockid, 'feature_subheading');
$data   = blocksHelper::group_by_key($items);
?>

<section id="<?= $uniqid; ?>">

<div class="container marketing jpfblock">

	<header>
		<h1><?= blocksHelper::getBlockParameter($blockid, 'feature_heading'); ?></h1>
		<?php if($subheading) : ?>
		<p><?= $subheading; ?></p>
		<?php endif; ?>
	</header>

	<div class="row text-center">

		<?php 
	  	$i = 0;
	  	foreach($data as $k => $v):
		if($v[2] == '') break;
	  	?>
		<div class="col-lg-4">
		    <img class="rounded-circle" src="<?= $v[2]; ?>" alt="<?= $v[0]; ?>" width="<?= $height; ?>" height="<?= $height; ?>">
		    <h2><?= $v[0]; ?></h2>
		    <p><?= $v[1]; ?></p>
		    <?php if($v[3] != '') : ?>
		    <p><a class="btn btn-secondary" href="<?= $v[4]; ?>" role="button"><?= $v[3]; ?></a></p>
		    <?php endif; ?>
		</div>
		<?php 
		$i++;
		endforeach; ?>
	  </div> 
		  
	</div>

</div>

</section>
