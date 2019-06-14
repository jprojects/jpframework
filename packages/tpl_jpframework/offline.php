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
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/montserrat" type="text/css"/>   
<!-- custom css -->
<link href="<?= $this->baseurl; ?>/templates/<?= $this->template; ?>/offline/css/custom.css" rel="stylesheet"/>
</head>

<style>
	#home { background-image: url(../<?= $app->getCfg('offline_image'); ?>); }
</style>

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
		<div id="subscribe" class="col-6 mx-auto">
    	<form action="<?= JRoute::_('index.php', true); ?>" method="post" id="form-login">
		<div class="form-group">
			<input class="form-control mx-auto" name="username" id="username" type="text" placeholder="<?= JText::_('JGLOBAL_USERNAME') ?>" />
		</div>
		<div class="form-group">
			<input class="form-control mx-auto" type="password" name="password" placeholder="<?= JText::_('JGLOBAL_PASSWORD') ?>" id="passwd" />
		</div>
			<input type="submit" name="Submit" class="btn btn-default btn-block mx-auto" value="<?= JText::_('JLOGIN') ?>" />
		    <input type="hidden" name="option" value="com_users" />
		    <input type="hidden" name="task" value="user.login" />
		    <input type="hidden" name="return" value="<?= base64_encode(JURI::base()) ?>" />
		    <?= JHtml::_('form.token'); ?>
    	</form>
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
