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

// Consumer Key
define('CONSUMER_KEY', blocksHelper::getBlockParameter($blockid, 'consumer_key'));
define('CONSUMER_SECRET', blocksHelper::getBlockParameter($blockid, 'consumer_secret'));
// User Access Token
define('ACCESS_TOKEN', blocksHelper::getBlockParameter($blockid, 'access_token'));
define('ACCESS_SECRET', blocksHelper::getBlockParameter($blockid, 'access_secret'));
// Cache Settings
define('CACHE_ENABLED', false);
define('CACHE_LIFETIME', 3600); // in seconds
define('HASH_SALT', md5(dirname(__FILE__)));

$blockid = JRequest::getVar('blockid');
jHtml::_('jquery.framework');
blocksHelper::loadCss(JURI::root().'administrator/components/com_jpframework/blocks/twitter/assets/css/twitter.css');
blocksHelper::loadJs(JURI::root().'administrator/components/com_jpframework/blocks/twitter/assets/js/tweetie.js');
?>

<section id="<?php echo blocksHelper::getBlockParameter($blockid, 'uniqid', 'block-'.$blockid); ?>">

<div style="background-color:<?php echo blocksHelper::getBlockParameter($blockid, 'block_color'); ?>">
<div class="container jpfblock">
	<div class="tweeter">
        <div class="tweet"></div>
        <div class="button"></div>
    	</div>
    <script class="source" type="text/javascript">
        jQuery('.tweeter .tweet').twittie({
            dateFormat: '%b. %d, %Y',
            template: '{{tweet}} <div class="date">{{date}}</div>',
            count: 1,
            hideReplies: true,
            loadingText: 'Loading!',
	    	username: '<?php echo blocksHelper::getBlockParameter($blockid, 'username'); ?>',
            apiPath : '<?php echo dirname(__FILE__); ?>/api/tweet.php'
        });
    </script>
</div>
</div>

</section>