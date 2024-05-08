<?php

/**
 * @package     Joomla.Site
 * @subpackage  com_users
 *
 * @copyright   (C) 2009 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;

?>
<div class="col-12 col-md-6 mx-md-auto">
<div class="reset <?php echo $this->pageclass_sfx?> mt-5">

<p><?= JText::_('COM_USER_PROFILE_EXPLANATION'); ?></p>

<a class="btn btn-primary" href="<?php echo Route::_('index.php?option=com_users&task=profile.edit&user_id=' . (int) $this->data->id); ?>">
    <span class="icon-user-edit" aria-hidden="true"></span> <?php echo Text::_('COM_USERS_EDIT_PROFILE'); ?>
</a>

</div>
</div>