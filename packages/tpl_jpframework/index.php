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
require_once('jp_framework.class.php');
JHtml::_('jquery.framework');
// Report simple running errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>
<!DOCTYPE html>
<html lang="<?= $this->language; ?>">
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
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<jdoc:include type="head" />
<?php jpf::setHead(); ?>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?= $this->baseurl.'/templates/'.$this->template; ?>/js/wow.min.js" type="text/javascript"></script>
<script src="<?= $this->baseurl.'/templates/'.$this->template; ?>/js/jpframework.js" type="text/javascript"></script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<link rel="shortcut icon" href="<?= $this->baseurl ?>/templates/<?= $this->template ?>/icon.png" />
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

<header>
<?= jpf::getLayout(jpf::getparameter('menu', 'menu-1'), 'menu'); ?>
</header>

<main role="main">
<?php if(jpf::getparameter('fluid', 0) == 0) : ?><div class="container"><?php endif; ?>
<?= jpf::getLayout(jpf::getparameter('layout', 'clear')); ?>
<?php if(jpf::getparameter('fluid', 0) == 0) : ?></div><?php endif; ?>
</div>

</body>
    <jdoc:include type="modules" name="debug" />
</html>              
