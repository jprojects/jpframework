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
$blockid = JRequest::getVar('blockid');
?>

<section id="<?= blocksHelper::getBlockParameter($blockid, 'uniqid', 'block-'.$blockid); ?>" style="background-color:<?= blocksHelper::getBlockParameter($blockid,'block_color'); ?>;color:<?= blocksHelper::getBlockParameter($blockid,'block_font_color'); ?>">
<div class="container">
    <div class="page-header text-center">
        <h1 id="timeline"><?= blocksHelper::getBlockParameter($blockid, 'tm_title'); ?></h1>
    </div>
    <ul class="timeline">
        <li>
          <div class="timeline-badge primary"><a><i class="fas fa-pencil-alt" rel="tooltip" title="11 hours ago via Twitter" id=""></i></a></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <img class="img-responsive" src="http://lorempixel.com/1600/500/sports/2" />
              
            </div>
            <div class="timeline-body">
              <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
              
            </div>
          </div>
        </li>        
        
        <li  class="timeline-inverted">
          <div class="timeline-badge primary"><a><i class="fas fa-pencil-alt" rel="tooltip" title="11 hours ago via Twitter" id=""></i></a></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <img class="img-responsive" src="http://lorempixel.com/1600/500/sports/2" />
              
            </div>
            <div class="timeline-body">
              <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
              
            </div>
          </div>
        </li>
        
        <li>
          <div class="timeline-badge primary"><a><i class="fas fa-pencil-alt" rel="tooltip" title="11 hours ago via Twitter" id=""></i></a></div>
          <div class="timeline-panel">
            <div class="timeline-body">
              <p><b>All the credits go to <a href="http://bootsnipp.com/rafamaciel">Rafamaciel</a></b></p>
              <p>I only make it responsive and remove the empty spaces to be more like Facebook timeline!</p>
            </div>
          </div>
        </li>
        
        <li class="clearfix" style="float: none;"></li>
    </ul>
</div>
</section>
