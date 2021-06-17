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
error_reporting(E_ERROR | E_PARSE); // Report simple running errors
?>

<!DOCTYPE html>
<html lang="<?= $this->language; ?>">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<jdoc:include type="head" />
<?php jpf::setHead(); ?>
<link rel="shortcut icon" href="<?= $this->baseurl ?>/templates/<?= $this->template ?>/icon.png" />
<script src="<?= $this->baseurl.'/templates/'.$this->template; ?>/js/jpframework.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?= $this->baseurl.'/templates/'.$this->template; ?>/css/<?= jpf::getparameter('layout', 'clear'); ?>.css" type="text/css" />
<link rel="stylesheet" href="<?= $this->baseurl.'/templates/'.$this->template; ?>/css/custom.css" type="text/css" />
</head>
    
<body>

<?= jpf::getLayout(jpf::getparameter('layout', 'clear')); ?>

<jdoc:include type="modules" name="debug" style="none" />

</body>
	<!-- Page load in <?= microtime(true) - $_SERVER['REQUEST_TIME_FLOAT']; ?> seconds -->
</html>              
