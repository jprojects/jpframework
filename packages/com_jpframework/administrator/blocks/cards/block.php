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

$uniqid = blocksHelper::getBlockParameter($blockid, 'uniqid', 'block-'.$blockid);

$cards   = json_decode(blocksHelper::getBlockParameter($blockid, 'list_cards'), true);
$items   = blocksHelper::group_by_key($cards);

?>

<section id="<?= $uniqid; ?>" style="background-color:<?= blocksHelper::getBlockParameter($blockid,'block_color'); ?>;color:<?= blocksHelper::getBlockParameter($blockid,'block_font_color'); ?>">

	<div class="details-cad my-5">
		<div class="container py-5">
		
			<header>			
				<h1 class="lblue"><?= blocksHelper::getBlockParameter($blockid, 'cards_heading'); ?></h1>
				<div class="lead"><?= blocksHelper::getBlockParameter($blockid, 'cards_subheading'); ?></div>				
			</header>

			<div class="row">
                
            	<?php if(count($items) > 0) :  
				foreach($items as $r => $b): ?>
				<div class="col-md-<?= blocksHelper::getBlockParameter($blockid, 'cards_column'); ?>">
                <div class="card-content">
                    <div class="card-img">
                        <img src="<?= $b[0]; ?>" alt="<?= $b[1]; ?>">
                        <?php if($b[2] != '') : ?><span><h4><?= $b[2]; ?></h4></span><?php endif; ?>
                    </div>
                    <div class="card-desc">
                        <h3><?= $b[3]; ?></h3>
                        <p><?= $b[4]; ?></p>
                        <a href="index.php?Itemid=<?= $b[5]; ?>" class="btn btn-primary"><?= $b[6]; ?></a>   
                    </div>
                </div>
            	</div>
				<?php 
				endforeach;
				endif; ?>
                 
			</div>
			
		</div>
	</div>

</section>
