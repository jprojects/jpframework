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

JHtml::_('jquery.framework');
blocksHelper::loadCss(JURI::root().'administrator/components/com_jpframework/blocks/counter/assets/css/counter.css');
blocksHelper::loadJs(JURI::root().'administrator/components/com_jpframework/blocks/counter/assets/js/counter.js');


$uniqid 	= blocksHelper::getBlockParameter($blockid, 'uniqid', 'block-'.$blockid);
$classes 	= blocksHelper::getBlockParameter($blockid, 'classes', '');
$heading 	= blocksHelper::getBlockParameter($blockid, 'counter_heading', '');
$subheading = blocksHelper::getBlockParameter($blockid, 'counter_subheading', '');
$counters   = (array)blocksHelper::getBlockParameter($blockid, 'list_counter');
?>

<section id="<?= $uniqid; ?>" class="<?= $classes; ?>" style="background-color:<?= blocksHelper::getBlockParameter($blockid,'block_color'); ?>;color:<?= blocksHelper::getBlockParameter($blockid,'block_font_color'); ?>">

	<div class="details-card">
		<div class="container py-5">
		
		   <?php if(!empty($heading)) : ?> 
		   <div class="row">
			<header class="col text-center">			
				<h1 class="lblue"><?= $heading; ?></h1>
				<?php if(!empty($subheading)) : ?> <div class="lead"><?= $subheading?></div> <?php endif; ?>			
			</header>
			</div>
			<?php endif; ?>

			<div class="row text-center">        

            	<?php if(count($counters) > 0) :  
				foreach($counters as $counter): ?>
				<div class="col">
					<div class="counter">
						<i class="<?= $counter['counter_icon']; ?> fa-2x"></i>
						<h2 class="timer count-title count-number" data-to="<?= $counter['counter_end']; ?>" data-speed="<?= $counter['counter_velocity']; ?>"></h2>
						<p class="count-text "><?= $counter['counter_title']; ?></p>
					</div>
				</div>
				<?php 
				endforeach;
				endif; ?>
                 
			</div>
			
		</div>
	</div>

</section>
