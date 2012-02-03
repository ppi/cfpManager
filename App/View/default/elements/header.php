
<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
	<div class="container">
		<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</a>
		<a class="brand" href="#">Call for Papers</a>
		<div class="nav-collapse">
			<ul class="nav">
				<li class="active"><a href="#">Home</a></li>
				<li><a href="#">Link</a></li>
				<li><a href="#">Link</a></li>
			</ul>
			<ul class="nav pull-right">
				

				<?php if($isLoggedIn): ?>
				<li><p class="navbar-text">Logged in as <a href="<?= $baseUrl; ?>account"><?=$helper->escape($authUser->getUsername()); ?></a></p></li>
				<li class="divider-vertical"></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="<?=$baseUrl;?>account">View Account</a></li>
						<li><a href="<?=$baseUrl; ?>account/edit">Edit Account</a></li>
						<li class="divider"></li>
						<li><a href="#">My Talks</a></li>
						<li><a href="#">My Submissions</a></li>
						<li class="divider"></li>
						<li><a href="<?=$baseUrl;?>user/logout">Log out</a></li>
					</ul>
				</li>
				<?php else: ?>
				<li><a href="<?=$baseUrl;?>user/login">Login</a></li>
				<li><a href="<?=$baseUrl;?>user/signup">Signup</a></li>
				<?php endif; ?>
			</ul>
		</div><!-- /.nav-collapse -->
	</div>
	</div><!-- /navbar-inner -->
</div>
