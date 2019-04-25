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

$blockid = JRequest::getVar('blockid');
$effect  = blocksHelper::getBlockParameter($blockid, 'effect', '');
$effect != '' ? $efecte = 'wow '.$effect : $efecte = '';
$position = blocksHelper::getBlockParameter($blockid, 'content_position', '');
$heading = blocksHelper::getBlockParameter($blockid, 'content_title');

if($position == 'float-right') {
	$col  = 'col-xs-12 col-md-6';
	$pos  = 'float-right';
	$col2 = 'col-xs-12 col-md-6';
	$pos2 = 'float-left';
} elseif($position == 'float-left') {
	$col  = 'col-xs-12 col-md-6';
	$pos2 = 'float-right';
	$col2 = 'col-xs-12 col-md-6';
	$pos  = 'float-left';
} else {
	$col2 = 12;
}
?>

<style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style>

<section id="<?= blocksHelper::getBlockParameter($blockid, 'uniqid', 'block-'.$blockid); ?>" style="background-color:<?= blocksHelper::getBlockParameter($blockid,'block_color'); ?>;color:<?= blocksHelper::getBlockParameter($blockid,'block_font_color'); ?>">


	<div class="container jpfblock">

		<?php if($heading != '') : ?>
		<header>
			<h1><?= blocksHelper::getBlockParameter($blockid, 'content_title'); ?></h1>
			<hr class="featurette-divider">
		</header>
		<?php endif; ?>

		<?php if($position != '') : ?>
		<div class="row">
			<div class="<?= $col; ?>  <?= $pos; ?> <?= $efecte; ?>">
				<?php if(blocksHelper::getBlockParameter($blockid,'content_video') == '') : ?>
				<img src="<?= blocksHelper::getBlockParameter($blockid,'content_img', ''); ?>" alt="<?= blocksHelper::getBlockParameter($blockid,'content_alt', ''); ?>" class="featurette-image img-fluid mx-auto">
				<?php else : ?>
				<div class='embed-container'><iframe src="<?= blocksHelper::getBlockParameter($blockid, 'content_video'); ?>" frameborder="0" allowfullscreen></iframe></div>
				<?php endif; ?>
			</div> 
			<div class="<?= $col2; ?> <?= $pos2; ?>">
		     	<div class="lead"><?= blocksHelper::getBlockParameter($blockid, 'content_text'); ?></div>
			</div>
		</div>
		<?php endif; ?> 
		
	</div>

</section>
