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
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<title><?= $this->error->getCode(); ?> - <?= $this->title; ?></title>

</head>

<body>
 
<section class="error_section">
	<p class="error_section_subtitle">Ops! sembla que la página no existeix</p>
      <h1 class="error_title">
        <p><?= $this->error->getCode(); ?></p>
        <?= $this->error->getCode(); ?>
      </h1>
      <a href="index.php" class="btn">Tornar</a>
</section>

</body>
</html>
