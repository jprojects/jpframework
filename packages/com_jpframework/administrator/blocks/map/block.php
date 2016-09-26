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

$blockid  = JRequest::getVar('blockid');
$zoom     = blocksHelper::getBlockParameter($blockid, 'zoom', '9');
$lat      = blocksHelper::getBlockParameter($blockid, 'lat', '28.9285745');
$long     = blocksHelper::getBlockParameter($blockid, 'long', '77.09149350000007');
$key      = blocksHelper::getBlockParameter($blockid, 'apikey');
$styles   = blocksHelper::getBlockParameter($blockid, 'styles');
$styles   = str_replace(' ', '', $styles);
$styles   = str_replace('"',"'", $styles);

blocksHelper::getBlockParameter($blockid, 'draggable') == 0 ? $draggable = false : $draggable = true;
blocksHelper::getBlockParameter($blockid, 'scrollable') == 0 ? $scrollable = false : $scrollable = true;

blocksHelper::loadJs('https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&key='.$key);
$script = "function initialize() {
        var mapOptions = {
                zoom: ".$zoom.",
                scrollwheel: ".$scrollable.",
    		navigationControl: false,
    		mapTypeControl: false,
    		scaleControl: false,
    		draggable: ".$draggable.",
                center: new google.maps.LatLng(".$lat.", ".$long."),
                styles: ".$styles."
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

<section id="<?php echo blocksHelper::getBlockParameter($blockid, 'uniqid', 'block-'.$blockid); ?>" style='padding:0;'>
<div id='location-canvas' style='width:100%;height:<?php echo blocksHelper::getBlockParameter($blockid, 'height', '300px'); ?>;'></div>
</section>
