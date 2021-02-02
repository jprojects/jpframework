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
blocksHelper::loadCss(JURI::root().'administrator/components/com_jpframework/blocks/testimonials/assets/css/testimonials.css');
blocksHelper::loadJs(JURI::root().'administrator/components/com_jpframework/blocks/testimonials/assets/js/testimonials.js');

$testimonials 	= json_decode(blocksHelper::getBlockParameter($blockid, 'list_testimonials'), true);
$tm   = blocksHelper::group_by_key($testimonials);
?>

<section id="<?= blocksHelper::getBlockParameter($blockid, 'uniqid', 'block-'.$blockid); ?>" class="testimonial-section2" style="background-color:<?= blocksHelper::getBlockParameter($blockid,'block_color'); ?>;color:<?= blocksHelper::getBlockParameter($blockid,'block_font_color'); ?>">

	<?php if(blocksHelper::getBlockParameter($blockid, 'tm_title') != '') : ?>
    <div class="page-header timeline-header text-center mb-5">
        <h1 id="timeline"><?= blocksHelper::getBlockParameter($blockid, 'tm_title'); ?></h1>
        <?php if(blocksHelper::getBlockParameter($blockid, 'tm_subtitle') != '') : ?>
        <p><?= blocksHelper::getBlockParameter($blockid, 'tm_subtitle'); ?></p>
        <?php endif; ?>
    </div>
    <?php endif; ?>
        
   	<div id="testim" class="testim">

        <div class="wrap">

            <span id="right-arrow" class="arrow right fa fa-chevron-right"></span>
            <span id="left-arrow" class="arrow left fa fa-chevron-left "></span>
            
            <ul id="testim-dots" class="dots">
            	<?php 
                $i = 0;
                foreach($tm as $k => $v) : ?> 
                <li class="dot <?php if($i == 0) : ?>active<?php endif; ?>"></li>
                <?php 
                $i++;
                endforeach; ?>
            </ul>
            <div id="testim-content" class="cont"> 
                
                <?php 
                $i = 0;
                foreach($tm as $k => $v) : ?>               
                <div <?php if($i == 0) : ?>class="active"<?php endif; ?>>
                    <div class="img"><img src="<?= $v[0]; ?>" alt=""></div>
                    <div class="h4"><?= $v[1]; ?></div>
                    <p><?= $v[2]; ?></p>                    
                </div>
                <?php 
                $i++;
                endforeach; ?>

            </div>
            
       </div>
       
   </div>

</section>
