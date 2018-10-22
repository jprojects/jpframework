<?php
/**
 * @version    	jp_framework.php $ kim 2011-02-02 15:57
 * @package		JPFramework
 * @copyright   Copyright © 2010 - All rights reserved.
 * @license		GNU/GPL
 * @author		kim
 * @author mail kim@aficat.com
 * @website		http://www.afi.cat
 *
*/

defined('_JEXEC') or die;

$app    = JFactory::getApplication();
$params = JComponentHelper::getParams( 'com_jpframework' );
$date   = $params->get( 'offline_date' );
?>

<!DOCTYPE HTML>
<!--[if lt IE 7 ]> <html lang="en" class="ie ie6"> <![endif]--> 
<!--[if IE 7 ]>	<html lang="en" class="ie ie7"> <![endif]--> 
<!--[if IE 8 ]>	<html lang="en" class="ie ie8"> <![endif]--> 
<!--[if IE 9 ]>	<html lang="en" class="ie ie9"> <![endif]--> 
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<title><?= htmlspecialchars($app->getCfg('sitename')); ?></title>
<meta http-equiv="X-UA-Compatible" content="chrome=1">
<link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/open-sans-y2k" type="text/css"/>  
<link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/lobster" type="text/css"/>  
<!-- forkawesome -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fork-awesome@1.1.5/css/fork-awesome.min.css" integrity="sha256-P64qV9gULPHiZTdrS1nM59toStkgjM0dsf5mK/UwBV4=" crossorigin="anonymous">
<!-- custom css -->
<link href="<?= $this->baseurl; ?>/templates/<?= $this->template; ?>/offline/css/custom.css" rel="stylesheet"/>
</head>

<body id="home">
<div id="Header">
<div class="wrapper">
	<h1><?= htmlspecialchars($app->getCfg('sitename')); ?></h1>	
	</div>
</div>
<div id="Content" class="wrapper"> 
<div class="countdown styled"></div> 
<?php if ($app->getCfg('display_offline_message', 1) == 1 && str_replace(' ', '', $app->getCfg('offline_message')) != ''): ?>
    <h1 class="intro"><?= $app->getCfg('offline_message'); ?></h1>
<?php elseif ($app->getCfg('display_offline_message', 1) == 2 && str_replace(' ', '', JText::_('JOFFLINE_MESSAGE')) != ''): ?>
    <h1 class="intro"><?= JText::_('JOFFLINE_MESSAGE'); ?></h1>
<?php  endif; ?></h2>
<div id="subscribe"> 
	<form action="" method="post" onsubmit="">
		<p><input name="" value="Enter your e-mail" type="text" id=""/>
		<input type="button" value="Submit"/></p>
	</form>
	<div id="socialIcons">
		<ul> 
			<li><a href="<?= $params->get('youtube', '#'); ?>#"><i class="fa fa-youtube"></i></a></li>
          	<li><a href="<?= $params->get('facebook', '#'); ?>"><i class="fa fa-facebook-official"></i></a></li>
          	<li><a href="<?= $params->get('twitter', '#'); ?>"><i class="fa fa-twitter"></i></a></li>
		  	<li><a href="<?= $params->get('instagram', '#'); ?>"><i class="fa fa-instagram"></i></a></li>
		</ul>
	</div>
</div>
<span class="tempBy">Copyright &copy; 2016 <?= htmlspecialchars($app->getCfg('sitename')); ?> by <a target="_blank" style="color:#fff;" href="https://www.afi.cat">Afi informàtica</a></span>
</div>

<div id="overlay"></div>

<!--Scripts-->
<script
src="https://code.jquery.com/jquery-1.12.4.min.js"
integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
crossorigin="anonymous"></script>
<script type="text/javascript" src="<?= $this->baseurl; ?>/templates/<?= $this->template; ?>/offline/js/Backstretch.js"></script>
<script type="text/javascript" src="<?= $this->baseurl; ?>/templates/<?= $this->template; ?>/offline/js/jquery.countdown.js"></script>
<script>
$( function() {
	$.backstretch("<?= JURI::root().$app->get('offline_image', '<?= $this->baseurl; ?>/templates/<?= $this->template; ?>/offline/images/offline.jpg'); ?>"); //background image
	var endDate = "<?= $date; ?>"; //countdown
});
</script>
<script type="text/javascript" src="js/scripts.js"></script>

</body>
</html>
