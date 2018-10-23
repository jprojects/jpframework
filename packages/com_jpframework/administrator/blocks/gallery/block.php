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
jHtml::_('jquery.framework');
blocksHelper::loadCss(JURI::root().'administrator/components/com_jpframework/assets/css/lightbox.css');
blocksHelper::loadJs(JURI::root().'administrator/components/com_jpframework/assets/js/lightbox.min.js');
blocksHelper::loadJs(JURI::root().'administrator/components/com_jpframework/blocks/gallery/assets/js/jquery.isotope.min.js');
$uniqid = blocksHelper::getBlockParameter($blockid, 'uniqid', 'block-'.$blockid);
?>

<script>
jQuery.noConflict();
jQuery(window).load(function(){
    var container = jQuery('.creations-container');
    container.isotope({
        filter: '*',
        animationOptions: {
            duration: 750,
            easing: 'linear',
            queue: false
        }
    });

    jQuery('.creations-filter a').click(function(){
        jQuery('.creations-filter .current').removeClass('current');
        jQuery(this).addClass('current');

        var selector = jQuery(this).attr('data-filter');
        container.isotope({
            filter: selector,
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
#<?= $uniqid; ?> {
	background-color: <?= blocksHelper::getBlockParameter($blockid,'block_color'); ?>;
}
#<?= $uniqid; ?> header {
margin-bottom: 12px;
text-align: center;
}
#<?= $uniqid; ?> .thumb { height: 160px; }

#<?= $uniqid; ?> .creations-filter a.current { 
    font-weight:bold;
}

#<?= $uniqid; ?> .isotope-item {
    z-index: 2;
}
#<?= $uniqid; ?> .isotope-hidden.isotope-item {
    pointer-events: none;
    z-index: 1;
}
#<?= $uniqid; ?> .isotope,
#<?= $uniqid; ?> .isotope .isotope-item {
  /* change duration value to whatever you like */

    -webkit-transition-duration: 0.8s;
    -moz-transition-duration: 0.8s;
    transition-duration: 0.8s;
}
#<?= $uniqid; ?> .isotope {
    -webkit-transition-property: height, width;
    -moz-transition-property: height, width;
    transition-property: height, width;
}
#<?= $uniqid; ?> .isotope .isotope-item {
    -webkit-transition-property: -webkit-transform, opacity;
    -moz-transition-property: -moz-transform, opacity;
    transition-property: transform, opacity;
}
</style>

<section id="<?= blocksHelper::getBlockParameter($blockid, 'uniqid', 'block-'.$blockid); ?>" style="background-color:<?= blocksHelper::getBlockParameter($blockid,'block_color'); ?>;color:<?= blocksHelper::getBlockParameter($blockid,'block_font_color'); ?>">

	<div>
		<div class="container jpfblock">
			<header>
				<h1><?= blocksHelper::getBlockParameter($blockid, 'gallery_title'); ?></h1>
				<div class="lead"><?= blocksHelper::getBlockParameter($blockid, 'gallery_text'); ?></div>
				<div class="btn-group creations-filter" role="group" aria-label="...">	
				  	<a href="#all" data-filter="*" class="current btn btn-default">All</a>
				  	<?php 
				  	$tags = explode(',', blocksHelper::getBlockParameter($blockid,'gallery_tags'));
				  	foreach($tags as $tag) :
				  	?>
				  	<a href="#<?= $tag;?>" data-filter=".<?= $tag;?>" class="btn btn-default"><?= $tag;?></a>
					<?php endforeach; ?>
				</div>
			</header>

			<div class="creations-container">
			<?php 
			$dir = JPATH_ROOT.'/images/'.blocksHelper::getBlockParameter($blockid, 'gallery_folder');
			$i = 1;
			if (is_dir($dir)) {
				if ($dh = opendir($dir)) {
					while (($file = readdir($dh)) !== false) { 
				if ($file != "." && $file != ".." && $file != "index.html") {
				$img = explode('-', $file);
				?>
				<div class="col-lg-3 col-md-4 col-xs-6 thumb <?= $img[0]; ?>">
					<a class="thumbnail" href="images/<?= blocksHelper::getBlockParameter($blockid, 'gallery_folder').DS.$file; ?>" data-lightbox="gallery">
					<img class="img-responsive" src="images/<?= blocksHelper::getBlockParameter($blockid, 'gallery_folder').DS.$file; ?>" alt="">
				</a>
				</div>
			<?php 
			}
			$i++;
			}
					closedir($dh);
				}
			}
			?>
			</div>
		</div>
	</div>

</section>
