<div class="well">
	<h2><?= $helper->escape($user->getFullName()); ?></h2>
	<?php if($user->hasJobTitle()): ?>
	<p><b><?= $helper->escape($user->getJobTitle()); ?></b></p>
	<?php endif; ?>
	
	<dl class="user-info">
		
		<?php if($user->getCountry()): ?>
		<dt>Country</dt>
		<dd><?=$helper->escape($user->getCountry()); ?></a></dd>
		<?php endif ;?>
		
		<?php if($user->getWebsite()): ?>
		<dt>Website</dt>
		<dd><a href="<?= $helper->escape($user->getWebsite()); ?>" title="Click to go to the website" target="_blank"><?= $helper->escape($user->getWebsite()); ?></a></dd>
		<?php endif ;?>
			
		<?php if($user->hasTwitterHandle()): ?>
		<dt>Twitter</dt>
		<dd><a href="http://www.twitter.com/<?= $helper->escape($user->getTwitterHandle()); ?>" 
			   target="_blank">@<?=$helper->escape($user->getTwitterHandle()); ?></a></dd>
		<?php endif; ?>
		
	</dl>

	<hr>
	
	<?php if($user->hasBio()): ?>
	<h3><b>Biography</b></h3>
	<p><?= nl2br($helper->escape($user->getBio())); ?></p>
	<?php endif; ?>
</div>