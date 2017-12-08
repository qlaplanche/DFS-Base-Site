<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	<div class="container">
		<a class="navbar-brand" href="#">Name <span>Event en cours</span></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
		 aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				@if (Auth::check())
				<li class="nav-item">
					<a class="nav-link btn" href="{{ route('event.create')}}">Créér événement</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/">Accueil</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('events')}} ">Mes événements</a>
				</li>
				<div class="dropdown-divider"></div>
				<li class="nav-item">
					<span class="nav-link">{{ Auth::user()->firstname}}</span>
				</li>
				<li class="nav-item">
				<a class="nav-link" href="{{route('user.profile', ['id' => Auth::user()])}}">Profil</a>
				</li>
			@if (Auth::user()->role=="admin")
				<li class="nav-item">
				<a class="nav-link" href="{{ route('admin')}}">Admin</a>
				</li>
			@endif
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bell" aria-hidden="true"></i></a>
					<div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">
						<a class="dropdown-item" href="#">New task</a>
						<a class="dropdown-item" href="#">New action</a>
						<a class="dropdown-item" href="#">New life</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#">Clear</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout
					</a>

					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						{{ csrf_field() }}
					</form>
				</li>
				@else
				<li class="nav-item active">
					<a class="nav-link" href="#">Home
						<span class="sr-only">(current)</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{url('/register')}}">Register</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{url('/login')}}">Login</a>
				</li>
				@endif
			</ul>
		</div>
	</div>
</nav>