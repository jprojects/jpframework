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
jHtml::_('jquery.framework');
blocksHelper::loadJs('https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js');
$uniqid = blocksHelper::getBlockParameter($blockid, 'uniqid', 'block-'.$blockid);

$tags = json_decode(blocksHelper::getBlockParameter($blockid, 'list_tags'), true);
$keys    = blocksHelper::group_by_key($tags);

$gallery = json_decode(blocksHelper::getBlockParameter($blockid, 'list_items'), true);
$gals    = blocksHelper::group_by_key($gallery);
?>

<script>
jQuery.noConflict();
jQuery(window).load(function(){

    var container = jQuery('.grid');
    
    container.isotope({
        filter: '*',
        itemSelector: '.grid-item',
        layoutMode: 'fitRows',
        percentPosition: true,
        animationOptions: {
            duration: 750,
            easing: 'linear',
            queue: false
        }
    });

    jQuery('.filter a').click(function(){
        jQuery('.filter .current').removeClass('current');
        jQuery(this).addClass('current');

        var selector = jQuery(this).attr('data-filter');
        container.isotope({
            filter: selector,
            layoutMode: 'fitRows',
            percentPosition: true,
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
         });
         return false;
        }); 
    });
</script>

<style>
.grid-item { width: 24%; }
</style>

<section id="<?= $uniqid; ?>" style="background-color:<?= blocksHelper::getBlockParameter($blockid,'block_color'); ?>;color:<?= blocksHelper::getBlockParameter($blockid,'block_font_color'); ?>" class="scrollable">

	<div class="my-5">
		<div class="container py-5">
		
			<header>			
				<h1 class="lblue"><?= blocksHelper::getBlockParameter($blockid, 'gallery_title'); ?></h1>
				<div class="lead"><?= blocksHelper::getBlockParameter($blockid, 'gallery_text'); ?></div>
			</header>
				
			<div class="row filter">
				<div class="col-md-3">
					<a href="#all" data-filter="*" class="current btn btn-default">
					<img class="rounded-circle" src="images/sampledata/exposicions/rodona_header_noseleccio.png" alt="" onmouseover="this.src='images/sampledata/exposicions/rodona_header_seleccio_i_mouseover.png'" onmouseout="this.src='images/sampledata/exposicions/rodona_header_noseleccio.png'">	
					<div class="mt-2 fs-12 hblue"><?= JText::_('JALL'); ?></div>
				  	</a>
				</div>
			  	<?php 
			  	$tags = explode(',', blocksHelper::getBlockParameter($blockid,'gallery_tags'));
			  	foreach($keys as $x => $y) :
			  	?>
			  	<div class="col-md-3">
				  	<a href="#<?= $y[1];?>" data-filter=".<?= $y[1];?>">
				  	<img class="rounded-circle" src="images/sampledata/exposicions/rodona_header_noseleccio.png" alt="" onmouseover="this.src='images/sampledata/exposicions/rodona_header_seleccio_i_mouseover.png'" onmouseout="this.src='images/sampledata/exposicions/rodona_header_noseleccio.png'">
				  	<div class="mt-2 fs-12 hblue"><?= $y[0];?></div>
				  	</a>
			  	</div>
				<?php endforeach; ?>
			</div>							

			<div class="grid container-fluid text-center mx-auto">
				<?php if(count($gals) > 0) : ?>
				<?php foreach($gals as $r => $b): ?>

				<div class="grid-item col-md-3 text-center <?= $b[1]; ?>">
					<a href="<?= JRoute::_('index.php?Itemid='.$b[4]); ?>">
						<img class="img-fluid" src="<?= $b[2]; ?>" alt="<?= $b[0]; ?>" onmouseover="this.src='<?= $b[3]; ?>'" onmouseout="this.src='<?= $b[2]; ?>'">
						<div class="mt-2 fs-12 hblue"><?= $b[0]; ?></div>
					</a>
				</div>			
				<?php endforeach; ?>
				<?php endif; ?>
			</div>
			
		</div>
	</div>

</section>
