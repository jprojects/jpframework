<?php
/**
 * @version	index.php $ kim 2014-12-05 15:57
 * @package	JP_Framework
 * @copyright   Copyright © 2014 - All rights reserved.
 * @license	GNU/GPL
 * @author	kim
 * @author mail kim@aficat.com
 * @website	http://www.afi.cat
 *
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
require_once('jp_framework.class.php');
JHtml::_('jquery.framework');
error_reporting(E_ERROR | E_WARNING | E_PARSE); // Report simple running errors
?>

<!DOCTYPE html>
<html lang="<?= $this->language; ?>">
<head>
<?php if(jpf::getparameter('ganalytics') != '') : ?>
	<!-- Google Analytics -->
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
ga('create', '<?= jpf::getparameter("ganalytics"); ?>', 'auto');
ga('send', 'pageview');
</script>
<!-- End Google Analytics -->
<?php endif; ?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<jdoc:include type="head" />
<?php jpf::setHead(); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" type="text/javascript"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?= $this->baseurl.'/templates/'.$this->template; ?>/js/wow.min.js" type="text/javascript"></script>
<script src="<?= $this->baseurl.'/templates/'.$this->template; ?>/js/jpframework.js" type="text/javascript"></script>
<link rel="shortcut icon" href="<?= $this->baseurl ?>/templates/<?= $this->template ?>/icon.png" />
<link rel="stylesheet" href="<?= $this->baseurl.'/templates/'.$this->template; ?>/css/<?= jpf::getparameter('layout', 'clear'); ?>.css" type="text/css" />
<link rel="stylesheet" href="<?= $this->baseurl.'/templates/'.$this->template; ?>/css/custom.css" type="text/css" />
<?php if(jpf::getparameter('cookies', 0) != 0) : ?>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
<script src="<?= $this->baseurl.'/templates/'.$this->template; ?>/js/jquery.cookiecuttr.js"></script>
<script>
jQuery.noConflict();
jQuery(document).ready(function () {
	jQuery.cookieCuttr({
	    	cookieDeclineButton: false,
	    	cookieNotificationLocationBottom: true,
	    	cookieWhatAreTheyLink: '<?= jpf::getparameter("cookies_link", ''); ?>',
	    	cookieAcceptButtonText: "<?= JText::_('JP_FRAMEWORK_ACCEPT'); ?>",
	    	cookieDeclineButtonText: "<?= JText::_('JP_FRAMEWORK_DECLINE'); ?>",
	    	cookieWhatAreLinkText: "",
	    	cookieAnalyticsMessage: "<?= JText::_('JP_FRAMEWORK_COOKIES_EXPLANATION'); ?>",
	    	cookiePolicyLink: false
    	});
});
</script>
<?php endif; ?>
</head>

<body>

<?= jpf::getLayout(jpf::getparameter('layout', 'clear')); ?>

</body>
	<!-- Page load in <?= microtime(true) - $_SERVER['REQUEST_TIME_FLOAT']; ?> seconds -->
    	<jdoc:include type="modules" name="debug" />
</html>
