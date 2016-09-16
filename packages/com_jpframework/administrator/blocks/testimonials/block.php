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
        <!-- Bottom Carousel Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
          <li data-target="#quote-carousel" data-slide-to="1"></li>
          <li data-target="#quote-carousel" data-slide-to="2"></li>
        </ol>
        
        <!-- Carousel Slides / Quotes -->
        <div class="carousel-inner">
        
          <!-- Quote 1 -->
          <div class="item active">
            <blockquote>
              <div class="row">
                <div class="col-sm-3 text-center">
                  <img class="img-circle" src="<?php echo blocksHelper::getBlockParameter($blockid, 'testimonial_img1'); ?>" style="width: 100px;height:100px;">
                </div>
                <div class="col-sm-9">
                  <p><?php echo blocksHelper::getBlockParameter($blockid, 'testimonial_txt1'); ?></p>
                  <small><?php echo blocksHelper::getBlockParameter($blockid, 'testimonial_sign1'); ?></small>
                </div>
              </div>
            </blockquote>
          </div>
          <!-- Quote 2 -->
          <div class="item">
            <blockquote>
              <div class="row">
                <div class="col-sm-3 text-center">
                  <img class="img-circle" src="<?php echo blocksHelper::getBlockParameter($blockid, 'testimonial_img2'); ?>" style="width: 100px;height:100px;">
                </div>
                <div class="col-sm-9">
                  <p><?php echo blocksHelper::getBlockParameter($blockid, 'testimonial_txt2'); ?></p>
                  <small><?php echo blocksHelper::getBlockParameter($blockid, 'testimonial_sign2'); ?></small>
                </div>
              </div>
            </blockquote>
          </div>
          <!-- Quote 3 -->
          <div class="item">
            <blockquote>
              <div class="row">
                <div class="col-sm-3 text-center">
                  <img class="img-circle" src="<?php echo blocksHelper::getBlockParameter($blockid, 'testimonial_img3'); ?>" style="width: 100px;height:100px;">
                </div>
                <div class="col-sm-9">
                  <p><?php echo blocksHelper::getBlockParameter($blockid, 'testimonial_txt3'); ?></p>
                  <small><?php echo blocksHelper::getBlockParameter($blockid, 'testimonial_sign3'); ?></small>
                </div>
              </div>
            </blockquote>
          </div>
        </div>
        
        <!-- Carousel Buttons Next/Prev -->
        <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
        <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>
      </div>                          
    </div>
  </div>
</div>
</div>
</div>

</section>
