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
JHtml::_('jquery.framework');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?= $this->language; ?>" lang="<?= $this->language; ?>" dir="<?= $this->direction; ?>">
<head>
<?php if(jpf::getparameter('ganalytics') != '') : ?>
<!-- Google analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?= jpf::getparameter('ganalytics'); ?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments)};
  gtag('js', new Date());
 
  gtag('config', '<?= jpf::getparameter("ganalytics"); ?>');
</script>
<!-- End Google analytics -->
<?php endif; ?>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<jdoc:include type="head" />
<?php jpf::setHead(); ?>
<link type="text/plain" rel="author" href="<?= $this->baseurl.'/templates/'.$this->template; ?>/humans.txt" />
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?= $this->baseurl.'/templates/'.$this->template; ?>/js/wow.min.js" type="text/javascript"></script>
<script src="<?= $this->baseurl.'/templates/'.$this->template; ?>/js/jpframework.js" type="text/javascript"></script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<link rel="shortcut icon" href="<?= $this->baseurl ?>/templates/<?= $this->template ?>/icon.png" />
<link rel="apple-touch-icon-precomposed" href="<?= $this->baseurl ?>/templates/<?= $this->template ?>/icon.png" />
<link rel="stylesheet" href="<?= $this->baseurl.'/templates/'.$this->template; ?>/css/custom.css" type="text/css" />
<?php if(jpf::getparameter('cookies', 0) != 0) : ?>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
<script src="//cookiecuttr.com/assets/js/plugins/jquery.cookiecuttr.js"></script>
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

<?php if(jpf::getparameter('fluid', 0) == 0) : ?>
<div class="container">
<?php endif; ?>

<?= jpf::getLayout(jpf::getparameter('menu', 'menu-1'), 'menu'); ?>

<?= jpf::getLayout(jpf::getparameter('layout', 'clear')); ?>

<?php if(jpf::getparameter('fluid', 0) == 0) : ?>
</div>
<?php endif; ?>

<?php if(jpf::getparameter('addthis', '') != '') : ?>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=<?= jpf::getparameter('addthis'); ?>" async="async"></script>
<?php endif; ?>

</body>
    <jdoc:include type="modules" name="debug" />
</html>              
