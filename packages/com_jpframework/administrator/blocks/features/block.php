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
$heading = blocksHelper::getBlockParameter($blockid,'feature_heading');
$uniqid  = blocksHelper::getBlockParameter($blockid, 'uniqid', 'block-'.$blockid);
$position = blocksHelper::getBlockParameter($blockid,'content_position', '');
if($position == 'right') {
	$pos = 'text-right';
} elseif($position == 'left') {
	$pos  = 'text-left';
} else {
	$pos = 'text-center';
}
?>

<style>
#<?= $uniqid; ?> {
	padding-bottom: 60px;
	padding-top: 60px;
}
#<?= $uniqid; ?> header {
	margin-bottom: 12px;
	text-align: center;
}
#<?= $uniqid; ?> .feature-icon img {
	height: 168px;
	width: 168px;
}
#<?= $uniqid; ?> h4 { font-weight: bold; }
</style>

<section id="<?= $uniqid; ?>" style="background-color:<?= blocksHelper::getBlockParameter($blockid,'block_color'); ?>;color:<?= blocksHelper::getBlockParameter($blockid,'block_font_color'); ?>">

<div class="container">

<?php if($heading != '') : ?>
<header>
<h1><?= $heading; ?></h1>
<p class="lead"><?= blocksHelper::getBlockParameter($blockid,'feature_subheading'); ?></p>
</header>
<?php endif; ?>

<div class="row">

	<!-- Feature Item 1 -->
	<div class="col-md-4 <?= $pos; ?>">
		<div class="feature-icon">
		<img class="img-circle" src="<?= blocksHelper::getBlockParameter($blockid,'feature_img1', 'images/sampledata/icona-vehiculos.svg'); ?>" alt="">
		</div>
		<h4><?= blocksHelper::getBlockParameter($blockid, 'feature_title1', ''); ?></h4>
		<hr class="line-green-medium">
		<p>
		<?= blocksHelper::getBlockParameter($blockid, 'feature_text1', ''); ?><br/>
		</p>
		<?php if(blocksHelper::getBlockParameter($blockid, 'feature_btn1', '')) : ?>
		<a href="<?= blocksHelper::getBlockParameter($blockid, 'feature_btn_link1', ''); ?>" class="btn btn-default"><?= blocksHelper::getBlockParameter($blockid, 'feature_btn1', ''); ?></a>
		<?php endif; ?>
	</div>

	<!-- Feature Item 2 -->
	<div class="col-md-4 <?= $pos; ?>">
		<div class="feature-icon">
		<img class="img-circle" src="<?= blocksHelper::getBlockParameter($blockid,'feature_img2', 'images/sampledata/icona-fiscal.svg'); ?>" alt="">
		</div>
		<h4><?= blocksHelper::getBlockParameter($blockid, 'feature_title2', ''); ?></h4>
		<hr class="line-green-medium">
		<p>
		<?= blocksHelper::getBlockParameter($blockid, 'feature_text2', ''); ?><br/>
		</p>
		<?php if(blocksHelper::getBlockParameter($blockid, 'feature_btn2', '')) : ?>
		<a href="<?= blocksHelper::getBlockParameter($blockid, 'feature_btn_link2', ''); ?>" class="btn btn-default"><?= blocksHelper::getBlockParameter($blockid, 'feature_btn2', ''); ?></a>
		<?php endif; ?>
	</div>

	<!-- Feature Item 3 -->
	<div class="col-md-4 <?= $pos; ?>">
		<div class="feature-icon">
		<img class="img-circle" src="<?= blocksHelper::getBlockParameter($blockid,'feature_img3', 'images/sampledata/icona-laboral.svg'); ?>" alt="">
		</div>
		<h4><?= blocksHelper::getBlockParameter($blockid,'feature_title3', ''); ?></h4>
		<hr class="line-green-medium">
		<p>
		<?= blocksHelper::getBlockParameter($blockid, 'feature_text3', ''); ?><br/>
		</p>
		<?php if(blocksHelper::getBlockParameter($blockid, 'feature_btn3', '')) : ?>
		<a href="<?= blocksHelper::getBlockParameter($blockid, 'feature_btn_link3', ''); ?>" class="btn btn-default"><?= blocksHelper::getBlockParameter($blockid, 'feature_btn3', ''); ?></a>
		<?php endif; ?>
	</div>

</div><!-- /row -->
</div><!-- /container -->

</section>
