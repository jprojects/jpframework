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
blocksHelper::loadCss(JURI::root().'administrator/components/com_jpframework/blocks/SliderNews/assets/css/SliderNews.css');
$cid = blocksHelper::getBlockParameter($blockid, 'carousel_id');
$cat = blocksHelper::getBlockParameter($blockid, 'category');
$uniqid = blocksHelper::getBlockParameter($blockid, 'uniqid');

?>

<style>

</style>

<section class="SliderNews" id="<?= blocksHelper::getBlockParameter($blockid, 'uniqid', 'block-'.$blockid); ?>">

	<div class="row">
		<div class="col col-xs-12">
        	<div class="blog-grids" id="<?= $cid; ?>">
                
            	<?php foreach(SliderNewsHelper::getArticles($cat, 3) as $item) : ?>
            	<?php $link = JRoute::_('index.php?option=com_content&view=article&id='.$item->id.'&catid='.$cat); ?>
                <div class="grid">
                    <div class="entry-media">
                        <a href="<?= $link; ?>"><?= SliderNewsHelper::getImage($item->introtext); ?></a>
                    </div>
                    <div class="entry-body">
                        <span class="cat">Notícies</span>
                        <h3><a href="<?= $link; ?>"><?= $item->title; ?></a></h3>
                        <p><?= SliderNewsHelper::getText($item->introtext); ?></p>
                        <div class="read-more-date">
                            <a href="<?= $link; ?>">Llegir més..</a>
                            <span class="date"><?= date('M j', strtotime($item->created)); ?></span>
                        </div>
                    </div>
                </div>
				<?php endforeach; ?>
				
            </div>
        </div>
	</div>       

</section>
