@extends ("layouts.admin") @section('content')
<h1>Profile settings</h1>
<h2>Informations</h2>
<form method="POST" enctype="multipart/form-data" action="{{ route('adminprofile.edit', ['id' => $user->id]) }}">
	{{ csrf_field() }}
	<div class="form-group">
		<label for="pseudo">First Name</label>
		<div class="input-group mb-2 mr-sm-2 mb-sm-0">
			<input type="text" class="form-control" name="firstname" value="{{ $user->firstname }}">
		</div>
	</div>
	<div class="form-group">
		<label for="prenom">Last Name</label>
		<input type="text" class="form-control" name="lastname" value="{{ $user->lastname }}">
	</div>
	<div class="form-group">
		<label for="nom">Email address
			<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
		</label>
		<input type="Email" class="form-control" name="email" value="{{ $user->email }}">
		<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
	</div>
	<button type="submit" class="btn btn-primary">Save changes</button>
</form>
@endsection