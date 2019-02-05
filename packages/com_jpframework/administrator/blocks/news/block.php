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
blocksHelper::loadCss(JURI::root().'administrator/components/com_jpframework/blocks/news/assets/css/news.css');
blocksHelper::loadJs('https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js');
blocksHelper::loadJs(JURI::root().'administrator/components/com_jpframework/blocks/news/assets/js/news.js');
$cid = blocksHelper::getBlockParameter($blockid, 'carousel_id');
$cat = blocksHelper::getBlockParameter($blockid, 'category');
$uniqid = blocksHelper::getBlockParameter($blockid, 'uniqid');

?>

<style>

</style>

<section class="SliderNews" id="<?= blocksHelper::getBlockParameter($blockid, 'uniqid', 'block-'.$blockid); ?>">
    
    <div class="demo">
        <div class="container">
            <h3 class="h3">News slider Demo - 2 </h3>    
            <div class="row">
                <div class="col-md-12">
                    <div id="news-slider2" class="owl-carousel">
                    
                    	<?php foreach(SliderNewsHelper::getArticles($cat, 3) as $item) : ?>
                    	<?php $link = JRoute::_('index.php?option=com_content&view=article&id='.$item->id.'&catid='.$cat); ?>
                        <div class="post-slide2">
                            <div class="post-img">
                                <a href="<?= $link; ?>"><?= SliderNewsHelper::getImage($item->introtext); ?></a>
                            </div>
                            <div class="post-content">
                                <h3 class="post-title"><a href="<?= $link; ?>"><?= $item->title; ?></a></h3>
                                <p class="post-description">
                                    <?= SliderNewsHelper::getText($item->introtext); ?>
                                </p>
                                <ul class="post-bar">
                                    <li><i class="fa fa-calendar"></i> <?= date('M j', strtotime($item->created)); ?></li>
                                    <!-- add tabs in the future 
                                    <li>
                                        <i class="fa fa-folder"></i>
                                        <a href="#">Mockup</a>
                                        <a href="#">Graphics</a>
                                        <a href="#">Flayers</a>
                                    </li>
                                    -->
                                </ul>
                                <a href="<?= $link; ?>" class="read-more">read more</a>
                            </div>
                        </div>
                        <?php endforeach; ?>
                            
                    </div>
                </div>
            </div>
        </div>
    </div>     

</section>
