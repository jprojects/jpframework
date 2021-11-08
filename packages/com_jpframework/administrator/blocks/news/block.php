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
$cat = blocksHelper::getBlockParameter($blockid, 'category');
$itemid = blocksHelper::getBlockParameter($blockid, 'itemid');
$limit = blocksHelper::getBlockParameter($blockid, 'limit', 3); blocksHelper::getBlockParameter($blockid, 'tm_subtitle');
$uniqid = blocksHelper::getBlockParameter($blockid, 'uniqid');
$bgcolor = blocksHelper::getBlockParameter($blockid, 'uniqid', 'block-'.$blockid);
$color  = blocksHelper::getBlockParameter($blockid,'block_font_color');
$title = blocksHelper::getBlockParameter($blockid, 'tm_title');
$subtitle  = blocksHelper::getBlockParameter($blockid, 'tm_subtitle');
$readmore  = blocksHelper::getBlockParameter($blockid, 'readmore', 1);
$classes  = blocksHelper::getBlockParameter($blockid, 'classes', '');
?>

<section class="SliderNews <?= $classes; ?>" id="<?= $uniqid; ?>"  style="background-color:<?= $bgcolor; ?>;color:<?= $color; ?>">

    <div class="<?= $classes; ?>">
        <div class="<?= $fluid; ?>">

            <?php if($title != '') : ?>
			           <div class="page-header timeline-header text-center mb-5">
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
                    	<?php $link = JRoute::_('index.php?option=com_blogger&view=item&id='.$item->id.'&Itemid='.$itemid); ?>
                        <div class="post-slide2">
                            <!-- <div class="post-img">
                              <a href="<?//= $link; ?>"><?//= NewsHelper::getImage($item->introtext); ?></a>
                            </div> -->
                            <div class="post-content">
                                <h3 class="post-title"><a href="<?= $link; ?>"><?= $item->title; ?></a></h3>
                                <p class="post-description">
                                    <?= NewsHelper::getIntro($item->description); ?>
                                </p>
                                <ul class="post-bar">
                                    <li><i class="fa fa-calendar"></i> <?= date('d-m-Y', strtotime($item->publish_up)); ?></li>
                                </ul>
                                <?php if($readmore == 1) : ?>
                                <a href="<?= $link; ?>" class="btn btn-primary">Llegir més</a>
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
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    });
    </script>

</section>
