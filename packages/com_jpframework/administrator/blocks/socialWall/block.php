<?php

/**
* @version		$Id: com_jpframework  Kim $
* @package		com_jpframework v 1.0.0
* @copyright	Copyright (C) 2014 Afi. All rights reserved.
* @license		GNU/GPL, see LICENSE.txt
*/

// restricted access
defined('_JEXEC') or die('Restricted access');

$blockid = JRequest::getVar('blockid');
blocksHelper::loadCss(JURI::root().'administrator/components/com_jpframework/blocks/socialWall/css/jquery.socialfeed.css');
blocksHelper::loadJs(JURI::root()."administrator/components/com_jpframework/blocks/socialWall/js/jquery.socialfeed.js");
blocksHelper::loadJs(JURI::root()."administrator/components/com_jpframework/blocks/socialWall/js/codebird.js");
blocksHelper::loadJs(JURI::root()."administrator/components/com_jpframework/blocks/socialWall/js/doT.js");
blocksHelper::loadJs(JURI::root()."administrator/components/com_jpframework/blocks/socialWall/js/moment.js");

$fb_account   = blocksHelper::getBlockParameter($blockid, 'fb_account');
$fb_id        = blocksHelper::getBlockParameter($blockid, 'fb_id');
$fb_token     = blocksHelper::getBlockParameter($blockid, 'fb_token');
$fb_limit     = blocksHelper::getBlockParameter($blockid, 'fb_limit');
$tw_account   = blocksHelper::getBlockParameter($blockid, 'tw_account');
$tw_consumer  = blocksHelper::getBlockParameter($blockid, 'tw_consumer');
$tw_consumer_secret_key   = blocksHelper::getBlockParameter($blockid, 'tw_consumer_secret_key');
$tw_limit     = blocksHelper::getBlockParameter($blockid, 'tw_limit');
$g_account    = blocksHelper::getBlockParameter($blockid, 'g_account');
$g_token      = blocksHelper::getBlockParameter($blockid, 'g_token');
$g_limit      = blocksHelper::getBlockParameter($blockid, 'g_limit');
$pin_account  = blocksHelper::getBlockParameter($blockid, 'pin_account');
$pin_token    = blocksHelper::getBlockParameter($blockid, 'pin_token');
$pin_limit    = blocksHelper::getBlockParameter($blockid, 'pin_limit');
$ins_account  = blocksHelper::getBlockParameter($blockid, 'ins_account');
$ins_id       = blocksHelper::getBlockParameter($blockid, 'ins_id');
$ins_token    = blocksHelper::getBlockParameter($blockid, 'ins_token');
$ins_limit    = blocksHelper::getBlockParameter($blockid, 'ins_limit');
$rss_url      = blocksHelper::getBlockParameter($blockid, 'rss_url');
$rss_limit    = blocksHelper::getBlockParameter($blockid, 'rss_limit');
?>

<div class="social-feed-container container-fluid" style="margin-bottom: 50px;"></div>

<script>
jQuery(document).ready(function() {

	jQuery('.social-feed-container').socialfeed({
	
	    <?php if($fb_account != '') : ?>
            // FACEBOOK
	    facebook:{
		accounts: ['<?= $fb_account; ?>'],  //Array: Specify a list of accounts from which to pull wall posts
		limit: <?= $fb_limit; ?>,                                   //Integer: max number of posts to load
		access_token: '<?= $fb_id; ?>|<?= $fb_token; ?>'  //String: "APP_ID|APP_SECRET"
	    },
	    <?php endif; ?>
	    <?php if($tw_account != '') : ?>
	    // TWITTER
	    twitter:{
		accounts: ['<?= $tw_account; ?>'],                      //Array: Specify a list of accounts from which to pull tweets
		limit: <?= $tw_limit; ?>,                                   //Integer: max number of tweets to load
		consumer_key: '<?= $tw_consumer; ?>',          //String: consumer key. make sure to have your app read-only
		consumer_secret: '<?= $tw_consumer_secret_key; ?>',//String: consumer secret key. make sure to have your app read-only
	     },
	    <?php endif; ?>
	    <?php if($g_account != '') : ?>
	    // GOOGLEPLUS
	    google:{
		 accounts: ['<?= $g_account; ?>'],                //Array: Specify a list of accounts from which to pull posts
		 limit: <?= $g_limit; ?>,                                  //Integer: max number of posts to load
		 access_token: '<?= $g_token; ?>'//String: G+ access token
	     },
             <?php endif; ?>
	    <?php if($ins_account != '') : ?>
	    // INSTAGRAM
	    instagram:{
		accounts: ['<?= $ins_account; ?>'],  //Array: Specify a list of accounts from which to pull posts
		limit: <?= $ins_limit; ?>,                                   //Integer: max number of posts to load
		client_id: '<?= $ins_id; ?>'       //String: Instagram client id (option if using access token)
		access_token: '<?= $ins_token; ?>' //String: Instagram access token
	    },
		<?php endif; ?>
	    <?php if($pin_account != '') : ?>
	    // PINTEREST

	    pinterest:{
		accounts: ['<?= $pin_account; ?>'],   //Array: Specify a list of accounts from which to pull posts
		                                            //@me to pull your pins
		                                            //@user/board to pull pins from a user board
		limit: <?= $pin_limit; ?>,                                   //Integer: max number of posts to load
		access_token: '<?= $pin_token; ?>' //String: Pinterest client id
	    },
	<?php endif; ?>
	    <?php if($rss_url != '') : ?>
	    // RSS

	    rss:{
		urls: ['<?= $rss_url; ?>'], //Array: Specifiy a list of rss feed from which to pull posts
		limit: <?= $rss_limit; ?>                                      //Integer: max number of posts to load for each url
	    },
	<?php endif; ?>
	    // GENERAL SETTINGS
	    length:400,                                     //Integer: For posts with text longer than this length, show an ellipsis.
	    show_media:true,                                //Boolean: if false, doesn't display any post images
	    media_min_width: 300,                           //Integer: Only get posts with images larger than this value
	    update_period: 10000,                            //Integer: Number of seconds before social-feed will attempt to load new posts.
	    template: "administrator/components/com_jpframework/blocks/socialWall/tmpl/template.html",                         //String: Filename used to get the post template.
	    date_format: "ll"
	});
});
</script>
