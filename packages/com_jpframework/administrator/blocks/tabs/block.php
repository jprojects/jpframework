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
blocksHelper::loadCss(JURI::root().'administrator/components/com_jpframework/blocks/tabs/assets/css/tabs.css');

$uniqid = blocksHelper::getBlockParameter($blockid, 'uniqid', 'block-'.$blockid);

$tabs   = json_decode(blocksHelper::getBlockParameter($blockid, 'list_tabs'), true);
$navs   = blocksHelper::group_by_key($tabs);

$tabitems  = json_decode(blocksHelper::getBlockParameter($blockid, 'list_items'), true);
$items     = blocksHelper::group_by_key($tabitems);
?>

<section id="<?= $uniqid; ?>" style="background-color:<?= blocksHelper::getBlockParameter($blockid,'block_color'); ?>;color:<?= blocksHelper::getBlockParameter($blockid,'block_font_color'); ?>" class="scrollable">

	<div class="my-5">
		<div class="container py-5">
		
			<header>			
				<h1 class="lblue"><?= blocksHelper::getBlockParameter($blockid, 'tabs_heading'); ?></h1>
				<div class="lead"><?= blocksHelper::getBlockParameter($blockid, 'tabs_subheading'); ?></div>				
			</header>

			<div class="grid container-fluid text-center mx-auto">
				<nav>
					<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
						<?php if(count($tabs) > 0) :  
						$i = 0;
						foreach($tabs as $r => $b): ?>

                      	<a class="nav-item nav-link <?php if($i == 0) : ?>active<?php endif; ?>" id="nav-home-tab" data-toggle="tab" href="<?= $b[0]; ?>" role="tab" aria-controls="nav-home" aria-selected="true"><?= $b[1]; ?></a>                                    
                  			
						<?php 
						$i++;
						endforeach;
						endif; ?>
					</div>
                </nav>
                
                <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                	<?php if(count($items) > 0) :  
						$i = 0;
						foreach($items as $r => $b): ?>
						<div class="tab-pane fade show <?php if($i == 0) : ?>active<?php endif; ?>" id="<?= $b[0]; ?>" role="tabpanel" aria-labelledby="nav-home-tab"><?= $b[1]; ?></div>
						<?php 
						$i++;
						endforeach;
						endif; ?>
                </div>
                 
			</div>
		</div>
	</div>

</section>
