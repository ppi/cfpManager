<h2>Speaker Voting</h2>
<p>Drag and drop your speakers in the list you'd like them to appear</p>
<div class="well">
	
	<ul id="sortable">
		<?php foreach($talks as $talk): ?>
		<li class="ui-state-default">
			<span class="handle"></span>
			<p><?=$helper->escape($talk->getTitle() . ' / ' . $talk->getOwnerName()); ?></p>
		</li>
		<?php endforeach; ?>
	</ul>
		
</div>