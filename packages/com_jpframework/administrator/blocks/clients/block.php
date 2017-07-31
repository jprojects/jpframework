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
?>

<style>
.logos img {
	margin: 10px auto;
}
</style>

<section id="<?php echo blocksHelper::getBlockParameter($blockid, 'uniqid', 'block-'.$blockid); ?>" style="background-color:#ecf0f1">

		<div class="container">
		
			<header class="page-header text-center">
				<h1><?php echo blocksHelper::getBlockParameter($blockid, 'heading_title'); ?></h1>
				<p class="lead"><?php echo blocksHelper::getBlockParameter($blockid, 'heading_subtitle'); ?></p>
			</header>
		
			<div class="row">
			
				<div class="col-md-12">
					
					<div class="logos">

						<div class="col-xs-12 col-sm-12 col-md-2 text-center">
							<?php if(blocksHelper::getBlockParameter($blockid, 'testimonial_img1') != '') : ?>
							<!--<a href="<?= blocksHelper::getBlockParameter($blockid, 'link1'); ?>" target="_blank">-->
							<img class="img-responsive" src="<?= blocksHelper::getBlockParameter($blockid, 'testimonial_img1'); ?>" alt="">
							<!--</a>-->
							<?php endif; ?>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-2 text-center">
							<?php if(blocksHelper::getBlockParameter($blockid, 'testimonial_img2') != '') : ?>
							<!--<a href="<?= blocksHelper::getBlockParameter($blockid, 'link2'); ?>" target="_blank">-->
							<img class="img-responsive" src="<?= blocksHelper::getBlockParameter($blockid, 'testimonial_img2'); ?>" alt="">
							<!--</a>-->
							<?php endif; ?>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-2 text-center">
							<?php if(blocksHelper::getBlockParameter($blockid, 'testimonial_img3') != '') : ?>
							<!--<a href="<?= blocksHelper::getBlockParameter($blockid, 'link3'); ?>" target="_blank">-->
							<img class="img-responsive" src="<?= blocksHelper::getBlockParameter($blockid, 'testimonial_img3'); ?>" alt="">
							<!--</a>-->
							<?php endif; ?>
						</div>
						<div class="col-xs-12 col-md-2">
							<?php if(blocksHelper::getBlockParameter($blockid, 'testimonial_img4') != '') : ?>
							<!--<a href="<?= blocksHelper::getBlockParameter($blockid, 'link4'); ?>" target="_blank">-->
							<img class="img-responsive" src="<?= blocksHelper::getBlockParameter($blockid, 'testimonial_img4'); ?>" alt="">
							<!--</a>-->
							<?php endif; ?>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-2 text-center">
							<?php if(blocksHelper::getBlockParameter($blockid, 'testimonial_img5') != '') : ?>
							<!--<a href="<?= blocksHelper::getBlockParameter($blockid, 'link5'); ?>" target="_blank">-->
							<img class="img-responsive" src="<?= blocksHelper::getBlockParameter($blockid, 'testimonial_img5'); ?>" alt="">
							<!--</a>-->
							<?php endif; ?>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-2 text-center">
							<?php if(blocksHelper::getBlockParameter($blockid, 'testimonial_img6') != '') : ?>
							<!--<a href="<?= blocksHelper::getBlockParameter($blockid, 'link6'); ?>" target="_blank">-->
							<img class="img-responsive" src="<?= blocksHelper::getBlockParameter($blockid, 'testimonial_img6'); ?>" alt="">
							<!--</a>-->
							<?php endif; ?>
						</div>
	
					</div>
					
				</div>
			</div>
		</div>
		
</section>
