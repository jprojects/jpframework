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
blocksHelper::loadCss(JURI::root().'administrator/components/com_jpframework/blocks/circle/assets/css/circle.css');
blocksHelper::loadJs(JURI::root().'administrator/components/com_jpframework/blocks/circle/assets/js/circle.js');


$uniqid = blocksHelper::getBlockParameter($blockid, 'uniqid', 'block-'.$blockid);
$heading = blocksHelper::getBlockParameter($blockid, 'circle_heading', '');
$subheading = blocksHelper::getBlockParameter($blockid, 'circle_subheading', '');
$color = blocksHelper::getBlockParameter($blockid,'block_font_color', '#7d4ac7');

$counters   = json_decode(blocksHelper::getBlockParameter($blockid, 'list_circle'), true);
$items   = blocksHelper::group_by_key($counters);

?>

<style>
.dotCircle  .itemDot { color: <?=$color;?>; }
.dotCircle  .itemDot .forActive::after { border: 3px solid <?=$color;?>; }
.round { border: 2px dotted <?=$color;?>; }
.title-box span { color: <?=$color;?>; }
.dotCircle  .itemDot .forActive::before {border: 6px solid <?=$color;?>; }
.dotCircle .itemDot:hover, .dotCircle .itemDot.active {background: <?=$color;?>; }
</style>

<section id="<?= $uniqid; ?>" style="background-color:<?= blocksHelper::getBlockParameter($blockid,'block_color'); ?>;color:<?= blocksHelper::getBlockParameter($blockid,'block_font_color'); ?>">

	<div class="my-5">
		<div class="container py-5">
		
		   <?php if(!empty($heading)) : ?> 
		   <div class="row">
			<header class="col text-center">			
				<h1 class="lblue"><?= $heading; ?></h1>
				<?php if(!empty($subheading)) : ?> <div class="lead"><?= $subheading?></div> <?php endif; ?>			
			</header>
			</div>
			<?php endif; ?>

			<div class="row align-items-center">
            	<div class="col-lg-3 col-md-12"></div>
				<div class="col-lg-6 col-md-12">
					<div class="holderCircle">
						<div class="round"></div>
						<div class="dotCircle">
							<?php if(count($items) > 0) :
							$i = 1;  
							foreach($items as $k => $v): ?>        
							<span class="itemDot active itemDot<?=$i?>" data-tab="<?=$i;?>">
							<i class="fa <?=$v[0];?>"></i>
							<span class="forActive"></span>
							</span>
							<?php 
							$i++;
							endforeach;
							endif; ?>
						</div>
						<div class="contentCircle">
							<?php if(count($items) > 0) :
							$i = 1;  
							foreach($items as $k => $v): ?>   
							<div class="CirItem title-box <?php if($i == 1):?>active<?php endif;?> CirItem<?=$i;?>">
								<h2 class="title"><span><?=$v[1];?></span></h2>
								<p><?=$v[2];?></p>
								<i class="fa <?=$v[0];?>"></i>
								</div>
								<?php 
							$i++;
							endforeach;
							endif; ?>
						</div>
					</div>		
				</div>
			</div>
			
		</div>
	</div>

</section>
