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
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
<title><?php echo $this->error->getCode(); ?> - <?php echo $this->title; ?></title>

<style>
body {
    font-family: thomba;
    font-size:16px;
    line-height:30px;
}
.pad-top {
    padding-top:80px;
    
}
h1 {
    font-size:100px;
    padding-bottom:20px;
    font-weight:900;
}
h3 {
    text-transform:uppercase;
    font-size:40px;
     padding-bottom:40px;
}
</style>
</head>

<body>

<div class="container">
     
   <div class="row pad-top text-center">
       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
           <h1><strong>Ops! something was really wrong</strong></h1>
           <h3><?php echo $this->error->getCode(); ?> - <?php echo $this->title; ?></h3>
           <p><?= JText::_('JP_FRAMEWORK_ERROR_'.$this->error->getCode()); ?></p>
           <a href="index.php" class="btn btn-default btn-lg">  <strong> BACK TO HOME </strong></a>
       </div>

   </div>
 </div>

</body>
</html>