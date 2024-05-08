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


$testimonials 	= blocksHelper::getBlockParameter($blockid, 'list_testimonials');
$data   = blocksHelper::groupByKey($testimonials);
?>

<section id="<?= blocksHelper::getBlockParameter($blockid, 'uniqid', 'block-'.$blockid); ?>" class="my-5" style="background-color:<?= blocksHelper::getBlockParameter($blockid,'block_color'); ?>;color:<?= blocksHelper::getBlockParameter($blockid,'block_font_color'); ?>">

	<?php if(blocksHelper::getBlockParameter($blockid, 'tm_title') != '' || blocksHelper::getBlockParameter($blockid, 'tm_subtitle') != '') : ?>
    <div class="page-header timeline-header text-center mb-5">
        <?php if(blocksHelper::getBlockParameter($blockid, 'tm_title') != '') : ?>
        <h1 id="timeline"><?= blocksHelper::getBlockParameter($blockid, 'tm_title'); ?></h1>
        <?php endif; ?>
        <?php if(blocksHelper::getBlockParameter($blockid, 'tm_subtitle') != '') : ?>
        <p><b><?= blocksHelper::getBlockParameter($blockid, 'tm_subtitle'); ?></b></p>
        <?php endif; ?>
    </div>
    <?php endif; ?>

    <div id="testimonials" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner px-md-10">  
            <?php 
            $j = 0;
            $count = count($data['testimonial_title']);
            for ($j = 0; $j < $count; $j += 3): 
            ?> 
            <div class="carousel-item <?= $j == 0 ? 'active' : ''; ?>">
                <div class="row">     
                <?php 
                for ($i = $j; $i < min($count, $j + 3); $i++): 
                    if($data['testimonial_title'][$i] == '') break;
                ?>
                <div class="col-12 col-md-4">              
                    <div class="card p-3 bg-light round">
                        <div><b><?= $data['testimonial_title'][$i]; ?></b></div>
                        <div class="my-2"><?= $data['testimonial_text'][$i]; ?></div>
                        <p class="text-end"><b><?= $data['testimonial_name'][$i]; ?></b><br><span class="muted"><?= $data['testimonial_date'][$i]; ?></span></p>   
                        <div class="text-center">
                            <?php
                            for ($k = 1; $k <= 5; $k++) :
                            if ($k <= $data['testimonial_stars'][$i]) : ?>
                            <i class="fas fa-star text-warning"></i> 
                            <?php else : ?>
                            <i class="fas fa-star text-grey"></i> 
                            <?php
                            endif;
                            endfor; 
                            ?>
                        </div>                 
                    </div>
                </div>
                <?php endfor; ?>
                </div>
            </div>
            <?php endfor; ?>
            <button class="carousel-control-prev" type="button" data-bs-target="#testimonials" data-bs-slide="prev">
                <i class="fas fa-chevron-left"></i>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonials" data-bs-slide="next">
                <i class="fas fa-chevron-right"></i>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

</section>
