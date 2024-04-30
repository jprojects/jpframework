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
blocksHelper::loadCss(JURI::root().'administrator/components/com_jpframework/blocks/cards/assets/css/cards.css');

$uniqid  = blocksHelper::getBlockParameter($blockid, 'uniqid', 'block-'.$blockid);
$columns = blocksHelper::getBlockParameter($blockid, 'cards_column', 3);
$cards   = blocksHelper::getBlockParameter($blockid, 'list_cards');
$classes = blocksHelper::getBlockParameter($blockid, 'classes');
$items   = blocksHelper::groupByKey($cards);

?>

<section id="<?= $uniqid; ?>" style="background-color:<?= blocksHelper::getBlockParameter($blockid,'block_color'); ?>;color:<?= blocksHelper::getBlockParameter($blockid,'block_font_color'); ?>">

	<div class="details-cad my-2 <?= $classes; ?>">
		<div class="container">
		
			<?php if(blocksHelper::getBlockParameter($blockid, 'cards_heading', '') != '') : ?>
			<header>			
				<h1 class="lblue"><?= blocksHelper::getBlockParameter($blockid, 'cards_heading'); ?></h1>
				<?php if(blocksHelper::getBlockParameter($blockid, 'cards_subheading', '') != '') : ?>
				<div class="lead"><?= blocksHelper::getBlockParameter($blockid, 'cards_subheading'); ?></div>	
				<?php endif; ?>			
			</header>
			<?php endif; ?>

			<div class="row row-cols-1 row-cols-md-<?= $columns; ?> g-4">
                
            	<?php if(count($items) > 0) :  
				$i = 0;
				foreach($items as $item): 
				if($items['card_desc_text'][$i] == '') continue;
				?>
				<div class="col">
					<div class="card h-100">
						<div class="card-content">
							<?php if($items['card_img'][$i] != '') : ?>
							<div class="card-img">
								<img src="<?= $items['card_img'][$i]; ?>" alt="<?= $items['card_img_alt'][$i]; ?>">
								<?php if($items['card_img_heading'][$i] != '') : ?><span><h4><?= $items['card_img_heading'][$i]; ?></h4></span><?php endif; ?>
							</div>
							<?php endif; ?>
							<div class="card-desc">
								<h3><?= $items['card_desc_heading'][$i]; ?></h3>
								<p><?= $items['card_desc_text'][$i]; ?></p>
								<?php if($items['card_href'][$i] != '') : ?>
								<a href="index.php?Itemid=<?= $items['card_href'][$i]; ?>" class="btn btn-primary"><?= $items['card_href_text'][$i]; ?></a>   
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
				<?php 
				$i++;
				endforeach;
				endif; ?>
                 
			</div>
			
		</div>
	</div>

</section>
