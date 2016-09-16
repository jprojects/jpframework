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
blocksHelper::loadCss(JURI::root().'administrator/components/com_jpframework/blocks/social/assets/css/social.css');
?>

<ul class="social-icons icon-circle <?php echo blocksHelper::getBlockParameter($blockid, 'effect', ''); ?> list-unstyled list-inline"> 
	<?php if(blocksHelper::getBlockParameter($blockid, 'flickr') != '') : ?>
  	<li> <a target="_blank" href="<?php echo blocksHelper::getBlockParameter($blockid, 'flickr'); ?>"><i class="fa fa-flickr"></i></a></li> 
  	<?php endif; ?>
  	<?php if(blocksHelper::getBlockParameter($blockid, 'foursquare') != '') : ?>
  	<li> <a target="_blank" href="<?php echo blocksHelper::getBlockParameter($blockid, 'foursquare'); ?>"><i class="fa fa-foursquare"></i></a></li> 
  	<?php endif; ?>
  	<?php if(blocksHelper::getBlockParameter($blockid, 'github') != '') : ?>
  	<li> <a target="_blank" href="<?php echo blocksHelper::getBlockParameter($blockid, 'github'); ?>"><i class="fa fa-github"></i></a></li> 
  	<?php endif; ?>
  	<?php if(blocksHelper::getBlockParameter($blockid, 'gplus') != '') : ?>
  	<li> <a target="_blank" href="<?php echo blocksHelper::getBlockParameter($blockid, 'gplus'); ?>"><i class="fa fa-google-plus"></i></a></li> 
  	<?php endif; ?>
  	<?php if(blocksHelper::getBlockParameter($blockid, 'instagram') != '') : ?>
  	<li> <a target="_blank" href="<?php echo blocksHelper::getBlockParameter($blockid, 'instagram'); ?>"><i class="fa fa-instagram"></i></a></li> 
  	<?php endif; ?>
  	<?php if(blocksHelper::getBlockParameter($blockid, 'pinterest') != '') : ?>
    <li> <a target="_blank" href="<?php echo blocksHelper::getBlockParameter($blockid, 'pinterest'); ?>"><i class="fa fa-pinterest"></i></a></li>
    <?php endif; ?>
  	<?php if(blocksHelper::getBlockParameter($blockid, 'facebook') != '') : ?> 
    <li> <a target="_blank" href="<?php echo blocksHelper::getBlockParameter($blockid, 'facebook'); ?>"><i class="fa fa-facebook"></i></a></li> 
    <?php endif; ?>
  	<?php if(blocksHelper::getBlockParameter($blockid, 'twitter') != '') : ?> 
    <li> <a target="_blank" href="<?php echo blocksHelper::getBlockParameter($blockid, 'twitter'); ?>"><i class="fa fa-twitter"></i></a></li> 
    <?php endif; ?>
  	<?php if(blocksHelper::getBlockParameter($blockid, 'youtube') != '') : ?>
    <li> <a target="_blank" href="<?php echo blocksHelper::getBlockParameter($blockid, 'youtube'); ?>"><i class="fa fa-youtube"></i></a></li> 
    <?php endif; ?>  
</ul>
