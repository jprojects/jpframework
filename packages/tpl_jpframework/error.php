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
    background: #bfebf4 !important;
}
.error-wrapper {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
}
.error-wrapper .title {
    font-size: 4em;
    font-weight: 700;
    color: #000;
}
.error-wrapper .info {
    font-size: 2em;
}
</style>

<!DOCTYPE HTML>
<html lang="<?= $this->language; ?>">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<title><?= $this->error->getCode(); ?> - <?= $this->title; ?></title>
	</head>

	<body>

		<div class="container">
	    <div class="error-wrapper">
	        <img class="img-fluid" src="<?= JURI::root(); ?>templates/jpframework/images/cutebird.png" alt="Bird">
	        <h3 class="title"><?= $this->error->getCode(); ?></h3>
	        <p class="info"><?= JText::_('JP_FRAMEWORK_ERROR_'.$this->error->getCode()); ?></p>
	    </div>
		</div>

	</body>

</html>
