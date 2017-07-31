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
if(blocksHelper::getBlockParameter($blockid,'content_position','right') == 'right') {
	$pos  = 'right';
	$pos2 = 'left';
} else {
	$pos2 = 'right';
	$pos  = 'left';
}
?>

<style>
#content<?= $blockid; ?>  {
    padding-bottom: 60px;
    padding-top: 60px;
}
#content<?= $blockid; ?> header {
    margin-bottom: 30px;
    text-align: center;
}
</style>

<section id="<?php echo blocksHelper::getBlockParameter($blockid, 'uniqid', 'block-'.$blockid); ?>">

<div id="content<?= $blockid; ?>" style="background-color:<?php echo blocksHelper::getBlockParameter($blockid,'block_color'); ?>;color:<?= blocksHelper::getBlockParameter($blockid,'block_font_color'); ?>">

<header>
<h1><?= blocksHelper::getBlockParameter($blockid, 'content_title'); ?></h1>
</header>


<div class="container jpfblock">
	<div class="col-md-6 pull-<?php echo $pos; ?>">
		<?php if(blocksHelper::getBlockParameter($blockid,'content_video') == '') : ?>
    	<img src="<?php echo blocksHelper::getBlockParameter($blockid,'content_img', 'http://preview.simonswiss.com/booom/images/img.png'); ?>" alt="placeholder image" class="img-responsive">
    	<?php else : ?>
    	<iframe class="col-lg-2 col-md-6 col-sm-12 col-xs-12" src="<?php echo blocksHelper::getBlockParameter($blockid,'content_video'); ?>" frameborder="0" allowfullscreen></iframe>
    	<?php endif; ?>
    </div> 

     <div class="col-md-6 pull-<?php echo $pos2; ?>">
         <div class="lead"><?php echo blocksHelper::getBlockParameter($blockid,'content_text'); ?></div>
      </div> 
</div>
</div>

</section>
