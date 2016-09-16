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
?>

<style>
#features {
padding-bottom: 48px;
}
#features header {
margin-bottom: 12px;
text-align: center;
}
#features .feature-icon img {
height: 168px;
width: 168px;
transition: all 0.2s ease;
}
#features .feature-icon img:hover {
  	-webkit-transform: scale(1.1);
	-moz-transform: scale(1.1);
	-ms-transform: scale(1.1);
	-o-transform: scale(1.1);
	transform: scale(1.1); 
}
</style>

<section id="<?php echo blocksHelper::getBlockParameter($blockid, 'uniqid', 'block-'.$blockid); ?>" style="background-color:<?php echo blocksHelper::getBlockParameter($blockid,'block_color'); ?>">

<div class="container" id="features">

<header>
<h1><?php echo blocksHelper::getBlockParameter($blockid,'feature_heading'); ?></h1>
<p class="lead"><?php echo blocksHelper::getBlockParameter($blockid,'feature_subheading'); ?></p>
</header>

<div class="row">

<!-- Feature Item 1 -->
<div class="col-md-4 text-center">
		<div class="feature-icon">
		<img class="img-circle" src="<?php echo blocksHelper::getBlockParameter($blockid,'feature_img1', 'http://preview.simonswiss.com/booom/images/icons/key.svg'); ?>" alt="">
		</div>
		<h4><?php echo blocksHelper::getBlockParameter($blockid,'feature_title1', 'Ready to Start'); ?></h4>
		<p>
		<?php echo blocksHelper::getBlockParameter($blockid,'feature_text1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.'); ?><br/>
		<?php if(blocksHelper::getBlockParameter($blockid,'feature_twitter1') != '') : ?>
		<a target="_blank" href="https://twitter.com/<?php echo blocksHelper::getBlockParameter($blockid,'feature_twitter1'); ?>"><i class="fa fa-twitter"></i></a>
		<?php endif; ?>
		</p>
</div>

<!-- Feature Item 2 -->
<div class="col-md-4 text-center">
	<div class="feature-icon">
	<img class="img-circle" src="<?php echo blocksHelper::getBlockParameter($blockid,'feature_img2', 'http://preview.simonswiss.com/booom/images/icons/magic.svg'); ?>" alt="">
	</div>
	<h4><?php echo blocksHelper::getBlockParameter($blockid,'feature_title2', 'Dressed to Impress'); ?></h4>
	<p>
	<?php echo blocksHelper::getBlockParameter($blockid,'feature_text2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.'); ?><br/>
	<?php if(blocksHelper::getBlockParameter($blockid,'feature_twitter2') != '') : ?>
	<a target="_blank" href="https://twitter.com/<?php echo blocksHelper::getBlockParameter($blockid,'feature_twitter2'); ?>"><i class="fa fa-twitter"></i></a>
	<?php endif; ?>
	</p>
</div>

<!-- Feature Item 3 -->
<div class="col-md-4 text-center">
	<div class="feature-icon">
	<img class="img-circle" src="<?php echo blocksHelper::getBlockParameter($blockid,'feature_img3', 'http://preview.simonswiss.com/booom/images/icons/rocket.svg'); ?>" alt="">
	</div>
	<h4><?php echo blocksHelper::getBlockParameter($blockid,'feature_title3', 'Shoot for the Stars'); ?></h4>
	<p>
	<?php echo blocksHelper::getBlockParameter($blockid,'feature_text3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.'); ?><br/>
	<?php if(blocksHelper::getBlockParameter($blockid,'feature_twitter3') != '') : ?>
	<a target="_blank" href="https://twitter.com/<?php echo blocksHelper::getBlockParameter($blockid,'feature_twitter3'); ?>"><i class="fa fa-twitter"></i></a>
	<?php endif; ?>
	</p>
</div>

</div><!-- /row -->
</div><!-- /container -->

</section>
