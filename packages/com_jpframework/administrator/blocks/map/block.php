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
JHtml::_('jquery.framework');

$lang = JFactory::getLanguage();
$locales = $lang->getLocale();

$blockid    = JFactory::getApplication()->input->get('blockid');
$heading  = blocksHelper::getBlockParameter($blockid, 'heading');
$fluid    = blocksHelper::getBlockParameter($blockid, 'fluid', 1);
$zoom     = blocksHelper::getBlockParameter($blockid, 'zoom', '9');
$lat      = blocksHelper::getBlockParameter($blockid, 'lat', '28.9285745');
$long     = blocksHelper::getBlockParameter($blockid, 'long', '77.09149350000007');
$key      = blocksHelper::getBlockParameter($blockid, 'apikey');
$style    = blocksHelper::getBlockParameter($blockid, 'active_style');
$styles   = blocksHelper::getBlockParameter($blockid, 'styles');
$type     = blocksHelper::getBlockParameter($blockid, 'type', 'roadmap');
$styles   = str_replace(' ', '', $styles);
$styles   = str_replace('"',"'", $styles);
$style == 1 ? $customstyles = ",styles: ".$styles : $customstyles = "";

blocksHelper::getBlockParameter($blockid, 'draggable', 0) == 0 ? $draggable = 'false' : $draggable = 'true';
blocksHelper::getBlockParameter($blockid, 'scrollable', 0) == 0 ? $scrollable = 'false' : $scrollable = 'true';

blocksHelper::loadJs('https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&key='.$key.'&language='.$locales[4]);
$script = "function initialize() {
        var mapOptions = {
            zoom: ".$zoom.",
            scrollwheel: ".$scrollable.",
    		navigationControl: false,
    		mapTypeControl: false,
    		scaleControl: false,
    		draggable: ".$draggable.",
            center: new google.maps.LatLng(".$lat.", ".$long."),
            mapTypeId: '".$type."'
            ".$customstyles."
	};

        var map = new google.maps.Map(document.getElementById('location-canvas'), mapOptions);

        var marker = new google.maps.Marker({
                        map: map,
                        draggable: false,
                        position: new google.maps.LatLng(".$lat.", ".$long."),
			icon: '".JURI::root()."templates/jpframework/images/loc.png'
            });
     }

     google.maps.event.addDomListener(window, 'resize', initialize);
     google.maps.event.addDomListener(window, 'load', initialize);";
JFactory::getDocument()->addScriptDeclaration($script);
?>

<section id="<?= blocksHelper::getBlockParameter($blockid, 'uniqid', 'block-'.$blockid); ?>" style="<?php if($fluid != 1) : ?>padding-bottom: 50px;<?php else: ?>padding:0;<?php endif; ?>background-color:<?= blocksHelper::getBlockParameter($blockid, 'block_color'); ?>;">

	<?php if($fluid != 1) : ?><div class="container"><?php endif; ?>
	<?php if($heading != '') : ?>
	<header>
	<h1><?= $heading; ?></h1>
	<hr class="line-green-medium">
	<p class="lead"><?= blocksHelper::getBlockParameter($blockid,'subheading'); ?></p>
	</header>
	<?php endif; ?>
	
	<div id='location-canvas' style='width:100%;height:<?= blocksHelper::getBlockParameter($blockid, 'height', '300px'); ?>;'></div>
	<?php if($fluid != 1) : ?></div><?php endif; ?>
	
</section>
