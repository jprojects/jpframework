<?php
/**
 * @version		$Id: modules.php 14276 2010-01-18 14:20:28Z louis $
 * @package		Joomla.Site
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

/**
 * This is a file to add template specific chrome to module rendering.  To use it you would
 * set the style attribute for the given module(s) include in your template to use the style
 * for each given modChrome function.
 *
 * eg.  To render a module mod_test in the sliders style, you would use the following include:
 * <jdoc:include type="module" name="test" style="slider" />
 *
 * This gives template designers ultimate control over how modules are rendered.
 *
 * NOTICE: All chrome wrapping methods should be named: modChrome_{STYLE} and take the same
 * two arguments.
 *
 * This module chrome file creates custom output for modules used with the Atomic template.
 * The first function wraps modules using the "container" style in a DIV. The second function
 * uses the "bottommodule" style to change the header on the bottom modules to H6. The third
 * function uses the "sidebar" style to change the header on the sidebar to H3. 
*/

function modChrome_bottommodule($module, &$params, &$attribs)
{
	if (!empty ($module->content)) : ?>
		<?php if ($module->showtitle) : ?>
			<h6><?php if($params->get('header_class') != "") : ?><i class="<?= $params->get('header_class'); ?>"></i><?php endif; ?> <?= $module->title; ?></h6>
		<?php endif; ?>
		<?= $module->content; ?>
	<?php endif;
}

function modChrome_color($module, &$params, &$attribs)
{
    $app = JFactory::getApplication('site');
    $template = $app->getTemplate(true); 
    $hcolor = $template->params->get('header-color');
	if (!empty ($module->content)) :
		if ($module->showtitle) :
		    $part = explode(' ', $module->title); 
		    $first = $part[0];
		    if(count(explode(' ', $module->title)) > 1) :
		        $second = substr($module->title, strpos($module->title,' '));
		        ?>
		        <h3><?php if($params->get('header_class') != "") : ?><i class="<?= $params->get('header_class'); ?>"></i><?php endif; ?> <?= $first; ?> <span style="color:<?= $hcolor; ?>;"><?= $second; ?></span></h3>
		    <?php else: ?>
		        <h3><?php if($params->get('header_class') != "") : ?><i class="<?= $params->get('header_class'); ?>"></i><?php endif; ?> <?= $first; ?></h3>
		    <?php endif;
		endif;
		echo $module->content;
	endif;
}

function modChrome_sidebar($module, &$params, &$attribs)
{
	if (!empty ($module->content)) : ?>
		<?php if ($module->showtitle) : ?>
            <h3><?php if($params->get('header_class') != "") : ?><i class="<?= $params->get('header_class'); ?>"></i><?php endif; ?> <?= $module->title; ?></h3>
		<?php endif; ?>
		<?= $module->content; ?>
                    
	<?php endif;
}

function modChrome_footer($module, &$params, &$attribs)
{
    if (!empty ($module->content)) : ?>
		<?php if ($module->showtitle) : ?>
            <h4><?php if($params->get('header_class') != "") : ?><i class="<?= $params->get('header_class'); ?>"></i><?php endif; ?> <?= $module->title; ?></h4>
		<?php endif; ?>
		<p><?= $module->content; ?></p>
                    
	<?php endif;
}

function modChrome_card($module, &$params, &$attribs)
{
    if (!empty ($module->content)) : ?>
        <div class="card">
  		<div class="card-body <?= $params->get('moduleclass_sfx', 'default'); ?>">
		<?php if ($module->showtitle) : ?>
        <h5 class="card-title"><?php if($params->get('header_class') != "") : ?><i class="<?= $params->get('header_class'); ?>"></i><?php endif; ?> <?= $module->title; ?></h5>
		<?php endif; ?>
		<p class="card-text"><?= $module->content; ?></p>
		</div>
        </div>           
		<?php endif;
}
?>
