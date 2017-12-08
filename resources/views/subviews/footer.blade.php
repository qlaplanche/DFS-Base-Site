<!-- Default dropup button -->
<!--div class="btn-group dropup fab fixed-bottom">
  <button type="button" class="btn btn-secondary">Dropup</button>
  <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <div class="dropdown- dropdown-menu-right">
    <button class="dropdown-item" type="button">Action</button>
    <button class="dropdown-item" type="button">Another action</button>
    <button class="dropdown-item" type="button">Something else here</button>
  </div>
</div-->

<div class="btn-group dropup fixed-bottom fab">
	<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true"
	 aria-expanded="false">
		Aide
	</button>
	<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu">
		<button class="dropdown-item" type="button" data-toggle="modal" data-target="#chatBot">Chatbot</button>
		<button class="dropdown-item" type="button" data-toggle="modal" data-target="#signaler">Signaler</button>
		<button class="dropdown-item" type="button" data-toggle="modal" data-target="#appelSecours">Appel secours</button>
	</div>
</div>
<div class="modal fade" id="appelSecours" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Appel Secours</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Appeler les urgences :
				<a href="tel:115">115</a>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="signaler" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Signaler</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" enctype="multipart/form-data" action="{{ route('event.notify') }}">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="description">Description</label>
						<div class="input-group mb-2 mr-sm-2 mb-sm-0">
							<input type="text" class="form-control" name="description" value="">
						</div>
					</div>
					<div class="form-group">
						<label for="heure">Heure</label>
						<input type="date" class="form-control" name="heure" value="">
					</div>
					<div class="form-group">
						<label for="position">Position</label>
						<input type="text" class="form-control" name="position" value="">
					</div>
					<div class="form-group">
						<select class="custom-select">
							<option selected>Open this select menu</option>
							<option value="1">One</option>
							<option value="2">Two</option>
							<option value="3">Three</option>
						</select>
					</div>
					<button type="submit" class="btn btn-primary">Envoyer</button>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="chatBot" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Chatbot</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Chatbot
			</div>
		</div>
	</div>
</div>