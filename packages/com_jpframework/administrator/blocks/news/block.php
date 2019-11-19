<?php

/**
* @version		$Id: com_jpframework  Kim $
* @package		com_jpframework v 1.0.0
* @copyright	Copyright (C) 2014 Afi. All rights reserved.
* @license		GNU/GPL, see LICENSE.txt
*/

// restricted access
defined('_JEXEC') or die('Restricted access');
require_once('helper.php');
$blockid = JRequest::getVar('blockid');
blocksHelper::loadCss('https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css');
blocksHelper::loadCss('https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css');
blocksHelper::loadCss(JURI::root().'administrator/components/com_jpframework/blocks/news/assets/css/news.css');
blocksHelper::loadJs('https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js');
blocksHelper::loadJs(JURI::root().'administrator/components/com_jpframework/blocks/news/assets/js/news.js');
$cat = blocksHelper::getBlockParameter($blockid, 'category');
$itemid = blocksHelper::getBlockParameter($blockid, 'itemid');
$limit = blocksHelper::getBlockParameter($blockid, 'limit', 3); blocksHelper::getBlockParameter($blockid, 'tm_subtitle');
$uniqid = blocksHelper::getBlockParameter($blockid, 'uniqid');
$bgcolor = blocksHelper::getBlockParameter($blockid, 'uniqid', 'block-'.$blockid);
$color  = blocksHelper::getBlockParameter($blockid,'block_font_color');
$title = blocksHelper::getBlockParameter($blockid, 'tm_title');
$subtitle  = blocksHelper::getBlockParameter($blockid, 'tm_subtitle');
$readmore  = blocksHelper::getBlockParameter($blockid, 'readmore', 1);
?>

<style>

</style>

<section class="SliderNews" id="<?= $uniqid; ?>"  style="background-color:<?= $bgcolor; ?>;color:<?= $color; ?>">

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
                    <div id="news-slider" class="owl-carousel">

                    	<?php foreach(NewsHelper::getArticles($cat, $limit) as $item) : ?>
                    	<?php $link = JRoute::_('index.php?option=com_content&view=article&id='.$item->id.'&itemid='.$itemid); ?>
                        <div class="post-slide2">
                            <div class="post-img">
                              <a href="<?= $link; ?>"><?= NewsHelper::getImage($item->introtext); ?></a>
                            </div>
                            <div class="post-content">
                                <h3 class="post-title"><a href="<?= $link; ?>"><?= $item->title; ?></a></h3>
                                <p class="post-description">
                                    <?= NewsHelper::getText($item->introtext); ?>
                                </p>
                                <ul class="post-bar">
                                    <li><i class="fa fa-calendar"></i> <?= date('M j', strtotime($item->created)); ?></li>
                                </ul>
                                <?php if($readmore == 1) : ?>
                                <a href="<?= $link; ?>" class="read-more">read more</a>
                              <?php endif; ?>
                            </div>
                        </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
