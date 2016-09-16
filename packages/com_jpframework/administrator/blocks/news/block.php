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
require_once(JPATH_ADMINISTRATOR . DS . 'components' . DS . 'com_jpframework' . DS . 'helpers' . DS . 'blocks.php');
$blockid = JRequest::getVar('blockid');
blocksHelper::loadCss(JURI::root().'administrator/components/com_jpframework/blocks/news/assets/css/news.css');
$cat = blocksHelper::getBlockParameter($blockid, 'category');
$limit = blocksHelper::getBlockParameter($blockid, 'limit');

$db = JFactory::getDbo();
$db->setQuery("select * from #__content where catid = ".$cat." and state = 1 order by created desc limit ".$limit);
$rows = $db->loadObjectList();
?>

<section id="<?php echo blocksHelper::getBlockParameter($blockid, 'uniqid', 'block-'.$blockid); ?>" style="background-color:<?php echo blocksHelper::getBlockParameter($blockid,'block_color'); ?>">
	<div id="cd-timeline" class="container">
	<?php foreach($rows as $row) : ?>
	<div class="cd-timeline-block">
		<div class="cd-timeline-img cd-location bounce-in">
			<img src="http://codyhouse.co/demo/vertical-timeline/img/cd-icon-location.svg" alt="Picture">
		</div> <!-- cd-timeline-img -->
	
		<div class="cd-timeline-content">
			<h2><?php echo $row->title; ?></h2>
			<p><?php echo $row->introtext; ?></p>
			<a href="<?php echo JRoute::_('index.php?option=com_content&view=article&id='.$row->id); ?>" class="cd-read-more">Read more</a>
			<span class="cd-date"><?php echo date('M j', strtotime($row->created)); ?></span>
		</div> <!-- cd-timeline-content -->
	</div> <!-- cd-timeline-block -->
	<?php endforeach; ?>
	<script>
	jQuery(document).ready(function($){
	var $timeline_block = $('.cd-timeline-block');

	//hide timeline blocks which are outside the viewport
	$timeline_block.each(function(){
		if($(this).offset().top > $(window).scrollTop()+$(window).height()*0.75) {
			$(this).find('.cd-timeline-img, .cd-timeline-content').addClass('is-hidden');
		}
	});

	//on scolling, show/animate timeline blocks when enter the viewport
	$(window).on('scroll', function(){
		$timeline_block.each(function(){
			if( $(this).offset().top <= $(window).scrollTop()+$(window).height()*0.75 && $(this).find('.cd-timeline-img').hasClass('is-hidden') ) {
				$(this).find('.cd-timeline-img, .cd-timeline-content').removeClass('is-hidden').addClass('bounce-in');
			}
		});
	});
});
	</script>
	</div>
</section>