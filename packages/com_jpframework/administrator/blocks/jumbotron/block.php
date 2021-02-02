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
$uniqid     = blocksHelper::getBlockParameter($blockid, 'uniqid', 'block-'.$blockid);
$height     = blocksHelper::getBlockParameter($blockid, 'jumbotron-height', '100vh');
$classes    = blocksHelper::getBlockParameter($blockid, 'classes', '');
$bg_color   = blocksHelper::getBlockParameter($blockid, 'block_color', '');
$title      = blocksHelper::getBlockParameter($blockid, 'jumbotron-title', '');
$txt        = blocksHelper::getBlockParameter($blockid, 'jumbotron-text', '');
$btn1_text  = blocksHelper::getBlockParameter($blockid, 'jumbotron-btn1-text', '');
$btn1_class = blocksHelper::getBlockParameter($blockid, 'jumbotron-btn1-class', 'primary');
$btn1_link  = blocksHelper::getBlockParameter($blockid, 'jumbotron-btn1-link', '#');
$text       = blocksHelper::getBlockParameter($blockid, 'jumbotron-text', '');
$image      = blocksHelper::getBlockParameter($blockid, 'jumbotron-img', '');
$anchor     = blocksHelper::getBlockParameter($blockid, 'jumbotron-anchor', '');
?>


<section id="<?= $uniqid; ?>" class="pt-5 pb-5 mt-0 align-items-center d-flex bg-dark <?= $classes; ?>" style="height:<?= $height; ?>; <?php if($image != '') : ?>background-size: cover; background-image: url(<?= $image; ?>);<?php else: ?>background-color:<?= $bg_color; ?>;<?php endif; ?>">
  
   <div class="container-fluid">
      <div class="row  justify-content-center align-items-center d-flex text-center h-100">
        <div class="col-12 col-md-8  h-50 ">
            <?php if($title != '') : ?><h1 class="display-2 text-light mb-2 mt-5"><strong><?= $title; ?></strong></h1><?php endif; ?>
            <?php if($txt != '') : ?><p class="lead  text-light mb-5"><?= $txt; ?></p><?php endif; ?>
            <?php if($btn1_text != '') : ?><p><a href="<?= $btn1_link; ?>" class="btn bg-<?= $btn1_class; ?> shadow-lg btn-round text-light btn-lg btn-rised"><?= $btn1_text; ?></a></p><?php endif; ?>
					
            <?php if($anchor != '') : ?>
					  <div class="btn-container-wrapper p-relative d-block zindex-1">
						  <a class="btn btn-link btn-lg   mt-md-3 mb-4 scroll align-self-center text-light" href="<?= $anchor; ?>">
						    <i class="fa fa-angle-down fa-4x text-light"></i>
						  </a>   
					  </div>  
            <?php endif; ?> 
        </div>
		 
      </div>
    </div>
    </section>
