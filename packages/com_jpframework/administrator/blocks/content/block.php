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

$blockid  		= JFactory::getApplication()->input->get('blockid');
$effect_text   	= blocksHelper::getBlockParameter($blockid, 'scroll_effect_text', '');
$effect_img   	= blocksHelper::getBlockParameter($blockid, 'scroll_effect_img', '');
$fluid    		= blocksHelper::getBlockParameter($blockid, 'fluid', '');
$classes  		= blocksHelper::getBlockParameter($blockid,'classes');
$img_classes  	= blocksHelper::getBlockParameter($blockid,'img_classes');
$position 		= blocksHelper::getBlockParameter($blockid, 'content_position', '');
$heading  		= blocksHelper::getBlockParameter($blockid, 'content_title');
$video    		= blocksHelper::getBlockParameter($blockid,'content_video');
$shadow   		= blocksHelper::getBlockParameter($blockid,'img_shadow', 1);
$text_column   	= blocksHelper::getBlockParameter($blockid,'content_column', 6);
$img_column   	= blocksHelper::getBlockParameter($blockid,'img_column', 12);
$divider   		= blocksHelper::getBlockParameter($blockid,'divider', 1);
$heading_pos  	= blocksHelper::getBlockParameter($blockid,'heading_pos', 'left');
$heading_size  	= blocksHelper::getBlockParameter($blockid,'heading_size', 'h1');
$color_title  	= blocksHelper::getBlockParameter($blockid,'color_title', '#000');

if($position == 'right') {
	$col  		= 'col-12 col-lg-'.$img_column;
	$text_pos  	= 'order-1';
	$col2 		= 'col-12 col-lg-'.$text_column;
	$img_pos 	= 'order-2 text-center';
} elseif($position == 'left') {
	$col  		= 'col-12 col-lg-'.$img_column;
	$text_pos  	= 'order-2';
	$col2 		= 'col-12 col-lg-'.$text_column;
	$img_pos 	= 'order-1';
} elseif($position == 'center') {
	$col  		= 'col-12 text-center';
	$text_pos  	= '';
	$col2 		= 'col-12 text-center';
	$img_pos 	= '';
} else {
	$col  		= 'col-12';
	$text_pos  	= 'order-1';
	$col2 		= 'col-12';
	$img_pos 	= 'order-2';
}
?>

<style>
.boxshadow {
    box-shadow: 0px 2px 6px 2px rgba(0,0,0,0.75);
}
</style>

<section class="<?= $classes; ?>" id="<?= blocksHelper::getBlockParameter($blockid, 'uniqid', 'block-'.$blockid); ?>" style="background-color:<?= blocksHelper::getBlockParameter($blockid, 'block_color', '#fff'); ?>;color:<?= blocksHelper::getBlockParameter($blockid, 'block_font_color', '#000'); ?>">

	<div class="<?= $fluid; ?> jpfblock <?= $classes; ?>">

		<?php if($heading != '' && $heading_pos == 'left') : ?>
		<header>
			<<?= $heading_size; ?> style="color:<?= $color_title; ?>"><?= blocksHelper::getBlockParameter($blockid, 'content_title'); ?></<?= $heading_size; ?>>
			<?php if($divider == 1) : ?>
			<hr class="featurette-divider">
			<?php endif; ?>
		</header>
		<?php endif; ?>

		<div class="row">

			<div class="<?= $col2; ?> <?= $text_pos; ?> wow animate__animated animate__<?= $effect_text; ?>">
				<?php if($heading != '' && $heading_pos == 'over_text') : ?>
				<header>
					<<?= $heading_size; ?> style="color:<?= $color_title; ?>"><?= blocksHelper::getBlockParameter($blockid, 'content_title'); ?></<?= $heading_size; ?>>
					<?php if($divider == 1) : ?>
					<hr class="featurette-divider">
					<?php endif; ?>
				</header>
				<?php endif; ?>
		     	<div><?= blocksHelper::getBlockParameter($blockid, 'content_text'); ?></div>
			</div>
			
			<div class="<?= $col; ?>  <?= $img_pos; ?> wow animate__animated animate__<?= $effect_img; ?>">
				<?php if($heading != '' && $heading_pos == 'over_img') : ?>
				<header>
					<<?= $heading_size; ?> style="color:<?= $color_title; ?>"><?= blocksHelper::getBlockParameter($blockid, 'content_title'); ?></<?= $heading_size; ?>>
					<?php if($divider == 1) : ?>
					<hr class="featurette-divider">
					<?php endif; ?>
				</header>
				<?php endif; ?>
				<?php if($video == '') : ?>
				<img src="<?= JURI::root().blocksHelper::getBlockParameter($blockid,'content_img', ''); ?>" alt="<?= blocksHelper::getBlockParameter($blockid,'content_alt', ''); ?>" class="featurette-image mt-4 mt-md-0 img-fluid mx-auto <?= $img_classes; ?> <?php if($shadow == 1) : ?>boxshadow<?php endif; ?>">
				<?php else : ?>
				<div class='embed-container'><iframe src="<?= $video; ?>" frameborder="0" allowfullscreen></iframe></div>
				<?php endif; ?>
			</div>
			
			
		</div>


	</div>

</section>
