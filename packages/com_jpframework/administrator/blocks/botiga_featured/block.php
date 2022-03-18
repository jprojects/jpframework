<?php

/**
* @version		$Id: com_jpframework  Kim $
* @package		com_jpframework v 1.0.0
* @copyright	Copyright (C) 2014 Afi. All rights reserved.
* @license		GNU/GPL, see LICENSE.txt
*/

// restricted access
defined('_JEXEC') or die('Restricted access');
use \Joomla\CMS\Session\Session;
use Joomla\CMS\HTML\HTMLHelper;
use \Joomla\CMS\Language\Text;

require_once('helper.php');
require_once('components/com_botiga/helpers/botiga.php');
HTMLHelper::_('jquery.framework');

$user = JFactory::getUser();
$blockid    = JFactory::getApplication()->input->get('blockid');
blocksHelper::loadCss('https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css');
blocksHelper::loadCss('https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css');
blocksHelper::loadCss(JURI::root().'administrator/components/com_jpframework/blocks/botiga_featured/assets/css/botiga_featured.css?v=1.1.1');
blocksHelper::loadJs('https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js');
$cat = blocksHelper::getBlockParameter($blockid, 'category');
$itemid = blocksHelper::getBlockParameter($blockid, 'itemid');
$limit = blocksHelper::getBlockParameter($blockid, 'limit', 3); 
$subtitle = blocksHelper::getBlockParameter($blockid, 'tm_subtitle');
$uniqid = blocksHelper::getBlockParameter($blockid, 'uniqid');
$bgcolor = blocksHelper::getBlockParameter($blockid, 'uniqid', 'block-'.$blockid);
$color  = blocksHelper::getBlockParameter($blockid,'block_font_color');
$title = blocksHelper::getBlockParameter($blockid, 'tm_title');
$subtitle  = blocksHelper::getBlockParameter($blockid, 'tm_subtitle');
$readmore  = blocksHelper::getBlockParameter($blockid, 'readmore', 1);
$classes  = blocksHelper::getBlockParameter($blockid, 'classes', '');

//botiga params
$showprices      = botigaHelper::getParameter('show_prices', 1);
$showdiscount 	 = botigaHelper::getParameter('show_discount', 0);
$loginprices 	 = botigaHelper::getParameter('login_prices', 0);
$loginforbuy 	 = botigaHelper::getParameter('login_buy', 1);
$shownotice 	 = botigaHelper::getParameter('show_notice', 1);
$showref 		 = botigaHelper::getParameter('show_ref', 1);
$showdesc 		 = botigaHelper::getParameter('show_desc', 1);
$showbrand 		 = botigaHelper::getParameter('show_brand', 1);
$showfav 		 = botigaHelper::getParameter('show_fav', 1);
$showpvp 		 = botigaHelper::getParameter('show_pvp', 1);
$control_stock 	 = botigaHelper::getParameter('control_stock', 0);
$dte_linia  	 = botigaHelper::getUserData('dte_linia', $user->id);
?>

