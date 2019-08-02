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

$blockid = JRequest::getVar('blockid');
blocksHelper::loadCss(JURI::root().'administrator/components/com_jpframework/blocks/youtube/assets/css/youtube.css');
?>

<script>
$(document).ready(function() {
	$('.youtube-link').click(function(e) {
		e.preventDefault();
		var channelid = $(this).attr('data-id');
		$('#ytframe').attr('src', 'https://www.youtube.com/embed/'+channelid);
    });
})
</script>

<section id="<?= blocksHelper::getBlockParameter($blockid, 'uniqid'); ?>" style="padding: 20px 0;background-color:<?= blocksHelper::getBlockParameter($blockid, 'block_color'); ?>;color:<?= blocksHelper::getBlockParameter($blockid, 'font_color'); ?>">    				
	<div class="container">
		<div class="row video-list-thumbs">
		
		<?php
		//Get the id of "uploads"
		//More info: https://developers.google.com/youtube/v3/docs/channels/list

		$channelId 	= blocksHelper::getBlockParameter($blockid, 'channelId');
		$maxResults = blocksHelper::getBlockParameter($blockid, 'limit', 5);
		$API_key 	= blocksHelper::getBlockParameter($blockid, 'apikey');

		$list_items = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId='.$channelId.'&maxResults='.$maxResults.'&key='.$API_key.''));

		$i = 0;
		
		foreach($list_items->items as $item)
		{
			if($i == 0) {		
				echo '<div id="'. $item->id->videoId .'" class="col-lg-10 col-sm-10 col-xs-12 youtube-video">
						<iframe width="560" id="ytframe" height="315" src="https://www.youtube.com/embed/'. $item->id->videoId .'" frameborder="0" gesture="media" allowfullscreen></iframe>					
				</div>';
				echo '<div class="col-lg-2 col-sm-2 col-xs-12"><h3>'.blocksHelper::getBlockParameter($blockid, 'heading').'</h3>'.blocksHelper::getBlockParameter($blockid, 'subheading').'</div>';
			} else {
				echo '<div id="'. $item->id->videoId .'" class="col-lg-3 col-sm-6 col-xs-6 youtube-video">
					<a class="youtube-link" data-id="'. $item->id->videoId .'" href="#" title="'. $item->snippet->title .'">
						<img src="'. $item->snippet->thumbnails->medium->url .'" alt="'. $item->snippet->title .'" class="img-responsive" height="130px" />
						<h2>'. $item->snippet->title .'</h2>
						<span class="glyphicon glyphicon-play-circle"></span>
					</a>
				</div>';
			}
			$i++;
		}
		?>
		
		</div>	
	</div>
</section>
