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
blocksHelper::getBlockParameter($blockid,'carousel_play') == 0 ? $play = "false" : $play = blocksHelper::getBlockParameter($blockid,'carousel_height');
$cid = blocksHelper::getBlockParameter($blockid, 'carousel_id');
$cat = blocksHelper::getBlockParameter($blockid, 'category');
$uniqid = blocksHelper::getBlockParameter($blockid, 'uniqid');

?>

<style>
.SliderNews {
    border-top:0;
    background:#c4e17f;
    background-image:-webkit-linear-gradient(left,#c4e17f,#c4e17f 12.5%,#f7fdca 12.5%,#f7fdca 25%,#fecf71 25%,#fecf71 37.5%,#f0776c 37.5%,#f0776c 50%,#db9dbe 50%,#db9dbe 62.5%,#c49cde 62.5%,#c49cde 75%,#669ae1 75%,#669ae1 87.5%,#62c2e4 87.5%,#62c2e4);background-image:-moz-linear-gradient(left,#c4e17f,#c4e17f 12.5%,#f7fdca 12.5%,#f7fdca 25%,#fecf71 25%,#fecf71 37.5%,#f0776c 37.5%,#f0776c 50%,#db9dbe 50%,#db9dbe 62.5%,#c49cde 62.5%,#c49cde 75%,#669ae1 75%,#669ae1 87.5%,#62c2e4 87.5%,#62c2e4);background-image:-o-linear-gradient(left,#c4e17f,#c4e17f 12.5%,#f7fdca 12.5%,#f7fdca 25%,#fecf71 25%,#fecf71 37.5%,#f0776c 37.5%,#f0776c 50%,#db9dbe 50%,#db9dbe 62.5%,#c49cde 62.5%,#c49cde 75%,#669ae1 75%,#669ae1 87.5%,#62c2e4 87.5%,#62c2e4);background-image:linear-gradient(to right,#c4e17f,#c4e17f 12.5%,#f7fdca 12.5%,#f7fdca 25%,#fecf71 25%,#fecf71 37.5%,#f0776c 37.5%,#f0776c 50%,#db9dbe 50%,#db9dbe 62.5%,#c49cde 62.5%,#c49cde 75%,#669ae1 75%,#669ae1 87.5%,#62c2e4 87.5%,#62c2e4);
    margin-bottom: 50px;
}
</style>

<section class="SliderNews" id="<?php echo blocksHelper::getBlockParameter($blockid, 'uniqid', 'block-'.$blockid); ?>">
        
    <div class="carousel slide" id="<?php echo $cid; ?>">
        <div class="carousel-inner">
        	
            <div class="item active">
                    <ul class="thumbnails">
                    <?php foreach(SliderNewsHelper::getArticles($cat, 0, 3) as $item) : ?>
                        <li class="col-sm-4">
				<div class="fff">
					<div class="thumbnail">
						<a href="<?php echo JRoute::_('index.php?option=com_content&view=article&id='.$item->id); ?>"><?php echo SliderNewsHelper::getImage($item->introtext); ?></a>
					</div>
					<div class="caption">
						<h4><?php echo $item->title; ?> <small><?php echo date('M j', strtotime($item->created)); ?></small></h4>
						<p><?php echo SliderNewsHelper::getText($item->introtext); ?></p>
						<a class="btn btn-mini" href="<?php echo JRoute::_('index.php?option=com_content&view=article&id='.$item->id); ?>">» Read More</a>
					</div>
                            	</div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
              </div><!-- /Slide1 --> 
              
              
            <div class="item">
                    <ul class="thumbnails">
                    <?php foreach(SliderNewsHelper::getArticles($cat, 3, 6) as $row) : ?>
                        <li class="col-sm-4">
				<div class="fff">
					<div class="thumbnail">
						<a href="<?php echo JRoute::_('index.php?option=com_content&view=article&id='.$row->id); ?>"><?php echo SliderNewsHelper::getImage($row->introtext); ?></a>
					</div>
					<div class="caption">
						<h4><?php echo $row->title; ?> <small><?php echo date('M j', strtotime($row->created)); ?></small></h4>
						<p><?php echo SliderNewsHelper::getText($row->introtext); ?></p>
						<a class="btn btn-mini" href="<?php echo JRoute::_('index.php?option=com_content&view=article&id='.$row->id); ?>">» Read More</a>
					</div>
                            	</div>
                            	<?php endforeach; ?>			
                        </li>
                    </ul>
              </div><!-- /Slide2 --> 
              
        </div>
        
       
	   <nav>
			<ul class="control-box pager">
				<li><a data-slide="prev" href="#<?php echo $cid; ?>" class=""><i class="glyphicon glyphicon-chevron-left"></i></a></li>
				<li><a data-slide="next" href="#<?php echo $cid; ?>" class=""><i class="glyphicon glyphicon-chevron-right"></i></li>
			</ul>
		</nav>
	   <!-- /.control-box -->   
                              
    </div><!-- /#myCarousel -->
        
</div><!-- /.col-xs-12 -->          

</div><!-- /.container -->

</section>
