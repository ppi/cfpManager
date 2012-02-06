<div class="well sidebar-nav" style="padding: 0px;">
	<ul class="nav nav-list">
		<li class="nav-header">Management</li>
		<li class="<?= $section == 'users' ? 'active' : ''; ?>">
			<a href="<?=$baseUrl; ?>manage/users"><i class="icon-user"></i> Users</a>
		</li>
		<li class="<?= $section == 'talks' ? 'active' : ''; ?>">
			<a href="<?=$baseUrl; ?>manage/talks"><i class="icon-film"></i> Talks</a>
		</li>
	</ul>
</div>