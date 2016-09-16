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

blocksHelper::loadJs('https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&key='.$key);
$script = "function initialize() {
        var mapOptions = {
                zoom: ".$zoom.",
                scrollwheel: false,
    navigationControl: false,
    mapTypeControl: false,
    scaleControl: false,
    draggable: true,
                center: new google.maps.LatLng(".$lat.", ".$long."),
                styles: [ { 'featureType':'water', 'elementType':'geometry', 'stylers':[ { 'color':'#e9e9e9' }, { 'lightness':17 } ] }, { 'featureType':'landscape', 'elementType':'geometry', 'stylers':[ { 'color':'#f5f5f5' }, { 'lightness':20 } ] }, { 'featureType':'road.highway', 'elementType':'geometry.fill', 'stylers':[ { 'color':'#ffffff' }, { 'lightness':17 } ] }, { 'featureType':'road.highway', 'elementType':'geometry.stroke', 'stylers':[ { 'color':'#ffffff' }, { 'lightness':29 }, { 'weight':0.2 } ] }, { 'featureType':'road.arterial', 'elementType':'geometry', 'stylers':[ { 'color':'#ffffff' }, { 'lightness':18 } ] }, { 'featureType':'road.local', 'elementType':'geometry', 'stylers':[ { 'color':'#ffffff' }, { 'lightness':16 } ] }, { 'featureType':'poi', 'elementType':'geometry', 'stylers':[ { 'color':'#f5f5f5' }, { 'lightness':21 } ] }, { 'featureType':'poi.park', 'elementType':'geometry', 'stylers':[ { 'color':'#dedede' }, { 'lightness':21 } ] }, { 'elementType':'labels.text.stroke', 'stylers':[ { 'visibility':'on' }, { 'color':'#ffffff' }, { 'lightness':16 } ] }, { 'elementType':'labels.text.fill', 'stylers':[ { 'saturation':36 }, { 'color':'#333333' }, { 'lightness':40 } ] }, { 'elementType':'labels.icon', 'stylers':[ { 'visibility':'off' } ] }, { 'featureType':'transit', 'elementType':'geometry', 'stylers':[ { 'color':'#f2f2f2' }, { 'lightness':19 } ] }, { 'featureType':'administrative', 'elementType':'geometry.fill', 'stylers':[ { 'color':'#fefefe' }, { 'lightness':20 } ] }, { 'featureType':'administrative', 'elementType':'geometry.stroke', 'stylers':[ { 'color':'#fefefe' }, { 'lightness':17 }, { 'weight':1.2 } ] } ]};

        var map = new google.maps.Map(document.getElementById('location-canvas'),
                                        mapOptions);

        var marker = new google.maps.Marker({
                        map: map,
                        draggable: false,
                        position: new google.maps.LatLng(".$lat.", ".$long.")
            });
     }

     google.maps.event.addDomListener(window, 'resize', initialize);
     google.maps.event.addDomListener(window, 'load', initialize);";
JFactory::getDocument()->addScriptDeclaration($script);
?>

<section id="<?php echo blocksHelper::getBlockParameter($blockid, 'uniqid', 'block-'.$blockid); ?>" style='padding:0;'>
<div id='location-canvas' style='width:100%;height:<?php echo blocksHelper::getBlockParameter($blockid, 'height', '300px'); ?>;'></div>
</section>
