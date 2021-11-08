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

$blockid    = JFactory::getApplication()->input->get('blockid');
blocksHelper::getBlockParameter($blockid, 'effect', '') == '' ? $effect = '' : $effect = 'class="wow '.$effect.'"';
$heading = blocksHelper::getBlockParameter($blockid, 'heading_title', '');
$classes = blocksHelper::getBlockParameter($blockid, 'classes', '');
$images  = blocksHelper::getBlockParameter($blockid, 'list_images');
$items   = blocksHelper::groupByKey($images);
?>

<section <?= $effect; ?> id="<?php echo blocksHelper::getBlockParameter($blockid, 'uniqid', 'block-'.$blockid); ?>" style="background-color:#ecf0f1">

		<div class="container <?= $classes; ?>">
		
			<?php if($heading != '') : ?>
			<header class="page-header text-center">
				<h1><?= $heading; ?></h1>
				<p class="lead"><?= blocksHelper::getBlockParameter($blockid, 'heading_subtitle'); ?></p>
			</header>
			<?php endif; ?>
		
			<div class="d-flex justify-content-between align-items-center">

			<?php if(count($items) > 0) :  
				$i = 0;
				foreach($items as $item): 
				if($items['partners_img'][$i] == '') continue;
				?>
				<div>
					<?php if($items['partners_link'][$i] != '') : ?>
					<a href="<?= $items['partners_link'][$i]; ?>" target="_blank">
					<img class="img-fluid" src="<?= $items['partners_img'][$i]; ?>" alt="<?= $items['partners_alt'][$i]; ?>">
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
