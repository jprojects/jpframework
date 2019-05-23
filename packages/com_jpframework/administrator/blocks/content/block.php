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
$video   = blocksHelper::getBlockParameter($blockid,'content_video');

if($position == 'right') {
	$col  = 'col-xs-12 col-md-6';
	$pos  = 'float-right';
	$col2 = 'col-xs-12 col-md-6';
	$pos2 = 'float-left';
} elseif($position == 'left') {
	$col  = 'col-xs-12 col-md-6';
	$pos2 = 'float-right';
	$col2 = 'col-xs-12 col-md-6';
	$pos  = 'float-left';
} else {
	$col2 = 'col-12';
	$pos2 = '';
}
?>

<section id="<?= blocksHelper::getBlockParameter($blockid, 'uniqid', 'block-'.$blockid); ?>" style="background-color:<?= blocksHelper::getBlockParameter($blockid, 'block_color', '#fff'); ?>;color:<?= blocksHelper::getBlockParameter($blockid, 'block_font_color', '#000'); ?>">


	<div class="container jpfblock">

		<?php if($heading != '') : ?>
		<header>
			<h1><?= blocksHelper::getBlockParameter($blockid, 'content_title'); ?></h1>
			<hr class="featurette-divider">
		</header>
		<?php endif; ?>
		
		<div class="row">
			<?php if($position != '') : ?>
			<div class="<?= $col; ?>  <?= $pos; ?> <?= $efecte; ?>">
				<?php if($video == '') : ?>
				<img src="<?= blocksHelper::getBlockParameter($blockid,'content_img', ''); ?>" alt="<?= blocksHelper::getBlockParameter($blockid,'content_alt', ''); ?>" class="featurette-image img-fluid mx-auto">
				<?php else : ?>
				<div class='embed-container'><iframe src="<?= $video; ?>" frameborder="0" allowfullscreen></iframe></div>
				<?php endif; ?>
			</div> 
			<?php endif; ?>
			<div class="<?= $col2; ?> <?= $pos2; ?>">
		     	<div class="lead"><?= blocksHelper::getBlockParameter($blockid, 'content_text'); ?></div>
			</div>
		</div>
		 
		
	</div>

</section>
