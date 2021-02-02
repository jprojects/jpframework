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
blocksHelper::loadCss(JURI::root().'administrator/components/com_jpframework/blocks/timeline/assets/css/timeline.css');
blocksHelper::loadJs(JURI::root().'administrator/components/com_jpframework/blocks/timeline/assets/js/timeline.js');
$blockid    = JFactory::getApplication()->input->get('blockid');

$parts 	= json_decode(blocksHelper::getBlockParameter($blockid, 'tm_parts'), true);
$tm   = blocksHelper::group_by_key($parts);
?>

<section id="<?= blocksHelper::getBlockParameter($blockid, 'uniqid', 'block-'.$blockid); ?>" style="background-color:<?= blocksHelper::getBlockParameter($blockid,'block_color'); ?>;color:<?= blocksHelper::getBlockParameter($blockid,'block_font_color'); ?>">
<div class="container">

    <?php if(blocksHelper::getBlockParameter($blockid, 'tm_title') != '') : ?>
    <div class="page-header timeline-header text-center mb-5">
        <h1 id="timeline"><?= blocksHelper::getBlockParameter($blockid, 'tm_title'); ?></h1>
        <?php if(blocksHelper::getBlockParameter($blockid, 'tm_subtitle') != '') : ?>
        <p><?= blocksHelper::getBlockParameter($blockid, 'tm_subtitle'); ?></p>
        <?php endif; ?>
    </div>
    <?php endif; ?>
    
    <ul class="timeline">
    
    	<?php foreach($tm as $k => $v) : ?>
        <li  <?php if($v[0] == 'right') : ?>class="timeline-inverted"<?php endif; ?>>
          <div class="timeline-badge primary"><a><i class="<?= $v[1]; ?>" rel="tooltip" title="<?= $v[1]; ?>"></i></a></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <img class="img-responsive" src="<?= $v[2]; ?>" />
              
            </div>
            <div class="timeline-body">
              <p><?= $v[3]; ?></p>
              
            </div>
          </div>
        </li>        
        <?php endforeach; ?>             
        
        <li class="clearfix" style="float: none;"></li>
    </ul>
</div>
</section>
