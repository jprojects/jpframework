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

$blockid   = JRequest::getVar('blockid');
$btn1_text = blocksHelper::getBlockParameter($blockid, 'jumbotron-btn1-text', '');
$btn2_text = blocksHelper::getBlockParameter($blockid, 'jumbotron-btn2-text', '');
$text      = blocksHelper::getBlockParameter($blockid, 'jumbotron-text', '');
?>

<section class="jumbotron text-center" id="<?= blocksHelper::getBlockParameter($blockid, 'uniqid', 'block-'.$blockid); ?>">
	<div class="container">
          <h1 class="jumbotron-heading"><?= blocksHelper::getBlockParameter($blockid, 'jumbotron-title', 'JP Framework'); ?></h1>
          <?php if($text != '') : ?>
          <p class="lead text-muted"><?= blocksHelper::getBlockParameter($blockid, 'jumbotron-text', ''); ?></p>
          <?php endif; ?>
          <?php if($btn1_text != '' || $btn2_text != '') : ?>
          <p>
          	<?php if($btn1_text != '') : ?>
            <a href="<?= blocksHelper::getBlockParameter($blockid, 'jumbotron-btn1-link', '#'); ?>" class="btn btn-primary my-2"><?= $btn1_text; ?></a>
            <?php endif; ?>
            <?php if($btn2_text != '') : ?>
            <a href="<?= blocksHelper::getBlockParameter($blockid, 'jumbotron-btn2-link', '#'); ?>" class="btn btn-secondary my-2"><?= $btn2_text; ?></a>
            <?php endif; ?>
          </p>
          <?php endif; ?>
	</div>
</section>