<section class="SliderNews <?= $classes; ?>" id="<?= $uniqid; ?>"  style="background-color:<?= $bgcolor; ?>;color:<?= $color; ?>">

    <div class="<?= $classes; ?>">
        <div class="<?= $fluid; ?>">

            <?php if($title != '') : ?>
			    <div class="page-header timeline-header text-center mb-5">
				    <h1 id="timeline"><?= $title; ?></h1>
		            <?php if($subtitle != '') : ?>
		            <p><?= $subtitle; ?></p>
		            <?php endif; ?>
			    </div>
			<?php endif; ?>

            <div class="row">
                <div class="col-md-12">
                    <div id="featured-slider" class="owl-carousel owl-theme">

                        <?php 
                        $i = 0;
                        foreach(BotigaFeaturedHelper::getItems($limit) as $item) :

                        $item->image1 != '' ? $image = $item->image1 : $image = 'components/com_botiga/assets/images/noimage.jpg';
                        $precio = botigaHelper::getUserPrice($item->id);
                        $dtos   = botigaHelper::getUserDiscounts($item->id);
                        ?>

                        <?= "<!-- Start item $i -->"; ?>
                        <div class="item">
                        <div class="product-grid4">
                            <div class="product-image4">
                                <a href="<?= JRoute::_('index.php?option=com_botiga&view=item&id='.$item->id); ?>">
                                <img class="pic-1" src="<?= $image; ?>">
                                <?php
                                $extra_images = botigaHelper::getImages($item->id);
                                if(count($extra_images)) :
                                foreach($extra_images as $k => $v) : ?>
                                <img class="pic-2" src="<?= $v[0]; ?>">
                                <?php break; 
                                endforeach; ?>
                                <?php endif; ?>
                                </a>
                                <ul class="social">
                                <li><a href="<?= JRoute::_('index.php?option=com_botiga&view=item&id='.$item->id); ?>" data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
                                <?php if($showfav == 1) : ?>
                                <?php if(!botigaHelper::isFavorite($item->id)) : ?>
                                <?php !$user->guest ? $favLink = 'index.php?option=com_botiga&task=setFavorite&id='.$item->id.'&return='.$uri : $favLink = '#'; ?>
                                <li><a href="<?= $favLink; ?>" <?php if($user->guest) : ?>disabled="true"<?php endif; ?> class="item<?= $item->id; ?>" data-tip="<?= Text::_('COM_BOTIGA_BTN_FAV'); ?>"><i class="fa fa-heart"></i></a></li>
                                <?php else : ?>
                                <?php !$user->guest ? $favLink = 'index.php?option=com_botiga&task=unsetFavorite&id='.$item->id.'&return='.$uri : $favLink = '#'; ?>
                                <li><a href="<?= $favLink; ?>" <?php if($user->guest) : ?>disabled="true"<?php endif; ?> class="item<?= $item->id; ?>" data-tip="<?= Text::_('COM_BOTIGA_BTN_UNFAV'); ?>"><i class="fa fa-heart text-danger"></i></a></li>
                                <?php endif; ?>
                                <?php if($showprices == 1 && ($loginforbuy == 0 || ($loginforbuy == 1 && !$user->guest))) : ?>
                                <?php if(botigaHelper::isValidated() && botigaHelper::validateStock($item->stock)) : ?>
                                <li><a href="index.php?view=botiga&task=botiga.setItem&id=<?= $item->id; ?>&return=<?= $uri; ?>&<?= Session::getFormToken(); ?>=1" data-tip="<?= Text::_('COM_BOTIGA_BTN_BUY'); ?>"><i class="fa fa-shopping-cart"></i></a></li>
                                <?php endif; ?>
                                <?php endif; ?>
                                </ul>
                                <?php if(botigaHelper::isNew($item->id)) : ?>
                                <span class="product-new-label">New</span>
                                <?php endif; ?>
                                <?php if($dte_linia != 0.00 && $showdiscount == 1 && botigaHelper::isPriceVisible()) : ?>
                                <span class="product-discount-label">-<?= $dte_linia; ?>%</span>
                                <?php endif; ?>
                            </div>
                            <div class="product-content">
                                <h3 class="title"><a href="<?= JRoute::_('index.php?option=com_botiga&view=item&id='.$item->id); ?>"><?= $item->name; ?></a></h3>
                                <?php if($showref == 1) : ?>
                                    <div class="item-ref"><?= $item->ref; ?></div>
                                <?php endif; ?>
                                <?php if($showbrand == 1) : ?>
                                    <div class="text-left item-brand"><?= $item->brandname; ?></div>
                                <?php endif; ?>
                                <?php if($showdesc == 1) : ?>
                                    <div class="text-left estil03 text-dark item-desc"><?= $item->s_description; ?></div>
                                <?php endif; ?>
                                <?php if($control_stock == 1 && $item->stock == 0) : ?>
                                    <div class="text-left text-danger"><?= Text::_('COM_BOTIGA_ITEM_WITHOUT_STOCK'); ?></div>
                                <?php endif; ?>
                                <div class="price">
                                <?php if(botigaHelper::isPriceVisible()) : ?>
                                    <?php if($showdiscount == 1 && $dte_linia != 0.00) : ?>
                                        <del><?php if(!botigaHelper::isEmpresa()) : ?>PVP <?php endif; ?><?= $precio; ?>&euro;</del>
                                    <?php else: ?>
                                    <?php if(!botigaHelper::isEmpresa()) : ?>PVP <?php endif; ?><?= $precio; ?>&euro;<?php endif; ?>
                                    <?php endif; ?>
                                    <?php if($showpvp == 1) : ?>
                                    <span><?= $item->pvp; ?>&euro;</span>
                                    <?php endif; ?>
                                    <?php if($showdiscount == 1 && $dte_linia != 0.00) : ?>
                                    <div><?= botigaHelper::getPercentDiff($precio, $dte_linia); ?>&euro;</div>
                                    <?php endif; ?>
                                    <?php if($dtos !='') : ?>
                                    <div><?= $dtos; ?>&euro;</div>
                                    <?php endif; ?>
                                <?php endif; ?>
                                </div>
                                <a class="add-to-cart btn btn-primary text-light" href="index.php?view=botiga&task=botiga.setItem&id=<?= $item->id; ?>&return=<?= $uri; ?>&<?= Session::getFormToken(); ?>=1"><?= Text::_('COM_BOTIGA_BTN_BUY'); ?></a>
                            </div>
                        </div>
                        </div>
                        <?= "<!-- End item $i -->"; ?>

                        <?php
                        //endif;
                        $i++;
                        endforeach;
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    $("#featured-slider").owlCarousel({
        dots:true,
        nav:false,
        loop:true,
        margin:10,
        responsiveClass:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    });
    </script>

</section>
