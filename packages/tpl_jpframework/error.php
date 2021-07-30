<?php
/**
 * @version		error.php $ kim 2011-02-02 15:57
 * @package		JP_Framework
 * @copyright   Copyright © 2010 - All rights reserved.
 * @license		GNU/GPL
 * @author		kim
 * @author mail kim@aficat.com
 * @website		http://www.afi.cat
 *
*/

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Uri\Uri;

require_once('jp_framework.class.php');
error_reporting(E_ERROR | E_PARSE); // Report simple running errors

/** @var JDocumentError $this */

$app = Factory::getApplication();
$wa  = $this->getWebAssetManager();

if (!isset($this->error)) {
	$this->error = $app->enqueueMessage(JText::_('JERROR_ALERTNOAUTHOR'));
	$this->debug = false;
}
?>

<style>
p, h1, h2, h3, h4, h5 {
    margin: 0;
}
body{
  margin: 0;
  padding: 0;
  font-family: 'Roboto', sans-serif;
  font-weight: 400;
  font-size: 12px;
  background-color: #f6fcff !important;
}
.error-wrapper {
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}
.error-wrapper .title {
	color: #000;
	font-size: 13em;
	text-shadow: 0px 1px 1px #4d4d4d;
	color: #222;
}
.error-wrapper .info {
  font-size: 2em;
}
</style>

<!DOCTYPE HTML>
<html lang="<?= $this->language; ?>">
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<jdoc:include type="head" />
	<?php jpf::setHead(); ?>
	<link rel="shortcut icon" href="<?= $this->baseurl ?>/templates/<?= $this->template ?>/icon.png" />
	</head>

	<body>
		<header>
		<?= jpf::getLayout(jpf::getparameter('menu', 'menu-1'), 'menu'); ?>
		</header>
		<div class="container">
			<div class="error-wrapper">
				<h3 class="title">404</h3>
				<p class="info"><?= JText::_('JP_FRAMEWORK_ERROR_404'); ?></p>
				<img class="img-fluid" src="<?= Uri::root(); ?>templates/jpframework/images/tumbleweed.gif" alt="404">
			</div>
		</div>

	</body>

</html>
