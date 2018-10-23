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

$blockid 	= JRequest::getVar('blockid');
$items 		= json_decode(blocksHelper::getBlockParameter($blockid, 'list_features'), true);
$heading 	= blocksHelper::getBlockParameter($blockid,'feature_heading');
$uniqid  	= blocksHelper::getBlockParameter($blockid, 'uniqid', 'block-'.$blockid);
$pos 		= blocksHelper::getBlockParameter($blockid,'content_position', '');

?>

<section id="<?= $uniqid; ?>" style="background-color:<?= blocksHelper::getBlockParameter($blockid,'block_color'); ?>;color:<?= blocksHelper::getBlockParameter($blockid,'block_font_color'); ?>">

	<div class="container jpfblock marketing">

		<?php if($heading != '') : ?>
		<header>
		<h1><?= $heading; ?></h1>
		<p class="lead"><?= blocksHelper::getBlockParameter($blockid,'feature_subheading'); ?></p>
		</header>
		<?php endif; ?>

		<div class="row">

			<?php 
		  	$i = 0;
		  	foreach($items as $item): 
		  	?>
			<!-- Feature Item <?= $i; ?> -->
			<div class="col-lg-4 <?= $pos; ?>">
				<div class="featurette-divider">
				<img class="rounded-circle" src="<?= $items['feature_img'][$i]; ?>" alt="<?= $items['feature_title'][$i]; ?>">
				</div>
				<h4><?= $items['feature_title'][$i]; ?></h4>
				<hr class="featurette-divider">
				<p>
				<?= $items['feature_text'][$i]; ?><br/>
				</p>
				<?php if($items['feature_btn'][$i] != '') : ?>
				<a href="<?= $items['feature_btn_link'][$i]; ?>" role="button" class="btn btn-secondary"><?= $items['feature_btn'][$i]; ?></a>
				<?php endif; ?>
			</div>
			<?php 
			$i++;
			endforeach; ?>

		</div><!-- /row -->
		
	</div><!-- /container -->

</section>
