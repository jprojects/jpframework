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
if (!isset($this->error)) {
	$this->error = JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
	$this->debug = false; 
}
$app = JFactory::getApplication();
?>

<!DOCTYPE HTML>
<html lang="<?= $this->language; ?>">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<title><?= $this->error->getCode(); ?> - <?= $this->title; ?></title>
	</head>

	<body>

		<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
			<h1 class="mr-3 pr-3 align-top border-right inline-block align-content-center"><?= $this->error->getCode(); ?></h1>
			<div class="inline-block align-middle">
				<h2 class="font-weight-normal lead" id="desc"><?= JText::_('JP_FRAMEWORK_ERROR_'.$this->error->getCode()); ?>.</h2>
			</div>
		</div>

	</body>
	
</html>
