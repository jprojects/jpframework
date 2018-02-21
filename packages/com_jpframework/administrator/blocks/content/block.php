<?php

/**
 * @version     1.0.0
 * @package     com_jpframework
 * @copyright   Copyright (C) 2015. Todos los derechos reservados.
 * @license     Licencia Pública General GNU versión 2 o posterior. Consulte LICENSE.txt
 * @author      aficat <kim@aficat.com> - http://www.afi.cat
 */
// No direct access
defined('_JEXEC') or die;

$blockid = JRequest::getVar('blockid');
$effect  = blocksHelper::getBlockParameter($blockid, 'effect', '');
$effect != '' ? $efecte = 'wow '.$effect : $efecte = '';
$position = blocksHelper::getBlockParameter($blockid,'content_position', '');
if($position == 'right') {
	$col  = 'col-xs-12 col-md-6';
	$pos  = 'pull-right';
	$col2 = 'col-xs-12 col-md-6';
	$pos2 = 'pull-left';
} elseif($position == 'left') {
	$col  = 'col-xs-12 col-md-6';
	$pos2 = 'pull-right';
	$col2 = 'col-xs-12 col-md-6';
	$pos  = 'pull-left';
} else {
	$col2 = 12;
}
?>

<style>
#content<?= $blockid; ?>  {
    padding-bottom: 60px;
    padding-top: 30px;
}
#content<?= $blockid; ?> header {
    margin-bottom: 30px;
}
</style>

<section id="<?= blocksHelper::getBlockParameter($blockid, 'uniqid', 'block-'.$blockid); ?>">

<div id="content<?= $blockid; ?>" style="background-color:<?= blocksHelper::getBlockParameter($blockid,'block_color'); ?>;color:<?= blocksHelper::getBlockParameter($blockid,'block_font_color'); ?>">


<div class="container jpfblock">

	<header>
		<h1><?= blocksHelper::getBlockParameter($blockid, 'content_title'); ?></h1>
		<hr class="line-green-medium">
	</header>

	<?php if($position != '') : ?>
	<div class="<?= $col; ?>  <?= $pos; ?> <?= $efecte; ?>">
		<?php if(blocksHelper::getBlockParameter($blockid,'content_video') == '') : ?>
    	<img src="<?= blocksHelper::getBlockParameter($blockid,'content_img', ''); ?>" alt="<?= blocksHelper::getBlockParameter($blockid,'content_alt', ''); ?>" class="img-responsive">
    	<?php else : ?>
    	<iframe class="col-lg-2 col-md-6 col-sm-12 col-xs-12" src="<?= blocksHelper::getBlockParameter($blockid, 'content_video'); ?>" frameborder="0" allowfullscreen></iframe>
    	<?php endif; ?>
    </div> 
	<?php endif; ?>
	
    <div class="<?= $col2; ?> <?= $pos2; ?>">
         <div class="lead"><?= blocksHelper::getBlockParameter($blockid, 'content_text'); ?></div>
    </div> 
    
</div>
</div>

</section>
