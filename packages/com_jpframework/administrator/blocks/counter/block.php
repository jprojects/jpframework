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
blocksHelper::loadCss(JURI::root().'administrator/components/com_jpframework/blocks/counter/assets/css/counter.css');
blocksHelper::loadJs(JURI::root().'administrator/components/com_jpframework/blocks/counter/assets/js/counter.js');


$uniqid = blocksHelper::getBlockParameter($blockid, 'uniqid', 'block-'.$blockid);
$heading = blocksHelper::getBlockParameter($blockid, 'counter_heading', '');
$subheading = blocksHelper::getBlockParameter($blockid, 'counter_subheading', '');

$counters   = json_decode(blocksHelper::getBlockParameter($blockid, 'list_counter'), true);
$items   = blocksHelper::group_by_key($counters);

?>

<section id="<?= $uniqid; ?>" style="background-color:<?= blocksHelper::getBlockParameter($blockid,'block_color'); ?>;color:<?= blocksHelper::getBlockParameter($blockid,'block_font_color'); ?>">

	<div class="details-cad my-5">
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

            	<?php if(count($items) > 0) :  
				foreach($items as $k => $v): ?>
				<div class="col">
                <div class="counter">
      			<i class="fa <?=$v[0]?> fa-2x"></i>
     		    <h2 class="timer count-title count-number" data-to="<?=$v[3]?>" data-speed="<?=$v[2]?>"></h2>
   				<p class="count-text "><?=$v[1]?></p>
    			</div>
				</div>
				<?php 
				endforeach;
				endif; ?>
                 
			</div>
			
		</div>
	</div>

</section>
