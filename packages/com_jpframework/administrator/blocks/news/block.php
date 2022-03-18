<?php

/**
* @version		$Id: com_jpframework  Kim $
* @package		com_jpframework v 1.0.0
* @copyright	Copyright (C) 2014 Afi. All rights reserved.
* @license		GNU/GPL, see LICENSE.txt
*/

// restricted access
defined('_JEXEC') or die('Restricted access');

use Joomla\CMS\HTML\HTMLHelper;

require_once('helper.php');
HTMLHelper::_('jquery.framework');

$blockid    = JFactory::getApplication()->input->get('blockid');
blocksHelper::loadCss('https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css');
blocksHelper::loadCss('https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css');
blocksHelper::loadCss(JURI::root().'administrator/components/com_jpframework/blocks/news/assets/css/news.css?v=1.1.1');
blocksHelper::loadJs('https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js');

$cat        = blocksHelper::getBlockParameter($blockid, 'category');
$itemid     = blocksHelper::getBlockParameter($blockid, 'itemid');
$limit      = blocksHelper::getBlockParameter($blockid, 'limit', 3); 
$subtitle   = blocksHelper::getBlockParameter($blockid, 'tm_subtitle', '');
$uniqid     = blocksHelper::getBlockParameter($blockid, 'uniqid');
$bgcolor    = blocksHelper::getBlockParameter($blockid, 'uniqid', 'block-'.$blockid);
$color      = blocksHelper::getBlockParameter($blockid,'block_font_color');
$title      = blocksHelper::getBlockParameter($blockid, 'tm_title');
$subtitle   = blocksHelper::getBlockParameter($blockid, 'tm_subtitle');
$readmore   = blocksHelper::getBlockParameter($blockid, 'readmore', 1);
$classes    = blocksHelper::getBlockParameter($blockid, 'classes', '');
$show_image = blocksHelper::getBlockParameter($blockid, 'show_image', 0);
$nitems_xs  = blocksHelper::getBlockParameter($blockid, 'nitems_xs', 1);
$nitems_sm  = blocksHelper::getBlockParameter($blockid, 'nitems_sm', 3);
$nitems_md  = blocksHelper::getBlockParameter($blockid, 'nitems_md', 5);
$date_pos   = blocksHelper::getBlockParameter($blockid, 'date_pos', 1);
$date_format= blocksHelper::getBlockParameter($blockid, 'date_format', 'M j');
?>

<section class="SliderNews <?= $classes; ?>" id="<?= $uniqid; ?>"  style="background-color:<?= $bgcolor; ?>;color:<?= $color; ?>">

    <div class="<?= $classes; ?>">
        <div class="<?= $fluid; ?>">

            <?php if($title != '') : ?>
			           <div class="page-header timeline-header text-center text-blue mb-5">
				               <h1 id="timeline"><?= $title; ?></h1>
		                   <?php if($subtitle != '') : ?>
		                   <p><?= $subtitle; ?></p>
		                   <?php endif; ?>
			            </div>
			      <?php endif; ?>

            <div class="row">
                <div class="col-md-12">
                    <div id="news-slider" class="owl-carousel owl-theme">

                    	<?php foreach(NewsHelper::getArticles($cat, $limit) as $item) : ?>
                        <?php $image = NewsHelper::getImage($item->id); ?>
                    	<?php $link = JRoute::_('index.php?option=com_blogger&view=item&id='.$item->id.'&Itemid='.$itemid); ?>
                        <div class="post-slide2">
                            <div class="post-content">

                                <?php if($show_image == 1 && $image != '') : ?>
                                    <img src="<?= JURI::base().$image; ?>" alt="<?= $item->title; ?>" class="card-img-top" alt="...">
                                <?php endif; ?>

                                <?php if($date_pos == 0) : ?>
                                <div class="datepos"><?= date($date_format, strtotime($item->publish_up)); ?></div>
                                <?php endif; ?>

                                <h3 class="post-title text-center mt-2 text-blue"><?= $item->title; ?></h3>
                                <p class="post-description">
                                    <?= NewsHelper::getIntro($item->description); ?>
                                </p>
                                <?php if($date_pos == 1) : ?>
                                <ul class="post-bar">
                                    <li><i class="fa fa-calendar"></i> <?= date($date_format, strtotime($item->publish_up)); ?></li>
                                </ul>
                                <?php endif; ?>
                                <?php if($readmore == 1) : ?>
                                <a href="<?= $link; ?>" class="btn btn-secondary">Llegir +</a>
                                <?php endif; ?>

                            </div>
                        </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    $("#news-slider").owlCarousel({
        dots:true,
        nav:false,
        loop:true,
        margin:10,
        responsiveClass:true,
        responsive:{
            0:{
                items:<?= $nitems_xs; ?>
            },
            600:{
                items:<?= $nitems_sm; ?>
            },
            1000:{
                items:<?= $nitems_md; ?>
            }
        }
    });
    </script>

</section>
