<div class="site-header">
	<a class="logo">PPI Skeleton</a>
	
	<div class="topbar" data-dropdown="dropdown" id="header">
		<div class="topbar-inner">
			<div class="container">
				<h3><a class="logo" href="http://www.ppi.io/" title="PPI"><img src="<?=$baseUrl;?>images/generic/ppi-logo.png" alt="Logo" height="25"></a></h3>
				<ul class="nav">
					<li class="active"><a href="http://www.ppi.io/">Home</a></li>
					<li class=""><a href="http://www.ppi.io/community" title="Community">About</a></li>
					<li class=""><a href="http://www.ppi.io/projects" title="Projects">Contact</a></li>
				</ul>
				<ul class="nav secondary-nav">
					<?php if($isLoggedIn): ?>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle">My Account</a>
						<ul class="dropdown-menu">
							<li><a href="#">Edit Account</a></li>
							<li><a href="#">Edit Bio</a></li>
							<li><a href="#">View Account</a></li>
							<li class="divider"></li>
							<li><a href="#">My Talks</a></li>
							<li><a href="#">My Submissions</a></li>
							<li class="divider"></li>
							<li><a href="#">Log out</a></li>
						</ul>
					</li>
					<?php else: ?>
					<li><a href="<?=$baseUrl;?>user/login">Login</a></li>
					<li><a href="<?=$baseUrl;?>user/signup">Signup</a></li>
					<?php endif; ?>
				</ul>
				<div class="search">
					<form action="http://www.ppi.io/search/results" method="get">
						<input type="text" name="keyword" placeholder="Type, press enter" id="header-search-input">
					</form>
				</div>
			</div>
		</div>
	</div>
	
</div>