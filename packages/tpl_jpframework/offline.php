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
$app = JFactory::getApplication();
$params = &JComponentHelper::getParams( 'com_jpframework' );
$date = $params->get( 'offline_date', '' );
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo $this->baseurl.'/templates/'.$this->template; ?>/css/offline.css" rel="stylesheet">
<script src="//code.jquery.com/jquery.js"></script>
<script src="<?php echo $this->baseurl.'/templates/'.$this->template; ?>/scripts/jquery.countdown.js" type="text/javascript"></script>
<title><?php echo htmlspecialchars($app->getCfg('sitename')); ?></title>

<?php 
if($date != '') : 
$parts = $explode('-', $date);
?>
<script>
$(function(){
	
	var note = $('#note');
	var ts = new Date(<?php echo $parts[0]; ?>, <?php echo $parts[1]; ?>, <?php echo $parts[2]; ?>, 0, 0, 0);
		
	$('#countdown').countdown({
		timestamp	: ts,
		callback	: function(days, hours, minutes, seconds){
			
			var message = "Queden ";
			
			message += days + " " + ( days==1 ? 'dia':'dies' ) + ", ";
			message += hours + " " + ( hours==1 ? 'hora':'hores' ) + ", ";
			message += minutes + " minut" + ( minutes==1 ? '':'s' ) + " i ";
			message += seconds + " segon" + ( seconds==1 ? '':'s' ) + " ";
			message += "per la presentació!";
			
			note.html(message);
		}
	});
	
});
</script>
<?php endif; ?>
</head>
<body>

<jdoc:include type="message" />

<div id="coming-soon">

    <h1><?php echo htmlspecialchars($app->getCfg('sitename')); ?></h1>
	
	<?php if ($app->getCfg('display_offline_message', 1) == 1 && str_replace(' ', '', $app->getCfg('offline_message')) != ''): ?>
	<p><?php echo $app->getCfg('offline_message'); ?></p>
	<?php elseif ($app->getCfg('display_offline_message', 1) == 2 && str_replace(' ', '', JText::_('JOFFLINE_MESSAGE')) != ''): ?>
	<p><?php echo JText::_('JOFFLINE_MESSAGE'); ?></p>
	<?php  endif; ?>
	
	<div id="subscribe">
    	<form action="<?php echo JRoute::_('index.php', true); ?>" method="post" id="form-login" class="form-inline">
		<div class="form-group">
			<input name="username" id="username" type="text" class="form-control" placeholder="<?php echo JText::_('JGLOBAL_USERNAME') ?>" />
		</div>
		<div class="form-group">
			<input type="password" name="password" class="form-control" placeholder="<?php echo JText::_('JGLOBAL_PASSWORD') ?>" id="passwd" />
		</div>
		<input type="submit" name="Submit" class="btn btn-default" value="<?php echo JText::_('JLOGIN') ?>" />
		<input type="hidden" name="option" value="com_users" />
		<input type="hidden" name="task" value="user.login" />
		<input type="hidden" name="return" value="<?php echo base64_encode(JURI::base()) ?>" />
		<?php echo JHtml::_('form.token'); ?>
    	</form>
	</div>

	<div id="countdown"></div>
	<p id="note"></p>
	
</body>
</html>
