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
$slider_id      = blocksHelper::getBlockParameter($blockid, 'slider_id', 'slider-'.$blockid);
$effect_text   	= blocksHelper::getBlockParameter($blockid, 'scroll_effect_text', '');
$effect_img   	= blocksHelper::getBlockParameter($blockid, 'scroll_effect_img', '');
$nextimg 		= blocksHelper::getBlockParameter($blockid, 'slider_controlImg_right', '');
$previmg 		= blocksHelper::getBlockParameter($blockid, 'slider_controlImg_left', '');
$fluid    		= blocksHelper::getBlockParameter($blockid, 'fluid', '');
$classes  		= blocksHelper::getBlockParameter($blockid,'classes');
$heading  		= blocksHelper::getBlockParameter($blockid, 'content_title');
$divider   		= blocksHelper::getBlockParameter($blockid,'divider', 1);
$heading_size  	= blocksHelper::getBlockParameter($blockid,'heading_size', 'h1');
$color_title  	= blocksHelper::getBlockParameter($blockid,'color_title', '#000');
$data   		= blocksHelper::getBlockParameter($blockid, 'list_images');

?>

<section id="<?= blocksHelper::getBlockParameter($blockid, 'uniqid', 'block-'.$blockid); ?>" style="background-color:<?= blocksHelper::getBlockParameter($blockid, 'block_color', '#fff'); ?>;color:<?= blocksHelper::getBlockParameter($blockid, 'block_font_color', '#000'); ?>">

	<div class="<?= $fluid; ?> jpfblock <?= $classes; ?>">

		<?php if($heading != '') : ?>
		<header>
			<<?= $heading_size; ?> style="color:<?= $color_title; ?>"><?= blocksHelper::getBlockParameter($blockid, 'content_title'); ?></<?= $heading_size; ?>>
			<?php if($divider == 1) : ?>
			<hr class="featurette-divider">
			<?php endif; ?>
		</header>
		<?php endif; ?>

		<div class="row">

			<div class="col-12 wow animate__animated animate__<?= $effect_text; ?>">
		     	<div><?= blocksHelper::getBlockParameter($blockid, 'content_text'); ?></div>
			</div>
			<div class="col-12 wow animate__animated animate__<?= $effect_img; ?>">

			<div id="<?= $slider_id; ?>" class="carousel slide" data-bs-ride="carousel">
				<div class="carousel-inner">
					<?php if(count($data) > 1) :
					$i = 0;
					foreach($data as $v):
					?>
					<div class="carousel-item <?= $i == 0 ? 'active' : ''; ?>">
						<img src="<?= JURI::root().$v['slider_img']; ?>" class="d-block w-100" alt="...">
					</div>
					<?php
					$i++;
					endforeach; ?>
					<?php endif; ?>
				</div>
				<button class="carousel-control-prev" type="button" data-bs-target="#<?= $slider_id; ?>" data-bs-slide="prev">
					<?php if(!empty($previmg)) :?>
					<img src="<?=$previmg?>" alt="prev">
					<?php else :?>
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<?php endif; ?>
					<span class="visually-hidden">Previous</span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#<?= $slider_id; ?>" data-bs-slide="next">
					<?php if(!empty($nextimg)) :?>
					<img src="<?=$nextimg?>" alt="next">
					<?php else :?>
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<?php endif; ?>
					<span class="visually-hidden">Next</span>
				</button>
			</div>

			</div>
			
		</div>


	</div>

</section>
