<div class="well">
	<h1><?= $helper->escape($talk->getTitle()); ?></h1>
	
	<dl class="user-info">
		
		<dt>Speaker</dt>
		<dd><a href="<?=$baseUrl;?>account/view/<?=$helper->escape($talkOwner->getUsername()); ?>" title="Click to see profile of: <?=$helper->escape($talkOwner->getFullName()); ?>"><?=$helper->escape($talkOwner->getFullName()); ?></a></dd>
		
		<?php if($talk->hasDuration()): ?>
		<dt>Duration</dt>
		<dd><?=$helper->escape($talk->getDuration()); ?> minutes</dd>
		<?php endif ;?>
		
		<?php if($talk->hasLevel()): ?>
		<dt>Website</dt>
		<dd><?=$helper->escape($talk->getLevel()); ?></dd>
		<?php endif ;?>
		
	</dl>

	<?php if($talk->hasAbstract()): ?>
	<hr>
	<h3><b>Abstract</b></h3>
	<p><?= nl2br($helper->escape($talk->getAbstract())); ?></p>
	<?php endif; ?>


	<?php if($talk->hasRemark()): ?>
	<hr>
	<h3><b>Remark</b></h3>
	<p><?= nl2br($helper->escape($talk->getRemark())); ?></p>
	<?php endif; ?>
	
</div>