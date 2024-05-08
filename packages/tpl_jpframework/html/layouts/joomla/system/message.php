<?php
/**
 * @package     Joomla.Site
 * @subpackage  Template.protostar
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$msgList = $displayData['msgList'];

$alert = array('error' => 'alert-error', 'warning' => '', 'notice' => 'alert-info', 'message' => 'alert-success', 'modal' => 'alert-modal');
?>

<div id="system-message-container">
	<?php if (is_array($msgList) && !empty($msgList)) : ?>
		<div id="system-message">
			<?php foreach ($msgList as $type => $msgs) : ?>

				<?php if($type !== 'modal') : ?>
				<div class="alert <?= isset($alert[$type]) ? $alert[$type] : 'alert-' . $type; ?> alert-dismissible fade show" role="alert">
					<?php // This requires JS so we should add it trough JS. Progressive enhancement and stuff. ?>
					<a class="close" data-bs-dismiss="alert">×</a>

					<?php if (!empty($msgs)) : ?>
						<div>
							<?php foreach ($msgs as $msg) : ?>
								<div class="alert-message"><?= $msg; ?></div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
				<?php else : ?>

				<div class="modal" tabindex="-1" id="rewardModal">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body text-center">
								<img src="images/confetti.gif" alt="...">
								<?php foreach ($msgs as $msg) : ?>
									<h2 class="alert-modal text-center text-rimary"><b><?= $msg; ?></b></h2>
								<?php endforeach; ?>
							</div>
							<div class="modal-footer">
        						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">D'acord</button>
     						 </div>
						</div>
						</div>
					</div>
				</div>
				<script>
					const rewardModal = new bootstrap.Modal(document.getElementById('rewardModal'));
					rewardModal.show();
				</script>

				<?php endif; ?>

			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</div>

