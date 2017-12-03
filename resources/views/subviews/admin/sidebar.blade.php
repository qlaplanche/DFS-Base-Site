<div class="user">
	<div class="user-info" data-toggle="dropdown">
		<span class="user-img"></span>
		<div>
			<div class="user-name">{{ Auth::user()->firstname}} {{ Auth::user()->lastname}}</div>
			<div class="user-email">{{ Auth::user()->email}}</div>
		</div>
	</div>

	<div class="dropdown-menu">
		<a class="dropdown-item" href="">View Profile</a>
		<a class="dropdown-item" href="">Settings</a>
		<a class="dropdown-item" href="">Logout</a>
	</div>
</div>

<ul class="list-unstyled components navigation">
	<li class="active">
		<a href="#"><i class="fa fa-user" aria-hidden="true"></i> Home</a>
	</li>
	<li>
		<a href="#">Users</a>
	</li>
	<li>
		<a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Page block</a>
		<ul class="collapse list-unstyled" id="homeSubmenu">
			<li>
				<a href="#">Page 1</a>
			</li>
			<li>
				<a href="#">Page 2</a>
			</li>
			<li>
				<a href="#">Page 2</a>
			</li>
		</ul>
		<li>
			<a href="#">Posts</a>
		</li>
		<li>
			<a href="#">Settings</a>
		</li>
</ul>