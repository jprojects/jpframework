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
require_once(JPATH_ADMINISTRATOR . DS . 'components' . DS . 'com_jpframework' . DS . 'helpers' . DS . 'blocks.php');
blocksHelper::loadCss(JURI::root().'administrator/components/com_jpframework/blocks/parallax/assets/css/parallax.css');
blocksHelper::loadJs(JURI::root().'administrator/components/com_jpframework/blocks/parallax/assets/js/parallax.js');
$blockid = JRequest::getVar('blockid');
?>

<section id="<?= blocksHelper::getBlockParameter($blockid, 'uniqid'); ?>">

	<div class="fullscreen background parallax" style="background-image:url('<?= JURI::root().blocksHelper::getBlockParameter($blockid, 'bg_image'); ?>');background-attachment:fixed;" data-img-width="1600" data-img-height="1064" data-diff="100">
		<div class="content-a">
		    <div class="content-b">
		        <h2><?= blocksHelper::getBlockParameter($blockid, 'bg_title'); ?></h2>
				<p><?= blocksHelper::getBlockParameter($blockid, 'bg_subtitle'); ?></p>
		    </div>
		</div>
	</div> 

</section>
