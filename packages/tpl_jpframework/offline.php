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
$date = JComponentHelper::getParams( 'com_jpframework' )->get( 'offline_date', date('Y-m-d', strtotime("+1 week")) );
$parts = explode('-', $date);
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?= $this->language; ?>" lang="<?= $this->language; ?>" dir="<?= $this->direction; ?>">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($app->getCfg('sitename')); ?></title>
    
    <script
  	src="https://code.jquery.com/jquery-1.12.4.min.js"
  	integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  	crossorigin="anonymous"></script>

    <!-- Bootstrap -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">

    <!-- fontawesome -->
    <script src="https://use.fontawesome.com/3db7fc1628.js"></script>

    
    <!-- google font -->
    <link href='http://fonts.googleapis.com/css?family=Cabin:400,700' rel='stylesheet' type='text/css'>

    <!-- custom css -->
    <link href="offline/css/custom.css" rel="stylesheet"/>
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    
    <?php if ($app->get('offline_image', $this->baseurl.'/templates/'.$this->template.'/offline/images/offline.jpg') && file_exists($app->get('offline_image'))) : ?>
		<style>body { background: url("<?= $app->get('offline_image'); ?>") no-repeat center center fixed; }</style>
	<?php endif; ?>
    
    <script>
	$(document).ready(function(){
	  $("#counter").countdown({
	  until: new Date(<?php echo $parts[0]; ?>, <?php echo $parts[1]; ?>, <?php echo $parts[2]; ?>, 0, 0, 0),
	  format: 'dHMS'
	  });
	});

	</script>
    
  </head>
  <body>
    <div class="se-pre-con"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          	<div class="header-logo-wrapper">
            	<?= htmlspecialchars($app->getCfg('sitename')); ?>
          	</div>
        </div>
      </div>
      
      <div class="row">
      	<div class="col-md-12">
      		<jdoc:include type="message" />
      	</div>
      </div>

      <div class="row">
        <div class="col-md-12">
        <?php if ($app->getCfg('display_offline_message', 1) == 1 && str_replace(' ', '', $app->getCfg('offline_message')) != ''): ?>
        <h1 class="text-center"><?php echo $app->getCfg('offline_message'); ?></h1>
        <?php elseif ($app->getCfg('display_offline_message', 1) == 2 && str_replace(' ', '', JText::_('JOFFLINE_MESSAGE')) != ''): ?>
        <h1 class="text-center"><?php echo JText::_('JOFFLINE_MESSAGE'); ?></h1>
        <?php  endif; ?>
        </div>
      </div>
  
      <div class="row">
        <div class="col-md-12">
          <div id="counter_wrapper">
            <div class="text-center" id="counter"></div>
          </div>
        </div>
      </div>

      <div class="text-center subscribe-form-wrapper">
       <form action="<?= JRoute::_('index.php', true); ?>" method="post" id="form-login" class="form-inline">
          <div class="form-group">
           <label for="username"><?= JText::_('JGLOBAL_USERNAME') ?></label>
           <input name="username" id="username" name="username" class="center-block form-control" placeholder="<?= JText::_('JGLOBAL_USERNAME') ?>" />
          </div>

          <div class="form-group">
            <label for="passwd"><?php echo JText::_('JGLOBAL_PASSWORD') ?></label>
            <input type="password" name="password" id="passwd" class="center-block form-control form-subs-email" placeholder="<?php echo JText::_('JGLOBAL_PASSWORD') ?>" />
          </div>
          
          <?php if (count($twofactormethods) > 1) : ?>
          <div class="form-group">
		  	<label for="secretkey"><?= JText::_('JGLOBAL_SECRETKEY'); ?></label>
			<input type="text" name="secretkey" id="secretkey" class="center-block form-control" placeholder="<?= JText::_('JGLOBAL_SECRETKEY'); ?>" />
		  </div>
		  <?php endif; ?>

          <button type="submit" class="btn btn-default"><?= JText::_('JLOGIN') ?></button>
		  <input type="hidden" name="option" value="com_users" />
		  <input type="hidden" name="task" value="user.login" />
		  <input type="hidden" name="return" value="<?= base64_encode(JURI::base()) ?>" />
		  <?= JHtml::_('form.token'); ?>
        </form>
      </div>

    <div class="row">
      <div class="col-md-12">
        <div class="social-media-wrapper text-center">
          <a href="#"><i class="fa fa-pinterest"></i></a>
          <a href="#"><i class="fa fa-facebook-official"></i></a>
          <a href="#"><i class="fa fa-google-plus-official"></i></a>
          <a href="#"><i class="fa fa-twitter"></i></a>
		  <a href="#"><i class="fa fa-instagram"></i></a>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="text-center copyright">Copyright &copy; 2016 <?= htmlspecialchars($app->getCfg('sitename')); ?> by <a target="_blank" style="color:#fff;" href="https://www.afi.cat">Afi informàtica</a></div> 
      </div>
    </div>
    
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="offline/js/bootstrap.min.js"></script>

    <!-- fit text -->
    <script type="text/javascript" src="<?= $this->baseurl ?>/templates/<?= $this->template ?>/offline/js/jquery.fittext.js"></script>

    <!-- jquery countdown -->
    <script type="text/javascript" src="<?= $this->baseurl ?>/templates/<?= $this->template ?>/offline/js/jquery.plugin.js"></script> 
    <script type="text/javascript" src="<?= $this->baseurl ?>/templates/<?= $this->template ?>/offline/js/jquery.countdown.js"></script>

    <!--placeholder -->
    <script type="text/javascript" src="<?= $this->baseurl ?>/templates/<?= $this->template ?>/offline/js/jquery.placeholder.js"></script>

    <script type="text/javascript" src="<?= $this->baseurl ?>/templates/<?= $this->template ?>/offline/js/scripts.js"></script>
  </body>
</html>
