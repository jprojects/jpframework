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
$app = JFactory::getApplication();
$sitename = $app->getCfg('sitename', 'JP Framework');
?>



<main class="bs-docs-masthead" id="<?php echo blocksHelper::getBlockParameter($blockid, 'uniqid', 'block-'.$blockid); ?>" role="main" style="text-align: center;background-color:<?php echo blocksHelper::getBlockParameter($blockid,'block_color'); ?>">
  <div class="container">
  	<?php if(blocksHelper::getBlockParameter($blockid,'header_logo') != '') : ?>
    <img src="<?php echo blocksHelper::getBlockParameter($blockid,'header_logo'); ?>" alt="logo">
    <?php else : ?>
    <h1><?php echo $sitename; ?></h1>
    <?php endif; ?>
    <p class="lead"><?php echo blocksHelper::getBlockParameter($blockid,'header_lead'); ?></p>
    <?php if(blocksHelper::getBlockParameter($blockid,'header_button_txt') != '') : ?>
    <p><a href="<?php echo blocksHelper::getBlockParameter($blockid,'header_button_link'); ?>" class="btn"><?php echo blocksHelper::getBlockParameter($blockid,'header_button_txt'); ?></a></p>
    <?php endif; ?>
  </div>
</main>
