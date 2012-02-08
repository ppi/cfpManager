
<ul id="sortable">
	<?php foreach($talks as $talk): ?>
	<li class="ui-state-default"><?=$helper->escape($talk->getTitle() . ' / ' . $talk->getOwnerName()); ?></li>
	<?php endforeach; ?>
</ul>
	
<style type="text/css">
	#sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
	#sortable li { margin: 0 5px 5px 5px; padding: 5px; font-size: 1.2em; height: 1.5em; }
	html>body #sortable li { height: 1.5em; line-height: 1.2em; }
	.ui-state-highlight { height: 1.5em; line-height: 1.2em; }
</style>