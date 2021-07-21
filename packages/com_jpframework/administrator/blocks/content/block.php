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

$blockid  = JFactory::getApplication()->input->get('blockid');
$effect   = blocksHelper::getBlockParameter($blockid, 'effect', '');
$effect  != '' ? $efecte = 'wow '.$effect : $efecte = '';
$fluid    = blocksHelper::getBlockParameter($blockid, 'fluid', '');
$classes  = blocksHelper::getBlockParameter($blockid,'classes');
$position = blocksHelper::getBlockParameter($blockid, 'content_position', '');
$heading  = blocksHelper::getBlockParameter($blockid, 'content_title');
$video    = blocksHelper::getBlockParameter($blockid,'content_video');
$shadow   = blocksHelper::getBlockParameter($blockid,'img_shadow', 1);

if($position == 'right') {
	$col  = 'col-xs-12 col-md-6';
	$pos  = 'order-1';
	$col2 = 'col-xs-12 col-md-6';
	$pos2 = 'float-left';
} elseif($position == 'left') {
	$col  = 'col-xs-12 col-md-6';
	$pos2 = '';
	$col2 = 'col-xs-12 col-md-6';
	$pos  = 'float-left';
} elseif($position == 'center') {
	$col  = 'col-12 text-center';
	$pos2 = '';
	$col2 = 'col-12 text-center';
	$pos  = '';
} else {
	$col2 = 'col-12';
	$pos2 = '';
}
?>

<style>
.boxshadow {
    box-shadow: 0px 2px 6px 2px rgba(0,0,0,0.75);
}
</style>

<section id="<?= blocksHelper::getBlockParameter($blockid, 'uniqid', 'block-'.$blockid); ?>" style="background-color:<?= blocksHelper::getBlockParameter($blockid, 'block_color', '#fff'); ?>;color:<?= blocksHelper::getBlockParameter($blockid, 'block_font_color', '#000'); ?>">

	<div class="<?= $fluid; ?> jpfblock <?= $classes; ?>">

		<?php if($heading != '') : ?>
		<header>
			<h1><?= blocksHelper::getBlockParameter($blockid, 'content_title'); ?></h1>
			<hr class="featurette-divider">
		</header>
		<?php endif; ?>

		<div class="row">

			<div class="<?= $col2; ?> <?= $pos2; ?>">
		     	<div><?= blocksHelper::getBlockParameter($blockid, 'content_text'); ?></div>
			</div>
			<?php if($position != '') : ?>
			<div class="<?= $col; ?>  <?= $pos; ?> <?= $efecte; ?>">
				<?php if($video == '') : ?>
				<img src="<?= JURI::root().blocksHelper::getBlockParameter($blockid,'content_img', ''); ?>" alt="<?= blocksHelper::getBlockParameter($blockid,'content_alt', ''); ?>" class="featurette-image img-fluid mx-auto <?php if($shadow == 1) : ?>boxshadow<?php endif; ?>">
				<?php else : ?>
				<div class='embed-container'><iframe src="<?= $video; ?>" frameborder="0" allowfullscreen></iframe></div>
				<?php endif; ?>
			</div>
			<?php endif; ?>
			
		</div>


	</div>

</section>
