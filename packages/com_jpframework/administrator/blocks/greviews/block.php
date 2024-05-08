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
blocksHelper::loadCss(JURI::root().'administrator/components/com_jpframework/blocks/testimonials/assets/css/testimonials.css');
blocksHelper::loadJs(JURI::root().'administrator/components/com_jpframework/blocks/testimonials/assets/js/testimonials.js');
$api_key = 'AIzaSyDhaftFvfJWgy4odX0vhSTEaZoTS5YMYNc'; // Reemplaza con tu clave de API
$place_id = 'ChIJodwDg-MmpRIRlmGnNOlE3k0'; // Reemplaza con el ID del lugar de Google Places

// Construye la URL de la solicitud
$url = "https://maps.googleapis.com/maps/api/place/details/json?place_id=$place_id&key=$api_key&reviews_no_translations=true";

// Realiza la solicitud a la API de Places
$response = file_get_contents($url);

// Decodifica la respuesta JSON
$data = json_decode($response, true);

// Verifica si la solicitud fue exitosa
if ($data['status'] == 'OK') {
    // Extrae las reseñas
    $reviews = $data['result']['reviews'];
} else {
    // Maneja el caso en el que la solicitud no fue exitosa
    //echo "Error en la solicitud: " . $data['status'];
}
?>

<section id="<?php echo blocksHelper::getBlockParameter($blockid, 'uniqid', 'block-'.$blockid); ?>">

<div style="background-color:<?php echo blocksHelper::getBlockParameter($blockid,'block_color'); ?>">
<div class="container jpfblock" id="block-<?php echo $blockid; ?>">
<div class="container">
  <div class="row">
    <div class='col-md-offset-2 col-md-8 text-center'>
    <h1>Els nostres clients</h1>
    </div>
  </div>
  <div class='row'>
    <div class='col-md-offset-2 col-md-8'>
      <div class="carousel slide" data-ride="carousel" id="quote-carousel">
        
        <!-- Carousel Slides / Quotes -->
        <div class="carousel-inner">
        
          <!-- Quote 1 -->
          <?php
          $i = 0;
          foreach($reviews as $review) : ?>
          <div class="item <?php if($i == 0) : ?>active<?php endif; ?>">
            <blockquote>
              <div class="row">
                <div class="text-center">
                  <div>
                    <?php for($i=0;$i<$review['rating'];$i++) : ?>
                      <i style="color:yellow" class="fas fa-star"></i>
                    <?php endfor; ?>
                  </div>
                  <h4 class="my-3"><i class="fas fa-quote-left"></i>&nbsp;<b><?= $review['text']; ?></b>&nbsp;<i class="fas fa-quote-right"></i></h4>
                  <small><i><?= $review['author_name']; ?></i></small>
                </div>
              </div>
            </blockquote>
          </div>
          <?php 
          $i++;
          endforeach; ?>
    
        </div>
        
      </div>                          
    </div>
  </div>
</div>
</div>
</div>

</section>
