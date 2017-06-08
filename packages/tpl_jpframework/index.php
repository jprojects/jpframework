<?php
/**
 * @version		index.php $ kim 2014-12-05 15:57
 * @package		JP_Framework
 * @copyright   Copyright © 2014 - All rights reserved.
 * @license		GNU/GPL
 * @author		kim
 * @author mail kim@aficat.com
 * @website		http://www.afi.cat
 *
*/
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
require_once('jp_framework.class.php');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<jdoc:include type="head" />
<?php jpf::unload(); ?>
<link type="text/plain" rel="author" href="<?php echo $this->baseurl.'/templates/'.$this->template; ?>/humans.txt" />
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo $this->baseurl.'/templates/'.$this->template; ?>/scripts/wow.min.js" type="text/javascript"></script>
<script src="<?php echo $this->baseurl.'/templates/'.$this->template; ?>/scripts/jpframework.js" type="text/javascript"></script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<link rel="shortcut icon" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/icon.png" />
<link rel="apple-touch-icon-precomposed" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/icon.png" />
<link rel="stylesheet" href="<?php echo $this->baseurl.'/templates/'.$this->template; ?>/css/custom.css" type="text/css" />
<?php jpf::styles(); ?>
<?php if(jpf::getparameter('cookies', 0) != 0) : ?>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
<script src="//cookiecuttr.com/assets/js/plugins/jquery.cookiecuttr.js"></script>
<script>
jQuery.noConflict();
jQuery(document).ready(function () {
jQuery.cookieCuttr({
    cookieDeclineButton: true,
    cookieNotificationLocationBottom: true,
    cookieWhatAreTheyLink: '<?= jpf::getparameter("cookies_link", ''); ?>',
    cookieAcceptButtonText: "<?php echo JText::_('JP_FRAMEWORK_ACCEPT'); ?>",
    cookieDeclineButtonText: "<?php echo JText::_('JP_FRAMEWORK_DECLINE'); ?>",
    cookieWhatAreLinkText: "<?php echo JText::_('JP_FRAMEWORK_COOKIES_TITLE'); ?>",
    cookieAnalyticsMessage: "<?php echo JText::_('JP_FRAMEWORK_COOKIES_EXPLANATION'); ?>",
    cookiePolicyLink: false
    });	
});
</script>
<?php endif; ?>
</head>
    
<body>

<?php if(jpf::getparameter('ganalytics') != '') : ?>
<!-- Google analytics -->
<script type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', '<?= jpf::getparameter("ganalytics"); ?>']);
	_gaq.push(['_trackPageview']);
	(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
</script>
<!-- End Google analytics -->
<?php endif; ?>

<?php if(jpf::getparameter('fluid', 0) == 0) : ?>
<div class="container">
<?php endif; ?>

<?php echo jpf::getLayout(jpf::getparameter('menu', 'menu-1'), 'menu'); ?>

<?php echo jpf::getLayout(jpf::getparameter('layout', 'clear')); ?>

<?php if(jpf::getparameter('fluid', 0) == 0) : ?>
</div>
<?php endif; ?>

<?php if(jpf::getparameter('addthis', '') != '') : ?>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=<?php echo jpf::getparameter('addthis'); ?>" async="async"></script>
<?php endif; ?>

</body>
    <jdoc:include type="modules" name="debug" />
</html>              
