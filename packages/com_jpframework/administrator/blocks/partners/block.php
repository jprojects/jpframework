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

blocksHelper::loadCss('https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css');
blocksHelper::loadCss('https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css');
blocksHelper::loadJs('https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js');

$blockid    = JFactory::getApplication()->input->get('blockid');
blocksHelper::getBlockParameter($blockid, 'effect', '') == '' ? $effect = '' : $effect = 'wow '.$effect.'';
$heading  = blocksHelper::getBlockParameter($blockid, 'heading_title', '');
$subtitle = blocksHelper::getBlockParameter($blockid, 'heading_subtitle', '');
$classes  = blocksHelper::getBlockParameter($blockid, 'classes', '');
$data   = blocksHelper::getBlockParameter($blockid, 'list_images');
?>

<section id="<?php echo blocksHelper::getBlockParameter($blockid, 'uniqid', 'block-'.$blockid); ?>" style="background-color:<?= blocksHelper::getBlockParameter($blockid, 'block_color', '#fff'); ?>;color:<?= blocksHelper::getBlockParameter($blockid, 'block_font_color', '#000'); ?>">

		<div class="container <?= $classes; ?>">
		
			<?php if($heading != '') : ?>
			<header class="page-header text-center">
				<h1><?= $heading; ?></h1>
				<?php if($subtitle != '') : ?>
				<p class="lead"><?= $subtitle; ?></p>
				<?php endif; ?>
			</header>
			<?php endif; ?>
		
			<div id="partners-slider" class="owl-carousel owl-theme">

			<?php if(count($data) > 0) :  
				$i = 0;
				foreach($data as $v): 
				if($v['partners_img'] == '') continue;
				?>
				<div class="d-flex justify-content-center align-items-center mb-3 px-5">
					<?php if($v['partners_link'] != '') : ?>
					<a class="px-5" href="<?= $v['partners_link']; ?>" target="_blank">
					<?php endif; ?>
					<img class="img-fluid <?= $effect; ?>" src="<?= $v['partners_img']; ?>" alt="<?= $v['partners_alt']; ?>">
					<?php if($v['partners_link'] != '') : ?>
					</a>
					<?php endif; ?>
				</div>
				<?php 
				$i++;
				endforeach;
				endif; ?>
					
				</div>
			</div>
		</div>
		
</section>
<script>
    jQuery("#partners-slider").owlCarousel({
        dots:true,
        nav:false,
        loop:true,
        margin:10,
		items: 3,
        responsiveClass:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:3
            }
        }
    });
    </script>