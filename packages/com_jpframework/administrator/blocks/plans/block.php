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
blocksHelper::loadCss(JURI::root().'administrator/components/com_jpframework/blocks/plans/assets/css/plans.css');

$uniqid = blocksHelper::getBlockParameter($blockid, 'uniqid', 'block-'.$blockid);

$plans  = json_decode(blocksHelper::getBlockParameter($blockid, 'list_plans'), true);
$items  = blocksHelper::group_by_key($plans);

$count  = count($items);

?>

<section id="<?= $uniqid; ?>" style="background-color:<?= blocksHelper::getBlockParameter($blockid,'block_color'); ?>;color:<?= blocksHelper::getBlockParameter($blockid,'block_font_color'); ?>">

	<div class="details-cad my-5">
		<div class="container py-5">
		
			<?php if(blocksHelper::getBlockParameter($blockid, 'tm_title') != '') : ?>
			<div class="page-header timeline-header text-center mb-5">
				<h1 id="timeline"><?= blocksHelper::getBlockParameter($blockid, 'tm_title'); ?></h1>
				<?php if(blocksHelper::getBlockParameter($blockid, 'tm_subtitle') != '') : ?>
				<p><?= blocksHelper::getBlockParameter($blockid, 'tm_subtitle'); ?></p>
				<?php endif; ?>
			</div>
			<?php endif; ?>

			<div class="row">
                
            	<?php if($count > 0) :  
				foreach($items as $r => $b): ?>
				<div class="col-<?= (12 / $count); ?> princing-item" style="background-color: <?= $v[0]; ?>;">
          			<div class="pricing-divider ">
              			<h3 class="text-light"><?= $v[1]; ?></h3>
            			<h4 class="my-0 display-2 text-light font-weight-normal mb-3"><span class="h3">&euro;</span> <?= $v[1]; ?> <span class="h5">/mes</span></h4>
             			<svg class='pricing-divider-img' enable-background='new 0 0 300 100' height='100px' id='Layer_1' preserveAspectRatio='none' version='1.1' viewBox='0 0 300 100' width='300px' x='0px' xml:space='preserve' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns='http://www.w3.org/2000/svg' y='0px'>
						  <path class='deco-layer deco-layer--1' d='M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729
					c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z' fill='#FFFFFF' opacity='0.6'></path>
						  <path class='deco-layer deco-layer--2' d='M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729
					c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z' fill='#FFFFFF' opacity='0.6'></path>
						  <path class='deco-layer deco-layer--3' d='M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716
					H42.401L43.415,98.342z' fill='#FFFFFF' opacity='0.7'></path>
						  <path class='deco-layer deco-layer--4' d='M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428
					c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z' fill='#FFFFFF'></path>
						</svg>
						
          			</div>
          			<div class="card-body bg-white mt-0 shadow">
            			<div class="mb-5 position-relative">
						  <p><?= $v[2]; ?></p>
						</div>
            			<a href="<?= $v[3]; ?>" class="btn btn-lg btn-block  btn-custom "><?= $v[4]; ?></a>
          			</div>
        		</div>
				<?php 
				endforeach;
				endif; ?>
                 
			</div>
			
		</div>
	</div>

</section>



<div class="container-fluid bg-gradient p-5">
      <div class="row m-auto text-center w-75">
        
        
       
        
      </div>
    </div>
